<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('Assets/bootstrap/css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Osma</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item" >
                        <a class="nav-link active" href="admin">Home</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link " href="category">Category</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link " href="product">Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
<script src="{{asset('Assets/bootstrap/js/bootstrap.min.js')}}"></script>