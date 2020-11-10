<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountTypeSeeder extends Seeder
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
                "discount_name" => "amount",
                "status" => 1,
            ],
            [
                "discount_name" => "percent",
                "status" => 1,

            ]
        ];
        DB::table('discount_types')->insert($param);
        
        //
    }
}
