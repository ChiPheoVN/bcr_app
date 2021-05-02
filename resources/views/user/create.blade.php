@extends('master')

@section('main_content')
<div class="card card_border py-2 mb-4">
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="input__label">Tên</label>
                    <input name="name" type="text" class="form-control" placeholder="Tên">
                </div>
                <div class="form-group col-md-6">
                    <label class="input__label">Email</label>
                    <input name="email" type="text" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label class="input__label">Địa chỉ</label>
                <input name="address" type="text" class="form-control" placeholder="Địa chỉ">
            </div>
            <button type="submit" class="btn btn-primary btn-style mt-4">Lưu</button>
        </form>
    </div>
</div>
@endsection