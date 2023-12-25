<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckStatus
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if(Auth::check() && Auth::user()->trang_thai == 0){
            Auth::logout();
            return redirect('/login')
                ->with('error', 'Tài khoản của bạn chưa được phê duyệt');
        }

        return $response;
    }
}
