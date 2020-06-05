<!-- Mixins--><!DOCTYPE html>
<html lang="en">
<head>
    <title>Đổi mật khẩu</title>
    <meta charset="utf-8"/>
    <meta name="description" content="The description"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1, shrink-to-fit=no, user-scalable=no"/>
    <meta name="keywords" content="coding, html, css"/>
    <meta name="author" content="someone"/>
    <!-- Styles-->
    


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
    integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"/>
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.default.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css"/>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet"/>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css"/>



    <link rel="stylesheet" type="text/css" href="{{url('dist/style.css')}}"/>
</head>
<body>
<div id="wrapper">
    <header id="header"></header>
    <!--#header-->
    <section class="chang-pass" id="chang-pass">
        <div class="container">
            <div class="chang-pass__wrap">
                <div class="chang-pass--user"><img src="/dist/images/icon-user.png" alt=""/></div>
                <div class="chang-pass--title">
                    <h2>Đổi mật khẩu</h2>
                </div>
                <div class="chang-pass--form">
                    <form action="{{route('post.user.changepass')}}" method="POST" id="change-password-form">
						{{ csrf_field() }}
                        <input id="old-password" type="password" name="oldPassword" placeholder="Mật khẩu cũ"/>
                        <div class="icon-check1" id="check1" style="display: none;"><i class="fas fa-check"></i></div>
                        <input id="new-password" type="password" name="password" placeholder="Mật khẩu mới"/>
                        <input id="retype-password" type="password" name="password_confirmation"
                               placeholder="Nhập lại mật khẩu mới"/>
                        <div class="icon-check2" id="check2" style="display: none;"><i class="fas fa-check"></i></div>
                        <div id="errors">
							@if(session()->has('message'))
                            <div class='alert alert-danger'> 
								{{session()->get('message')}}
                            </div>
							@endif
                        </div>
                        <div class="chang-pass--btn">
                            <button class="btn-save fleft" type="submit">Lưu lại</button>
                            <button class="btn-cancel fleft" type="button"><a href="{{URL::previous()}}">Hủy bỏ</a></button>
                            <div class="clear-fix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer"></footer>
    <!--#footer-->
</div>
<!--#wrapper-->
<!--JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/js/standalone/selectize.min.js"></script>
<script src="/dist/libs/ckeditor1/ckeditor.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{url('/dist/js/script.js')}}"></script>
<script>
   
</script>
</body>
</html>