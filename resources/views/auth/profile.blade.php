@extends('master')

@section('main_content')
<div class="card card_border py-2 mb-4">
    <div class="card-body">
        <form action="{{ route('update-profile') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="input__label">Username</label>
                    <input type="text" class="form-control" placeholder="Tên" disabled value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group col-md-6">
                    <label class="input__label">Tài sản tiền mặt</label>
                    <input name="total_money" type="text" class="form-control" placeholder="Tài sản tiền mặt" value="{{ Auth::user()->total_money }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-style mt-4">Lưu</button>
        </form>
    </div>
</div>
@endsection