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
                        <table class="table table-striped">
                            <tr>
                                <th>Angsuran ke</th>
                                <th>Angsuran Pokok</th>
                                <th>Angsuran Bunga</th>
                                <th>Sisa Pinjaman Pokok</th>
                            </tr>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($all['bunga'] as $index => $value)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $all['bunga'][$index] }}</td>
                                <td>{{ $all['pokok'][$index] }}</td>
                                <td>{{ $all['pinjaman'][$index] }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection
