<?php $__env->startSection('title','sửa thuốc'); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style type="text/css">
    table th {
        text-align: center;
    }
</style>
<div class="content-wrapper">
    
<div class="container">
 <div style="font-size: 30px; font-weight: bold;">
    <h2>Thông tin chi tiết thuốc</h2>
</div>

<form action="" method="POST">
 <?php echo e(csrf_field()); ?>


<table class="table table-bordered" id="dynamicTable" style="font-size: 16px"> 
    <tr>       
        <td>
            <table width="100%">
                <tr>                
                    <td>
                        <b>Tên thuốc</b>
                        <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="ten_thuoc" class="form-control" value="<?php echo e($supplies->ten_thuoc); ?>" />
                    </td>
                   <td>
                    <b>Số lượng nhập</b>
                    
                    <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="so_luong"  class="form-control"value="<?php echo e($supplies->so_luong); ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <b>Nhà cung cấp</b>
                    <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="nha_cung_cap" class="form-control"value="<?php echo e($supplies->nha_cung_cap); ?>" />
                </td>
                 <?php 
                    $dadung = DB::table('product_stocks')->where('supplies_id', $supplies->ma_thuoc)->where('so_lo', $supplies->so_lo)->sum('qty');
                    $con_lai = $supplies->so_luong - $dadung;
                 ?>
                <td>
                    <b>Đã dùng</b>
                    <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="SL_da_dung" class="form-control"value="<?php echo e($dadung); ?>" />
                </td>
                
            </tr>
            <tr>
               <td>
                    <b>Số lô</b>
                    <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="so_lo" class="form-control"value="<?php echo e($supplies->so_lo); ?>" />
                </td>
                <td>
                    <b>Còn lại</b>
                    <?php if($con_lai <= 0): ?>
                    <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="lieu_dung" class="form-control"value="Đã hết" />
                    <?php else: ?>
                    <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="lieu_dung" class="form-control"value="<?php echo e($con_lai); ?>" />
                    <?php endif; ?>
                   <!--  <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="lieu_dung" class="form-control"value="<?php echo e($con_lai); ?>" /> -->
                </td>
               
            </tr>
            <!-- tr>
                 <td>
                    <b>Liều dùng</b>
                    <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="lieu_dung" class="form-control"value="<?php echo e($supplies->lieu_dung); ?>" />
                </td>
            </tr>  -->
            </table>
        </td>
        <td>
            <table width="100%">
                    <tr>
                         <td>
                            <b>Hạn sử dụng</b>
                            <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="han_su_dung" class="form-control"value="<?php echo e($supplies->han_su_dung); ?>" />
                        </td>
                        <td>
                            <b>Giá nhập</b>
                            <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="gia_nhap" class="form-control" value="<?php echo e($supplies->gia_nhap); ?>"/>
                        </td>
                    </tr>   
                    <tr>
                       <td>
                            <b>Ngày nhập</b>
                            <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="ngay_nhap" class="form-control"value="<?php echo e($supplies->ngay_nhap); ?>" />
                        </td>
                        <td>
                            <b>Giá bán</b>
                            <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="gia_ban" class="form-control" value="<?php echo e($supplies->gia_ban); ?>" />
                        </td>
                       
                    </tr>    
                    <tr>
                        <td>
                            <b>Đơn vị</b>
                            <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="don_vi" class="form-control" value="<?php echo e($supplies->don_vi); ?>"/>
                        </td>
                        <td>
                            <b>Nhóm thuốc</b>
                            <input readonly style=" width: 70%;color: blue; font-weight: bold;" type="text" name="nhom_thuoc" class="form-control" value="<?php echo e($supplies->nhom_thuoc); ?>"/>
                        </td>
                    </tr>    
            </table>
        </td>
    </tr>    
    
</table>

</form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>