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
                        <form action="{{ route('cart.increase', $id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">+</button>
                        </form>
                        <form action="{{ route('cart.decrease', $id) }}" method="POST" style="display:inline;">
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

            <!-- نمایش تخفیف -->
            @if(session()->has('coupon'))
                @php
                    $coupon = session()->get('coupon');
                    if ($coupon->type == 'percent') {
                        $discount = ($total * $coupon->value) / 100;
                    } else {
                        $discount = $coupon->value;
                    }
                    $finalTotal = $total - $discount;
                @endphp
                <tr class="table-success">
                    <th colspan="3" class="text-end">تخفیف ({{ $coupon->code }}):</th>
                    <th>- {{ number_format($discount) }} تومان</th>
                    <th></th>
                </tr>
                <tr class="table-primary">
                    <th colspan="3" class="text-end">قیمت نهایی:</th>
                    <th>{{ number_format($finalTotal) }} تومان</th>
                    <th></th>
                </tr>
            @endif
            </tfoot>
        </table>

        <div class="mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">ادامه خرید</a>
        </div>

        <form action="{{ route('checkout.store') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-success">✅ ثبت سفارش</button>
        </form>

        <form action="{{ route('payment.process') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-success">✅ پرداخت آزمایشی</button>
        </form>

        <div class="row mt-4">
            <div class="col-md-6">
                <form action="{{ route('cart.applyCoupon') }}" method="POST" class="d-flex">
                    @csrf
                    <input type="text" name="coupon_code" class="form-control me-2" placeholder="کد تخفیف را وارد کنید">
                    <button type="submit" class="btn btn-outline-primary">اعمال کد</button>
                </form>
            </div>
        </div>
        @if(session()->has('coupon'))
            <div class="mt-2">
                <a href="{{ route('cart.removeCoupon') }}" class="btn btn-sm btn-danger">لغو کد تخفیف</a>
            </div>
        @endif

        <a href="{{ route('payment.request') }}" class="btn btn-primary mt-3">
            💳 پرداخت با زرین‌پال
        </a>
    @endif
@endsection

