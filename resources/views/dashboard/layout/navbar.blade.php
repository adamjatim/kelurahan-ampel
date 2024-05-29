<nav class="bg-gray-800 dark:bg-blue-50 border-gray-200 dark:bg-gray-900 sticky top-0 z-20">
  <div class="max-w-screen flex flex-wrap items-center justify-between lg:px-8 px-7 py-4">
    <a class="flex items-center space-x-3 rtl:space-x-reverse w-[45px] h-[45px]" id="sidebarToggle">
      <span class="font-sans self-center font-semibold text-sm antialiased whitespace-nowrap text-white px-2 py-2 bg-blue-500 rounded">
        <svg width="30px" height="30px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#FFFFFF" stroke-width="0.528"></g><g id="SVGRepo_iconCarrier"> <path d="M4 6H20M4 12H20M4 18H20" stroke="#FFFFFF" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
      </span>
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
      <ul class="font-medium flex flex-col p-4 lg:p-0 mt-4 border border-gray-100 rounded-lg bg-blue-50 lg:flex-row lg:space-x-8 rtl:space-x-reverse lg:mt-0 lg:border-0 lg:bg-transparent dark:bg-gray-800 lg:dark:bg-gray-900 dark:border-gray-700">
        {{-- <li>
          <a href="#"
            class="block py-2 px-3 text-gray-900 lg:text-gray-100 rounded hover:bg-sky-200 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-300 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent text-sm"
          >Mengenal Ampel</a>
        </li>
        <li>
          <a href="#"
            class="block py-2 px-3 text-gray-900 lg:text-gray-100 rounded hover:bg-sky-200 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-300 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent text-sm"
            >Layanan Publik</a>
        </li>
        <li>
          <a href="#"
            class="block py-2 px-3 text-gray-900 lg:text-gray-100 rounded hover:bg-sky-200 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-300 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent text-sm"
            >Informasi Publik</a>
        </li>
        <li>
          <a href="#"
            class="block py-2 px-3 text-gray-900 lg:text-gray-100 rounded hover:bg-sky-200 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-300 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent text-sm"
            >Contact</a>
        </li> --}}
        <li>
          <a 
            class="block py-2 px-3 text-gray-900 lg:text-gray-100 rounded hover:bg-sky-200 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-300 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent text-sm">
            <button class="!w-full md:w-fit flex items-center justify-between text-gray-900 lg:text-gray-100 rounded hover:bg-sky-200 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent" id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar">
              {{ auth()->user()->name }}
              <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg>
            </button>
          </a>
          
          <!-- Dropdown menu -->
          <div id="dropdownNavbar" class="hidden lg:!absolute lg:w-fit lg:!right-10 lg:!left-auto lg:!top-[77px] !transform-none w-full !relative font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
              <li>
                <a href="/" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Beranda</a>
              </li>
            </ul>
            <div class="py-1">
              <form action="logout" method="POST">
                @csrf
                <button class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" type="submit">Logout</button>
              </form> 
            </div>
          </div>

        </li>
      </ul>
    </div>
  </div>
</nav>