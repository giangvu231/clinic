<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>In chi dinh</title>
</head>
<body style="margin:0px">
    <embed src="<?php echo e(asset($path)); ?>" type="application/pdf" id="viewPdf" width="100%">
    <script>
        var h = window.innerHeight
        || document.documentElement.clientHeight
        || document.body.clientHeight;
        window.onload = function(){
            document.querySelector('#viewPdf').style.height = h + "px";
        }
    </script>
</body>
</html>