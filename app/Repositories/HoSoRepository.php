<?php

namespace App\Repositories;

use App\Models\HoSo;
use Prettus\Repository\Eloquent\BaseRepository;

class HoSoRepository extends BaseRepository
{
    public function model()
    {
        return HoSo::class;
    }

    public function updateHoSo($tai_khoan, mixed $data) {
        return $this->model->where('tai_khoan', $tai_khoan)->update($data);
    }

    public function insertBangCap($tai_khoan, mixed $data)
    {
        return $this->model->where('tai_khoan', $tai_khoan)->first()->bangCap()->create($data);
    }

    public function deleteBangCap($tai_khoan, $ma_bang_cap)
    {
        return $this->model->where('tai_khoan', $tai_khoan)->first()->bangCap()->where('ma_bang_cap', $ma_bang_cap)->delete();
    }

    public function insertKyNang($tai_khoan, $data)
    {
        return $this->model->where('tai_khoan', $tai_khoan)->first()->kyNang()->create($data);
    }

    public function deleteKyNang($tai_khoan, $ma_ky_nang)
    {
        return $this->model->where('tai_khoan', $tai_khoan)->first()->kyNang()->where('ma_ky_nang', $ma_ky_nang)->delete();
    }
}
