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
            <th>Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type }}</td>
                <td>
                    <a href="{{ route('user.edit', $user) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
                    <a href="{{ route('user.destroy', $user) }}" class="btn btn-danger btn-sm btn_delete_customer" data-toggle="modal" data-target="#modalDeleteCustomerConfirm" data-modal-body-text="Xác nhận xóa người dùng {{ $user->name }}"><i class="fa fa-trash"></i> Xóa</a>
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