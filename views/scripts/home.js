$(function(){
    $('.login-btn').click(function(){
        $('.form-control').removeClass('error_field'),
        $('span.err_span').remove();
        $('.container .alert').addClass('hidden');
        $('.container .alert span').html('');
        var dataObj = {
                login : $('#login-email').val(),
                password : $('#login-password').val(),
        };
       
        $.ajax({
            type: "POST",
            url: ajax+'login',
            data: 'data='+Base64.encode(JSON.stringify(dataObj))
       }).done(function(msg){
            var data = JSON.parse(msg);
            if(data.error=="" && data.error_login=="" && data.error_password==""){
                location.reload();
            }
            else{
                if(data.error!=""){
                    $('.container .alert').removeClass('hidden');
                    $('.container .alert span').html('<span class="glyphicon glyphicon-exclamation-sign"></span> ' + data.error);
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
    if(user_id!=""){
        tinymce.init({
              selector: '#edit_story',
              height: 300,
              theme: 'modern',
              language: lang,
              plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
              ],
              toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
              toolbar2: 'print preview media | forecolor backcolor emoticons',
              image_advtab: true,


        });
    }
});