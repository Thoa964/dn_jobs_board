<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function kyNang(): HasMany {
        return $this->hasMany(KyNang::class, 'ma_ho_so', 'ma_ho_so');
    }

    public function bangCap(): HasMany
    {
        return $this->hasMany(BangCap::class, 'ma_ho_so', 'ma_ho_so');
    }

    public function taiKhoan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'tai_khoan', 'tai_khoan');
    }

    public function duAn(): HasMany {
        return $this->hasMany(DuAnCaNhan::class, 'ma_ho_so', 'ma_ho_so');
    }
}
