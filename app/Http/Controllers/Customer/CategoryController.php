<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Services\Customer\CustomerCategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CustomerCategoryService $service;
    function __construct(CustomerCategoryService $service)
    {
        $this->service=$service;
    }
    public function categoryPage($id)
    {

        $response=$this->service->categoryProduct($id);
        $products=$response['data']['data'];
        $category=$response['data']['category'];

        return $response['success'] ?
            view('customer/view/categorySubCategoryPage',compact('products','category'))
            :redirect()->back()->with('error',$response['message']);

    }

}
