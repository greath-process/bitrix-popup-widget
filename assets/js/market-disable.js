$('.market-list').change(function() {

    var marketid = $(this).data('elementid');
    if (this.checked) {
        var check = 'enable';
    } else {
        var check = 'disable';
    }

    $.ajax({
        type: "POST",
        url: "/include/ajax/market-disable.php",
        data: {marketid: marketid, check: check},
        dataType: 'json',
        success: function(result){
            if(result.type=='error'){
                alert('Ошибка.');
            }
        }
    });
    return false;

});