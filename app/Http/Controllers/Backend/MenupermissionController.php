<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Module;
use App\Models\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenupermissionController extends Controller
{
    public function index($id)
	{
        $page_title 	= 'User Permissions';
        $menuData = Menu::where('status', '=', '1')->get();
        $moduleData = Module::where('status', '=', '1')->get();
        $userId = $id;
		return view('pages.user_management.role_permission',compact('page_title','menuData','moduleData','userId'));
	}

    public function manageMenupermission(Request $request)
    {
        $user_id = $request->user_id;
        $permissions = $request->permissions ?? []; // Form ke according 'permissions[]' name ka use ho raha hai
        
        if (!is_array($permissions)) {
            return response()->json(['res' => '0', 'error' => 'Invalid data received']);
        }
    
        // Remove existing permissions for the user
        UserPermission::where('user_id', $user_id)->delete();
    
        foreach ($permissions as $menu_id) {
            UserPermission::create([
                'user_id'      => $user_id,
                'menu_id'      => $menu_id,
                'status'       => '1', // Checkbox selected means "1"
                'organization' => Auth::user()->organization,
                'permission'   => 1, 
                'created_by'   => Auth::user()->id,
                'updated_by'   => Auth::user()->id,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    
        return response()->json(['res' => '1']);
    }
    
}
