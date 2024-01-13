@extends('admin.layout._master')

@php($title = 'Quản lý người dùng')

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
                        <th>Tài khoản</th>
                        <th>Họ Tên</th>
                        <th>Email</th>
                        <th>Ngày hoạt động</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $user->tai_khoan }}</td>
                            <td>{{ $user->ten }}</td>
                            <td>{{ $user->email ?? 'Chưa cập nhật' }}</td>
                            <td>{{ $user->ngay_hoat_dong }}</td>
                            <td class="text-center">
                                @if($user->trang_thai == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Deactivated</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($user->trang_thai == 1)
                                    <a href="#" class="btn btn-danger">
                                        <i class="fas fa-ban"></i>
                                        Khóa
                                    </a>
                                @else
                                    <a href="#" class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                        Kích hoạt
                                    </a>
                                @endif
                                <a href="#" class="btn btn-info">
                                    <i class="fas fa-edit"></i>
                                    Cấp lại mật khẩu
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSkillModalLabel">Tạo mới người dùng</h5>
                    <i class="fas fa-times" data-dismiss="modal" aria-label="Close" style="cursor: pointer;"></i>
                </div>
                <div class="modal-body">
                    <form id="addSkillForm" action="{{ route('Tạo mới người dùng') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tai_khoan">Tài khoản</label>
                            <input type="text" class="form-control" id="tai_khoan" name="tai_khoan" required>
                        </div>
                        <div class="form-group">
                            <label for="ten">Họ tên</label>
                            <input type="text" class="form-control" id="ten" name="ten" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success mt-3" id="addUserSubmit">Tạo</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            const $dataTable = $('#dataTable');
            $dataTable.DataTable();

            $('#addUserSubmit').on('click', function () {
                $('#addSkillForm').submit();
            });
        });
    </script>
@endsection
