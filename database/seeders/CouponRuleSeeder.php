<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ruletype = DB::table('rule_types')->where('status',1)->pluck('id','rule_name');
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
                        "rule_type" =>$ruletype['price'],
                        "condition" =>'>',
                        "condition_value" =>50,
                    ],
                    [
                        "coupon_id" => $data->id,
                        "rule_type" =>$ruletype['item'],
                        "condition" =>'>=',
                        "condition_value" =>1,
                    ]

                ];

                DB::table('coupon_rules')->insert($param);

            } else if(trim($data->coupon_name) == "PERCENT10") {
                $param = [
                    [
                        "coupon_id" => $data->id,
                        "rule_type" =>$ruletype['price'],
                        "condition" =>'>',
                        "condition_value" =>100,
                    ],
                    [
                        "coupon_id" => $data->id,
                        "rule_type" =>$ruletype['item'],
                        "condition" =>'>=',
                        "condition_value" =>2,
                    ]

                ];
                DB::table('coupon_rules')->insert($param);

            }  else if(trim($data->coupon_name) == "MIXED10") {
                $param = [
                    [
                        "coupon_id" => $data->id,
                        "rule_type" =>$ruletype['price'],
                        "condition" =>'>',
                        "condition_value" =>200,
                    ],
                    [
                        "coupon_id" => $data->id,
                        "rule_type" =>$ruletype['item'],
                        "condition" =>'>=',
                        "condition_value" =>3,
                    ]

                ];
                DB::table('coupon_rules')->insert($param);

            } else if(trim($data->coupon_name) == "REJECTED10") {
                $param = [
                    [
                        "coupon_id" => $data->id,
                        "rule_type" =>$ruletype['price'],
                        "condition" =>'>',
                        "condition_value" =>1000,
                    ]

                ];
                DB::table('coupon_rules')->insert($param);

            }
        }

    }
}
