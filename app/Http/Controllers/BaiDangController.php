<?php

namespace App\Http\Controllers;

use App\Enums\WorkType;
use App\Http\Requests\InsertBaiDangRequest;
use App\Models\Quan;
use App\Services\BaiDangService;
use App\Services\NganhNgheService;
use App\Services\QuanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaiDangController extends Controller
{
    private BaiDangService $baiDangService;
    private QuanService $quanService;
    private NganhNgheService $nganhNgheService;

    public function __construct(
        BaiDangService $baiDangService,
        QuanService $quanService,
        NganhNgheService $nganhNgheService
    ) {
        $this->baiDangService = $baiDangService;
        $this->quanService = $quanService;
        $this->nganhNgheService = $nganhNgheService;
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

    public function create() {
        $quan = $this->quanService->getQuan();
        $workType = WorkType::asArray();
        $nganhNghe = $this->nganhNgheService->fetchAll();
        return view('jobs.create', compact('quan', 'workType', 'nganhNghe'));
    }

    public function store(InsertBaiDangRequest $request) {
        $data = $request->validated();
        $this->baiDangService->store($data, Auth::user()->tai_khoan);
        return redirect()->back()->with('success', 'Đăng bài thành công');
    }
}
