<!DOCTYPE html>
<html>
<head>
    <title>لیست محصولات</title>
</head>
<body>
<h1>محصولات فروشگاه</h1>
@foreach($products as $product)
    <div>
        <h3>{{$products->name}}</h3>
        <p>قیمت:{{$products->price}}</p>
        <p>موجودی:{{$product->stock}}</p>
        <hr>
    </div>
    @endforeach
</body>
</html>

