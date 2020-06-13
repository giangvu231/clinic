<?php $__env->startSection('title','Thêm thuốc'); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style type="text/css">
	table th {
		text-align: center;
	}
</style>
<body style="font-family: time new roman">
	<div class="content-wrapper">

	<div class="container">     

		<form action="" method="POST">
			<?php echo e(csrf_field()); ?>

			<div style="font-size: 30px; font-weight: bold;">
				<div class="top-title fleft">
					Nhập thêm thuốc <?php echo e($supplies->ten_thuoc); ?> vào kho
				</div>				
			</div>
			<table class="table table-bordered" id="dynamicTable" style="font-size: 16px"> 
				<tr>       
					<td>
						<table width="100%">
							<tr> 
								<td hidden="" >
									<input autocomplete="off" value="<?php echo e($supplies->ma_thuoc); ?>" style=" width: 70%;color: blue; font-weight: bold;" type="text" name="ma_thuoc" class="form-control"/>
								</td> 
								<td hidden="">
									<input autocomplete="off" value="<?php echo e($supplies->ten_thuoc); ?>" style=" width: 70%;color: blue; font-weight: bold;" type="text" name="ten_thuoc" class="form-control"/>
								</td>          
								<td>
									<b>Số lượng nhập</b>                    
									<input autocomplete="off" style=" width: 70%;color: blue; font-weight: bold;" type="number" step="0.01" name="so_luong"  class="form-control" />
								</td>
								<td>
									<b>Nhóm thuốc</b>
									<input value="<?php echo e($supplies->nhom_thuoc); ?>" autocomplete="off" style=" width: 70%;color: blue; font-weight: bold;" type="text" name="nhom_thuoc" class="form-control" />
								</td>
							</tr>
							<tr>
								<td>
									<b>Giá nhập</b>
									<input autocomplete="off" style=" width: 70%;color: blue; font-weight: bold;"  type="number" step="0.01"  name="gia_nhap" class="form-control" placeholder="đơn vị vnđ"  value="<?php echo e($supplies->gia_nhap); ?>"/>
								</td>
								<td>
									<b>Liều dùng</b>
									<input autocomplete="off" style=" width: 70%;color: blue; font-weight: bold;" type="text" value="<?php echo e($supplies->lieu_dung); ?>" placeholder="vd: 1 viên/gói/ngày" name="lieu_dung" class="form-control"  value="<?php echo e($supplies->lieu_dung); ?>"/>
								</td>
							</tr>
							<tr>
								<td hidden="" >
									<input autocomplete="off" value="<?php echo e($supplies->so_lo); ?>" style=" width: 70%;color: blue; font-weight: bold;" type="text" name="so_lo" class="form-control"/>
								</td>
								<td>
									<b>Giá bán</b>
									<input autocomplete="off" style=" width: 70%;color: blue; font-weight: bold;"  type="number" step="0.01" placeholder="đơn vị vnđ" name="gia_ban" class="form-control"  value="<?php echo e($supplies->gia_ban); ?>"/>
								</td>
								
								<td>
									<b>Số lượng khi kê</b>
									<input autocomplete="off" style=" width: 70%;color: blue; font-weight: bold;" type="number" step="0.01" name="SL_goi_y" class="form-control" value="<?php echo e($supplies->SL_goi_y); ?>"   />     
								</td>               
							</tr>
						</table>
					</td>
					<td>
						<table width="100%">
							<tr>
								
								<td>
									<b>Hạn sử dụng</b>
									<input autocomplete="off" style=" width: 70%;color: blue; font-weight: bold;" type="date" name="han_su_dung" class="form-control" />
								</td>
								<td>
									<b>Đơn vị</b>
									<input value="<?php echo e($supplies->don_vi); ?>" autocomplete="off" style=" width: 70%;color: blue; font-weight: bold;" type="text" name="don_vi" class="form-control" />
								</td>
							</tr>   
							<tr>

								<td>
									<b>Ngày nhập</b>
									<input autocomplete="off" style=" width: 70%;color: blue; font-weight: bold;" type="date" name="ngay_nhap" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
								</td>
								<td>
									<b>Nhà cung cấp</b>
									<input autocomplete="off" style=" width: 70%;color: blue; font-weight: bold;" type="text" value="<?php echo e($supplies->nha_cung_cap); ?>" name="nha_cung_cap" class="form-control" />
								</td>
								
							</tr>    
							<tr>
								
								
							</tr>    
						</table>
					</td>
				</tr>      
			</table>
			<td style="text-align: center; padding-top: 10px;">
				<button type="submit"  aria-hidden="true" style="background-color: #3c8dbc; border:0;" class="btn btn-success fa fa-save">&nbsp;&nbsp;Nhập</button>    </td>
			</tr>
		</table>



		<div style="text-align: center;">

		</div>


	</form>
</div>
</div>
</body>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>