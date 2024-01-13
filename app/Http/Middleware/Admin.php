<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect('/login')
                ->with('error', 'Vui lòng đăng nhập trước khi vào trang này');
        }

        if(Auth::user()->trang_thai == 0){
            Auth::logout();
            return redirect('/login')
                ->with('error', 'Tài khoản bị khóa');
        }

        if (!Auth::user()->isAdmin()) {
            return redirect()
                ->back()
                ->with('error', 'Bạn không có quyền truy cập');
        }

        return $next($request);
    }
}
