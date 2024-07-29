@extends('dashboard.layout.main')

@section('content')
    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">About</h1>

            <div class="flex max-w-full ">
                <form action="/dashboard" method="POST" enctype="multipart/form-data" class="mb-5 w-full">
                    @if (Session::get('info'))
                        <div class="text-blue-500 info">
                            {{ Session::get('info') }}
                        </div>
                    @endif
                    {{-- MAIN FORM --}}
                    @csrf
                    @method('PUT')
                    <div class="my-2">
                        <label for="words" class="form font-medium mt-1 text-sm text-gray-700">* masukkan tentang ampel</label>
                        <textarea name="words" id="editor">{{ old('words', auth()->user()->words) }}</textarea>
                        @error('words')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-row gap-2">
                        <button type="submit" class="flex flex-row gap-1 bg-blue-500 text-white p-2 rounded-md">
                            <i class="fa-solid fa-floppy-disk my-auto"></i>
                            <span class="h-fit w-fit my-auto">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <style>
        .ck-content {
            min-height: 100px;
        }

        .tokenfield.form-control {
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
    @if ($title == 'Artikel')
        <script>
            $('#tokenfield').tokenfield({
                autocomplete: {
                    source: [{!! $source !!}],
                    delay: 100
                },
                showAutocompleteOnFocus: true
            })
        </script>
    @endif
@endsection
