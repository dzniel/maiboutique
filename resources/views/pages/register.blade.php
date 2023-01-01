@extends('template')
@section('title', 'Sign Up')
@section('content')
    <div style="background-image: url('{{ asset('images/banner.jpg') }}')" class="banner-bg">
        <div class="min-vh-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-50">
            <div class="card border-1 col-sm-3">
                <div class="card-body p-sm-5">
                    <h3 class="card-title text-center fw-bold fs-2 mb-5">Sign Up</h3>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="(5-20 letters)" value="{{ old('username') }}" autofocus>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="(5-20 letters)">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="(10-13 numbers)" value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="(min. 5 letters)" value="{{ old('address') }}">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="text-center">
                            Already registered?
                            <a href="{{ route('login') }}">Sign in here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
