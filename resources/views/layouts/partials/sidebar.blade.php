<div class="sidebar-wrapper">
    {{-- style="background-image: linear-gradient(#134E5E, #71B280);" --}}
    @if (auth()->user()->role == '0')
    <div class="logo-wrapper">
        <a href="{{ route('home') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 100px; width: 200px; object-fit: cover;"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logowebdark.png') }}" alt="logowebsite" style="height: 100px; width: 200px; object-fit: cover;"></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper">
        <a href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 20px; width: 20px; object-fit: cover;"></a>
    </div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
            <ul class="sidebar-links custom-scrollbar">
                <li class="back-btn">
                    <a href="#"><img class="img-fluid" src="{{ asset('assets/images/logo/logowebdark.png') }}" alt=""></a>
                    <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                </li>
                {{-- @if (auth()->user()->role == 'admin') --}}
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}"><i data-feather="home"> </i><span>Dashboard</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>Kelola User</span></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ route('admin.account.register.index') }}">Daftar Akun</a></li>
                        <li><a href="{{ route('admin.account.admin') }}">Admin</a></li>
                        <li><a href="{{ route('admin.account.pengelola') }}">Pengelola</a></li>
                        <li><a href="{{ route('admin.account.customer') }}">User</a></li>
                        <li><a href="{{ route('admin.pangkat.index') }}">Daftar Pangkat</a></li>
                        <li><a href="{{ route('admin.account.verifikasi') }}">Verifikasi Akun User</a></li>
                    </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="book-open"></i><span>Rekap Data KPR</span></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ route('admin.rekapdata.bulan') }}">Perbulan</a></li>
                        <li><a href="{{ route('admin.rekapdata.tahun') }}">Pertahun</a></li>
                    </ul>
                </li>
                 <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="airplay"></i></i><span>Detail Data Angsuran</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ route('admin.detaildata.angsuranke') }}">Angsuran Ke</a></li>
                        <li><a href="{{ route('admin.detaildata.pokok') }}">Pokok</a></li>
                        <li><a href="{{ route('admin.detaildata.bunga') }}">Bunga</a></li>
                        <li><a href="{{ route('admin.detaildata.besarangsuran') }}">Besar Angsuran</a></li>
                        <li><a href="{{ route('admin.detaildata.sisaangsuran') }}">Sisa Angsuran</a></li>
                    </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="bookmark"></i><span>Detail Data</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ route('admin.detaildata.pinjam', 'approve') }}">Data KPR</a></li>
                        <li><a href="{{ route('admin.detaildata.pinjam', 'pending') }}">Manual</a></li>

                    </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('kalkulator') }}"><i data-feather="dollar-sign"></i><span>Kalkulator
                            KPR</span></a></li>
                {{-- @endif --}}
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="user"></i><span>My Profile</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ route('profile.setting') }}">Setting</a></li>
                        <li><a data-toggle="modal" data-target="#exampleModalCenter" href="#">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
    @endif
    @if (auth()->user()->role == '1')
    <div class="logo-wrapper">
        <a href="{{ route('home') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 100px; width: 200px; object-fit: cover;"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logowebdark.png') }}" alt="logowebsite" style="height: 100px; width: 200px; object-fit: cover;"></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper">
        <a href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 20px; width: 20px; object-fit: cover;"></a>
    </div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
            <ul class="sidebar-links custom-scrollbar">
                <li class="back-btn">
                    <a href="#"><img class="img-fluid" src="{{ asset('assets/images/logo/logowebdark.png') }}" alt=""></a>
                    <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                </li>
                {{-- @if (auth()->user()->role == 'admin') --}}
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}"><i data-feather="home"> </i><span>Dashboard</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="book-open"></i><span>Rekap Data KPR</span></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ route('admin.rekapdata.bulan') }}">Perbulan</a></li>
                        <li><a href="{{ route('admin.rekapdata.tahun') }}">Pertahun</a></li>
                    </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="airplay"></i></i><span>Detail Data Angsuran</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ route('admin.detaildata.angsuranke') }}">Angsuran Ke</a></li>
                        <li><a href="{{ route('admin.detaildata.pokok') }}">Pokok</a></li>
                        <li><a href="{{ route('admin.detaildata.bunga') }}">Bunga</a></li>
                        <li><a href="{{ route('admin.detaildata.besarangsuran') }}">Besar Angsuran</a></li>
                        <li><a href="{{ route('admin.detaildata.sisaangsuran') }}">Sisa Angsuran</a></li>
                    </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="bookmark"></i><span>Data Pinjaman</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ route('admin.detaildata.pinjam', 'approve') }}">Data KPR</a></li>
                        <li><a href="{{ route('admin.detaildata.pinjam', 'pending') }}">Manual</a></li>

                    </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.account.verifikasi') }}"><i data-feather="user-check"></i><span>Verifikasi User</span></a></li>
                {{-- @endif --}}
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="user"></i><span>My Profile</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ route('profile.setting') }}">Setting</a></li>
                        <li><a data-toggle="modal" data-target="#exampleModalCenter" href="#">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
    @endif
    @if (auth()->user()->role == '2')
    <div class="logo-wrapper">
        <a href="{{ route('home') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 100px; width: 200px; object-fit: cover;"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logowebdark.png') }}" alt="logowebsite" style="height: 100px; width: 200px; object-fit: cover;"></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper">
        <a href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 20px; width: 20px; object-fit: cover;"></a>
    </div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
            <ul class="sidebar-links custom-scrollbar">
                <li class="back-btn">
                    <a href="#"><img class="img-fluid" src="{{ asset('assets/images/logo/logowebdark.png') }}" alt=""></a>
                    <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                </li>
                {{-- @if (auth()->user()->role == 'admin') --}}
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}"><i data-feather="home"> </i><span>Dashboard</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('kalkulator') }}"><i data-feather="dollar-sign"></i><span>Kalkulator
                            KPR</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('user.pinjaman.index') }}"><i data-feather="file-plus"></i><span>Pinjaman</span></a></li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="#"><i data-feather="plus-circle"></i></i><span>Bayar Angsuran</span></a></li>
                {{-- @endif --}}
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="user"></i><span>My Profile</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ route('profile.setting') }}">Setting</a></li>
                        <li><a data-toggle="modal" data-target="#exampleModalCenter" href="#">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
    @endif
    @if ((auth()->user()->role == '3' && auth()->user()->email_verified_at == null) || auth()->user()->email_verified_at != null)
    <div class="logo-wrapper">
        <a href="{{ route('home') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 100px; width: 200px; object-fit: cover;"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logowebdark.png') }}" alt="logowebsite" style="height: 100px; width: 200px; object-fit: cover;"></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper">
        <a href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 20px; width: 20px; object-fit: cover;"></a>
    </div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
            <ul class="sidebar-links custom-scrollbar">

            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
    @endif
</div>
