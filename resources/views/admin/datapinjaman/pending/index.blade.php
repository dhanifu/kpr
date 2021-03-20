@extends('layouts.app', ['title' => 'KPR | Pinjaman Pending' ])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header b-l-primary border-3">
                    <h5>Data Pinjaman <span class="badge badge-warning">Manual</span></h5>
                    <form action="" method="post">
                        <div class="d-flex justify-content-end pt-4">
                            <div class="input-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" id="validationTooltip02" type="text"
                                            placeholder="Search" required="">
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
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th>id</th>
                            <th>Nama</th>
                            <th>Pangkat</th>
                            <th>Corps</th>
                            <th>NRP</th>
                            <th>Kesatuan</th>
                            <th>Tahap</th>
                            <th>Pinjaman</th>
                            <th>jangka waktu</th>
                            <th>TMT Angsuran</th>
                            <th>Jumlah angsuran</th>
                            <th>angsuran ke</th>
                            <th>angsuran masuk</th>
                            <th> tunggakan</th>
                            <th>jumlah tunggakan</th>
                            <th>keterangan</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    @forelse ($pinjams as $pinjam)
                        <tbody>
                            <tr>
                            <th>{{ $loop->iteration }}</th>
                                <td>{{ $pinjam->nama }}</td>
                                <td>{{ $pinjam->pangkat }}</td>
                                <td>{{ $pinjam->corps }}</td>
                                <td>{{ $pinjam->nrp }}</td>
                                <td>{{ $pinjam->kesatuan }}</td>
                                <td>{{ $pinjam->tahap }}</td>
                                <td>{{ "IDR. " . number_format($pinjam->pinjaman, 0,',','.') }}</td>
                                <td>{{ $pinjam->jk_waktu }}</td>
                                <td>{{ $pinjam->tmt_angsuran }}</td>
                                <td>{{ "Rp. " . number_format($pinjam->jml_angs, 0,',','.') }}</td>
                                <td>{{ $pinjam->angs_ke }}</td>
                                <td>{{ $pinjam->angsuran_masuk }}</td>
                                <td>{{ $pinjam->tunggakan }}</td>
                                <td>{{ $pinjam->jml_tunggakan }}</td>
                                <td>{{ $pinjam->keterangan }}</td>
                                @if ($pinjam->status == 0)
                                    <td><span class="badge badge-warning">Manual</span></td>
                                @endif
                                <td>
                                    <form action="{{ route('admin.detaildata.status', $pinjam->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-success mb-1">Verified
                                    </form>

                                    <form action="{{ route('admin.pangkat.destroy', $pinjam->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            style="background-color: transparent; border: none;">Decline</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @empty
                        <tbody>
                            <tr>
                                <th colspan="15" style="color: red; text-align: center;">Data Empty!</th>
                            </tr>
                        </tbody>
                    @endforelse
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div>
            </div>
        </div>
    </div>
    </div>
    </div>


@endsection