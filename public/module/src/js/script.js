jQuery(document).ready(function($) {
    $("#summernote").summernote({
        height:500,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ],
        focus: true,
        disableResizeEditor: true
    });
    $('.note-statusbar').hide(); 

    $(function() {
        $('select.enter').selectize({});
    });

    $('.welcome').click(function() {
        event.preventDefault();
        $(this).find('.popup').toggleClass('display');
    });
    $('#wrapper').click(function(e){
        if($(e.target).closest('.welcome').length ===0){
          $('.welcome .popup').removeClass("display");
        //   alert("haha")
        };

        if($(e.target).closest('.welcome').length ===0){
            $('.welcome .popup').removeClass("display");
          //   alert("haha")
          }
      })
})