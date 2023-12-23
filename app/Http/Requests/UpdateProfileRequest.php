<?php

namespace App\Http\Requests;

class UpdateProfileRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'ten' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tbl_tai_khoan,email,' . $this->user()->id],
            'sdt' => ['required', 'string', 'max:11', 'unique:tbl_tai_khoan,sdt,' . $this->user()->id],
            'dia_chi' => ['required', 'string', 'max:255'],
            'gioi_tinh' => ['required', 'boolean'],
            'ngay_sinh' => ['required', 'date'],
            'ma_phuong' => ['required', 'exists:tbl_phuong,ma_phuong'],
            'cccd' => ['nullable', 'string', 'max:12', 'min:12', 'unique:tbl_tai_khoan,cccd,' . $this->user()->id],
        ];
    }

    public function errorCode(): array
    {
        return [];
    }
}
