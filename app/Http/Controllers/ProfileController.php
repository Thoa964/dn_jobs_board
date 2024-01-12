<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\UpdateProfileData;
use App\Http\Requests\InsertBangCapRequest;
use App\Http\Requests\InsertDuAnRequest;
use App\Http\Requests\InsertKyNangRequest;
use App\Http\Requests\UpdateHoSoRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UploadAvatarRequest;
use App\Services\HoSoService;
use App\Services\PhuongService;
use App\Services\QuanService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    protected UserService $userService;
    protected QuanService $quanService;
    protected PhuongService $phuongService;
    protected HoSoService $hoSoService;

    public function __construct(
        UserService $userService,
        QuanService $quanService,
        PhuongService $phuongService,
        HoSoService $hoSoService
    ) {
        $this->userService = $userService;
        $this->quanService = $quanService;
        $this->phuongService = $phuongService;
        $this->hoSoService = $hoSoService;
    }

    public function index()
    {
        $profile = $this->userService->getProfile(Auth::user()->tai_khoan);
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

    public function updateHoSo(UpdateHoSoRequest $request) {
        $data = $request->validated();
        return $this->hoSoService->updateHoSo(Auth::user()->tai_khoan, $data);
    }

    public function insertBangCap(InsertBangCapRequest $request) {
        $data = $request->validated();
        return $this->hoSoService->insertBangCap(Auth::user()->tai_khoan, $data);
    }

    public function deleteBangCap($ma_bang_cap) {
        return $this->hoSoService->deleteBangCap(Auth::user()->tai_khoan, $ma_bang_cap);
    }

    public function insertKyNang(InsertKyNangRequest $request) {
        $data = $request->validated();
        return $this->hoSoService->insertKyNang(Auth::user()->tai_khoan, $data);
    }

    public function deleteKyNang($ma_ky_nang) {
        return $this->hoSoService->deleteKyNang(Auth::user()->tai_khoan, $ma_ky_nang);
    }

    public function insertDuAn(InsertDuAnRequest $request) {
        $data = $request->validated();
        return $this->hoSoService->insertDuAn(Auth::user()->tai_khoan, $data);
    }

    public function deleteDuAn($ma_du_an) {
        return $this->hoSoService->deleteDuAn(Auth::user()->tai_khoan, $ma_du_an);
    }
}
