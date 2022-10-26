@extends('main')

@section('title', 'Add Product')

@section('content')

    <div class="container">
        <br>
        <br>
        <form action ="{{url('add-product')}}"  method = "POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class = "col-sm-2 col-form-label"for="">Image</label>
                <div class="col-sm-10">
                    <input type="file" name = "image" class="form-control @error('image')is-invalid @enderror"></input>
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-2 col-form-label"for="">Product Name</label>
                <div class="col-sm-10">
                    <input type="text" name = "name" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-2 col-form-label"for="">Description</label>
                <div class="col-sm-10">
                    <textarea rows = 3 type="text" name = "description" class="form-control"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-2 col-form-label"for="">Price</label>
                <div class="col-sm-10">
                    <input type="text" name = "price" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-2 col-form-label"for="">Product Quantity</label>
                <div class="col-sm-10">
                    <input type="text" name = "stock" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-2 col-form-label"for="">Category</label>
                <div class="col-sm-10">
                    <select class ="form-control" name ="category_id">
                        @foreach ($categorylist as $category)
                            <option value = "{{ $category->id }}"> {{$category->category}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            <br>
            @error('image')
                <?php
                    echo "<script>alert('$message');</script>";
                ?>
            @enderror
            @error('name')  
            <div style ="margin-top:-20px;border:none;border-radius:0px;"class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
            @error('description')
            <div style="margin-top:-20px;border:none;border-radius:0px;" class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
            @error('price')
            <div style="margin-top:-20px;border:none;border-radius:0px;"  class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
            @error('stock')
            <div style="margin-top:-20px;border:none;border-radius:0px;" class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
            @error('category_id')
            <div style="margin-top:-20px;border:none;border-radius:0px;" class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
            <div class="form-group mb-3">
                <button type = "submit" class = "btn btn-primary">Insert</button>
                <a href = "{{url('products')}}" class = "btn btn-danger">Cancel</a>
            </div>
    </form>


    </div>
@endsection
