<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pagging;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $page_title 	= 'Portfolio';
        
		return view('pages.portfolio.index', compact('page_title'));

    }
    
    public function addPortfolio()
    {
        $page_title 	= 'Portfolio';
        $portfolioData = '';
        $category = PortfolioCategory::where('status','1')->get();
        $portfolioPhotoData = '';
		return view('pages.portfolio.add_portfolio', compact('page_title','portfolioData','category','portfolioPhotoData'));

    }
 
    // public function managePortfolio(Request $request)
    // {
    //     $edit_id = $request->edit_id;
    //     $data = [
    //         'name'              => $request->input('name'),
    //         'short_content'     => $request->input('short_content'),
    //         'content'           => $request->input('content'),
    //         'client_name'       => $request->input('client_name'),
    //         'client_company'    => $request->input('client_company'),
    //         'start_date'        => $request->input('start_date'),
    //         'end_date'          => $request->input('end_date'),
    //         'website'           => $request->input('website'),
    //         'cost'              => $request->input('cost'),
    //         'client_comment'    => $request->input('client_comment'),
    //         'category_id'       => $request->input('category_id'),
    //         'photo'             => $request->input('photo'),
    //         'meta_title'        => $request->input('meta_title'),
    //         'meta_keyword'      => $request->input('meta_keyword'),
    //         'meta_description'  => $request->input('meta_description'),
    //         'status'            => '1', 
    //         'organization'      => Auth::user()->id, 
    //     ];
    //     if ($request->hasFile('photo')) {
    //         // Fetch existing photo to delete
    //         $existingPhoto = DB::table('portfolios')->where('id', $edit_id)->value('photo');
    
    //         // Delete the existing photo if it exists
    //         if ($existingPhoto && Storage::disk('public')->exists('files/portfolio/' . $existingPhoto)) {
    //             Storage::disk('public')->delete('files/portfolio/' . $existingPhoto);
    //         }
    
    //         // Store the new photo and set the filename
    //         $photoName = 'photo_' . time() . '.' . $request->photo->getClientOriginalExtension();
    //         $request->photo->storeAs('files/portfolio/', $photoName, 'public');
    //         $data['photo'] = $photoName;
    //     } elseif (!empty($edit_id)) {
    //         // Retain the existing photo if no new file is uploaded
    //         $data['photo'] = DB::table('portfolios')->where('id', $edit_id)->value('photo');
    //     }
    //     if (!empty($edit_id)) {
    //         $data['updated_by'] = Auth::user()->id;
    //         $data['updated_at'] = now();
    //         $updated = DB::table('portfolios')->where('id', $edit_id)->update($data);
    //         $response = ['res' => $updated ? '3' : '0']; // 3: updated, 0: failed
    //     } else {
    //         $data['created_by'] = Auth::user()->id;
    //         $data['updated_by'] = Auth::user()->id;
    //         $data['created_at'] = now();
    //         $data['updated_at'] = now();
    //         $insertedId = DB::table('portfolios')->insertGetId($data);
    //         $response = ['res' => $insertedId ? '1' : '0']; // 1: inserted, 0: failed
    //     }
    
    //     return response()->json($response, 200, ['Content-Type' => 'application/json']);
    // }
    
    public function managePortfolio(Request $request)
    {
        $edit_id = $request->edit_id;
        $data = [
            'name'              => $request->input('name'),
            'short_content'     => $request->input('short_content'),
            'content'           => $request->input('content'),
            'client_name'       => $request->input('client_name'),
            'client_company'    => $request->input('client_company'),
            'start_date'        => $request->input('start_date'),
            'end_date'          => $request->input('end_date'),
            'website'           => $request->input('website'),
            'cost'              => $request->input('cost'),
            'client_comment'    => $request->input('client_comment'),
            'category_id'       => $request->input('category_id'),
            'photo'             => $request->input('photo'),
            'meta_title'        => $request->input('meta_title'),
            'meta_keyword'      => $request->input('meta_keyword'),
            'meta_description'  => $request->input('meta_description'),
            'status'            => '1',
            'organization'      => Auth::user()->id,
        ];
    
        if ($request->hasFile('photo')) {
            // Handle main photo
            $existingPhoto = DB::table('portfolios')->where('id', $edit_id)->value('photo');
            if ($existingPhoto && Storage::disk('public')->exists('files/portfolio/' . $existingPhoto)) {
                Storage::disk('public')->delete('files/portfolio/' . $existingPhoto);
            }
            $photoName = 'photo_' . time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('files/portfolio/', $photoName, 'public');
            $data['photo'] = $photoName;
        } elseif (!empty($edit_id)) {
            $data['photo'] = DB::table('portfolios')->where('id', $edit_id)->value('photo');
        }
    
        // Insert or update portfolio data
        if (!empty($edit_id)) {
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updated = DB::table('portfolios')->where('id', $edit_id)->update($data);
            $portfolioId = $edit_id;
            $response = ['res' => $updated ? '3' : '0'];
        } else {
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $portfolioId = DB::table('portfolios')->insertGetId($data);
            $response = ['res' => $portfolioId ? '1' : '0'];
        }
    
        // Handle other photos
        if ($request->hasFile('other_photo')) {
            foreach ($request->file('other_photo') as $otherPhoto) {
                $otherPhotoName = 'other_photo_' . time() . '_' . uniqid() . '.' . $otherPhoto->getClientOriginalExtension();
                $otherPhoto->storeAs('files/portfolio/other_photos/', $otherPhotoName, 'public');
    
                DB::table('portfolio_photos')->insert([
                    'portfolio_id' => $portfolioId,
                    'other_photo'  => $otherPhotoName,
                    'organization' => Auth::user()->id,
                    'created_by'   => Auth::user()->id,
                    'updated_by'   => Auth::user()->id,
                    'status'       => '1',
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }
    

    public function fetchPortfolio(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;

        $aColumns = array('mst.id','mst.name','mst.photo','category.name as category_name','user.first_name','user.last_name','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = '';
       
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "portfolios as mst";
        $isJOIN = array(
            'left join users as user on user.id = mst.created_by',
            'left join portfolio_categories as category on category.id = mst.category_id',

        );
        $hOrder = "mst.id desc";
        $sqlReturn = Pagging::get_datatables($aColumns, $table, $hOrder, $isJOIN, $isWhere, $request);

        $appData = array();
        $no = $request->iDisplayStart + 1;
        foreach ($sqlReturn['data'] as $row) {        
            $row_data = array();
            $row_data[] = $no;
            $row_data[] = $row->name;         
            $row_data[] = $row->category_name;         
            if (!empty($row->photo)) {
                $bannerUrl = asset('public/storage/files/portfolio/' . $row->photo);
                $row_data[] = '<img src="' . $bannerUrl . '" alt="Photo" class="img-thumbnail" style="width: 100px; height: auto;">';
            } else {
                $row_data[] = '<span class="text-muted">No Banner</span>';
            }              
            $editbtn = '';
            $deletebtn = '';
            
            $editbtn =  '<a href="'.url('edit-portfolio/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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


    public function editPortfolio($id)
    {
        $page_title = 'Edit Portfolio';    
        $portfolioData = Portfolio::where('status', '1')->where('id', $id)->first();
        
        $category = PortfolioCategory::where('status','1')->get();
        $portfolioPhotoData = DB::table('portfolio_photos')->where('portfolio_id', $id)->where('status','1')->get();
        return view('pages.portfolio.add_portfolio', compact('page_title','portfolioData','category','portfolioPhotoData'));
    }
    

    public function deletePortfolio(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('portfolios')
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

    public function deletePortfolioOtherPhoto(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('portfolio_photos')
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
