<nav class="bg-blue-50 border-gray-200 dark:bg-gray-900 sticky top-0 z-20">
  <div class="max-w-screen flex flex-wrap items-center justify-between lg:px-10 px-7 py-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('blog')}}/assets/logo-surabaya.png" class="h-10" alt="Kelurahan Ampel Logo" />
      <span class="font-sans self-center font-semibold text-sm antialiased whitespace-nowrap dark:text-white">KELURAHAN AMPEL</span>
    </a>

    <button data-collapse-toggle="navbar-default" type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
      aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>

    <div class="hidden w-full lg:block lg:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 lg:p-0 mt-4 border border-gray-100 rounded-lg bg-blue-50 lg:flex-row lg:space-x-8 rtl:space-x-reverse lg:mt-0 lg:border-0 lg:bg-blue-50 dark:bg-gray-800 lg:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="#"
            class="block py-2 px-3 text-gray-900 rounded hover:bg-sky-200 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent text-sm"
          >Mengenal Ampel</a>
        </li>
        <li>
          <a href="#"
            class="block py-2 px-3 text-gray-900 rounded hover:bg-sky-200 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent text-sm"
            >Layanan Publik</a>
        </li>
        <li>
          <a href="#"
            class="block py-2 px-3 text-gray-900 rounded hover:bg-sky-200 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent text-sm"
            >Informasi Publik</a>
        </li>
        <li>
          <a href="#"
            class="block py-2 px-3 text-gray-900 rounded hover:bg-sky-200 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent text-sm"
            >Contact</a>
        </li>
        <li>
          <a href="/login"
            class="block py-2 px-3 text-gray-900 rounded hover:bg-sky-200 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent text-sm"
            >Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>