<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl bg-gray-700">
  <div class="p-6">
    <a href="/dashboard" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin Kelurahan Ampel</a>
  </div>

  <nav class="text-white text-base font-semibold pt-3">
    <a href="/dashboard" 
        class="flex items-center py-4 pl-6 nav-item {{ $title == 'About' ? 'bg-white text-gray-700' : 'text-white opacity-75 hover:opacity-100 hover:bg-gray-800'}}">
        About
    </a>
    <a href="/dashboard/slide"
        class="flex items-center py-4 pl-6 nav-item {{ $title == 'Slide' ? 'bg-white text-gray-700' : 'text-white opacity-75 hover:opacity-100 hover:bg-gray-800'}}">
        Slide
    </a>
    <a href="/dashboard/kategori/"
        class="flex items-center py-4 pl-6 nav-item {{ $title == 'Category' ? 'bg-white text-gray-700' : 'text-white opacity-75 hover:opacity-100 hover:bg-gray-800'}}">
        Category 
    </a>
    <a href=""
        class="flex items-center py-4 pl-6 nav-item {{ $title == 'Article' ? 'bg-white text-gray-700' : 'text-white opacity-75 hover:opacity-100 hover:bg-gray-800'}}">
        Article
    </a>
  </nav>
</aside>