@extends('template')
@section('title', 'Product Detail')
@section('content')
    <div class="text-center my-5">
        <p class="display-5">Product Details</p>
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
                @if (Auth::user()->username != 'Admin')
                    <div class="mb-3">
                        <p class="fs-5"><b>Stock: {{ $product->stock }}</b></p>
                        <p class="fs-5">Quantity</p>
                    </div>
                    <form action="{{ route('add.cart.item', ['product_id' => $product->id]) }}" method="post">
                        @csrf
                        <div class="d-flex justify-content-evenly mb-3">
                            <input type="number" class="form-control text-center w-50 mx-1 @error('quantity') is-invalid @enderror" name="quantity" value="1">
                            @if ($product->stock == 0)
                                <button type="submit" class="btn disabled w-50 mx-1 fs-5">Add to Cart</button>
                            @else
                                <button type="submit" class="btn btn-success w-50 mx-1 fs-5">Add to Cart</button>
                            @endif
                        </div>
                        <div class="d-grid">
                            <a href="{{ route('home') }}" class="btn btn-danger mx-1 fs-5">Back</a>
                        </div>
                    </form>
                @else
                    <div class="d-flex justify-content-evenly">
                        <a href="{{ route('delete.product', ['product' => $product]) }}" class="btn btn-danger w-50 mx-1 fs-5">Delete Item</a>
                        <a href="{{ route('home') }}" class="btn btn-outline-danger w-50 mx-1 fs-5">Back</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
