<?php

namespace App\Repositories;

use App\Models\DangKyUngTuyen;
use App\Models\NganhNghe;
use Prettus\Repository\Eloquent\BaseRepository;

class DangKyUngTuyenRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DangKyUngTuyen::class;
    }

    public function getByMaHoSoAndMaBaiDang($maHoSo, $maBaiDang) {
        return $this->model
            ->where('ma_ho_so', $maHoSo)
            ->where('ma_bai_dang', $maBaiDang)
            ->first();

    }

    public function ungTuyen($maBaiDang, $maHoSo) {
        return $this->model->create([
            'ma_ho_so' => $maHoSo,
            'ma_bai_dang' => $maBaiDang,
            'ngay_dang_ky' => now()->format('Y-m-d')
        ]);
    }

    public function getSoLuongUngTuyen($maBaiDang) {
        return $this->model
            ->where('ma_bai_dang', $maBaiDang)
            ->count();
    }
}
