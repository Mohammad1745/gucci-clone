<?php

namespace App\Http\Services\Admin;

use App\Http\Services\Service;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;

class SubCategoryService extends Service
{
    public function storeCategory(array $data)
    {
        try{
            $imagePath = $data['image']->store('public/category_image');
            $imageUrl = Storage::url($imagePath);
            Category::create([
                'category_name'=>$data['category_name'],
                'slug'=>strtolower(str_replace(' ','-',$data['category_name'])),
                'image'=>$imageUrl,
            ]);
            return $this->responseSuccess('Category uploaded');
        }catch (Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function getAllCategory()
    {
        try{
            $data=Category::all();
            return $this->responseSuccess('Category uploaded',['data'=>$data]);
        }catch (Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function editSubCategory($id): array
    {
        try{
            $data=Subcategory::find($id);
            return $this->responseSuccess('success',['data'=>$data]);
        }catch (Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateSubCategory(array $data): array
    {
        try{
            Subcategory::where('id',$data['id'])->update(['subCategory_name'=>$data['subCategory_name']]);
            return $this->responseSuccess('subCategory name updated');
        }catch (Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function deleteSubCategory($id): array
    {
        try{
            $subcategory=Subcategory::find($id);
            $subcategory->delete();
            return $this->responseSuccess('subCategory deleted successfully');
        }catch (Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
//code for subcategory start from here
    public function storeSubCategory(array $data)
    {
        try{
            $category=Category::find($data['category_id']);
            Category::where('id',$data['category_id'])->update(['subCategoryCount'=>$category->subCategoryCount+1]);

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
