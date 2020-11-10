<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call([
            RuleTypeSeeder::class,
            DiscountTypeSeeder::class,
            CouponSeeder::class,
            CouponRuleSeeder::class,
            CouponDiscountSeeder::class,
            ProductSeeder::class,
            CartSeeder::class,
        ]);
    }
}
