<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        if ($search){
            $products = Product::where('name', 'like', '%' . $search . '%')->get();
        }else{
            $products = Product::paginate(10);
        }
        return view('products.index',compact('products'));
    }
    public function show($id){
        $product = Product::findOrFail($id);
        return view('products.show',compact('product'));
    }
}
