<?php

namespace App\Services;

use App\Repositories\DuAnRepository;
use App\Repositories\NganhNgheRepository;

class DuAnService
{
    private DuAnRepository $duAnRepository;

    public function __construct(DuAnRepository $duAnRepository)
    {
        $this->duAnRepository = $duAnRepository;
    }

    public function fetchById($maDuAn) {
        return $this->duAnRepository->fetchById($maDuAn);
    }
}
