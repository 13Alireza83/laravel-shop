@php use Morilog\Jalali\jDate; @endphp
@extends('layouts.layout')
@section('title','سفارشات من')
@section('content')
    <h1 class="mb-4">📦 سفارشات من</h1>

    @if($orders->isEmpty())
        <div class="alert alert-info">
            شما هیچ سفارشی ندارید.
        </div>
    @else
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>شناسه</th>
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
                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
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
                        <a href="#" class="btn btn-sm btn-primary">مشاهده</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
