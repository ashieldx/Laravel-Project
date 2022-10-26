@extends('main')

@section('title', 'Register')

@section('content')

    <div class="container" >
    <h4 style = "text-align:center;"> Create your account </h4>
    <div class = "row justify-content-center">
        <div class = "col-md-7">
        <form action ="{{url('/register')}}"  method = "POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" name = "name" class="form-control @error('name')is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="">Email address</label>
                <input type="email" name = "email" class="form-control @error('email')is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <div class = "row">
                    <div class ="col">
                        <label for="">Password</label>
                        <input type="password" name = "password" class="form-control @error('password')is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="">Confirm password</label>
                        <input type="password" name = "password_confirmation" class="form-control @error('password_confirmation')is-invalid @enderror">
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="">Address</label>
                <textarea rows = 3 type="text" name = "address" class="form-control @error('address')is-invalid @enderror"></textarea>
                <a style = "color:gray; font-size:12px;">Please write your actual address where you can receive mail</a>
                @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="">Phone</label>
                <input type="text" name = "phone" class="form-control @error('phone')is-invalid @enderror">
                @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <button style = "background-color: #A494F4;border: none;" type = "submit" class = "btn btn-primary float-end">Create Account</button>
            </div>
        </form>
        </div>
    </div>
@endsection
