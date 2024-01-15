@extends('layouts.app')

@php($trangThai = [
    'Đã duyệt' => 'text-success',
    'Đang chờ duyệt' => 'text-warning',
    'Đã từ chối' => 'text-danger',
])

@section('content')
    <div class="container mt-5">
        <h2>Danh sách ứng viên</h2>
        <h5>{{ $baiDang->tieu_de }}</h5>
        <table class="table">
            <thead>
            <tr>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Hồ sơ</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @forelse($danhSachUngVien as $donDangKy)
                @php($ungVien = $donDangKy->hoSo->taiKhoan)
                <tr data-id="{{ $donDangKy->ma_ho_so }}">
                    <td>{{ $ungVien->ten }}</td>
                    <td>{{ $ungVien->email }}</td>
                    <td><a href="{{ route('Chi tiết hồ sơ', $ungVien->hoSo->ma_ho_so) }}" target="_blank" class="link-info">Xem hồ sơ</a></td>
                    <td class="{{ $trangThai[$donDangKy->trang_thai] }}">{{ $donDangKy->trang_thai }}</td>
                    <td>
                        @if($donDangKy->trang_thai == 'Đang chờ duyệt')
                            <form action="{{ route('Cập nhật trang thái đăng ký', $donDangKy->ma_bai_dang) }}" method="post">
                                @csrf
                                <input type="hidden" name="ma_ho_so" value="{{ $donDangKy->ma_ho_so }}">
                                <button type="submit" value="1" name="trang_thai" class="btn btn-outline-success btn-approve">
                                    <i class="fas fa-check"></i> Duyệt
                                </button>
                                <button type="submit" value="0" name="trang_thai" class="btn btn-outline-danger btn-reject">
                                    <i class="fas fa-times"></i> Từ chối
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Không có ứng viên đang ứng tuyển</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
