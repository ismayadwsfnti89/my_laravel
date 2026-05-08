@extends('admin.template')
@section('content')
<div class="row mt-4">
    <div class="col-md-12">
        <h3>Edit Data Product</h3>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.products.update', Crypt::encrypt($products->id)) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">Nama Product</label>
                <input type="text" name="name" value="{{ $products->name }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Product</label>
                <input type="number" name="price" value="{{ $products->price }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Stock Product</label>
                <input type="number" name="stock" value="{{ $products->stock }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Category Product</label>
                <select name="category_id" class="form-control">
                    <option value="">Pilih Category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $products->category_id ? 'selected' : ''}}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <br>
                <img src="{{ asset('storage/'.$product->image) }}" alt="" style="width:200px;height:200px">
                <br>
                <br>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi Product</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $products->description }}</textarea>
            </div>
            <input type="submit" value="Ubah Data" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection