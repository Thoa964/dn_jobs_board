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

    public function store(mixed $data, $tai_khoan)
    {
        $phuong = $this->phuongRepository->getById($data['ma_phuong']);

        $data['tai_khoan'] = $tai_khoan;
        $data['job_cao_du_lieu'] = false;
        $data['hinh_thuc_lam_viec'] = WorkType::fromKey($data['hinh_thuc_lam_viec']);
        $data['dia_diem_lam_viec'] = sprintf("%s, Phường %s, Quận %s, TP Đà Nẵng",
                                            $data['dia_chi'],
                                            $phuong->ten_phuong,
                                            $phuong->quan->ten_quan
                                        );

        return $this->baiDangRepository->create($data);
    }
}
