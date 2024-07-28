@extends('dashboard.layout.main')

@section('content')
  
<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full flex-grow p-6">
    <h1 class="text-3xl text-black pb-6">About</h1>

    <div class="flex max-w-full ">
      <form action="/dashboard" method="POST" enctype="multipart/form-data" class="mb-5">
        @if (Session::get('info'))
        <div class="text-blue-500 info">
          {{ Session::get('info') }}
        </div>
        @endif
        {{-- MAIN FORM --}}
        @csrf
        @method('PUT')
        <div class="flex flex-wrap">
          <div class="grid-cols-5 pr-5">
            <div class="m-2 ml-0">
              <label for="foto" class="form font-medium text-xl mr-5">Foto</label>
                <input type="hidden" value="{{ auth()->user()->foto }}" name="fotolama" class="rounded-full w-96 h-96">
                @if (auth()->user()->foto)
                    <img src="{{ asset('images/'. auth()->user()->foto) }}" class="hidden tampil-gambar mb-3 grid-cols-5 rounded-full w-96 h-96" alt="">
                @else
                    <img src="" alt="" class="hidden tampil-gambar mb-3 grid-cols-5">
                @endif
                <input type="file"
                    class="rounded-md border border-gray-200 bg-white @error('foto') !border-red-300 @enderror"
                    name="foto" width="100px" id="gambar" onchange="tampilGambar()">
                @error('foto')
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
          </div>
          <div class="grid-cols-5 grid-flow-rows max-w-full border-l-2 pl-5">
            <div class="grid-rows-2 my-3">
              <label for="foto" class="form font-medium text-xl">Nama</label>
                <input type="text"
                    class="rounded-md border border-gray-200 bg-white @error('name') !border-red-300 @enderror"
                    name="name" id="name" value="{{ old('name', auth()->user()->name) }}">
                @error('name')
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
            <div class="my-2">
              <label for="email" class="form font-medium text-xl">Email</label>
                <input type="email"
                    class="rounded-md border border-gray-200 bg-white @error('email') !border-red-300 @enderror"
                    name="email" id="email" value="{{ old('email', auth()->user()->email) }}">
                @error('email')
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
            <div class="my-2">
              <label for="telpon" class="form font-medium text-xl ">Telpon</label>
                <input type="text"
                    class="rounded-md border border-gray-200 bg-white @error('telpon') !border-red-300 @enderror"
                    name="telpon" id="telpon" value="{{ old('telpon', auth()->user()->telpon) }}">
                @error('telpon')
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
          </div>
        </div>
        <div class="my-2">
          <label for="alamat" class="form font-medium text-xl">Alamat</label>
            <input type="textarea" name="alamat" id="alamat"
            class="rounded-md border border-gray-200 bg-white @error('telpon') !border-red-300 @enderror"
            value="{{ old('alamat', auth()->user()->alamat) }}"></input>
            @error('alamat')
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
        <div class="my-2">
          <label for="keahlian" class="form font-medium text-xl">Keahlian</label>
            <input type="text"
            class="rounded-md border border-gray-200 bg-white @error('telpon') !border-red-300 @enderror"
            name="keahlian" id="tokenfield" value="{{ old('keahlian', auth()->user()->keahlian) }}">
            <p class="mt-1 text-sm text-gray-700" id="">* pisahkan dengan koma</p> 
            @error('keahlian')
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
        <div class="my-2">
          <label for="words" class="form font-medium text-xl">Words</label>
          <textarea name="words" id="editor" >{{ old('words', auth()->user()->words) }}</textarea>
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

    <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-plus mr-3"></i> Monthly Reports
            </p>
            <div class="p-6 bg-white">
                <canvas id="chartOne" width="400" height="200"></canvas>
            </div>
        </div>
        <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-check mr-3"></i> Resolved Reports
            </p>
            <div class="p-6 bg-white">
                <canvas id="chartTwo" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <div class="w-full mt-12">
      <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Latest Reports
      </p>
      <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
          <thead class="bg-gray-800 text-white">
              <tr>
                  <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                  <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name
                  </th>
                  <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                  <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
              </tr>
          </thead>
          <tbody class="text-gray-700">
            <tr>
              <td class="w-1/3 text-left py-3 px-4">Lian</td>
              <td class="w-1/3 text-left py-3 px-4">Smith</td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="tel:622322662">622322662</a></td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
            <tr class="bg-gray-200">
              <td class="w-1/3 text-left py-3 px-4">Emma</td>
              <td class="w-1/3 text-left py-3 px-4">Johnson</td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="tel:622322662">622322662</a></td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
            <tr>
              <td class="w-1/3 text-left py-3 px-4">Oliver</td>
              <td class="w-1/3 text-left py-3 px-4">Williams</td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="tel:622322662">622322662</a></td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
            <tr class="bg-gray-200">
              <td class="w-1/3 text-left py-3 px-4">Isabella</td>
              <td class="w-1/3 text-left py-3 px-4">Brown</td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="tel:622322662">622322662</a></td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
            <tr>
              <td class="w-1/3 text-left py-3 px-4">Lian</td>
              <td class="w-1/3 text-left py-3 px-4">Smith</td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="tel:622322662">622322662</a></td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
            <tr class="bg-gray-200">
              <td class="w-1/3 text-left py-3 px-4">Emma</td>
              <td class="w-1/3 text-left py-3 px-4">Johnson</td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="tel:622322662">622322662</a></td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
            <tr>
              <td class="w-1/3 text-left py-3 px-4">Oliver</td>
              <td class="w-1/3 text-left py-3 px-4">Williams</td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="tel:622322662">622322662</a></td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
            <tr class="bg-gray-200">
              <td class="w-1/3 text-left py-3 px-4">Isabella</td>
              <td class="w-1/3 text-left py-3 px-4">Brown</td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="tel:622322662">622322662</a></td>
              <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                      href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <footer class="w-full bg-white text-right p-4">
    Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
  </footer>
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
@if ($title == 'About' || $title == 'Artikel')
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