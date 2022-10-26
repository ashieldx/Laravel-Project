@extends('main')

@section('title', 'Login')

@section('content')

    <div class="container" >
        <div class = "row justify-content-center">
            @if(session()->has('invalid'))
            <div style="text-align:center;"class="alert alert-danger" role="alert">
                {{ session('invalid')}}
            </div>
            @endif
            @if(session()->has('success'))
            <div style="text-align:center;"class="alert alert-success" role="alert">
                {{ session('success')}}
            </div>
            @endif
            <h4 style= "text-align:center;">Sign in into your account</h4>
            <div class = "col-md-4">
                <form action = "{{ url('/login') }}" method = "post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Email address</label>
                        <input type="email" name = "email" id ="email" class="form-control @error('email') is-invalid @enderror"
                        value = "{{ Cookie::get('mycookie') !== null ? Cookie::get('mycookie') : "" }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input type="password" name = "password" id = "password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-check-input" type="checkbox" name = "remember" id="defaultCheck1"
                        checked = "{{ Cookie::get('mycookie') !== null }}">
                        <label class="form-check-label" for="defaultCheck1">Remember email</label>
                    </div>
                    <div class="form-group mb-3">
                        <button style = "background-color: #AC94F4; border: none;" class = "w-100 btn btn-lg btn-primary" type = "submit">Login</button>
                    </div>
                    <div class ="form-group mb-3">
                        <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                            <span style="font-size: 18px; background-color: #FFFFFF; padding: 0 10px;">
                                or
                            </span>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <a href = "{{ url('/register') }} " style = "background-color: #FFFFFF; color:black; border: 1px solid black" class = "w-100 btn btn-lg btn-primary">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
