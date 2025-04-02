<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\{Pagging};
use App\Models\Default_home_pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class DefaultHomeController extends Controller
{
    public function index()
    {
        $page_title 	= 'Default Home Page';
        
		$default_pages=Default_home_pages::with('users')->get(); 
		return view('pages.default_home.index', compact('page_title','default_pages'));

    }
    
    public function addHome()
    {
        $page_title 	= 'Add Home Page';
        $sliderData = '';
        
		return view('pages.default_home.add_home', compact('page_title','sliderData'));

    }

    public function manageHome(Request $request)
    {
        $edit_id = $request->edit_id;
        $data = [
            'status'              => '1',
            'organization'        => Auth::user()->id
        ];
    
        
        if ($request->hasFile('photo')) {
            $existingBanner = DB::table('defalut_home_pages')->where('id', $edit_id)->value('photo');
            if ($existingBanner && Storage::disk('public')->exists('files/default_home/' . $existingBanner)) {
                Storage::disk('public')->delete('files/default_home/' . $existingBanner);
            }
            $filename = 'photo_' . time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('files/default_home/', $filename, 'public');
            $data['photo'] = $filename;
        } elseif (!empty($edit_id)) {
            // Retain the existing banner if no new file is uploaded
            $data['photo'] = DB::table('defalut_home_pages')->where('id', $edit_id)->value('photo');
        }
    
        if (!empty($edit_id)) {
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updated = DB::table('defalut_home_pages')->where('id', $edit_id)->update($data);
            $response = ['res' => $updated ? '3' : '0']; // 3: updated, 0: failed
        } else { 
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $insertedId = DB::table('defalut_home_pages')->insertGetId($data);
            $response = ['res' => $insertedId ? '1' : '0']; // 1: inserted, 0: failed
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }

    public function fetchDefaultHome(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;

        $aColumns = array('mst.id','mst.photo','mst.defalut_page','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = '';
          
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "defalut_home_pages as mst";
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
            if (!empty($row->photo)) {
                $bannerUrl = asset('storage/app/public/files/default_home/' . $row->photo);
                $row_data[] = '<img src="' . $bannerUrl . '" alt="Slider Banner" class="img-thumbnail" style="width: 100px; height: auto;">';
            } else {
                $row_data[] = '<span class="text-muted">No Banner</span>';
            }     
            $row_data[] = '<div class="form-check form-switch d-flex align-items-center">
                <input class="form-check-input mx-auto d-block default-page-toggle"  
                    type="checkbox" style="font-size:25px" data-id="' . $row->id . '" 
                    ' . ($row->defalut_page == 'show' ? 'checked' : '') . '>
            </div>';
                  
            $editbtn = '';
            $deletebtn = '';
            
            $editbtn =  '<a href="'.url('edit-default-home/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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


    public function editHome($id)
    {
        $page_title = 'Edit Home Page';    
        $defaultHome_datas = Default_home_pages::where('status', '1')->where('id', $id)->first();
        

        return view('pages.default_home.add_home', compact('page_title','defaultHome_datas'));
    }
    

    public function deleteHome(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('defalut_home_pages')
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

    public function ChangeHomePage(Request $request)
    {
        $id=$request->id;
        $defalut_page=$request->status;
        if ($defalut_page == "show") {
            Default_home_pages::query()->update(['defalut_page' => 'hide']);
        }

        Default_home_pages::where('id', $id)->update(['defalut_page' => $defalut_page]);
    
        return response()->json(['success' => true, 'message' => 'Home page updated successfully.']);
    }

}
