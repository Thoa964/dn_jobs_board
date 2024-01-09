<?php

namespace App\Http\Controllers;

use App\Enums\Common;
use App\Services\BaiDangService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaiDangCuaToiController extends Controller
{
    private BaiDangService $baiDangService;
    private UserService $userService;
    public function __construct(BaiDangService $baiDangService, UserService $userService)
    {
        $this->middleware('auth');
        $this->baiDangService = $baiDangService;
        $this->userService = $userService;
    }

    public function index()
    {
        $taiKhoan = Auth::user()->tai_khoan;
        $danhSachBaiDang = $this->baiDangService->fetchMyPost($taiKhoan);
        return view('jobs.my_post', compact('danhSachBaiDang'));
    }
}
