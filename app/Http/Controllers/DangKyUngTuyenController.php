<?php

namespace App\Http\Controllers;

use App\Services\DangKyUngTuyenService;

class DangKyUngTuyenController extends Controller
{
    private DangKyUngTuyenService $dangKyUngTuyenService;
    
    public function __construct(
        DangKyUngTuyenService $dangKyUngTuyenService
    ) {
        $this->dangKyUngTuyenService = $dangKyUngTuyenService;
    }

    public function ungTuyen($maBaiDang) {
        if($this->dangKyUngTuyenService->ungTuyen($maBaiDang)) {
            return redirect()->back()->with('success', 'Ứng tuyển thành công');
        }

        return redirect()->back();
    }
}
