@extends('layouts.app', ['title' => 'KPR | '.request()->path() ])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header b-l-primary border-3">
                <h5>Angsuran Ke</h5>
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
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">

            </div>
            <div class="card-footer">
                <div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
