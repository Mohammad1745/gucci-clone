<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Services\auth\AuthService;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;

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
    public function userProfile(){
        $categories=Category::all();
        $subCategories=subCategory::all();
        return view('customer.view.userProfilePage',compact('categories','subCategories'));
    }
    public function login()
    {
        $categories=Category::all();
        $subCategories=Subcategory::all();
        return view('customer.view.login',compact('categories','subCategories'));
    }
    public function processLogin (LoginRequest $request): RedirectResponse
    {
        $response = $this->service->processLogin($request->all());

        return $response['success'] ?
            redirect()->route('home')->with('success', $response['message'])
            : redirect()->back()->with('error', $response['message']);
    }
    public function registration()
    {
        $categories=Category::all();
        $subCategories=Subcategory::all();
        return view('customer.view.registration',compact('categories','subCategories'));
    }
    public function processRegistration (RegistrationRequest $request): RedirectResponse
    {
        $response = $this->service->processRegistration($request->all());

        return $response['success'] ?
            redirect()->route('login')->with('success', $response['message'])
            : redirect()->back()->with('error', $response['message']);
    }
    public function logout (): RedirectResponse
    {
        $response = $this->service->logout();

        return $response['success'] ?
            redirect()->route('home')->with('success', $response['message'])
            : redirect()->back()->with('error', $response['message']);
    }
}
