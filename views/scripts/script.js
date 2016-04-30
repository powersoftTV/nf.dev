
function createCookie(name, value, days) {
        var expires;
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }
        document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/ ;domain="+window.location.hostname;
}
function readCookie(name) {
        var nameEQ = encodeURIComponent(name) + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
        }
        return null;
}
function eraseCookie(name) {
        createCookie(name, "", -1);
    }
    
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    function isPhone(phone) {
        var regex = /^[0-9-+ \(\)]+$/;
        return regex.test(phone);
}
function loading_indicator_offset(){
    //var offset=$('#loading-indicator').offset();
    $('#loading-indicator').css('left',(window.innerWidth/2-21)+'px');
    $('#loading-indicator').css('top',(window.innerHeight/2-21)+'px');
    return true;
} 

var alertTimer; //global timer for notification
function set_alert(msg,type){
    var type = arguments[1] ? arguments[1] : 'info';
    clearTimeout(alertTimer);
    alertTimerTimer = setTimeout(function(){
        $('.alerts').addClass('hidden');},10000); //hide after 10 seconds;
        $('.alerts').removeClass('hidden');
        $('.alert-message .content').html('');
        $('.alert-message .content').append(msg);
        $('.alert-message').removeClass('info warning danger success');
        switch(type){
            case 'success': $('.alert-message').addClass('success'); break;
            case 'warning': $('.alert-message').addClass('warning'); break;
            case 'danger': $('.alert-message').addClass('danger');break;
            default: $('.alert-message').addClass('info');
        }
 }
$('.alert-message .close').click(function(){
    $('.alerts').addClass('hidden');
    $('.alert-message').removeClass('info warning danger success'); 
});

var Base64 = {
    _keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_*~",
	encode : function (input) {
	  var output = "";
	  var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
	  var i = 0
	  input = Base64._utf8_encode(input);
		 while (i < input.length) {
	   chr1 = input.charCodeAt(i++);
		chr2 = input.charCodeAt(i++);
		chr3 = input.charCodeAt(i++);
	   enc1 = chr1 >> 2;
		enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
		enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
		enc4 = chr3 & 63;
	   if( isNaN(chr2) ) {
		   enc3 = enc4 = 64;
		}else if( isNaN(chr3) ){
		  enc4 = 64;
		}
	   output = output +
		this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
		this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);
	 }
	  return output;
	},
 
   
	decode : function (input) {
	  var output = "";
	  var chr1, chr2, chr3;
	  var enc1, enc2, enc3, enc4;
	  var i = 0;
	 //input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
	 input = input.replace(/[^A-Za-z0-9\_\*\~]/g, "");
	 while (i < input.length) {
	   enc1 = this._keyStr.indexOf(input.charAt(i++));
		enc2 = this._keyStr.indexOf(input.charAt(i++));
		enc3 = this._keyStr.indexOf(input.charAt(i++));
		enc4 = this._keyStr.indexOf(input.charAt(i++));
	   chr1 = (enc1 << 2) | (enc2 >> 4);
		chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
		chr3 = ((enc3 & 3) << 6) | enc4;
	   output = output + String.fromCharCode(chr1);
	   if( enc3 != 64 ){
		  output = output + String.fromCharCode(chr2);
		}
		if( enc4 != 64 ) {
		  output = output + String.fromCharCode(chr3);
		}
   }
   output = Base64._utf8_decode(output);
	 return output;
   },
   // 
	_utf8_encode : function (string) {
	  string = string.replace(/\r\n/g,"\n");
	  var utftext = "";
	  for (var n = 0; n < string.length; n++) {
		var c = string.charCodeAt(n);
	   if( c < 128 ){
		  utftext += String.fromCharCode(c);
		}else if( (c > 127) && (c < 2048) ){
		  utftext += String.fromCharCode((c >> 6) | 192);
		  utftext += String.fromCharCode((c & 63) | 128);
		}else {
		  utftext += String.fromCharCode((c >> 12) | 224);
		  utftext += String.fromCharCode(((c >> 6) & 63) | 128);
		  utftext += String.fromCharCode((c & 63) | 128);
		}
	 }
	  return utftext;
 
	},
	
	_utf8_decode : function (utftext) {
	  var string = "";
	  var i = 0;
	  var c = c1 = c2 = 0;
	  while( i < utftext.length ){
		c = utftext.charCodeAt(i);
	   if (c < 128) {
		  string += String.fromCharCode(c);
		  i++;
		}else if( (c > 191) && (c < 224) ) {
		  c2 = utftext.charCodeAt(i+1);
		  string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
		  i += 2;
		}else {
		  c2 = utftext.charCodeAt(i+1);
		  c3 = utftext.charCodeAt(i+2);
		  string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
		  i += 3;
		}
	 }
	 return string;
	}
}

