<?php

namespace App\Repositories;

use App\Models\Quan;
use Prettus\Repository\Eloquent\BaseRepository;

class QuanRepository extends BaseRepository
{
    public function model()
    {
        return Quan::class;
    }

    public function getQuan() {
        return $this->model->all();
    }
}
