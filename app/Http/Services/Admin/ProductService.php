<?php

namespace App\Http\Services\Admin;

use App\Http\Services\Service;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;

class ProductService extends Service
{
    public function addProduct()
    {
        try{
            $category=Category::find();

            SubCategory::create([
                'subCategory_name'=>$data['subCategory_name'],
                'category_id'=>$data['category_id'],
                'category_name'=>$category->category_name,
                'slug'=>strtolower(str_replace(' ','-',$data['subCategory_name'])),
            ]);
            return $this->responseSuccess('SubCategory uploaded');
        }catch (Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

}
