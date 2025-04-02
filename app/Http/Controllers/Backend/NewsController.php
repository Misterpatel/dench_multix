<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Pagging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $page_title = 'News';
        
		return view('pages.news.index', compact('page_title'));

    }
    
    public function addNews()
    {
        $page_title = 'News';
        $newsData = '';
        $category = NewsCategory::where('status', '1')->get();
		return view('pages.news.add_news', compact('page_title','newsData','category'));

    }
    public function manageNews(Request $request)
    {
        $edit_id = $request->edit_id;
        $row = array();
        $data = array(
            'news_title'         => $request->news_title, 
            'news_content_short' => $request->news_content_short, 
            'news_content'       => $request->news_content,    
            'news_date'          => $request->news_date,       
            'category_id'        => $request->category_id,     
            'comment'            => $request->comment,   
            'meta_title'         => $request->meta_title,
            'meta_keyword'       => $request->meta_keyword,
            'meta_description'   => $request->meta_description,
            'status'             => '1',
        );
      
        // Handle Featured Photo Upload
        if ($request->hasFile('photo')) {
            // Fetch existing photo to delete
            $existingPhoto = DB::table('news')->where('id', $edit_id)->value('photo');
    
            // Delete the existing photo if it exists
            if ($existingPhoto && Storage::disk('public')->exists('files/news/' . $existingPhoto)) {
                Storage::disk('public')->delete('files/news/' . $existingPhoto);
            }
    
            // Store the new photo and set the filename
            $photoName = 'photo_' . time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('files/news/', $photoName, 'public');
            $data['photo'] = $photoName;
        } elseif (!empty($edit_id)) {
            // Retain the existing photo if no new file is uploaded
            $data['photo'] = DB::table('news')->where('id', $edit_id)->value('photo');
        }
    
        // Handle Banner Upload
        if ($request->hasFile('banner')) {
            // Fetch existing banner to delete
            $existingBanner = DB::table('news')->where('id', $edit_id)->value('banner');
    
            // Delete the existing banner if it exists
            if ($existingBanner && Storage::disk('public')->exists('files/news/' . $existingBanner)) {
                Storage::disk('public')->delete('files/news/' . $existingBanner);
            }
    
            // Store the new banner and set the filename
            $bannerName = 'banner_' . time() . '.' . $request->banner->getClientOriginalExtension();
            $request->banner->storeAs('files/news/', $bannerName, 'public');
            $data['banner'] = $bannerName;
        } elseif (!empty($edit_id)) {
            // Retain the existing banner if no new file is uploaded
            $data['banner'] = DB::table('news')->where('id', $edit_id)->value('banner');
        }
    
        // Handle other form data and update/insertion as usual
        $user = Auth::user();
        $timestamp = now();
      
        if (!empty($edit_id)) {
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updateid = DB::table('news')
                ->where('id', $edit_id)
                ->update($data);
            $row['res'] = $updateid ? '3' : '0';
        } else {
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = $timestamp;
            $data['updated_at'] = $timestamp;
            $insertid = DB::table('news')->insertGetId($data);
            $row['res'] = $insertid ? '1' : '0';
        }
    
        return response()->json($row, 200, ['Content-Type' => 'application/json']);
    }
    

    public function fetchNews(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;

        $aColumns = array('mst.id','mst.news_title','mst.photo','mst.banner','category.category_name','user.first_name','user.last_name','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = '';
       
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "news as mst";
        $isJOIN = array(
            'left join users as user on user.id = mst.created_by',
            'left join news_categories as category on category.id = mst.category_id',

        );
        $hOrder = "mst.id desc";
        $sqlReturn = Pagging::get_datatables($aColumns, $table, $hOrder, $isJOIN, $isWhere, $request);

        $appData = array();
        $no = $request->iDisplayStart + 1;
        foreach ($sqlReturn['data'] as $row) {        
            $row_data = array();
            $row_data[] = $no;
            $row_data[] = $row->news_title;
            if (!empty($row->photo)) {
                $bannerUrl = asset('storage/files/news/' . $row->photo);
                $row_data[] = '<img src="' . $bannerUrl . '" alt="Photo" class="img-thumbnail" style="width: 100px; height: auto;">';
            } else {
                $row_data[] = '<span class="text-muted">No Banner</span>';
            }      
            if (!empty($row->banner)) {
                $bannerUrl = asset('storage/files/news/' . $row->banner);
                $row_data[] = '<img src="' . $bannerUrl . '" alt="Banner" class="img-thumbnail" style="width: 100px; height: auto;">';
            } else {
                $row_data[] = '<span class="text-muted">No Banner</span>';
            }      
            $row_data[] = $row->category_name;
            
            $editbtn = '';
            $deletebtn = '';
            
            $editbtn =  '<a href="'.url('edit-news/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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


    public function editNews($id)
    {
        $page_title = 'Edit News';    
        $newsData = News::where('status', '1')->where('id', $id)->first();
        $category = NewsCategory::where('status', '1')->get();

        return view('pages.news.add_news', compact('page_title','newsData','category'));
    }
    

    public function deleteNews(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('news')
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
