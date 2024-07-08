<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtFromCookie
{
    public function handle(Request $request, Closure $next)
    {
        if ($token = $request->cookie('token')) {
            try {
                JWTAuth::setToken($token)->authenticate();
            } catch (\Exception $e) {
                // If there's an error with the token, you can handle it here
                return redirect()->route('dashboard.login')->with('error', 'Invalid token, please log in again.');
            }
        } else {
            return redirect()->route('dashboard.login')->with('error', 'Please log in first.');
        }

        return $next($request);
    }
}
