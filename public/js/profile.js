$(document).ready(function (){
    const btnCapNhatHoSo = $('#cap_nhat_ho_so')
    const addCertificateForm = $('#addCertificateForm')
    const addSkillForm = $('#addSkillForm')
    const kyNangList = $('#kyNangList')
    const bangCapList = $('#bangCapList')
    const modal = $('.modal')

    modal.on('shown.bs.modal', function () {
        modal.find('button[type="submit"]').prop('disabled', false)
    })

    btnCapNhatHoSo.click(function () {
        const text = $(this).text()
        const input = $('#inputIntro')

        if (text !== "Lưu") {
            btnCapNhatHoSo.text("Lưu")
            input.prop('disabled', false)
        } else {
            const token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/ho-so',
                type: 'POST',
                data: {
                    'gioi_thieu': input.val(),
                    '_token': token
                },
                success: function (data) {
                    btnCapNhatHoSo.text("Cập nhật hồ sơ")
                    $('#inputIntro').prop('disabled', true)
                    showToast("Cập nhật hồ sơ thành công", "linear-gradient(to right, rgb(0, 176, 155), rgb(150, 201, 61))");
                    location.reload()
                },
                error: function (xhr, status, error) {
                    showToast(xhr.responseJSON.message, "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))");
                }
            })
        }
    })

    addCertificateForm.submit(function (e) {
        e.preventDefault();
        const data = $(this).serialize();

        $.ajax({
            url: '/ho-so/bang-cap',
            type: 'POST',
            data: data,
            success: function (data) {
                let html = `
                    <div class="d-flex justify-content-between align-items-center mb-2 item">
                        <span>${data.ten_bang_cap}</span>
                        <div class="d-flex align-items-center">
                            <span>${data.ngay_cap_bang}</span>
                            <i class="fas fa-trash text-danger ms-3 delete-bang-cap" style="cursor: pointer;"
                               data-id="${data.id}"></i>
                        </div>
                    </div>
                `
                bangCapList.append(html)
                $('#addCertificateModal').modal('hide');
                let $btnSubmit = $(this).find('button[type="submit"]');
                $btnSubmit.prop('disabled', true);
                showToast("Thêm bảng cấp thành công", "linear-gradient(to right, rgb(0, 176, 155), rgb(150, 201, 61))");
            },
            error: function (xhr, status, error) {
                showToast(xhr.responseJSON.message, "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))");
            }
        })
    })

    addSkillForm.submit(function (e) {
        e.preventDefault();
        const data = $(this).serialize();

        $.ajax({
            url: '/ho-so/ky-nang',
            type: 'POST',
            data: data,
            success: function (data) {
                let html = `
                    <div class="d-flex justify-content-between mb-2 item">
                        <span>${data.ten_ky_nang}</span>
                        <div class="d-flex align-items-center">
                            <span>${data.so_nam_kinh_nghiem} Năm</span>
                            <i class="fas fa-trash text-danger ms-3 delete-ky-nang" style="cursor: pointer;"
                               data-id="${data.id}"></i>
                        </div>
                    </div>
                `
                kyNangList.append(html)
                $('#addSkillModal').modal('hide');
                let $btnSubmit = $(this).find('button[type="submit"]');
                $btnSubmit.prop('disabled', true);
                showToast("Thêm kỹ năng thành công", "linear-gradient(to right, rgb(0, 176, 155), rgb(150, 201, 61))");
            },
            error: function (xhr, status, error) {
                showToast(xhr.responseJSON.message, "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))");
            }
        })
    })

    function deleteSkill(e) {
        const target = $(e.target)
        const id = target.data('id');
        const title = target.data('title');

        if(confirm(`Bạn có chắc bạn muốn xóa bằng "${title}"?`)) {
            $.ajax({
                url: `/ho-so/ky-nang/${id}`,
                type: 'DELETE',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'type': 'delete'
                },
                success: function () {
                    $('body').find(target).closest('div.item').remove();
                    showToast("Xóa kỹ năng thành công", "linear-gradient(to right, rgb(0, 176, 155), rgb(150, 201, 61))");
                },
                error: function (xhr, status, error) {
                    showToast(xhr.responseJSON.message, "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))");
                }
            })
        }
    }

    function deleteCertificate(e) {
        const target = $(e.target)
        const id = target.data('id');
        const title = target.data('title');

        if (confirm(`Bạn có chắc bạn muốn xóa kỹ năng "${title}"?`)) {
            $.ajax({
                url: `/ho-so/bang-cap/${id}`,
                type: 'DELETE',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'type': 'delete'
                },
                success: function () {
                    console.log(bangCapList.children().find(target).closest('div.item'))
                    $('body').find(target).closest('div.item').remove();
                    showToast("Xóa bằng cấp thành công", "linear-gradient(to right, rgb(0, 176, 155), rgb(150, 201, 61))");
                },
                error: function (xhr, status, error) {
                    showToast(xhr.responseJSON.message, "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))");
                }
            })
        }
    }

    $(document).on('click', 'i.delete-ky-nang', deleteSkill)
    $(document).on('click', 'i.delete-bang-cap', deleteCertificate)
})
