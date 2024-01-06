$(document).ready(function (){
    let waiting = false

    const $btnUpload = $('#btn_upload');
    const $quanSelect = $('#quan');
    const $phuongSelect = $('#phuong');

    $btnUpload.click(function () {
        const $avatar = $('#upload_avatar');
        $avatar.trigger('click')
        $avatar.on('change', function () {
            let reader = new FileReader()
            reader.onload = (e) => {
                $('#avatar_preview').attr('src', e.target.result)
            }

            reader.readAsDataURL(this.files[0])

            if(!waiting && $(this).attr('src') !== '') {
                waiting = true
                $btnUpload.prop('disabled', true);

                $.ajax({
                    url: '/profile/avatar',
                    type: 'POST',
                    data: new FormData($('#frm_avatar')[0]),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#avatar').attr('src', '/upload/avatar/' + data)
                        waiting = false
                        $btnUpload.prop('disabled', false);
                        showToast("Cập nhật avatar thành công", "linear-gradient(to right, rgb(0, 176, 155), rgb(150, 201, 61))");
                    },
                    error: function (xhr, status, error) {
                        waiting = false
                        $btnUpload.prop('disabled', false);
                        showToast(xhr.responseJSON.message, "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))");
                    }
                })
            }
        })
    })
    $quanSelect.on('change', function () {
        const token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/ward',
            type: 'POST',
            data: {
                'quan_id': $(this).val(),
                '_token': token
            },
            success: function (data) {
                $phuongSelect.html(data)
            }
        })
    })
})
