<?php

namespace App\Repositories;

use App\Models\Phuong;
use Prettus\Repository\Eloquent\BaseRepository;

class PhuongRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Phuong::class;
    }

    public function getPhuongByQuan(int $quanId) {
        return $this->model->where('ma_quan', $quanId)->get();
    }
}
