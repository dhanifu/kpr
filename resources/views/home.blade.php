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
                                    <p class="font-roboto">Overview of last month</p>
                                </div>
                            </div>
                        </div>
                        <div id="chartUser"></div>
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
        Highcharts.chart('chartUser', {
        chart: {
            type: 'area'
        },
        accessibility: {
            description: 'Image description: An area chart compares the nuclear stockpiles of the USA and the USSR/Russia between 1945 and 2017. The number of nuclear weapons is plotted on the Y-axis and the years on the X-axis. The chart is interactive, and the year-on-year stockpile levels can be traced for each country. The US has a stockpile of 6 nuclear weapons at the dawn of the nuclear age in 1945. This number has gradually increased to 369 by 1950 when the USSR enters the arms race with 6 weapons. At this point, the US starts to rapidly build its stockpile culminating in 32,040 warheads by 1966 compared to the USSR’s 7,089. From this peak in 1966, the US stockpile gradually decreases as the USSR’s stockpile expands. By 1978 the USSR has closed the nuclear gap at 25,393. The USSR stockpile continues to grow until it reaches a peak of 45,000 in 1986 compared to the US arsenal of 24,401. From 1986, the nuclear stockpiles of both countries start to fall. By 2000, the numbers have fallen to 10,577 and 21,000 for the US and Russia, respectively. The decreases continue until 2017 at which point the US holds 4,018 weapons compared to Russia’s 4,500.'
        },
        title: {
            text: 'Report'
        },
        // subtitle: {
        //     text: 'Sources: <a href="https://thebulletin.org/2006/july/global-nuclear-stockpiles-1945-2006">' +
        //         'thebulletin.org</a> &amp; <a href="https://www.armscontrol.org/factsheets/Nuclearweaponswhohaswhat">' +
        //         'armscontrol.org</a>'
        // },
        xAxis: {
            allowDecimals: false,
            labels: {
                formatter: function () {
                    return this.value; // clean, unformatted number for year
                }
            },
            accessibility: {
                rangeDescription: 'Range: 1940 to 2017.'
            }
        },
        yAxis: {
            title: {
                text: 'Nuclear weapon states'
            },
            labels: {
                formatter: function () {
                    return this.value / 1000 + 'k';
                }
            }
        },
        tooltip: {
            pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
        },
        plotOptions: {
            area: {
                pointStart: 1940,
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{
            name: 'USA',
            data: [
                null, null, null, null, null, 6, 11, 32, 110, 235,
                369, 640, 1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468,
                20434, 24126, 27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342,
                26662, 26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
                24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586, 22380,
                21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950, 10871, 10824,
                10577, 10527, 10475, 10421, 10358, 10295, 10104, 9914, 9620, 9326,
                5113, 5113, 4954, 4804, 4761, 4717, 4368, 4018
            ]
        }, {
            name: 'USSR/Russia',
            data: [null, null, null, null, null, null, null, null, null, null,
                5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
                1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                11643, 13092, 14478, 15915, 17385, 19055, 21205, 23044, 25393, 27935,
                30062, 32049, 33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000,
                37000, 35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
                21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
                12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
            ]
        }]
    });
    </script>
@endpush