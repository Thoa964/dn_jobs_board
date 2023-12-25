<?php

namespace App\Http\Controllers\Auth;

use App\DataTransferObjects\CompanyRegisterData;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\QuanService;
use Goutte\Client;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected string $redirectTo = RouteServiceProvider::HOME;
    private Client $client;
    private QuanService $quanService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(QuanService $quanService)
    {
        $this->middleware('guest');
        $this->client = new Client();
        $this->quanService = $quanService;
    }

    public function companyRegister() {
        $quan = $this->quanService->getQuan();
        return view('auth.company_register', compact('quan'));
    }

    public function doRegister(CompanyRegisterRequest $request)
    {
        $data = CompanyRegisterData::fromRequest($request);

        $companyData = $this->crawlDataProcessing($data['ma_so_thue']);

        if (!$this->validateTenCongTy(
            $data['ten_cong_ty'],
            $data['ma_so_thue'],
            $companyData['ten_cong_ty']
        )) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', __('validation.custom.ten_cong_ty_phai_trung_voi_ma_so_thue'));
        }

        if (!$this->validateTenNguoiDaiDien(
            $data['ten'],
            $companyData['ten_nguoi_dai_dien']
        )){
            return redirect()
                ->back()
                ->withInput()
                ->with('error', __('validation.custom.ten_nguoi_dai_dien_khong_chinh_xac'));
        }

        if (!$this->validateSoDienThoai(
            $data['sdt'],
            $companyData['so_dien_thoai']
        )) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', __('validation.custom.so_dien_thoai_khong_chinh_xac'));
        }
        DB::beginTransaction();
        User::create($data);
        DB::commit();

        return redirect()
            ->route('login')
            ->with('success', __('auth.company_register_success'));
    }

    private function validateSoDienThoai(
        string $requestSoDienThoai,
        string $soDienThoai
    ) {
        return $soDienThoai == 'Bị ẩn theo yêu cầu người dùng' || $soDienThoai == $requestSoDienThoai;
    }

    private function validateTenCongTy(
        string $requestTenCongTy,
        string $maSoThue,
        string $tenCongTy
    ) {
        $maSoThue = strtolower($maSoThue);
        $requestTenCongTy = strtolower($requestTenCongTy);
        return sprintf("%s - %s", $maSoThue, $requestTenCongTy) == $tenCongTy;
    }

    private function validateTenNguoiDaiDien(
        string $requestName,
        string $tenNguoiDaiDien
    ) {
        $requestName = strtolower($requestName);
        return $requestName == $tenNguoiDaiDien;
    }

    private function crawlDataProcessing(string $maSoThue): array {

        $response = $this->client->request("GET", "https://masothue.com/Search?q=$maSoThue&token=thoa2503&type=enterprise");
        $tenNguoiDaiDien = $response->filter('td > span[itemprop="name"]')->text();
        $soDienThoai = $response->filter('td[itemprop="telephone"]')->text();
        $tenCongTy = $response->filter('h1[class="h1"]')->text();

        return [
            'ten_nguoi_dai_dien' => strtolower($tenNguoiDaiDien),
            'so_dien_thoai' => $soDienThoai,
            'ten_cong_ty' => strtolower($tenCongTy)
        ];
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ten' => ['required', 'string', 'max:255'],
            'tai_khoan' => ['required', 'string', 'max:255', 'unique:tbl_tai_khoan'],
            'mat_khau' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'ten' => $data['ten'],
            'tai_khoan' => $data['tai_khoan'],
            'mat_khau' => Hash::make($data['mat_khau']),
            'ma_quyen' => 2,
            'trang_thai' => 1
        ]);
    }
}
