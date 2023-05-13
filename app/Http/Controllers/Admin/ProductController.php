<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\addProductRequest;
use App\Http\Requests\Dashboard\AddSubcategoryRequest;
use App\Http\Services\Admin\ProductService;
use App\Models\Category;
use App\Models\Product;
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
    public function allProduct()
    {
        $response=$this->service->allProduct();
        $arrayData=$response['data'];
        return $response['success'] ?
                view('admin/dashboard/product/allProduct')->with('products',$arrayData['data'])
            :redirect()->back()->with('error',$response['message']);
    }


    public function editProduct($id)
    {
        $categories=Category::all();
        $product=Product::find($id);
        $ArrayNew=[
           'categories'=> $categories,
            'product'=>$product
        ];
        return view('admin/dashboard/product/editProduct')->with('ArrayNew',$ArrayNew);

    }






}
