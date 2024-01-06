<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangCap extends Model
{
    use HasFactory;

    protected $table = 'tbl_bang_cap';

    protected $fillable = [
        'ten_bang_cap',
        'ngay_cap_bang',
    ];
}
