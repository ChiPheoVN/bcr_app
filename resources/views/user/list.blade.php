@extends('master')

@section('main_content')
<div class="form-group">
    <a href="{{ route('user.create') }}" class="btn btn-primary pull-left"><i class="fa fa-plus" aria-hidden="true"></i></a>    
    <a href="#" class="btn btn-danger pull-right btn-delete-multiple-users d-none" data-toggle="modal" data-target="#modalDeleteMultipleUsersConfirm"><i class="fa fa-trash" aria-hidden="true"></i></a>
    <div class="clearfix"></div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>
                <div class="form-check">
                    <input class="form-check-input position-static chk_select_all_user" type="checkbox">
                  </div>
            </th>
            <th>User name</th>
            <th>Email</th>
            <th>Expiration date</th>
            <th>Type</th>
            <th>Status</th>
            <th class="text-right">Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input position-static chk_select_user" type="checkbox" value="{{ $user->id }}">
                    </div>
                </td>
                <td>{{ $user->user_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->expiration_date_format }}</td>
                <td>{{ $user->type }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    <div class="row">
                        <div class="container-fluid">
                            <div class="dropdown pull-right d-none">
                                <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Other options
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item">Update status</a>
                                    <a class="dropdown-item">Update type</a>
                                </div>
                            </div>
                            <a href="{{ route('user.destroy', $user) }}" class="btn btn-danger btn-sm pull-right mr-1 btn_delete_user" data-toggle="modal" data-target="#modalDeleteUserConfirm" data-modal-body-text="Confirm delete user {{ $user->user_name }}"><i class="fa fa-trash"></i></a>
                            <a href="{{ route('user.edit', $user) }}" class="btn btn-info btn-sm pull-right mr-1"><i class="fa fa-pencil"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<!-- Modal -->

@include('user.modal.delete_confirm')
@include('user.modal.delete_multiple_confirm')
@endsection

@section('script')

@endsection