@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-md-12 mt-4">
        <div class="row">
            <div class="col-md-6">
                <h3>Data Product</h3>
            </div>
            <div class="col-md-4">
                <form action="/products" method="GET">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <input type="submit" value="search" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.products.create')}}" class="btn btn-success">Tambah Data</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
                @session('success')
                <div class="alert alert-success">
                    {{ session('success')}}
                </div>
                @endsession
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Id kategori</th>
                            <th>Image</th>
                            <th>Deskripsi</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td><img src="{{ asset('storage/'.$item->image) }}" alt="" style="width: 50px;height: 50px;"></td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', Crypt::encrypt($item->id)) }}" class="btn btn-warning">
                                    <form action="{{ route('admin.products.destroy', Crypt::encrypt($item->id)) }}" method="post" class="d-inline">"
                                        @csrf
                                        @method('delete')
                                    </formm>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
