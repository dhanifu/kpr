@extends('layouts.loglayout', ['title' => 'KPR | Register'])
@section('content')
<!-- login page start-->
  <div class="row">
    <div class="col-12">
      <div class="login-card">
        <div>
          <div class="login-main">
            <form method="POST" action="{{ route('register') }}" class="theme-form">
              @csrf
                <h3 class="text-center mb-4"><u>Register Account</u></h3>
                    <div class="form-group">
                      <label class="col-form-label" for="name">Name:</label>
                      <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" id="name" placeholder="your name" required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label class="col-form-label" for="email">E-Mail:</label>
                      <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" id="email" placeholder="your email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                
                    <div class="form-group">
                      <label class="col-form-label" for="username">Username:</label>
                      <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" id="username" placeholder="username" required>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                
                    <div class="form-group mb-4">
                      <label class="col-form-label" for="password">Password:</label>
                      <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" autocomplete="new-password" placeholder="********" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror           
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-form-label" for="password-confirm">Confirm Password:</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password-confirm" autocomplete="new-password" placeholder="********" required>         
                    </div>
                <div class="form-group">
                    <a href="{{ route('login') }}" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary" type="submit">Register</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
