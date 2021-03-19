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

                                    <input class="form-control" id="validationTooltip02" type="text" placeholder="Search" required="">
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>
                            </div>
                            <button class="btn btn-secondary ml-2">Search</button>
                </form>
                <button class="btn btn-primary ml-2" data-toggle="modal" data-target="#addModal">Add</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>jangka waktu</th>
                        <th>jumlah angsuran</th>
                        <th>angsuran ke</th>
                        <th>angsuran masuk</th>
                        <th>jumlah tunggakan</th>
                        <th>keterangan</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div>
        </div>
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
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light for-light" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-secondary for-dark" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    @endsection