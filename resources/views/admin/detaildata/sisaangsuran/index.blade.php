@extends('layouts.app', ['title' => 'KPR | '.request()->path() ])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header b-l-primary border-3">
                <h5>Sisa Angsuran</h5>
            </div>
            <div class="card-body">

            </div>
            <div class="card-footer">
                <div>
                    <button type="button" class="btn btn-secondary btn-md" data-toggle="tooltip" data-placement="top" title="bunga anuitas per tahun"><i data-feather="book-open"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
