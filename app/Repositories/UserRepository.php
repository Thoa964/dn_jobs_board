<?php

namespace App\Repositories;

use App\Enums\Common;
use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    public function getProfile(string $taiKhoan)
    {
        return $this->model->with(['hoSo', 'hoSo.kyNang', 'hoSo.bangCap', 'danhSachBaiDang'])
            ->where('tai_khoan', $taiKhoan)->first();
    }

    public function updateAvatar($taiKhoan, $avatar)
    {
        $user = $this->getProfile($taiKhoan);

        if ($user) {
            $user->update([
                'avatar' => $avatar
            ]);

            return $user->refresh()->avatar;
        }

        return null;
    }

    public function updateProfile(string $taiKhoan, array $data) {
        $user = $this->getProfile($taiKhoan);

        if ($user) {
            $user->update([
                'ten' => $data['ten'],
                'email' => $data['email'],
                'sdt' => $data['sdt'],
                'dia_chi' => $data['dia_chi'],
                'gioi_tinh' => $data['gioi_tinh'],
                'ngay_sinh' => $data['ngay_sinh'],
                'ma_phuong' => $data['ma_phuong'],
                'cccd' => $data['cccd'],
            ]);

            return $user->refresh();
        }

        return null;
    }

    public function updatePassword($user, mixed $new_password)
    {
        $user->update([
            'mat_khau' => $new_password
        ]);
    }

    public function getMaHoSoByTaiKhoan($tai_khoan)
    {
        return $this->model->with('hoSo')
            ->where('tai_khoan', $tai_khoan)
            ->first()->hoSo->ma_ho_so;
    }

    public function getNewUserCount()
    {
        return $this->model
            ->where('trang_thai', Common::ACTIVATED)
            ->where('ma_quyen', Common::USER)
            ->where('created_at', '>=', now()->subDays(Common::MONTH_DAYS))
            ->count();
    }

    public function getCompanyPendingCount()
    {
        return $this->model
            ->where('trang_thai', Common::DEACTIVATED)
            ->where('ma_quyen', Common::DOANH_NGHIEP)
            ->where('created_at', '>=', now()->subDays(Common::MONTH_DAYS))
            ->count();
    }

    public function getTopFiveCompaniesWithMostPosts()
    {
        return $this->model
            ->where('trang_thai', Common::ACTIVATED)
            ->where('ma_quyen', Common::DOANH_NGHIEP)
            ->withCount('danhSachBaiDang')
            ->orderBy('danh_sach_bai_dang_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function getUsers()
    {
        return $this->model
            ->where('ma_quyen', Common::USER)
            ->get();
    }

    public function createUser(mixed $data)
    {
        return $this->model->create($data);
    }

    public function blockUser($taiKhoan): void
    {
        $this->model
            ->where('tai_khoan', $taiKhoan)
            ->update([
                'trang_thai' => Common::DEACTIVATED
            ]);
    }

    public function unblockUser($taiKhoan): void
    {
        $this->model
            ->where('tai_khoan', $taiKhoan)
            ->update([
                'trang_thai' => Common::ACTIVATED
            ]);
    }

    public function regeneratePassword($taiKhoan, $password): void
    {
        $this->model
            ->where('tai_khoan', $taiKhoan)
            ->update([
                'mat_khau' => $password
            ]);
    }
}
