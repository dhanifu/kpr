@extends('layouts.app', ['title' => 'KPR | Angsuran Sisa' ])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header b-l-primary border-3">
                <h5>Sisa Angsuran</h5>
                <form action="" method="post">
                    <div class="pt-4 pb-4">
                        <button type="button" class="btn btn-success btn-md" data-toggle="tooltip" data-placement="top" title="bunga anuitas per tahun"><i data-feather="book-open"></i></button>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="input-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" id="validationTooltip02" type="text" placeholder="Search" required="">
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>
                            </div>
                            <button class="btn btn-secondary ml-2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">

            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>

@endsection
