$('.nise-select').on('change', function(){
	var user_site_id = $(this).find("option:selected").attr('data-siteid')
    $.ajax({
        type: "POST",
        url: "/include/ajax/user-site-id.php",
        data: {user_site_id: user_site_id},
        success: function(result){
            console.log('user_site_id: '+user_site_id);
            location.reload();
        }
    });
});


$('.btn-close').on('click', function(){
    $(this).closest('.modal').fadeOut(300);
})

$('.modal').mouseup(function (e){ // событие клика по веб-документу
    var div = $(".modal__wrap"); // тут указываем ID элемента
    if (!div.is(e.target) // если клик был не по нашему блоку
        && div.has(e.target).length === 0) { // и не по его дочерним элементам
        $('.modal').fadeOut(300);
    }
});

$('.logo-down input').on('change', function() {
	$input = $(this);
	if($input.val().length > 0) {
		fileReader = new FileReader();
		fileReader.onload = function (data) {
		$('#image_upload_preview').attr('src', data.target.result);
		}
		fileReader.readAsDataURL($input.prop('files')[0]);
	}
});