<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Module;
use App\Models\Organization;
use App\Models\Pagging;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;
use App\Models\DefaultRolePermission;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
	public function index()
	{
		$page_title 	= 'Users';

		$menus = Menu::where('status', "1")
            ->where('parent_id', 0)
            ->with('children')     
            ->get();   
			
		return view('pages.user_management.users', compact('page_title','menus'));
	}

	public function addUser()
	{
		$page_title 	= 'Add User';
		$userData = '';
		
		$menus = Menu::where('status', "1")
            ->where('parent_id', 0)
            ->with('children')     
            ->get();
		
		return view('pages.user_management.add_user', compact('page_title', 'userData','menus'));
	}


	public function getUserData(Request $request)
	{
		$userData = User::select('users.*')
        ->where('users.id', '=', $request->id)
        ->first();
		
		return json_encode($userData);
	}



	public function manageUser(Request $request)
	{
		$user = Auth::user();
	    $menus= implode(',',$request->menus);
		$data = [
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'menus'  =>$menus,
			'email' => $request->email,
			'mobile_no' => $request->mobile_no,
			'status' => '1',
		];
	
		$user_id = $request->edit_id;
		$row = [];
	
		$check_user = User::check_users($data, $user_id);
	
		if (!empty($check_user)) {
			$row['res'] = '2';
		} elseif (!empty($user_id)) {
			$data['updated_by'] = $user->id;
			$data['updated_at'] = now();
	
	
			$updateid = User::where('id', $user_id)->update($data);
	
			if ($updateid) {
				$row['res'] = '3';
			} else {
				$row['res'] = '0';
			}
		} else {

			$data['password'] = Hash::make($request->password);
			$data['created_by'] = $user->id;
			$data['updated_by'] = $user->id;
			$data['created_at'] = now();
			$data['updated_at'] = now();

			$insertid = User::insertGetId($data);
			if ($insertid) {
				$getUser = User::find($insertid);
				$row['res'] = '1';
				
			} else {
				$row['res'] = '0';
			}
		} 

	
		return $row;
	}
	



	public function fetchUsers(Request $request)
	{
		$currentUserRole = Auth::user()->role_id;
		$currentUserId = Auth::user()->id;

		$where = "(user.created_by = $currentUserId OR user.id = $currentUserId)";

		if ($currentUserRole == 1) {
			$where .= " AND user.role_id = 2";
		} else {
			$where .= " AND user.status != '2'";
		}

		$aColumns = array(
			'user.id',
			'user.first_name',
			'login_histories.in_time as last_login',
			'user.last_name',
			'user.email',
			'user.status',
			'user.created_at',
		);

		$isWhere = array($where);
		$table = "users as user";
		$isJOIN = array(
			'left join (select user_id, max(in_time) as in_time from login_histories group by user_id) as login_histories on login_histories.user_id = user.id'
		);
		$hOrder = "user.id desc";
		$sqlReturn = Pagging::get_datatables($aColumns, $table, $hOrder, $isJOIN, $isWhere, $request);
		$appData = array();
		$no = $request->iDisplayStart + 1;

		foreach ($sqlReturn['data'] as $row) {
			$page_title = 'Users';
			$row_data = array();
			$row_data[] = $no;
			$row_data[] = $row->first_name . ' ' . $row->last_name;
			$row_data[] = $row->email;
			
			$last_login_formatted = date('d-M-Y H:i', strtotime($row->last_login));
			$row_data[] = !empty($row->last_login) ? $last_login_formatted : 'Not Logged In';

			$editbtn = '';
			$deletebtn = '';
			$menupermission = '';			
			$editbtn = '<a onclick="edit_record(' . $row->id . ')" type="button" class="btn btn-sm btn-primary"><span class="fe fe-edit"> </span></a> &nbsp';
			$deletebtn = '<a type="button" class="btn btn-sm btn-danger" onclick="delete_record(' . $row->id . ')"><span class="fe fe-trash-2"> </span></a> &nbsp';
			$menupermission = '<a href="'.url('menupermission/' . $row->id . '').'" type="button" class="btn btn-sm btn-success"><span class="fe fe-link"> </span></a> &nbsp';
			$row_data[] = $editbtn . $deletebtn .$menupermission ;
			$appData[] = $row_data;
			$no++;
		}

		$totalrecord = Pagging::count_all($aColumns, $table, $hOrder, $isJOIN, $isWhere, '');
		$numrecord = $sqlReturn['data'];
		$output = array(
			"sEcho" => intval($request->sEcho),
			"iTotalRecords" => $numrecord,
			"iTotalDisplayRecords" => $totalrecord,
			"aaData" => $appData
		);

		echo json_encode($output);
	}


	public function deleteUser(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('users')
			->where('id', $request->id)
			->delete();

		$row = array();
		if ($affected) {
			$row['res'] = 1;
		} else {
			$row['res'] = 0;
		}
		return json_encode($row);
	}

	public function userProfile()
	{
		$page_title    = 'User Profile';
		$userData 	   = User::with('organizationData')->where('id', Auth::user()->id)->first();
		return view('pages.user_management.user_profile', compact('page_title', 'userData'));
	}

	public function updateUserProfile(Request $request)
	{
		$user = Auth::user();

		$userData = [
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'mobile_no' => $request->mobile_no,
			'designation' => $request->designation,
			'telephone_direct' => $request->telephone_direct,
			'telephone_office' => $request->telephone_office,
			'address_line_one' => $request->address_line_one,
			'address_line_two' => $request->address_line_two,
			'city' => $request->city,
			'state' => $request->state,
			'country' => $request->country,
			'zip' => $request->zip,
			'facebook_url' => $request->facebook_url,
			'twitter_url' => $request->twitter_url,
			'linkedin_url' => $request->linkedin_url,
			'instagram_url' => $request->instagram_url,
			'personal_url' => $request->personal_url,
		];

		if (User::where('id', $user->id)->update($userData)) {
			return ['res' => '3'];
		} else {
			return ['res' => '0'];
		}
	}


	public function UpdateProfilePassword(Request $request)
	{
		if (!Hash::check($request->old_password, Auth::user()->password)) {
			$row['res'] = '2';
		} else {
			$update = User::whereId(Auth::user()->id)->update([
				'password' => Hash::make($request->password)
			]);
			if ($update) {
				$row['res'] = '1';
			} else {
				$row['res'] = '0';
			}
		}
		return $row;
	}

	

	public function changePassword()
	{
		$page_title 	= 'Change Password';
	
		return view('pages.user_management.change_password', compact('page_title'));
	}

	public function forgotPassword()
	{
		return view('auth.forgot-password');
	}

	public function forgotPasswordLink(Request $request)
	{
		$request->validate([
			'email' => ['required', 'email'],
		]);

		$user = User::where('email', $request->email)->first();
		if (!$user) {
			return response()->json(['res' => '2']);
		}

		$token = Password::createToken($user);

		$creator = User::where('role_id', 1)->first();
		if (!$creator || !$creator->email) {
			return response()->json(['res' => '3']);
		}

		$fromName = trim(($creator->first_name ?? '') . ' ' . ($creator->last_name ?? '')) ?: 'Default Name';

		$data = [
			'creator' => $creator,
			'user' => $user,
			'resetLink' => url(env('APP_URL') . route('password.reset', ['token' => $token, 'email' => $user->email], false)),
		];

		try {
			Mail::to($request->email)->send(new PasswordResetMail($data, $creator->email, $fromName));
			return response()->json(['res' => '1']);
		} catch (\Exception $e) {
			Log::error('Error sending password reset link: ' . $e->getMessage());
			return response()->json(['res' => '0', 'error' => $e->getMessage()]);
		}
	}




	

}
