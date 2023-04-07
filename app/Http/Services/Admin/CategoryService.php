<?php

namespace App\Http\Services\Admin;

use App\Http\Services\Service;
use App\Models\Category;
use mysql_xdevapi\Exception;

class CategoryService extends Service
{
    public function storeCategory(array $data)
    {
        try{
            Category::create([
                'category_name'=>$data['category_name'],
                'slug'=>strtolower(str_replace(' ','-',$data['category_name']))
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
    public function editCategory($id): array
    {
        try{
            $data=Category::find($id);
            return $this->responseSuccess('Category uploaded',['data'=>$data]);
        }catch (Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateCategory(array $data): array
    {
        try{
            Category::where('id',$data['id'])->update(['category_name'=>$data['category_name']]);
            return $this->responseSuccess('Category name updated');
        }catch (Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function deleteCategory($id): array
    {
        try{
            $category=Category::find($id);
            $category->delete();
            return $this->responseSuccess('Category deleted successfully');
        }catch (Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }


}
