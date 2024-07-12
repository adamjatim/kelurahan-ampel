<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('blog.index')->with([
            'title' => 'Beranda',
            'slides'=> Slide::all(),
            'categories' => Category::all(),
        ]);
    }
}

