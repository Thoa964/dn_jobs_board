@php
    $companyRoute = [
        'Quản lý doanh nghiệp',
        'Doanh nghiệp cần phê duyệt'
    ];
@endphp

<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if($currentRouteName == 'Trang thống kê') active @endif">
        <a class="nav-link" href="{{ route('Trang thống kê') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang thống kê</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if($currentRouteName == 'Quản lý người dùng') active @endif">
        <a class="nav-link" href="{{ route('Quản lý người dùng') }}">
            <i class="fas fa-user"></i>
            <span>Quản lý người dùng</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item @if(in_array($currentRouteName, $companyRoute)) active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-building"></i>
            <span>Quản lý doanh nghiệp</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="utilities-color.html">Quản lý doanh nghiệp</a>
                <a class="collapse-item @if($currentRouteName = 'Doanh nghiệp cần phê duyệt') active @endif" onclick="event.preventDefault();" href="{{ route('Doanh nghiệp cần phê duyệt') }}">Doanh nghiệp cần<br>phê duyệt</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePost"
           aria-expanded="true" aria-controls="collapsePost">
            <i class="fas fa-newspaper"></i>
            <span>Quản lý bài đăng</span>
        </a>
        <div id="collapsePost" class="collapse" aria-labelledby="headingPost"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="utilities-color.html">Danh sách bài đăng</a>
                <a class="collapse-item" href="utilities-border.html">Bài đăng cần<br>phê duyệt</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
