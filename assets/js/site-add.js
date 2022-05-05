$("#site-add").submit(function(){
    //var str = $(this).serialize();
    //var marketname = $('#market-name').html();

    var $that = $(this),
    formData = new FormData($that.get(0));
    $.ajax({
        contentType: false, // важно - убираем форматирование данных по умолчанию
        processData: false, // важно - убираем преобразование строк по умолчанию
        type: "POST",
        url: "/include/ajax/site-add.php",
        data: formData,
        dataType: 'json',
        success: function(result){
            console.log(result);
            if(result.type=='success'){
                $('#site-mess').html('<p style="margin-top: 30px;">'+result.mess+'</p>');
                setTimeout(function(){
                    location="/site/";
                },1500);
            }else{
                $('#site-mess').html('<p style="margin-top: 30px;">'+result.mess+'</p>');
            }
        }
    });
    return false;
});
