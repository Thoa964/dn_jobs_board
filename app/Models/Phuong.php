<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phuong extends Model
{
    protected $table = 'tbl_phuong';

    public function quan(): BelongsTo
    {
        return $this->belongsTo(Quan::class, 'ma_quan', 'ma_quan');
    }
}
