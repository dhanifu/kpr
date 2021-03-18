@extends('layouts.app', ['title' => 'KPR | Panngkat'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.pangkat.update', $pangkat->id) }}" method="POST" >
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="pangkat">pangkat:</label>
                                        <input class="form-control @error('pangkat') is-invalid @endif" type="text" name="pangkat" value="{{ $pangkat->pangkat ?? old('pangkat') }}" id="pangkat" placeholder="your Pangkat" required>
                                        @error('pangkat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="corps">corps:</label>
                                        <input class="form-control @error('corps') is-invalid @enderror" type="text" name="corps" value="{{ $pangkat->corps ?? old('corps') }}" id="corps" placeholder="your corps" required>
                                        @error('corps')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="kesatuan">kesatuan:</label>
                                        <input class="form-control @error('kesatuan') is-invalid @enderror" type="text" name="kesatuan" value="{{ $pangkat->kesatuan ?? old('kesatuan') }}" id="kesatuan" placeholder="kesatuan" required>
                                        @error('kesatuan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="tahap">tahap:</label>
                                        <input class="form-control @error('tahap') is-invalid @enderror" type="text" name="tahap" value="{{ $pangkat->tahap ?? old('tahap') }}" id="tahap" placeholder="tahap" required>
                                        @error('tahap')
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