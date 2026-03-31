@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-md-12 mt-4">
        <h3>Tambah Produk</h3>
        <hr>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $errors )
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('product.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Product</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="numeric" name="price" id="price" class="form-control">
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="numeric" name="stok" id="stok" class="form-control">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Id kategori</label>
                <input type="numeric" name="category_id" id="category_id" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>
            <input type="submit" value="Simpan" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection