<?php

namespace App\Http\Services\Admin;

use App\Http\Services\Service;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;

class SubcategoryService extends Service
{
    public function editSubcategory($id): array
    {
        try{
            $data=Subcategory::find($id);
            return $this->responseSuccess('success',['data'=>$data]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateSubcategory(array $data): array
    {
        try{
            Subcategory::where('id',$data['id'])->update(['name'=>$data['subcategory_name']]);
            return $this->responseSuccess('subcategory name updated');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function deleteSubcategory($id): array
    {
        try{
            $subcategory=Subcategory::find($id);
            $subcategory->delete();
            return $this->responseSuccess('subcategory deleted successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
//code for subcategory start from here
    public function storeSubcategory(array $data)
    {
        try{
            $category=Category::find($data['category_id']);
            Category::where('id',$data['category_id'])->update(['subcategory_count'=>$category->subcategoryCount+1]);

            Subcategory::create([
                'name'=>$data['name'],
                'category_id'=>$data['category_id'],
                'category_name'=>$category->name,
                'slug'=>strtolower(str_replace(' ','-',$data['name'])),
            ]);
            return $this->responseSuccess('Subcategory uploaded');
        }catch (Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

}
