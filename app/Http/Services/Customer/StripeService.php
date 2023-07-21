<?php

namespace App\Http\Services\Customer;

use App\Http\Services\Service;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingInfo;
use App\Models\Subcategory;
use App\Models\User;
use App\Notifications\addToCartNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Token;

class StripeService extends service
{

    public function placeOrder(array $data): array
    {
        Stripe::setApiKey(env('sk_test_51NDLvfJv67KMhc4RFu0dvlOT0WZ3ENrEBBeLMZRA9bkY7qmy4SKIl6gA9G0M8nBqKWmzCUiuEFZ0PulhDt3akUk100enLjyLYN'));
        try{
            $user_id=Auth::id();
            $cart_item=Cart::where('user_id',Auth::id())->get();
            $shippingInfo=ShippingInfo::where('user_id',Auth::id())->first();

            foreach ($cart_item as $item)
            {
                $order=Order::insert([
                    'user_id'=>$user_id,
                     'number'=>$shippingInfo->number,
                    'village_name'=>$shippingInfo->village_name,
                    'postal_code'=>$shippingInfo->postal_code,
                    'product_name'=>$item->product_name,
                    'quantity'=>$item->quantity,
                    'total_price'=>$item->price,
                    'status'=>'pending'
                ]);
               Cart::findOrFail($item->id)->delete();
               $amount=0;
               $amount=$amount+$item->price;
            };
            $token = Token::create([
                'card' => [
                    'name' => $data['name'],
                    'number' => $data['number'],
                    'cvc' => $data['cvc'],
                    'exp_month' => $data['month'],
                    'exp_year' => $data['year'],
                ],
            ]);
            $stripeToken = $token->id;
            Charge::create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $stripeToken,
                'description' => 'Example charge',
            ]);
            return $this->responseSuccess('payment successfully Order placed successfully');
        }catch (\Exception $exception){
            return $this->responseError($exception->getMessage());
        }
    }


}

