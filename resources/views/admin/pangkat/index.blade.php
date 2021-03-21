@extends('layouts.app', ['title' => 'KPR | Register'])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @include('layouts.partials.error')
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addModal">Add</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pangkat</th>
                                <th>Corps</th>
                                <th>Kesatuan</th>
                                <th>Tahapan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @forelse ($pangkats as $pangkat)
                        <tbody>
                            <tr>
                                <th>{{ $loop->iteration + $pangkats->firstItem() - 1 . '.' }}</th>
                                <td>{{ $pangkat->pangkat }}</td>

                                <td>{{ $pangkat->corps }}</td>
                                <td>{{ $pangkat->kesatuan }}</td>
                                <td>{{ $pangkat->tahap }}</td>
                                <td>
                                    <a href="{{ route('admin.pangkat.edit', $pangkat->id) }}" style="float: left;" class="mr-1"><i class="fa fa-pencil-square-o" style="color: rgb(0, 241, 12);"></i></a>
                                    <button onclick="return deleteUser('{{$pangkat->id}}')" style="background-color: transparent; border: none;"><i class="icon-trash" style="color: red;"></i></button>
                                    <form method="post" id="DeleteUser{{$pangkat->id}}" action="{{ route('admin.pangkat.destroy', $pangkat->id) }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <script>
                                        function deleteUser(id) {
                                            swal({
                                                    title: "Are you sure?",
                                                    text: "Once deleted, you will not be able to recover this imaginary file!",
                                                    icon: "warning",
                                                    buttons: true,
                                                    dangerMode: true,
                                                })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                        event.preventDefault();
                                                        document.getElementById(`DeleteUser${id}`).submit();
                                                    } else {
                                                        swal("okay :)");
                                                    }
                                                });
                                        }
                                    </script>
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
                {{ $pangkats->links() }}
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
            <form action="{{ route('admin.pangkat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="pangkat">Pangkat:</label>
                                <input class="form-control" type="text" name="pangkat" id="pangkat" placeholder="Your Head">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="corps">Coprs:</label>
                                <input class="form-control" type="text" name="corps" id="corps" placeholder="your corps" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="kesatuan">Kesatuan:</label>
                                <input class="form-control" type="text" name="kesatuan" id="kesatuan" placeholder="your kesatuan" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="tahap">Tahap:</label>
                                <input class="form-control" type="number" name="tahap" id="tahap" placeholder="tahap" required>
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
