@extends('template')
@section('title', 'Home')
@section('content')
    @if (!count($products))
        <div class="text-center my-5">
            <p class="display-5">Unfortunately, all of our products are sold out!</p>
        </div>
    @else
        <div class="text-center my-5">
            <p class="display-5">Find your best clothes here!</p>
        </div>
        <div class="container">
            <div class="row row-cols-4 g-3">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset($product->image) }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Rp. {{ number_format($product->price, 2, ',', '.') }}</p>
                                <a href="{{ route('show.product.detail', ['product_id' => $product->id]) }}" class="btn btn-primary">More Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center my-5">
            <ul class="pagination">
                @if (!$products->onFirstPage())
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}">&laquo;</a>
                    </li>
                @endif
                @for ($page = 1; $page <= $products->lastPage(); $page += 1)
                    @if ($page == $products->currentPage())
                        <li class="page-item active">
                            <a class="page-link" href="#">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->url($page) }}">{{ $page }}</a>
                        </li>
                    @endif
                @endfor
                @if ($products->currentPage() != $products->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}">&raquo;</a>
                    </li>
                @endif
            </ul>
        </div>
    @endif
@endsection
