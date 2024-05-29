<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard - Admin Kelurahan Ampel</title>
  <link rel="icon" type="image/x-icon" href="{{ secure_asset('admin/assets/favicon.ico') }}" />
  <link rel="icon" type="image/x-icon" href="{{ asset('admin/assets/favicon.ico') }}" />
  <!-- Core theme CSS -->
  {{-- <link rel="stylesheet" href="{{ asset('admin/css/styles.css') }}"> --}}
  {{-- <link rel="stylesheet" href="{{ secure_asset('admin/css/styles.css') }}"> --}}
  <!-- Core theme CSS (Tailwind)-->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Core theme CSS (Flowbite)-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  <!-- Jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body class="min-h-screen">
  <!-- Top navigation-->
  @include('dashboard.layout.navbar')

    <div class="flex flex-row" id="wrapper">
        <!-- Sidebar-->
        @include('dashboard.layout.sidebar')

        <!-- Page content wrapper-->
        <div id="page-content-wrapper" class="h-screen w-screen">

            <!-- Page content-->
            @yield('content')
        </div>
    </div>
    <!-- Flowbite core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script src="{{ secure_asset('admin/js/scripts.js') }}"></script>
</body>

</html>
