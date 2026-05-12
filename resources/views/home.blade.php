@extends('template')

@section('content')
<div class="container pt-5 mt-3">
    <!-- 1. Carousel / Slideshow -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            @foreach ($product as $key => $item)
                <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            @foreach ($product as $key => $item)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}" class="d-block w-100" style="height:400px; object-fit: cover;">
                </div>
            @endforeach
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- 2. Nav tabs Kategori -->
    <ul class="nav nav-tabs mt-3">
        @foreach ($categories as $key => $item)
            <li class="nav-item">
                <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-bs-toggle="tab" href="#category{{ $key + 1 }}">
                    {{ $item->name }}
                </a>
            </li>
        @endforeach
    </ul>

    <!-- 3. Tab Content (Isi Produk per Kategori) -->
    <div class="tab-content mt-4">
        @foreach ($categories as $key => $item)
            <div class="tab-pane container {{ $key == 0 ? 'active' : '' }}" id="category{{ $key + 1 }}">
                <div class="row g-2 pt-2">
                    @foreach ($item->product as $product)
                        <div class="col-md-3">
                            <a href="{{ route('home.detail', Crypt::encrypt($product->id)) }}" style="text-decoration: none; color: black;">
                                <div class="card h-100">
                                    <img class="card-img-top" src="{{ asset('storage/' . $product->image) }}" alt="Card image" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $product->name }}</h4>
                                        <h6 class="text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</h6>
                                        <p class="card-text text-muted" style="font-size: 0.9rem;">
                                            {{ Str::limit($product->description, 50) }}
                                        </p>
                                        <a href="#" class="btn btn-primary btn-sm w-100">Lihat Produk</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div> {{-- Penutup container utama --}}
@endsection
