@extends('mails.template')

@php($title = 'Đơn ứng tuyển công việc của bạn vừa được phê duyệt')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div style="background-color: #f5f5f5; padding: 20px;">
        <h1 style="text-align: center; margin-top: 20px;">Xin chúc mừng, {{ $user->ten }}!</h1>
        <p style="text-align: center; font-size: 18px; margin-top: 10px;">{{ $title }}!</p>
    </div>

    <div style="background-color: #fff; padding: 20px; border-radius: 10px; margin: 20px auto;">
        <p>Đơn ứng tuyển vào công việc {{ $job->tieu_de }} của bạn vừa được phê duyệt</p>

        <h3 style="margin-top: 20px;">Các bước tiếp theo:</h3>
        <ul>
            <li>Xem lại thông tin công việc tại <a href="{{ route('Chi tiết công việc', $job->ma_bai_dang) }}">đây</a>.</li>
            <li>Liên hệ với bộ phận nhân sự của công ty {{ $job->author->ten_cong_ty }}.</li>
            <li>Hẹn lịch phỏng vấn.</li>
        </ul>

        <p style="margin-top: 20px;">Chúc bạn nhận được công việc phù hợp với yêu cầu cá nhân, cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>

        <p>Trân trọng,<br>
            {{ config('app.name') }}</p>
    </div>
@endsection
