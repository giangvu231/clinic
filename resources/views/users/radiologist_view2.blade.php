
<!-- Mixins--><!DOCTYPE html>
<html lang="en">
<head>
  <title>Themes</title>
  <meta charset="utf-8"/>
  <meta name="description" content="The description"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, shrink-to-fit=no, user-scalable=no"/>
  <meta name="keywords" content="coding, html, css"/>
  <meta name="author" content="someone"/>
  <!-- Styles-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
  crossorigin="anonymous" />
    {{--
    <link rel="stylesheet" href="{{url('module/dist/libs/bootstrap-3/css/bootstrap-theme.min.css')}}" />
    <link rel="stylesheet" href="{{url('module/dist/libs/bootstrap-3/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('module/dist/libs/owlCarousel/assets/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('module/dist/libs/owlCarousel/assets/owl.carousel.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('module/dist/libs/owlCarousel/assets/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('module/dist/libs/flexslider/flexslider.min.css')}}" /> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous" /> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.css') }}"> --}}
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    {{-- <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{url('module/dist/style.css')}}" />
    <style type="text/css">
      .main-btn
      {
        color: #fff;
        background-color: #00BD9C;
        font-weight: 500;
      }
      .main-btn:hover
      {
        color: #fff;
      }
      .edit-template2
      {
        background-color: #fff;
        padding: 0;
      }
      body
      {
        font-size: 14px;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
      }
      .edit-template2 .topbar 
      {
        padding: 0px;
        border-bottom: 0px solid #dddddd;
      }
      .detail
      {
        margin-top: 30px;
      }
      table tr td
      {
        font-weight: 500;
      }
      table tr td span
      {
        font-weight: 700;
      }
    </style>
  </head>
  <body>
    <div id="wrapper">
      <section class="edit-template2" id="edit-template2">
        

        <div class="container" style="margin-bottom: 30px;">
          <div class="row">
            <div class="topbar col-lg-12">
              <div class="time fleft">
                <div class="tooltip-btn fleft">
                  <a class="fleft" href="{{route('get.radiologist')}}" data-placement="bottom" data-toggle="tooltip" title="Trang chủ"><i class="fas fa-home" style="background-color: #00BD9C"></i></a>
                  <a class="fleft" href="" onclick="window.location.reload(true)" data-placement="bottom" data-toggle="tooltip" title="Cập nhật kết quả" style="margin-top: 5px; margin-left: 10px;"><i class="fas fa-sync-alt"></i></a>
                  <span class="fleft" style="margin-left: 10px; font-size: 16px;">Today, {{ date('d/m/Y') }}</span>
                </div>
                <div class="fright" style="font-size: 16px; margin-left: 50px;">
                  <span>{{ $medical_bill->accession_number }}</span>
                  <span>{{ $medical_bill->first_name }}</span>
                  <span>{{ $medical_bill->exam_name }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row detail">
              <ul class="nav nav-tabs w-100" style="font-weight: bold;"> 
                <li class="nav-item active">
                  <a href="#3" class="nav-link" data-toggle="tab">Hình ảnh</a>
                </li>
                <li class="nav-item">
                  <a href="#2" class="nav-link" data-toggle="tab">Mô tả & Kết luận</a>
                </li>
                <li class="nav-item">
                  <a href="#1" class="nav-link" data-toggle="tab">Thông tin bệnh nhân</a>
                </li>   
              </ul>
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="tab-content col-lg-12" style="margin-top: 10px;">
                <div class="tab-pane" id="1">
                  <table border="0" cellpadding="10" width="100%" style="line-height: 50px;">
                    <tr>
                      <th colspan="4" style="text-align: center; font-size: 20px;">Thông tin bệnh nhân</th>
                    </tr>
                    <tr>
                      <td colspan="4">Mã CSKCB: <span>{{ $medical_bill->accession_number }}</span></td>      
                    </tr>
                    <tr>
                      <td colspan="4">Mã bệnh nhân: <span>{{ $medical_bill->patient_id }}</span></td>
                    </tr>
                    <tr>
                      <td colspan="4">Mã hồ sơ: <span>{{ $medical_bill->order_number }}</span></td>
                    </tr>
                    <tr>
                      <td width="50%" colspan="2">Tên bệnh nhân: <span>{{ $medical_bill->first_name }}</span></td>
                      <td width="50%" colspan="2">Giới tính: <span>{{ $medical_bill->sex }}</span></td>
                    </tr>
                    <tr>
                      <td colspan="2">Ngày sinh: <span>{{ $medical_bill->birth_date }}</span></td>
                      <td colspan="2">Cân nặng: <span>{{ $medical_bill->can_nang }}</span></td>
                    </tr>
                    <tr>
                      <td colspan="4">Địa chỉ: <span>{{ $medical_bill->address }}</span></td>
                    </tr>
                    <tr>
                      <td colspan="2">Mã thẻ bảo hiểm y tế: <span>{{ $medical_bill->ma_the }}</span></td>
                      <td colspan="2">Nơi đăng ký ban đầu: <span>{{ $medical_bill->ma_dkbd }}</span></td>
                    </tr>
                    <tr>
                      <td colspan="4">Giá trị thẻ: 
                        <span>{{ substr($medical_bill->gt_the_tu,6,2) }}/{{ substr($medical_bill->gt_the_tu,4,2) }}/{{ substr($medical_bill->gt_the_tu,0,4) }} - {{ substr($medical_bill->gt_the_den,6,2) }}/{{ substr($medical_bill->gt_the_den,4,2) }}/{{ substr($medical_bill->gt_the_den,0,4) }}</span>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">Tên bệnh: <span>{{ $medical_bill->reason }}</span></td>
                      <td>Mã bệnh: <span>{{ $medical_bill->ma_benh }}</span></td>
                    </tr>
                    <tr>
                      <td width="25%">Mã khoa: <span>{{ $medical_bill->ordering_dept }}</span></td>
                      <td width="25%">Mã giường: <span>{{ $medical_bill->ma_giuong }}</span></td>
                      <td colspan="2">Mã bệnh viên: <span>{{ $medical_bill->ma_cskcb }}</span></td>
                    </tr>
                    <tr>
                      <td width="25%" colspan="2">Mã dịch vụ: <span>{{ $medical_bill->exam_code }}</span></td>
                      <td width="25%" colspan="2">Mã PTTT: <span>{{ $medical_bill->loai_thiet_bi }}</span></td>  
                    </tr>
                    <tr>
                      <td colspan="4">Tên dịch vụ: <span>{{ $medical_bill->exam_name }}</span></td> 
                    </tr>
                    <tr>
                      <td colspan="2">Số lượng: <span>{{ $medical_bill->so_luong }}</span></td>
                      <td colspan="2">Phạm vi: <span>{{ $medical_bill->pham_vi }}</span></td>
                    </tr>
                    <tr>
                      <td colspan="2">Mã bác sĩ: <span>{{ $medical_bill->radiologist_id }}</span></td>
                      <td colspan="2">Tên bác sĩ: <span>{{ $medical_bill->radiologist_bacsidoc }}</span></td>
                    </tr>
                    <tr>
                      <td colspan="2">Ngày chỉ định: <span>{{ $medical_bill->schedule_date }}</span></td>
                      <td colspan="2">Ngày kết quả: <span>{{ $medical_bill->ngay_kq }}</span></td>
                    </tr>
                  </table>
                </div>
                <div class="tab-pane" id="2">
                  <table border="0" width="100%" cellpadding="10">
                    @if ($medical_bill->study_status == 3)
                    <tr style="text-align: center;">
                      <td colspan="2" style="line-height: 50px;">
                        <label>Chọn template :</label>
                        <select style="padding: 5px;" class="select_template" name="templates_pdf">
                          <?php $templates = DB::table('templates')->get() ?>
                          @foreach($templates as $template)
                          <option value="{{ $template->TuDienKetQua_Id }}">{{$template->TenNoiDung}}</option>
                          @endforeach
                        </select>
                        {{-- <a id="quick-select" class="main-btn" style="background-color: #00BD9C; color: #fff; margin-left: 150px;">Chọn nhanh</a> --}}
                      </td>
                    </tr>
                    @endif
                    <tr style="vertical-align: top;">
                      <td style="font-weight: bold; font-size: 16px;" width="10%">Mô tả :</td>
                      <td>
                        @if ($medical_bill->study_status == 3)
                        <textarea id="summernote" name="mota" cols="30" rows="10">{!! preg_replace( "/\r|\n/", "</br>", $medical_bill->mota) !!}</textarea>
                        @endif
                        @if ($medical_bill->study_status == 4)
                        <div>{!! preg_replace( "/\r|\n/", "</br>", $medical_bill->mota) !!}</div> 
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr style="vertical-align: top;">
                      <td style="font-weight: bold; font-size: 16px;">Kết luận :</td>
                      <td>
                        @if ($medical_bill->study_status == 3)
                        <textarea id="ket_luan" name="ket_luan" cols="30" rows="3" class="w-100">{{ $medical_bill->ket_luan }}</textarea>
                        @endif
                        @if ($medical_bill->study_status == 4)
                        <div>{{ $medical_bill->ket_luan }}</div>
                        @endif
                      </td>
                    </tr>

                    <tr>
                      <td colspan="2" style="text-align: right; height: 70px;">
                        @if ($medical_bill->study_status == 3)
                        <div class="input-group">
                          <span class="input-group-addon">Chọn template</span>
                          <select style="padding: 5px;" class="select_template" name="templates_pdf">
                            <?php $templates = DB::table('templates')->get() ?>
                            @foreach($templates as $template)
                            <option value="{{ $template->TuDienKetQua_Id }}">{{$template->TenNoiDung}}</option>
                            @endforeach
                          </select>
                        </div>
                        @endif
                        @if ($medical_bill->isEdit())
                        <a id="luu" class="main-btn" style="color: #fff;"><i class="fa fa-floppy-o" aria-hidden="true"></i><span>&nbsp;&nbsp;Lưu kết quả</span></a>
                        @endif
                        @if ($medical_bill->isFinalize())
                        <a class="main-btn" href="{{route('get.radiologist.change_status', $medical_bill->id)}}"><i class="far fa-check-square"></i><span>&nbsp;&nbsp;Finalize</span></a>
                        @endif
                        <a id="btn_printer" class="main-btn" style="color: #fff;"><i class="fa fa-print" aria-hidden="true"></i><span>&nbsp;&nbsp;In kết quả</span></a>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="tab-pane active" id="3">
                  <div style="text-align: center; font-size: 20px; font-weight: bold; margin-bottom: 30px;">Hình ảnh</div>
                  {{-- <div style="font-size: 30px; font-weight: bold; text-align: center;"><a href="http://192.168.1.7/clinicalstudio/integration/viewer?mrn={{ $medical_bill->patient_id }}&acc={{ $medical_bill->ma_cdct }}" target="_blank">Click vào đây để tiến hành xem ảnh</a></div> --}}
                  <iframe src="http://192.168.1.7/clinicalstudio/integration/viewer?mrn={{ $medical_bill->patient_id }}&acc={{ $medical_bill->ma_cdct }}" frameborder="0" width="100%" height="1100px"></iframe>
                </div>
              </div>
            </div>
          </div>

        </section>
      </div>
      <!--#wrapper-->
      <!--JS-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- <script src="{{url('dist/libs/jQuery/jquery.min.js')}}"></script>
    <script src="{{url('dist/libs/owlCarousel/owl.carousel.min.js')}}"></script>
    <script src="{{url('dist/libs/validate/additional-methods.min.js')}}"></script>
    <script src="{{url('dist/libs/validate/jquery.validate.min.js')}}"></script>
    <script src="{{url('dist/libs/flexslider/jquery.flexslider-min.js')}}"></script>
    <script src="{{url('dist/libs/elevatezoom/jquery.elevatezoom.js')}}"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script> --}}
    {{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>  --}}
    {{-- <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>  --}}
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
{{--     <script type="text/javascript" src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/bootstrap.js') }}"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
    {{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/js/standalone/selectize.min.js"></script> --}}
    {{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}
    <script src="{{url('dist/js/script.js')}}"></script>
    <script type="text/javascript">
      function openNewWindow(url) {
       var params = [
       'height='+screen.height,
       'width='+screen.width,
       'scrollbars=yes',
       'status=yes',
       'location=yes'
       ].join(',');
       var popup = window.open(url, 'popup_window', params); 
       popup.moveTo(0,0);
     }
     $('#summernote').summernote({
      toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['picture']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ],
                height: 500,                
                minHeight: 150,           
                maxHeight: 500,             
                focus: true,
                placeholder: 'Nơi viết mô tả'    
              });
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
                    window.location.reload(true)
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
        </script>
      </body>
      </html>