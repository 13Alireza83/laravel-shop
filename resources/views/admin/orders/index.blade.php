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
                <td>{{ \Morilog\Jalali\jDate::forge($order->created_at)->format('Y/m/d') }}</td>
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
                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>در انتظار</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>در حال پردازش</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>ارسال شده</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>لغو شده</option>
                        </select>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
