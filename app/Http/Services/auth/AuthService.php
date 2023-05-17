<?php

namespace App\Http\Services\auth;

use App\Http\Services\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService extends Service
{
    public function processLogin (array $data): array
    {
        try {
            $user = User::where('email', $data['email'])->first();
            if (!$user) {
                return $this->responseError('email not found');
            }
            if (!Hash::check($data['password'], $user->password)) {
                return $this->responseError('wrong email or password');
            }
            Auth::login($user);
            return $this->responseSuccess('Login Successfully');
        }
        catch (\Exception $exception) {
            return $this->responseError($exception->getMessage());
        }
    }
    public function processRegistration (array $data): array
    {
        try {
            $formattedData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'number'=>$data['number']
            ];
            $user = User::create($formattedData);
            return $this->responseSuccess('Registration successfully ');
        }
        catch (\Exception $exception) {
            return $this->responseError($exception->getMessage());
        }
    }
    public function logout (): array
    {
        try {
            Auth::logout();
            return $this->responseSuccess('logout successfully');
        }
        catch (\Exception $exception) {
            return $this->responseError($exception->getMessage());
        }
    }
}
