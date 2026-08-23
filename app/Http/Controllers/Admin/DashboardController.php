<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();
        $totalReviews = Review::count();

        $totalRevenue = Order::where('status', 'shipped')->sum('total_price');
        $monthlyRevenue = Order::where('status', 'shipped')
            ->whereMonth('created_at', now()->month)
            ->sum('total_price');

        $orderStatuses = [
            'pending' => Order::where('status', 'pending')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'shipped' => Order::where('status', 'shipped')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
        ];

        return view('admin.dashboard', compact(
            'totalProducts', 'totalOrders', 'totalUsers', 'totalReviews',
            'totalRevenue', 'monthlyRevenue', 'orderStatuses'
        ));
    }
}
