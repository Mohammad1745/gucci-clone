<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Services\Customer\ProductService;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    private ProductService $service;
    function __construct(ProductService $service)
    {
        $this->service=$service;
    }
    public function index()
    {


        $response=$this->service->homePage();
        $products=$response['data']['data'];
        $categories=$response['data']['category'];
        $subCategories=Subcategory::all();
        //dd($category,$products);

       // dd($products);
        return $response['success'] ?
            view('customer.view.home',compact('products','categories','subCategories'))
            :redirect()->back()->with('error',$response['message']);
    }



}
