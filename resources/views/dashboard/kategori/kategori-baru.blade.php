@extends('dashboard.layout.main')

@section('content')
  
<div class="p-4 w-full overflow-x-hidden flex flex-col gap-5">
  <div class="flex flex-row justify-between">
    <h1 class="font-medium text-4xl my-2">Kategori Baru</h1>
    <div class="flex flex-row gap-2 h-fit my-auto">
      <a href="/dashboard/kategori " class="text-blue-600 h-fit">
        <i class="fa-solid fa-arrow-left"></i>
        Kembali
      </a>
    </div>
  </div>

  @if (Session::get('info'))
    <div class="p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
      {{ Session::get('info') }}
    </div>
  @endif

  <form action="/dashboard/kategori" method="post" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col gap-2 mb-5">
      <label for="nama" class="form font-medium text-xl">Nama Kategori</label>
      <input type="text" class="rounded-md border border-gray-200 @error('nama') !border-red-300 @enderror" name="nama" id="kategori" value="{{ old('nama') }}" onkeyup="getSlug()">
      @error('nama')
        <div class="flex flex-row text-red-600 mt-1 items-center gap-1">
        <svg class="w-7 h-7" width="256px" height="256px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#dc2626" stroke-width="0.00024000000000000003">
          <g id="SVGRepo_iconCarrier"> 
            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z" fill="#dc2626"></path>
          </g>
        </svg>
        {{ $message }}
      </div>
      @enderror
    </div>
        
        <div class="flex flex-col gap-2 mb-5">
          <label for="slug" class="form font-medium text-xl">Slug</label>
          <input type="text" class="rounded-md border border-gray-200 @error('slug') !border-red-300 @enderror" name="slug" id="slug" value="{{ old('slug') }}">
          @error('slug')
            <div class="flex flex-row text-red-600 mt-1 items-center gap-1">
            <svg class="w-7 h-7" width="256px" height="256px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#dc2626" stroke-width="0.00024000000000000003">
              <g id="SVGRepo_iconCarrier"> 
                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z" fill="#dc2626"></path>
              </g>
            </svg>
            {{ $message }}
          </div>
          @enderror
        </div>

    <div class="flex flex-col gap-2 mb-5">
      <label for="deskripsi" class="form font-medium text-xl">Deskripsi</label>
      <textarea name="deskripsi" id="editor" class="rounded-md border-gray-200">{{ old('deskripsi') }}</textarea>
      @error('deskripsi')
        <div class="flex flex-row text-red-600 mt-1 items-center gap-1">
          <svg class="w-7 h-7" width="256px" height="256px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#dc2626" stroke-width="0.00024000000000000003">
            <g id="SVGRepo_iconCarrier"> 
              <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z" fill="#dc2626"></path>
            </g>
          </svg>

          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="flex flex-row gap-2">
      <button type="reset" class="flex flex-row gap-1 bg-red-500 text-white p-2 rounded-md">
        <i class="fa-solid fa-xmark my-auto"></i>
        <span class="h-fit w-fit my-auto">Reset</span>
      </button>

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
</style>

<script>
    function getSlug() {
        $.get('{{ url('/slug-kategori') }}',{'kategori': $
            ('#kategori').val()},
            function(data){
                $('#slug').val(data.slug)
            }
        )
    }
</script>

@endsection