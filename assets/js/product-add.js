$("#product-add").submit(function(){
    //var str = $(this).serialize();
    //var marketname = $('#market-name').html();
    $('#product-name').val($('#product-name-span').text());
    var str = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "/include/ajax/product-add.php",
        data: str,
        dataType: 'json',
        success: function(result){
            console.log(result);
            if(result.type=='success'){
            	$('#product-add-mess').css('display','inline-block');
                $('#product-add-mess').html(result.mess);
                setTimeout(function(){
                    location="/catalog/";
                },1500);
            }else{
            	$('#product-add-mess').css('display','inline-block');
                $('#product-add-mess').html(result.mess);
            }
        }
    });
    return false;
});
