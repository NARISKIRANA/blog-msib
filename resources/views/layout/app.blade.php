<!doctype html>
<html lang="en">
     <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>@yield('title')</title>
          {{-- Bootstrap --}}
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

          <!-- DataTables CSS -->
          <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

          <!-- SweetAlert -->
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

          @stack('css')

          <style>
               body {
                    font-size: 0.9em;
                    display: flex;
                    flex-direction: column;
                    min-height: 100vh;
               }

               .container {
                    flex: 1;
               }
          </style>
     </head>
     <body>

          @include('layout.navbar')

          <div class="container mt-2">
               @yield('content')
          </div>

          @include('layout.footer')

          {{-- Bootstrap --}}
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

          <!-- jQuery -->
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

          <!-- DataTables JS -->
          <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

          <!-- SweetAlert -->
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

          @stack('scripts')
     </body>
</html>