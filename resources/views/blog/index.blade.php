@extends('blog.layout.main')

@section('content')
    <div class="m-5 lg:w-4/6">
        <!-- Featured blog post-->
        <div class="max-w-full bg-white  border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 slideanim">
            <a href="/artikel/{{ $articles[0]->categories_slug }}">
                <img class="rounded-t-lg w-full" src="{{ asset('images/' . $articles[0]->gambar) }}" alt="gambar  article" />
            </a>
            <div class="p-5">
                <!-- File: resources/views/blog/index.blade.php -->

                <div class="text-sm text-gray-500">
                    Diposting {{ $articles[0]->created_at->format('d F Y') }} - Kategori
                    <a href="/artikel?kategori={{ $articles[0]->category->slug }}" class="text-sm text-gray-600">
                        @if ($articles[0]->category)
                            <a href="" class="text-sm text-blue-500">
                                {{ $articles[0]->category->nama }}
                            </a>
                        @else
                            <span class="text-sm text-gray-400">Tidak Tersedia</span>
                        @endif
                    </a>
                </div>


                {{-- @foreach ($articles as $article)
                    {{ dd($article) }} <!-- Tambahkan ini untuk melihat data artikel -->
                    
                        <div class="text-sm text-gray-500">
                            Diposting {{ ($article->created_at)->format('d F Y') }} -
                            Kategori
                            @if ($article->category_slug)
                                <a href="" class="text-sm text-gray-600">
                                    {{ $article->category_name }}
                                </a>
                            @else
                                <span class="text-sm text-gray-600">Uncategorized</span>
                            @endif
                        </div>
                    @endforeach --}}

                <a href="/artikel/{{ $articles[0]->slug }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $articles[0]->judul }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $articles[0]->kutipan }}</p>
                <a href="/artikel/{{ $articles[0]->slug }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read More
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <div class="mt-3">
                    @foreach ($articles[0]->tags as $tag)
                        <a href="/artikel?tag={{ $tag->slug }}"
                            class="bg-gray-100 text-gray-800 text-sm font-medium antialiased me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Nested row for non-featured blog posts-->
        <div class="grid flex-col grid grid-cols-2 md:grid-cols-2 gap-4 my-4">
            @foreach ($articles->skip(1) as $article)
                <div class="flex flex-col gap-2">
                    <!-- Blog post-->
                    <div
                        class="max-w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 my-0 mx-0 slideanim">
                        <a href="/artikel/{{ $article->slug }}">
                            <img class="rounded-t-lg w-full" src="{{ asset('images/' . $article->gambar) }}"
                                alt="gambar artikel" />
                        </a>
                        <div class="p-5">
                            <div class="text-sm text-gray-500">Diposting {{ $article->created_at->format('d F Y') }} -
                                Kategori
                                <a href="/artikel?kategori={{ $article->categories_slug }}" class="text-sm text-gray-600">
                                    @if ($article->category_name)
                                        <a href="" class="text-sm text-gray-600">
                                            {{ $article->category_name }}
                                        </a>
                                    @else
                                        <span class="text-sm text-gray-600">Uncategorized</span>
                                    @endif
                                </a>
                            </div>
                            <a href="/artikel/{{ $article->slug }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $article->judul }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">L{{ $article->kutipan }}</p>
                            <a href="/artikel/{{ $article->slug }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                            <div class="mt-3">
                                @foreach ($article->tags as $tag)
                                    <a href="{{ $tag->slug }}"
                                        class="bg-gray-100 text-gray-800 text-sm font-medium antialiased me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination-->
        <hr>
        <div class="flex-end item-center my-2">
            {{ $articles->links() }}
        </div>

        {{-- <nav aria-label="Page navigation">
                <ul class="flex items-center -space-x-px h-10 text-base w-fit mx-auto lg:my-10 mt-5">
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white gap-3">
                            <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="max-sm:hidden">Previous</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                            class="z-10 flex items-center justify-center px-4 h-10 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white gap-3">
                            <span class="max-sm:hidden">Next</span>
                            <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav> --}}

    </div>
@endsection
