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

    public function insertHoSo($data) {
        return $this->model->create($data);
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

    public function insertDuAn($tai_khoan, mixed $data)
    {
        return $this->model->where('tai_khoan', $tai_khoan)->first()->duAn()->create($data);
    }

    public function deleteDuAn($tai_khoan, $ma_du_an)
    {
        return $this->model->where('tai_khoan', $tai_khoan)->first()->duAn()->where('ma_du_an', $ma_du_an)->delete();
    }

    public function fetchById($maHoSo)
    {
        return $this->model->with(['taiKhoan', 'bangCap', 'kyNang', 'duAn'])
            ->where('ma_ho_so', $maHoSo)
            ->first();
    }
}
