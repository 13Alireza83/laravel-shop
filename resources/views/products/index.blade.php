<!DOCTYPE html>
<html>
<head>
    <title>لیست محصولات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    @extends('layouts.layout')
    @section('title','لیست محصولات')
    @section('content')
    <h1 class="text-center mb-4">🛒 محصولات فروشگاه</h1>

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">
                                {{ $product->name }}
                            </a>
                        </h5>
                        <p class="card-text">💰 قیمت: {{ number_format($product->price) }} تومان</p>
                        <p class="card-text">📦 موجودی: {{ $product->stock }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">مشاهده محصول</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
</body>
</html>

