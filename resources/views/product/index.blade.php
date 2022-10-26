@extends('main')

@section('title', 'Products')

@section('content')

    <div class="container">
        @if(session('status'))
            <h6 class = "alert alert-success"> {{ session('status') }}</h6>
        @endif
        <nav class="navbar">
            <h1 style="font-size:28px" class="navbar-brand">OUR PRODUCTS</h1>
            <div class="d-flex flex-end">
            <form class="d-flex flex-end me-3">
                <input class="form-control me-2" value ="{{ request('search') }}" type="search" placeholder ="Search" name="search">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
            @auth
            @if(Auth::user()->role == 'admin')
            <a href = "{{url('add-product')}}" class ="btn btn-primary float end">Insert Product</a>
            @endif
            @endauth
            </div>
        </nav>
        <br>
        @if($productlist->count())
        <div class="row row-cols-1 row-cols-md-2">
            @foreach($productlist as $product)
                <div class="col-md-3 mt-3">
                    <div class="card text-center" style ="box-shadow:0 5px 10px rgb(0 0 0/0.2)">
                        <img class = "card-img" src="{{ asset('storage/images/' . $product->image )}}" width = 200px height = 200px href ="{{ route('products.show', $product->id) }}"></img>
                        <a class="card-body stretched-link" href = "{{ route('products.show', $product->id) }}" style ="text-decoration:none;transform: rotate(0);">
                            <h6 class = "card-title"> {{ $product->name }} </h6>
                            <h6 class = "card-subtitle" style = "color:gray;font-size:13px;"> IDR {{ $product->price }} </h6>
                            <p style ="margin-top:5px;margin-bottom:-10px"href="#" class="btn btn-primary btn-sm">{{ $product->category->category }}</p>
                        </a>
                        <div class="card-footer" style="background-color:#FFFFFF;">
                            @auth
                                @if(Auth::user()->role == 'admin')
                                    <a href = "{{ route('products.edit', $product->id) }}" class = "float-start btn btn-primary btn-sm">Edit Product</a>

                                    <form action = "{{ route('products.destroy', $product->id) }}" method = "post">
                                    @csrf
                                    @method('delete')
                                        <button type ="submit" href =# onclick = "return confirm('Are you sure?')"class = "float-end btn btn-danger btn-sm">Remove Product</button>
                                    </form>

                                @elseif(Auth::user()->role == 'user')
                                    @if($product->stock > 0)
                                    <a onclick = "return alert('Please login first')" href = "{{ url ('/login') }}" class = "float-start btn btn-primary btn-sm">{{ ($product->stock > 0) ? 'Add to Cart' : 'Unavailable' }}</a>
                                    @else
                                    <button disabled href =# class = "float-start btn btn-danger btn-sm">{{ ($product->stock > 0) ? 'Add to Cart' : 'Unavailable' }}</button>
                                    @endif
                                @endif
                            @else
                                @if($product->stock > 0)
                                <a onclick = "return alert('Please login first')" href = "{{ url ('/login') }}" class = "float-start btn btn-primary btn-sm">{{ ($product->stock > 0) ? 'Add to Cart' : 'Unavailable' }}</a>
                                @else
                                <button disabled href =# class = "float-start btn btn-danger btn-sm">{{ ($product->stock > 0) ? 'Add to Cart' : 'Unavailable' }}</button>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        @else
        <p style="font-size:15px"> No Product Match for '{{request('search')}}'</p>
        @endif
        <div class ="d-flex justify-content-between"">
            <div class = "float-start mt-3">
                Showing <b>{{ $productlist->firstItem() }} </b> to 
                        <b>{{ $productlist->lastItem() }}  </b>
                        of <b>{{ $productlist->total() }} </b> results
            </div>
            <div class = "float-end mt-3">
            {{$productlist->links()}}
            </div>
        </div>
    </div>
@endsection
