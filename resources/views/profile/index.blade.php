@extends('main')

@section('title', 'Profile')

@section('content')

<div class="container" >
    @if(session('status'))
        <h6 class = "alert alert-success"> {{ session('status') }}</h6>
    @endif
    <h4 style = "text-align:center;"> Your Profile</h4>
    <div class = "row justify-content-center">
        <div class = "col-md-7">
        <form action ="{{url('/profile')}}">
            <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" name = "name" class="form-control" value = "{{Auth::user()->name}}" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="">Email address</label>
                <input type="email" name = "email" class="form-control" value = "{{Auth::user()->email}}" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="">Password</label>
                <input type="password" name = "password" class="form-control" value = "password" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="">Address</label>
                <textarea disabled rows = 3 type="text" name = "address" class="form-control">{{Auth::user()->address}}</textarea>
                <a style = "color:gray; font-size:12px;">Please write your actual address where you can receive mail</a>
            </div>
            <div class="form-group mb-3">
                <label for="">Phone</label>
                <input type="text" name = "phone" class="form-control" value = "{{Auth::user()->phone}}" disabled>
            </div>

            <div class="form-group mb-3">
                <a href = "{{ url('/logout') }}" style = "background-color: red;border: none;" class = "btn btn-primary float-end">Sign out</a>
                <a href = "{{ url('/edit-profile') }}" style = "background-color: #A494F4;border: none; margin-right:10px;" class = "btn btn-primary float-end">Update</a>
            </div>
        </form>
        </div>
    </div>
@endsection
