@extends('layouts.app', ['title' => 'KPR | Kalkulator'])
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Pinjaman KPR</h5>
                    <hr>
                    <h4>Besar PInjaman</h4>
                    <p>Rp.{{ $besar_pinjaman }}</p>
                    <h4>Bunga</h4><p>Bunga {{ $bunga }}</p>
                    <h4>Jangka Waktu</h4><p>Jangka Waktu(bulan) {{ $jangka }}</p>
                    <h4>NRP User</h4><p>NRP User {{ auth()->user()->nrp }}</p>
                    <h4>Besar Angsuran <p>{{ $besar_angsuran }}</p></h4>
                    <h4>Anuitas <p>{{ $anuitas }}</p></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th style="background-color:yellow;width:100px">no</th>
                                @php
                                for($i = 0; $i <= $no;$i++){ echo '<td>' . $i .'</td>';
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
                                for($i = 0; $i < $no;$i++){ echo '<td>' . $besar_angsuran .'</td>';
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
                <div class="card-footer">
                    <form action="{{ route('pinjaman.store') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $besar_pinjaman }}" name="besar_pinjaman">
                        <input type="hidden" value="{{ $bunga }}" name="bunga">
                        <input type="hidden" value="{{ $jangka }}"name="jangka">
                        <input type="hidden" value="{{ $besar_angsuran }}" name="besar_angsuran">
                        <input type="hidden" value="{{ auth()->user()->nrp }}" name="nrp">
                        <input type="hidden" value="{{ $anuitas }}" name="anuitas">
                        <a href="{{route('home')}}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary">Ajukan Pinjaman</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection
