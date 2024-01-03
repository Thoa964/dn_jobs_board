@extends('layouts.app')

@section('content')
    <div class="input-group mb-3 rounded-pill border border-primary bg-light p-3">
        <form action="{{ route('Tìm kiếm') }}" method="get" class="w-100 d-flex gap-2 justify-content-between align-items-center">
            <div class="col-6 d-flex gap-1 align-items-center">
                <img style="width: 2rem;"
                     src="{{ asset('img/icon/search-icon.svg') }}"
                     alt="Search icon">
                <input type="text" class="form-control rounded-pill border-0 bg-white"
                       name="keyword" id="keyword" placeholder="{{ __('intro.search') }}">
            </div>
            <div class="col-2 d-flex align-items-center">
                <select name="ma_quan" class="form-select rounded-pill border-0 text-primary" id="quan">
                    <option value="">-- Chọn quận --</option>
                    @foreach($quan as $item)
                        <option value="{{ $item->ma_quan }}">{{ $item->ten_quan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3 d-flex">
                <select name="work_type" class="form-select rounded-pill border-0 text-primary" id="work_type">
                    <option value="">-- Hình thức làm việc --</option>
                    @foreach($workType as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-1">
                <button class="btn btn-primary rounded-pill">Search</button>
            </div>
        </form>
    </div>
    @include('job_list')
@endsection
