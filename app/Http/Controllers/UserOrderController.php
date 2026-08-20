<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function index(){
        $orders = Order::where('user_id',Auth::id())->orderBy('created_at','desc')->get();
        return view('user.orders',compact('orders'));
    }
}
