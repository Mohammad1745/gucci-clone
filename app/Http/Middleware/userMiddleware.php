<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class userMiddleware
{

    public function handle( Request $request, Closure $next)
    {
        //dd(Auth::user());
        $user=Auth::user();
        if($user){
            // Check if the current user is the specific user
            if ($user->role=='customer') {
                // Custom logic for specific user
                // You can add your desired code here
                return $next($request);
            }
        }

        return redirect()->route('login')->with('error', 'You are not authorized to access this page.');
    }
}
