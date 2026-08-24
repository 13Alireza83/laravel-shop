@extends('layouts.layout')
@section('title','افزودن محصول جدید')
@section('content')
    <h1>افزودن محصول جدید</h1>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">نام محصول</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">قیمت (تومان)</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">موجودی</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">توضیحات</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <!-- ===== فیلد آپلود تصاویر ===== -->
        <div class="mb-3">
            <label for="images" class="form-label">تصاویر محصول</label>
            <input type="file" name="images[]" class="form-control" multiple accept="image/*">
            <small class="text-muted">می‌توانید چندین عکس انتخاب کنید.</small>
        </div>
        <!-- ===== پایان فیلد تصاویر ===== -->

        <button type="submit" class="btn btn-primary">ذخیره</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">بازگشت</a>
    </form>
@endsection
