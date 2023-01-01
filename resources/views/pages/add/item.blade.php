@extends('template')
@section('title', 'Add Item')
@section('content')
    <div style="background-image: url('{{ asset('images/banner.jpg') }}')" class="banner-bg">
        <div class="min-vh-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-50">
            <div class="card border-1 col-sm-3">
                <div class="card-body p-sm-5">
                    <h3 class="card-title text-center fw-bold fs-2 mb-5">Add Item</h3>
                    <form action="{{ route('new.product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="image" class="form-label">Clothes Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" autofocus>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Clothes Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Clothes Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}">
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Clothes Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="stock" class="form-label">Clothes Stock</label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}">
                            @error('stock')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
