<?php

namespace App\Repositories;

use App\Enums\Common;
use App\Models\BaiDang;
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
            ->orderBy('created_at', 'desc')->paginate(Common::DEFAULT_ITEMS_PER_PAGE);
    }
}
