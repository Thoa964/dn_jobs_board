<?php

namespace App\Http\Controllers;

use App\Enums\WorkType;
use App\Services\BaiDangService;
use App\Services\QuanService;
use Illuminate\Http\Request;

class BaiDangController extends Controller
{
    private BaiDangService $baiDangService;
    private QuanService $quanService;

    public function __construct(
        BaiDangService $baiDangService,
        QuanService $quanService
    ) {
        $this->baiDangService = $baiDangService;
        $this->quanService = $quanService;
    }

    public function index()
    {
        $danhSachBaiDang = $this->baiDangService->fetchAll();
        $quan = $this->quanService->getQuan();
        $workType = WorkType::asArray();

        return view('jobs.index', compact('danhSachBaiDang', 'quan', 'workType'));
    }

    public function show($maBaiDang)
    {
        $baiDang = $this->baiDangService->fetchById($maBaiDang);

        if (!$baiDang) {
            return redirect()->back()->with('error', 'Không tìm thấy bài đăng');
        }

        return view('jobs.show', compact('baiDang'));
    }

    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $requestWorkType = $request->input('work_type', '');
        $requestQuan = $request->input('ma_quan');

        $quan = $this->quanService->getQuan();
        $workType = WorkType::asArray();
        $danhSachBaiDang = $this->baiDangService->search($keyword, $requestQuan, $requestWorkType);

        return view('jobs.index', compact('danhSachBaiDang', 'keyword', 'workType', 'quan', 'requestWorkType', 'requestQuan'));
    }
}
