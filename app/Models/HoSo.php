<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HoSo extends Model
{
    use HasFactory;

    protected $table = 'tbl_ho_so';

    protected $fillable = [
        'tai_khoan',
        'ma_ky_nang',
        'gioi_thieu',
        'bang_cap',
    ];

    public function kyNang(): BelongsTo {
        return $this->belongsTo(KyNang::class, 'ma_ky_nang', 'ma_ky_nang');
    }
}
