$(".market-del").click(function(){
    $('#marketid-input').val($(this).data('marketid'));
    $('#delete-modal').fadeIn();
    return false;
});

$("#market-del").submit(function(){

    var $that = $(this),
    formData = new FormData($that.get(0));
    $.ajax({
        contentType: false, // важно - убираем форматирование данных по умолчанию
        processData: false, // важно - убираем преобразование строк по умолчанию
        type: "POST",
        url: "/include/ajax/market-del.php",
        data: formData,
        dataType: 'json',
        success: function(result){
            console.log(result);
            if(result.type=='success'){
                location="/market/";
            }else{
                $('#delete-modal').fadeOut();
            }
        }
    });
    return false;
});



