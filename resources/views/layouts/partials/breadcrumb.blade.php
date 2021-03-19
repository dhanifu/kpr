<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3 class="text-secondary"><u>Menu</u></h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"> <i data-feather="home"></i></a>
                    </li>
                    @if(request()->is('home'))
                        <li class="breadcrumb-item">Home</li>
                    @endif
                    @if(request()->is('profile/setting'))
                        <li class="breadcrumb-item">My Profile</li>
                    @endif
                    @if(request()->is('account/password'))
                        <li class="breadcrumb-item">Account</li>
                        <li class="breadcrumb-item">Change Password</li>
                    @endif
                    @if(request()->is('admin/account/register'))
                        <li class="breadcrumb-item">Kelola Akun</li>
                        <li class="breadcrumb-item">Daftar</li>
                    @endif
                    @if(request()->is('admin/account/admin'))
                        <li class="breadcrumb-item">Kelola Akun</li>
                        <li class="breadcrumb-item">Admin</li>
                    @endif
                    @if(request()->is('admin/account/pengelola'))
                        <li class="breadcrumb-item">Kelola Akun</li>
                        <li class="breadcrumb-item">Pengelola</li>
                    @endif
                    @if(request()->is('admin/account/user'))
                        <li class="breadcrumb-item">Kelola Akun</li>
                        <li class="breadcrumb-item">User</li>
                    @endif
                    @if(request()->is('admin/account/boss'))
                        <li class="breadcrumb-item">Kelola Akun</li>
                    @endif
                    @if(request()->is('admin/account/boss'))
                        <li class="breadcrumb-item">Kelola Akun</li>
                    @endif
                    @if(request()->is('admin/pangkat'))
                        <li class="breadcrumb-item">Kelola Akun</li>
                        <li class="breadcrumb-item">Pangkat</li>
                    @endif
                    @if(request()->is('admin/account/verifikasi'))
                        <li class="breadcrumb-item">Kelola Akun</li>
                        <li class="breadcrumb-item">Verifikasi Akun</li>
                    @endif
                    @if(request()->is('admin/rekapdata/Bulan'))
                        <li class="breadcrumb-item">Rekap Data KPR</li>
                        <li class="breadcrumb-item">Perbulan</li>
                    @endif
                    @if(request()->is('admin/rekapdata/Tahun'))
                        <li class="breadcrumb-item">Rekap Data KPR</li>
                        <li class="breadcrumb-item">Pertahun</li>
                    @endif
                    @if(request()->is('admin/detaildata/AngsuranKe'))
                        <li class="breadcrumb-item">Detail Angsuran</li>
                        <li class="breadcrumb-item">Angsuran Ke</li>
                    @endif
                    @if(request()->is('admin/detaildata/Pokok'))
                        <li class="breadcrumb-item">Detail Angsuran</li>
                        <li class="breadcrumb-item">Pokok</li>
                    @endif
                    @if(request()->is('admin/detaildata/Bunga'))
                        <li class="breadcrumb-item">Detail Angsuran</li>
                        <li class="breadcrumb-item">Bunga</li>
                    @endif
                    @if(request()->is('admin/detaildata/BesarAngsuran'))
                        <li class="breadcrumb-item">Detail Angsuran</li>
                        <li class="breadcrumb-item">Besar Angsuran</li>
                    @endif
                    @if(request()->is('admin/detaildata/SisaAngsuran'))
                        <li class="breadcrumb-item">Detail Angsuran</li>
                        <li class="breadcrumb-item">Sisa Angsuran</li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>
