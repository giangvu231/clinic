<!-- Mixins-->
<!-- Start: topbar-->
<!-- End: topbar--><!DOCTYPE html>
<html>
<head>
    <?php echo $__env->make('admin.partials._head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">

<?php echo $__env->make('admin.partials._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('admin.partials._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('scripts'); ?>
</body>
<?php echo $__env->yieldPushContent('scripts'); ?>
</html>