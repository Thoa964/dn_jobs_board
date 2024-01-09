<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Repositories\BaiDangRepository;
use App\Repositories\DangKyUngTuyenRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DangKyUngTuyenService
{
    private DangKyUngTuyenRepository $dangKyUngTuyenRepository;
    private UserRepository $userRepository;
    private BaiDangRepository $baiDangRepository;

    public function __construct(
        DangKyUngTuyenRepository $dangKyUngTuyenRepository,
        UserRepository $userRepository,
        BaiDangRepository $baiDangRepository
    ) {
        $this->dangKyUngTuyenRepository = $dangKyUngTuyenRepository;
        $this->userRepository = $userRepository;
        $this->baiDangRepository = $baiDangRepository;
    }

    public function ungTuyen($maBaiDang) {
        $taiKhoan = Auth::user()->tai_khoan;
        $maHoSo = $this->userRepository->getMaHoSoByTaiKhoan($taiKhoan);
        $dangUngTuyen = $this->dangKyUngTuyenRepository->getSoLuongUngTuyen($maBaiDang);
        $baiDang = $this->baiDangRepository->fetchById($maBaiDang);

        if ($this->dangKyUngTuyenRepository->getByMaHoSoAndMaBaiDang($maHoSo, $maBaiDang)) {
            session()->flash('error', 'Bạn đã ứng tuyển trước đó');
            return false;
        }

        if ($dangUngTuyen >= $baiDang->so_luong) {
            session()->flash('error', 'Đã đăng ký đủ số lượng ứng tuyển');
            return false;
        }

        $this->dangKyUngTuyenRepository->ungTuyen($maBaiDang, $maHoSo);
        return true;
    }

    public function getSoLuongUngTuyen($maBaiDang) {
        return $this->dangKyUngTuyenRepository->getSoLuongUngTuyen($maBaiDang);
    }
}
