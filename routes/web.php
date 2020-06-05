<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/','HomeController@getLogin')->name('get.login');
Route::post('/login','HomeController@postLogin')->name('post.login');
Route::get('/logout','HomeController@getLogout')->name('get.logout');

Route::get('/read-xml', 'HomeController@getReadXML');
Route::get('/rtf-to-html', function() {
    $rtf = file_get_contents(public_path() . "/dangcongsanthanhcong.rtf"); // or use a string
    dd(rtfToHtml($rtf));
});
Route::group(['prefix' => 'radiologist','middleware' => 'checklogin'], function() {

	Route::get('/changepassword','HomeController@getChangePass')->name('get.changepassword.view');
	Route::post('/changepassword','HomeController@postChangePass')->name('post.user.changepass');
	Route::post('/check-password', 'HomeController@postCheckPass')->name('post.user.checkpass');
	
    Route::get('/','RadiologistController@index')->name('get.radiologist');
    Route::get('/view_report', 'RadiologistController@view')->name('get.radiologist.view');
    Route::get('/make_report', 'RadiologistController@create')->name('get.radiologist.create');
	Route::get('/pdf_report', 'ExportTemplate@createUltrasound')->name('get.radiologist.printer');
	Route::post('/template','RadiologistController@ajaxChonTemplate')->name('post.radiologist.template');
    Route::post('/supplies','SuppliesController@ajaxChonThuoc')->name('post.radiologist.supplies');
    Route::get('/search','RadiologistController@search')->name('get.radiologist.search');
    Route::get('/change-status/{id}', 'RadiologistController@postChangeStatus')->name('get.radiologist.change_status');

    Route::get('/update-status/{id}', 'RadiologistController@UpdateStudyStatus')->name('get.radiologist.update_status');
    Route::get('/cancel-medical-record/{id}', 'RadiologistController@cancelMedicalRecord')->name('get.cancel.record');
    
    //xóa bệnh nhân khi tạo xong 
    Route::get('delete/{id}','RadiologistController@getDelmedical_bill')->name('del.medical_bill');

    Route::get('/abc', function() {
        $medical_bills = App\MedicalBill::all();
        ini_set('max_execution_time', 300); //300 seconds = 5 minutes
        foreach($medical_bills as $medical_bill) {
            $medical_bill->update(['study_status' => 2]);
        }
    }); 

    Route::post('/{id}', 'RadiologistController@update')->name('post.radiologist.update');
    //tái khám
    Route::get('/order-page', 'OrderController@index')->name('get.order.view');
    Route::get('/reorder-page', 'reOrderController@getReOrder')->name('get.reorder.view');  

    Route::post('/order-page', 'OrderController@store')->name('post.order.store');
    
    Route::get('/schedule-page', 'ScheduleController@index')->name('get.schedule.view');
    Route::get('/worklist-page', 'WorklistController@index')->name('get.worklist.view'); 
    Route::get('/reporting-page', 'ReportingController@index')->name('get.reporting.view');
    Route::get('/finalize-page', 'FinalizeController@index')->name('get.finalize.view'); 
    Route::get('/exams-page', 'ExamsController@index')->name('get.exams.view');

    Route::get('/image-page', 'RadiologistController@getImageView')->name('get.image.view');
    Route::get('/description-page', 'RadiologistController@getDescriptionView')->name('get.description.view');
    Route::get('/patientinfo-page', 'RadiologistController@getPatientInfoView')->name('get.patientinfo.view');

    Route::get('/pdfexport/{id}', 'RadiologistController@pdfexport')->name('get.print.pdf');
   
    
});
    Route::post('/reorder-page', 'reOrderController@store')->name('post.reorder.store');
    Route::post('/order','OrderController@store')->name('post.order.store');

    //sửa 
    Route::get('/editOder-page/{id}', 'MedicalBillController@edit')->name('edit_par');
    Route::post('/editOder-page/{id}', 'MedicalBillController@post_edit');
    //sửa thông tin thuốc
    Route::get('/supplies/edit/{id}', 'SuppliesController@edit_up')->name('edit_supp');
    Route::post('/supplies/edit/{id}', 'SuppliesController@update');
    //chi tiết thuốc
    Route::get('/supplies/chiTiet/{id}', 'SuppliesController@showHet')->name('showHet');
    //nhập thêm thuốc
    Route::get('/supplies/add/{id}', 'SuppliesController@add_up')->name('get_add_supp');
    Route::post('/supplies/add/{id}', 'SuppliesController@add')->name('add_supp');
      //xóa thuốc
    Route::get('delete/{id}','SuppliesController@destroy')->name('del.supplies');
   
    //xóa đơn kê
    Route::get('delete1/{id}','ProductAddMoreController@destroy')->name('del.product_stocks');

    //chấm công
    Route::post('','UserController@postChamCong')->name('post_cham_cong');

Route::group(['prefix' => 'admin','middleware' => ['checklogin', 'admin'] ], function() {
    Route::get('/', 'AdminController@index')->name('admin.index'); 
    Route::resource('template', 'TemplateController', ['as' => 'admin']);  
    Route::resource('supplies', 'SuppliesController', ['as' => 'admin']);  
    Route::group(['prefix' => 'settings'], function(){
    Route::resource('url2', 'SettingsController', ['as' => 'admin.settings'])->only(['index', 'update']);
    });
    Route::get('/statics','MedicalBillController@index')->name('get.statics.index');
    Route::post('/revert-status', 'MedicalBillController@postRevertStatus')->name('post.admin.revert_status');
	Route::get('/set-permission', "Admincontroller@getSetPermission")->name('admin.user.permission');
    Route::post('/change-permission', "Admincontroller@postChangePermission")->name('admin.change.permission');
	Route::resource('user', 'UserController', ['as' => 'admin']);   

});

Route::get("addmore","ProductAddMoreController@addMore")->name('addMore');
Route::post("addmore/{accession_number}","ProductAddMoreController@addMorePost")->name('addmorePost');
Route::get("addmore1","ProductAddMoreController@addMore1")->name('addMore1');
Route::post("addmore1/{accession_number}","ProductAddMoreController@addMorePost1")->name('addmorePost1');


//search ajax
Route::get('search', 'SearchController@getSearch');
Route::post('search/name', 'SearchController@getSearchAjax')->name('search');

Route::get('test', 'testController@test');
// Route::get('/a1a1','SuppliesController@ajaxChonThuoc')->name('post.radiologist.supplies');