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
}
