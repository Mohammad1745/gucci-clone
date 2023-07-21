<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Requests\Auth\VerificationRequest;
use App\Http\Services\auth\AuthService;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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

        return redirect()->route('pendingOrder');
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

    /**
     * @param RegistrationRequest $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
     */
    public function processRegistration (RegistrationRequest $request)
    {

        $response = $this->service->processRegistration($request->all());
        $email=$request['email'];
        return $response['success'] ?
            view('emails.email_verification',compact('email'))->with('success', $response['message'])
            : redirect()->back()->with('error', $response['message']);
    }
    public function processVerification (VerificationRequest $request): RedirectResponse
    {

        $response = $this->service->verification($request->all());

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
