<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuleTypeSeeder extends Seeder
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
                "rule_name" => "price",
                "status" => 1,
            ],
            [
                "rule_name" => "item",
                "status" => 1,

            ]
        ];

        
       DB::table('rule_types')->insert($param);

    }
}
