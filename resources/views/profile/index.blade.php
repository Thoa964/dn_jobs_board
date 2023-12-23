@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="{{ asset($profile->avatar_path) }}" alt="avatar"
                         class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">{{ $profile->gender }}</h5>
                    @php($diaChi = sprintf("%s - %s", $profile->ten_phuong, $profile->dia_chi))
                    <p class="text-muted mb-4">{{ $profile->cccd }}</p>
                    <div class="d-flex justify-content-center mb-2">
                        <a href="{{ route('Cập nhật thông tin cá nhân') }}" class="main-btn">{{ __('profile.update') }}</a>
                        <a href="{{ route('Hồ sơ') }}" type="button" class="main-outline-btn ms-1">{{ __('profile.profile') }}</a>
                    </div>
                </div>
            </div>
            <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fas fa-globe fa-lg text-warning"></i>
                            <p class="mb-0">https://mdbootstrap.com</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                            <p class="mb-0">mdbootstrap</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                            <p class="mb-0">@mdbootstrap</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                            <p class="mb-0">mdbootstrap</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                            <p class="mb-0">mdbootstrap</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">{{ __('profile.full_name') }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $profile->ten }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">{{ __('profile.email') }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $profile->email }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">{{ __('profile.phone') }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $profile->sdt }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">{{ __('profile.address') }}</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $diaChi }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                            <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                            </p>
                            <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                            <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                            <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                            <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                            <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                            <div class="progress rounded mb-2" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                            <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                            </p>
                            <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                            <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                            <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                            <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                            <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                            <div class="progress rounded mb-2" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
