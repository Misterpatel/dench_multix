<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pagging;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $page_title 	= 'Testimonial';
        
		return view('pages.testimonial.index', compact('page_title'));

    }
    
    public function addTestimonial()
    {
        $page_title 	= 'Testimonial';
        $testimonialData = '';
        
		return view('pages.testimonial.add_testimonial', compact('page_title','testimonialData'));

    }
 
    public function manageTestimonial(Request $request)
    {
        $edit_id = $request->edit_id;
        $data = [
            'name'                => $request->name,
            'comment'             => $request->comment,
            'designation'         => $request->designation,
            'status'              => '1',
            'organization'        => Auth::user()->id
        ];
    
        // Handle the testimonial banner upload
        if ($request->hasFile('photo')) {
            // Fetch the existing banner to delete
            $existingBanner = DB::table('testimonials')->where('id', $edit_id)->value('photo');
    
            // Delete the existing banner if it exists
            if ($existingBanner && Storage::disk('public')->exists('files/testimonial/' . $existingBanner)) {
                Storage::disk('public')->delete('files/testimonial/' . $existingBanner);
            }
    
            // Store the new file and set the filename
            $filename = 'photo_' . time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('files/testimonial/', $filename, 'public');
            $data['photo'] = $filename;
        } elseif (!empty($edit_id)) {
            // Retain the existing banner if no new file is uploaded
            $data['photo'] = DB::table('testimonials')->where('id', $edit_id)->value('photo');
        }
    
        if (!empty($edit_id)) {
            // Update existing testimonial
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updated = DB::table('testimonials')->where('id', $edit_id)->update($data);
            $response = ['res' => $updated ? '3' : '0']; // 3: updated, 0: failed
        } else {
            // Create new testimonial
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $insertedId = DB::table('testimonials')->insertGetId($data);
            $response = ['res' => $insertedId ? '1' : '0']; // 1: inserted, 0: failed
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }
    


    public function fetchTestimonial(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;

        $aColumns = array('mst.id','mst.name','mst.photo','mst.comment','mst.designation','user.first_name','user.last_name','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = '';
       
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "testimonials as mst";
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
            // Display banner as an image
            if (!empty($row->photo)) {
                $bannerUrl = asset('storage/files/testimonial/' . $row->photo);
                $row_data[] = '<img src="' . $bannerUrl . '" alt="Testimonial Banner" class="img-thumbnail" style="width: 100px; height: auto;">';
            } else {
                $row_data[] = '<span class="text-muted">No Banner</span>';
            }   
            $row_data[] = $row->name;
            $row_data[] = $row->designation;         
            $row_data[] = $row->comment;         
            $editbtn = '';
            $deletebtn = '';
            
            $editbtn =  '<a href="'.url('edit-testimonial/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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


    public function editTestimonial($id)
    {
        $page_title = 'Edit Testimonial';    
        $testimonialData = Testimonial::where('status', '1')->where('id', $id)->first();
        

        return view('pages.testimonial.add_testimonial', compact('page_title','testimonialData'));
    }
    

    public function deleteTestimonial(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('testimonials')
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
