@extends('layouts.app', ['title' => 'KPR | Kalkulator'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                    <h5>Kalkulator KPR</h5>
                </div>
                <div class="card-body">
                  <form class="needs-validation" novalidate="">
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Jumlah Pinjaman</label>
                        <input class="form-control" id="validationCustom01" type="text" placeholder="Jumlah Pinjaman" required="">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Lama Angsuran (Bulan)</label>
                        <input class="form-control" id="validationCustom02" type="text" placeholder="Lama Angsuran (Bulan)" required="">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationCustomUsername">Bunga</label>
                        <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text" id="inputGroupPrepend">%</span></div>
                          <input class="form-control" id="validationCustomUsername" type="text" placeholder="Bunga" aria-describedby="inputGroupPrepend" required="">
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