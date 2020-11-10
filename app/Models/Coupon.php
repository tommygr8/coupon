<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public function ruleType()
    {
        return $this->hasMany('App\Models\CouponRules','coupon_id', 'id');
    }

    public function discount()
    {
        return $this->hasMany('App\Models\CouponDiscount','coupon_id', 'id');
    }
}
