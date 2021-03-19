<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="KPR">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="{{ asset('assets/images/logo-tni.png') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{asset ('assets/images/logo-tni.png')}}" type="image/x-icon">
  <title>Aplikasi KPR</title>
  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
    rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset ('assets/css/fontawesome.css')}}">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/icofont.css')}}">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/themify.css')}}">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/flag-icon.css')}}">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/feather-icon.css')}}">
  <!-- Plugins css start-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/bootstrap.css')}}">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
  <link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
</head>
<style>
  html {
    scroll-behavior: smooth;
  }

  body {
    background: #224914;
  }

  ul {
    display: grid;
    list-style-type: none;
    margin: 0;
    padding: 0;
    grid-template-columns: repeat(3, auto);
    grid-template-rows: repeat(2, auto);
  }

  ul li {
    padding: 2em;
    color: black;
  }

  ul li span {
    display: block;
    font-size: 1.4em;
    margin-bottom: 1em;
    color: white;
  }
</style>

<body class="landing-page font-roboto" id="body">
  <!-- page-wrapper Start-->
  <div class="page-wrapper landing-page">
    <!-- Page Body Start           -->
    <div class="landing-home" id="dashboards">
      <div class="container-fluid">
        <div class="sticky-header">
          <header>
            <nav class="navbar navbar-b navbar-trans navbar-expand-xl fixed-top nav-padding" id="sidebar-menu"><a
                class="navbar-brand p-0" href="#"><img style="height: 100px;" src="{{asset('assets/images/logo-tni.png')}}" alt=""></a>
              <div class="navbar-collapse justify-content-end collapse hidenav" id="navbarDefault"
                style="margin-right: 450px;">
                <ul class="navbar-nav navbar_nav_modify" id="scroll-spy">
                  <li class="nav-item" style="margin-right: 20px;"><a class="nav-link" href="#dashboards">Home</a></li>
                  <li class="nav-item" style="margin-right: 20px;"><a class="nav-link" href="#tentangkami">Tentang
                      Kami</a></li>
                  <li class="nav-item" style="margin-right: 20px;"><a class="nav-link" href="#kontakkami">Hubungi
                      Kami</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Sign in</a></li>
                </ul>
              </div>
            </nav>
          </header>
        </div>
        <div class="row" id="#dashboards">
          <div class="">
            <div class="content">
              <div class="font-light" style="margin-left:100px; margin-bottom: 100px;">
                <h1>PERUMAHAN TNI AD</h1>
                <h2>Aspirasi Guna Kesejahteraan</h2>
                <h2>Prajurit TNI AD</h2>
              </div>
            </div>
          </div>
          <div class="col-xl-7 col-lg-6">
            <div class="wow fadeIn"><img style="margin-top: 150px;width:100%;margin-left:80px"
                src="{{asset('assets/images/rumah2.png')}}" alt=""></div>
          </div>
        </div>
      </div>
    </div>
    <section class="cuba-demo-section" id="tentangkami" style="background-color: white;">
      <div class="container">
        <ul>
          <li style="margin-top: 30px;">
            <h2>Lebih Dari 12 tahun <br>
              melayani lebih <br>
              dari 17.000 Perumahan <br>
              Prajurit TNI Angkatan Darat</h2>
          </li>
          <li style="margin-left: 200px;margin-top: 50px; width:70%;">
            <p>Sejak tahun 2019 Kredit Pemilikan Rumah Swakelola Rumah TNI AD telah tersebar hampir diseluruh
              indonesia dengan proses yang memudahkan prajurit untuk memiliki rumah untuk kesejahteraan dan masa depan
              setiap prajurit TNI AD</p>
          </li>
        </ul>
        <div class="row" style="margin-top: 30px;">
          <div class="col-sm-12 wow pulse">
            <div class="cuba-demo-content mt50">
              <ul>
                <li>
                  <div class="couting">
                    <h2 style="color: black">Rp. 2T</h2>
                    <p style="color: black;font-size:14px;">Penyaluran Dana KPR Swakelola</p>
                  </div>
                </li>
                <li>
                  <div class="couting">
                    <h2 style="color: black">17K++</h2>
                    <p style="color: black;font-size:14px;">Prajurit Memiliki Perumahan</p>
                  </div>
                </li>
                <li>
                  <div class="couting">
                    <h2 style="color: black">30+</h2>
                    <p style="color: black;font-size:14px;">Lokasi Perumahan tersebar seluruh Indonesia</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul id="kontakkami">
          <li style="margin-top: 30px;">
            <p>Alamat Kantor: <br>
              Jl. Dr. Wahidin I No 6, Ps Baru, Kecamatan Sawah Besar,<br>
               Kota Jakarta Pusat, Daerah khusus Ibukota Jakarta 10710</p>
          </li>
          <li style="margin-left: 200px;margin-top: 70px; width:70%;">
            <p>Copyright &#169; Ditkuad TNI AD - All Rights Reserved</p>
          </li>
        </ul>
      </div>
    </section>
  </div>

  <!-- latest jquery-->
  <script src="{{ asset('assets/js/jquery-3.5.1.min.js')}}"></script>
  <!-- Bootstrap js-->
  <script src="{{ asset('assets/js/bootstrap/popper.min.js')}}"></script>
  <script src="{{ asset('assets/js/bootstrap/bootstrap.js')}}"></script>
  <!-- feather icon js-->
  <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
  <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
  <!-- Sidebar jquery-->
  <script src="{{ asset('assets/js/config.js')}}"></script>
  <!-- Plugins JS start-->
  <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
  <script src="{{ asset('assets/js/animation/wow/wow.min.js')}}"></script>
  <script src="{{ asset('assets/js/landing_sticky.js')}}"></script>
  <script src="{{ asset('assets/js/landing.js')}}"></script>
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="{{ asset('assets/js/script.js')}}"></script>
  <!-- login js-->
  <!-- Plugin used-->
</body>

</html>