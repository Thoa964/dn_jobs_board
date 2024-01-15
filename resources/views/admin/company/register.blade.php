@extends('admin.layout._master')

@php($title = 'Doanh nghiệp cần phê duyệt')

@section('title')
    {{ $title }}
@endsection

@section('heading')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary">{{ $title }}</h3>
            <i class="fas fa-plus text-success" style="cursor: pointer;" data-toggle="modal"
               data-target="#addUserModal" ></i>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên công ty</th>
                        <th>Mã số thuế</th>
                        <th>Tên người đại diện</th>
                        <th>Email</th>
                        <th>Ngày hoạt động</th>
                        <th class="text-center">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $user->ten_cong_ty }}</td>
                            <td>{{ $user->ma_so_thue }}</td>
                            <td>{{ $user->ten }}</td>
                            <td>{{ $user->email ?? 'Chưa cập nhật' }}</td>
                            <td>{{ $user->ngay_hoat_dong }}</td>
                            <td class="text-center">
                                <a href="{{ route('Duyệt đơn đăng ký', $user->tai_khoan) }}" class="btn btn-success">
                                    <i class="fas fa-check"></i>
                                    Duyệt
                                </a>
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
