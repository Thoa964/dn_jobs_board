@extends('mails.template')

@php($title = 'Đăng ký doanh nghiệp của bạn đã được chấp thuận')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div style="background-color: #f5f5f5; padding: 20px;">
        <h1 style="text-align: center; margin-top: 20px;">Xin chúc mừng, {{ $companyName }}!</h1>
        <p style="text-align: center; font-size: 18px; margin-top: 10px;">{{ $title }}!</p>
    </div>

    <div style="background-color: #fff; padding: 20px; border-radius: 10px; margin: 20px auto;">
        <p>Chúng tôi rất vui mừng chào đón bạn đến với website của chúng tôi. Bây giờ bạn đã sẵn sàng để đăng bài tuyển dụng và tìm kiếm ứng viên phù hợp.</p>

        <h3 style="margin-top: 20px;">Các bước tiếp theo:</h3>
        <ul>
            <li>Vui lòng đăng nhập tại <a href="http://localhost:8000/login"></a>.</li>
            <li>Thiết lập hồ sơ công ty của bạn.</li>
            <li>Khám phá các tài nguyên và công cụ của chúng tôi dành cho doanh nghiệp.</li>
        </ul>

        <img src="{{ asset('images/celebration.gif') }}" alt="Celebration GIF" style="width: 100%; max-width: 300px; margin: 20px auto;">


        <p style="margin-top: 20px;">Chúng tôi luôn sẵn sàng hỗ trợ bạn trong suốt chặng đường. Nếu bạn có bất kỳ câu hỏi nào, xin vui lòng liên hệ với chúng tôi.</p>

        <p>Trân trọng,<br>
            {{ $companyName }}</p>
    </div>
@endsection
