@extends('master')

@section('main_content')
<div class="form-group">
    <a href="{{ route('user.create') }}" class="btn btn-primary d-none">Thêm mới</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Email</th>
            <th>Type</th>
            <th>Status</th>
            <th class="text-center">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    <div class="container-fluid">
                        <a href="{{ route('user.edit', $user) }}" class="btn btn-info btn-sm pull-left mr-1"><i class="fa fa-pencil"></i> Sửa</a>
                        <a href="{{ route('user.destroy', $user) }}" class="btn btn-danger btn-sm pull-left mr-1 btn_delete_user" data-toggle="modal" data-target="#modalDeleteUserConfirm" data-modal-body-text="Xác nhận xóa người dùng {{ $user->name }}"><i class="fa fa-trash"></i> Xóa</a>
                        <div class="dropdown pull-left">
                            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Other options
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item">Update status</a>
                                <a class="dropdown-item">Update type</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="modalDeleteUserConfirm">
<form action="" method="post">
    @csrf
    @method('DELETE')
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Xác nhận xóa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-danger">Xóa</button>
        </div>
    </div>
    </div>
</form>
</div>
@endsection

@section('script')

@endsection