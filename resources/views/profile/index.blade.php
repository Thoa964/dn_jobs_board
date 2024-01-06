@extends('layouts.app')

@php
    $diaChi = 'Chưa cập nhật';
    if ($profile->ten_phuong && $profile->dia_chi) {
        $diaChi = sprintf("%s - %s", $profile->ten_phuong, $profile->dia_chi);
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
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account"
                           role="tab">
                            Thông tin cá nhân
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#password"
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
                        @endif
                    </div>
                    <div class="tab-pane fade" id="password" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Password</h5>
                                <form>
                                    <div class="form-group">
                                        <label for="inputPasswordCurrent">Current password</label>
                                        <input type="password" class="form-control" id="inputPasswordCurrent">
                                        <small><a href="#">Forgot your password?</a></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNew">New password</label>
                                        <input type="password" class="form-control" id="inputPasswordNew">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNew2">Verify password</label>
                                        <input type="password" class="form-control" id="inputPasswordNew2">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
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
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
