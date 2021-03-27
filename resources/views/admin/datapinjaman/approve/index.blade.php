@extends('layouts.app', ['title' => 'KPR | Pinjaman Approve' ])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header b-l-primary border-3">
                <h5>Data Pinjaman <span class="badge badge-success">Verified</span></h5>
                <form action="" method="post">
                    <div class="d-flex justify-content-end pt-4">
                        <div class="input-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" id="validationTooltip02" type="text" placeholder="Search" required="">
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>
                            </div>
                            <button class="btn btn-secondary ml-2">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Pangkat</th>
                        <th>Kesatuan</th>
                        <th>Tahap</th>
                        <th>Pinjaman</th>
                        <th>Jangka Waktu</th>
                        <th>TMT Angsuran</th>
                        <th>Jumlah angsuran</th>
                        <th>Angsuran ke</th>
                        <th>Angsuran Masuk</th>
                        <th>Tunggakan</th>
                        <th>Jml Tunggakan</th>
                        <th>Ket.</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>


@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/js/datatable/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('datatable')
    <script src="{{ asset('assets/js/datatable/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        const pinjam = '{{ request()->pinjam }}'
        const dataUrl = '{{ route('admin.detaildata.datatables', request()->pinjam) }}'
        const csrf = '{{ csrf_token() }}'
    </script>
    <script src="{{ asset('datatables/admin/datapinjaman/approve.js') }}"></script>
@endpush