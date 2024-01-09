<?php

namespace App\Repositories;

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
}
