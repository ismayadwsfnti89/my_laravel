@extends('admin.template')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Login</h3>
            </div>
            <div class="card-body">
            <form action="/admin/auth" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
