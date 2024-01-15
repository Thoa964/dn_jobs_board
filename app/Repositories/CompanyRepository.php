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
            ->where('trang_thai', Common::DEACTIVATED)
            ->where('ma_quyen', Common::DOANH_NGHIEP)
            ->get();
    }
}
