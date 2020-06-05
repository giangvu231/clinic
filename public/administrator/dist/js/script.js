"use strict";
jQuery(document).ready(function($){
  // Window on load
  
  if($('button.edit').length != 0){
    $('button.edit').click(function(){
      $(this).closest('tr').next('tr.table-hide').toggleClass('active');
    });
  }
  if($('.drop-menu-table button.clear').length != 0){
    $('.drop-menu-table button.clear').click(function(){
      event.preventDefault();
      $(this).closest('tr.table-hide').removeClass('active');
    });
  }
  $('#filterDate2 .input-group.date').datepicker({}); 

  $(".summernote").summernote({
            height:255,
            width:622,
            toolbar: [
                ['style', ['bold', 'italisc', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
            ],
            focus: true,
            disableResizeEditor: true
        });
        $('.note-statusbar').hide(); 

        $('select.d-enter').each(function(){
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
              $this.trigger('change');
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
  
});