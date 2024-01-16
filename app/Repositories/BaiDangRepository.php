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
            ->withCount('ungVien')
            ->where('thoi_gian_ket_thuc', '>=', date('Y-m-d'))
            ->whereHas('author', function ($query) {
                $query->where('trang_thai', Common::ACTIVATED);
            })
            ->where('trang_thai', Common::APPROVED)
            ->havingRaw('ung_vien_count < tbl_bai_dang.so_luong')
            ->orderBy('created_at', 'desc')
            ->paginate(Common::DEFAULT_ITEMS_PER_PAGE);
    }

    public function fetchById($maBaiDang)
    {
        return $this->model->with(['author', 'nganhNghe'])
            ->withCount('ungVien')
            ->where(['ma_bai_dang' => $maBaiDang])
            ->first();
    }

    public function search(
        ?string $keyword,
        Collection $maPhuong,
        ?WorkType $workType
    ): LengthAwarePaginator {
        $result = $this->model->with(['author', 'nganhNghe'])
            ->whereHas('author', function ($query) {
                $query->where('trang_thai', Common::ACTIVATED);
            })
            ->where('trang_thai', Common::APPROVED)
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

    public function update($data, $maBaiDang) {
        return $this->model->where('ma_bai_dang', $maBaiDang)
            ->update($data);
    }

    public function getNewPostCount()
    {
        return $this->model
            ->where('created_at', '>=', now()->subDays(Common::MONTH_DAYS))
            ->where('job_cao_du_lieu', false)
            ->count();
    }

    public function getListRequest()
    {
        return $this->model
            ->where('trang_thai', Common::UNAPPROVED)
            ->get();
    }

    public function approve($maBaiDang)
    {
        return $this->model
            ->where('ma_bai_dang', $maBaiDang)
            ->update(['trang_thai' => Common::APPROVED]);
    }

    public function reject($maBaiDang)
    {
        return $this->model
            ->where('ma_bai_dang', $maBaiDang)
            ->update(['trang_thai' => Common::REJECTED]);
    }

    public function delete($maBaiDang)
    {
        return $this->model
            ->where('ma_bai_dang', $maBaiDang)
            ->update(['trang_thai' => Common::SOFT_DELETED]);
    }

    public function restore($maBaiDang)
    {
        return $this->model
            ->where('ma_bai_dang', $maBaiDang)
            ->update(['trang_thai' => Common::APPROVED]);
    }

    public function getList()
    {
        return $this->model
            ->whereIn('trang_thai', [Common::APPROVED, Common::SOFT_DELETED])
            ->get();
    }
}
