$('.lngbtn').click(function(e) {
    $.ajax({
        type: "POST",
        url: ajax+'get-words'+'&item='+$(this).data('language')+'&lang='+lang
    }).done(function(msg){
        if(msg) {
            var data = JSON.parse(msg);
            var final_str='<ul>';
            $.each(data, function(k,v){
                final_str+='<li class="words_list"><div class="row"><div class="col-sm-4">'+k+'</div><div class="col-sm-4"><a href="">'+v+'</a></div></div></li>';
            });
            final_str+='</ul>';
            $('.translations').html(final_str);
        }
        else location.reload();
    });
});