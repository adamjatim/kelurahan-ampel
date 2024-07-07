<!-- Desktop Header -->
<header class="w-full items-center py-2 px-6 hidden sm:flex bg-gray-800 text-white">
  <div class="w-1/2"></div>
  <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
    <div  @click="isOpen = !isOpen" class=" flex flex-row gap-2 z-10 h-12 cursor-pointer">
      {{-- <button
        class="realtive h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
        <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
      </button> --}}
      <div class="my-auto">
        {{ auth()->user()->name }}
      </div>

      <svg class="w-2.5 h-2.5 my-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
      </svg>
    </div>
    
    {{-- <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button> --}}
    <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16 text-gray-800">
      <a href="/" class="block px-4 py-2 account-link hover:bg-gray-300">Beranda</a>
      <form action="/logout" method="post">
        @csrf
        <button class="block px-4 py-2 account-link hover:bg-gray-300 w-full text-start" type="submit">Logout</button>
      </form>
    </div>
  </div>
</header>

<!-- Mobile Header & Nav -->
<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden bg-gray-800">
  <div class="flex items-center justify-between">
    <a href="/dashboard" class="text-white text-xl font-semibold uppercase hover:text-gray-300 flex flex-row gap-2">
      <img src="{{ asset('blog')}}/assets/logo-surabaya.png" class="h-10" alt="Kelurahan Ampel Logo" />
      <span class="my-auto">KELURAHAN AMPEL</span>
    </a>
    <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
      <i x-show="!isOpen" class="fas fa-bars"></i>
      <i x-show="isOpen" class="fas fa-times"></i>
    </button>
  </div>

  <!-- Dropdown Nav -->
  <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
    <a href="/dashboard" class="flex items-center text-white py-2 pl-4 nav-item hover:bg-gray-700 rounded-md {{ $title == 'About' ? '' : 'opacity-75'}}">
      About
    </a>
    <a href="/dashboard/slide"
      class="flex items-center text-white hover:opacity-100 py-2 pl-4 nav-item hover:bg-gray-700 rounded-md {{ $title == 'Slide' ? '' : 'opacity-75'}}">
      Slide
    </a>
    <a href="#"
      class="flex items-center text-white hover:opacity-100 py-2 pl-4 nav-item hover:bg-gray-700 rounded-md {{ $title == 'Category' ? '' : 'opacity-75'}}">
      Category
    </a>
    <a href="#"
      class="flex items-center text-white hover:opacity-100 py-2 pl-4 nav-item hover:bg-gray-700 rounded-md {{ $title == 'Article' ? '' : 'opacity-75'}}">
      Article
    </a>
    <span class="border-t opacity-75 w-[96%] mx-auto my-4"></span>
    <a href="/" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item hover:bg-gray-700 rounded-md">
      Beranda
    </a>
    <form action="/logout" method="post">
      @csrf
      <button class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item hover:bg-gray-700 rounded-md w-full"  type="submit">
        Logout
      </button>
    </form>
  </nav>
  <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
    <i class="fas fa-plus mr-3"></i> New Report
  </button> -->
</header>