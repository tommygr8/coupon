<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountType extends Model
{
    use HasFactory;
    public function discount()
    {
        return $this->hasMany('App\Models\CouponDiscount','discount_type', 'id');
    }
}
