<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DoanhNghiep
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $routeTarget = '/login';

        if(!Auth::check()){
            return redirect($routeTarget)
                ->with('error', 'Bạn cần đăng nhập để thực hiện hành động này');
        }

        if(Auth::user()->trang_thai == 0){
            Auth::logout();
            return redirect($routeTarget)
                ->with('error', 'Tài khoản của bạn chưa được phê duyệt');
        }

        if (!Auth::user()->isDoanhNghiep()) {
            return redirect()
                ->back()
                ->with('error', 'Tài khoản của bạn không thuộc vào tài khoản doanh nghiệp');
        }

        return $response;
    }
}
