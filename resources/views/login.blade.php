<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset("libs/fontawesome/css/all.css") }}">
    <link rel="stylesheet" href="{{ asset("fonts/font.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ url('dist/style.css') }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
		body
		{
			background-color: #fff;
			font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
		}
		.signin-header
		{
			text-align: center;
			margin-top: 5%;
		}
		.signin-content
		{
			width: 400px;
			margin: auto;
			padding: 20px;
			border-radius: 10px;
			background: #ffff;
			margin-top: 5%;
		}
		.form-signin-heading
		{
			margin-bottom: 20px;
			text-align: center;
			text-transform: uppercase;
			font-size: 24px;
			font-weight: 300;
		}
		input.form-control:hover
		{
			transition: 0.3s;
		}
		input.form-control
		{
			height: 46px;
		}
		button.btn-primary
		{
			
			border: none;
		}
		button.btn-primary:hover
		{
			background: blue;
			border: none;
		}
		.alert-danger {
			background-color: rgba(255,109,111,.3);
			color: #c3124e;
		}
		.btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
			color: #fff;
			background-color: #00cca8;
			border-color: #00cca8;
		}
		label.error
		{
			display: none !important;
		}
	</style>
</head>
<body>
	<div class="container">
		<form action="{{route('post.login')}}" method="post" id="form_login">
			{{ csrf_field() }}
			<div class="signin-header">
				<img style="margin-top: -59px; width: 300px" class="user-image" src="{{asset('administrator/dist/images/logo.jpg')}}" alt="User Image"/>
			</div>
			<div style="margin-top: -1px;" class="signin-content">
				@if(session()->has('success'))
					<p style="color:blue;text-align: center;">{{session()->get('success')}}</p>
				@endif
				@if(isset($message))
                    <div role="alert" class="alert alert-danger form-signin-alert">Username or password is incorrect.</div>
                    @php unset($message) @endphp
                @endif
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Username" name="name">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="Password" name="password">
				</div>	
				<button type="submit" class="btn btn-lg btn-primary btn-block">Đăng nhập</button>
			</div>
		</form>
	</div>
	<script src="{{ asset('libs/fontawesome/js/all.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/js/standalone/selectize.min.js"></script>
<script src="{{ url('dist/js/script.js') }}"></script>
<script src="{{ asset("js/script.js") }}"></script>
<script src="{{asset('js/jquery-validate/jquery.validate.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $("#form_login").validate({
        rules: {
            name: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            name: {
                required: ''
            },
            password: {
                required: ''
            }
        }
    });
</script>
</body>
</html>