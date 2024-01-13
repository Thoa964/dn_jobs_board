<?php

namespace App\Services;

use App\Repositories\BaiDangRepository;
use App\Repositories\DangKyUngTuyenRepository;
use App\Repositories\UserRepository;

class DashBoardService
{
    private UserRepository $userRepository;
    private BaiDangRepository $baiDangRepository;
    private DangKyUngTuyenRepository $dangKyUngTuyenRepository;

    public function __construct(
        UserRepository $userRepository,
        BaiDangRepository $baiDangRepository,
        DangKyUngTuyenRepository $dangKyUngTuyenRepository
    ) {
        $this->userRepository = $userRepository;
        $this->baiDangRepository = $baiDangRepository;
        $this->dangKyUngTuyenRepository = $dangKyUngTuyenRepository;
    }

    public function getDashBoardData()
    {
        $newUsers = $this->userRepository->getNewUserCount();
        $newPosts = $this->baiDangRepository->getNewPostCount();
        $applyCount = $this->dangKyUngTuyenRepository->getApplyCount();
        $applySuccessCount = $this->dangKyUngTuyenRepository->getApplySuccessCount();
        $companyPendingCount = $this->userRepository->getCompanyPendingCount();
        $topFiveCompanies = $this->userRepository->getTopFiveCompaniesWithMostPosts();

        return [
            'newUsers' => $newUsers,
            'newPosts' => $newPosts,
            'applyCount' => $applyCount,
            'applySuccessCount' => $applySuccessCount,
            'companyPendingCount' => $companyPendingCount,
            'topFiveCompanies' => $topFiveCompanies
        ];
    }
}
