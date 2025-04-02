<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pagging;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $page_title 	= 'Slider';
        
		return view('pages.slider.index', compact('page_title'));

    }
    
    public function addSlider()
    {
        $page_title 	= 'Slider';
        $sliderData = '';
        
		return view('pages.slider.add_slider', compact('page_title','sliderData'));

    }
 
    public function manageSlider(Request $request)
    {
        $edit_id = $request->edit_id;
        $data = [
            'heading'             => $request->heading,
            'content'             => $request->content,
            'button1_text'        => $request->button1_text,
            'button1_url'         => $request->button1_url,
            'button2_text'        => $request->button2_text,
            'button2_url'         => $request->button2_url,
            'position'            => $request->position,
            'status'              => '1',
            'organization'        => Auth::user()->id
        ];
    
        // Handle the slider banner upload
        if ($request->hasFile('photo')) {
            // Fetch the existing banner to delete
            $existingBanner = DB::table('sliders')->where('id', $edit_id)->value('photo');
    
            // Delete the existing banner if it exists
            if ($existingBanner && Storage::disk('public')->exists('files/Slider/' . $existingBanner)) {
                Storage::disk('public')->delete('files/Slider/' . $existingBanner);
            }
    
            // Store the new file and set the filename
            $filename = 'photo_' . time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('files/Slider/', $filename, 'public');
            $data['photo'] = $filename;
        } elseif (!empty($edit_id)) {
            // Retain the existing banner if no new file is uploaded
            $data['photo'] = DB::table('sliders')->where('id', $edit_id)->value('photo');
        }
    
        if (!empty($edit_id)) {
            // Update existing slider
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updated = DB::table('sliders')->where('id', $edit_id)->update($data);
            $response = ['res' => $updated ? '3' : '0']; // 3: updated, 0: failed
        } else {
            // Create new slider
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $insertedId = DB::table('sliders')->insertGetId($data);
            $response = ['res' => $insertedId ? '1' : '0']; // 1: inserted, 0: failed
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }
    


    public function fetchSlider(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;

        $aColumns = array('mst.id','mst.heading','mst.photo','mst.content','mst.button1_text','mst.button1_url','mst.button2_text','mst.button2_url','mst.position','user.first_name','user.last_name','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = '';
       
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "sliders as mst";
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
                $bannerUrl = asset('storage/app/public/files/Slider/' . $row->photo);
                $row_data[] = '<img src="' . $bannerUrl . '" alt="Slider Banner" class="img-thumbnail" style="width: 100px; height: auto;">';
            } else {
                $row_data[] = '<span class="text-muted">No Banner</span>';
            }     
            $row_data[] = $row->heading;
            $row_data[] = $row->button1_text;
            $row_data[] = $row->button1_url;
            $row_data[] = $row->button2_text;
            $row_data[] = $row->button2_url;
            $row_data[] = $row->position;
                  
            $editbtn = '';
            $deletebtn = '';
            
            $editbtn =  '<a href="'.url('edit-slider/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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


    public function editSlider($id)
    {
        $page_title = 'Edit Slider';    
        $sliderData = Slider::where('status', '1')->where('id', $id)->first();
        

        return view('pages.slider.add_slider', compact('page_title','sliderData'));
    }
    

    public function deleteSlider(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('sliders')
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
