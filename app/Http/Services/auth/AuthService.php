<?php

namespace App\Http\Services\auth;

use App\Http\Services\Service;
use App\Jobs\SendEmailJob;
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
            $code=randomNumber(4);
            $formattedData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'number'=>$data['number'],
                'verification_code'=>$code
            ];
            $user = User::create($formattedData);
            $sendEmailJob = new SendEmailJob($data['email'],$data['name'],$code);
            dispatch($sendEmailJob);
            return $this->responseSuccess('Registration successfully please check your mail for authentication code');
        }
        catch (\Exception $exception) {
            return $this->responseError($exception->getMessage());
        }
    }
    public function verification(array $data): array
    {
        try {
            $user = User::where('email', $data['email'])->where('verification_code', $data['verification_code'])->first();
            if (!$user) {
                return $this->responseError("Invalid Code");
            }
            $formattedData = [
                'verification_code' => null,
                'email_verified' => true
            ];
            User::where('id', $user->id)->update($formattedData);

            return $this->responseSuccess("Verification Successful!");
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
