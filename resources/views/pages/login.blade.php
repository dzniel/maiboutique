@extends('template')
@section('title', 'Sign In')
@section('content')
    <div style="background-image: url('{{ asset('images/banner.jpg') }}')" class="banner-bg">
        <div class="min-vh-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-50">
            <div class="card border-1 col-sm-3">
                <div class="card-body p-sm-5">
                    <h3 class="card-title text-center fw-bold fs-2 mb-3">Sign In</h3>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Cookie::get('user_email') !== null ? Cookie::get('user_email') : old('email') }}" autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ Cookie::get('user_password') !== null ? Cookie::get('user_password') : old('password') }}" placeholder="(5-20 letters)">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="remember" checked="{{ Cookie::get('user_email') !== null }}">
                            <label for="remember" class="form-check-label">Remember me</label>
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                        <div class="text-center">
                            Not registered yet?
                            <a href="{{ route('register') }}">Register here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
