<?php

namespace App\Http\Services\Customer;

use App\Http\Services\Service;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService extends service
{
public function homePage()
{
    try{
        $category=Category::all();
        $products=Product::all();

        //dd($category);
        return $this->responseSuccess('all Product',['data'=>$products,'category'=>$category]);
    }catch (\Exception $exception){
        return $this->responseError($exception->getMessage());
    }
}
}
