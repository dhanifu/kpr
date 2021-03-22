@extends('layouts.app', ['title' => 'KPR | Rekapdata Bulan' ])
@section('content')
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
                                    <h4>{{ "Rp." . number_format($totaltunggakan, 0,',','.') }}</h4><span><u>Total Tunggakan</u></span>
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
                                    <h4>{{ $user }}</h4><span><u>Total Customer</u></span>
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
                                    <h4>{{ "Rp." . number_format($jumlahpinjaman, 0,',','.') }}</h4><span><u>Total Pinjaman</u></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-md-12 box-col-12">
        <div class="card">
          <div class="card-header">
            <h5>Statistik Customer</h5>
          </div>
          <div class="card-body chart-block">
            <canvas id="myBarGraph"></canvas>
          </div>
        </div>
      </div>
    <div class="col-md-12">
        {{-- <div class="card">
            <div class="card-header b-l-primary border-3">
                <h5>Statistik Tahun ini <button type="button" class="btn btn-success btn-md" data-toggle="tooltip" data-placement="bottom" title="Statisk Customer"><i data-feather="bar-chart"></i></button></h5>
                <div class="d-flex justify-content-end">
                        <div class="input-group pt-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" id="validationTooltip02" type="text" placeholder="Search" required="">
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>
                            </div>
                            <button class="btn btn-secondary ml-2">Search</button>
                        </div>
                    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div> --}}
    </div>
</div>
{{-- add data modal --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Add New Account</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('admin.account.register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="avatar">Image (Nullable):</label>
                                <input class="form-control" type="file" name="avatar" id="avatar">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name">Name:</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="your name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="email">E-Mail:</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="your email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="role">Role:</label>
                                <select name="role" id="role" class="form-control custom-select" required>
                                    <option disabled selected>Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="customer">Customer</option>
                                    <option value="boss">Boss</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="username">Username:</label>
                                <input class="form-control" type="text" name="username" id="username" placeholder="username" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="password">Password:</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="****" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light for-light" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-secondary for-dark" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('myBarGraph').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
// The data for our dataset
        data: {
            labels: ["Admin", "User Terverifikasi", "Belum Verifikasi"],
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
@endsection
