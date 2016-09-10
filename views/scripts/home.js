$(function(){
    if(user_id!=""){
        if(lang=='fr')lang='fr_FR';
        if(lang=='ka')lang='ka_GE';
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