$(window).resize(function() {
     loading_indicator_offset();
});

//var count = 0;
if (typeof history.pushState === "function") { 
   history.pushState("back", null, null);          
   window.onpopstate = function () { 
      history.pushState('back', null, null);              
      //if(count == 1){
          $('.modal').each(function(){
            if($(this).data('bs.modal') && $(this).data('bs.modal').isShown){
                event.preventDefault();
                $(this).modal('hide');
            }
          })
     // }
   }; 
}
//setTimeout(function(){count = 1;},200);
$(document).ajaxSend(function(event, request, settings) {
     $('#loading-indicator').show();
     loading_indicator_offset();
});

$(document).ajaxComplete(function(event, request, settings) {
    $('#loading-indicator').hide();
}); 

$(document).keypress(function (e) {
         var key = e.which;
         if(key == 13)  
          { 
              if($('.modal').hasClass('in')){ 
                  $('.modal.in .on_enter').click();
              }
              else{ 
                $('.container .on_enter').click();
              }
              return false;  
          }
 });   

 $(function(){   
    
    var tkn=readCookie('tkn')
    if(tkn){
        
    }
     
    $('#signup-username').on('keyup',function(){
        $('#signup-username').removeClass('error_field');
        $('#signup-username').next('span').remove();
        var username=$.trim($('#signup-username').val());
        if(username!=""){
            $.ajax({
                type: "POST",
                url: ajax+'check_field_exists&check_username='+username
             })
            .done(function(msg){
                if(msg != ''){
                    $('#signup-username').addClass('error_field');
                    $('#signup-phone').next('span').remove();
                    $('#signup-username').after('<span  class="err_span">'+msg+'</span>');
                    $('#signup-username').attr("autofocus","autofocus");
                }
            }); 
        }
    })
    $('#signup-email').on('keyup',function(){
        $('#signup-email').removeClass('error_field');
        $('#signup-email').next('span').remove();
        var email=$.trim($('#signup-email').val());
        if(email!=""){
            $.ajax({
                type: "POST",
                url: ajax+'check_field_exists&check_email='+email
             })
            .done(function(msg){
                if(msg != ''){
                    $('#signup-email').addClass('error_field');
                    $('#signup-email').next('span').remove();
                    $('#signup-email').after('<span  class="err_span">'+msg+'</span>');
                    $('#signup-email').attr("autofocus","autofocus");
                }
            }); 
        }
    })
    $('#signup-phone').on('keyup',function(){
        $('#signup-phone').removeClass('error_field');
        $('#signup-phone').next('span').remove();
        var phone=$.trim($('#signup-phone').val());
        if(phone!=""){
            $.ajax({
                type: "POST",
                url: ajax+'check_field_exists&check_phone='+phone
             })
            .done(function(msg){
                if(msg != ''){
                    $('#signup-phone').addClass('error_field');
                    $('#signup-phone').next('span').remove();
                    $('#signup-phone').after('<span  class="err_span">'+msg+'</span>');
                    $('#signup-phone').attr("autofocus","autofocus");
                }
            }); 
        }
    });
    
    $('.form-control').on('keyup',function(){
        $(this).removeClass('error_field');
        $(this).next('span').remove();
    })
     
    $('.sign-up-btn').click(function(){
         $('#signup_form').submit();
    }) 
    
    $('#signup_form').submit(function(e){
        e.preventDefault();
        $('.form-control').removeClass('error_field'),
        $('#sign-up-modal span.err_span').remove();
        $('#sign-up-modal .alert').addClass('hidden');
        $('#sign-up-modal .alert span').html('');
        var dataObj = {
                username : $('#signup-username').val(),
                first_name : $('#signup-first-name').val(),
                last_name : $('#signup-last-name').val(),
                email : $('#signup-email').val(),
                phone : $('#signup-phone').val(),
                password : $('#signup-password').val(),
                confirm_pass : $('#signup_confirm_password').val()
        };
        
        $.ajax({
            type: "POST",
            url: ajax+'signup',
            data: 'data='+Base64.encode(JSON.stringify(dataObj))
        }).done(function(msg){
                    var data = JSON.parse(msg);
                    $.each(data, function(k,v){
                       if(k=="success"){
                           $("#sign-up-modal .main").addClass('hidden');
                           $("#sign-up-modal .information").removeClass('hidden');
                           $("#sign-up-modal .information .modal-body").text(v);
                           $("#sign-up-modal input[type='text']").val('');
                           $("#sign-up-modal input[type='password']").val('');
                       }        
                       else{
                           if(k!='error'){
                               $(k).addClass('error_field');
                               $(k).after('<span class="err_span">'+v+'</span>');
                               $(k).attr("autofocus","autofocus");
                               $("#sign-up-modal").animate({ scrollTop:  $(k).offset() }, "slow");
                            }
                            else{
                               $('#sign-up-modal .alert').removeClass('hidden');
                               $('#sign-up-modal .alert span').html('<span class="glyphicon glyphicon-exclamation-sign"></span> ' + v);
                               $("#sign-up-modal").animate({ scrollTop: 0 }, "slow");
                            }
                       }
                    });
        });
   })
    
    $("#sign-up-modal .info-btn").click(function(){
        $("#sign-up-modal").modal('hide');
        setTimeout(function(){
        $("#sign-up-modal .information .modal-body").text("");
        $("#sign-up-modal .information").addClass('hidden');
        $("#sign-up-modal .main").removeClass('hidden');
            },500)
    })
    
    $('a#login-forgot').click(function(){
        $('#forgot-password-modal .forgot-main').removeClass('hidden');
        $('#forgot-password-modal .forgot-add').addClass('hidden');
        $('#forgot-password-modal .forgot-main .alert-info').removeClass('hidden');
        $('#forgot-password-modal .forgot-main .alert-danger').addClass('hidden');
        $('#forgot-password-modal input.forgot-email').val('');
        setTimeout(function(){
            $('input.forgot-email').focus();
        });
        
    });
    $('#forgot-password-modal .forgot-ok-btn').click(function(){
        $('#forgot-password-modal').modal('hide');
    });
    $('.forgot-btn').click(function(){
        $.ajax({
            type: "POST",
            url: ajax+'forgot-password='+$('.forgot-email').val()
       }).done(function(msg){
                        var data = JSON.parse(msg);
                        $.each(data, function(k,v){
                        if(k=="success"){
                           $('#forgot-password-modal .forgot-main').addClass('hidden');
                           $('#forgot-password-modal .forgot-add').removeClass('hidden');
                           $('#forgot-password-modal .forgot-add .alert-info span').text(v); 
                        }        
                        else{
                           $('#forgot-password-modal .forgot-main .alert-info').addClass('hidden');
                           $('#forgot-password-modal .forgot-main .alert-danger').removeClass('hidden');
                           $('#forgot-password-modal .forgot-main .alert-danger span').text(v); 
                        }
                    });
        });
    });
      $('a.logout').click(function(e){
          e.preventDefault();
          var tkn=readCookie('tkn');
          eraseCookie('tkn');
          
        $.ajax({
            type: "POST",
            url: ajax+'logout',
            data: 'data='+Base64.encode(tkn)
       }).done(function(msg){
            location.href=root_folder+lang;
            //console.log(msg);
        });
         // location.reload();
      })
    
 
      
      
      //todo: logout when already logoff
});