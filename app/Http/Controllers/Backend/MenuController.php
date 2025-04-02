<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Module;
use App\Models\Pagging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
		
				  
			
	
    public function index()
	{
        $menuData  = '';
        $page_title 	= 'Menus';
        // $menu_list      = Menu::menu_role_permission(Auth::user()->id);
        // $control_type   = Menu::menu_control_type($page_title, Auth::user()->id);
        // foreach ($menu_list as $menuraw) {
        //     if ($page_title == $menuraw->name) {
        //         $control_type = $menuraw->control_type;
        //     }
        // }


        $moduleData = Module::where('status', '=', '1')->get();
		return view('pages.user_management.menus',compact('page_title','menuData','moduleData'));
	}

  
    public function manageMenu(Request $request)
    {
        $menu_id = $request->edit_id;
        $row = array();
        if (!empty($menu_id)) {
        $data = array(
            'module_id' 	 => $request->edit_module_id,
            'name' 	 		 => $request->edit_menu_name, 
            'parent_id'  	 => $request->edit_parent_id,
            'icon'  		 => $request->edit_icon,
            'link'  		 => $request->edit_menu_link,
            'order_by'   	 => $request->edit_order_by,
            'status'         => $request->status,
            'updated_by'     => Auth::user()->id,
            'updated_at'     => now()
        );
            $updateid = Menu::where('id', $menu_id)->update($data);
            
            if ($updateid) {
                $row['res'] = '3';
            } else {
                $row['res'] = '0';
            }
        } else {
            $data = array(
                'module_id' 	 => $request->module_id,
                'name'       => $request->name,
                'parent_id'  => $request->parent_id,
                'icon'       => $request->icon,
                'link'       => $request->link,
                'order_by'   => $request->order_by,
                'status'     => $request->status,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'created_at' => now(),
                'updated_at' => now()
            );
            $insertid = Menu::insertGetId($data);
            
            if ($insertid) {
                $row['res'] = '1';
            } else {
                $row['res'] = '0';
            }
        }
        return $row;
    }
    
    public function fetchMenu(Request $request)
	{
      
		$parent_id = $request->parent_id;
		$where = '';
		$where = ' and mst.parent_id = ' . $parent_id;

		$aColumns = array('id', 'icon', 'name', 'order_by', 'mst.status', 'mst.created_at');
		$isWhere = array("mst.status != '2'" . $where);
		$table = "menus as mst";
		$isJOIN = array();
		$hOrder = "mst.order_by asc";
		$sqlReturn = Pagging::get_datatables($aColumns, $table, $hOrder, $isJOIN, $isWhere, $request);

		$appData = array();
		$no = $request->iDisplayStart + 1;
		foreach ($sqlReturn['data'] as $row) {
			$row_data = array();
			$row_data[] = $no;
			$row_data[] = $row->icon;
			$row_data[] = $row->name;
			$row_data[] = $row->order_by;
            $addSubMenu = '';
            $editbtn = '';
            $deletebtn = '';
     
            $addSubMenu =  '<a href="' . url('add-sub-menu/' . $row->id) . '"  type="button" class="btn btn-sm btn-warning">
            <span class="fe fe-plus-circle"> </span>
            </a> &nbsp';
            $editbtn =  '<a  onclick="edit_record(' . $row->id . ')" type="button" class="btn btn-sm btn-primary">
            <span class="fe fe-edit"> </span>
            </a> &nbsp';
            $deletebtn =  '<a type="button" class="btn  btn-sm btn-danger"  onclick="delete_record(' . $row->id . ')">
            <span class="fe fe-trash-2"> </span>
            </a>';
           
            $row_data[] = $addSubMenu . $editbtn . $deletebtn;

			$appData[] = $row_data ;
			$no++;
		}
		$totalrecord = Pagging::count_all($aColumns, $table, $hOrder, $isJOIN, $isWhere, '');
		$numrecord = $sqlReturn['data'];
		$output = array(
			"sEcho" => intval($request->sEcho),
			"iTotalRecords" =>  $numrecord,
			"iTotalDisplayRecords" => $totalrecord,
			"aaData" => $appData
		);
		echo json_encode($output);
	}

    public function getMenuData(Request $request)
	{
		$menuData = Menu::where('id',$request->id)->first();
		echo json_encode($menuData);
	}

    public function addSubMenu($menu_id)
	{
		$menuData 	= DB::table('menus')->where('id', '=', $menu_id)->first();
		$page_title 	= 'Sub Menu (' . $menuData->name . ')';
        // $menu_list         = Menu::menu_role_permission(Auth::user()->id);
        // $control_type  = Menu::menu_control_type($page_title, Auth::user()->id);
        // foreach ($menu_list as $menuraw) {
        //     if ($page_title == $menuraw->name) {
        //         $control_type = $menuraw->control_type;
        //     }
        // }
        $moduleData = Module::where('status', '=', '1')->get();
		return view('pages.user_management.menus', compact('page_title', 'menuData','moduleData'));
	}

    public function deleteMenu(Request $request)
    {
        $data = array(
            "status" => '2'
        );
    
        $affected = DB::table('menus')
            ->where('id', $request->id)
            ->update($data);
    
       
        $row = array();
        if ($affected) {
            $row['res'] = 1;
        } else {
            $row['res'] = 0;
        }
        return json_encode($row);
    }
}
