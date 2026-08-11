<!DOCTYPE html>
<html>
<head>
    <title>جزئیات محصول</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ $product->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>💰 قیمت:</strong> {{ number_format($product->price) }} تومان</p>
            <p><strong>📦 موجودی:</strong> {{ $product->stock }}</p>
            <p><strong>📝 توضیحات:</strong> {{ $product->description ?? 'توضیحی وارد نشده است.' }}</p>
            <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">بازگشت به لیست محصولات</a>
        </div>
    </div>
</div>
</body>
</html>
