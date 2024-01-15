@extends('admin.layout._master')

@section('title')
    Trang thống kê
@endsection

@section('heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Trang thống kê</h1>
    </div>
@endsection

@section('content')
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Số người dùng mới (Tháng)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['newUsers'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-person-circle-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Số lượng bài đăng mới (Tháng)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['newPosts'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-hourglass-half fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tỉ lệ phê duyệt
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    @php($percentage = $data['applySuccessCount'] != 0 ? $data['applyCount'] / $data['applySuccessCount'] * 100 : 0)
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $percentage }}%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                             style="width: {{ $percentage }}%" aria-valuenow="$percentage" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Số lượng doanh nghiệp chờ phê duyệt</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['companyPendingCount'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-hourglass-half fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">
        <div class="card w-100">
            <div class="card-header">
                Top 5 doanh nghiệp có nhiều bài đăng nhất
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên doanh nghiệp</th>
                        <th scope="col">Ngày đăng ký</th>
                        <th scope="col" class="text-center">Số lượng bài đăng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($data['topFiveCompanies'] as $company)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $company->ten }}</td>
                            <td>{{ $company->ngay_hoat_dong }}</td>
                            <td class="text-center">{{ $company->danh_sach_bai_dang_count }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
