<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Services\Customer\ProductService;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

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
public  function singleProductPage($id)
{
    $categories=Category::all();
    $subCategories=Subcategory::all();
    $response=$this->service->singleProduct($id);
    $product=$response['data']['data'];
    $products=$response['data']['products'];
    $category=$response['data']['category'];
    $subCategory=$response['data']['subCategory'];
    return $response['success']?view('customer.view.singleProductPage',compact('product','categories','subCategories','category','subCategory','products'))
        :redirect()->back()->with('error',$response['message']);
}
public function addToCardPage()
{
    $response=$this->service->addToCardPage();
    $categories=Category::all();
    $subCategories=Subcategory::all();

    $carts=$response['data']['data'];
    return $response['success']?view('customer.view.addToCardPage',compact('categories','subCategories','carts'))->with('message',$response['message'])
        :redirect()->back()->with('error',$response['message']);
}
public function addToCard(Request $request)
{
    $response=$this->service->addToCard($request->all());
    $categories=Category::all();
    $subCategories=Subcategory::all();
    $carts=$response['data']['data'];
    return $response['success']?view('customer.view.addToCardPage',compact('categories','subCategories','carts'))->with('message',$response['message'])
        :redirect()->back()->with('error',$response['message']);
}
    public function removeCard($id)
    {
        $response=$this->service->removeCard($id);

        $categories=Category::all();
        $subCategories=Subcategory::all();
        return $response['success']?route('addToCardPage')
            :redirect()->back()->with('error',$response['message']);
    }
}
