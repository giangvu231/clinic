<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset("libs/fontawesome/css/all.css") }}">
    <link rel="stylesheet" href="{{ asset("fonts/font.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{url('dist/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css" media="screen">
        /*button language*/
            .btn-lang{
                position: absolute;
                border: 1px solid #fff;
                top: 20px;
                right: 50px;
                height: 30px;
                width: 125px;
            }
            .btn-lang select{
                background-color: #7392e2;
                width: 100%;
                height: 100%;
                color: #fff;
                font-size: 14px;
            }
            .btn-lang select:hover{
                border: none;
                background: #fff;
                color: #000;
            }
            .select-styled {
                line-height: 25px;
            }
            .bg-login
            {
                background-image: none;
                height: 80vh;
            }
    </style>
</head>
<body>
<div id="wrapper">
    <div id="login" class="login">
        <div class="bg-login">
        </div>
        <div class="topbar">
            <div class="change-language fright" style="position: absolute; top: 10%; right: 10%;">
            </div>
            <div class="clear-fix"></div>
        </div>
        <form action="{{route('post.login')}}" method="post" id="form_login">
            {{ csrf_field() }}
            <div class="login--form text-center">
                <h2 class="login--title">
                    Đăng nhập
                </h2>
                <div class="login--form__input">
					@if(session()->has('success'))
						<p style="color:blue;text-align: center;">{{session()->get('success')}}</p>
					@endif
                    <div class="login--input">
                        <input type="text" placeholder="Nhập tên tài khoản" name="name" value="">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="login--input">
                        <input class="pass" type="password" placeholder="Nhập mật khẩu" name="password">
                        <i class="fas fa-key"></i>
                        <a id="show-password"><i class="fas fa-eye-slash" style="right: 25px; padding: 10px;cursor: pointer; top: 10px;display: inline-block;left: auto; "></i></a>
                    </div>
                    @if(isset($message))
                        <p style="color:red;text-align: center;">{{$message}}</p>
                        @php unset($message) @endphp
                    @endif
                    <div class="btn btn__signin">
                        <button type="submit" style="margin: 0;">Đăng nhập</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('libs/fontawesome/js/all.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/js/standalone/selectize.min.js"></script>
<script src="{{url('dist/js/script.js')}}"></script>
<script src="{{ asset("js/script.js") }}"></script>
<script>

    //Show password button
    var dem = 0;
    dem++;
    $('#show-password').click(function(event) {
        dem++;
        if(dem%2==1)
        {
            $(this).closest(".login--input").find("input[name='password']").attr("type", "password");
            $('#show-password').html('<i class="fas fa-eye-slash" style="right: 25px; padding: 10px;cursor: pointer; top: 10px;display: inline-block;left: auto;"></i>');
        }
        else
        {
            $(this).closest(".login--input").find("input[name='password']").attr("type", "text");
            $('#show-password').html('<i class="fas fa-eye"></i>');
        }
    });
    // $('#show-password').mouseup(function(event) {
    //     $(this).closest(".login--input").find("input[name='password']").attr("type", "password");
    //     $('#show-password').html('<i class="fas fa-eye-slash" style="right: 25px; padding: 10px;cursor: pointer; top: 10px;display: inline-block;left: auto;"></i>');
    // });
    // $('#show-password').mousedown(function(event) {
    //     $(this).closest(".login--input").find("input[name='password']").attr("type", "text");
    //     $('#show-password').html('<i class="fas fa-eye"></i>');
    // });
</script>
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