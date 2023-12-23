<?php

namespace App\Services;

use App\Repositories\QuanRepository;

class QuanService
{
    public function __construct(QuanRepository $quanRepository)
    {
        $this->quanRepository = $quanRepository;
    }

    public function getQuan() {
        return $this->quanRepository->getQuan();
    }
}
