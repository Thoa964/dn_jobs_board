<?php

namespace App\Models;

use App\Enums\Common;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "tbl_tai_khoan";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar',
        'ten',
        'tai_khoan',
        'mat_khau',
        'ma_so_thue',
        'email',
        'sdt',
        'cccd',
        'dia_chi',
        'ma_quyen',
        'ma_phuong',
        'ma_linh_vuc_hoat_dong',
        'trang_thai',
        'gioi_tinh',
        'ngay_sinh',
        'ten_cong_ty',
    ];

    protected $appends = [
        'ten_phuong',
        'gender',
        'avatar_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'mat_khau',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'mat_khau' => 'hashed',
        'gioi_tinh' => 'boolean',
    ];

    public function getAuthPassword()
    {
        return $this->mat_khau;
    }

    public function phuong(): BelongsTo {
        return $this->belongsTo(Phuong::class, 'ma_phuong', 'ma_phuong');
    }

    public function getTenPhuongAttribute(): string {
        return $this->phuong->ten_phuong ?? '';
    }

    public function getGenderAttribute(): string {
        return $this->gioi_tinh ? Common::MALE : Common::FEMALE;
    }

    public function getAvatarPathAttribute(): string {
        return Common::UPLOAD_AVATAR_PATH . ($this->avatar ?? Common::DEFAULT_AVATAR_NAME);
    }

    public function danhSachBaiDang(): HasMany {
        return $this->hasMany(BaiDang::class, 'tai_khoan', 'tai_khoan');
    }

    public function hoSo(): HasOne {
        return $this->hasOne(HoSo::class, 'tai_khoan', 'tai_khoan');
    }

    public function isDoanhNghiep(): bool {
        return $this->ma_quyen == Common::DOANH_NGHIEP;
    }
}
