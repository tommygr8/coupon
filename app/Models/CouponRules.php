<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponRules extends Model
{
    use HasFactory;

    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon','coupon_id', 'id');
    }

    public function ruletype()
    {
        return $this->belongsTo('App\Models\RuleType','rule_type', 'id');
    }
}
