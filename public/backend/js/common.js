$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 侧边栏收起
    $('[data-role="toggle-navbar"]').click(function () {
        $('body').toggleClass('mini-navbar');
    });

    // 菜单collapse
    $('#menu').find("li.active").closest("ul").addClass("collapse in").closest('li').addClass('active');
    $('#menu').find("li").not(".active").has("ul").children("ul").addClass("collapse");

    $('#menu').find("li").children("a").on("click" + ".collapseMenu", function (e) {

        if ($(this).siblings("ul").length) {
            e.preventDefault();
        }
        $(this).parent("li").toggleClass("active").children("ul").collapse("toggle");

        $(this).parent("li").siblings().removeClass("active").children("ul.in").collapse("hide");

    });

    // 列表删除
    $('[data-role="confirm"]').confirm({
        text: '你确定要进行此操作吗？',
        confirmButton: "确认",
        cancelButton: "取消",
        confirm: function (button) {
            if (button.is('a')) {
                location.href = button.attr('href');
            } else {
                button.closest('form').submit();
            }
        }
    });

    // 执行批量操作
    $('#confirm_action').on('click', function () {
        var me = $(this);
        if ($('[name="action"]').val() == '') {
            $.alert('你还没有选择执行动作');
            return false;
        }

        if ($('#checked_id').val() == '') {
            $.alert('你还没有选择批量操作项');
            return false;
        }

        $.confirm({
            text: '你确定要进行此操作吗？',
            confirmButton: "确认",
            cancelButton: "取消",
            confirm: function () {
                me.closest('form').submit();
            }
        });
        return false;

    });

    /**
     * 上传文件
     */
    $('#upload-file').on('change', function () {
        var $me = $(this);
        var files = this.files;
        if (files.length < 1) {
            return;
        }
        var formData = new FormData();
        formData.append('file', files[0]);
        if ($me.data('dir')) {
            formData.append('dir', $me.data('dir'));
        }
        $.ajax({
            url: $me.data('url'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                if (result.success) {
                    $me.closest('.input-group').find('input[type="text"]').val(result.file);
                    $me.closest('.input-group').find('input[type="hidden"]').val(result.file);
                }
            },
            error: function () {
                console.log('上传文件出错');
            }
        })
    })

});