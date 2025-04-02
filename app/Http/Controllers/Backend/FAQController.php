<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\FAQ;
use App\Models\Pagging;

class FAQController extends Controller
{
    public function index()
    {
        $page_title 	= 'View FAQ';
		return view('pages.faq.index', compact('page_title'));
    }

    public function addFAQ()
    {
        $page_title 	= 'FAQ';
        $faqData = '';
		return view('pages.faq.add_faq', compact('page_title','faqData'));
    }

    public function manageFAQ(Request $request)
    {
        $edit_id = $request->edit_id; 
        $data = [
            'title'        => $request->title,
            'content'      => $request->content,
            'show_home'    => $request->show_home,
            'status'       => '1',
            'organization' => Auth::user()->id
        ];
        
        if (!empty($edit_id)) {
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updated = DB::table('faqs')->where('id', $edit_id)->update($data);
            $response = ['res' => $updated ? '3' : '0']; 
        } else {
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $insertedId = DB::table('faqs')->insertGetId($data);
            $response = ['res' => $insertedId ? '1' : '0']; 
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }

    public function fetchFAQ(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;

        $aColumns = array('faqs.id','faqs.title','faqs.show_home', 'faqs.created_at');
        $isWhere = array("faqs.status != '2'"); 
        $where = '';
       
        $where = " AND (faqs.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "faqs";
        $isJOIN = array(
            'left join users as user on user.id = faqs.created_by',
        ); 
        $hOrder = "faqs.id desc";
        $sqlReturn = Pagging::get_datatables($aColumns, $table, $hOrder, $isJOIN, $isWhere, $request);

        $appData = array();
        $no = $request->iDisplayStart + 1;
        foreach ($sqlReturn['data'] as $row) {        
            $row_data = array();
            $row_data[] = $no;
            $row_data[] = $row->title;
            if($row->show_home==1)
            {
            $row_data[] = "Yes";
            }
            else
            {
            $row_data[] = "No";
            }
                  
            $editbtn = '';
            $deletebtn = '';
            
            $editbtn =  '<a href="'.url('edit-faq/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
                <span class="fe fe-edit"> </span>
            </a> &nbsp';
            $deletebtn =  '<a type="button" class="btn btn-sm btn-danger" onclick="delete_record(' . $row->id . ')">
                <span class="fe fe-trash-2"> </span>
            </a>';
            
            $row_data[] = $editbtn . $deletebtn;
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

    public function editFAQ($id)
    {
        $page_title = 'Edit FAQ';    
        $faqData = FAQ::where('status', '1')->where('id', $id)->first();
        return view('pages.faq.add_faq', compact('page_title','faqData'));
    }
    

    public function deleteFAQ(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('faqs')
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
