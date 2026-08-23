<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'محصول به سبد خرید اضافه شد!');
    }
    public function index(){
        $cart = session()->get('cart',[]);
        return view('cart',compact('cart'));
    }
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'محصول از سبد خرید حذف شد!');
    }
    public function increase($id){
        $cart = session()->get('cart', []);
        if (isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'تعداد محصول با موفقیت افزایش یافت.');
        }
    }
    public function decrease($id){
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']--;
            if ($cart[$id]['quantity'] == 0) {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'تعداد محصول با موفقیت کاهش یافت.');
        }
    }
    public function applyCoupon(Request $request)
    {
        $code = $request->coupon_code;
        $coupon = Coupon::where('code', $code)->first();

        if (!$coupon || !$coupon->isValid()) {
            return redirect()->back()->with('error', 'کد تخفیف نامعتبر یا منقضی شده است.');
        }

        session()->put('coupon', $coupon);

        return redirect()->back()->with('success', 'کد تخفیف با موفقیت اعمال شد.');
    }
    public function removeCoupon()
    {
        session()->forget('coupon');
        return redirect()->back()->with('success', 'کد تخفیف لغو شد.');
    }
}
