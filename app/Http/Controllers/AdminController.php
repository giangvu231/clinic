<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Level;
use App\Status;
use App\UserStatus;
class AdminController extends Controller
{
    public function index(){
    	$user = Auth::user();
        return view('admin.index', compact('user'));
    }
	
	public function getSetPermission(Request $request)
    {
        $users = User::where('id', '<>', Auth::id());
        if($request->name) {
            $users = $users->where('hoten', 'like', '%' . $request->name . '%');
        }
		if($request->level_id) {
            $users = $users->where('level_id', $request->level_id);
        }
		$levels = Level::all();
        $statuses = Status::all();
        $users = $users->paginate(5);
        return view('admin.user.setPermission', compact('users','levels','statuses'));
    }

    public function postChangePermission(Request $request)
    {
        $status_ids = $request->status_id;
        foreach($status_ids as $user_id => $statuss) {
            $user_status = UserStatus::where("user_id",$user_id)->get();
            foreach ($user_status as $stt) {
                $stt->delete();
            }
            foreach ($statuss as $stt) {
                UserStatus::create([
                    'user_id' => $user_id,
                    'status_id' => $stt
                ]); 
            }
        }
        return redirect()->route('admin.user.permission');
    }
}
