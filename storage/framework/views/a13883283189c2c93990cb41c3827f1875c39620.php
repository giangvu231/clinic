<?php $__env->startSection('title','Admin'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper-index" style="background: url(<?php echo e(asset('administrator/dist/images/pexels-photo-935869.jpeg')); ?>); width: 100%; height: 100vh; float: right; background-repeat: no-repeat; background-position: center center; background-size: cover;">
        
    </div>

    </body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>