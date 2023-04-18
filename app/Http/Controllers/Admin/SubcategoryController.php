<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddSubcategoryRequest;
use App\Http\Requests\Dashboard\editSubcategoryRequest;
use App\Http\Services\Admin\SubcategoryService;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;

class SubcategoryController extends Controller
{
    private SubcategoryService $service;
    function __construct(SubcategoryService $service)
    {
        $this->service=$service;
    }
    public function allSubcategory()
    {
        $subcategories=Subcategory::all();
        return view('admin/dashboard/subcategory/allSubcategory')->with('Subcategories', $subcategories);
    }
    public function addSubcategory()
    {
        $categories=Category::all();
        return view('admin/dashboard/subcategory/addSubcategory')->with('categories',$categories);
    }


    /**
     * @param AddSubcategoryRequest $request
     * @return RedirectResponse
     */
    public function storeSubcategory(AddSubcategoryRequest $request): RedirectResponse
    {

        $response=$this->service->storeSubcategory($request->all());
        return $response['success'] ? redirect()->route('allSubcategory')->with('success', $response['message'])
            :redirect()->back()->with('error',$response['message']);
    }

    public function editSubcategory($id)
    {
        $response=$this->service->editSubcategory($id);
        $dataResponse=$response['data'];
        return $response['success'] ?view('admin/dashboard/subcategory/editSubcategory')->with('subcategory',$dataResponse['data'])
            :redirect()->back()->with('error',$response['message']);

    }


    /**
     * @param editSubcategoryRequest $request
     * @return RedirectResponse
     */
    public function updateSubcategory(EditSubcategoryRequest $request): RedirectResponse
    {

        $response=$this->service->updateSubcategory($request->all());
        return $response['success'] ? redirect()->route('allSubcategory')->with('success', $response['message'])
            :redirect()->back()->with('error',$response['message']);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function deleteSubcategory($id)
    {
        $response=$this->service->deleteSubcategory($id);
        return $response['success'] ? redirect()->route('allSubcategory')->with('success', $response['message'])
            :redirect()->back()->with('error',$response['message']);
    }


}
