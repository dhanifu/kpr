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
                    @if(request()->is('admin/account/'))
                        <li class="breadcrumb-item">Kelola Akun</li>
                        <li class="breadcrumb-item">Admin</li>
                    @endif
                    @if(request()->is('admin/account/customer'))
                        <li class="breadcrumb-item">Kelola Akun</li>
                        <li class="breadcrumb-item">Customer</li>
                    @endif
                    @if(request()->is('admin/account/boss'))
                        <li class="breadcrumb-item">Kelola Akun</li>
                    @endif
                    @if(request()->is('admin/account/boss'))
                        <li class="breadcrumb-item">Kelola Akun</li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>
