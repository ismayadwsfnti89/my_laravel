<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('Assets/bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            padding-top: 70px;
            /* Supaya konten gak ketutupan Navbar */
        }
    </style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">MY_TOKO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.category.index') }}">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products.index') }}">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="{{ route('admin.logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- JS Bootstrap Bundle -->
    <script src="{{ asset('Assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>


<footer class="container-fluid mt-3 bg-secondary text-white">
    <div class="container pt-3">
        <div class="row">
            <!-- Kolom Deskripsi Toko -->
            <div class="col-md-6 pe-5">
                <h3>MY_TOKO</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A minus architecto at dicta sequi tempore
                    aliquid cum sint.</p>
                <a href="#" class="btn btn-outline-dark">Baca Lebih Banyak Tentang Kami</a>
            </div>

            <!-- Kolom Halaman Navigasi -->
            <div class="col-md-3">
                <h5>Halaman</h5>
                <ul class="nav flex-column" style="margin-left: -15px;">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Cara Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Kebijakan Privasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Syarat dan Ketentuan Penukaran</a>
                    </li>
                </ul>
            </div>

            <!-- Kolom Kontak -->
            <div class="col-md-3">
                <h5>Kontak</h5>
                <ul class="nav flex-column" style="margin-left: -15px;">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Whatsapp: -</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Email: -</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <h5>Social</h5>
            <ul class="nav flex-column" style="margin-left: -15px;">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Tiktok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Instagram</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Facebook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Youtube</a>
                </li>
            </ul>
        </div>
        <!-- Baris Tambahan Copyright (Opsional tapi bagus) -->
        <div class="row mt-3">
            <div class="col text-center pb-3">
                <hr class="bg-white">
                <p>&copy; 2024 MY_TOKO. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>


<script src="{{ asset('Assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
