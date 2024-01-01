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

    public function fetchById($maBaiDang)
    {
        return $this->baiDangRepository->fetchById($maBaiDang);
    }
}
