@extends('layouts.app', ['title' => 'KPR | Rekapdata Tahun' ])
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Cari Data Dengan Tahun</h5>
                </div>
                <div class="card-body">
                    <form class="form-group"action="{{ route('admin.rekapdata.index') }}" method="get">
                        <select name="tahun">
                            @forelse ($years as $key => $year )
                            <option value="{{ $year }}" {{ $year == $currentYear  ? 'selected' : '' }}>{{ $year }}</option>    
                            @empty
                                <option value="">Tidak Ada Tahun</option>
                            @endforelse
                        </select>
                        <button>Cari</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>&middot;Rekap Data</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <h4>{{ "Rp." . number_format($totalTunggakan, 0,',','.') }}</h4><span><u>Total
                                    Tunggakan</u></span>
                        </div>
                        <div class="col-md-4">
                            <h4>{{$user}}</h4><span><u>Total Debitur</u></span>
                        </div>
                        <div class="col-md-4">
                            <h4>{{ "Rp." . number_format($totalPinjaman, 0,',','.') }}</h4><span><u>Total
                                    Pinjaman</u></span>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <h4>{{ "Rp." . number_format($totalPokok, 0,',','.') }}</h4><span><u>Total Pokok</u></span>
                        </div>
                        <div class="col-md-6">
                            <h4>{{ "Rp." . number_format($totalBunga, 0,',','.') }}</h4><span><u>Total Bunga</u></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection
