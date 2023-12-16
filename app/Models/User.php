<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    ];

    public function getAuthPassword()
    {
        return $this->mat_khau;
    }
}
