<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            [
                "coupon_name" => "FIXED10",
                "status" => 1,
            ],
            [
                "coupon_name" => "PERCENT10",
                "status" => 1,

            ],
            [
                "coupon_name" => "MIXED10",
                "status" => 1,
            ],
            [
                "coupon_name" => "REJECTED10",
                "status" => 1,

            ],
        ];
        DB::table('coupons')->insert($param);
    }
}
