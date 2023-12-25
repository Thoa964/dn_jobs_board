@extends('layouts.app')

@section('content')
    <div class="login-container text-center text-lg-start">
        <div class="card">
            <div class="card-header">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-login-info" data-bs-toggle="tab" data-bs-target="#login-info" type="button" role="tab" aria-controls="login-info" aria-selected="true">
                            {{ __('register.login_info') }}
                        </button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                            {{ __('register.contact_info') }}
                        </button>
                        <button class="nav-link" id="nav-company-info-tab" data-bs-toggle="tab" data-bs-target="#nav-company-info" type="button" role="tab" aria-controls="nav-company-info" aria-selected="false">
                            {{ __('register.company_info') }}
                        </button>
                    </div>
                </nav>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('company.register') }}">
                    @csrf
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="login-info" role="tabpanel" aria-labelledby="nav-login-info">
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('register.email') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"
                                           required autocomplete="email" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="mat_khau" class="col-md-4 col-form-label text-md-end">{{ __('register.password') }}</label>
                                <div class="col-md-6">
                                    <input id="mat_khau" type="password" class="form-control" name="mat_khau"
                                           required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="mat_khau_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('register.confirm_password') }}</label>
                                <div class="col-md-6">
                                    <input id="mat_khau_confirmation" type="password" class="form-control"
                                           name="mat_khau_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="row mb-3">
                                <label for="ten" class="col-md-4 col-form-label text-md-end">{{ __('register.name') }}</label>
                                <div class="col-md-6">
                                    <input id="ten" type="text" class="form-control" name="ten" value="{{ old('ten') }}"
                                           placeholder="{{ __('register.name') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="sdt" class="col-md-4 col-form-label text-md-end">{{ __('register.phone_number') }}</label>

                                <div class="col-md-6">
                                    <input id="sdt" type="text" class="form-control" name="sdt" value="{{ old('sdt') }}" placeholder="Số điện thoại" required>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-company-info" role="tabpanel" aria-labelledby="nav-company-info-tab">
                            <div class="row mb-3">
                                <label for="ten_cong_ty" class="col-md-4 col-form-label text-md-end">{{ __('register.company_name') }}</label>
                                <div class="col-md-6">
                                    <input id="ten_cong_ty" type="text" class="form-control" name="ten_cong_ty"
                                           value="{{ old('ten_cong_ty') }}" placeholder="Tên công ty theo giấy phép đăng ký doanh nghiệp"
                                           required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ma_so_thue" class="col-md-4 col-form-label text-md-end">{{ __('register.tax_code') }}</label>
                                <div class="col-md-6">
                                    <input id="ma_so_thue" type="text" class="form-control" name="ma_so_thue"
                                           value="{{ old('ma_so_thue') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="dia_chi" class="col-md-4 col-form-label text-md-end">
                                    {{ __('register.address') }}
                                </label>
                                <div class="col-md-6">
                                    <div class="d-flex mb-3 gap-3">
                                        <select class="form-select" id="quan" name="quan">
                                            <option value="">-- Chọn quận --</option>
                                            @foreach($quan as $item)
                                                <option value="{{ $item->ma_quan }}">
                                                    {{ $item->ten_quan }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <select class="form-select" id="phuong" name="ma_phuong">
                                            <option value="">-- Chọn phường --</option>
                                            @foreach($phuong ?? [] as $item)
                                                <option value="{{ $item->ma_phuong }}">
                                                    {{ $item->ten_phuong }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="">
                                        <input id="dia_chi" type="text" class="form-control" name="dia_chi"
                                               placeholder="Nhập địa chỉ doanh nghiệp">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="main-btn">
                                        {{ __('register.register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/profile.js') }}"
@endsection
