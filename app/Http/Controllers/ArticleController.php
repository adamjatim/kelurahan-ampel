<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->select('articles.*', 'categories.nama as category_name')
            ->get();

        $categories = Category::all();

        return view('dashboard.artikel.index')->with([
            'articles' => $articles,
            'categories' => $categories,
            'title' => "Article"
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.artikel.artikel-baru')->with([
            'categories' => Category::all(),
            'title'     => 'Article'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required|unique:articles',
            'gambar' => 'image|file|max:1024',
            'category_id' => 'required',
            'tag' => 'required',
            'isi' => 'required',
        ],[
            'judul.required' => 'Judul artikel harus di isi',
            'judul.max' => 'Maximal 255 karakter',
            'slug.required' => 'Slug tidak boleh kosong',
            'slug.unique' => 'slug sudah dipakai',
            'gambar.image' => 'file yang anda upload bukan gambar',
            'gambar.max' => 'Maximal ukuran gambar 1mb',
            'category_id.required' => 'Kategori artikel harus dipilih',
            'tag.required' => 'Tag artikel harus di isi',
            'isi.required' => 'isi artikel harus di ada',
        ]);

        //jika ada gambar yang di upload
        if ($request->file('gambar')) {
            $nama_gambar = $request->file('gambar')->hashName();
            $request->file('gambar')->move(public_path('images'), $nama_gambar);
            $validasi['gambar'] = $nama_gambar;
        }

        $validasi['user_id'] = auth()->user()->id;
        $validasi['kutipan'] = Str::limit(strip_tags($request->isi), 150);

        $article = Article::create($validasi);

        // insert tag
        $tags = explode(',', $request->tag);

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
    
            $article->tags()->attach($tag);
        }

        return back()->with('info', 'Artikel baru berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::where('id', $id)->first();
        return view('dashboard.artikel.artikel-edit')->with([
            'categories' => Category::all(),
            'data'       => $article,
            'tags'      => $article->tags()->implode('name',','),
            'title' => 'Artikel'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::where('id', $id)->first();

        $validasi = [
            'judul' => 'required|max:255',
            'gambar' => 'image|file|max:1024',
            'category_id' => 'required',
            'tag' => 'required',
            'isi' => 'required',
        ];

        if ($request->slug !=$article->slug) {
            $validasi['slug'] = 'required|unique:articles';
        }

        $dataValidasi = $request->validate($validasi, [
            'judul.required' => 'Judul artikel harus di isi',
            'judul.max' => 'Maximal 255 karakter',
            'slug.required' => 'Slug tidak boleh kosong',
            'slug.unique' => 'slug sudah dipakai',
            'gambar.image' => 'file yang anda upload bukan gambar',
            'gambar.max' => 'Maximal ukuran gambar 1mb',
            'category_id.required' => 'Kategori artikel harus dipilih',
            'tag.required' => 'Tag artikel harus di isi',
            'isi.required' => 'isi artikel harus di ada',
        ]);

        if ($request->file('gambar')) {
            if ($request->gambarLama) {
                File::delete(public_path('images/'. $request->gambarLama));
            }
            $nama_gambar = $request->file('gambar')->hashName();
            $request->file('gambar')->move(public_path('images'), $nama_gambar);
            $dataValidasi['gambar'] = $nama_gambar;
        }

        $dataValidasi['user_id'] = auth()->user()->id;
        $dataValidasi['kutipan'] = Str::limit(strip_tags($request->isi), 150);

        $article->update($dataValidasi);

        $tags = explode(',', $request->tag);
        $newTags = [];
        foreach($tags as $tagName){
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            array_push($newTags, $tag->id);
        }
        $article->tags()->sync($newTags);

        return redirect('/dashboard/artikel/')->with('info', 'Artikel telah di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::where('id', $id)->first();

        if ($article->gambar) {
            File::delete(public_path('images').'/'.
            $article->gambar);
        }

        $article->tags()->detach();

        Article::where('id', $id)->delete();

        return back()->with('info', 'Artikel berhasil di hapus');
    }

    public function getSlug(Request $request)  
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->judul);
        return response()->json(['slug'=>$slug]); 
    }
}
