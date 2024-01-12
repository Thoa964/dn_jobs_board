<?php

namespace App\Repositories;

use App\Enums\Common;
use App\Enums\WorkType;
use App\Models\BaiDang;
use App\Models\DuAnCaNhan;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;

class DuAnRepository extends BaseRepository
{
    public function model()
    {
        return DuAnCaNhan::class;
    }

    public function fetchById($maDuAn)
    {
        return $this->model->with(['hoSo'])
            ->where(['ma_du_an' => $maDuAn])
            ->first();
    }
}
