<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getUsers();
        return view('admin.users.index', compact('users'));
    }

    public function save(CreateUserRequest $request)
    {
        $data = $request->validated();
        $this->userService->createUser($data);
        return redirect()->back()->with('success', 'Thêm người dùng thành công');
    }

    public function deactivate($taiKhoan) {
        $this->userService->blockUser($taiKhoan);
        return redirect()->back()->with('success', 'Khóa người dùng thành công');
    }

    public function activate($taiKhoan) {
        $this->userService->unblockUser($taiKhoan);
        return redirect()->back()->with('success', 'Mở khóa người dùng thành công');
    }

    public function regeneratePassword($taiKhoan) {
        $this->userService->regeneratePassword($taiKhoan);
        return redirect()->back()->with('success', 'Đặt lại mật khẩu thành công');
    }
}
