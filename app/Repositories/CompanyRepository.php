<?php

namespace App\Repositories;

use App\Enums\Common;
use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;

class CompanyRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    public function approveRequest($taiKhoan): void
    {
        $this->model
            ->where('tai_khoan', $taiKhoan)
            ->update([
                'trang_thai' => Common::ACTIVATED,
                'ngay_hoat_dong' => now()->format('Y-m-d')
            ]);
    }

    public function getUnverifiedCompanies()
    {
        return $this->model
            ->where('trang_thai', Common::NOT_VERIFIED)
            ->where('ma_quyen', Common::DOANH_NGHIEP)
            ->get();
    }

    public function getCompanies()
    {
        return $this->model
            ->where('ma_quyen', Common::DOANH_NGHIEP)
            ->whereIn('trang_thai', [Common::ACTIVATED, Common::DEACTIVATED])
            ->get();
    }

    public function findByTaiKhoan($taiKhoan)
    {
        return $this->model
            ->where('ma_quyen', Common::DOANH_NGHIEP)
            ->where('tai_khoan', $taiKhoan)
            ->first();
    }

    public function findById($id)
    {
        return $this->model
            ->with(['hoSo', 'danhSachBaiDang'])
            ->where('ma_quyen', Common::DOANH_NGHIEP)
            ->where('id', $id)
            ->first();
    }
}
