<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kategori.index')->with([
            'categories' => Category::all(),
            'title' => 'Kategori'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategori.kategori-baru')->with(['title'=>'kategori']); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'slug' => 'required|unique:categories',
            'deskripsi' => 'max:255'
        ],[
            'nama.required' => 'nama ketegori harus di isi', 
            'slug.required' => 'slug ketegori tidak boleh kosong', 
            'slug.unique' => 'slug sudah ada',
            'deskripsi.max' => 'maximal 255 karakter'
        ]);

        Category::create($validasi);

        return back()->with('info', 'Kategori baru berhasil disimpan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();

        return back()->with('info', 'Kategori berhasil dihapus');
    }

    public function getSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->kategori);
        return response()->json(['slug'=>$slug]); 
    }
}
