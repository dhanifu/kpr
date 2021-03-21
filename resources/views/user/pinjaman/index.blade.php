@extends('layouts.app', ['title' => 'KPR | Pinjaman'])
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Ajukan Pinjaman</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('pinjaman.set') }}" class="needs-validation" novalidate="">
                        <div class="row">
                        @csrf
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Jumlah Pinjaman</label>
                                <input name="besar_pinjam" class="form-control"  id="validationCustom01" type="number" placeholder="Jumlah Pinjaman" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Lama Angsuran (Bulan)</label>
                                <input name="jangka" class="form-control" id="validationCustom02" type="number" placeholder="Lama Angsuran (Bulan)" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername">Bunga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text" id="inputGroupPrepend">%</span></div>
                                    <input name="bunga" class="form-control" id="validationCustomUsername" type="number" placeholder="Bunga" aria-describedby="inputGroupPrepend" required="" value="6" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                        </div>
                        <button class="btn btn-primary" type="submit">Hitung</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection
