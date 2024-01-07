<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaiDang extends Model
{
    use HasFactory;

    protected $table = 'tbl_bai_dang';

    protected $fillable = [
        'tai_khoan',
        'ma_nganh_nghe',
        'ma_phuong',
        'tieu_de',
        'mo_ta',
        'dia_chi',
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',
        'kinh_nghiem',
        'hinh_thuc_lam_viec',
        'chuc_vu',
        'so_luong',
        'yeu_cau_ung_vien',
        'quyen_loi',
        'cach_thuc_ung_tuyen',
        'dia_diem_lam_viec'
    ];

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'tai_khoan', 'tai_khoan');
    }

    public function nganhNghe(): BelongsTo {
        return $this->belongsTo(NganhNghe::class, 'ma_nganh_nghe', 'ma_nganh_nghe');
    }
}
