@extends('layouts.layout')

@section('title', 'تماس با ما')

@section('content')
    <h1>تماس با ما</h1>
    <p>ایمیل: info@shop.com</p>
    <p>تلفن: ۰۲۱-۱۲۳۴۵۶۷۸</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">بازگشت به فروشگاه</a>
@endsection
