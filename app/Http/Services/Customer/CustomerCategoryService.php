<?php

namespace App\Http\Services\Customer;

use App\Http\Services\Service;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CustomerCategoryService extends service
{
public function categoryProduct($id)
{
    try{
        $category=Category::find($id);
        $products=Product::where('category_id',$id)->get();

        //dd($category);
        return $this->responseSuccess('all Product',['data'=>$products,'category'=>$category]);
    }catch (\Exception $exception){
        return $this->responseError($exception->getMessage());
    }
}
}
