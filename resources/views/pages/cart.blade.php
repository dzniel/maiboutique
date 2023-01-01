@extends('template')
@section('title', 'Cart')
@section('content')
    @auth
    <div class="text-center my-5">
        <p class="display-5">My Cart</p>
    </div>
    <div class="container my-5">
        <div class="d-flex justify-content-end align-items-center">
            @if ($total_quantity)
                <p class="fs-4 mx-3 my-0" style="padding: 0;"><b>Total Price: Rp. {{ number_format($total_price, 2, ',', '.') }}</b></p>
                <a href="{{ route('checkout.cart') }}" class="btn btn-primary">Checkout ({{ $total_quantity }})</a>
            @else
                <p class="fs-4 mx-3 my-0" style="padding: 0;"><b>Total Price: Rp. 0</b></p>
                <a href="#" class="btn btn-secondary disabled">Checkout ({{ 0 }})</a>
            @endif
        </div>
    </div>
    @if ($cart_items)
        <div class="container">
            <div class="row row-cols-4 g-3">
                @foreach ($cart_items as $item)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset($item->product->image) }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->product->name }}</h5>
                                <p class="card-text">Rp. {{ number_format($item->product->price, 2, ',', '.') }}</p>
                                <p class="card-text">Qty: {{ $item->quantity }}</p>
                                <a href="{{ route('edit.cart', ['cart' => $item]) }}" class="btn btn-primary">Edit Cart</a>
                                <a href="{{ route('remove.cart.item', ['cart' => $item]) }}" class="btn btn-danger">Remove from Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center my-5">
            <ul class="pagination">
                @if (!$cart_items->onFirstPage())
                    <li class="page-item">
                        <a class="page-link" href="{{ $cart_items->previousPageUrl() }}">&laquo;</a>
                    </li>
                @endif
                @for ($page = 1; $page <= $cart_items->lastPage(); $page += 1)
                    @if ($page == $cart_items->currentPage())
                        <li class="page-item active">
                            <a class="page-link" href="#">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $cart_items->url($page) }}">{{ $page }}</a>
                        </li>
                    @endif
                @endfor
                @if ($cart_items->currentPage() != $cart_items->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{{ $cart_items->nextPageUrl() }}">&raquo;</a>
                    </li>
                @endif
            </ul>
        </div>
    @endif
    @endauth
@endsection
