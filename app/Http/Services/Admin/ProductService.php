<?php

namespace App\Http\Services\Admin;

use App\Http\Services\Service;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;


class ProductService extends Service
{
    public function storeProduct(array $data)
    {
        try{

            if($data['name'] && $data['subcategory_id'] && $data['description'] && $data['quantity'] && $data['price'] && array_key_exists('image',$data)){
                $imagePath = $data['image']->store('public/product_image');
                $imageUrl = Storage::url($imagePath);
                    Product::create([
                        'name'=>$data['name'],
                        'description'=>$data['description'],
                        'price'=>$data['price'],
                        'category_id'=>$data['category_id'],
                        'subcategory_id'=>$data['subcategory_id'],
                        'image'=>$imageUrl,
                        'quantity'=>$data['quantity'],
                        'slug'=>strtolower(str_replace(' ','-',$data['name'])),
                    ]);
                    $output=[
                        'redirect'=>false,
                    ];
                return $this->responseSuccess('Product Uploaded successfully',$output);
            }
            else{
                $subcategories=Subcategory::where('category_id',$data['category_id'])->get();
                $categories=Category::all();
                $output=[
                    'redirect'=>true,
                    'categories'=>$categories,
                    'subcategories'=>$subcategories,
                    'oldData'=>$data
                ];

                return $this->responseSuccess('redirected',$output);
            }

        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function allProduct()
    {
        try{

            $products=Product::all();
            return $this->responseSuccess('all Product',['data'=>$products]);
        }catch (\Exception $exception){
            return $this->responseError($exception->getMessage());
        }
    }
    public function updateProduct($data)
    {
        try{
            if($data['image']){
                $imagePath = $data['image']->store('public/product_image');
                $imageUrl = Storage::url($imagePath);
                Product::findOrFail($data['product_id'])->update([
                    'name'=>$data['name'],
                    'description'=>$data['description'],
                    'price'=>$data['price'],
                    'image'=>$imageUrl,
                    'quantity'=>$data['quantity'],
                    'slug'=>strtolower(str_replace(' ','-',$data['name'])),
                ]);
            }
            else{
                Product::findOrFail($data['product_id'])->update([
                    'name'=>$data['name'],
                    'description'=>$data['description'],
                    'price'=>$data['price'],
                    'quantity'=>$data['quantity'],
                    'slug'=>strtolower(str_replace(' ','-',$data['name'])),
                ]);
            }

            return $this->responseSuccess('product updated successfully');
        }catch (\Exception $exception){
            return $this->responseError($exception->getMessage());
        }
    }
public function deleteProduct($id){
    try{

        $product=Product::findOrFail($id);
        $product->delete();
        return $this->responseSuccess('Product Deleted Successfully');
    }catch (\Exception $exception){
        return $this->responseError($exception->getMessage());
    }
}

}
