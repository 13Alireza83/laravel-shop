@extends('layouts.layout')

@section('title', 'داشبورد ادمین')

@section('content')
    <h1 class="mb-4">📊 داشبورد ادمین</h1>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">محصولات</h5>
                    <h2>{{ $totalProducts }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">سفارشات</h5>
                    <h2>{{ $totalOrders }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">کاربران</h5>
                    <h2>{{ $totalUsers }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">نظرات</h5>
                    <h2>{{ $totalReviews }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">💰 درآمد</div>
                <div class="card-body">
                    <p><strong>درآمد کل:</strong> {{ number_format($totalRevenue) }} تومان</p>
                    <p><strong>درآمد ماه جاری:</strong> {{ number_format($monthlyRevenue) }} تومان</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">📦 وضعیت سفارشات</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            در انتظار <span class="badge bg-warning">{{ $orderStatuses['pending'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            در حال پردازش <span class="badge bg-primary">{{ $orderStatuses['processing'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            ارسال شده <span class="badge bg-success">{{ $orderStatuses['shipped'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            لغو شده <span class="badge bg-danger">{{ $orderStatuses['cancelled'] }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
