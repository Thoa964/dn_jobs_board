<?php

namespace App\Http\Controllers;

use App\Services\BaiDangService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private BaiDangService $baiDangService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BaiDangService $baiDangService)
    {
        $this->baiDangService = $baiDangService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $danhSachBaiDang = $this->baiDangService->fetchAll();
        return view('home', compact('danhSachBaiDang'));
    }
}
