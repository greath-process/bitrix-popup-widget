$(".site-del").click(function(){
    $('#siteid-input').val($(this).data('siteid'));
    $('#delete-modal').fadeIn();
    return false;
});

$("#site-del").submit(function(){

    var $that = $(this),
    formData = new FormData($that.get(0));
    $.ajax({
        contentType: false, // важно - убираем форматирование данных по умолчанию
        processData: false, // важно - убираем преобразование строк по умолчанию
        type: "POST",
        url: "/include/ajax/site-del.php",
        data: formData,
        dataType: 'json',
        success: function(result){
            console.log(result);
            if(result.type=='success'){
                location="/site/";
            }else{
                $('#delete-modal').fadeOut();
            }
        }
    });
    return false;
});



$('.site-settings').on('click', function(){
    var user_site_id = $(this).data('siteid');
    $.ajax({
        type: "POST",
        url: "/include/ajax/user-site-id.php",
        data: {user_site_id: user_site_id},
        success: function(result){
            console.log('user_site_id: '+user_site_id);
            location.href = '/market/';
        }
    });
});