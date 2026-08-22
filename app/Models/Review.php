<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',
        'is_approved',
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
