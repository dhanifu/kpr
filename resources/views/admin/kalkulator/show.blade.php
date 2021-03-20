@extends('layouts.app', ['title' => 'KPR | Kalkulator'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Kalkulator KPR</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                  <th>no</th>
                                  @php
                                      for($i = 0; $i <= $no;$i++){
                                        echo '<td>'. $i .'</td>';
                                      }
                                  @endphp
                                </tr>
                                <tr>
                                    <th>bunga</th>
                                    @foreach ($all['bunga'] as $data)
                                        <td>{{ $data }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>pokok</th>
                                    @foreach ($all['pokok'] as $data)
                                        <td>{{ $data }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>pinjaman</th>
                                    @foreach ($all['pinjaman'] as $data)
                                        <td>{{ $data }}</td>
                                    @endforeach
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection