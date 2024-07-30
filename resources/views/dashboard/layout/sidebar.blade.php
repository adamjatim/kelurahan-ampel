<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl bg-gray-700">
  <div class="p-6">
    <a href="/dashboard" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin Kelurahan Ampel</a>
  </div>

  <nav class="text-white text-base font-semibold pt-3">
    <a href="/dashboard/artikel/"
        class="flex items-center py-4 pl-6 nav-item {{ $title == 'Article' ? 'bg-white text-gray-700' : 'text-white opacity-75 hover:opacity-100 hover:bg-gray-800'}}">
        Artikel
    </a>
    <a href="/dashboard/kategori/"
        class="flex items-center py-4 pl-6 nav-item {{ $title == 'Category' ? 'bg-white text-gray-700' : 'text-white opacity-75 hover:opacity-100 hover:bg-gray-800'}}">
        Kategori
    </a>
    <a href="/dashboard/mengenal-ampel/"
        class="flex items-center py-4 pl-6 nav-item {{ $title == 'Mengenal Ampel' ? 'bg-white text-gray-700' : 'text-white opacity-75 hover:opacity-100 hover:bg-gray-800'}}">
        Mengenal Ampel
    </a>
    <a href="/dashboard/layanan-publik/"
        class="flex items-center py-4 pl-6 nav-item {{ $title == 'Layanan Publik' ? 'bg-white text-gray-700' : 'text-white opacity-75 hover:opacity-100 hover:bg-gray-800'}}">
        Layanan Publik
    </a>
    {{-- <a href="/dashboard/slide"
        class="flex items-center py-4 pl-6 nav-item {{ $title == 'Slide' ? 'bg-white text-gray-700' : 'text-white opacity-75 hover:opacity-100 hover:bg-gray-800'}}">
        Slide
    </a> --}}
    
    <a href="/dashboard/profile/" 
        class="flex items-center py-4 pl-6 nav-item {{ $title == 'Profile' ? 'bg-white text-gray-700' : 'text-white opacity-75 hover:opacity-100 hover:bg-gray-800'}}">
        Profile
    </a>
  </nav>
</aside>