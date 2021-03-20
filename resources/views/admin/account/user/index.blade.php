@extends('layouts.app', ['title' => 'KPR | Register'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                  @include('layouts.partials.error')
                  <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addModal">Add</button>
                  </div>
                </div> --}}
                <div class="card-header">
                    <a href="{{ route('admin.account.user.export.excel') }}" class="btn btn-success">Export User Excel</a>
                    <a href="{{ route('admin.account.user.export.pdf') }}" class="btn btn-danger">Export User PDF</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pangkat</th>
                                    <th>Status</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>E-Mail</th>
                                    <th>NRP</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @forelse ($accounts as $account)
                            <tbody>
                                <tr>
                                    <th>{{ $loop->iteration + $accounts->firstItem() - 1 . '.' }}</th>
                                    <td><b>{{ Str::upper($account->pangkat->pangkat) }}</b></td>
                                    <td>
                                        @if($account->email_verified_at == null)
                                            <span class="badge badge-danger">Belum Verifikasi Email</span>
                                        @else
                                            <span class="badge badge-success">Sudah Verifikasi Email</span>
                                        @endif
                                    </td>
                                    <td>
                                      @empty($account->avatar)
                                          <img class="rounded-circle" src="{{ asset('assets/images/avatar/avatar-default.png') }}" width="60" alt="avatar">
                                      @else
                                          <img class="rounded-circle" src="{{ $account->ImgProfile }}" style="width: 60px; height: 60px; object-fit: cover; object-position: center;" alt="avatar">
                                      @endempty
                                    </td>
                                    <td>{{ $account->name }}</td>
                                    <td>{{ $account->email }}</td>
                                    <td>{{ $account->nrp }}</td>
                                    <td><span class="badge badge-light">DILINDUNGI<span></td>
                                    <td>
                                        <div class="mb-2">
                                            @if($account->email_verified_at != null && $account->role == 3)
                                                <form action="{{ route('admin.account.updaterole', $account->id) }}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i> UPDATE ROLE</button>
                                                </form>
                                            @endif
                                        </div>
                                        <a href="{{ route('admin.account.register.edit', $account->id) }}" style="float: left;" class="mr-1"><i class="fa fa-pencil-square-o" style="color: rgb(0, 241, 12);"></i></a>
                                        @include('alert.deleteUser')  
                                </td>
                            </tr>
                        </tbody>
                        @empty
                        <tbody>
                            <tr>
                                <th colspan="8" style="color: red; text-align: center;">Data Empty!</th>
                            </tr>
                        </tbody>
                        @endforelse
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $accounts->links() }}
            </div>
        </div>
    </div>
</div>
{{-- add data modal --}}
{{-- <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Add New Account</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('admin.account.register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="role" value="3">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="avatar">Image (Nullable):</label>
                                <input class="form-control" type="file" name="avatar" id="avatar">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name">Name:</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="your name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="email">E-Mail:</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="your email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="pangkat_id">Pilih Pangkat:</label>
                                <select class="form-control custom-select" name="pangkat_id" id="pangkat_id">
                                    <option disabled selected>Pilih Pangkat</option>
                                    @foreach ($pangkats as $pangkat)
                                        <option value="{{ $pangkat->id }}">{{ $pangkat->pangkat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="nrp">NRP:</label>
                                <input class="form-control" type="number" name="nrp" id="nrp" placeholder="nrp" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="password">Password:</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="********" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light for-light" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-secondary for-dark" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
      </div> --}}
@endsection
