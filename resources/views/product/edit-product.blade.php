@extends('main')

@section('title', 'Edit Product')

@section('content')

    <div class="container">
        <br><br>
        <h3>{{ $product->name}}</h3>

        <div class ="text-center">
            <img style="text-align:center;"src="{{ asset('storage/images/' . $product->image )}}" width = 250px height = 250px>
        </div>

        <br><br>

        <form action ="{{ route('products.update', $product->id) }}"  method = "POST" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="row mb-3">
                <label class = "col-sm-2 col-form-label"for="">Image</label>
                <div class="col-sm-10">
                    <input type="file" name = "image" class="form-control @error('image')is-invalid @enderror"></input>
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-2 col-form-label"for="">Description</label>
                <div class="col-sm-10">
                    <textarea rows = 3 type="text" name = "description" class="form-control"> {{ old('description', $product->description) }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-2 col-form-label"for="">Price</label>
                <div class="col-sm-10">
                    <input type="text" name = "price" class="form-control" value = "{{ old('price', $product->price) }}">
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-2 col-form-label"for="">Product Quantity</label>
                <div class="col-sm-10">
                    <input type="text" name = "stock" class="form-control" value = "{{ old('stock', $product->stock) }}">
                </div>
            </div>
            <hr>
            <br>
            @error('image')
                <?php
                    echo "<script>alert('$message');</script>";
                ?>
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
            <div class="form-group mb-3">
                <button type = "submit" class = "btn btn-primary">Update</button>
                <a href = "{{url('products')}}" class = "btn btn-danger">Cancel</a>
            </div>
    </form>


    </div>
@endsection
