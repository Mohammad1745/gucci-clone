<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageViewController extends Controller
{
    //

    public function singleProductPage()
    {
        return view('customer.view.singleProductPage');
    }
    public function addToCardPage()
    {
        return view('customer.view.addToCardPage');
    }
    public function checkoutPage()
    {
        return view('customer.view.checkoutPage');
    }
    public function userProfilePage()
    {
        return view('customer.view.userProfilePage');
    }
    public function newReleasePage()
    {
        return view('customer.view.newReleasePage');
    }
    public function bestSellsPage()
    {
        return view('customer.view.bestSellsPage');
    }
    public function customerServicePage()
    {
        return view('customer.view.customerServicePage');
    }



}
