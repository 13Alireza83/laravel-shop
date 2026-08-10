<!DOCTYPE html>
<html>
<head>
    <title>لیست محصولات</title>
</head>
<body>
<h1>محصولات فروشگاه</h1>
@foreach($products as $product)
    <div>
        <h3>
            <a href="{{ route('products.show',$product->id) }}">
                {{$product->name}}
            </a>
        </h3>
        <p>قیمت:{{$product->price}}</p>
        <p>موجودی:{{$product->stock}}</p>
        <hr>
    </div>
    @endforeach
</body>
</html>

