<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    private UserService $userService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        if ($this->userService->changePassword($user, $request->validated())) {
            return redirect()->back()->with(['success' => 'Đổi mật khẩu thành công!']);
        } else {
            return redirect()->back()->with(['error' => 'Đổi mật khẩu thất bại!']);
        }
    }
}
