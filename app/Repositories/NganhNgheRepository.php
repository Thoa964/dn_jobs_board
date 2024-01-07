<?php

namespace App\Repositories;

use App\Models\NganhNghe;
use App\Models\Phuong;
use Prettus\Repository\Eloquent\BaseRepository;

class NganhNgheRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NganhNghe::class;
    }

    public function fetchAll() {
        return $this->model->where('is_crawl_data', '!=', true)->get();
    }
}
