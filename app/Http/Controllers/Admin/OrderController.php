<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('user')->orderBy('created_at','desc')->get();
        return view('admin.orders.index',compact('orders'));
    }
    public function updateStatus(Request $request,$id){
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'وضعیت سفارش تغییر کرد.');
    }
}
