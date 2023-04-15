<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddCategoryRequest;
use App\Http\Requests\Dashboard\AddSubCategoryRequest;
use App\Http\Requests\Dashboard\editCategoryRequest;
use App\Http\Requests\Dashboard\editSubCategoryRequest;
use App\Http\Services\Admin\SubCategoryService;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;

class SubCategoryController extends Controller
{
    private SubCategoryService $service;
    function __construct(SubCategoryService $service)
    {
        $this->service=$service;
    }
    public function allSubCategory()
    {
        $subCategories=Subcategory::all();
        return view('admin/dashboard/subCategory/allSubCategory')->with('SubCategories', $subCategories);
    }
    public function addSubCategory()
    {
        $categories=Category::all();
        return view('admin/dashboard/subCategory/addSubCategory')->with('categories',$categories);
    }


    /**
     * @param AddSubCategoryRequest $request
     * @return RedirectResponse
     */
    public function storeSubCategory(AddSubCategoryRequest $request): RedirectResponse
    {

        $response=$this->service->storeSubCategory($request->all());
        return $response['success'] ? redirect()->route('allSubCategory')->with('success', $response['message'])
            :redirect()->back()->with('error',$response['message']);
    }

    public function editSubCategory($id)
    {
        $response=$this->service->editSubCategory($id);
        $dataResponse=$response['data'];
        return $response['success'] ?view('admin/dashboard/subCategory/editSubCategory')->with('subCategory',$dataResponse['data'])
            :redirect()->back()->with('error',$response['message']);

    }

    /**
     * @param editCategoryRequest $request
     * @return RedirectResponse
     */
    public function updateSubCategory(editSubCategoryRequest $request)
    {

        $response=$this->service->updateSubCategory($request->all());
        return $response['success'] ? redirect()->route('allSubCategory')->with('success', $response['message'])
            :redirect()->back()->with('error',$response['message']);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function deleteSubCategory($id)
    {
        $response=$this->service->deleteSubCategory($id);
        return $response['success'] ? redirect()->route('allSubCategory')->with('success', $response['message'])
            :redirect()->back()->with('error',$response['message']);
    }


}
