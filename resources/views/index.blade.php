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
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
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
      html{
        scroll-behavior: smooth;
      }
      body{
        background: #134E5E;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #71B280, #134E5E);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #71B280, #134E5E); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      }
  </style>
  <body class="landing-page" id="body">
    <!-- page-wrapper Start-->
    <div class="page-wrapper landing-page">
      <!-- Page Body Start           -->
      <div class="landing-home" id="dashboards">
        <ul class="decoration">
          <li class="one"><img class="img-fluid" src="{{asset('assets/images/landing/decore/1.png')}}" alt=""></li>
          <li class="two"><img class="img-fluid" src="{{asset('assets/images/landing/decore/2.png')}}" alt=""></li>
          <li class="three"><img class="img-fluid" src="{{asset('assets/images/landing/decore/4.png')}}" alt=""></li>
          <li class="four"><img class="img-fluid" src="{{asset('assets/images/landing/decore/3.png')}}" alt=""></li>
          <li class="five"><img class="img-fluid" src="{{asset('assets/images/landing/2.png')}}" alt=""></li>
          <li class="six"><img class="img-fluid" src="{{asset('assets/images/landing/decore/cloud.png')}}" alt=""></li>
          <li class="seven"><img class="img-fluid" src="{{asset('assets/images/landing/2.png')}}" alt=""></li>
        </ul>
        <div class="container-fluid">
          <div class="sticky-header">
            <header>
              <nav class="navbar navbar-b navbar-trans navbar-expand-xl fixed-top nav-padding" id="sidebar-menu"><a class="navbar-brand p-0" href="#"><img src="{{asset('assets/images/ditkuad.png')}}" alt=""></a>
                <button class="navbar-toggler navabr_btn-set custom_nav" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>
                <div class="navbar-collapse justify-content-end collapse hidenav" id="navbarDefault">
                  <ul class="navbar-nav navbar_nav_modify" id="scroll-spy">
                    <li class="nav-item" style="margin-right: 20px;"><a class="nav-link" href="#dashboards">Home</a></li>
                    <li class="nav-item" style="margin-right: 20px;"><a class="nav-link" href="#tentangkami">Tentang Kami</a></li>
                    <li class="nav-item" style="margin-right: 20px;"><a class="nav-link" href="#kontakkami">Hubungi Kami</a></li>
                    <li class="nav-item buy-btn"><a class="nav-link" href="{{ route('login') }}">Sign in</a></li>
                  </ul>
                </div>
              </nav>
            </header>
          </div>
          <div class="row" id="#dashboards">
            <div class="col-xl-5 col-lg-6">
              <div class="content">
                <div style="margin-bottom: 100px;">
                  <h1>Managing</h1>
                  <h1>your accounting</h1>
                  <h1>has never simple</h1>
                </div>
              </div>
            </div>
            <div class="col-xl-7 col-lg-6">
              <div class="wow fadeIn"><img class="screen1" style="margin-top: 30px;" src="{{asset('assets/images/rumah.png')}}" alt=""></div>
              <div class="wow fadeIn"><img class="screen2" style="width:50%; height:50%;" src="{{asset('assets/images/tentara.png')}}" alt=""></div>
            </div>
          </div>
        </div>
      </div>
      <section class="section-space cuba-demo-section" id="tentangkami">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 wow pulse">
              <div class="cuba-demo-content mt50">
                <div class="couting">
                  <h3 style="color: white; float: left;">Tentang Kami</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-xl-12">
            <div class="card">
              <div class="card-body">
                <p class="mb-0 text-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-space cuba-demo-section" id="kontakkami">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 wow pulse">
              <div class="cuba-demo-content mt50">
                <div class="couting">
                  <h3 style="color: white; float: left;">Hubungi Kami</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-xl-12">
            <div class="card">
              <div class="card-body">
                  <h5 style="float: left;">Kantor Pusat:</h5>
                <p class="mt-3 wow fadeIn text-secondary" style="float: left; margin-left:100px;"><i class="icofont icofont-social-google-map"></i> Jl. Dr. Wahidin I No 6, Ps Baru, Kecamatan Sawah Besar, Kota Jakarta Pusat, Daerah khusus Ibukota Jakarta 10710</p>
              </div>
            </div>
          </div>
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
