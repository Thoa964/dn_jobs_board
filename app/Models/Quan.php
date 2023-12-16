<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quan extends Model
{
    protected $table = "tbl_quan";

    public function phuongs(): HasMany
    {
        return $this->hasMany(Phuong::class, 'ma_quan', 'ma_quan');
    }
}
