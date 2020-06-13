<title><?php echo $__env->yieldContent('title'); ?></title>
<meta charset="utf-8"/>
<meta name="description" content="The description"/>
<meta name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1, shrink-to-fit=no, user-scalable=no"/>
<meta name="keywords" content="coding, html, css"/>
<meta name="author" content="someone"/>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!-- Styles-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
      integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.default.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css"/>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css"/>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('select/css/normalize.css')); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('dist/style.css')); ?>"/>

<style>
	.tooltip-btn {
	  position: relative;
	  cursor: pointer;
	}
	span.tooltip-content{
		position: absolute;
		bottom: -30px;
	 	left: 0;
		background-color: #555;
	    color: #fff;
	    text-align: center;
	    border-radius: 6px;
	    padding:0 10px;
	    transition: opacity 0.3s;
	    opacity: 0;
	    width: max-content;
	}
	.tooltip-content::after {
	    content: "";
	    position: absolute;
	    bottom: 100%;
	    left: 20%;
	    margin-left: -5px;
	    border-width: 5px;
	    border-style: solid;
	    border-color: transparent transparent #555 transparent;
	}

	.tooltip-btn:hover > span{
		opacity: 1;
	}
</style>
<?php echo $__env->yieldContent('css'); ?>
