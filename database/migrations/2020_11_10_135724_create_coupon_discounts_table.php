<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coupon_id');
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');
            $table->unsignedBigInteger('discount_type');
            $table->foreign('discount_type')->references('id')->on('discount_types')->onDelete('cascade');
            $table->double('discount_value', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_discounts');
    }
}
