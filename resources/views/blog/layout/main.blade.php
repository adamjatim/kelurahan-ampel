<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  
  <title>{{ isset($title) ? config('app.name') . ' - ' . $title : config('app.name') }}</title>
  
  {{-- Favicon --}}
  <link rel="icon" type="image/x-icon" href="{{ secure_asset('blog/assets/favicon.ico') }}" />
  <link rel="icon" type="image/x-icon" href="{{ asset('blog/assets/favicon.ico') }}" />
  {{-- Core theme CSS --}}
  <link rel="stylesheet" href="{{ asset('blog/css/styles.css')}}">
  <link rel="stylesheet" href="{{ secure_asset('blog/css/styles.css')}}">
  {{-- Core theme CSS (Tailwind) --}}
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- Core theme CSS (Flowbite) --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  {{-- Mobile Link Responsive CSS --}}
  <link rel="stylesheet" href="{{ asset('mystyle.css') }}">
</head>

<body>

  {{-- Responsive navbar --}}
  @include('blog.layout.navbar')

  {{-- make sure slide only exsist in '/' --}}
  @if (Request::is('/'))
    {{-- Page header with logo and tagline --}}
    @include('blog.layout.slide')
  @endif

  
    
  {{-- Page content --}}
  <div class="max-w-full mx-auto">
    <div class="flex flex-col lg:flex-row">
      <!-- Blog entries-->
      @yield('content')
      
      {{-- make sure aside only exsist in '/' --}}
      @if ($title != 'Login')
        {{-- Side widgets --}}
        @include('blog.layout.aside')
      @endif

    </div>
  </div>

  {{-- Footer --}}
  <footer class="py-5 bg-gray-700 flex flex-col">
    <div class="flex flex-row justify-center justify-items-center mt-6 mb-4">
      <img class="h-12" src="{{ asset('blog') }}/assets/logo-surabaya.png" alt="">
      <a class="my-auto mx-5 text-lg text-white font-medium">Kelurahan Ampel</a>
    </div>

    <div class="flex xl:flex-row lg:flex-row md:flex-row flex-col xl:my-auto lg:my-auto md:my-auto justify-evenly">
      <div class="max-w-72 m-auto">
        <svg class="w-12 m-auto my-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xml:space="preserve"><g fill="#FFFFFF">
          <path d="M29.818 22.13a7.427 7.427 0 0 0 1.646-4.665C31.465 13.349 28.116 10 24 10c-4.116 0-7.465 3.349-7.465 7.465 0 1.767.62 3.39 1.649 4.669a7.468 7.468 0 0 0-3.806 6.498v4.752A2.62 2.62 0 0 0 16.995 36h14.008a2.62 2.62 0 0 0 2.617-2.616v-4.752a7.492 7.492 0 0 0-3.802-6.502zM24 12a5.47 5.47 0 0 1 5.465 5.465A5.471 5.471 0 0 1 24 22.931a5.471 5.471 0 0 1-5.465-5.466A5.47 5.47 0 0 1 24 12zm7.621 21.384c0 .34-.277.616-.617.616H16.996a.617.617 0 0 1-.617-.616v-4.752a5.46 5.46 0 0 1 3.374-5.035A7.415 7.415 0 0 0 24 24.931a7.413 7.413 0 0 0 4.249-1.336 5.48 5.48 0 0 1 3.372 5.037v4.752z"></path>
          <path d="M24 48C10.767 48 0 37.233 0 24S10.767 0 24 0s24 10.767 24 24-10.767 24-24 24zm0-46C11.869 2 2 11.869 2 24s9.869 22 22 22 22-9.869 22-22S36.131 2 24 2z"></path></g>
        </svg>
        <p class="text-white text-center">Dikelola oleh<br>
          Bidang Informasi dan Komunikasi Publik serta Statistik Dinas Komunikasi dan Informatika Kelurahan Ampel</p>
      </div>

      <div class="max-w-72 m-auto">
        <svg class="w-12 m-auto my-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xml:space="preserve">
          <path fill="#FFFFFF" d="M24 48C10.767 48 0 37.233 0 24S10.767 0 24 0s24 10.767 24 24-10.767 24-24 24zm0-46C11.869 2 2 11.869 2 24s9.869 22 22 22 22-9.869 22-22S36.131 2 24 2z"></path>
          <path fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M15.893 11.976c.224 0 .449.022.663.055l.018.005 2.342 1.103.011.009v.013a13.32 13.32 0 0 0-.442 3.367c.001 1.162.161 2.296.442 3.365v.014l-.011.004-2.341 1.106-.02.008a15.591 15.591 0 0 0 10.414 10.436l.009-.019 1.104-2.345.008-.017h.01c1.069.286 2.196.444 3.362.445a13.1 13.1 0 0 0 3.355-.445h.017l.007.016 1.102 2.346.004.019c.036.215.053.435.053.661a4.53 4.53 0 0 1-1.927 3.718c-.854.125-1.724.185-2.612.185-.888 0-1.758-.06-2.619-.185-8.653-1.155-15.506-8.02-16.663-16.693a18.88 18.88 0 0 1-.179-2.62c0-.892.059-1.762.18-2.62a4.514 4.514 0 0 1 3.713-1.931z"></path>
        </svg>
        <p class="text-white text-center">(031) 70905285</p>
      </div>

      <div class="max-w-72 m-auto ">
        <svg class="w-12 m-auto my-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xml:space="preserve">
          <path fill="#FFFFFF" d="M24 48C10.767 48 0 37.233 0 24S10.767 0 24 0s24 10.767 24 24-10.767 24-24 24zm0-46C11.869 2 2 11.869 2 24s9.869 22 22 22 22-9.869 22-22S36.131 2 24 2z"></path>
          <path fill="#FFFFFF" d="M24 37a.996.996 0 0 1-.707-.293L16.3 29.712l-.035-.033c-4.268-4.267-4.268-11.209-.001-15.475A10.867 10.867 0 0 1 24 11.001c2.923 0 5.67 1.137 7.736 3.203 4.267 4.266 4.267 11.208 0 15.474a.612.612 0 0 1-.036.034l-6.993 6.995A.997.997 0 0 1 24 37zm-6.348-8.762.037.035L24 34.586l6.31-6.312.037-.035c3.461-3.487 3.453-9.142-.025-12.62A8.882 8.882 0 0 0 24 13.002c-2.389 0-4.634.93-6.322 2.617-3.478 3.478-3.487 9.131-.026 12.619z"></path>
          <path fill="#FFFFFF" d="M24 27.263a5.289 5.289 0 0 1-3.764-1.559 5.332 5.332 0 0 1 0-7.527A5.289 5.289 0 0 1 24 16.618c1.422 0 2.759.554 3.764 1.559a5.332 5.332 0 0 1 0 7.527A5.289 5.289 0 0 1 24 27.263zm0-8.645c-.888 0-1.723.346-2.35.973a3.328 3.328 0 0 0 .001 4.699c1.252 1.254 3.444 1.254 4.698 0a3.328 3.328 0 0 0-.001-4.699A3.294 3.294 0 0 0 24 18.618z"></path>
        </svg>
        <p class="text-white text-center">Jl. Pegirian, Sidotopo, Kec. Semampir, Surabaya, Jawa Timur 60152</p>
      </div>
    </div>
    <p class="mt-16 mb-3 mx-10 py-5 border-t border-white text-center text-white">&copy; Kelurahan Ampel 2023</p>
  </footer>
  
  {{-- Tailwind Flowbite core JS --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
  <!-- Core theme JS-->
  <script src="{{ asset('blog/js/scripts.js') }}"></script>
  <script src="{{ secure_asset('blog/js/scripts.js') }}"></script>
  {{-- float-panel core JS --}}
  <script src="{{ asset('blog/float-panel/float-panel.js') }}"></script>
  <script src="{{ secure_asset('blog/float-panel/float-panel.js') }}"></script>
</body>

</html>
