<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CouponRules;
use App\Models\CouponDiscount;
use App\Http\Requests\CouponRequest;






class CartController extends Controller
{
    function index(Request $request, $cartid=0) {
        $data = [];
        if($cartid ==0) {

        /****************
         * If you do not specify cartid in the url, A random row in the cart table is selected
         * inRandomOrder() is to select row(s) randonly.

        **************************/
          $data['cart'] =  Cart::inRandomOrder()->first();


        } else {
            $data['cart'] = Cart::where('id',$cartid)->first();
        }

        return view('cart',$data);
    }

    function getCoupon(CouponRequest $request, $cartid) {
        $coupon = Coupon::where('coupon_name',$request->coupon)->first();
        if(!$coupon) {
            $param = ['msg'=>"The coupon code is not valid",'status'=>-2];
            
            return response()->json($param, 200);
        }

        $cart = Cart::where('id',$cartid)->first();


        /****************
         * Get all the rules added in the coupon rule table that is specific to the Coupon 
         * we entered. There are rules for every coupon
        **************************/

        $couponrules = CouponRules::with(['ruletype'])->where('coupon_id',$coupon->id)->get();
       
        $validrule = true;
        foreach($couponrules as $rule) {
          if(trim($rule->ruletype->rule_name) == "price"){

        /****************
         * We already created a function in our helper directory called couponCriteria
         * The function help in comparing the criteria to see if the cart meet each rules 
         * of the coupon. Return true if its met and false if its not met.
         * It break out of the look if one of the criteria is not met. i.e there is no need
         * in checking for other rules if one of the rules is not met
            **************************/
            if(!couponCriteria($cart->amount, $rule->condition,  $rule->condition_value)) {
               $validrule = false; 
                break;
            }

          } else if(trim($rule->ruletype->rule_name) == "item"){
           if(!couponCriteria($cart->quantity, $rule->condition,  $rule->condition_value)) {
                $validrule = false;
            break;
           }

         }
        }

        /****************
         * If one of the rules is not met, we return this message
            **************************/
        if(!$validrule) {
            $param = ['msg'=>"Sorry! You do not meet the coupon requirement",'status'=>-2];
            
            return response()->json($param, 200);

        }


        /****************
         * If all the rules are met, we then check for the discount, we checked for all availble 
         * discounts either fixed amount or percentage. In a case where we have both fixed and percent
         * We use the highest value for the discount.
            **************************/
        $discounts = CouponDiscount::with(['discountType'])->where('coupon_id',$coupon->id)->get();

        $discountvalue = 0;
        foreach($discounts as $discount) {
          if(trim($discount->discountType->discount_name) == "amount"){
            if($discountvalue < floatval($discount->discount_value))
                $discountvalue = floatval($discount->discount_value	);

                
          } else if(trim($discount->discountType->discount_name) == "percent"){
              $dicountamount = (floatval($discount->discount_value) * floatval($cart->amount)) / 100;
              if($discountvalue < floatval($dicountamount))
                $discountvalue = floatval($dicountamount);
           
                
           }

         }

         $data = [
             "rule_status" =>1,
             "discount" =>$discountvalue,
             "amount" =>$cart->amount,
             "amount_due" => (floatval($cart->amount) - floatval($discountvalue))

         ];
         $param = ['data'=>$data,'status'=>1];
            
            return response()->json($param, 200);


         
        


    }
}
