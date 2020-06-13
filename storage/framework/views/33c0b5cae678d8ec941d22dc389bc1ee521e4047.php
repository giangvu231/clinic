<?php $__env->startSection('title','Bác sĩ chuẩn đoán'); ?>
<?php $__env->startSection('content'); ?>
    <div class="test__wrap--content">
        <table class="table1">
            <thead>
            <tr>
                <th>
                    <p>Tên bệnh nhân</p>
                </th>
                <th>
                    <p>Mã bệnh nhân</p>
                </th>
                <th>
                    <p>Mã tờ chỉ định</p>
                </th>
                <th>
                    <p>Ngày khởi tạo</p>
                </th>
                <th>
                    <p>Thời gian khởi tạo</p>
                </th>
                <th>
                    <p>Mã chỉ định</p>
                </th>
                <th>
                    <p>Tên dịch vụ</p>
                </th>
                <th>
                    <p>Trạng thái</p>
                </th>
                <th>
                    <p>Chuyển đến bởi</p>
                </th>
                <th></th>
            </tr>
            </thead>
        </table>
        <table class="table2">
            <tbody class="content--table" id="list_data" style="border-radius: 12px;">
                <?php $__currentLoopData = $medical_bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medical_bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <tr class="shadow bg">
                    <td>
                        <p name="patient_name"><?php echo e($medical_bill->first_name); ?> <?php echo e($medical_bill->last_name); ?></p>
                    </td>
                    <td>
                        <p name="patient_id"><?php echo e($medical_bill->patient_id); ?></p>
                    </td>
                    <td>
                        <p name="order_id"><?php echo e($medical_bill->order_number); ?></p>
                    </td>
                    <td>
                        <p name="request_date"><?php echo e($medical_bill->schedule_date); ?></p>
                    </td>
                    <td>
                        <p name="request_time"><?php echo e($medical_bill->schedule_time); ?></p>
                    </td>
                    <td>
                        <p name="access_id"><?php echo e($medical_bill->accession_number); ?></p>
                    </td>
                    <td>
                        <p name="device_name"><?php echo e($medical_bill->loai_thiet_bi); ?></p>
                    </td>
                    <td>
                        <p name="status_id">
                            <?php echo e(isset($medical_bill->status->name) ? $medical_bill->status->name : ""); ?>

                        </p>
                    </td>
                    <td>
                        <p name="doctor_name"><?php echo e($medical_bill->ordering_doctor_name); ?></p>
                    </td>
                <td style="padding-right: 15px;">
                        <p>
                            <div class="fright mr-r-10 tooltip-btn">
                                <a data-placement="bottom" data-toggle="tooltip" title="Xem chỉ định" class="btn-next fleft" href="<?php echo e(route('get.radiologist.view', ['accession_number' => $medical_bill->accession_number])); ?>">
                                    <i class="fas fa-forward"></i>
                                </a>
                            </div>
                            <?php if($medical_bill->is_edited): ?>
                            <i class="fas fa-pen"></i>
                            <?php endif; ?>
                        <div class="clear-fix"></div>
                        </p>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
		<br/>
        <div class="fright">
            <?php if(isset($medical_bills)): ?>
            <?php echo e($medical_bills->links()); ?>

            <?php endif; ?>
        </div>
        <div class="clearfix"></div>
    </div>
    </div>
    </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
     <script src="<?php echo e(asset('select/js/jqueryui.js')); ?>"></script>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript" src="<?php echo e(asset('select/js/index.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('select/js/es5.js')); ?>"></script>
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#select-beast').selectize({
        create: true,
        sortField: {
          field: 'text',
          direction: 'asc'
        },
        dropdownParent: 'body'
      });
      $('#select-beast1').selectize({
        create: true,
        sortField: {
          field: 'text',
          direction: 'asc'
        },
        dropdownParent: 'body'
      });

    //   setInterval(function(){ window.location.reload(); }, 5000);
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>