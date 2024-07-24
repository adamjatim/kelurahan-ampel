@extends('blog.layout.main')

@section('content')
    <div class="m-5 lg:w-4/6">
        <header class="m-4 p-2">
            <h1 class="font-bold text-5xl mb-1">{{ $article->judul }}</h1>
            <div class="text-inherit italic mb-2">
                Diposting {{ $article->created_at->format('d F Y') . ' oleh ' . $article->user->name }}
                - Kategori <a href="/artikel?kategori={{ $article->categories_slug }}" class="text-sm text-gray-600">
                    @if ($article->category->nama)
                        <a href="" class="text-sm text-blue-500">
                            {{ $article->category->nama }}
                        </a>
                    @else
                        <span class="text-sm text-gray-400">Tidak Tersedia</span>
                    @endif
                </a>
            </div>
            <div class="mt-2">
                @foreach ($article->tags as $tag)
                    <a href="/artikel?tag={{ $tag->slug }}"
                        class="bg-gray-100 text-gray-800 text-sm font-medium antialiased me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-100">{{ $tag->name }}</a>
                @endforeach
            </div>
        </header>

        <figure class="m-4 p-2">
            <img src="{{ asset('images/' . $article->gambar) }}" class="mx-auto rounded-lg slideanim" alt="">
        </figure>
        <section class="m-4 p-2">{!! $article->isi !!}</section>
        
        <a href="/artikel" class="flex m-4 p-2 justify-end content-center text-blue-600 h-fit "><svg xmlns="http://www.w3.org/2000/svg"
                width="1.5rem" height="1.5rem" viewBox="0 0 24 24" class="mx-2">
                <path fill="currentColor"
                    d="M19 11H7.83l4.88-4.88c.39-.39.39-1.03 0-1.42a.996.996 0 0 0-1.41 0l-6.59 6.59a.996.996 0 0 0 0 1.41l6.59 6.59a.996.996 0 1 0 1.41-1.41L7.83 13H19c.55 0 1-.45 1-1s-.45-1-1-1" />
            </svg>
            Kembali ke artikel
        </a>
    </div>
@endsection
