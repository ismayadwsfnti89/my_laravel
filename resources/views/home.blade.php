<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('Assets/bootstrap/css/bootstrap.min.css') }}">
    <title>MY_TOKO</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-info navbar-dark fixed-top">
        <div class="container">
                <!-- brand -->
                <a class="navbar-brand" href="#">MY_TOKO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- link -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pt-5 mt-3">
            <div id="mya" class="carousel slide" data-bs-ride="carousel">
                <!-- indikator -->
                 <div class="carousel-indicators">
                    <button type="button" data-bs-target="#mya" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#mya" data-bs-slide-to="1" ></button>
                    <button type="button" data-bs-target="#mya" data-bs-slide-to="2" ></button>
                 </div>

                 <!-- slide -->
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/1.jpg" alt="1" class="d-block w-100">
                    </div>
                    <div class="carousel-item ">
                        <img src="images/2.jpg" alt="2" class="d-block w-100">
                    </div>
                    <div class="carousel-item ">
                        <img src="images/3.jpg" alt="3" class="d-block w-100">
                    </div>
                  </div>
                  <!-- left and right -->
                   <button class="carousel-control-prev" type="button" data-bs-target="#mya" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                   </button>
                   <button class="carousel-control-next" type="button" data-bs-target="#mya" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                   </button>
            </div>
        </div>

        <!-- Nav table -->
        <ul class="nav nav-pills mt-3 justify-content-center">
            @foreach ($categories as $key => $item)
            <li class="nav-item">
                <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-bs-toggle="tab" href="#category{{ $key + 1 }}">{{ $item->name }}</a>
            </li>
            @endforeach
        </ul>

        <!-- tabel panel -->
        <div class="tab-content mt-4">
            @foreach ($categories as $key => $item)
            <div class="tab-pane container {{ $key == 0 ? 'active' : '' }}" id="category{{ $key + 1 }}">
                <div class="row g-2 pt-2">
                    @foreach ($item->product as $product)
                    <div class="col-md-3">
                        <div class="card" style="width: 100%">
                            <img class="card-img-top" src="{{ asset('storage/'. $product->image) }}" height="400px" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">{{ $product->name }}</h4>
                                <p class="card-text">Rp {{ number_format($product->price, 0, ',','.')}}</p>
                                <a href="#" class="btn btn-primary">Lihat Produk</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

<footer class="bg-light text-dark pt-5 pb-4">
    <div class="container text-center text-md-start">
        <div class="row">
            <!-- Brand & Deskripsi -->
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                <h5 class="fw-bold text-uppercase">MY_TOKO</h5>
                <p class="text-muted">
                 MY_TOKO adalah toko online fashion Korea yang menghadirkan gaya feminin, minimalis, dan stylish. Cocok untuk kamu yang ingin tampil manis dan elegan setiap hari.
                </p>
                <a href="#" class="btn btn-outline-dark btn-sm">Tentang Kami</a>
                </div>
            <!-- Navigasi -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold">Halaman</h6>
                <ul class="list-unstyled">
                <li><a href="#" class="text-decoration-none text-dark">Home</a></li>
                <li><a href="#" class="text-decoration-none text-dark">Produk</a></li>
                <li><a href="#" class="text-decoration-none text-dark">Cara Order</a></li>
                <li><a href="#" class="text-decoration-none text-dark">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <!-- Kontak -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold">Kontak</h6>
                <p>WhatsApp: +62 812-XXXX-XXXX</p>
                <p>Email: info@mytoko.id</p>
                <a href="#" class="btn btn-success btn-sm">Konsul & COD</a>
            </div>
            <!-- Sosial Media -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold">Ikuti Kami</h6>
                <div class="d-flex gap-2">
                    <!-- Tambahkan tag <img> jika ada iconnya -->
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="text-center mt-4 text-muted">
    © 2026 MY_TOKO. All rights reserved.
    </div>
</footer>

<script src="{{ asset('Assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
