<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuleType extends Model
{
    use HasFactory;

    public function couponRule()
    {
        return $this->hasMany('App\Models\CouponRules','rule_type', 'id');
    }
}
