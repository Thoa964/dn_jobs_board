<?php

namespace App\Http\Controllers;

use App\Services\PhuongService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhuongController extends Controller
{
    protected PhuongService $phuongService;

    public function __construct(PhuongService $phuongService) {
        $this->phuongService = $phuongService;
    }

    public function getPhuongByQuan(Request $request) {
        $phuong = $this->phuongService->getPhuongByQuan($request->quan_id);
        $result = '<option value="">-- Chọn phường --</option>';
        $user = Auth::user();

        foreach ($phuong as $item) {
            $selected = ($item->ma_phuong == $user->ma_phuong) ? 'selected' : '';
            $result .= '<option value="'.$item->ma_phuong.'" '.$selected.'>'.$item->ten_phuong.'</option>';
        }

        return $result;
    }
}
