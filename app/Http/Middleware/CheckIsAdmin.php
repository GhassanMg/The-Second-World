<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Classes\ApiResponseClass;
use Closure;
use Illuminate\Http\Request;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if($user->is_admin)
            return $next($request);
        else
            return ApiResponseClass::unauthorizedResponse();
    }
}
