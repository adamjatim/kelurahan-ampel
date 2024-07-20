@extends('dashboard.layout.main')

@section('content')
    <div class="p-4 w-full overflow-x-hidden flex flex-col gap-5">
        <div class="flex flex-row justify-between">
            <h1 class="font-medium text-4xl my-2">Edit Artikel</h1>
            <div class="flex flex-row gap-2 h-fit my-auto">
                <a href="/dashboard/artikel" class="text-blue-600 h-fit">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>

        @if ($errors->any())  
            <div class="p-4 text-sm text-red-800 rounded-lg bg-red-50   dark:bg-gray-800 dark:text-red-400" role="alert">
                {{ 'Update Artikel gagal...' }}
            </div>
        @endif

        <form action="/dashboard/artikel/{{ $data->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-2 mb-5">
                <label for="judul" class="form font-medium text-xl">Judul</label>
                <input type="text" class="rounded-md border border-gray-200 @error('judul') !border-red-300 @enderror"
                    name="judul" id="judul" value="{{ old('judul', $data->judul) }}" onkeyup="getSlug()">
                @error('judul')
                    <div class="flex flex-row text-red-600 mt-1 items-center gap-1">
                        <svg class="w-7 h-7" width="256px" height="256px" viewBox="0 0 24.00 24.00" fill="none"
                            xmlns="http://www.w3.org/2000/svg" stroke="#dc2626" stroke-width="0.00024000000000000003">
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z"
                                    fill="#dc2626"></path>
                            </g>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex flex-col gap-2 mb-5">
                <label for="slug" class="form font-medium text-xl">Slug Artikel</label>
                <input type="text" class="rounded-md border border-gray-200 @error('slug') !border-red-300 @enderror"
                    name="slug" id="slug" value="{{ old('slug', $data->slug) }}">
                @error('slug')
                    <div class="flex flex-row text-red-600 mt-1 items-center gap-1">
                        <svg class="w-7 h-7" width="256px" height="256px" viewBox="0 0 24.00 24.00" fill="none"
                            xmlns="http://www.w3.org/2000/svg" stroke="#dc2626" stroke-width="0.00024000000000000003">
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z"
                                    fill="#dc2626"></path>
                            </g>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex flex-col gap-2 mb-5">
                <label for="kategori" class="form font-medium text-xl">Kategori</label>
                <select name="category_id" id="category_id"
                    class="rounded-md border border-gray-200 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('category_id') !border-red-300 @enderror">
                    <option value="">
                        Pilih Kategori
                    </option>
                    @foreach ($categories as $category)
                        @if (old('category_id', $data->category_id) == $category->id)
                            <option value="{{ $category->id }}">
                                {{ $category->nama }}
                            </option>
                        @else
                            <option value="{{ $category->id }}">
                                {{ $category->nama }}
                            </option>
                        @endif
                    @endforeach
                </select>

                @error('category_id')
                    <div class="flex flex-row text-red-600 mt-1 items-center gap-1">
                        <svg class="w-7 h-7" width="256px" height="256px" viewBox="0 0 24.00 24.00" fill="none"
                            xmlns="http://www.w3.org/2000/svg" stroke="#dc2626" stroke-width="0.00024000000000000003">
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z"
                                    fill="#dc2626"></path>
                            </g>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex flex-col gap-2 mb-5">
                <label for="gambar" class="form font-medium text-xl">Gambar</label>
                <input type="hidden" value="{{ $data->gambar }}" name="gambarlama">
                @if ($data->gambar)
                    <img src="{{ asset('images/'. $data->gambar) }}" class="hidden max-w-full h-auto tampil-gambar mb-3" alt="">
                @else
                    <img src="" width="500px" alt="" class="hidden max-w-full h-auto tampil-gambar mb-3">
                @endif
                <input type="file"
                    class="rounded-md border border-gray-200 bg-white @error('gambar') !border-red-300 @enderror"
                    name="gambar" id="gambar" onchange="tampilGambar()">
                @error('gambar')
                    <div class="flex flex-row text-red-600 mt-1 items-center gap-1">
                        <svg class="w-7 h-7" width="256px" height="256px" viewBox="0 0 24.00 24.00" fill="none"
                            xmlns="http://www.w3.org/2000/svg" stroke="#dc2626" stroke-width="0.00024000000000000003">
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z"
                                    fill="#dc2626"></path>
                            </g>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex flex-col gap-2 mb-5">
                <label for="slug" class="form font-medium text-xl">Tag</label>
                <input type="text" class="rounded-md border border-gray-200 @error('tag') !border-red-300 @enderror"
                    name="tag" id="tokenfield" value="{{ old('tag', $tags) }}">
                <p class="mt-1 text-sm text-gray-700" id="">pisahkan dengan koma</p>
                @error('tag')
                    <div class="flex flex-row text-red-600 mt-1 items-center gap-1">
                        <svg class="w-7 h-7" width="256px" height="256px" viewBox="0 0 24.00 24.00" fill="none"
                            xmlns="http://www.w3.org/2000/svg" stroke="#dc2626" stroke-width="0.00024000000000000003">
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z"
                                    fill="#dc2626"></path>
                            </g>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex flex-col gap-2 mb-5">
                <label for="isi" class="form font-medium text-xl">Isi</label>
                <textarea name="isi" id="editor" class="rounded-md border-gray-200">{{ old('isi', $data->isi) }}</textarea>
                @error('isi')
                    <div class="flex flex-row text-red-600 mt-1 items-center gap-1">
                        <svg class="w-7 h-7" width="256px" height="256px" viewBox="0 0 24.00 24.00" fill="none"
                            xmlns="http://www.w3.org/2000/svg" stroke="#dc2626" stroke-width="0.00024000000000000003">
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z"
                                    fill="#dc2626"></path>
                            </g>
                        </svg>

                        {{ $message }}
                    </div>
                @enderror
            </div>

                <button type="submit" class="flex flex-row gap-1 bg-blue-500 text-white p-2 rounded-md">
                    <i class="fa-solid fa-floppy-disk my-auto"></i>
                    <span class="h-fit w-fit my-auto">Simpan</span>
                </button>
            </div>
        </form>
    </div>

    <style>
        .ck-content {
            min-height: 100px;
        }

        .tokenfield.form-control{
            border-width: 1px;
            border-radius: 0.375rem;
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219 / var(--tw-border-opacity));
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
            padding-top: 0.625rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity));
            background-position: right .75rem center;
            background-repeat: no-repeat;
            background-size: .75em .75em;
            padding-right: 2.5rem;
            print-color-adjust: exact;
        }
    </style>

    <script>
        // console.log({!! 'slug' !!});
        // console.log({!! 'tokenfields' !!});

        function getSlug() {
            $.get('{{ url('/slug-artikel') }}', {
                    'judul': $('#judul').val()
                },
                function(data) {
                    $('#slug').val(data.slug)
                }
            )
        }
    </script>

    <script>
        $('#tokenfield').tokenfield({
        autocomplete: {
            source: [],
            delay: 100
        },
            showAutocompleteOnFocus: true
        })
    </script>
@endsection
