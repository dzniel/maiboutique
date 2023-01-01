@extends('template')
@section('title', 'My Profile')
@section('content')
    <div style="background-image: url('{{ asset('images/banner.jpg') }}')" class="banner-bg">
        <div class="min-vh-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-50">
            <div class="container text-center my-5">
                <div class="card border-1 w-100">
                    <div class="card-body">
                        <div class="mt-5 mb-3">
                            <p class="display-5">My Profile</p>
                        </div>
                        <div class="mb-3">
                            <p class="badge bg-secondary fs-5">{{ Auth::user()->username == 'Admin' ? 'ADMIN' : 'MEMBER'}}</p>
                        </div>
                        <div class="mb-3">
                            <p class="fs-5">Username: {{ Auth::user()->username }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="fs-5">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="fs-5">Address: {{ Auth::user()->address }}</p>
                        </div>
                        <div class="mb-5">
                            <p class="fs-5">Phone: {{ Auth::user()->phone_number }}</p>
                        </div>
                        <div class="d-flex justify-content-center mb-5">
                            @if (Auth::user()->username != 'Admin')
                                <a href="{{ route('edit.user', ['type' => 'profile']) }}" class="btn btn-primary fs-5 mx-1">Edit Profile</a>
                            @endif
                            <a href="{{ route('edit.user', ['type' => 'password']) }}" class="btn btn-outline-primary fs-5 mx-1">Edit Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
