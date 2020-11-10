<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $ruletype = DB::table('discount_types')->where('status',1)->pluck('id','discount_name');
        $result = DB::table('coupons')->get();

        if($result->isEmpty())
        {
           
            return ;
        }

        foreach($result as $data) {

            if(trim($data->coupon_name) == "FIXED10") {
                $param = [
                    [
                        "coupon_id" => $data->id,
                        "discount_type" =>$ruletype['amount'],
                        "discount_value" =>10,
                    ],
                    

                ];

                DB::table('coupon_discounts')->insert($param);

            } else if(trim($data->coupon_name) == "PERCENT10") {
                $param = [
                    [
                        "coupon_id" => $data->id,
                        "discount_type" =>$ruletype['percent'],
                        "discount_value" =>10,
                    ],
                   

                ];
                DB::table('coupon_discounts')->insert($param);

            }  else if(trim($data->coupon_name) == "MIXED10") {
                $param = [
                    [
                        "coupon_id" => $data->id,
                        "discount_type" =>$ruletype['percent'],
                        "discount_value" =>10,
                    ],
                    [
                        "coupon_id" => $data->id,
                        "discount_type" =>$ruletype['amount'],
                        "discount_value" =>10,
                    ]

                ];
                DB::table('coupon_discounts')->insert($param);

            } else if(trim($data->coupon_name) == "REJECTED10") {
                $param = [
                    [
                        "coupon_id" => $data->id,
                        "discount_type" =>$ruletype['percent'],
                        "discount_value" =>10,
                    ],
                    [
                        "coupon_id" => $data->id,
                        "discount_type" =>$ruletype['amount'],
                        "discount_value" =>10,
                    ]
                ];
                DB::table('coupon_discounts')->insert($param);

            }
        }

    }
}
