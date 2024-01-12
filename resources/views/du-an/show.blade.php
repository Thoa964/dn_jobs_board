@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title mb-0">{{ $duAn->ten_du_an }}</h2>
                <small>{{ $duAn->thoi_gian_bat_dau }} ~ {{ $duAn->thoi_gian_ket_thuc }}</small>
            </div>
            <div class="card-body d-flex flex-column gap-3">
                <div class="row">
                    <h5>Mô tả:</h5>
                    <div class="col">
                        {!! $duAn->mo_ta !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
