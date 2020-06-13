<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title><?php echo $__env->yieldContent('title'); ?></title>
<!-- Tell the browser to be responsive to screen width-->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"/>
<!-- Bootstrap 3.3.7-->
<link rel="stylesheet" href="<?php echo e(asset('administrator/dist/libs/bootstrap/dist/css/bootstrap.min.css')); ?>"/>
<!-- Font Awesome-->
<link rel="stylesheet" href="<?php echo e(asset('administrator/dist/libs/font-awesome/css/font-awesome.min.css')); ?>"/>
<!-- Ionicons-->
<link rel="stylesheet" href="<?php echo e(asset('administrator/dist/libs/Ionicons/css/ionicons.min.css')); ?>"/>
<!-- Theme style-->
<link rel="stylesheet" href="<?php echo e(asset('administrator/dist/libs/skins/AdminLTE.min.css')); ?>"/>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet"/>
<!--
AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load.
-->
<link rel="stylesheet" href="<?php echo e(asset('administrator/dist/libs/skins/_all-skins.min.css')); ?>"/>
<!-- jquery-ui-->
<link rel="stylesheet" href="<?php echo e(asset('administrator/dist/libs/datepicker/jquery-ui.theme.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('administrator/dist/libs/datepicker/bootstrap-datepicker.min.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('administrator/dist/libs/datepicker/jquery-ui.min.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('administrator/dist/style.css')); ?>"/>
<style>
	<?php echo $__env->yieldContent('css'); ?>
</style>