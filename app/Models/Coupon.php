<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'type',
        'value',
        'min_order_amount',
        'usage_limit',
        'used_count',
        'expires_at',
        'is_active',
    ];
    public function isValid()
    {
        return $this->is_active &&
            ($this->expires_at === null || $this->expires_at > now()) &&
            ($this->usage_limit === null || $this->used_count < $this->usage_limit);
    }
}
