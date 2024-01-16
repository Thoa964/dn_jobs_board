@extends('admin.layout._master')

@php($title = 'Quản lý bài đăng')

@section('title')
    {{ $title }}
@endsection

@section('heading')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary">{{ $title }}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Ngành nghề</th>
                        <th>Hình thức làm việc</th>
                        <th>Số lượng</th>
                        <th class="text-center">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($danhSachBaiDang as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->tieu_de }}</td>
                            <td>{{ $item->nganhNghe->ten_nganh_nghe }}</td>
                            <td>{{ $item->hinh_thuc_lam_viec }}</td>
                            <td>{{ $item->so_luong }}</td>
                            <td class="text-center">
                                <a href="{{ route('Chi tiết công việc', $item->ma_bai_dang) }}" target="_blank" class="btn btn-outline-info mb-1"><i class="fas fa-eye"></i></a>
                                @if($item->trang_thai == \App\Enums\Common::APPROVED)
                                    <a href="{{ route('Xóa bài đăng', $item->ma_bai_dang) }}" class="btn btn-outline-danger" title="Xóa"><i class="fas fa-trash"></i></a>
                                @else
                                    <a href="{{ route('Khôi phục bài đăng', $item->ma_bai_dang) }}" class="btn btn-outline-success" title="Khôi phục"><i class="fas fa-trash-restore"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            const $dataTable = $('#dataTable');
            $dataTable.DataTable();
        });
    </script>
@endsection
