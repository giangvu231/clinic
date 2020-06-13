<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/js/standalone/selectize.min.js"></script>

<!--JS-->


<script src="<?php echo e(asset('dist/libs/ckeditor1/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('dist/js/script.js')); ?>"></script>
<!-- development version, includes helpful console warnings -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">
    $("#remove_text").click(function (event) {
        event.preventDefault(); //hủy sự kiện có sẵn.
        $("#text_search").val("");
    });
    $(document).ready(function(){
        $('button[type="button"]').click(function(){
            var lstInput = $(".input_data").val("");
        });
    })
</script>
