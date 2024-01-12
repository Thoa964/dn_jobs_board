<?php

namespace App\Http\Controllers;

use App\Services\HoSoService;
use Illuminate\Http\Request;

class HoSoController extends Controller
{
    private HoSoService $hoSoService;

    public function __construct(HoSoService $hoSoService)
    {
        $this->hoSoService = $hoSoService;
    }

    public function show($maHoSo)
    {
        $hoSo = $this->hoSoService->fetchById($maHoSo);

        return view('ho-so.show', compact('hoSo'));
    }
}
