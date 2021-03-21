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
        <h1 class="badge badge-warning">Akun anda sedang di pending</h1>
    </div>
    @endif
    @if(auth()->user()->role == "2" || auth()->user()->email_verified_at != null)
    <div class="card">
        <div class="card-header">
            <h3>Langkah Verifikasi Akun</h3>
        </div>
        <div class="card-body">
            <form class="f1" method="post">
                <div class="f1-steps">
                    <div class="f1-progress">
                        <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3"></div>
                    </div>
                    @if(auth()->user()->role == "3" || auth()->user()->email_verified_at != null && auth()->user()->role == "2")
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
                        <input class="form-control" id="f1-first-name" type="text" name="f1-first-name" placeholder="name@example.com" required="">
                    </div>
                    <div class="form-group mb-2">
                        <label for="f1-last-name">Last name</label>
                        <input class="f1-last-name form-control" id="f1-last-name" type="text" name="f1-last-name" placeholder="Last name..." required="">
                    </div>
                    <div class="f1-buttons">
                        <button class="btn btn-primary btn-next" type="button">Next</button>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group mb-2">
                        <label class="sr-only" for="f1-email">Email</label>
                        <input class="f1-email form-control" id="f1-email" type="text" name="f1-email" placeholder="Email..." required="">
                    </div>
                    <div class="form-group mb-2">
                        <label class="sr-only" for="f1-password">Password</label>
                        <input class="f1-password form-control" id="f1-password" type="password" name="f1-password" placeholder="Password..." required="">
                    </div>
                    <div class="form-group mb-2">
                        <label class="sr-only" for="f1-repeat-password">Repeat password</label>
                        <input class="f1-repeat-password form-control" id="f1-repeat-password" type="password" name="f1-repeat-password" placeholder="Repeat password..." required="">
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
    <div class="row second-chart-list third-news-update">
        <div class="col-xl-9 xl-100 chart_data_left box-col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row m-0 chart-main">
                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                            <div class="media align-items-center">
                                <div class="hospital-small-chart">
                                    <div class="small-bar">
                                        <div class="small-chart flot-chart-container"></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="right-chart-content">
                                        <h4>{{ $pangkats }}</h4><span><u>Pangkat</u></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                            <div class="media align-items-center">
                                <div class="hospital-small-chart">
                                    <div class="small-bar">
                                        <div class="small-chart1 flot-chart-container"></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="right-chart-content">
                                        <h4>{{ $user }}</h4><span><u>User</u></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                            <div class="media align-items-center">
                                <div class="hospital-small-chart">
                                    <div class="small-bar">
                                        <div class="small-chart2 flot-chart-container"></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="right-chart-content">
                                        <h4>{{ $admin }}</h4><span><u>Admin</u></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                            <div class="media border-none align-items-center">
                                <div class="hospital-small-chart">
                                    <div class="small-bar">
                                        <div class="small-chart3 flot-chart-container"></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="right-chart-content">
                                        <h4>{{ $pengelola }}</h4><span><u>Pengelola</u></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 xl-100 dashboard-sec box-col-12">
            <div class="card earning-card">
                <div class="card-body p-0">
                    <div class="row m-0">
                        <div class="col-xl-3 earning-content p-0">
                            <div class="row m-0 chart-left">
                                <div class="col-xl-12 p-0 left_side_earning">
                                    <h5>Dashboard</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 box-col-12">
                              <div class="card-body chart-block">
                                <canvas id="myBarGraph"></canvas>
                              </div>
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
            labels: ["Admin", "User Terverifikasi", "Belum Verifikasi", "Pengelola"],
            datasets: [
                {
                    label: 'Status Verifikasi User',
                    backgroundColor: {!! json_encode($chart->colours)!!} ,
                    data:  {!! json_encode($chart->dataset)!!} ,
                },
            ]
        },
// Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value) {if (value % 1 === 0) {return value;}}
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
