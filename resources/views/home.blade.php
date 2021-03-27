@extends('layouts.app', ['title' => 'KPR | Home'])
@section('content')
<div class="container-fluid">
    @if(auth()->user()->role == "3" && auth()->user()->email_verified_at == null)
    <div class="card p-3">
        <h1>Silahkan cek email untuk verifikasi.</h1>
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                <p> Tidak Menerima Email? Cek spam atau kirim ulang.</p>
            </button>
        </form>
    </div>
    @endif
    @if(auth()->user()->role == "3" && auth()->user()->email_verified_at != null)
    <div class="card p-3">
        <h1 class="badge badge-warning">Akun anda sedang dalam proses verifikasi</h1>
    </div>
    @endif
    @if(auth()->user()->role == "2" || auth()->user()->email_verified_at != null)
    <div class="card">
        <div class="card-header">
            <h3>Langkah Verifikasi Akun</h3>
        </div>
        <div class="card-body">
            <form class="f1" method="post">
                @csrf
                <div class="f1-steps">
                    <div class="f1-progress">
                        <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3"></div>
                    </div>
                    @if(auth()->user()->role == "3" || auth()->user()->email_verified_at != null && auth()->user()->role
                    == "2")
                    <div class="f1-step active">
                        <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                        <p>Email</p>
                    </div>
                    @else
                    <div class="f1-step">
                        <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                        <p>Email</p>
                    </div>
                    @endif
                    @if(auth()->user()->role == "2" && auth()->user()->status_verif == 1)
                    <div class="f1-step active">
                        <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                        <p>Approval Pengelola</p>
                    </div>
                    @else
                    <div class="f1-step">
                        <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                        <p>Approval Pengelola</p>
                    </div>
                    @endif
                    @if(auth()->user()->role == "2")
                    <div class="f1-step active">
                        <div class="f1-step-icon"><i class="fa fa-money"></i></div>
                        <p>Pinjaman</p>
                    </div>
                    @else
                    <div class="f1-step">
                        <div class="f1-step-icon"><i class="fa fa-money"></i></div>
                        <p>Pinjaman</p>
                    </div>
                    @endif
                </div>
                <fieldset>
                    <div class="form-group mb-2">
                        <label for="f1-first-name">First Name</label>
                        <input class="form-control" id="f1-first-name" type="text" name="f1-first-name"
                            placeholder="name@example.com" required="">
                    </div>
                    <div class="form-group mb-2">
                        <label for="f1-last-name">Last name</label>
                        <input class="f1-last-name form-control" id="f1-last-name" type="text" name="f1-last-name"
                            placeholder="Last name..." required="">
                    </div>
                    <div class="f1-buttons">
                        <button class="btn btn-primary btn-next" type="button">Next</button>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group mb-2">
                        <label class="sr-only" for="f1-email">Email</label>
                        <input class="f1-email form-control" id="f1-email" type="text" name="f1-email"
                            placeholder="Email..." required="">
                    </div>
                    <div class="form-group mb-2">
                        <label class="sr-only" for="f1-password">Password</label>
                        <input class="f1-password form-control" id="f1-password" type="password" name="f1-password"
                            placeholder="Password..." required="">
                    </div>
                    <div class="form-group mb-2">
                        <label class="sr-only" for="f1-repeat-password">Repeat password</label>
                        <input class="f1-repeat-password form-control" id="f1-repeat-password" type="password"
                            name="f1-repeat-password" placeholder="Repeat password..." required="">
                    </div>
                    <div class="f1-buttons">
                        <button class="btn btn-primary btn-previous" type="button">Previous</button>
                        <button class="btn btn-primary btn-next" type="button">Next</button>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group mb-2">
                        <label class="sr-only">DD</label>
                        <input class="form-control" id="dd" type="number" placeholder="dd" required="">
                    </div>
                    <div class="form-group mb-2">
                        <label class="sr-only">MM</label>
                        <input class="form-control" id="mm" type="number" placeholder="mm" required="">
                    </div>
                    <div class="form-group mb-2">
                        <label class="sr-only">YYYY</label>
                        <input class="form-control" id="yyyy" type="number" placeholder="yyyy" required="">
                    </div>
                    <div class="f1-buttons">
                        <button class="btn btn-primary btn-previous" type="button">Previous</button>
                        <button class="btn btn-primary btn-submit" type="submit">Submit</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    @endif
    @if(auth()->user()->role == "0" || auth()->user()->role == "1")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>&middot;Rekap Data</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <h4>{{ "Rp." . number_format($totaltunggakan, 0,',','.') }}</h4><span><u>Total
                                    Tunggakan</u></span>
                        </div>
                        <div class="col-md-4">
                            <h4>{{ $user }}</h4><span><u>Total Debitur</u></span>
                        </div>
                        <div class="col-md-4">
                            <h4>{{ "Rp." . number_format($jumlahpinjaman, 0,',','.') }}</h4><span><u>Total
                                    Pinjaman</u></span>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <h4>{{ "Rp." . number_format($total_pokok, 0,',','.') }}</h4><span><u>Total Pokok</u></span>
                        </div>
                        <div class="col-md-6">
                            <h4>{{ "Rp." . number_format($total_bunga, 0,',','.') }}</h4><span><u>Total Bunga</u></span>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <h4>{{ "Rp." . number_format($total_pokok_otomatis, 0,',','.') }}</h4><span><u>Total Pokok
                                    (Hasil Hitung Otomatis)</u></span>
                        </div>
                        <div class="col-md-6">
                            <h4>{{ "Rp." . number_format($total_bunga_otomatis, 0,',','.') }}</h4><span><u>Total Bunga
                                    (Hasil Hitung Otomatis)</u></span>
                        </div>
                    </div>
                    <div class="card-header">
                        <h5>Rekap Data Tahun ini</h5>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <h4>{{ "Rp." . number_format($totaltunggakantahun, 0,',','.') }}</h4><span><u>Total
                                    Tunggakan</u></span>
                        </div>
                        <div class="col-md-4">
                            <h4>{{ $user }}</h4><span><u>Total Customer</u></span>
                        </div>
                        <div class="col-md-4">
                            <h4>{{ "Rp." . number_format($jumlahpinjamantahun, 0,',','.') }}</h4><span><u>Total
                                    Pinjaman</u></span>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <h4>{{ "Rp." . number_format($total_pokok_tahun, 0,',','.') }}</h4><span><u>Total
                                    Pokok</u></span>
                        </div>
                        <div class="col-md-6">
                            <h4>{{ "Rp." . number_format($total_bunga_tahun, 0,',','.') }}</h4><span><u>Total
                                    Bunga</u></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <canvas id="myBarGraph"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
@push('script')
<script>
    var ctx = document.getElementById('myBarGraph').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["Admin", "Belum Verifikasi", "User Terverifikasi", "Pengelola"],
            datasets: [{
                label: 'Status Verifikasi User',
                backgroundColor: {
                    !!json_encode($chart - > colours) !!
                },
                data: {
                    !!json_encode($chart - > dataset) !!
                },
            }, ]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function (value) {
                            if (value % 1 === 0) {
                                return value;
                            }
                        }
                    },
                    scaleLabel: {
                        display: false
                    }
                }]
            },
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: '#122C4B',
                    fontFamily: "'Muli', sans-serif",
                    padding: 25,
                    boxWidth: 25,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 0,
                    bottom: 10
                }
            }
        }
    });

</script>
@endpush
