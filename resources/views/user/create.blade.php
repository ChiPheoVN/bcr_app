@extends('master')

@section('main_content')
<div class="card card_border py-2 mb-4">
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label class="input__label">Full name</label>
                    <input name="full_name" type="text" class="form-control" placeholder="Full name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label class="input__label">User name (*)</label>
                    <input name="user_name" type="text" class="form-control" placeholder="User name" required>
                </div>
                <div class="form-group col-md-3">
                    <label class="input__label">Email (*)</label>
                    <input name="email" type="text" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group col-md-3">
                    <label class="input__label">Password (*)</label>
                    <input name="password" type="text" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group col-md-3">
                    <label class="input__label">Confirm password (*)</label>
                    <input name="confirm_password" type="text" class="form-control" placeholder="Confirm password" required>
                </div>
            </div>            
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label class="input__label">Status</label>
                    <select name="status" class="custom-select">
                        <option value="active">Active</option>
                        <option value="lock">Lock</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label class="input__label">Type</label>
                    <select name="type" class="custom-select">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>                    
                </div>
                <div class="form-group col-md-3">
                    <label class="input__label">Expiration date</label>
                    <input type="text" name="expiration_date" class="form-control date-picker">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-style mt-4">Lưu</button>
        </form>
    </div>
</div>
@endsection