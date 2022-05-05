$("#market-add").submit(function(){
    //var str = $(this).serialize();
    //var marketname = $('#market-name').html();
    $('#market-name').val($('#market-name-span').text());
    var $that = $(this),
    formData = new FormData($that.get(0));
    $.ajax({
        contentType: false, // важно - убираем форматирование данных по умолчанию
        processData: false, // важно - убираем преобразование строк по умолчанию
        type: "POST",
        url: "/include/ajax/market-add.php",
        data: formData,
        dataType: 'json',
        success: function(result){
            console.log(result);
            if(result.type=='success'){
                $('#market-mess').html('<p style="margin-top: 30px;">'+result.mess+'</p>');
                setTimeout(function(){
                    location="/market/";
                },1500);
            }else{
                $('#market-mess').html('<p style="margin-top: 30px;">'+result.mess+'</p>');
            }
        }
    });
    return false;
});
