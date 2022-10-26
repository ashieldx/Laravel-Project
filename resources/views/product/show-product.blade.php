@extends('main')

@section('title', 'Product Detail')

@section('content')

    <div class="container">
        <img style="margin-left: 100px;"src="{{ asset('storage/images/' . $product->image )}}" width = 250px height = 250px></img>

        <br><br><h4>{{$product->name}}</h4>
        <a style ="color:gray"> {{$product->description}} </a> <br>
        <a style ="color:gray"> Stock: {{$product->stock}} </a> <br>
        <a style ="color:gray"> Category: {{$product->category->category}} </a> <br> <br>

        <a href = "{{url('products')}}" class = "btn btn-danger float-end">Back</a>

    </div>
@endsection
