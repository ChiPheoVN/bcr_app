@extends('master')

@section('main_content')
<div class="card card_border py-2 mb-4">
    <div class="card-body">
        <form action="{{ route('update-profile') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label class="input__label">Full name</label>
                    <input type="text" name="full_name" class="form-control" placeholder="Full name" value="{{ Auth::user()->full_name }}">
                </div>                
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="input__label">Username</label>
                    <input type="text" class="form-control" placeholder="Tên" readonly value="{{ Auth::user()->user_name }}">
                </div>
                <div class="form-group col-md-6">
                    <label class="input__label">Username</label>
                    <input type="text" class="form-control" placeholder="Tên" readonly value="{{ Auth::user()->email }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="input__label">Status</label>
                    <input type="text" class="form-control" placeholder="Tên" readonly value="{{ Auth::user()->status }}">
                </div>
                <div class="form-group col-md-6">
                    <label class="input__label">Type</label>
                    <input type="text" class="form-control" placeholder="Tên" readonly value="{{ Auth::user()->type }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-style mt-4">OK</button>
        </form>
    </div>
</div>
@endsection