@extends('layouts.app')

@section('content')
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">{{ __('profile.avatar') }}</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img id="avatar" class="img-account-profile rounded-circle mb-2"
                             style="width: 150px;"
                             src="{{ asset($profile->avatar_path) }}" alt="Avatar">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">Định dạng JPG hoặc PNG không lớn hơn 5MB</div>
                        <!-- Profile picture upload button-->
                        <form id="frm_avatar" action="{{ route('Cập nhật avatar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="avatar" id="upload_avatar" style="display: none;">
                        </form>
                        <button id="btn_upload" class="main-btn" type="button">{{ __('profile.upload_avatar') }}</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">{{ __('profile.profile_detail') }}</div>
                    <div class="card-body">
                        <form id="frm_profile" action="{{ route('Lưu thông tin cá nhân') }}" method="POST">
                            @csrf
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label class="small mb-1" for="ten">Họ tên</label>
                                    <input class="form-control" id="ten" name="ten" type="text"
                                           placeholder="Nhập tên của bạn" value="{{ $profile->ten }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="small mb-1" for="gioi_tinh">Giới tính</label>
                                    <select class="form-select" id="gioi_tinh" name="gioi_tinh">
                                        <option value="">-- Chọn giới tính --</option>
                                        <option value="1" {{ $profile->gioi_tinh ? 'selected' : '' }}>Nam</option>
                                        <option value="0" {{ !$profile->gioi_tinh ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="small mb-1" for="ngay_sinh">Ngày sinh</label>
                                    <input class="form-control" id="ngay_sinh" type="date" name="ngay_sinh"
                                           placeholder="Ngày sinh của bạn" value="{{ $profile->ngay_sinh }}">
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-3">
                                    <label class="small mb-1" for="quan">Quận</label>
                                    <select class="form-select" id="quan" name="quan">
                                        <option value="">-- Chọn quận --</option>
                                        @foreach($quan as $item)
                                            @php($selected = $profile->phuong->quan->ma_quan == $item->ma_quan ? 'selected' : '')
                                            <option value="{{ $item->ma_quan }}" {{ $selected }}>
                                                {{ $item->ten_quan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Form Group (organization name)-->
                                <div class="col-md-3">
                                    <label class="small mb-1" for="phuong">Phường</label>
                                    <select class="form-select" id="phuong" name="ma_phuong">
                                        <option value="">-- Chọn phường --</option>
                                        @foreach($phuong as $item)
                                            @php($selected = $profile->phuong->ma_phuong == $item->ma_phuong ? 'selected' : '')
                                            <option value="{{ $item->ma_phuong }}" {{ $selected }}>
                                                {{ $item->ten_phuong }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="dia_chi">Địa chỉ</label>
                                    <input class="form-control" id="dia_chi" type="text" name="dia_chi"
                                           placeholder="Nhập vào địa chỉ" value="{{ $profile->dia_chi }}">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="email">Email</label>
                                <input class="form-control" id="email" type="email" name="email"
                                       placeholder="Nhập vào địa chỉ Email" value="{{ $profile->email }}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="phone">Số điện thoại</label>
                                    <input class="form-control" id="phone" type="tel" name="sdt"
                                           placeholder="0912345678" value="{{ $profile->sdt }}">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="cccd">Căn cước công dân</label>
                                    <input class="form-control" id="cccd" type="text" name="cccd"
                                           placeholder="Nhập vào số căn cước công dân" value="{{ $profile->cccd }}">
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="main-btn" type="submit">Lưu thông tin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/profile.js') }}"
@endsection
