@extends('blog.layout.main')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900 w-full">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0 slideanim">
    <a href="" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
      <img class="h-8 mr-2" src="{{ asset('blog') }}/assets/logo-surabaya.png" alt="logo">
      {{ config('app.name') }}
    </a>

    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        @if (session()->has('Gagal'))
          <div id="toast-default" class="flex items-center w-full p-4 text-gray-600 bg-red-200 rounded-lg" role="alert">
            <div class="ms-3 text-sm font-normal">{{ session('Gagal') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 text-gray-500 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
            </button>
          </div>
        @endif
        <form class="space-y-3 md:space-y-6" action="/login" method="post">
          @csrf {{-- handle session --}}
          <div class="!m-0">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username / NIP / Email</label>
            <input type="email" 
              name="email" id="email"
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-600 @enderror"
              placeholder="username">
              @error('email')
              <div class="flex flex-row text-red-600 mt-1 items-center gap-1">
                <svg class="w-7 h-7" width="256px" height="256px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#dc2626" stroke-width="0.00024000000000000003">
                  <g id="SVGRepo_iconCarrier"> 
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z" fill="#dc2626"></path>
                  </g>
                </svg>
                {{-- username harus diisi --}}
                {{ $message }}
              </div>
              @enderror
          </div>
          
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password"
              name="password"
              id="password"
              placeholder="password"
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  @error('password') border-red-600 @enderror"
              >
              @error('password')
              <div class="flex flex-row text-red-600 mt-1 items-center gap-1">
                <svg class="w-7 h-7" width="256px" height="256px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#dc2626" stroke-width="0.00024000000000000003">
                  <g id="SVGRepo_iconCarrier"> 
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM11.25 13.5V8.25H12.75V13.5H11.25ZM11.25 15.75V14.25H12.75V15.75H11.25Z" fill="#dc2626"></path>
                  </g>
                </svg>
                {{-- password harus diisi --}}
                {{ $message }}
              </div>
              @enderror
          </div>
          
          {{-- <div class="flex items-center justify-between">
            <div class="flex items-start">
              <div class="flex items-center h-5">
                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
              </div>
              <div class="ml-3 text-sm">
                <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
              </div>
            </div>
            <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
          </div> --}}
          
          <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
          
          {{-- <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Don’t have an account yet? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
          </p> --}}
        </form>
      </div>
    </div>
  </div>
</section>

{{-- <section class="bg-white dark:bg-gray-900 w-full">
  <div class="mx-auto my-auto text-center">
    <h1>Login sebagai</h1>
    <div class="flex lg:flex-row justify-evently">
      <div>Kelurahan</div>
      <div>RT / RW</div>
      <div>Warga</div>
      <div>Karang Taruna</div>
    </div>
  </div>
</section> --}}
@endsection

