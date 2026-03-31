@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-md-12 mt-4">
        <h3>Tambah Category</h3>
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
        <form action="{{ route('category.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Category</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <input type="submit" value="Simpan" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection