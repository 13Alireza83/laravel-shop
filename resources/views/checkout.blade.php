@extends('layouts.layout')

@section('title', 'تکمیل خرید')

@section('content')
    <h1 class="mb-4">تکمیل خرید</h1>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="shipping_address" class="form-label">آدرس ارسال</label>
            <textarea name="shipping_address" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">ثبت سفارش</button>
        <a href="{{ route('cart.index') }}" class="btn btn-secondary">بازگشت به سبد خرید</a>
    </form>
@endsection
