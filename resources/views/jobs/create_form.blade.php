<div class="container">
    <h3>Bài đăng tuyển dụng</h3>
    <form action="{{ route('Lưu bài đăng') }}" method="POST" class="d-flex flex-column gap-3">
        @csrf
        <div class="form-group">
            <label for="inputTitle">Tiêu đề</label>
            <input type="text" class="form-control" id="inputTitle" name="tieu_de" placeholder="Tiêu đề">
        </div>
        <div class="form-group">
            <label for="inputContent">Mô tả</label>
            <textarea class="form-control" id="inputContent" rows="3" name="mo_ta" placeholder="Nội dung"></textarea>
        </div>
        <div class="form-group">
            <div class="d-flex gap-2 align-items-center">
                <div class="w-50">
                    <label for="inputCareer">Ngành nghề</label>
                    <select name="ma_nganh_nghe" id="inputCareer" class="form-select">
                        <option value="">--Chọn ngành nghề--</option>
                        @foreach($nganhNghe as $item)
                            <option value="{{ $item->ma_nganh_nghe }}">
                                {{ $item->ten_nganh_nghe }}
                            </option>
                        @endforeach
                        <option value="other">Khác</option>
                    </select>
                    <input type="text" class="form-control" id="inputOtherCareer" name="other_career"
                           placeholder="Nhập ngành nghề khác" style="display: none;">
                </div>
                <div class="w-25">
                    <label for="inputChucVu">Chức vụ</label>
                    <input class="form-control" id="inputChucVu" name="chuc_vu" placeholder="Chuyên viên - nhân viên">
                </div>
                <div class="w-25">
                    <label for="inputExperienceRequired">Yêu cầu kinh nghiệm</label>
                    <input class="form-control" id="inputExperienceRequired" name="kinh_nghiem" placeholder="1-3 năm kinh nghiệm">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="d-flex gap-2 align-items-center">
                <div class="w-25">
                    <label for="inputStartTime">Thời gian bắt đầu</label>
                    <input class="form-control" type="date" id="inputStartTime" min="{{ now()->format('Y-m-d') }}"
                           name="thoi_gian_bat_dau" placeholder="01/01/2024" onchange="setMinDate()">
                </div>
                <span class="mt-4">~</span>
                <div class="w-25">
                    <label for="inputEndTime">Thời gian kết thúc</label>
                    <input class="form-control" type="date" id="inputEndTime" name="thoi_gian_ket_thuc" placeholder="31/01/2024">
                </div>
                <div class="w-25">
                    <label for="inputWorkType">Hình thức làm việc</label>
                    <select class="form-select" name="hinh_thuc_lam_viec" id="inputWorkType">
                        <option value="">-- Hình thức làm việc --</option>
                        @foreach($workType as $key => $value)
                            <option value="{{ $key }}">
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-25">
                    <label for="inputQuantity">Số lượng</label>
                    <input class="form-control" type="number" id="inputQuantity" name="so_luong">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputRequirement">Yêu cầu ứng viên</label>
            <textarea class="form-control" id="inputRequirement" rows="3" name="yeu_cau_ung_vien"
                      placeholder="Yêu cầu ứng viên"></textarea>
        </div>
        <div class="form-group">
            <label for="inputBenefit">Quyền lợi</label>
            <textarea class="form-control" id="inputBenefit" rows="3" name="quyen_loi" placeholder="Quyền lợi"></textarea>
        </div>
        <div class="form-group">
            <label for="inputCachThucUngTuyen">Cách thức ứng tuyển</label>
            <textarea class="form-control" id="inputCachThucUngTuyen" rows="3" name="cach_thuc_ung_tuyen"
                      placeholder="Cách thức ứng tuyển"></textarea>
        </div>
        <div class="form-group">
            <label for="inputAddress">Địa chỉ</label>
            <div class="d-flex gap-2">
                <select class="form-select w-25" id="quan" name="quan">
                    <option value="">-- Chọn quận --</option>
                    @foreach($quan as $item)
                        <option value="{{ $item->ma_quan }}">
                            {{ $item->ten_quan }}
                        </option>
                    @endforeach
                </select>
                <select class="form-select w-25" id="phuong" name="ma_phuong">
                    <option value="">-- Chọn phường --</option>
                    @foreach($phuong ?? [] as $item)
                        <option value="{{ $item->ma_phuong }}">
                            {{ $item->ten_phuong }}
                        </option>
                    @endforeach
                </select>
                <input class="form-control" id="inputAddress" name="dia_chi" placeholder="Địa chỉ">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Tuyến dụng</button>
        </div>
    </form>
    <script src="{{ asset('js/create_bai_dang.js') }}"></script>
    <script src="{{ asset('js/update_profile.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#inputCareer').change(function () {
                if ($(this).val() === 'other') {
                    $('#createModal').modal('show');
                }
            });
            let $formAddNganhNghe = $('#formAddNganhNghe');
            $formAddNganhNghe.submit(function (e){
                e.preventDefault();

                const newCareerInputValue = $('#ten_nganh_nghe').val();

                $.ajax({
                    type: 'POST',
                    url: '{{ route("Tạo mới ngành nghề") }}',
                    data: $formAddNganhNghe.serialize(),
                    success: function (response) {
                        let $inputCareer = $('#inputCareer');
                        $('<option value="' + response.id + '">' + newCareerInputValue + '</option>')
                            .insertBefore('#inputCareer option[value="other"]');
                        $inputCareer.val(response.id);
                        $('#createModal').modal('hide');
                        $('.modal').find('input:not([type="hidden"])').val("")
                    },
                    error: function (error) {
                        console.log('error', error.responseJSON.message);
                    }
                });
            })
            $('#saveNewCareer').click(function () {
                $formAddNganhNghe.trigger('submit');
            });
        });
    </script>
</div>

<div class="modal" id="createModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Add your modal content here -->
            <div class="modal-header">
                <h5 class="modal-title">Tạo mới ngành nghề</h5>
                <i class="fa fa-times" data-bs-dismiss="modal" style="cursor: pointer;"></i>
            </div>
            <div class="modal-body">
                <form action="{{ route('Tạo mới ngành nghề') }}" method="POST" id="formAddNganhNghe">
                    @csrf
                    <label for="ten_nganh_nghe">Tên ngành nghề</label>
                    <input type="text" class="form-control" id="ten_nganh_nghe" name="ten_nganh_nghe" placeholder="Tên ngành nghề">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="saveNewCareer">Lưu</button>
            </div>
        </div>
    </div>
</div>
