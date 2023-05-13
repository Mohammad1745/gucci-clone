<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Services\Customer\CustomerCategoryService;
use App\Models\Category;
use App\Models\Subcategory;
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
        $singleCategory=$response['data']['category'];
        $categories=Category::all();
        $subCategories=subCategory::all();

        return $response['success'] ?
            view('customer/view/categorySubCategoryPage',compact('products','singleCategory','categories','subCategories'))
            :redirect()->back()->with('error',$response['message']);

    }

}
