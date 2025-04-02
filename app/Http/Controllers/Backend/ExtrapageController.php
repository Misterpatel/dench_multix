<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ExtraPage;
use App\Models\Pagging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ExtrapageController extends Controller
{
    public function index()
    {
        $page_title 	= 'Extra Page';
        
		return view('pages.extrapage.index', compact('page_title'));

    }
    
    public function addExtrapage()
    {
        $page_title 	= 'Extra Page';
        $extrapageData = '';
        $categoryData = ExtraPage::where('status', '1')->get();
		return view('pages.extrapage.add_extrapage', compact('page_title','extrapageData','categoryData'));

    }
 
    public function manageExtrapage(Request $request)
    {
        $edit_id = $request->edit_id;
        $data = [
            'heading'           => $request->heading,
            'content'           => $request->content,
            'meta_title'        => $request->meta_title,
            'meta_keyword'      => $request->meta_keyword,
            'meta_description'  => $request->meta_description,
            'status'            => '1',
            'organization'      => Auth::user()->id
        ];
        if ($request->hasFile('photo')) {
            $existingBanner = DB::table('extra_pages')->where('id', $edit_id)->value('photo');
    
            if ($existingBanner && Storage::disk('public')->exists('files/extra_pages/' . $existingBanner)) {
                Storage::disk('public')->delete('files/extra_pages/' . $existingBanner);
            }
    
            $filename = 'photo_' . time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('files/extra_pages/', $filename, 'public');
            $data['photo'] = $filename;
        } elseif (!empty($edit_id)) {
            $data['photo'] = DB::table('extra_pages')->where('id', $edit_id)->value('photo');
        }
        if (!empty($edit_id)) {
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updated = DB::table('extra_pages')->where('id', $edit_id)->update($data);
            $response = ['res' => $updated ? '3' : '0']; 
        } else {
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $insertedId = DB::table('extra_pages')->insertGetId($data);
            $response = ['res' => $insertedId ? '1' : '0']; 
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }
    



    public function fetchExtrapage(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;
    
        $aColumns = array('mst.id','mst.heading','mst.content','mst.photo','mst.meta_title','mst.meta_keyword','mst.meta_description','user.first_name','user.last_name','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "extra_pages as mst";
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
                $photoUrl = asset('storage/app/public/files/extra_pages/' . $row->photo);
                $row_data[] = '<img src="' . $photoUrl . '" alt="Photo" class="img-thumbnail" style="width: 100px; height: auto;">';
            } else {
                $row_data[] = '<span class="text-muted">No Image</span>';
            }     
    
            $row_data[] = $row->heading;        
            $row_data[] = Str::words($row->content, 10, '...'); // Limit to 10 words       
            $row_data[] = $row->meta_title;         
            $row_data[] = $row->meta_keyword;         
            $row_data[] = Str::words($row->meta_description, 10, '...'); // Limit to 10 words  
    
            $editbtn = '<a href="'.url('edit-extrapage/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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
    
    public function editExtrapage($id)
    {
        $page_title = 'Edit Extrapage';    
        $extrapageData = ExtraPage::where('status', '1')->where('id', $id)->first();

        return view('pages.extrapage.add_extrapage', compact('page_title','extrapageData'));
    }
    

    public function deleteExtrapage(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('extra_pages')
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
