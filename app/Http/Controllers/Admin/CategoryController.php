<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddCategoryRequest;
use App\Http\Requests\Dashboard\editCategoryRequest;
use App\Http\Services\Admin\CategoryService;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    private CategoryService $service;
    function __construct(CategoryService $service)
    {
        $this->service=$service;
    }
    public function getAllCategory()
    {
        $response=$this->service->getAllCategory();
        $dataResponse=$response['data'];
        return $response['success'] ? view('admin/dashboard/category/allCategory')->with('categories',$dataResponse['data'])
            :redirect()->back()->with('error',$response['message']);
    }

    /**
     * @param AddCategoryRequest $request
     * @return RedirectResponse
     */
    public function storeCategory(AddCategoryRequest $request)
    {

        $response=$this->service->storeCategory($request->all());
        return $response['success'] ? redirect()->route('getAllCategory')->with('success', $response['message'])
            :redirect()->back()->with('error',$response['message']);
    }

    public function editCategory($id)
    {
        $response=$this->service->editCategory($id);
        $dataResponse=$response['data'];
        return $response['success'] ?view('admin/dashboard/category/editCategory')->with('category',$dataResponse['data'])
            :redirect()->back()->with('error',$response['message']);

    }

    /**
     * @param editCategoryRequest $request
     * @return RedirectResponse
     */
    public function updateCategory(editCategoryRequest $request)
    {
        $response=$this->service->updateCategory($request->all());
        return $response['success'] ? redirect()->route('getAllCategory')->with('success', $response['message'])
            :redirect()->back()->with('error',$response['message']);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function deleteCategory($id)
    {
        $response=$this->service->deleteCategory($id);
        return $response['success'] ? redirect()->route('getAllCategory')->with('success', $response['message'])
            :redirect()->back()->with('error',$response['message']);
    }
}
