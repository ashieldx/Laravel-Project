@extends('main')

@section('title', 'Edit Profile')

@section('content')

    <div class="container" >
    <h4 style = "text-align:center;">Update your profile </h4>
    <div class = "row justify-content-center">
        <div class = "col-md-7">
        <form action ="{{ url('/edit-profile') }}"  method = "POST" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" name = "name" class="form-control @error('name')is-invalid @enderror" value = "{{Auth::user()->name}}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="">Email address</label>
                <input type="email" name = "email" class="form-control @error('email')is-invalid @enderror" value = "{{ Auth::user()->email }}" disabled>
            </div>
            <div class="form-group mb-3">
                <div class = "row">
                    <div class ="col">
                        <label for="">Password</label>
                        <input type="password" name = "password" class="form-control @error('password')is-invalid @enderror" value = "password">
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
                <textarea rows = 3 type="text" name = "address" class="form-control @error('address')is-invalid @enderror">{{Auth::user()->address}}</textarea>
                <a style = "color:gray; font-size:12px;">Please write your actual address where you can receive mail</a>
                @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="">Phone</label>
                <input type="text" name = "phone" class="form-control @error('phone')is-invalid @enderror" value = "{{Auth::user()->phone}}">
                @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <button type ="submit" style = "background-color: #A494F4;border: none; margin-left:10px;" class = "btn btn-primary float-end">Save</button>
                <a href = "{{ url('/profile') }}" style = "background-color: #A494F4;border: none;" class = "btn btn-primary float-end">Cancel</a>
                
            </div>
        </form>
        </div>
    </div>
@endsection
