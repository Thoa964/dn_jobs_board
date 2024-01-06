<?php

namespace App\Services;

use App\Repositories\HoSoRepository;

class HoSoService
{
    protected HoSoRepository $hoSoRepository;

    public function __construct(HoSoRepository $hoSoRepository)
    {
        $this->hoSoRepository = $hoSoRepository;
    }

    public function updateHoSo($tai_khoan, mixed $data)
    {
        return $this->hoSoRepository->updateHoSo($tai_khoan, $data);
    }

    public function insertBangCap($tai_khoan, mixed $data)
    {
        return $this->hoSoRepository->insertBangCap($tai_khoan, $data);
    }

    public function deleteBangCap($tai_khoan, $ma_bang_cap)
    {
        return $this->hoSoRepository->deleteBangCap($tai_khoan, $ma_bang_cap);
    }

    public function insertKyNang($tai_khoan, $data)
    {
        return $this->hoSoRepository->insertKyNang($tai_khoan, $data);
    }

    public function deleteKyNang($tai_khoan, $ma_ky_nang)
    {
        return $this->hoSoRepository->deleteKyNang($tai_khoan, $ma_ky_nang);
    }
}
