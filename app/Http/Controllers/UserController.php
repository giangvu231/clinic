<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Level;
use Validator;
use Auth;
use DB;
use App\ChamCong;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('id', '<>', Auth::id());
        if ($request->username) {
            $users = $users->where('username', 'like', '%' . $request->username . '%');
        }
        if ($request->status > -1) {
            $users = $users->where('status', $request->status);
        }
        $users = $users->paginate(20);
        return view('admin.user.index', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$levels = Level::all();
        return view('admin.user.create',compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$rules = [
			'hoten' => 'required|max:100',
			'userid' => 'required|unique:users,userid',
			'chung_thu_so' => 'required|max:15|unique:users,chung_thu_so|regex:/^[a-zA-Z0-9]/',			
			'status' => 'required|numeric',
			'level_id'=> 'required|numeric|min:1',
			'password' => 'required|confirmed|min:6|max:20|regex:/^[a-zA-Z0-9]+$/'
        ];
        $messages = [
            'hoten.required' => 'Họ tên không được để trống',
            'hoten.max' => 'Tên chỉ được tối đa 100 kí tự',
            'userid.required' => 'Tên tài khoản không được để trống',
            'userid.unique' => 'Tên tài khoản đã được sử dụng',
            'chung_thu_so.required' => 'Mã bác sỹ không được để trống',
            'chung_thu_so.max' => 'Mã bác sỹ tối đa 15 kí tự',
            'chung_thu_so.unique' => 'Mã bác sỹ đã được sử dụng',
            'chung_thu_so.regex' => 'Mã bác sỹ chỉ bao gồm chữ thường, chữ hoa và chữ số',
            'status.required' => 'Trạng thái không được để trống',
            'level_id.required' => 'Loại không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.confirmed' => 'Nhập lại mật khẩu không đúng',
            'password.min' => 'Mật khẩu có ít nhất 6 kí tự',
            'password.max' => 'Mật khẩu tối đa 20 kí tự',
            'password.regex' => 'Mật khẩu chỉ gồm chữ thường, chữ hoa và số'
        ];
		$validator = Validator::make($request->all(), $rules, $messages);
		if ($validator->fails()) {
			session()->flash('error',$validator->errors()->first());
			return back();
        }
		
		$user = User::create($request->all());
		session()->flash('message',"Thêm một người dùng thành công");
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$user = User::findOrFail($id);
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$levels = Level::all();
		$user = User::findOrFail($id);
        return view('admin.user.edit',compact('user','levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		if($request->password) {
            $rules = [
                'hoten' => 'required|max:100',		
                'status' => 'required|numeric',
                'level_id'=> 'required|numeric|min:1',
                'password' => 'confirmed|min:6|max:20|regex:/^[a-zA-Z0-9]+$/'
            ];
            $messages = [
                'hoten.required' => 'Họ tên không được để trống',
                'hoten.max' => 'Tên chỉ được tối đa 100 kí tự',
                'status.required' => 'Trạng thái không được để trống',
                'level_id.required' => 'Loại không được để trống',
                'password.confirmed' => 'Nhập lại mật khẩu không đúng',
                'password.min' => 'Mật khẩu có ít nhất 6 kí tự',
                'password.max' => 'Mật khẩu tối đa 20 kí tự',
                'password.regex' => 'Mật khẩu chỉ gồm chữ thường, chữ hoa và số'
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                session()->flash('error',$validator->errors()->first());
                return back();
            }
        }
		
		$user = User::findOrFail($id);
		if (!empty($request->password)) {
			$rules = [
				'password' => 'confirmed|min:6|max:50|regex:/^[a-zA-Z0-9]+$/',
			];
			$validator = Validator::make($request->all(), $rules);
			if ($validator->fails()) {
				session()->flash('error',$validator->errors()->first());
				return back();
			}
			$user->update($request->only([
				'hoten','dien_thoai','di_dong','status','level_id','password'
			]));
        }else{
			$user->update($request->only([
                'hoten','dien_thoai','di_dong'
                ,'status','level_id'
			]));
		}
		session()->flash('message',"Cập nhật một người dùng thành công");
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
		$user->delete();
		session()->flash('message',"Xóa một người dùng thành công");
		return redirect()->route('admin.user.index');
    }

    //chấm công 
    public function postChamCong(Request $request)
    {
        $ten_nv             = $request->input('ten_nv');
        $ngay_cham             = $request->input('ngay_cham');
        $so_cong             = $request->input('so_cong');   
        $data = array(
            'ten_nv'            => $ten_nv,
            'ngay_cham'            => $ngay_cham,
            'so_cong' => $so_cong
        );
        DB::table("chamcong")->insert($data);
    
        return back();
    }
}
