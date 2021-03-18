@extends('layouts.app', ['title' => 'KPR | '.request()->path() ])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header b-l-primary border-3">
                <h5>Tahun</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div>
                    <button type="button" class="btn btn-secondary btn-md" data-toggle="tooltip" data-placement="top" title="Total Tunggakan"><i data-feather="book-open"></i></button>
                    <button type="button" class="btn btn-success btn-md" data-toggle="tooltip" data-placement="right" title="Statisk Customer"><i data-feather="bar-chart"></i></button>
                    <button type="button" class="btn btn-info btn-md" data-toggle="tooltip" data-placement="bottom" title="Total Customer"><i data-feather="users"></i></button>
                    <button type="button" class="btn btn-warning btn-md" data-toggle="tooltip" data-placement="left" title="Total Pinjaman"><i data-feather="book"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- add data modal --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Add New Account</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('admin.account.register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                                <label class="col-form-label" for="role">Role:</label>
                                <select name="role" id="role" class="form-control custom-select" required>
                                    <option disabled selected>Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="customer">Customer</option>
                                    <option value="boss">Boss</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="username">Username:</label>
                                <input class="form-control" type="text" name="username" id="username" placeholder="username" required>
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
    </div>
</div>
@endsection
