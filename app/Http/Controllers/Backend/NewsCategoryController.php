<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Models\Pagging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $page_title 	= 'Category';
        
		return view('pages.news.category.index', compact('page_title'));

    }
    
    public function addCategory()
    {
        $page_title 	= 'Category';
        $categoryData = '';
        
		return view('pages.news.category.add_category', compact('page_title','categoryData'));

    }
 
    public function manageCategory(Request $request)
    {
        $edit_id = $request->edit_id;
        $data = [
            'category_name'       => $request->category_name,
            'meta_title'          => $request->meta_title,
            'meta_keyword'        => $request->meta_keyword,
            'meta_description'    => $request->meta_description,
            'status'              => '1',
            'organization'        => Auth::user()->id
        ];
    
        // Handle the category banner upload
        if ($request->hasFile('category_banner')) {
            // Fetch the existing banner to delete
            $existingBanner = DB::table('news_categories')->where('id', $edit_id)->value('category_banner');
    
            // Delete the existing banner if it exists
            if ($existingBanner && Storage::disk('public')->exists('files/Category/Banners/' . $existingBanner)) {
                Storage::disk('public')->delete('files/Category/Banners/' . $existingBanner);
            }
    
            // Store the new file and set the filename
            $filename = 'category_banner_' . time() . '.' . $request->category_banner->getClientOriginalExtension();
            $request->category_banner->storeAs('files/Category/Banners/', $filename, 'public');
            $data['category_banner'] = $filename;
        } elseif (!empty($edit_id)) {
            // Retain the existing banner if no new file is uploaded
            $data['category_banner'] = DB::table('news_categories')->where('id', $edit_id)->value('category_banner');
        }
    
        if (!empty($edit_id)) {
            // Update existing category
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updated = DB::table('news_categories')->where('id', $edit_id)->update($data);
            $response = ['res' => $updated ? '3' : '0']; // 3: updated, 0: failed
        } else {
            // Create new category
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $insertedId = DB::table('news_categories')->insertGetId($data);
            $response = ['res' => $insertedId ? '1' : '0']; // 1: inserted, 0: failed
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }
    


    public function fetchCategory(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;

        $aColumns = array('mst.id','mst.category_name','mst.category_banner','user.first_name','user.last_name','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = '';
       
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "news_categories as mst";
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
            $row_data[] = $row->category_name;
            // Display banner as an image
            if (!empty($row->category_banner)) {
                $bannerUrl = asset('storage/files/Category/Banners/' . $row->category_banner);
                $row_data[] = '<img src="' . $bannerUrl . '" alt="Category Banner" class="img-thumbnail" style="width: 100px; height: auto;">';
            } else {
                $row_data[] = '<span class="text-muted">No Banner</span>';
            }            
            $editbtn = '';
            $deletebtn = '';
            
            $editbtn =  '<a href="'.url('edit-category/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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


    public function editCategory($id)
    {
        $page_title = 'Edit Category';    
        $categoryData = NewsCategory::where('status', '1')->where('id', $id)->first();
        

        return view('pages.news.category.add_category', compact('page_title','categoryData'));
    }
    

    public function deleteCategory(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('news_categories')
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
