/**
 * Created by User on 6/5/2016.
 */
$(function(){
    $('#edit_category_popup').on('show.bs.modal', function(e) {
        var dataObj = {
            cat_lng : $(e.relatedTarget).data('cat_lng'),
            cat_id : $(e.relatedTarget).data('cat_id'),
            lang:lang
        };
        $.ajax({
            type: "POST",
            url: ajax+'edit-category',
            data: 'data='+JSON.stringify(dataObj)
        }).done(function(msg){
            if(msg) {
                var data = JSON.parse(msg);
                $(e.currentTarget).find('input[name="name"]').val(data.category);
                $(e.currentTarget).find('input[name="description"]').val(data.description);
                $(e.currentTarget).find('span#language').text(data.language);
            }
            else location.reload();
        });
    })

});