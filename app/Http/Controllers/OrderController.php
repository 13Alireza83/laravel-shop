<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // ۱. گرفتن سبد خرید از session
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'سبد خرید شما خالی است.');
        }

        // ۲. محاسبه‌ی قیمت کل
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // ۳. ایجاد سفارش
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'pending',
            'shipping_address' => $request->shipping_address ?? 'آدرس ثبت نشده',
        ]);

        // ۴. ایجاد آیتم‌های سفارش
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // ۵. خالی کردن سبد خرید
        session()->forget('cart');

        // ۶. هدایت به صفحه‌ی پیام موفقیت
        return redirect()->route('products.index')->with('success', 'سفارش شما با موفقیت ثبت شد!');
    }
}
