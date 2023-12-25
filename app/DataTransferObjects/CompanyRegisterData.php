<?php

namespace App\DataTransferObjects;

use App\Http\Requests\CompanyRegisterRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CompanyRegisterData extends DataTransferObject
{
    public static function fromRequest(CompanyRegisterRequest $request): array {
        return [
            'tai_khoan' => $request->get('email'),
            'email' => $request->get('email'),
            'mat_khau' => $request->get('mat_khau'),
            'ten' => ucfirst($request->get('ten')),
            'dia_chi' => $request->get('dia_chi'),
            'sdt' => $request->get('sdt'),
            'ten_cong_ty' => $request->get('ten_cong_ty'),
            'ma_so_thue' => $request->get('ma_so_thue'),
            'ma_phuong' => $request->get('ma_phuong'),
            'ma_quyen' => 3,
            'trang_thai' => 0,
        ];
    }
}
