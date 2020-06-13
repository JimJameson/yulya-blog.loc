$(function () {
    // croppie
    let basic;

    $('#post-file').on('change', function () {
        // let formData = new FormData();
        // formData.append('file', $(this)[0].files[0]);
        $('.modal__post-photo').attr('src', $(this).val());

        basic = $('.modal__post-photo').croppie({
            viewport: {
                width: 200,
                height: 200
            }
        });

        $('.croppie-modal').modal();

        // $.ajax({
        //     url: '/admin/post/croppie',
        //     type: 'POST',
        //     data: formData,
        //     processData: false,
        //     contentType: false,
        //     dataType: 'json',
        //     success: function (res) {
        //         if(res.status == 'success') {
        //             console.log(res);
        //             // $('#post-file').val(res.file_max);
        //             $('.modal__post-photo').attr('src', res.path_max);
        //
        //             basic = $('.modal__post-photo').croppie({
        //                 viewport: {
        //                     width: 200,
        //                     height: 200
        //                 }
        //             });
        //
        //             $('.croppie-modal').modal();
        //         }
        //     },
        //     error: function (e) {
        //         alert(e);
        //     }
        // })

    });

    $('.croppie-modal btn-save').on('click', function () {
        basic.croppie('result', 'base64').then(function (html) {
            $.ajax({
                url: '/admin/post/croppie',
                type: 'POST',
                data: 'photo=' + html,
                dataType: 'json',
                success: function (res) {
                    if(res.status == 'success') {
                        console.log(res);
                        // $('#post-file').val(res.file_max);
                        $('.modal__post-photo').attr('src', res.path_max);

                        basic = $('.modal__post-photo').croppie({
                            viewport: {
                                width: 200,
                                height: 200
                            }
                        });

                        $('.croppie-modal').modal();
                    }
                },
                error: function (e) {
                    alert(e);
                }
            })
        });
        $('.croppie-modal').modal('hide');
    });
    $('.croppie-modal').on('hidden.bs.modal', function () {
        $('.modal__post-photo').croppie('destroy');
    })

});