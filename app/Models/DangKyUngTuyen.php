<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DangKyUngTuyen extends Model
{
    use HasFactory;

    protected $table = 'tbl_dang_ky_ung_tuyen';

    protected $fillable = [
        'ma_ho_so',
        'ma_bai_dang',
        'ngay_dang_ky',
        'trang_thai'
    ];

    public function hoSo(): BelongsTo {
        return $this->belongsTo(HoSo::class, 'ma_ho_so', 'ma_ho_so');
    }

    public function baiDang(): BelongsTo {
        return $this->belongsTo(BaiDang::class, 'ma_bai_dang', 'ma_bai_dang');
    }
}
