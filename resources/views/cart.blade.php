@extends('layouts.layout')

@section('title', 'سبد خرید')
@section('content')
    <h1 class="mb-4">🛒 سبد خرید</h1>
    @if(empty($cart))
            <div class="alert alert-info">
                سبد خرید شما خالی است.
            </div>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>نام محصول</th>
                <th>قیمت (تومان)</th>
                <th>تعداد</th>
                <th>قیمت کل</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @php $total = 0; @endphp
        @foreach($cart as $id => $item)
            @php $itemTotal = $item['price'] * $item['quantity']; @endphp
            @php $total += $itemTotal; @endphp
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ number_format($item['price']) }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ number_format($itemTotal) }}</td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                    <form action="{{route('cart.increase',$id)}}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">+</button>
                    </form>
                    <form action="{{route('cart.decrease',$id)}}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">-</button>
                    </form>
                </td>
            </tr>
        @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="3" class="text-end">جمع کل:</th>
                <th>{{ number_format($total) }} تومان</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
        <div class="mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">ادامه خرید</a>
        </div>
        <form action="{{ route('checkout.store') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-success">✅ ثبت سفارش</button>
        </form>
        <!-- دکمه‌ی پرداخت آزمایشی -->
        <form action="{{ route('payment.process') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-success">✅ پرداخت آزمایشی</button>
        </form>

        <!-- دکمه‌ی پرداخت واقعی (زرین‌پال) -->
        <a href="{{ route('payment.request') }}" class="btn btn-primary mt-3">
            💳 پرداخت با زرین‌پال
        </a>
    @endif
@endsection

