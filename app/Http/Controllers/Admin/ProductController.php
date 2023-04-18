<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\addProductRequest;
use App\Http\Requests\Dashboard\AddSubcategoryRequest;
use App\Http\Services\Admin\ProductService;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    private ProductService $service;
    function __construct(ProductService $service)
    {
        $this->service=$service;
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function addProduct()
    {

        $categories=Category::all();
        return view('admin/dashboard/product/addProduct')->with('categories',$categories);
    }

    /**
     * @param addProductRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    public function storeProduct(addProductRequest $request)
    {
        $response=$this->service->storeProduct($request->all());
        return $response['success'] ?
            ($response['data']['redirect']?
                 view('admin/dashboard/product/addProduct',$response['data'])
                :redirect()->route('allProduct')->with('success', $response['message']))
            :redirect()->back()->with('error',$response['message']);
    }
    public function storeSubcategory(AddSubcategoryRequest $request): RedirectResponse
    {

        $response=$this->service->storeSubcategory($request->all());
        return $response['success'] ? redirect()->route('allSubcategory')->with('success', $response['message'])
            :redirect()->back()->with('error',$response['message']);
    }

    public function editSubcategory($id)
    {
        $response=$this->service->editSubcategory($id);
        $dataResponse=$response['data'];
        return $response['success'] ?view('admin/dashboard/subcategory/editSubcategory')->with('subcategory',$dataResponse['data'])
            :redirect()->back()->with('error',$response['message']);

    }






}
