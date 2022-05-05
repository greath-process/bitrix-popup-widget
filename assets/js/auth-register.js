$("#auth-form").submit(function(){
    $.ajax({
        type: "POST",
        url: "/include/ajax/auth.php",
        data: $(this).serialize(),
        dataType: 'json',
        success: function(result){
            if(result.type=='success'){
            	//$('#reg-message').css('color','green');
            	$('#auth-message').html('');
            	window.location = "/";
                //location.reload();
            }else{
                $('#auth-message').html(result.mess);
            }
        }
    });
    return false;
});
$("#register-form").submit(function(){
    $.ajax({
        type: "POST",
        url: "/include/ajax/register.php",
        data: $(this).serialize(),
        dataType: 'json',
        success: function(result){
            if(result.type=='success'){
                $('input[name=name]').val('');
                $('input[name=email]').val('');
                $('input[name=password]').val('');
                $('#reg-message').css('color','green');
                $('#reg-message').html(result.mess);
            }else{
                $('#reg-message').html(result.mess);
            }
        }
    });
    return false;
});