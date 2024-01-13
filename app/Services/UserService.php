<?php

namespace App\Services;

use App\Enums\Common;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getProfile(string $taiKhoan) {
        return $this->userRepository->getProfile($taiKhoan);
    }

    public function updateAvatar(string $taiKhoan, $avatar) {
        $uploadPath = Common::UPLOAD_AVATAR_PATH;
        $uniqueName = time() . '_' . $avatar->getClientOriginalName();
        $oldAvatarName = $this->getProfile($taiKhoan)->avatar;
        $oldAvatarPath = public_path($uploadPath . $oldAvatarName);

        if ($oldAvatarName && file_exists($oldAvatarPath)) {
            try {
                unlink($oldAvatarPath);
            } catch (Exception $e) {
                Log::error('File not found at path: ' . $oldAvatarPath);
            }
        }

        Storage::drive('public')->put($uploadPath . $uniqueName, $avatar->getContent());

        return $this->userRepository->updateAvatar($taiKhoan, $uniqueName) ?? '';
    }

    public function update(string $taiKhoan, array $data) {
        return $this->userRepository->updateProfile($taiKhoan, $data);
    }

    public function changePassword($user, mixed $data)
    {
        // handle check old password is correct
        if (!Hash::check($data['password'], $user->mat_khau)) {
            return false;
        }

        $this->userRepository->updatePassword($user, bcrypt($data['new_password']));

        return true;
    }

    public function getUsers()
    {
        return $this->userRepository->getUsers();
    }

    public function createUser(mixed $data)
    {
        $data['mat_khau'] = bcrypt(Common::DEFAULT_PASSWORD);
        $data['trang_thai'] = Common::ACTIVATED;
        $data['ma_quyen'] = Common::USER;
        $data['ngay_hoat_dong'] = now()->format('Y-m-d');
        return $this->userRepository->createUser($data);
    }
}
