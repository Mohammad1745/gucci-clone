<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddCategoryRequest;
use App\Http\Requests\Dashboard\AddSubCategoryRequest;
use App\Http\Requests\Dashboard\editCategoryRequest;
use App\Http\Requests\Dashboard\editSubCategoryRequest;
use App\Http\Services\Admin\ProductService;
use App\Http\Services\Admin\SubCategoryService;
use App\Models\Category;
use App\Models\Subcategory;
use http\Env\Request;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    private ProductService $service;
    function __construct(ProductService $service)
    {
        $this->service=$service;
    }
    public function addProduct()
    {

        $categories=Category::all();
        return view('admin/dashboard/product/addProduct')->with('categories',$categories);
    }
    public function selectCategory(Request $request)
    {
            $id=$request['category_id'];
        $subCategories=Subcategory::where('category_id',$id);
        return view('admin/dashboard/product/addProduct')->with('subCategories',$subCategories);
    }
    public function storeSubCategory(AddSubCategoryRequest $request): RedirectResponse
    {

        $response=$this->service->storeSubCategory($request->all());
        return $response['success'] ? redirect()->route('allSubCategory')->with('success', $response['message'])
            :redirect()->back()->with('error',$response['message']);
    }

    public function editSubCategory($id)
    {
        $response=$this->service->editSubCategory($id);
        $dataResponse=$response['data'];
        return $response['success'] ?view('admin/dashboard/subCategory/editSubCategory')->with('subCategory',$dataResponse['data'])
            :redirect()->back()->with('error',$response['message']);

    }






}
