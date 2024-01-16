<?php

namespace App\Http\Controllers\Auth;

use App\DataTransferObjects\CompanyRegisterData;
use App\Enums\Common;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\QuanService;
use Goutte\Client;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Carbon;
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

        $companyData = $this->crawlDataProcessing($data['ma_so_thue'], $this->vn_to_str($data['ten_cong_ty']));

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
            str_replace(" ", "", $companyData['so_dien_thoai'])
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

    private function crawlDataProcessing(string $maSoThue, string $pathTenCongTy): array {
        $path = strtolower("$maSoThue-$pathTenCongTy");
        $response = $this->client->request("GET", "https://masothue.com/$path");
        $nameNode = $response->filter('td > span[itemprop="name"]');
        $phoneNode = $response->filter('td[itemprop="telephone"]');
        $companyNameNode = $response->filter('h1[class="h1"]');
        $tenNguoiDaiDien = $nameNode->count() > 0 ? $nameNode->text() : '';
        $soDienThoai = $phoneNode->count() > 0 ? $phoneNode->text() : '';
        $tenCongTy = $companyNameNode->count() > 0 ? $companyNameNode->text() : '';

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
            'ma_quyen' => Common::USER,
            'ngay_hoat_dong' => Carbon::now(),
            'trang_thai' => Common::ACTIVATED
        ]);
    }

    private function vn_to_str($str) {

        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );

        foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }

        $str = str_replace(' ','-',$str);

        return $str;
    }
}
