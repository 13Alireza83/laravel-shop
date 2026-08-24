@extends('layouts.layout')
@section('title','مدیریت نظرات')
@section('content')
    <h1 class="mb-4">📝 مدیریت نظرات</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($reviews->isEmpty())
        <div class="alert alert-info">هیچ نظر تأیید نشده‌ای وجود ندارد.</div>
    @else
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>کاربر</th>
                <th>محصول</th>
                <th>امتیاز</th>
                <th>نظر</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->user->name ?? 'کاربر ناشناس' }}</td>
                    <td>{{ $review->product->name ?? 'محصول حذف شده' }}</td>
                    <td>
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $review->rating) ⭐ @else ☆ @endif
                        @endfor
                    </td>
                    <td>{{ Str::limit($review->comment, 50) }}</td>
                    <td>
                        <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">✅ تأیید</button>
                        </form>
                        <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید؟')">🗑️ حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
