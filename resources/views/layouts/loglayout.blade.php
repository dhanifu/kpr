<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('stylelogin/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('stylelogin/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('stylelogin/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('stylelogin/css/style.css')}}">

    <link rel="icon" href="{{asset('assets/images/logo-tni.png')}}">

    <title>{{ "KPR | " . $title }}</title>
  </head>
  <body>
    {{-- content --}}
    @yield('content')
    {{-- swal --}}
    @include('sweetalert::alert')
    {{-- script --}}
    <script src="{{asset('stylelogin/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('stylelogin/js/popper.min.js')}}"></script>
    <script src="{{asset('stylelogin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('stylelogin/js/main.js')}}"></script>
  </body>
</html>