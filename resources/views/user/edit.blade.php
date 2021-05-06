@extends('master')

@section('main_content')
<div class="card card_border py-2 mb-4">
    <div class="card-body">
        <form action="{{ route('user.update', $user) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="input__label">Tên</label>
                    <input type="text" class="form-control" placeholder="Tên"  value="{{ $user->name }}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label class="input__label">Email</label>
                    <input type="text" class="form-control" placeholder="Email" value="{{ $user->email }}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label class="input__label">Status</label>
                    <select name="status" class="custom-select">
                        <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="lock" {{ $user->status == 'lock' ? 'selected' : '' }}>Lock</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label class="input__label">Type</label>
                    <select name="type" class="custom-select">
                        <option value="admin" {{ $user->type == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ $user->type == 'user' ? 'selected' : '' }}>User</option>
                    </select>                    
                </div>
                <div class="form-group col-md-3">
                    <label class="input__label">Expiration date</label>
                    <input type="text" name="expiration_date" class="form-control date-picker" value="{{ $user->expiration_date_for_input_tag }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-style mt-4">Lưu</button>
        </form>
    </div>
</div>
@endsection