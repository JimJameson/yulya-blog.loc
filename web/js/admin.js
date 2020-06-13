// $(function () {
// //     $('.nav-sidebar a').removeClass('active');
// //     $('.nav-sidebar a').each(function () {
// //         let location = window.location.pathname;
// //         let link = this.pathname;
// //         if (link == location) {
// //             $(this).addClass('active');
// //             $(this).closest('.has-treeview > a').addClass('active');
// //         }
// //     })
// // });

$(function () {
    $('.custom-control-input').on('change', function () {
        let status = this.checked ? 0 : 1;
        $.ajax({
            url: '/admin/comment/index',
            data: {status: status},
            type: 'GET',
            success: function (res) {
                $('.comment-table').html(res);
            },
            error: function (e) {
                alert(e);
            }
        });
        return false;
    });
    $('.comment-table').on('click','.comment-change_status', function () {
        let id = $(this).closest('tr').data('key');
        let statusCheckbox = $('#customSwitch1');
        let status = statusCheckbox.attr('checked') ? 0 : 1;
        $.ajax({
            url: '/admin/comment/update',
            data: {id: id, status: status},
            type: 'GET',
            success: function (res) {
                $('.comment-table').html(res);
                console.log('success');
            },
            error: function (e) {
                alert(e);
            }
        });
        return false;
    });
    let $deleteModal = $('#deleteModal');
    $('.comment-table').on('click', '.comment-delete', function () {
        let id = $(this).closest('tr').data('key');
        $deleteModal.modal();
        $(document).on('click', '#modal-delete-btn', function () {
            $deleteModal.modal('hide');
            let statusCheckbox = $('#customSwitch1');
            let status = statusCheckbox.attr('checked') ? 0 : 1;
            $.ajax({
                url: '/admin/comment/delete',
                data: {id: id, status: status},
                type: 'POST',
                success: function (res) {
                    $('.comment-table').html(res);
                    console.log('success');
                },
                error: function (e) {
                    alert(e);
                }
            });
            $(document).off('click', '#modal-delete-btn');
            return false;
        });
    });

    $('#post-publish-disabled').on('click', function () {
        $('#post-is_published').val(0);
    });

    $('#post-publish-enabled').on('click', function () {
        $('#post-is_published').val(1);
    });


});