<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() && auth()->user()->role !== 'admin') {
            return response()->json([
                'status' => false,
                'error' => 'You don\'t have permission to change here.',
                'code' => '403',
            ], 403);

        } elseif (!auth()->user()) {
            return response()->json([
                'status' => false,
                'error' => 'You aren\'t authorized user.',
                'code' => '401',
            ], 401);
        }

        return $next($request);
    }
}
