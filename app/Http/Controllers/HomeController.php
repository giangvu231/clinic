<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Response;
use Gears\Pdf;
use Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\MedicalBill;
use Exception;


class HomeController extends Controller
{
    private $medical_bill;

    public function __construct(MedicalBill $medical_bill)
    {
        $this->medical_bill = $medical_bill;
    }

    public function index()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function convert(){
        Gears\Pdf::convert(public_path().'/abc.docx', public_path().'/abc.pdf');
    }

    public function getLogin()
    {
        if (!Auth::check()) {
            return view("login");
        }
        return redirect()->route('get.radiologist', ['user' => Auth::user()]);
    }

    public function postLogin(Request $request)
    {
        $remember = 0;
        if (!empty($request->remember)) {
            $remember = 1;
        }

            if (Auth::attempt(['userid' => $request->name, 'password' => $request->password], $remember)) {
				if(Auth::user()->isAdmin()){
					return redirect()->route('admin.index');
				}else{
					return redirect()->route('get.exams.view');
				}
            } else {
                $message = "Đăng nhập thất bại";
                return view('login',compact('message'));
            }
    }
    public function getChangePass()
    {
        return view('users.change_pass');
    }

    public function postChangePass(Request $request)
    {
        $rules = [
            'oldPassword' => 'required|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'required|confirmed|min:6|max:20|regex:/^[a-zA-Z0-9]+$/'
        ];

        $messages = [
            'oldPassword.required' => 'Vui lòng nhập mật khẩu cũ',
            'oldPassword.min' => 'Mật khẩu cũ phải có ít nhất 6 kí tự',
            'oldPassword.max' => 'Mật khẩu cũ không quá 20 kí tự',
            'password.required' => 'Vui lòng nhập mật khẩu mới',
            'oldPassword.regex' => 'Mật khẩu cũ không được chứa các kí tự đặc biệt',
            'password.regex' => 'Mật khẩu mới không được chứa các kí tự đặc biệt',
            'password.confirmed' => 'Nhập lại mật khẩu mới không trùng khớp',
            'password.max' => 'Mật khẩu mới không quá 20 kí tự',
            'password.min' => 'Mật khẩu mới phải có ít nhất 6 kí tự'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
			session()->flash('message',$validator->errors()->first());
			return back();
        }
        if (Hash::check($request->oldPassword, Auth::user()->password)) {
            $validator = Validator::make($request->all(), [
                'oldPassword' => 'required|min:6|max:20',
                'password' => 'different:oldPassword'
            ], [
                'password.different' => 'Mật khẩu mới không được giống mật khẩu cũ',
            ]);

            if ($validator->fails()) {
                session()->flash('message',$validator->errors()->first());
				return back();
            } else {
                $user = Auth::user();
                $user->password = bcrypt($request->password);
                $user->save();
                session()->flash('success', 'Thành công');
                Auth::logout();
                return redirect()->route('get.login');
            }
        } else {
            session()->flash('message','Mật khẩu cũ không chính xác');
			return back();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        session()->flash('message', 'Đăng xuất thành công');
        return redirect()->route('get.login');
    }


    public function postCheckPass(Request $request)
    {
        if (Hash::check($request->oldPassword, Auth::user()->password)) {
            return Response::json([
                'message' => "Right password"
            ], 200);
        }

        return Response::json([
            'message' => "Wrong password"
        ], 400);
    }

    public function getReadXML(Request $request){

        $disk = Storage::disk('PACS_Report');
        $files = $disk->files("XML/XML_IN");
        $success = 0;
        $error = 0;
        foreach($files as $key => $file) {
            try {
                $path = $disk->path($file);
                $xml = XmlParser::load($path);
                $data = $xml->parse([
                    //Patient Info
                    'patient_id' => ['uses' => 'Patient.PatientID'],
                    'first_name' => ['uses' => 'Patient.FirstName'],
                    'last_name' => ['uses' => 'Patient.LastName'],
                    'birth_date' => ['uses' => 'Patient.BirthDate'],
                    'sex' => ['uses' => 'Patient.Sex'],
                    //Order Create Schedule Info
                    'order_number' => ['uses' => 'ORDER.CreateSchedule.OrderNumber'],
                    'accession_number' => ['uses' => 'ORDER.CreateSchedule.AccessionNumber'],
                    'exam_code' => ['uses' => 'ORDER.CreateSchedule.Exam_Code'],
                    'exam_name' => ['uses' => 'ORDER.CreateSchedule.Exam_Name'],
                    'schedule_date' => ['uses' => 'ORDER.CreateSchedule.ScheduleDate'], //date
                    'schedule_time' => ['uses' => 'ORDER.CreateSchedule.ScheduleDate'], //time
                    'ordering_doctor_id' => ['uses' => 'ORDER.CreateSchedule.OrderingDoctorID'],
                    'ordering_doctor_name' => ['uses' => 'ORDER.CreateSchedule.OrderingDoctorName'],
                    'ordering_dept' => ['uses' => 'ORDER.CreateSchedule.OrderingDept'],
                    'reason' => ['uses' => 'ORDER.CreateSchedule.Reason'],
                    'order_status' => ['uses' => 'ORDER.CreateSchedule.OrderStatus'],
                    //Order Patient Visit Info
                    'visit_number' => ['uses' => 'ORDER.PatientVisit.VisitNumber'],
                    'exam_dept' => ['uses' => 'ORDER.PatientVisit.Exam_Dept'],
                    'exam_room' => ['uses' => 'ORDER.PatientVisit.Exam_Room'],
                    'admit_datetime' => ['uses' => 'ORDER.PatientVisit.Admin_DateTime'],
                    'pregnant' => ['uses' => 'ORDER.PatientVisit.Pregnant'],
                    //Status Update Info
                    'sending_facility' => ['uses' => 'StatusUpdate.SendingFacility'],
                    'message_type' => ['uses' => 'StatusUpdate.MessageType'],
                    'message_control_id' => ['uses' => 'StatusUpdate.MessageControlID'],
                    'study_status' => ['uses' => 'StatusUpdate.StudyStatus'],
                    //Result_Ketqua Info
                    'loai_thiet_bi' => ['uses' => 'Result_Ketqua.Loai_thietbi'],
                    'ky_thuat' => ['uses' => 'Result_Ketqua.Ky_thuat'],
                    'mota' => ['uses' => 'Result_Ketqua.Mota'],
                    'ket_luan' => ['uses' => 'Result_Ketqua.Ketluan'],
                    'de_nghi' => ['uses' => 'Result_Ketqua.Denghi'],
                    //
                    'radiologist_bacsidoc' => ['uses' => 'Radiologist_Bacsidoc'],
                    'radiologist_id' => ['uses' => 'Radiologist_id']
                ]);
                
                $data['schedule_date'] = substr($data['schedule_date'], 0, 8);
                $data['schedule_time'] = substr($data['schedule_time'], 8, 4);
                $data['schedule_date'] ? $data['schedule_date'] : NULL;
                $data['schedule_time'] ? $data['schedule_time'] : NULL; 

                $medical_bill = MedicalBill::where('accession_number', $data['accession_number'])->first();

                if($medical_bill) {
                    //Condition 1: Check patient info
                    if($medical_bill->patient_id != $data['patient_id']) {
                        $disk->append('XML/xml.log', now().' ' . $data['order_number'] . ' PatientID không đúng');
                        $disk->move($file, "XML/XML_ERROR/" . explode("/", $file)[1] . "");
                        $disk->append('XML/xml.log', now().' ' . $data['order_number'] . ' Sai thông tin bệnh nhân');
                        $error++;
                        break;
                    }
                    
                    if($medical_bill->first_name.' '.$medical_bill->last_name != $data['first_name'].' '.$data['last_name']) {
                        $disk->append('XML/xml.log', now().' ' . $data['order_number'] . ' Tên không đúng');
                        $disk->move($file, "XML/XML_ERROR/" . explode("/", $file)[1] . "");
                        $disk->append('XML/xml.log', now().' ' . $data['order_number'] . ' Sai thông tin bệnh nhân');
                        $error++;
                        break;
                    }
                    
                    //Condition 2: Check order number
                    if($medical_bill->order_number != $data['order_number']) {
                        $disk->append('XML/xml.log', now().' ' . $data['order_number'] . ' OrderNumber không đúng');
                        $disk->move($file, "XML/XML_ERROR/" . explode("/", $file)[1] . "");
                        $disk->append('XML/xml.log', now().' ' . $data['order_number'] . ' Sai thông tin order');
                        $error++;
                        break;
                    }
                    
                    if($data['study_status'] >= $medical_bill->study_status) {
                        $medical_bill->update($data);
                        $disk->append('XML/xml.log', now().' ' . $data['order_number'] . ' Cập nhật thành công');
                        $disk->move($file, "XML/XML_SUCCESS/" . explode("/", $file)[1] . "");
                        $success++;
                    }else {
                        $disk->move($file, "XML/XML_ERROR/" . explode("/", $file)[1] . "");
                        $disk->append('XML/xml.log', now().' ' . $data['order_number'] . ' Status nhỏ hơn');
                    }
                    
                } else {
                    $this->medical_bill->create($data);
                    $disk->append('XML/xml.log', now().' ' . $data['order_number'] . ' Lưu thành công');
                    $success++;
                }
            } catch(Exception $e) {
                $disk->move($file, "XML/XML_ERROR/" . explode("/", $file)[1] . "");
                $disk->append('XML/xml.log', now().' Lỗi định dạng file');
            }
        }
        
    }

}
