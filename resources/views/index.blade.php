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
                class="navbar-brand p-0" href="{{ route('index') }}"><img src="{{ asset('assets/images/logo-tni.png') }}" alt=""></a>
              <button class="navbar-toggler navabr_btn-set custom_nav" type="button" data-toggle="collapse"
                data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false"
                aria-label="Toggle navigation"><span></span><span></span><span></span></button>
              <div class="navbar-collapse justify-content-start collapse hidenav" id="navbarDefault">
                <ul class="navbar-nav navbar_nav_modify ml-5" id="scroll-spy">
                  <li class="nav-item mr-4"><a class="nav-link" href="#dashboards">Home</a></li>
                  <li class="nav-item mr-4"><a class="nav-link" href="#tentangkami">Tentang
                      Kami</a></li>
                  <li class="nav-item mr-4"><a class="nav-link" href="#kontakkami">Hubungi
                      Kami</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Sign in</a></li>
                </ul>
              </div>
            </nav>
          </header>
        </div>
        <div class="row" id="#dashboards">
          <div class="col-md-6">
            <div class="content">
              <div class="font-light" style="margin-bottom: 100px;">
                <h1>PERUMAHAN TNI AD</h1>
                <h2>Aspirasi Guna Kesejahteraan</h2>
                <h2>Prajurit TNI AD</h2>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="wow fadeIn mt-2"><img style="width:100%;margin-left:80px"
                src="{{asset('assets/images/rumahawan.png')}}" alt="rumah"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <section class="cuba-demo-section font-weight-bold" id="tentangkami" style="background-color: white;">
      <div class="container">
        <div class="row p-5">
          <div class="col-sm-5">

            <h2>Lebih Dari 12 tahun
              melayani lebih
              dari 17.000 Perumahan
              Prajurit TNI Angkatan Darat</h2>


          </div>
          <div class="col-sm-5 offset-sm-2">

            <p>Sejak tahun 2019 Kredit Pemilikan Rumah Swakelola Rumah TNI AD telah tersebar hampir diseluruh
              indonesia dengan proses yang memudahkan prajurit untuk memiliki rumah untuk kesejahteraan dan masa depan
              setiap prajurit TNI AD</p>
          </div>
        </div>
      </div>
    </section>
    <section class="section-space cuba-demo-section font-weight-bold" id="layout" style="background-color: white;">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 wow pulse">
            <div class="cuba-demo-content mt50">
              <div class="couting">
                <h1>Rp. 2T</h1>
                <p style="color: black;font-size:14px;">Penyaluran Dana KPR Swakelola</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 wow pulse">
            <div class="cuba-demo-content mt50">
              <div class="couting">
                <h1>17K+</h1>
                <p style="color: black;font-size:14px;">Prajurit memiliki perumahan</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 wow pulse">
            <div class="cuba-demo-content mt50">
              <div class="couting">
                <h1>30+</h1>
                <p style="color: black;font-size:14px;">Lokasi perumahan tersebar diseluruh indonesia</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="cuba-demo-section" id="kontakkami" style="background-color: white;">
          <div class="row mx-2">
              <div class="col-sm-5 font-weight-bold">
                <p>Alamat Kantor: <br>
                  Dr. Wahidin I No 6, Ps Baru, Kecamatan Sawah Besar,
                  Kota Jakarta Pusat, Daerah khusus Ibukota Jakarta 10710</p>
              </div>

              <div class="col-sm-4 pt-5 offset-md-3">
                <p>Copyright @2021 Ditkuad TNI AD - All Right Reserved</p>
              </div>
              
          </div>
      
    </section>
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