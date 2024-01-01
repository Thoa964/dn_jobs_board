@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img style="width: 100%"
                     src="{{ asset($baiDang->author->avatar_path) }}"
                     alt="{{ $baiDang->author->ten_cong_ty }}">
            </div>
            <div class="col-md-7">
                <span>{{ $baiDang->author->ten_cong_ty }}</span>
                <h3>{{ $baiDang->tieu_de }}</h3>
                <p>Hạn nộp hồ sơ: <strong>{{ $baiDang->thoi_gian_ket_thuc }}</strong></p>
            </div>
            <div class="col-md-3 d-flex justify-content-end align-items-end flex-wrap">
                <strong>Ngày đăng bài: {{ $baiDang->created_at ?? $baiDang->thoi_gian_bat_dau }}</strong>
            </div>
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
                            <p>Ngày đăng: {{ $baiDang->thoi_gian_bat_dau }}</p>
                        </div>
                        <div class="col-4">
                            <p>Cấp bậc: {{ $baiDang->chuc_vu }}</p>
                        </div>
                        <div class="col-4">
                            <p>Cấp bậc:{{ $baiDang->chuc_vu }}</p>
                        </div>
                    </div>
                    <div class="d-flex border-1 bb-1 mb-4">
                        <div class="col-4">
                            <p>Số lượng tuyển: {{ $baiDang->so_luong }}</p>
                        </div>
                        <div class="col-4">
                            <p>Hình thức làm việc: {{ $baiDang->hinh_thuc_lam_viec }}</p>
                        </div>
                        <div class="col-4">
                            <p>Yêu cầu kinh nghiệm: {{ $baiDang->kinh_nghiem }}</p>
                        </div>
                    </div>
                    <div class="d-flex border-1 bb-1 mb-4">
                        <div class="col-12">
                            <p>Ngành nghề: <a href="#">{{ $baiDang->nganhNghe->ten_nganh_nghe }}</a></p>
                        </div>
                    </div>
                </div>
                <h4>Mô tả công việc</h4>
                {!! $baiDang->mo_ta !!}
                <h4>Yêu cầu công việc</h4>
                {!! $baiDang->yeu_cau_ung_vien !!}
                <h4>Quyền lợi</h4>
                {!! $baiDang->quyen_loi !!}
                <h4>Địa điểm làm việc</h4>
                {!! $baiDang->dia_diem_lam_viec !!}
            </div>
        </div>
    </div>
@endsection
