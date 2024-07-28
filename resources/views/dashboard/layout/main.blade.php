<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>{{ config('app.name')}} -> {{ $title }}</title>
  <link rel="icon" type="image/x-icon" href="{{ secure_asset('admin/assets/favicon.ico') }}" />
  <link rel="icon" type="image/x-icon" href="{{ asset('admin/assets/favicon.ico') }}" />
  {{-- Core theme CSS --}}
  <link rel="stylesheet" href="{{ asset('admin/css/styles.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('admin/css/styles.css') }}">
  {{-- Core theme CSS (Tailwind) --}}
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- Core theme CSS (Flowbite) --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  {{-- Jquery cdn --}}
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  {{-- Font awsome cdn --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  {{-- CKEditor cdn --}}
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
  {{-- Data Tables cdn --}}
  <script rel="stylesheet" src="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css"></script>
  {{-- jQuery UI CSS --}}
  <link href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.css">
  {{-- tokenfields js --}}
  <script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script> 
</head>

<body class="bg-gray-100 flex">
  {{-- Sidebar --}}
  @include('dashboard.layout.sidebar')

  <div class="w-full flex flex-col h-screen overflow-y-hidden">
    {{-- Top navigation --}}
    @include('dashboard.layout.navbar')
    
    {{-- Page content --}}
    @yield('content')
    

  </div>
  <!-- AlpineJS -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  {{-- Flowbite core JS --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  {{-- Core theme JS --}}
  <script src="{{ asset('admin/js/scripts.js') }}"></script>
  <script src="{{ secure_asset('admin/js/scripts.js') }}"></script>
  {{-- Data Tables js --}}
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.tailwindcss.js"></script>
  
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
    // new DataTable('#myTable');
  </script>

  
</body>

</html>
