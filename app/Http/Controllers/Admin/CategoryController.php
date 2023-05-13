<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddCategoryRequest;
use App\Http\Requests\Dashboard\editCategoryRequest;
use App\Http\Services\Admin\CategoryService;
use App\Http\Services\Admin\CustomerCategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    private CategoryService $service;
    function __construct(CategoryService $service)
    {
        $this->service=$service;
    }
    public function getAllCategory(): View|\Illuminate\Foundation\Application|Factory|RedirectResponse|Application
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

    /**
     * @param $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
     */
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
    public function updateCategory(EditCategoryRequest $request): RedirectResponse
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
