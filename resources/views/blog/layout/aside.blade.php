<div class="m-5 lg:w-2/6">
        
  <!-- Search widget-->
  <form>
    <div class="flex flex-col border rounded-lg slideanim">
      <div class="px-2 py-3 bg-gray-200 rounded-t-lg dark:bg-gray-700">
        <label for="location-search" class="mx-2 text-md font-medium text-gray-900 dark:text-white">Search</label>
      </div>

      <div class="flex w-full px-3 py-4">
        <input type="search" id=location-search" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-s-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Enter search term...  " required>
        <button type="submit" class="block p-2.5 text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
          <span class="sr-only">Search</span>
        </button>
      </div>
    </div>
  </form>
  
  <!-- Categories widget-->
  <div class="my-6 border rounded-lg slideanim">
    <div class="px-2 py-3 bg-gray-200 rounded-t-lg dark:bg-gray-700">
      <span class="mx-2 text-md font-medium text-gray-900 dark:text-white">Categories</span></div>
    <div class="grid flex-rows grid-cols-2 gap-2 px-3 py-3">
      @foreach ( $categories as $category)
      <ul class="my-auto mx-2">
        <li class="">
          <a href="#!" class="decoration-none flex-grid justify-between grid-auto-cols ">
            <span>
              {{ $category->nama }}
            </span>
          </a>
        </li>
      </ul>
      @endforeach
    </div>
  </div>

  <!-- Side widget-->
  {{-- <div class="card mb-4">
    <div class="card-header">Side Widget</div>
    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
      use, and feature the Bootstrap 5 card component!</div>
  </div> --}}
</div>