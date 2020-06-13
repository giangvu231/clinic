
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
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('module/dist/style.css')); ?>" />
  </head>
  <body>
    <div id="wrapper">
      <section class="edit-template2" id="edit-template2">
        <div class="container">
          <form action="">
            <div class="edit-header">
              <div class="edit-header__wrap">
                <div class="edit-header__wrap--header">
                  <div class="topbar">
                    <div class="time"> 
                      <div class="tooltip-btn">
                        <div class="row">
                            <div class="col-sm-4">
                                <a class="" href="" onclick="window.location.reload(true)" data-placement="bottom" data-toggle="tooltip" title="Cập nhật kết quả">
                                  <i class="fas fa-sync-alt"></i>
                                </a>
								<span style="line-height: 22px;"><?php echo e($medical_bill->first_name); ?>

                                      <?php echo e($medical_bill->last_name); ?>  <?php echo e(date('d-m-Y', strtotime($medical_bill->birth_date))); ?>  <?php echo e($medical_bill->sex); ?></span>
                            </div>
      
                            <div class="col-sm-5">
                                <span class="" style="line-height: 22px;"><?php echo e($medical_bill->exam_name); ?> </span>
                            </div>

                            <div class="col-sm-3 text-right">
                                <div class="welcome">
                                  <p>Bác sĩ <span><?php echo e(Auth::user()->hoten); ?></span></p>
                                  <div class="popup" style="right: -7px;">
                                    <ul>
                                      <li><a href="<?php echo e(route('get.changepassword.view')); ?>">Đổi mật khẩu</a></li>
                                      <li><a href="<?php echo e(route('logout')); ?>">Đăng xuất</a></li>
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
                    <div class="" style="padding-left: 0">
                      <div class="edit-status">
                        <div class="edit-status__content">
                          <div class="input">
                                <div class="col10"><span style="font-size: 16px;
                                    font-weight: 400;
                                    display: block;
                                    line-height: 31px;
                                    font-weight: bold;">Kỹ thuật:</span></div>
                                <div class="col90">
                                  <p><?php echo e($medical_bill->ky_thuat); ?></p>
                                </div>
                            <div class="clear-fix"></div>
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
                    <span style="font-size: 16px;
                    font-weight: 400;
                    display: block;
                    line-height: 31px;
                    font-weight: bold;">Mô tả:</span>
                    <br/>
                  <div style="min-height: 200px"><?php echo preg_replace( "/\r|\n/", "</br>", $medical_bill->mota); ?></div>
                  <br/><br/><br/>
                  <div class="edit-template__result">
                    <div class="col10"><span>Kết luận:</span></div>
                    <div class="col90">
                      <p><?php echo e($medical_bill->ket_luan); ?></p>
                    </div>
                    <div class="clear-fix"></div>
                  </div>
				  <br/><br/>
                  <div class="reporting__wrap--button">
					<?php if($medical_bill->isEdit()): ?>
						<a class="main-btn" href="#"  onclick="openNewWindow('<?php echo e(route('get.radiologist.create',  ['accession_number' => $medical_bill->accession_number])); ?>')"><i class="fas fa-cog"></i>&nbsp;&nbsp;Sửa kết quả</a>
					<?php endif; ?>
					<?php if($medical_bill->isFinalize()): ?>
						<a class="main-btn" href="<?php echo e(route('get.radiologist.change_status', $medical_bill->id)); ?>"><i class="fa fa-print" aria-hidden="true"></i><span>&nbsp;&nbsp;Finalize</span></a>
					<?php endif; ?>
				  	<a class="main-btn" href="<?php echo e(route('get.radiologist.printer')."?accession_number=".$medical_bill->accession_number); ?>"><i class="fa fa-print" aria-hidden="true"></i><span>&nbsp;&nbsp;In kết quả</span></a>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
    <!--#wrapper-->
    <!--JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/js/standalone/selectize.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="<?php echo e(url('dist/js/script.js')); ?>"></script>
    <script>
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
    </script>
  </body>
</html>