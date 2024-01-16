<?php

namespace App\Http\Controllers;

use App\Enums\WorkType;
use App\Services\BaiDangService;
use App\Services\QuanService;

class HomeController extends Controller
{
    private BaiDangService $baiDangService;
    private QuanService $quanService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BaiDangService $baiDangService, QuanService $quanService)
    {
        $this->baiDangService = $baiDangService;
        $this->quanService = $quanService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $danhSachBaiDang = $this->baiDangService->fetchAll();
        $quan = $this->quanService->getQuan();
        $workType = WorkType::asArray();

        return view('home', compact('danhSachBaiDang', 'quan', 'workType'));
    }
}
