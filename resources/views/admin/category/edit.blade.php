@extends('admin.template')
@section('content')
<div class="row mt-4">
    <div class="col-md-12">
        <h3>Edit Data Category</h3>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if ($errors->any())
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
        <form action="{{ route('admin.category.update', Crypt::encrypt($category->id)) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Category</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
