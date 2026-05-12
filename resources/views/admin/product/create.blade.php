@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4">
            <h3>Tambah Produk</h3>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $errors)
                            <li>{{ $errors }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Product</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}"
                        required>
                </div>

                <div class="mb-3">
                    <!-- Tetap pakai name="stock" sesuai kodingan kamu sebelumnya -->
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="">-- Pilih Category --</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Produk</button>
            </form>
        </div>
    </div>
@endsection
