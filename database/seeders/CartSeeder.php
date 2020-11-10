<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CartSeeder extends Seeder
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
        for($i=1;$i<=20;$i++) { 
            $numb_products =  $faker->numberBetween(1,10);

            $products = DB::table('products')->inRandomOrder()->limit($numb_products)->get();
            $cart_product = [];
            $total_price = 0.0;
            foreach($products as $product) {
                $cart_product[] = [
                    "productid" => $product->id,
                    "product" => $product->product_name,
                    "price" => $product->amount,
                ];
                $total_price  += floatval($product->amount);  
            }

            $param[] = [
                "customer_session_id" =>  Str::random(20),
                "quantity" => count($cart_product),
                "amount" =>$total_price,
                "content" => serialize($cart_product),

            ];
        }

        DB::table('carts')->insert($param);
    }
}
