<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [];
        $faker = Faker::create();
        for($i=1;$i<=100;$i++) {
            $param[] = [
                    "product_name" => "Product ".$i,
                    "amount" =>$faker->numberBetween(10,1000) ,
                ];
                

        }
        DB::table('products')->insert($param);
    }
}
