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
                $(e.currentTarget).find('input[name="edit_name"]').val(data.category);
                $(e.currentTarget).find('textarea[name="edit_description"]').val(data.description);
                $(e.currentTarget).find('span#language').text(data.language);
                $(e.currentTarget).find('span#language').attr('lng',data.lng);
                $(e.currentTarget).find('button.edit_cat_btn').attr('cat_id',data.id);
            }
            else location.reload();
        });
    });
    $('#cat_table').DataTable( {
        "paging":   false,
        "info":     false
    } );
    $('#cat_table_filter label').contents().filter(function(){ return this.nodeType != 1; }).remove();
    $('#cat_table_filter label').prepend('<span class="glyphicon glyphicon-search"></span>');

    $('.edit_cat_btn').click(function(){
        var dataObj = {
            cat_lng : $('span#language').attr('lng'),
            cat_id : $('button.edit_cat_btn').attr('cat_id'),
            category: $('#edit_name').val(),
            description: $('#edit_description').val()
        };
        $.ajax({
            type: "POST",
            url: ajax+'edit-category-save',
            data: 'data='+JSON.stringify(dataObj)
        }).done(function(msg){
            if(msg) {
                var data = JSON.parse(msg);
                $.each($('a[href="#edit_category_popup"]'),function(){
                    var this_cat=$(this);
                    if(this_cat.attr('data-cat_id')==$('button.edit_cat_btn').attr('cat_id') && this_cat.attr('data-cat_lng')==$('span#language').attr('lng')){
                        this_cat.html(data);
                        this_cat.attr('title', this_cat.attr('next-title'));
                        $('#edit_category_popup').modal('hide');
                    }
                });
                //$(e.currentTarget).find('input[name="description"]').val(data.description);
                //$(e.currentTarget).find('span#language').text(data.language);
            }
           // else location.reload();
        });
    })
});