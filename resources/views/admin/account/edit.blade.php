@extends('layouts.app', ['title' => 'KPR | Edit Account'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.account.register.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <div class="row">
                                @if($user->avatar)
                                    <div class="col-md-12">
                                        <img src="{{ $user->ImgProfile }}" width="100" alt="avatar" srcset="">
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="avatar">Image (Nullable):</label>
                                        <input class="form-control" type="file" name="avatar" id="avatar">
                                        @error('avatar')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="name">Name:</label>
                                        <input class="form-control @error('name') is-invalid @endif" type="text" name="name" value="{{ $user->name ?? old('name') }}" id="name" placeholder="your name" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="email">E-Mail:</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $user->email ?? old('email') }}" id="email" placeholder="your email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="nrp">NRP:</label>
                                        <input class="form-control @error('nrp') is-invalid @enderror" type="text" name="nrp" value="{{ $user->nrp ?? old('nrp') }}" id="nrp" placeholder="nrp" required>
                                        @error('nrp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('admin.account.register.index') }}" class="btn btn-light for-light">Back</a>
                            <a href="{{ route('admin.account.register.index') }}" class="btn btn-secondary for-dark">Back</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection