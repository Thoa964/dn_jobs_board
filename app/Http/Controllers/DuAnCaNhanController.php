<?php

namespace App\Http\Controllers;

use App\Services\DuAnService;
use Illuminate\Http\Request;

class DuAnCaNhanController extends Controller
{
    private DuAnService $duAnService;

    public function __construct(DuAnService $duAnService)
    {
        $this->duAnService = $duAnService;
    }

    public function show($maDuAn)
    {
        $duAn = $this->duAnService->fetchById($maDuAn);

        return view('du-an.show', compact('duAn'));
    }
}
