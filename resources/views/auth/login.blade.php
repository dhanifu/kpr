@extends('layouts.loglayout', ['title' => 'Sign In'])
@section('content')
<div class="content">
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6">
        <img src="{{asset('assets/images/ditkuad.png')}}" alt="Image" class="img-fluid">
      </div>
      <div class="col-md-6 contents">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="mb-4">
            <h3>Sign In</h3>
            <p class="mb-4">Silahkan login untuk melanjutkan.</p>
          </div>
          <form action="{{ route('login') }}" method="post" autocomplete="off">
            @csrf
            <div class="form-group">
              <label for="nrp">NRP</label>
              <input class="form-control @error('nrp') is-invalid @enderror" type="number" name="nrp" id="nrp" autofocus required>
              @error('nrp')
                  <span class="invalid-feedback" role="alert">
                      <strong>NRP / Password yang dimasukan salah!</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input class="form-control" type="password" name="password" id="password" required>
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            
            <div class="d-flex mb-5 mt-2 align-items-center">
              <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                <input type="checkbox" name="remember" checked="checked"/>
                <div class="control__indicator"></div>
              </label>
              <span class="ml-auto"><a href="{{ route('user.register') }}" class="forgot-pass">Register Account</a></span> 
            </div>
            <input type="submit" value="Log In" class="btn btn-block btn-primary">
          </form>
          </div>
        </div>
        
      </div>
      
    </div>
  </div>
</div>
@endsection