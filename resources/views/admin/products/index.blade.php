@extends('layouts.layout')
@section('title','مدیریت محصولات')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>مدیریت محصولات</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">➕ افزودن محصول جدید</a>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>نام محصول</th>
            <th>قیمت</th>
            <th>موجودی</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ number_format($product->price) }} تومان</td>
            <td>{{ $product->stock }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">✏️ ویرایش</a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">🗑️ حذف</button>
                </form>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>
    @endsection
