<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pagging;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $page_title 	= 'Service';
		return view('pages.service.index', compact('page_title'));

    }
    
    public function addService()
    {
        $page_title 	= 'Service';
        $serviceData = '';
        $categoryData = ServiceCategory::where('status', '1')->get();
		return view('pages.service.add_service', compact('page_title','serviceData','categoryData'));

    }
 
    public function manageService(Request $request)
    {
        $edit_id = $request->edit_id;
        $data = [
            'service_category_id' => $request->service_category_id,
            'heading'           => $request->heading,
            'short_content'     => $request->short_content,
            'service_content'   => $request->service_content,
            'meta_title'        => $request->meta_title,
            'meta_keyword'      => $request->meta_keyword,
            'meta_description'  => $request->meta_description,
            'meta_slug'         => $request->meta_slug,
            'status'              => '1',
            'organization'        => Auth::user()->id
        ];
        if ($request->hasFile('photo')) {
            $existingBanner = DB::table('services')->where('id', $edit_id)->value('photo');
    
            if ($existingBanner && Storage::disk('public')->exists('files/services/' . $existingBanner)) {
                Storage::disk('public')->delete('files/services/' . $existingBanner);
            }
    
            $filename = 'photo_' . time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('files/services/', $filename, 'public');
            $data['photo'] = $filename;
        } elseif (!empty($edit_id)) {
            $data['photo'] = DB::table('services')->where('id', $edit_id)->value('photo');
        }
        if (!empty($edit_id)) {
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updated = DB::table('services')->where('id', $edit_id)->update($data);
            $response = ['res' => $updated ? '3' : '0']; 
        } else {
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $insertedId = DB::table('services')->insertGetId($data);
            $response = ['res' => $insertedId ? '1' : '0']; 
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }
    


    // public function fetchService(Request $request)
    // {
    //     $user = Auth::user();
    //     $user_id = $user->id;
    //     $user_role_id = $user->role_id;

    //     $aColumns = array('mst.id','mst.heading','mst.service_content','service_categories.name as service_categories_name','mst.photo','mst.meta_title','mst.meta_keyword','mst.meta_description','user.first_name','user.last_name','mst.status', 'mst.created_at');
    //     $isWhere = array("mst.status != '2'"); 
    //     $where = '';
       
    //     $where = " AND (mst.created_by = '$user_id')";
    //     $isWhere[0] .= $where;
    //     $table = "services as mst";
    //     $isJOIN = array(
    //         'left join users as user on user.id = mst.created_by',
    //         'left join service_categories as service_categories on service_categories.id = mst.service_category_id',
    //     );
    //     $hOrder = "mst.id desc";
    //     $sqlReturn = Pagging::get_datatables($aColumns, $table, $hOrder, $isJOIN, $isWhere, $request);

    //     $appData = array();
    //     $no = $request->iDisplayStart + 1;
    //     foreach ($sqlReturn['data'] as $row) {        
    //         $row_data = array();
    //         $row_data[] = $no;
    //         if (!empty($row->photo)) {
    //             $photoUrl = asset('storage/app/public/files/services/' . $row->photo);
    //             $row_data[] = '<img src="' . $photoUrl . '" alt="Photo" class="img-thumbnail" style="width: 100px; height: auto;">';
    //         } else {
    //             $row_data[] = '<span class="text-muted">No Image</span>';
    //         }     
    //         $row_data[] = $row->service_categories_name;         
    //         $row_data[] = $row->heading;        
    //         $row_data[] = $row->service_content;          
    //         $row_data[] = $row->meta_title;         
    //         $row_data[] = $row->meta_keyword;         
    //         $row_data[] = $row->meta_description;         
    //         $editbtn = '';
    //         $deletebtn = '';
            
    //         $editbtn =  '<a href="'.url('edit-service/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
    //             <span class="fe fe-edit"> </span>
    //         </a> &nbsp';
    //         $deletebtn =  '<a type="button" class="btn btn-sm btn-danger" onclick="delete_record(' . $row->id . ')">
    //             <span class="fe fe-trash-2"> </span>
    //         </a>';
            
    //         $row_data[] = $editbtn . $deletebtn;
    //         $appData[] = $row_data;
    //         $no++;
    //     }
        
    //     $totalrecord = Pagging::count_all($aColumns, $table, $hOrder, $isJOIN, $isWhere, '');
    //     $numrecord = $sqlReturn['data'];
        
    //     $output = array(
    //         "sEcho" => intval($request->sEcho),
    //         "iTotalRecords" =>  $numrecord,
    //         "iTotalDisplayRecords" => $totalrecord,
    //         "aaData" => $appData
    //     );
        
    //     echo json_encode($output);
    // }

    public function fetchService(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;
    
        $aColumns = array('mst.id','mst.heading','mst.service_content','service_categories.name as service_categories_name','mst.photo','mst.meta_title','mst.meta_keyword','mst.meta_description','user.first_name','user.last_name','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "services as mst";
        $isJOIN = array(
            'left join users as user on user.id = mst.created_by',
            'left join service_categories as service_categories on service_categories.id = mst.service_category_id',
        );
        $hOrder = "mst.id desc";
        $sqlReturn = Pagging::get_datatables($aColumns, $table, $hOrder, $isJOIN, $isWhere, $request);
    
        $appData = array();
        $no = $request->iDisplayStart + 1;
        foreach ($sqlReturn['data'] as $row) {        
            $row_data = array();
            $row_data[] = $no;
    
            if (!empty($row->photo)) {
                $photoUrl = asset('storage/app/public/files/services/' . $row->photo);
                $row_data[] = '<img src="' . $photoUrl . '" alt="Photo" class="img-thumbnail" style="width: 100px; height: auto;">';
            } else {
                $row_data[] = '<span class="text-muted">No Image</span>';
            }     
    
            $row_data[] = $row->service_categories_name;         
            $row_data[] = $row->heading;        
            // $row_data[] = Str::words($row->service_content, 10, '...'); // Limit to 10 words       
            // $row_data[] = $row->meta_title;         
            // $row_data[] = $row->meta_keyword;         
            // $row_data[] = Str::words($row->meta_description, 10, '...'); // Limit to 10 words  
    
            $editbtn = '<a href="'.url('edit-service/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
                <span class="fe fe-edit"> </span>
            </a> &nbsp';
    
            $deletebtn = '<a type="button" class="btn btn-sm btn-danger" onclick="delete_record(' . $row->id . ')">
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
    
    public function editService($id)
    {
        $page_title = 'Edit Service';    
        $serviceData = Service::where('status', '1')->where('id', $id)->first();
        
        $categoryData = ServiceCategory::where('status', '1')->get();
        return view('pages.service.add_service', compact('page_title','serviceData','categoryData'));
    }
    

    public function deleteService(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('services')
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
