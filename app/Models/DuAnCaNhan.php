<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DuAnCaNhan extends Model
{
    use HasFactory;

    protected $table = 'tbl_du_an_ca_nhan';

    protected $fillable = [
        'ma_ho_so',
        'ten_du_an',
        'mo_ta',
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',
    ];

    public function hoSo(): BelongsTo {
        return $this->belongsTo(HoSo::class, 'ma_ho_so', 'ma_ho_so');
    }
}
