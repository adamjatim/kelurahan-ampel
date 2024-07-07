@extends('dashboard.layout.main')

@section('content')
  
<div class="p-4 w-full overflow-x-hidden flex flex-col gap-5">
  <div class="flex flex-row justify-between">
    <h1 class="font-medium text-4xl my-2">Edit Slide</h1>
    <div class="flex flex-row gap-2 h-fit my-auto">
      <a href="/dashboard/slide" class="text-blue-600 h-fit">
        <i class="fa-solid fa-arrow-left"></i>
        Kembali
      </a>
    </div>
  </div>

  @if ($errors->any())  
    <div class="p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
      {{ 'Update slide gagal...' }}
    </div>
  @endif

  <form action="/dashboard/slide/{{ $data->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="flex flex-col gap-2 mb-5">
      <label for="judul" class="form font-medium text-xl">Headline</label>
      <input type="text" class="rounded-md border border-gray-200 @error('judul') !border-red-300 @enderror" name="judul" id="judul" value="{{ old('judul', $data->judul) }}">
      @error('judul')
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
      <label for="gambar" class="form font-medium text-xl">Gambar</label>
      <input type="hidden" value="{{ $data->gambar }}" name="gambarLama">
      @if ($data->gambar)
        <img src="{{ asset('images/' . $data->gambar) }}" width="500px" alt="" class="max-w-full h-auto tampil-gambar mb-3">
      @else
        <img src="" width="500px" alt="" class="max-w-full h-auto tampil-gambar mb-3">
      @endif
      <input type="file" class="rounded-md border border-gray-200 bg-white @error('gambar') !border-red-300 @enderror" name="gambar" id="gambar" onchange="tampilGambar()">
      @error('gambar')
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
      <label for="kutipan" class="form font-medium text-xl">Kutipan</label>
      <textarea name="kutipan" id="editor" class="rounded-md border-gray-200">{{ old('kutipan', $data->kutipan) }}</textarea>
      @error('kutipan')
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

    <button type="submit" class="flex flex-row gap-1 bg-blue-500 text-white p-2 rounded-md">
      <i class="fa-solid fa-floppy-disk my-auto"></i>
      <span class="h-fit w-fit my-auto">Update</span>
    </button>
  </form>
</div>

<style>
  .ck-content {
    min-height: 100px;
  }
</style>

@endsection