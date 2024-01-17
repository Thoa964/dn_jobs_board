<?php

namespace App\Services;

use App\Mail\JobRequestApproval;
use App\Repositories\BaiDangRepository;
use App\Repositories\DangKyUngTuyenRepository;
use App\Repositories\HoSoRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;

class DangKyUngTuyenService
{
    private DangKyUngTuyenRepository $dangKyUngTuyenRepository;
    private UserRepository $userRepository;
    private BaiDangRepository $baiDangRepository;
    private HoSoRepository $hoSoRepository;

    public function __construct(
        DangKyUngTuyenRepository $dangKyUngTuyenRepository,
        UserRepository $userRepository,
        BaiDangRepository $baiDangRepository,
        HoSoRepository $hoSoRepository
    ) {
        $this->dangKyUngTuyenRepository = $dangKyUngTuyenRepository;
        $this->userRepository = $userRepository;
        $this->baiDangRepository = $baiDangRepository;
        $this->hoSoRepository = $hoSoRepository;
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

        if($baiDang->thoi_gian_ket_thuc < now()) {
            session()->flash('error', 'Đã hết hạn đăng ký');
            return false;
        }

        $this->dangKyUngTuyenRepository->ungTuyen($maBaiDang, $maHoSo);
        return true;
    }

    public function getSoLuongUngTuyen($maBaiDang) {
        return $this->dangKyUngTuyenRepository->getSoLuongUngTuyen($maBaiDang);
    }

    public function getDanhSachUngVien($maBaiDang)
    {
        return $this->dangKyUngTuyenRepository->getDanhSachUngVien($maBaiDang);
    }

    public function updateTrangThaiDangKy($maBaiDang, $data)
    {
        $data['trang_thai'] = (bool) $data['trang_thai'];
        if($data['trang_thai']) {
            $trangThai = 'Đã duyệt';
        } else {
            $trangThai = 'Đã từ chối';
        }

        $job = $this->baiDangRepository->fetchById($maBaiDang);
        $user = $this->hoSoRepository->fetchById($data['ma_ho_so'])->taiKhoan;

        Mail::to($user->email)->send(new JobRequestApproval($job, $user, $data['trang_thai']));

        $this->dangKyUngTuyenRepository->updateTrangThaiDangKy($maBaiDang, $data['ma_ho_so'], $trangThai);
    }
}
