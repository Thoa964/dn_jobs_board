<?php

namespace App\Services;

use App\Repositories\PhuongRepository;

class PhuongService
{
    public function __construct(PhuongRepository $phuongRepository)
    {
        $this->phuongRepository = $phuongRepository;
    }

    public function getPhuongByQuan(int $maQuan) {
        return $this->phuongRepository->getPhuongByQuan($maQuan);
    }
}
