<?php

namespace App\Services;

use App\Enums\WorkType;
use App\Repositories\BaiDangRepository;
use App\Repositories\PhuongRepository;
use BenSampo\Enum\Exceptions\InvalidEnumKeyException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BaiDangService
{
    private BaiDangRepository $baiDangRepository;
    private PhuongRepository $phuongRepository;

    public function __construct(
        BaiDangRepository $baiDangRepository,
        PhuongRepository $phuongRepository
    ) {
        $this->baiDangRepository = $baiDangRepository;
        $this->phuongRepository = $phuongRepository;
    }

    public function fetchAll() {
        return $this->baiDangRepository->fetchAll();
    }

    public function fetchById($maBaiDang)
    {
        return $this->baiDangRepository->fetchById($maBaiDang);
    }

    public function search(?string $keyword, ?int $maQuan, ?string $workType): LengthAwarePaginator {
        $maPhuong = $maQuan
            ? $this->phuongRepository
                ->getPhuongByQuan($maQuan)
                ->pluck('ma_phuong')
            : Collection::empty();

        $workTypeEnum = null;

        if ($workType) {
            try {
                $workTypeEnum = WorkType::fromKey($workType);
            } catch (InvalidEnumKeyException) {}
        }

        return $this->baiDangRepository->search($keyword, $maPhuong, $workTypeEnum);
    }
}
