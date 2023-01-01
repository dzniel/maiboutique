@extends('template')
@section('title', 'Edit Profile')
@section('content')
    <div style="background-image: url('{{ asset('images/banner.jpg') }}')" class="banner-bg">
        <div class="min-vh-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-50">
            <div class="card border-1 col-sm-3">
                <div class="card-body p-sm-5">
                    <h3 class="card-title text-center fw-bold f2-2 mb-5">Update Password</h3>
                    <form action="{{ route('update.user', ['type' => 'password']) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Old Password</label>
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" placeholder="(5-20 letters)" autofocus>
                            @error('old_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" placeholder="(5-20 letters)">
                            @error('new_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-success">Save Update</button>
                        </div>
                        <div class="d-grid">
                            <a href="{{ route('profile') }}" class="btn btn-outline-danger">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
