@extends('mails.template')

@php($title = 'Đơn ứng tuyển công việc của bạn bị từ chối')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div style="background-color: #f5f5f5; padding: 20px;">
        <h1 style="text-align: center; margin-top: 20px;">Xin chia buồn, {{ $user->ten }}!</h1>
        <p style="text-align: center; font-size: 18px; margin-top: 10px;">{{ $title }}!</p>
    </div>

    <div style="background-color: #fff; padding: 20px; border-radius: 10px; margin: 20px auto;">
        <p>Đơn ứng tuyển vào công việc <a href="{{ route('Chi tiết công việc', $job->ma_bai_dang) }}">{{ $job->tieu_de }}</a> của bạn vừa bị từ chối</p>

        <h3 style="margin-top: 20px;">Các bước tiếp theo:</h3>
        <ul>
            <li>Bạn có thể xem danh sách các công việc khác tại <a href="{{ route('Trang chủ') }}">đây</a>.</li>
            <li>Tìm kiếm công việc phù hợp.</li>
            <li>Ứng tuyển công việc yêu thích.</li>
        </ul>

        <p style="margin-top: 20px;">Chùng tôi xin chia buồn vì công việc hiện tại không phù hợp với bạn, cảm ơn bạn đã sử dụng dịch vụ.</p>

        <p>Trân trọng,<br>
            {{ config('app.name') }}</p>
    </div>
@endsection
