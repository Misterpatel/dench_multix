<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pagging;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $page_title 	= 'Team';
        
		return view('pages.team.index', compact('page_title'));

    }
    
    public function addTeamMember()
    {
        $page_title 	= 'Team';
        $teamData = '';
        
		return view('pages.team.add_team_member', compact('page_title','teamData'));

    }
 
    public function manageTeamMember(Request $request)
    {
        $edit_id = $request->edit_id;
        $data = [
            'name'                => $request->name,
            'phone'               => $request->phone,
            'email'               => $request->email,
            'website'             => $request->website,
            'designation'         => $request->designation,
            'detail'              => $request->detail,
            'facebook'            => $request->facebook,
            'twitter'             => $request->twitter,
            'linkedin'            => $request->linkedin,
            'youtube'             => $request->youtube,
            'google_plus'         => $request->google_plus,
            'instagram'           => $request->instagram,
            'flickr'              => $request->flickr,
            'meta_title'          => $request->meta_title,
            'meta_keyword'        => $request->meta_keyword,
            'meta_description'    => $request->meta_description,
            'status'              => '1',
            'organization'        => Auth::user()->id
        ];
    
        // Handle the team banner upload
        if ($request->hasFile('photo')) {
            // Fetch the existing banner to delete
            $existingBanner = DB::table('team_members')->where('id', $edit_id)->value('photo');
    
            // Delete the existing banner if it exists
            if ($existingBanner && Storage::disk('public')->exists('files/team_member/' . $existingBanner)) {
                Storage::disk('public')->delete('files/team_member/' . $existingBanner);
            }
    
            // Store the new file and set the filename
            $filename = 'photo_' . time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('files/team_member/', $filename, 'public');
            $data['photo'] = $filename;
        } elseif (!empty($edit_id)) {
            // Retain the existing banner if no new file is uploaded
            $data['photo'] = DB::table('team_members')->where('id', $edit_id)->value('photo');
        }
    
        if (!empty($edit_id)) {
            // Update existing team
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updated = DB::table('team_members')->where('id', $edit_id)->update($data);
            $response = ['res' => $updated ? '3' : '0']; // 3: updated, 0: failed
        } else {
            // Create new team
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $insertedId = DB::table('team_members')->insertGetId($data);
            $response = ['res' => $insertedId ? '1' : '0']; // 1: inserted, 0: failed
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }
    


    public function fetchTeamMember(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;

        $aColumns = array('mst.id','mst.name','mst.photo','mst.designation','user.first_name','user.last_name','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = '';
       
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "team_members as mst";
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
                $bannerUrl = asset('public/storage/files/team_member/' . $row->photo);
                $row_data[] = '<img src="' . $bannerUrl . '" alt="Team Banner" class="img-thumbnail" style="width: 100px; height: auto;">';
            } else {
                $row_data[] = '<span class="text-muted">No Banner</span>';
            }   
            $row_data[] = $row->name;
            $row_data[] = $row->designation;         
            $editbtn = '';
            $deletebtn = '';
            
            $editbtn =  '<a href="'.url('edit-team-member/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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


    public function editTeamMember($id)
    {
        $page_title = 'Edit Team';    
        $teamMemberData = TeamMember::where('status', '1')->where('id', $id)->first();
        

        return view('pages.team.add_team_member', compact('page_title','teamMemberData'));
    }
    

    public function deleteTeamMember(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('team_members')
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
