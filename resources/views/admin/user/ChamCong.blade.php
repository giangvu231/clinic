@extends('admin.layouts.app')
@section('title','Admin User')
@section('css')
	.edit a{
		background: #3C8DBC;
		border: 1px solid transparent;
		-webkit-border-radius: 3px;
		border-radius: 3px;
		-webkit-transition: all 0.3s;
		-o-transition: all 0.3s;
		-moz-transition: all 0.3s;
		transition: all 0.3s;
		outline: none;
		color: #f5f5f5;
		vertical-align: middle;
	}
<style type="text/css">
	table th{
    text-align: center;
}
tr.header
{
    background-color: #d2dae3;
    height: 50px;
    color: rgba(38,54,72);
}
tr.header div
{
    font-weight: 500 !important;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
}
tr.main
{
    background-color: #fff;
    color: #2f4358;
    height: 40px;
    border-bottom: 1px solid #d2dae3;
}
tr.main div
{
    font-weight: 400;
}
tr.main:hover
{
    background-color: #e3e3e3;
}
.fa-notes-medical:hover
{
    color: #00BD9C;
}
.fa-arrow-alt-circle-right:hover
{
    color: #00BD9C;
}
th
{
    padding: 5px;
}
td
{
    display: table-cell;
}
</style>
@endsection
@section('content')
<div class="content-wrapper">
	<div class="table-content">
		<div class="table-content">           
			<?php 
			$now = Carbon\Carbon::now();
			$thang = $now->month;
			$ngaymax = $now->daysInMonth;
			$ngayht = $now->day;			
			?>
			<table border="1" width="100%" class="table table-bordered">
				<thead>
					<tr class="header">
						<th colspan="32" style="text-align: center; font-size: 20px" >
							Bảng chấm công tháng {{ $thang }}
						</th>
					</tr>
					<tr class="header">
						<th>Tên nhân viên</th>
						@for($i = 1; $i <= $ngaymax; $i++)
						<th>{{ $i }}</th>
						@endfor
					</tr>
				</thead>
				<tbody>
					<tr></tr>					
					<tr>
						@foreach ($users as $user)
						<td>
							{{$user->level->name}}
							{{$user->hoten}}
						</td>
						<?php 
							$chamcong = DB::table('chamcong')->where('ma_nv',$user->userid)->get();
						 ?>	
							@foreach ($chamcong as $chamcong)						
								@for($a = 1; $a <= $ngaymax; $a++)														
									<th>
										@if ($a <= (integer) date("d", strtotime($chamcong->ngay_cham)))
											{{ $chamcong->so_cong }}
										@endif
									</th>							
								@endfor
							@endforeach
						@endforeach
					</tr>	
				</tbody>
				
			</table>        
		</div>
	</div>    
</div>
@endsection

@push('scripts')
@endpush