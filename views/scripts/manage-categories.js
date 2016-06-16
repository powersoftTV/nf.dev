/**
 * Created by User on 6/5/2016.
 */
$(function(){
	var inprocess=false;
    if ($.ui) {
        (function () {
            var oldEffect = $.fn.effect;
            $.fn.effect = function (effectName) {
                if (effectName === "shake") {
                    var old = $.effects.createWrapper;
                    $.effects.createWrapper = function (element) {
                        var result;
                        var oldCSS = $.fn.css;

                        $.fn.css = function (size) {
                            var _element = this;
                            var hasOwn = Object.prototype.hasOwnProperty;
                            return _element === element && hasOwn.call(size, "width") && hasOwn.call(size, "height") && _element || oldCSS.apply(this, arguments);
                        };

                        result = old.apply(this, arguments);

                        $.fn.css = oldCSS;
                        return result;
                    };
                }
                return oldEffect.apply(this, arguments);
            };
        })();
    }

    $('.add_btn').click(function(e){
        e.preventDefault();
        checkCat(true);
    });

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
        "info":     false,
        "order": []
    } );
    $('#cat_table_filter label').contents().filter(function(){ return this.nodeType != 1; }).remove();
    $('#cat_table_filter label').prepend('<span class="glyphicon glyphicon-search"></span>');

    $("#edit_name").click(function(){
        $(this).css( "border-color", "" );
    });
    $("#name").click(function(){
        $(this).css( "border-color", "" );
        $('#new_category_popup .error').text('');
    });
	$('a[href="#edit_category_popup"]').click(function(){
		$("#edit_name").css( "border-color", "" );
	})

    $('.edit_cat_btn').click(function(){
        var category= $.trim($('#edit_name').val());
        var description= $.trim($('#edit_description').val());
        if(category==""){
            $("#edit_name").effect( "shake", {times:4}, 1000 );
            $("#edit_name").css( "border-color", "red" );
        }
        else {
            var dataObj = {
                cat_lng: $('span#language').attr('lng'),
                cat_id: $('button.edit_cat_btn').attr('cat_id'),
                category: category,
                description: description
            };
            $.ajax({
                type: "POST",
                url: ajax + 'edit-category-save',
                data: 'data=' + JSON.stringify(dataObj)
            }).done(function (msg) {
                if (msg) {
                    var data = JSON.parse(msg);
                    $.each($('a[href="#edit_category_popup"]'), function () {
                        var this_cat = $(this);
                        if (this_cat.attr('data-cat_id') == $('button.edit_cat_btn').attr('cat_id') && this_cat.attr('data-cat_lng') == $('span#language').attr('lng')) {
                            this_cat.html(data);
                            this_cat.attr('title', this_cat.attr('next-title'));
                            $('#edit_category_popup').modal('hide');
                        }
                    });
               }
               
            });
        }
    })
	$('#name').on('keyup',function(){
		checkCat();
	})
	$('select[name="fr_lang"]').on('change', function (e)  {
		checkCat();
	});
	
	function checkCat(issubmit){
        if(!inprocess){
			$('.modal.in .error').text('');
			$('.modal.in input.cat_name').css('border-color','');
			var language=$('select[name="fr_lang"]').find("option:selected").val();
			var category=$('.modal.in input.cat_name').val();
			language=$.trim(language);
			category=$.trim(category);
			if(category!=""){
				    var dataObj = {
						language:language,
						category: category,
						lang:lang
					};
                    inprocess=true;
					$.ajax({
						type: "POST",
						url: ajax + 'edit-category-chk',
						data: 'data=' + JSON.stringify(dataObj)
					}).done(function (msg) {
						if (msg) {
							$('.modal.in .error').text(msg);
							$('.modal.in input.cat_name').css('border-color','red');
                            if(issubmit){
                                $(".modal.in input.cat_name").effect( "shake", {times:4}, 1000 );
                                $(".modal.in input.cat_name").css( "border-color", "red" );
                                $(".modal.in input.cat_name").focus;
                            }
						}
                        else {
                            if (issubmit) {
                                $(".modal.in form").submit();
                            }
                        }
                        inprocess = false;
					});
			}
			else{
				inprocess=false;
                if(issubmit){
                    $(".modal.in input.cat_name").effect( "shake", {times:4}, 1000 );
                    $(".modal.in input.cat_name").css( "border-color", "red" );
                    $(".modal.in input.cat_name").focus;
                }
			}
		}

	}
});