<?php

namespace App\Services;

use App\Repositories\BaiDangRepository;

class BaiDangService
{
    private BaiDangRepository $baiDangRepository;

    public function __construct(BaiDangRepository $baiDangRepository)
    {
        $this->baiDangRepository = $baiDangRepository;
    }

    public function fetchAll() {
        return $this->baiDangRepository->fetchAll();
    }
}
