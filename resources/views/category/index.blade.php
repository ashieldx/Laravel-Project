@extends('main')

@section('title', 'Add Category')

@section('content')

    <div class="container">
        @if(session('status'))
            <h6 class = "alert alert-success"> {{ session('status') }} </h6>
        @endif
        @foreach($categorylist as $category)
            <a class = "btn btn-primary me-2 mt-3">{{ $category->category }}</a>
        @endforeach
        <br>
        <br>    
        <h3>Add New Category</h3>
        <br>
        <form action = "{{ url('/category') }}" method = "POST">
        @csrf
            <div class="row mb-3">
                <label class = "col-sm-2 col-form-label"for="">Category Name</label>
                <div class="col-sm-10">
                    <input type="text" name = "category" class="form-control">
                </div>
            </div>
            <div class="form-group mb-3">
                <button type = "submit" class = "btn btn-primary">Submit</button>
            </div>
        </form>
        @error('category')  
            <div style ="border:none;border-radius:0px;"class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
@endsection
