@extends('layouts.app')

@php
    $diaChi = 'Chưa cập nhật';
    if ($profile->ten_phuong && $profile->dia_chi && $profile->phuong) {
        $diaChi = sprintf("%s, Phường %s, Quận %s, TP Đà Nẵng",
                                            $profile->dia_chi,
                                            $profile->phuong->ten_phuong,
                                            $profile->phuong->quan->ten_quan
                                        );
    }
@endphp

@section('content')
    <div class="container p-0">
        <div class="row">
            <div class="col-md-5 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ \Request::route()->getName() }}</h5>
                    </div>
                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account"
                           role="tab">
                            Thông tin cá nhân
                        </a>
                        <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#password"
                           role="tab">
                            Mật khẩu
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-xl-8">
                <div class="tab-content">
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
                                <a href="{{ route('Cập nhật thông tin cá nhân') }}" class="mt-2 btn btn-primary">
                                    Cập nhật thông tin cá nhân
                                </a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Hồ sơ</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputIntro">Giới thiệu</label>
                                    <textarea class="form-control" rows="3" id="inputIntro" disabled>{{ $profile->hoSo->gioi_thieu ?? 'Chưa cập nhật'}}</textarea>
                                </div>
                                <button class="mt-3 btn btn-primary" id="cap_nhat_ho_so">Cập nhật hồ sơ</button>
                            </div>
                        </div>
                        @if($profile->hoSo)
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Bằng cấp</h5>
                                        <i class="fa fa-plus" data-bs-toggle="modal"
                                           data-bs-target="#addCertificateModal" style="cursor: pointer;"></i>
                                    </div>
                                </div>
                                <div class="card-body" id="bangCapList">
                                    @foreach($profile->hoSo->bangCap ?? [] as $item)
                                        <div class="d-flex justify-content-between align-items-center mb-2 item">
                                            <span>{{ $item->ten_bang_cap }}</span>
                                            <div class="d-flex align-items-center">
                                                <span>{{ $item->ngay_cap_bang }}</span>
                                                <i class="fas fa-trash text-danger ms-3 delete-bang-cap" style="cursor: pointer;"
                                                   data-id="{{ $item->ma_bang_cap }}" data-title="{{ $item->ten_bang_cap }}"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Kỹ năng</h5>
                                        <i class="fa fa-plus" data-bs-toggle="modal"
                                           data-bs-target="#addSkillModal" style="cursor: pointer;"></i>
                                    </div>
                                </div>
                                <div class="card-body" id="kyNangList">
                                    @foreach($profile->hoSo->kyNang ?? [] as $item)
                                        <div class="d-flex justify-content-between mb-2 item">
                                            <span>{{ $item->ten_ky_nang }}</span>
                                            @php($experience = ($item->so_nam_kinh_nghiem - (int) $item->so_nam_kinh_nghiem ) == 0 ? (int) $item->so_nam_kinh_nghiem : $item->so_nam_kinh_nghiem)
                                            <div class="d-flex align-items-center">
                                                <span>{{ $experience }} Năm</span>
                                                <i class="fas fa-trash text-danger ms-3 delete-ky-nang" style="cursor: pointer;"
                                                   data-id="{{ $item->ma_ky_nang }}" data-title="{{ $item->ten_ky_nang }}"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Dự án cá nhân</h5>
                                        <i class="fa fa-plus" data-bs-toggle="modal"
                                           data-bs-target="#addProjectModal" style="cursor: pointer;"></i>
                                    </div>
                                </div>
                                <div class="card-body" id="projectList">
                                    @foreach($profile->hoSo->duAn ?? [] as $item)
                                        <div class="d-flex justify-content-between align-items-center mb-2 item">
                                            <a href="{{ route('Chi tiết dự án', $item->ma_du_an) }}">{{ $item->ten_du_an }}</a>

                                            <i class="fas fa-trash text-danger ms-3 delete-du-an" style="cursor: pointer;"
                                               data-id="{{ $item->ma_du_an }}" data-title="{{ $item->ten_du_an }}"></i>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="password" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Cập nhật mật khẩu</h5>
                                <form action="{{ route('Đổi mật khẩu') }}" method="POST" class="d-flex flex-column gap-3">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputPasswordCurrent">Mật khẩu hiện tại</label>
                                        <input type="password" class="form-control" id="inputPasswordCurrent" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNew">Mật khẩu mới</label>
                                        <input type="password" class="form-control" id="inputPasswordNew" name="new_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNew2">Nhập lại mật khẩu</label>
                                        <input type="password" class="form-control" id="inputPasswordNew2" name="new_password_confirmation">
                                    </div>
                                    <div style="width: 60px">
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addSkillModal" tabindex="-1" role="dialog" aria-labelledby="addSkillModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSkillModalLabel">Thêm mới kỹ năng</h5>
                    <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;"></i>
                </div>
                <div class="modal-body">
                    <form id="addSkillForm">
                        @csrf
                        <div class="form-group">
                            <label for="skillName">Tên kỹ năng</label>
                            <input type="text" class="form-control" id="skillName" name="ten_ky_nang" required>
                        </div>
                        <div class="form-group">
                            <label for="experienceYears">Số năm kinh nghiệm</label>
                            <input type="number" min="0" step="0.5" class="form-control" id="experienceYears"
                                   name="so_nam_kinh_nghiem" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addCertificateModal" tabindex="-1" role="dialog" aria-labelledby="addCertificateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCertificateModalLabel">Thêm mới bằng cấp</h5>
                    <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;"></i>
                </div>
                <div class="modal-body">
                    <form id="addCertificateForm">
                        @csrf
                        <div class="form-group">
                            <label for="certificateName">Tên bằng cấp</label>
                            <input type="text" class="form-control" id="certificateName" name="ten_bang_cap" required>
                        </div>
                        <div class="form-group">
                            <label for="issueDate">Ngày cấp</label>
                            <input type="date" class="form-control" id="issueDate" max="{{ now()->format('Y-m-d') }}"
                                   name="ngay_cap_bang" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="addProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProjectModalLabel">Thêm mới dự án cá nhân</h5>
                    <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;"></i>
                </div>
                <div class="modal-body">
                    <form id="addProjectForm" class="d-flex flex-column gap-3">
                        @csrf
                        <div class="form-group">
                            <label for="projectName">Tên dự án</label>
                            <input type="text" class="form-control" id="projectName" name="ten_du_an" required>
                        </div>
                        <div class="form-group">
                            <label for="projectDescription">Mô tả</label>
                            <textarea class="form-control" id="projectDescription" name="mo_ta" rows="3" required></textarea>
                        </div>
                        <div class="form-group d-flex gap-3">
                            <div class="col-4">
                                <label for="startDate">Thời gian bắt đầu</label>
                                <input type="date" class="form-control" id="startDate" name="thoi_gian_bat_dau" required>
                            </div>
                            <div class="col-4">
                                <label for="endDate">Thời gian kết thúc</label>
                                <input type="date" class="form-control" id="endDate" name="thoi_gian_ket_thuc">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnAddProject">Thêm</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            const startDateInput = $('#startDate');
            const endDateInput = $('#endDate');

            startDateInput.on('change', function () {
                const startDateValue = startDateInput.val();
                endDateInput.prop('disabled', !startDateValue); // Disable if no value, enable otherwise
                endDateInput.attr('min', startDateValue); // Set minimum value to "Thời gian bắt đầu"
            });

            endDateInput.on('change', function () {
                // You can add additional validation or logic here if needed
            });

            startDateInput.trigger('change');

            $('#btnAddProject').on('click', function () {
                $('form#addProjectForm').submit();
            })
        });
    </script>

    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
