<?php

namespace App\Http\Services\Customer;

use App\Http\Services\Service;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
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
    public function singleProduct($id)
    {
        try{
            $product=Product::find($id);
            $products=Product::where('category_id',$product->category_id)->get();
            $category=Category::find($product->category_id);
            $subCategory=Subcategory::find($product->subcategory_id);
            return $this->responseSuccess('all Product',['data'=>$product,'category'=>$category,'subCategory'=>$subCategory,'products'=>$products]);
        }catch (\Exception $exception){
            return $this->responseError($exception->getMessage());
        }
    }
    public function addToCard($data): array
    {
        try{
            $finalPrice=$data['quantity']?$data['quantity']*$data['price']:$data['price'];

          Cart::create([
              'product_name'=>$data['product_name'],
               'product_id'=>$data['product_id'],
               'user_id'=>Auth::id(),
               'quantity'=>$data['quantity'],
               'price'=>$finalPrice
           ]);
            $carts=Cart::where('user_id',Auth::id())->get();
            return $this->responseSuccess('New Item added to cart',['data'=>$carts]);
        }catch (\Exception $exception){
            return $this->responseError($exception->getMessage());
        }
    }
    public function addToCardPage(): array
    {
        try{
            $cards=Cart::where('user_id',Auth::id())->get();
            return $this->responseSuccess('success',['data'=>$cards]);
        }catch (\Exception $exception){
            return $this->responseError($exception->getMessage());
        }
    }
    public function removeCard($id): array
    {
        try{
            $card=Cart::find($id);
            if(!$card)
            {
                return $this->responseError('Nothing to delete');
            }
            $card->delete();

            return $this->responseSuccess('success');
        }catch (\Exception $exception){
            return $this->responseError($exception->getMessage());
        }
    }
}

