<?php

namespace App\Repositories;

use App\Enums\Common;
use App\Enums\WorkType;
use App\Models\BaiDang;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;

class BaiDangRepository extends BaseRepository
{
    public function model()
    {
        return BaiDang::class;
    }

    /**
     * Get the list ordered by created_at of items from the database
     *
     * @return mixed
     */
    public function fetchAll()
    {
        return $this->model->with(['author', 'nganhNghe'])
            ->where('thoi_gian_ket_thuc', '>=', date('Y-m-d'))
            ->orderBy('created_at', 'desc')
            ->paginate(Common::DEFAULT_ITEMS_PER_PAGE);
    }

    public function fetchById($maBaiDang)
    {
        return $this->model->with(['author', 'nganhNghe'])
            ->where(['ma_bai_dang' => $maBaiDang])
            ->first();
    }

    public function search(
        ?string $keyword,
        Collection $maPhuong,
        ?WorkType $workType
    ): LengthAwarePaginator {
        $result = $this->model->with(['author', 'nganhNghe'])
            ->where(function ($query) use ($keyword) {
                $query->where('tieu_de', 'like', '%' . $keyword . '%')
                    ->orWhere('mo_ta', 'like', '%' . $keyword . '%');
            });

        if ($maPhuong->isNotEmpty()) {
            $result->whereIn('ma_phuong', $maPhuong);
        }

        if ($workType) {
            $result->where('hinh_thuc_lam_viec', $workType->value);
        }

        return $result->paginate(Common::DEFAULT_ITEMS_PER_PAGE);
    }

    public function fetchMyPost($taiKhoan)
    {
        return $this->model->with(['author', 'nganhNghe'])
            ->where('tai_khoan', $taiKhoan)
            ->orderBy('created_at', 'desc')
            ->paginate(Common::DEFAULT_ITEMS_PER_PAGE);
    }
}
