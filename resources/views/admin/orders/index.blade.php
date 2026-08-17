@extends('layouts.layout')

@section('title', 'مدیریت سفارشات')

@section('content')
    <h1 class="mb-4">📦 مدیریت سفارشات</h1>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>شناسه</th>
            <th>کاربر</th>
            <th>تاریخ ثبت</th>
            <th>قیمت کل</th>
            <th>وضعیت</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'نامشخص' }}</td>
                <td>{{ jalali_date($order->created_at) }}</td>
                <td>{{ number_format($order->total_price) }} تومان</td>
                <td>
                    @php
                        $statusColors = [
                            'pending' => 'warning',
                            'processing' => 'primary',
                            'shipped' => 'success',
                            'cancelled' => 'danger',
                        ];
                        $statusLabels = [
                            'pending' => 'در انتظار',
                            'processing' => 'در حال پردازش',
                            'shipped' => 'ارسال شده',
                            'cancelled' => 'لغو شده',
                        ];
                    @endphp
                    <span class="badge bg-{{ $statusColors[$order->status] ?? 'secondary' }}">
                            {{ $statusLabels[$order->status] ?? $order->status }}
                        </span>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">تغییر وضعیت</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
