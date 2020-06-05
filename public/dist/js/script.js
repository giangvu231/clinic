jQuery(document).ready(function($) {
    $('select.d-enter').each(function() {
        var $this = $(this),
            numberOfOptions = $(this).children('option').length;
        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function() {
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            $this.trigger("change");
            //console.log($this.val());
        });

        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });
    $(".select-options li").click(function(){
        var target=$(this).parent();
        $(target).siblings("select").find("option").removeAttr("selected");
        $(target).siblings("select").find("option:eq("+$(this).index()+")").attr('selected','selected');
    });


    /***************************/
  
    $('select.sectID').each(function() {
        var $this = $(this),
            numberOfOptions = $(this).children('option').length;
        $this.addClass('select-hidden');
        $this.wrap('<div class="select2"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function() {
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            //console.log($this.val());
        });

        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });
    $(".select-options li").click(function(){
        var target=$(this).parent();
        $(target).siblings("select").find("option").removeAttr("selected");
        $(target).siblings("select").find("option:eq("+$(this).index()+")").attr('selected','selected');
    });



    /**************************** */
        // $('#summernote').summernote();
        // $("#summernote").summernote({
        //     // height:500
        //     // toolbar: [
        //     //     ['style', ['bold', 'italic', 'underline', 'clear']],
        //     //     ['font', ['strikethrough', 'superscript', 'subscript']],
        //     //     ['fontsize', ['fontsize']],
        //     //     ['color', ['color']],
        //     //     ['para', ['ul', 'ol', 'paragraph']],
        //     //     ['height', ['height']],

        //     // ],
        //     // focus: true,
        //     // disableResizeEditor: true
        //     height: 300,                 // set editor height
        //     minHeight: null,             // set minimum height of editor
        //     maxHeight: null,             // set maximum height of editor
        //     focus: true 
        // });
        $('.note-statusbar').hide(); 

    /***************************** */
        $(".filter a").click(function(){
            // $(".form-filter").slideToggle("slow");
            $(".form-filter").toggleClass("filter-active");
        })

  
    /******************************* */
    $(function() {
        $('select.enter').selectize({});
    });
    /******************** */

    $(".btn-dots").click(function() {
        $("tbody tr.bs").not($(this).closest("tr.bs")).removeClass("bs");
        $("tbody .box.tr-active").not($(this).closest("tr").next().find(".box.tr-active")).removeClass("tr-active");
        if($(this).closest("tr").next().find(".box").hasClass('tr-active')){
        $(this).closest("tr").next().find(".box.tr-active").removeClass('tr-active');
        $(this).closest("tr.bs").removeClass('bs');
    }else{
        $(this).closest("tr").next().find(".box").addClass('tr-active');
        $(this).closest("tr").addClass('bs');
    }
    });

    $("button").click(function(){
        $(this).closest("tr.info").find(".box").removeClass("tr-active");
    })

    $(".btn-cancel").click(function(){
        $(this).closest("box").removeClass('tr-active');
    });
    // show/hide
    $(".edit-extend").click(function() {
        // $(this).hide();
        $(".reporting .table__infor").toggleClass("report-active");
        $(".edit-template .table__infor").toggleClass("active-edit");
        $("a.mr").toggleClass("none");

    });
//    
});
jQuery(document).ready(function($) {


    $('.welcome').click(function() {
        // event.preventDefault();
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
    
      $(".btn-next").click(function(){
        $(this).closest("tr").find(".myPopup").toggleClass('show');
      })
      $('#wrapper').click(function(e){
      if($(e.target).closest('.btn-next').length ===0){
        $(".myPopup").removeClass("show");
      //   alert("haha")
      };
    });
})



$('.choose-language').change(function (e) { 
    e.preventDefault();
    window.location.href = $(this).val();
});

function popup(callback){
    setTimeout(function(){
        $(".pop-up").css("animation","down 1s linear 0s 1 normal forwards running");
        console.log(1);
        if(callback && typeof callback == "function") {
            callback();
        }
    },1500);
    $(".pop-up").css("animation","up 1s linear 0s 1 normal forwards running");
}

function showtext(text){
    $(".alert span").text(text);
}


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

$(document).ready(function () {
    $('.input-filter').find('.select').css('width', '240px');
});

