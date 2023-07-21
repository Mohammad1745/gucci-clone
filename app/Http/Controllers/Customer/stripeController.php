<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\SearchRequest;
use App\Http\Services\Customer\ProductService;
use App\Http\Services\Customer\StripeService;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Notifications\addToCartNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class stripeController extends Controller
{
    private StripeService $service;
    function __construct(StripeService $service)
    {
        $this->service=$service;
    }
    public function placeOrder()
    {
        $response=$this->service->placeOrder();
        return $response['success']?redirect()->route('pendingOrder')->with('message',$response['message'])
            :redirect()->back()->with('error',$response['message']);
    }
    public function stripeView()

    {
        $response=$this->service->placeOrder();
        return $response['success']?redirect()->route('pendingOrder')->with('message',$response['message'])
            :redirect()->back()->with('error',$response['message']);
    }
    public function paymentPage()
    {
        $categories=Category::all();
        $subCategories=Subcategory::all();
        return view('customer.view.stripe',compact('categories','subCategories'))->with('message','process your payment here');
    }
}
