<?php

namespace App\Http\Controllers\Backend;

use Cookie;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Attempt to authenticate and create a token
        if (!$token = auth()->attempt($validator->validated())) {
            return back()->withErrors(['email' => 'Incorrect credentials, please try again.'])->withInput();
        }

        // Set the token in a browser cookie
        return redirect()->route('dashboard')->cookie('token', $token, auth()->factory()->getTTL() * 60);

    }

        public function logout(Request $request)
        {
            try {
                // Invalidate the token
                JWTAuth::invalidate(JWTAuth::getToken());

                // Remove the token cookie
                $cookie = \Cookie::forget('token');

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('/dashboard/login')->with('message', 'Logged out successfully.')->withCookie($cookie);
                
            } catch (JWTException $e) {
                return redirect('/dashboard/login')->with('error', 'Failed to log out, please try again.');
            }

        }

}
