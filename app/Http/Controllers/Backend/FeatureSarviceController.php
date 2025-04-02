<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\{FAQ,Feature};
use App\Models\Pagging;

class FeatureSarviceController extends Controller
{
    public function index()
    {
        $page_title 	= 'Feature Service';
		return view('pages.feature.index', compact('page_title'));
    }
 
    public function addFeature()
    {
        $page_title 	= 'Add Feature Service'; 
        $featureData = '';
		return view('pages.feature.add_feature', compact('page_title','featureData'));
    }
 
    public function manageFeature(Request $request)
    {
        $edit_id = $request->edit_id; 
        $data = [
            'name'        => $request->name,
            'content'      => $request->content,
            'status'       => '1',
            'organization' => Auth::user()->id
        ];
        
         // Handle the slider banner upload
         if ($request->hasFile('icon')) {
            // Fetch the existing banner to delete
            $existingBanner = DB::table('feature_services')->where('id', $edit_id)->value('icon');
    
            // Delete the existing banner if it exists
            if ($existingBanner && Storage::disk('public')->exists('files/Feature/' . $existingBanner)) {
                Storage::disk('public')->delete('files/Feature/' . $existingBanner);
            }
    
            // Store the new file and set the filename
            $filename = 'photo_' . time() . '.' . $request->icon->getClientOriginalExtension();
            $request->icon->storeAs('files/Feature/', $filename, 'public');
            $data['icon'] = $filename;
        } elseif (!empty($edit_id)) {
            // Retain the existing banner if no new file is uploaded
            $data['icon'] = DB::table('feature_services')->where('id', $edit_id)->value('icon');
        }

        if (!empty($edit_id)) {
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updated = DB::table('feature_services')->where('id', $edit_id)->update($data);
            $response = ['res' => $updated ? '3' : '0']; 
        } else {
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $insertedId = DB::table('feature_services')->insertGetId($data);
            $response = ['res' => $insertedId ? '1' : '0']; 
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }

    public function fetchFeature(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;

        $aColumns = array('mst.id','mst.name','mst.content','mst.icon');
        $isWhere = array("mst.status != '2'"); 
        $where = '';
       
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "feature_services as mst";
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
            $row_data[] = Str::words(strip_tags($row->content), 15, '...');
            if (!empty($row->icon)) {
                $bannerUrl = asset('public/storage/files/Feature/' . $row->icon);
                $row_data[] = '<img src="' . $bannerUrl . '" alt="Slider Banner" class="img-thumbnail" style="width: 100px; height: auto;">';
            } else {
                $row_data[] = '<span class="text-muted">No Banner</span>';
            }  
                  
            $editbtn = '';
            $deletebtn = '';
            
            $editbtn =  '<a href="'.url('edit-feature/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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


    public function editFeature($id)
    {
        $page_title = 'Edit Feature Service';    
        $featureData = Feature::where('status', '1')->where('id', $id)->first();
        return view('pages.feature.add_feature', compact('page_title','featureData'));
    }
    

    public function deleteFeature(Request $request)
	{
		$data = array(
			"status" => '2'
		); 
		$affected = DB::table('feature_services')
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
