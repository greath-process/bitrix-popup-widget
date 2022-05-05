$("#product-edit").submit(function(){
    //var str = $(this).serialize();
    //var marketname = $('#market-name').html();
    $('#product-name').val($('#product-name-span').text());
    var str = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "/include/ajax/product-edit.php",
        data: str,
        dataType: 'json',
        success: function(result){
            console.log(result);
            if(result.type=='success'){
            	$('#product-edit-mess').css('display','inline-block');
                $('#product-edit-mess').html(result.mess);
                setTimeout(function(){
                    location="/catalog/";
                },1500);
            }else{
            	$('#product-edit-mess').css('display','inline-block');
                $('#product-edit-mess').html(result.mess);
            }
        }
    });
    return false;
});
