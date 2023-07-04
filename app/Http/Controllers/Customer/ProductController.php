<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\SearchRequest;
use App\Http\Services\Customer\ProductService;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

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
        return $response['success']?redirect()->route('addToCardPage')
            :redirect()->back()->with('error',$response['message']);
    }
    public function shippingInfo()
    {

        $categories=Category::all();
        $subCategories=Subcategory::all();
        return view('customer.view.shippingAddressPage',compact('categories','subCategories'));
    }
    public function checkoutPage()
    {

        $categories=Category::all();
        $subCategories=Subcategory::all();
        $response=$this->service->checkoutPage();
        $carts=$response['data']['cards'];
        $shippingInfo=$response['data']['shippingInfo'];
        return $response['success']?view('customer.view.checkoutPage',compact('categories','subCategories','carts','shippingInfo'))->with('message',$response['message'])
            :redirect()->back()->with('error',$response['message']);
    }
    public function addShippingInfo(Request $request)
    {
        $response=$this->service->addShippingInfo($request->all());
        return $response['success']?redirect()->route('checkoutPage')
            :redirect()->back()->with('error',$response['message']);
    }
    public function placeOrder()
    {
        $response=$this->service->placeOrder();
        return $response['success']?redirect()->route('pendingOrder')->with('message',$response['message'])
            :redirect()->back()->with('error',$response['message']);
    }
    public function pendingOrder()
    {
        $categories=Category::all();
        $subCategories=Subcategory::all();
        $response=$this->service->pendingOrder();
        $pending_orders=$response['data']['pending_orders'];
        return $response['success']?view('customer.view.pendingOrderPage',compact('categories','subCategories','pending_orders'))->with('message',$response['message'])
            :redirect()->back()->with('error',$response['message']);

    }
    public function user_dashboard()
    {

        $categories=Category::all();
        $subCategories=Subcategory::all();
        $user=Auth::user();
        return view('customer.view.userDashboard',compact('categories','subCategories','user'));
    }
    public function search(SearchRequest $request)
    {

        $categories=Category::all();
        $subCategories=Subcategory::all();
        $description=$request['description'];
        $products = Product::where('name', 'LIKE', "%$description%")
            ->orWhere('description', 'LIKE', "%$description%")
            ->get();
        return view('customer.view.searchProduct',compact('categories','subCategories','products','description'));
    }
    public function orderConfirmation($id)
    {

        $response=$this->service->orderConfirmation($id);

        return $response['success']?redirect()->route('pendingOrder')->with('message',$response['message'])
            :redirect()->back()->with('error',$response['message']);
    }
    public function history()
    {
        $categories=Category::all();
        $subCategories=Subcategory::all();
        $response=$this->service->history();
        $completedOrder=$response['data']['completedOrder'];
        return $response['success']?view('customer.view.userHistoryPage',compact('categories','subCategories','completedOrder'))->with('message',$response['message'])
            :redirect()->back()->with('error',$response['message']);
    }
}
