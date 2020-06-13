<?php $__env->startSection('title','Bác sĩ chuẩn đoán'); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-view'); ?>
<div class="container-fluid" style="margin-top: -30px;">
	<div class="row">
		<!-- <iframe src="http://192.168.1.7/clinicalstudio/integration/viewer?mrn=<?php echo e($medical_bill->patient_id); ?>&acc=<?php echo e($medical_bill->accession_number); ?>" width="100%" height="530" frameborder="0"></iframe> -->
		<iframe src="http://10.0.0.81/clinicalstudio/integration/viewer?mrn=<?php echo e($medical_bill->patient_id); ?>&acc=<?php echo e($medical_bill->accession_number); ?>" width="100%" height="800" frameborder="0"></iframe>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>