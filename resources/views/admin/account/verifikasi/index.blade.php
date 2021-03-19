@extends('layouts.app', ['title' => 'KPR | Verif User Account'])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Verifikasi Akun User</h5>
                <form action="" method="post">
                    <div class="d-flex justify-content-end">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input class="form-control" id="validationTooltip02" type="text" placeholder="Search" required="">
                                    <div class="valid-tooltip">Looks good!</div>
                                    <button class="btn btn-secondary ml-2">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role</th>
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
                                <td>{!! $account->RoleSection !!}</td>
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
                                    <form action="{{ route('admin.account.verified', $account->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> VERIFIED</button>
                                    </form>
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
            </div>
        </div>
    </div>
</div>
@endsection
