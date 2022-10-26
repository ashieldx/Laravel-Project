<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body style ="display: flex;
  min-height: 100vh;
  flex-direction: column;">
    <nav style = "box-shadow:0 5px 10px rgb(0 0 0/0.2)" class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('') }}">Baktify</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav w-100 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('about') }} ">About Us</a>
                    </li>
                    @auth
                        @if(Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('products') }} ">Manage Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ url('/category') }} ">Add category</a>
                        </li>
                        @elseif(Auth::user()->role == 'user')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('products') }} ">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">My Transactions</a>
                        </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('products') }} ">Products</a>
                        </li>
                    @endif
                 </ul>
            </div>
            @auth
                @if(Auth::user()->role == 'user')
                    <a style = "border:none;"class = "btn fw-bold"href = "#">Cart</a>
                @endif
                    <div class="row">
                        <a style = "text-align:center;">Hello, {{Auth::user()->name}}</a>
                        <a style = "text-align:center;color:black;"href = "{{ url('/profile') }}">View profile</a>
                    </div>
            @else
            <a href="{{ url('/login') }}" style = "border:none;"class="btn fw-bold">Sign in</a>
            <a style = "background-color:#A494F4;border:none;" href="{{ url('/register') }}" class="btn btn-primary">Sign up</a>
            @endif
        </div>
    </nav>

    <br><br>
    <br><br>

    <main style= "flex:1">
        @yield('content')
    </main>

    <footer class="text-center footer">
        <hr class= "shadow" style ="box-shadow: 0 3px 5px 0 rgba(0, 0, 0, 0.7);">
        <p style = "text-align: center;font-size:12px;color:gray">&copy;2021 Baktify, Inc. All rights reserved</p>
    </div>

</body>
</html>
