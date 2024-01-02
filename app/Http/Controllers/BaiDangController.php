<?php

namespace App\Http\Controllers;

use App\Services\BaiDangService;
use Illuminate\Http\Request;

class BaiDangController extends Controller
{
    private BaiDangService $baiDangService;

    public function __construct(BaiDangService $baiDangService)
    {
        $this->baiDangService = $baiDangService;
    }

    public function index()
    {
        $danhSachBaiDang = $this->baiDangService->fetchAll();
        return view('jobs.index', compact('danhSachBaiDang'));
    }

    public function show($maBaiDang)
    {
        $baiDang = $this->baiDangService->fetchById($maBaiDang);

        if (!$baiDang) {
            return redirect()->back()->with('error', 'Không tìm thấy bài đăng');
        }

        return view('jobs.show', compact('baiDang'));
    }
}
