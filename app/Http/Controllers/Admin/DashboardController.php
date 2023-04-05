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
        return view('admin/dashboard/addCategory');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function allCategory()
    {
        return view('admin/dashboard/allCategory');
    }

    public function addSubCategory()
    {
        return view('admin/dashboard/addSubCategory');
    }
    public function allSubCategory()
    {
        return view('admin/dashboard/allSubCategory');
    }
    public function currentOrder()
    {
        return view('admin/dashboard/currentOrder');
    }
    public function completedOrder()
    {
        return view('admin/dashboard/completedOrder');
    }
}
