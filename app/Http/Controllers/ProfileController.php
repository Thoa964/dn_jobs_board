<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\UpdateProfileData;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UploadAvatarRequest;
use App\Services\PhuongService;
use App\Services\QuanService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected UserService $userService;
    protected QuanService $quanService;
    protected PhuongService $phuongService;

    public function __construct(
        UserService $userService,
        QuanService $quanService,
        PhuongService $phuongService
    ) {
        $this->userService = $userService;
        $this->quanService = $quanService;
        $this->phuongService = $phuongService;
    }

    public function index()
    {
        $profile = Auth::user();
        return view('profile.index', compact('profile'));
    }

    public function save(UpdateProfileRequest $request)
    {
        $data = UpdateProfileData::fromRequest($request);
        $this->userService->update(Auth::user()->tai_khoan, $data);
        return redirect()->route('Thông tin cá nhân')->with('success', 'Cập nhật thông tin cá nhân thành công');
    }

    public function update()
    {
        $profile = Auth::user();
        $quan = $this->quanService->getQuan();
        $phuong = $profile->phuong ? $this->phuongService->getPhuongByQuan($profile->phuong->quan->ma_quan) : [];

        return view('profile.update', compact('profile', 'quan', 'phuong'));
    }

    public function updateAvatar(UploadAvatarRequest $avatarRequest)
    {
        return $this->userService->updateAvatar(Auth::user()->tai_khoan, $avatarRequest->avatar);
    }
}
