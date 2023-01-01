@extends('template')
@section('title', 'Product Detail')
@section('content')
    <div class="text-center my-5">
        <p class="display-5">Edit Cart</p>
    </div>
    <div class="d-flex flex-row justify-content-center my-5">
        <div class="card bg-light">
            <img src="{{ asset($product->image) }}" style="height: 35vh;">
        </div>
        <div class="card bg-light w-25">
            <div class="card-body">
                <div class="mb-3">
                    <p class="h2">{{ $product->name }}</p>
                    <p class="fs-4">Rp. {{ number_format($product->price, 2, ',', '.') }}</p>
                </div>
                <hr>
                <div class="mb-5">
                    <p class="h4">Product Detail</p>
                    <p class="fs-5">{!! $product->description !!}</p>
                </div>
                <div class="mb-3">
                    <p class="fs-5"><b>Stock: {{ $product->stock }}</b></p>
                    <p class="fs-5">Quantity</p>
                </div>
                <form action="{{ route('update.cart', ['cart' => $cart]) }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-evenly mb-3">
                        <input type="number" class="form-control text-center w-50 mx-1 @error('quantity') is-invalid @enderror" name="quantity" value="{{ $cart->quantity }}">
                        <button type="submit" class="btn btn-success w-50 mx-1 fs-5">Update Cart</button>
                    </div>
                    <div class="d-grid">
                        <a href="{{ route('cart', ['user_id' => Auth::user()->id]) }}" class="btn btn-danger mx-1 fs-5">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
