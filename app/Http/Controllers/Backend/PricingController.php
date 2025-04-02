<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pagging;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PricingController extends Controller
{
    public function index()
    {
        $page_title 	= 'Pricing';
        
		return view('pages.pricing.index', compact('page_title'));

    }
    
    public function addPricing()
    {
        $page_title 	= 'Pricing';
        $pricingData = '';
        
		return view('pages.pricing.add_pricing', compact('page_title','pricingData'));

    }
 
    public function managePricing(Request $request)
    {
        $edit_id = $request->edit_id;
        $data = [
            'icon'                => $request->icon,
            'title'               => $request->title,
            'price'               => $request->price,
            'subtitle'            => $request->subtitle,
            'text'                => $request->text,
            'button_text'         => $request->button_text,
            'button_url'          => $request->button_url,
            'status'              => '1',
            'organization'        => Auth::user()->id
        ];
    
        if (!empty($edit_id)) {
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updated = DB::table('pricings')->where('id', $edit_id)->update($data);
            $response = ['res' => $updated ? '3' : '0']; // 3: updated, 0: failed
        } else {
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $insertedId = DB::table('pricings')->insertGetId($data);
            $response = ['res' => $insertedId ? '1' : '0']; // 1: inserted, 0: failed
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }
    


    public function fetchPricing(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;

        $aColumns = array('mst.id','mst.icon','mst.title','mst.price','mst.subtitle','user.first_name','user.last_name','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = '';
       
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "pricings as mst";
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
            // $row_data[] = '<i class"'.$row->icon.'"></i>' ;
            $row_data[] = $row->icon;         
            $row_data[] = $row->title;         
            $row_data[] = $row->price;         
            $row_data[] = $row->subtitle;         
            $editbtn = '';
            $deletebtn = '';
            
            $editbtn =  '<a href="'.url('edit-pricing/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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


    public function editPricing($id)
    {
        $page_title = 'Edit Pricing';    
        $pricingData = Pricing::where('status', '1')->where('id', $id)->first();
        

        return view('pages.pricing.add_pricing', compact('page_title','pricingData'));
    }
    

    public function deletePricing(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('pricings')
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
