<!--job offers-->
<div class="job-offers pt-4">
    <div class="intro-text">
        <h1>Job <span class="green">list ({{ $danhSachBaiDang->total() }})</span></h1>
        <a href="{{ route('Danh sách công việc') }}">All offers ({{ $danhSachBaiDang->total() }})
            <img style="width: 20px; margin-left: 20px;" src="{{ asset('/img/icon/arrow-right-icon.svg') }}" alt="">
        </a>
        <div class="pt-5">
            <div class="row">
                @forelse($danhSachBaiDang as $baiDang)
                    <div class="offert-wrapper">
                        <div class="offert">
                            <div>
                                <div class="offert-description">
                                    <div class="company-logo">
                                        <img src="{{ asset($baiDang->author->avatar_path) }}" alt="">
                                    </div>
                                    <div class="description">
                                        <p class="company-name">{{ $baiDang->tieu_de }}</p>
                                        <p class="description">{!! $baiDang->author->ten_cong_ty !!}</p>
                                    </div>
                                </div>
                                <div class="offert-meta">
                                    <p class="location">{{ $baiDang->thoi_gian_bat_dau }}
                                        ~ {{ $baiDang->thoi_gian_ket_thuc }}</p>
                                    <p class="offert-counter">Số lượng: <span
                                            class="green"><strong>{{ $baiDang->so_luong }}</strong></span></p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('Chi tiết công việc', ['ma_bai_dang' => $baiDang->ma_bai_dang]) }}" class="main-btn">Xem chi tiết</a>
                    </div>
                @empty
                    <p>Không tìm thấy kết quả nào với từ khóa {{ $keyword ?? '' }}</p>
                @endforelse
                <div class="d-flex justify-content-center">
                    {{ $danhSachBaiDang->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
