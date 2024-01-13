<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DashBoardService;

class DashboardController extends Controller
{
    private DashBoardService $dashBoardService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        DashBoardService $dashBoardService
    ) {
        $this->middleware('admin');
        $this->dashBoardService = $dashBoardService;
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $data = $this->dashBoardService->getDashBoardData();
        return view('admin.dashboard.index', compact('data'));
    }
}
