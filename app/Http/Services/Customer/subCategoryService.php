<?php

namespace App\Http\Services\Customer;

use App\Http\Services\Service;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;

class subCategoryService extends service
{
public function subCategoryProduct($id)
{
    try{

        $singleSubCategory=Subcategory::find($id);

        $products=Product::where('subCategory_id',$id)->get();

        //dd($category);
        return $this->responseSuccess('all Product',['data'=>$products,'singleSubCategory'=>$singleSubCategory]);
    }catch (\Exception $exception){
        return $this->responseError($exception->getMessage());
    }
}
}
