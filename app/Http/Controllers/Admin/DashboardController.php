<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin/layouts/admin');
    }
    public function showAddCategory()
    {
        return view('admin/dashboard/category/addCategory');
    }

    public function addSubCategory()
    {
        return view('admin/dashboard/subCategory/addSubCategory');
    }
    public function allSubCategory()
    {
        return view('admin/dashboard/subCategory/allSubCategory');
    }
    public function currentOrder()
    {
        return view('admin/dashboard/order/currentOrder');
    }
    public function completedOrder()
    {
        return view('admin/dashboard/order/completedOrder');
    }
    public function addProduct()
    {
        return view('admin/dashboard/addProduct');
    }
    public function allProduct()
    {
        return view('admin/dashboard/allProduct');
    }
}
