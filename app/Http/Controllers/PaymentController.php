<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaraPardakht\LaraPardakht;

class PaymentController extends Controller
{
    // متد پرداخت آزمایشی (قدیمی)
    public function process(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'سبد خرید شما خالی است.');
        }

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'pending',
            'shipping_address' => $request->shipping_address ?? 'آدرس ثبت نشده',
        ]);

        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('products.index')->with('success', 'پرداخت با موفقیت انجام شد! سفارش شما ثبت گردید.');
    }

    // متد درخواست پرداخت به زرین‌پال
    public function request()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'سبد خرید شما خالی است.');
        }

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $payment = new LaraPardakht();
        $payment->amount($totalPrice);
        $payment->callback(route('payment.callback'));
        $payment->description('پرداخت سفارش فروشگاه');
        $result = $payment->request();

        if ($result->success) {
            return redirect($result->url);
        } else {
            return redirect()->route('cart.index')->with('error', 'خطا در اتصال به درگاه پرداخت.');
        }
    }

    // متد بازگشت از درگاه (تأیید پرداخت)
    public function callback()
    {
        // بعداً می‌نویسیم
    }
}
