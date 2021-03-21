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
                                  <th style="background-color:yellow;width:100px">no</th>
                                  @php
                                      for($i = 0; $i <= $no;$i++){
                                        echo '<td>'. $i .'</td>';
                                      }
                                  @endphp
                                </tr>
                                <tr>
                                    <th style="background-color:yellow;width:100px">Angsuran Pokok</th>
                                    @foreach ($all['pokok'] as $data)
                                        <td>{{ $data }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th style="background-color:yellow;width:100px">Angsuran Bunga</th>
                                    @foreach ($all['bunga'] as $data)
                                        <td>{{ $data }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th style="background-color:yellow;width:100px">Besar Angsuran</th>
                                    @php
                                        echo '<td></td>';
                                        for($i = 0; $i < $no;$i++){
                                        echo '<td>'. $besar_angsuran .'</td>';
                                        }
                                    @endphp
                                </tr>
                                <tr>
                                    <th style="background-color:yellow;width:100px">Sisa Pinjaman Pokok</th>
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
