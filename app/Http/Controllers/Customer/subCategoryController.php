<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Services\Customer\CustomerCategoryService;
use App\Http\Services\Customer\subCategoryService;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class subCategoryController extends Controller
{
    private subCategoryService $service;
    function __construct(subCategoryService $service)
    {
        $this->service=$service;
    }
    public function subCategoryPage($id)
    {

        $response=$this->service->subCategoryProduct($id);
        $products=$response['data']['data'];
        $singleCategorySubCategory=$response['data']['singleSubCategory'];
        $categories=Category::all();
        $subCategories=subCategory::all();


        return $response['success'] ?
            view('customer/view/categorySubCategoryPage',compact('products','singleCategorySubCategory','categories','subCategories'))
            :redirect()->back()->with('error',$response['message']);

    }

}
