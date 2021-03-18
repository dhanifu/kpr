@extends('layouts.app', ['title' => 'KPR | User Account'])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h5>Verifikasi Akun User</h5>
                <form action="" method="post">
                    <div class="d-flex justify-content-end">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input class="form-control" id="validationTooltip02" type="text" placeholder="Search" required="">
                                    <div class="valid-tooltip">Looks good!</div>
                                    <button class="btn btn-secondary ml-2">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">

                    </table>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>
@endsection
