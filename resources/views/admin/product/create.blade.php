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
        <form action="{{ route('admin.products.store')}}" method="POST">
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
                <label for="category_id" class="form-label">Category</label>
                <select type="numeric" name="category_id" id="category_id" class="form-select">
                    <option value="">-- Pilih Category --</option>
                    @foreach ($categories as $item )
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control"> --}}
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea type="text" name="description" id="description" cols="30" row="10" class="form-control"></textarea>
            </div>
            <input type="submit" value="Simpan" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection