$(function(){
    $('.recovery_pass').click(function(){
        $('.form-control').removeClass('error_field'),
        $('span.err_span').remove();
        var dataObj = {
                password : $('#forgot-password').val(),
                confirm_pass : $('#forgot-confirm-password').val(),
                get: $('#get').val()
        };
        $.ajax({
            type: "POST",
            url:'/ajax.php?recovery-password',
            data: 'data='+Base64.encode(JSON.stringify(dataObj))
       }).done(function(msg){
                        var data = JSON.parse(msg);
                        $.each(data, function(k,v){
                        if(k=="success" || k=="error"){
                           $('.vertical_center').html('<div class="big_text">'+v+'</div>');
                        }        
                        else{
                           $(k).addClass('error_field');
                           $(k).after('<span class="err_span">'+v+'</span>');
                           $(k).attr("autofocus","autofocus");
                        }
                    });
        });
    })
});