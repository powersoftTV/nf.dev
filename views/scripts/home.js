$(function(){
    $('.login-btn').click(function(){
        $('.form-control').removeClass('error_field'),
        $('span.err_span').remove();
        $('.alert').addClass('hidden');
        $('.alert span').html('');
        var dataObj = {
                login : $('#login-email').val(),
                password : $('#login-password').val(),
        };
        $.ajax({
            type: "POST",
            url:'/ajax.php?login',
            data: 'data='+Base64.encode(JSON.stringify(dataObj))
       }).done(function(msg){
            var data = JSON.parse(msg);
            if(data.error=="" && data.error_login=="" && data.error_password==""){
                location.reload();
            }
            else{
                if(data.error!=""){
                    $('.alert').removeClass('hidden');
                    $('.alert span').html('<span class="glyphicon glyphicon-exclamation-sign"></span> ' + data.error);
                }
                else{
                    if(data.error_login!=""){
                        $('#login-email').addClass('error_field');
                        $('#login-email').after('<span class="err_span">'+data.error_login+'</span>');
                        $('#login-email').attr("autofocus","autofocus");
                    }
                    if(data.error_password!=""){
                        $('#login-password').addClass('error_field');
                        $('#login-password').after('<span class="err_span">'+data.error_password+'</span>');
                        $('#login-password').attr("autofocus","autofocus");
                    }
                }
            }
        });
    });  
});