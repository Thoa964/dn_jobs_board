@extends('layouts.app')

@php
    $diaChi = 'Chưa cập nhật';
    if ($company->ten_phuong && $company->dia_chi && $company->phuong) {
        $diaChi = sprintf("%s, Phường %s, Quận %s, TP Đà Nẵng",
                                            $company->dia_chi,
                                            $company->phuong->ten_phuong,
                                            $company->phuong->quan->ten_quan
                                        );
    }
@endphp

@section('content')
    <div class="company-container">
        <div class="d-flex flex-row gap-3 header">
            <div class="logo">
                <img src="{{ asset($company->avatarPath) }}" alt="Company logo">
            </div>
            <div class="d-flex flex-column">
                <h2>{{ $company->ten_cong_ty }}</h2>
                <span>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:{{ $company->email }}"> {{ $company->email }}</a>
                </span>
                <span>
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $diaChi }}
                </span>
                <span>
                    <i class="fas fa-phone"></i>
                    {{ $company->sdt ?? 'Chưa cập nhật' }}
                </span>
            </div>
        </div>
        <hr/>
        <div class="col main-content">
            <div class="company-description">
                <h2>Giới thiệu doanh nghiệp</h2>
                <p>{{ $company->hoSo->gioi_thieu ?? 'Chưa cập nhật' }}</p>
            </div>
            <div class="job-listings">
                <h2>Vị trí đang tuyển ({{ count($company->danhSachBaiDang) }})</h2>
                <ul>
                    @foreach($company->danhSachBaiDang as $job)
                        <li>
                            <a href="{{ route('Chi tiết công việc', $job->ma_bai_dang) }}">
                                {{ $job->tieu_de }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

