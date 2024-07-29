<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        $categories = Category::all();
        $articles = Article::with('category')->orderBy('created_at', 'desc')->paginate(5)->withQueryString();
        $views = Article::orderBy('view','desc')->take(5)->get();
        
        return view('blog.index')->with([
            'title' => '',
            'slides' => $slides,
            'categories' => $categories,
            'articles' => $articles,
            'views' => $views,
            'label' => 'Artikel Populer'
        ]);
    }

    public function article() {
        $articles = Article::latest();
        $filter = '';
        $filter_name = '';
        if (request('cari')) {
            $articles->where('judul','like','%'.request('cari').'%')->orWhere('isi','like','%'.request('cari').'%');
            $filter         = request('cari');
            $filter_name    = 'Hasil Pencarian';
        }

        if (request('kategori')) {
            $category       = Category::firstWhere('slug', request('kategori'));
            $articles->where('category_id', $category->id);
            $filter         = $category->nama;
            $filter_name    = 'Kategori';
        }

        if (request('tag')) {
            $articles->whereHas('tags', function($query){
                $query->where('slug', request('tag'));
            });
            $filter         = request('tag');
            $filter_name    = 'Tag';
        }

        return view('blog.artikel')->with([
            'title'         => 'Mengenal Ampel',
            'categories'    => Category::all(),
            'articles'      => $articles->paginate(5)->withQueryString(),
            'filter'        => $filter,
            'filter_name'   => $filter_name,
            'views'         => Article::orderBy('view','desc')->take(5)->get(),
            'label'         => 'Artikel Populer'
        ]);
    }

    public function detail(Article $article){
        $article->increment('view');

        return view('blog.detail')->with([
            'title'         => 'Artikel Detail',
            'categories'    => Category::all(),
            'article'       => $article,
            'views'         => Article::latest()->take(5)->get(),
            'label'         => 'Artikel Terbaru'
        ]);
    }
}

