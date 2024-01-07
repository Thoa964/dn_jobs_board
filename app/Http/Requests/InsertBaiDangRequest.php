<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InsertBaiDangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tieu_de' => 'required',
            'mo_ta' => 'required',
            'ma_phuong' => 'required|exists:tbl_phuong,ma_phuong',
            'dia_chi' => 'required',
            'thoi_gian_bat_dau' => 'required|date|date_format:Y-m-d',
            'thoi_gian_ket_thuc' => 'required|date|date_format:Y-m-d|after:thoi_gian_bat_dau',
            'kinh_nghiem' => 'required',
            'hinh_thuc_lam_viec' => 'required',
            'chuc_vu' => 'required',
            'so_luong' => 'required',
            'yeu_cau_ung_vien' => 'required',
            'quyen_loi' => 'required',
            'cach_thuc_ung_tuyen' => 'required',
            'ma_nganh_nghe' => 'required|exists:tbl_nganh_nghe,ma_nganh_nghe',
        ];
    }
}
