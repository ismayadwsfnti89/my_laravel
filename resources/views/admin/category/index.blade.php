@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-md-12 mt-4">
        <div class="row">
            <div class="col-md-6">
                <h3>Data Category</h3>
            </div>
            <div class="col-md-4">
                <form action="/category" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('admin.category.create')}}" class="btn btn-success">Tambah Data</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif
                
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Category</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th width="200px">Aksi</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.category.edit', Crypt::encrypt($item->id)) }}" class="btn btn-warning btn-sm">Edit</a>
                                    
                                    <form action="{{ route('admin.category.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
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
