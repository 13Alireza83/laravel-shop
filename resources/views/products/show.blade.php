<!DOCTYPE html>
<html>
<head>
    <title>جزئیات محصول</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ $product->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>💰 قیمت:</strong> {{ number_format($product->price) }} تومان</p>
            <p><strong>📦 موجودی:</strong> {{ $product->stock }}</p>
            <p><strong>📝 توضیحات:</strong> {{ $product->description ?? 'توضیحی وارد نشده است.' }}</p>
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">➕ افزودن به سبد خرید</button>
            </form>
            <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">بازگشت به لیست محصولات</a>
        </div>
    </div>

    <!-- ========== نظرات کاربران ========== -->
    <div class="mt-5">
        <h3>💬 نظرات کاربران</h3>

        <!-- امتیاز میانگین -->
        @php
            $avgRating = $product->averageRating();
            $ratingCount = $product->approvedReviews()->count();
        @endphp

        <div class="mb-3">
            <strong>امتیاز:</strong>
            @for($i = 1; $i <= 5; $i++)
                @if($i <= round($avgRating))
                    ⭐
                @else
                    ☆
                @endif
            @endfor
            <span class="text-muted">({{ number_format($avgRating, 1) }} از 5 - {{ $ratingCount }} نظر)</span>
        </div>

        <!-- لیست نظرات -->
        @if($ratingCount > 0)
            <div class="list-group">
                @foreach($product->approvedReviews as $review)
                    <div class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <strong>{{ $review->user->name ?? 'کاربر ناشناس' }}</strong>
                            <span>
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        ⭐
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </span>
                        </div>
                        <p class="mb-1">{{ $review->comment }}</p>
                        <small class="text-muted">{{ $review->created_at->format('Y-m-d') }}</small>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">هنوز نظری برای این محصول ثبت نشده است.</p>
        @endif

        <!-- فرم ثبت نظر -->
        @auth
            <div class="mt-4">
                <h5>ثبت نظر جدید</h5>
                <form action="{{ route('reviews.store', $product->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">امتیاز</label>
                        <select name="rating" class="form-control" required>
                            <option value="5">⭐ ۵ ستاره</option>
                            <option value="4">⭐ ۴ ستاره</option>
                            <option value="3">⭐ ۳ ستاره</option>
                            <option value="2">⭐ ۲ ستاره</option>
                            <option value="1">⭐ ۱ ستاره</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">نظر شما</label>
                        <textarea name="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت نظر</button>
                </form>
            </div>
        @else
            <p class="mt-3">برای ثبت نظر، <a href="{{ route('login') }}">وارد</a> شوید.</p>
        @endauth
    </div>
    <!-- ========== پایان نظرات ========== -->
    <!-- گالری تصاویر -->
    @if($product->images->count() > 0)
        <div class="mt-4">
            <h5>🖼️ گالری تصاویر</h5>
            <div class="row">
                @foreach($product->images as $image)
                    <div class="col-md-3 mb-3">
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                             class="img-fluid img-thumbnail"
                             alt="{{ $product->name }}">
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</div>
</body>
</html>
