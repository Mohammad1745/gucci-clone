<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class adminMiddleware
{

    public function handle( Request $request, Closure $next)
    {
        // Check if the current user is the specific user
        if (Auth::user()->role =='admin') {
            // Custom logic for specific user
            // You can add your desired code here
            return $next($request);
        }


        return redirect()->route('home')->with('error', 'You are not authorized to access this page.');
    }
}
