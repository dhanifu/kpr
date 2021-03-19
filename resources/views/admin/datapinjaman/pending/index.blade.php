@extends('layouts.app', ['title' => 'KPR | '.request()->path() ])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header b-l-primary border-3">
                    <h5>Data Pinjaman <span class="badge badge-warning">Pending</span></h5>
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
                            <th>jangka waktu</th>
                            <th>jumlah angsuran</th>
                            <th>angsuran ke</th>
                            <th>angsuran masuk</th>
                            <th>angsuran Tunggak</th>
                            <th>jumlah tunggakan</th>
                            <th>keterangan</th>
                            <th>Status</th>
                            <th colspan="2">option</th>
                        </tr>
                    </thead>
                    @forelse ($pinjams as $pinjam)
                        <tbody>
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $pinjam->user->name }}</td>
                                <td>{{ $pinjam->user->pangkat->pangkat }}</td>
                                <td>{{ $pinjam->user->pangkat->corps }}</td>
                                <td>{{ $pinjam->user->nrp }}</td>
                                <td>{{ $pinjam->user->pangkat->kesatuan }}</td>
                                <td>{{ $pinjam->user->pangkat->tahap }}</td>
                                <td>{{ $pinjam->jangka_waktu }}</td>
                                <td>{{ $pinjam->jmlangs }}</td>
                                <td>{{ $pinjam->angsuran_ke }}</td>
                                <td>{{ $pinjam->angsuran_masuk }}</td>
                                <td>{{ $pinjam->angsuran_tunggak }}</td>
                                <td>{{ $pinjam->jml_tunggak }}</td>
                                <td>{{ $pinjam->keterangan }}</td>
                                @if ($pinjam->status == 0)
                                    <td><span class="badge badge-warning">Pending</span></td>
                                @endif
                                <td>
                                    <form action="{{ route('admin.detaildata.status', $pinjam->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-success mb-1">Approve
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


@endsection
