<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::where('is_approved',false)->with('user','product')->get();
        return view('admin.reviews.index',compact('reviews'));
    }
    public function approve($id){
        $review = Review::findOrFail($id);
        $review->is_approved = true;
        $review->save();
        return redirect()->back()->with('success','نظر با موفقیت تایید شد!');
    }
    public function destroy($id){
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->back()->with('success','نظر با موفقیت حذف شد!');
    }
}
