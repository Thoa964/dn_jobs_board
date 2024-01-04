<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KyNang extends Model
{
    protected $table = 'tbl_ky_nang';

    protected $fillable = [
        'ten_ky_nang',
        'so_nam_kinh_nghiem',
    ];
}
