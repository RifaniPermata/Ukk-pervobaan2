<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    @yield('css')
     <title>@yield('title')</title>
</head>

<body>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	 @yield('js')
    {{-- Footer --}}
  {{--   <footer class="text-center p-4 text-white bg-secondary ml-auto">
      © 2021 PERAKAT | By
      <a href="https://www.instagram.com/rfni_p/" class="text-white" target="_blank">@rfni_p</a>
    </footer> --}}
      <footer class="main-footer p-4 bg-secondary text-center text-white" style="background: #0d0d0d !important">
    <strong>Copyright Perakat &copy; 2021 <a href="https://www.instagram.com/rfni_p/">@rfni_p</a>.</strong>
  </footer>
</body>

</html>
