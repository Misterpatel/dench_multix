<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pagging;
use Illuminate\Http\Request;
use App\Models\FrontendContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserContactController extends Controller
{
    public function index()
	{
		$page_title 	= 'Users Contact';
		return view('pages.contacts.index', compact('page_title'));
	}
	
	public function fetchContacts(Request $request)
    {
        $user = Auth::user();
		
         $user_id = $user->id;
		//dd($user);
        $user_role_id = $user->role_id;

        $aColumns = array('mst.id','mst.name','mst.subject','mst.phone','mst.message','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = '';
       
        $where = " AND (mst.created_by = '$user_id')"; 
        $isWhere[0] .= $where;
        $table = "frontend_contacts as mst";
        $isJOIN = array(
            'left join users as user on user.id = mst.created_by',
        );
        $hOrder = "mst.id desc";

        $sqlReturn = Pagging::get_datatables($aColumns, $table, $hOrder, $isJOIN, $isWhere, $request);

        $appData = array();
        $no = $request->iDisplayStart + 1;
        foreach ($sqlReturn['data'] as $row) {        
            $row_data = array();
            $row_data[] = $no;  
            $row_data[] = $row->name;
            $row_data[] = $row->subject;         
            $row_data[] = $row->phone;         
            $row_data[] = $row->message;   
            $appData[] = $row_data;
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
	
	
}
