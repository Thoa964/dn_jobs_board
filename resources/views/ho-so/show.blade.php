@extends('layouts.app')

@section('content')
    @php
        $profile = $hoSo->taiKhoan;
        $diaChi = 'Chưa cập nhật';
        if ($profile->ten_phuong && $profile->dia_chi && $profile->phuong) {
            $diaChi = sprintf("%s, Phường %s, Quận %s, TP Đà Nẵng",
                                                $profile->dia_chi,
                                                $profile->phuong->ten_phuong,
                                                $profile->phuong->quan->ten_quan
                                            );
        }
    @endphp
    <div class="tab-pane fade show active" id="account" role="tabpanel">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Thông tin cơ bản</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <span for="inputUsername">Họ tên</span>
                            <input type="text" class="form-control" id="inputUsername" name="ten"
                                   placeholder="Họ tên" value="{{ $profile->ten }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input class="form-control" id="inputEmail" name="email"
                                   placeholder="Email" value="{{ $profile->email ?? 'Chưa cập nhật' }}"
                                   disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputPhone">Số điện thoại</label>
                            <input class="form-control" id="inputPhone" name="phone"
                                   placeholder="Số điện thoại"
                                   value="{{ $profile->sdt ?? 'Chưa cập nhật' }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Địa chỉ</label>
                            <input class="form-control" id="inputAddress" name="phone"
                                   placeholder="Số điện thoại" value="{{ $diaChi }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <img alt="Andrew Jones"
                                 src="{{ asset($profile->avatar_path) }}"
                                 class="rounded-circle img-responsive mt-2" width="128" height="128">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Hồ sơ</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="inputIntro">Giới thiệu</label>
                    <textarea class="form-control" rows="3" id="inputIntro"
                              disabled>{{ $profile->hoSo->gioi_thieu ?? 'Chưa cập nhật'}}</textarea>
                </div>
            </div>
        </div>
        @if($profile->hoSo)
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Bằng cấp</h5>
                    </div>
                </div>
                <div class="card-body" id="bangCapList">
                    @foreach($profile->hoSo->bangCap ?? [] as $item)
                        <div class="d-flex justify-content-between align-items-center mb-2 item">
                            <span>{{ $item->ten_bang_cap }}</span>
                            <div class="d-flex align-items-center">
                                <span>{{ $item->ngay_cap_bang }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Kỹ năng</h5>
                    </div>
                </div>
                <div class="card-body" id="kyNangList">
                    @foreach($profile->hoSo->kyNang ?? [] as $item)
                        <div class="d-flex justify-content-between mb-2 item">
                            <span>{{ $item->ten_ky_nang }}</span>
                            @php($experience = ($item->so_nam_kinh_nghiem - (int) $item->so_nam_kinh_nghiem ) == 0 ? (int) $item->so_nam_kinh_nghiem : $item->so_nam_kinh_nghiem)
                            <div class="d-flex align-items-center">
                                <span>{{ $experience }} Năm</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Dự án cá nhân</h5>
                    </div>
                </div>
                <div class="card-body" id="projectList">
                    @foreach($profile->hoSo->duAn ?? [] as $item)
                        <div class="d-flex justify-content-between align-items-center mb-2 item">
                            <a href="{{ route('Chi tiết dự án', $item->ma_du_an) }}">{{ $item->ten_du_an }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
