$(document).ready(function () {
    // формирование скрипта для вставки
    $("body").on('change', 'input', function () {
        let block = $(this).parents('.vibor__content__item');
        let type = block.attr('id'),
            id = $('#widget_id').val(),
            params = '';
        params = '		id: "' + id + '", ' + '\r\n';
        params += '		type: "' + type + '", ' + '\r\n';
        block.find('input').each(function (i, elem) {
            var itm = $(this).val();
            if (itm.indexOf('"') > -1)
                itm = itm.replace(new RegExp('"', 'g'), '\\"');
            if ($(this).attr('type') == 'checkbox' && $(this).prop('checked') == false || $(this).attr('name') == '' || $(this).attr('name') == undefined) return;
            if ($(this).attr('name') != undefined) params += '		' + $(this).attr('name') + ': "' + itm + '", ' + '\r\n';
        });
        block.find('.copy-text').text('<div data-widget-id="' + id + '"></div>' + '\r\n' + '<script async src="https://richlink.ru/assets/js/widget.js"></script>' + '\r\n' + '<script type="text/javascript">' + '\r\n' + '$(document).ready(function() {' + '\r\n' + '	Widget_initialization({' + '\r\n' + params + '	});' + '\r\n' + '});' + '\r\n' + '</script>');
    });

    $("body").on('click', '.btn-red', function () {
        $.ajax({
            type: "POST",
            data: { 'update': 'status' },
            success: function (html) {
                $('#proverka__wrap').html(html);
            }
        });
    });

    $('#file').change(function (e) {
        var elem = $(this),
            files = e.target.files,
            preview = $(this).parent().siblings(),
            logo = $('.vidget-v__bot__img img');

        for (var i = 0, file; file = files[i]; i++) {
            var reader = new FileReader();
            reader.onload = function (theFile) {
                var image = new Image();
                image.onload = function () {
                };
                image.src = theFile.target.result;
                preview.attr('src', image.src);
                logo.attr('src', image.src);
            };
            reader.readAsDataURL(file);
        }

        var file_data = $('#file').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: '/include/ajax/save-photo.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (php_script_response) {
                $('#file').siblings('input').val(php_script_response);
            }
        });
    });

    $('#square_file').change(function (e) {
        var elem = $(this),
            files = e.target.files,
            big_preview = $('.logo-change.big img'),
            logo = $('.vidget-v__img img');
        var check = 'Y';
        for (var i = 0, file; file = files[i]; i++) {
            var reader = new FileReader();
            reader.onload = function (theFile) {
                var image = new Image();
                image.onload = function () {
                    console.log('loaded');
                    if (this.width > 180 || this.height > 180) {
                        var limit = (this.width > 180) ? 'Ширина' : 'Высота';
                        alert(limit + ' картинки превышает 180px');
                        check = 'N';
                    }
                };
                if (check != 'N') {
                    image.src = theFile.target.result;
                    big_preview.attr('src', image.src);
                    logo.attr('src', image.src);

                    var file_data = $('#square_file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: '/include/ajax/save-photo.php',
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (php_script_response) {
                            $('#square_file').siblings('input').val(php_script_response);
                        }
                    });
                }
            };
            reader.readAsDataURL(file);
        }
        if (check == 'N') {
            $('#square_file').val(null);
            big_preview.attr('src', '/assets/img/vidget/img-block2.jpg');
        }
    });


    $('.vibor__item, .shag__title').click(function (e) {
        $(this).find('input:eq(0)').change();
    });
});