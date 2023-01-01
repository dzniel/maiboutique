@extends('template')
@section('title', 'Welcome')
@section('content')
    <div style="background-image: url('{{ asset('images/banner.jpg') }}')" class="banner-bg">
        <div class="min-vh-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-50">
            <div class="text-center text-white">
                <p class="display-4 fw-bold">Welcome to <u>MaiBoutique</u></p>
                <p class="display-6">Online Boutique that provides you with various clothes to suit your various activities.</p>
                <a href="{{ route('register') }}"><button class="btn btn-primary btn-lg">SIGN UP NOW</button></a>
            </div>
        </div>
    </div>
@endsection
