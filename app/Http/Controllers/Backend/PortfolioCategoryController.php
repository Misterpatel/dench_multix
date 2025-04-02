<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pagging;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PortfolioCategoryController extends Controller
{
    public function index()
    {
        $page_title 	= 'Portfolio Category';
        
		return view('pages.portfolio_category.index', compact('page_title'));

    }
    
    public function addPortfolioCategory()
    {
        $page_title 	= 'Portfolio Category';
        $portfolioCategoryData = '';
        
		return view('pages.portfolio_category.add_portfolio_category', compact('page_title','portfolioCategoryData'));

    }
 
    public function managePortfolioCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $edit_id = $request->edit_id;
        $data = [
            'name'         => $request->name,
            'status'       => $request->status,
            'organization' => Auth::user()->id,
        ];
    
        if (!empty($edit_id)) {
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
    
            $updated = DB::table('portfolio_categories')->where('id', $edit_id)->update($data);
            $response = ['res' => $updated ? '3' : '0']; // 3: updated, 0: failed
        } else {
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
    
            $insertedId = DB::table('portfolio_categories')->insertGetId($data);
            $response = ['res' => $insertedId ? '1' : '0']; // 1: inserted, 0: failed
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }
    
    


    public function fetchPortfolioCategory(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;

        $aColumns = array('mst.id','mst.name','user.first_name','user.last_name','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = '';
       
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "portfolio_categories as mst";
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
            $row_data[] = $row->status == 1 ? 'Active' : 'Inactive';
            $editbtn = '';
            $deletebtn = '';
            
            $editbtn =  '<a href="'.url('edit-portfolio-category/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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


    public function editPortfolioCategory($id)
    {
        $page_title = 'Edit Portfolio Category';    
        $portfolioCategoryData = PortfolioCategory::where('status','!=', '2')->where('id', $id)->first();
        

        return view('pages.portfolio_category.add_portfolio_category', compact('page_title','portfolioCategoryData'));
    }
    

    public function deletePortfolioCategory(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('portfolio_categories')
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
