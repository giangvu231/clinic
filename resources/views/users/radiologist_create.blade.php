<!-- Mixins-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Themes</title>
    <meta charset="utf-8" />
    <meta name="description" content="The description" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, shrink-to-fit=no, user-scalable=no" />
    <meta name="keywords" content="coding, html, css" />
    <meta name="author" content="someone" />
    <!-- Styles-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
    crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
    crossorigin="anonymous" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('module/dist/style.css')}}" />
    <style>
      .button_hover:hover span{
       color:#fff;
   }
   .button_hover:hover span a{
    color:#fff;
}
button.button_hover
{
    background-color: #00BD9C !important;
}
</style>
</head>

<body>
    <div id="wrapper">
        <section class="edit-template2" id="edit-template2">
            <div class="container">
                <div class="edit-header">
                    <div class="edit-header__wrap">
                        <div class="edit-header__wrap--header">
                            <div class="topbar">
                                <div class="time"> 
                                    <div class="tooltip-btn">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <a class="" href="" onclick="window.location.reload(true)" data-placement="bottom" data-toggle="tooltip" title="Trang chủ">
                                                    <i class="fas fa-home" style="background-color: #00BD9C;"></i>
                                                </a>
                                                <span style="line-height: 22px;">{{ $medical_bill->first_name }}
                                                    {{$medical_bill->last_name }}  {{date('d-m-Y', strtotime($medical_bill->birth_date)) }}  {{
                                                    $medical_bill->sex }}</span>
                                                </div>

                                                <div class="col-sm-5">
                                                    <span class="" style="line-height: 22px;">{{ $medical_bill->exam_name }} </span>
                                                </div>

                                                <div class="col-sm-3 text-right">
                                                    <div class="welcome">
                                                        <p>Bác sĩ <span>{{ Auth::user()->hoten }}</span></p>
                                                        <div class="popup" right: -7px;>
                                                            <ul>
                                                                <li><a href="{{route('get.changepassword.view')}}">Đổi mật khẩu</a></li>
                                                                <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="contentbar">
                                    <div class="col33">
                                        <div class="edit-service">
                                            <div class="edit-service__content">
                                                <div class="edit-service__content--input"><span class="fleft span-title" style="font-weight: bold">Chọn template:</span>
                                                    <select class="select_template enter fleft" name="image">
                                                        @foreach($templates as $template)
                                                        <option value="{{$template->TuDienKetQua_Id}}">{{$template->TenNoiDung}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="clear-fix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width: 20%;float: left">
                                        <button id="quick-select" class="btn" style="background-color: #00BD9C; color: #fff;">Chọn nhanh</button>
                                    </div>
                                    <div class="col33">
                                        <div class="edit-status">
                                            <div class="edit-status__content">
                                                <div class="input"><span style="font-weight: bold">Kỹ thuật:</span>
                                                    <input type="text" name="kythuat" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="edit-template__ckeditor">
                        <div class="reporting--margin">
                            <div class="edit-template__ckeditor2">
                                <div class="col10"><span style="font-weight: bold">Mô tả:</span></div>
                                <div class="col90">
                                    <textarea id="summernote" name="mota" cols="30" rows="10">{!! preg_replace( "/\r|\n/", "</br>", $medical_bill->mota) !!}</textarea>  
                                </div>
                                <div class="edit-template__result">
                                    <div class="col10"><span style="font-weight: bold">Kết luận:</span></div>
                                    <div class="col90">
                                        <textarea id="ket_luan" name="ket_luan" cols="30" rows="3">{{ $medical_bill->ket_luan }}</textarea>
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                                <div class="reporting__wrap--button">
                                    {{-- <button id="sua" onclick="window.open(document.URL, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i
                                        class="fas fa-cog"></i><span>&nbsp;&nbsp;Sửa kết quả</span></button> --}}
                                        <button id="luu" class="button_hover"><i class="fa fa-floppy-o" aria-hidden="true"></i><span>&nbsp;&nbsp;Lưu kết quả</span></button>
                                        <button id="btn_printer" class="button_hover"><i class="fa fa-print" aria-hidden="true"></i><span><a style="display:inline"> &nbsp;&nbsp;In kết quả</a></span></button>
                                        {{-- href="{{route('get.radiologist.printer')."?pdf_report=".$medical_bill->accession_number }}" --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
            <!--#wrapper-->
            <!--JS-->
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            {{-- <script src="{{url('dist/libs/jQuery/jquery.min.js')}}"></script>
            <script src="{{url('dist/libs/owlCarousel/owl.carousel.min.js')}}"></script>
            <script src="{{url('dist/libs/validate/additional-methods.min.js')}}"></script>
            <script src="{{url('dist/libs/validate/jquery.validate.min.js')}}"></script>
            <script src="{{url('dist/libs/flexslider/jquery.flexslider-min.js')}}"></script>
            <script src="{{url('dist/libs/elevatezoom/jquery.elevatezoom.js')}}"></script> --}}
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/js/standalone/selectize.min.js"></script>
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
            <script src="{{ url('dist/js/script.js') }}"></script>

            <script>
              $("#btn_printer").click(function(){
               window.location.href= "{{route('get.radiologist.printer')."?accession_number=".$medical_bill->accession_number }}";
           });
              $('#luu').click(function (e) {
                e.preventDefault();

                var mota = $("#summernote").val();
                var ket_luan = $('#ket_luan').val();
                $.ajax({
                    url:"{{route('api.post.radiologist.update', ['id' => $medical_bill->id,'user_id'=>Auth::id()])}}",
                    type:"POST",
                    data:{
                     mota: mota,
                     ket_luan: ket_luan,
                     user_id: "{{Auth::user()->chung_thu_so}}",
                     user_hoten: "{{Auth::user()->hoten}}"
                 },
                 success:function(dt){
                    // console.log(dt);
                    //window.location.href = dt.url;
                    window.close();
                },
                error:function(err){console.log(err);}
            });
            });

              $('#quick-select').click(function() {
                var postData = "quick={{$medical_bill->exam_code}}";
                console.log(postData);
            // debugger;
            var url = "{{route('post.radiologist.template')}}";
            console.log(url);

            var http = new XMLHttpRequest();
            console.log(http);
            http.open('POST', url, true);
            
            //Send the proper header information along with the request
            http.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            http.onreadystatechange = function() {//Call a function when the state changes.
                if(http.readyState == 4 && http.status == 200) {
                    console.log(http.responseText);
                    var data = JSON.parse(http.responseText).data.replace(/\r\n/g,"<br>");
                    if(data != "false") {
                        $('#summernote').summernote('code', data);
                    } else {
                        alert("Không tồn tại template tương ứng");
                    }
                    
                }
            }
            http.send(postData);
        });

              $(".select_template").change(function() {
                var id = $(this).val();
                var postData = "TuDienKetQua_Id=" + id;
                console.log(postData);
            // debugger;
            var url = "{{route('post.radiologist.template')}}";
            console.log(url);

            var http = new XMLHttpRequest();
            console.log(http);
            http.open('POST', url, true);
            
            //Send the proper header information along with the request
            http.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            http.onreadystatechange = function() {//Call a function when the state changes.
                if(http.readyState == 4 && http.status == 200) {
                    var data = JSON.parse(http.responseText).data.replace(/\r\n/g,"<br>");
                    if(data != "false") {
                        $('#summernote').summernote('code', data);
                    } else {
                        alert("Không tồn tại template tương ứng");
                    }
                }
            }
            http.send(postData);

        });
              $('#summernote').summernote({
            height: 100,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ]
            });
        </script>
    </body>

    </html>