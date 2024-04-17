<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyApiAccessKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $api_key = config('auth.api_access_key');
        $valid_key = (
            !empty($api_key)
            && $request->header('X-API-KEY') == $api_key
        );

        abort_if(
            !$valid_key,
            403,
            'Access denied.'
        );

        return $next($request);
    }
}
