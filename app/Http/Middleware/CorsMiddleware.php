<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Log;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next): Response
    {
        // $token = $request->header('X-CSRF-TOKEN');
        // Log::debug("Received X-CSRF-TOKEN: $token");
        return $next($request)
        ->header('Access-Control-Allow-Origin', 'https://www.stitchspares.com')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, processData, ngrok-skip-browser-warning, X-CSRF-TOKEN');

        // ->header('Access-Control-Allow-Origin', '*')
        // ->header('Access-Control-Allow-Methods', '*')
        // ->header('Access-Control-Allow-Headers', '*');
    }
}
