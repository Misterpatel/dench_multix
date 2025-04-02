<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pagging;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $page_title 	= 'Our Partners Gallery';
        
		return view('pages.photogallery.index', compact('page_title'));

    }
    
    public function addPhotogallery()
    {
        $page_title 	= 'Add Our Partners Gallery';
        $photogalleryData = '';
        
		return view('pages.photogallery.add_photogallery', compact('page_title','photogalleryData'));

    }
 
    public function managePhotogallery(Request $request)
    {
        $edit_id = $request->edit_id;
        $data = [
            'status'              => '1',
            'organization'        => Auth::user()->id
        ];
    
        if ($request->hasFile('photo')) {
            $existingBanner = DB::table('photo_galleries')->where('id', $edit_id)->value('photo');
    
            if ($existingBanner && Storage::disk('public')->exists('files/photogallery/' . $existingBanner)) {
                Storage::disk('public')->delete('files/photogallery/' . $existingBanner);
            }
    
            $filename = 'photo_' . time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('files/photogallery/', $filename, 'public');
            $data['photo'] = $filename;
        } elseif (!empty($edit_id)) {
            $data['photo'] = DB::table('photo_galleries')->where('id', $edit_id)->value('photo');
        }
    
        if (!empty($edit_id)) {
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updated = DB::table('photo_galleries')->where('id', $edit_id)->update($data);
            $response = ['res' => $updated ? '3' : '0']; 
        } else {
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $insertedId = DB::table('photo_galleries')->insertGetId($data);
            $response = ['res' => $insertedId ? '1' : '0']; 
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }
    


    public function fetchPhotogallery(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;

        $aColumns = array('mst.id','mst.photo','user.first_name','user.last_name','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = '';
       
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "photo_galleries as mst";
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
                $bannerUrl = asset('storage/app/public/files/photogallery/' . $row->photo);
                $row_data[] = '<img src="' . $bannerUrl . '" alt="Photogallery Banner" class="img-thumbnail" style="width: 100px; height: auto;">';
            } else {
                $row_data[] = '<span class="text-muted">No Banner</span>';
            }   
            $editbtn = '';
            $deletebtn = '';
             
            $editbtn =  '<a href="'.url('edit-photogallery/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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


    public function editPhotogallery($id)
    {
        $page_title = 'Edit Our Partners Gallery';    
        $photogalleryData = PhotoGallery::where('status', '1')->where('id', $id)->first();
        

        return view('pages.photogallery.add_photogallery', compact('page_title','photogalleryData'));
    }
    

    public function deletePhotogallery(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('photo_galleries')
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
