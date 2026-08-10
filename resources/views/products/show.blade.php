<!DOCTYPE html>
<html>
<head>
    <title>جزئیات محصول</title>
</head>
<body>
<h1>{{ $product->name }}</h1>
<p>قیمت: {{ $product->price }} تومان</p>
<p>توضیحات: {{ $product->description }}</p>
<p>موجودی: {{ $product->stock }}</p>
<a href="{{route('products.index')}}">بازگشت به لیست محصولات</a>
</body>
</html>
