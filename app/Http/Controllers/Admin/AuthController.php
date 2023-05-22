<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\auth\AuthService;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $service;

    /**
     * @param AuthService $service
     */
    function __construct (AuthService $service)
    {
        $this->service = $service;
    }
    public function login()
    {
        return view('admin.auth.login');
    }
    public function processLogin (LoginRequest $request): RedirectResponse
    {
        $response = $this->service->processLogin($request->all());
        return $response['success'] ?
            redirect()->route('dashboard')->with('success', $response['message'])
            : redirect()->back()->with('error', $response['message']);
    }
}
