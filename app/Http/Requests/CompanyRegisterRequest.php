<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tbl_tai_khoan'],
            'mat_khau' => ['required', 'string', 'min:6', 'confirmed'],
            'ten' => ['required', 'string', 'max:255'],
            'dia_chi' => ['required', 'string', 'max:255'],
            'sdt' => ['required', 'string', 'max:12'],
            'ma_so_thue' => ['required', 'string', 'max:255'],
        ];
    }
}
