<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponDiscount extends Model
{
    use HasFactory;

    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon','coupon_id', 'id');
    }

    public function discountType()
    {
        return $this->belongsTo('App\Models\DiscountType','discount_type', 'id');
    }
}
