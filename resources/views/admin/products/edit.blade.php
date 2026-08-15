@extends('layouts.layout')
@section('title','ویرایش محصول')
@section('content')
    <h1>ویرایش محصول</h1>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">نام محصول</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ $product->slug }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">قیمت (تومان)</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">موجودی</label>
            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">دسته‌بندی</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">بروزرسانی</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">بازگشت</a>
    </form>
@endsection
