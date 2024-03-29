@extends('layouts.app')

@section('content')
    @php($user = Auth::user())
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img style="width: 100%"
                     src="{{ asset($baiDang->author->avatar_path) }}"
                     alt="{{ $baiDang->author->ten_cong_ty }}">
            </div>
            <div class="col-md-7 d-flex flex-column">
                <h3>{{ $baiDang->tieu_de }}</h3>
                <span><a href="{{ route('Thông tin công ty', $baiDang->author->id) }}">{{ $baiDang->author->ten_cong_ty }}</a></span>
                <span>Hạn nộp hồ sơ: <strong>{{ $baiDang->thoi_gian_ket_thuc }}</strong></span>
            </div>
            @if($user && $user->ma_quyen == 2 && $user->hoSo)
                <div class="col-md-3">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('Ứng tuyển', ['ma_bai_dang' => $baiDang->ma_bai_dang]) }}" class="main-btn">Ứng tuyển</a>
                    </div>
                </div>
            @endif
            @if($user && $user->ma_quyen == 3 && $baiDang->author == $user)
                <div class="col-md-3">
                    <div class="d-flex flex-column gap-3 justify-content-end">
                        <a href="{{ route('Danh sách ứng viên', ['ma_bai_dang' => $baiDang->ma_bai_dang]) }}" class="main-btn">Danh sách ứng viên</a>
                        @if($dangUngTuyen <= 0 || $baiDang->trang_thai = 0)
                            <a href="{{ route('Sửa bài', ['ma_bai_dang' => $baiDang->ma_bai_dang]) }}" class="main-btn">Sửa bài</a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
    <br/>
    <div class="container">
        <div class="card">
            <div class="card-header">Chi tiết tuyển dụng</div>
            <div class="card-body">
                <h4>Thông tin chung</h4>
                <div class="px-4 pt-3 pb-1 mb-4" style="background-color: #F5F3FF">
                    <div class="d-flex border-1 bb-1 mb-4">
                        <div class="col-4">
                            <p><strong>Ngày đăng:</strong> {{ $baiDang->thoi_gian_bat_dau }}</p>
                        </div>
                        <div class="col-4">
                            <p><strong>Cấp bậc:</strong> {{ $baiDang->chuc_vu }}</p>
                        </div>
                        <div class="col-4">
                            <p><strong>Hình thức làm việc:</strong> {{ $baiDang->hinh_thuc_lam_viec }}</p>
                        </div>
                    </div>
                    <div class="d-flex border-1 bb-1 mb-4">
                        <div class="col-4">
                            <p><strong>Số lượng tuyển:</strong> {{ $baiDang->so_luong }}</p>
                        </div>
                        <div class="col-4">
                            <p><strong>Đang ứng tuyển:</strong> {{ $dangUngTuyen }}</p>
                        </div>
                        <div class="col-4">
                            <p><strong>Yêu cầu kinh nghiệm:</strong> {{ $baiDang->kinh_nghiem }}</p>
                        </div>
                    </div>
                    <div class="d-flex border-1 bb-1 mb-4">
                        <div class="col-12">
                            <p><strong>Ngành nghề:</strong> <a href="#">{{ $baiDang->nganhNghe->ten_nganh_nghe }}</a></p>
                        </div>
                    </div>
                </div>
                <h4>Mô tả công việc</h4>
                {!! $baiDang->mo_ta !!}
                <h4>Yêu cầu công việc</h4>
                {!! $baiDang->yeu_cau_ung_vien !!}
                <h4>Quyền lợi</h4>
                {!! $baiDang->quyen_loi !!}
                @if($baiDang->cach_thuc_ung_tuyen)
                    <h4>Cách thức ứng tuyển</h4>
                    {!! $baiDang->cach_thuc_ung_tuyen !!}
                @endif
                <h4>Địa điểm làm việc</h4>
                {!! $baiDang->dia_diem_lam_viec !!}
            </div>
        </div>
    </div>
@endsection
