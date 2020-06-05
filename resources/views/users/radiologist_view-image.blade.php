@extends('layouts.view')
@section('title','Bác sĩ chuẩn đoán')
@section('css')
<style type="text/css">
</style>
@endsection
@section('content-view')
<div class="container-fluid" style="margin-top: -30px;">
	<div class="row">
		<!-- <iframe src="http://192.168.1.7/clinicalstudio/integration/viewer?mrn={{ $medical_bill->patient_id }}&acc={{ $medical_bill->accession_number }}" width="100%" height="530" frameborder="0"></iframe> -->
		<iframe src="http://10.0.0.81/clinicalstudio/integration/viewer?mrn={{ $medical_bill->patient_id }}&acc={{ $medical_bill->accession_number }}" width="100%" height="800" frameborder="0"></iframe>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
</script>
@endsection

