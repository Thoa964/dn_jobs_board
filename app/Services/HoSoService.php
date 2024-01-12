<?php

namespace App\Services;

use App\Repositories\HoSoRepository;
use App\Repositories\UserRepository;

class HoSoService
{
    protected HoSoRepository $hoSoRepository;
    protected UserRepository $userRepository;

    public function __construct(
        HoSoRepository $hoSoRepository,
        UserRepository $userRepository
    ) {
        $this->hoSoRepository = $hoSoRepository;
        $this->userRepository = $userRepository;
    }

    public function updateHoSo($tai_khoan, mixed $data)
    {
        $hoSo = $this->userRepository->getProfile($tai_khoan)->hoSo;

        if (!$hoSo) {
            $data['tai_khoan'] = $tai_khoan;
            return $this->hoSoRepository->insertHoSo($data);
        }

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

    public function insertDuAn($tai_khoan, mixed $data)
    {
        return $this->hoSoRepository->insertDuAn($tai_khoan, $data);
    }

    public function deleteDuAn($tai_khoan, $ma_du_an)
    {
        return $this->hoSoRepository->deleteDuAn($tai_khoan, $ma_du_an);
    }

    public function fetchById($maHoSo)
    {
        return $this->hoSoRepository->fetchById($maHoSo);
    }
}
