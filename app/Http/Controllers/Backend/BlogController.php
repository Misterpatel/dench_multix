<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Pagging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $page_title 	= 'Blog';
        
		return view('pages.blog.index', compact('page_title'));

    }
    
    public function addBlog()
    {
        $page_title 	= 'Blog';
        $blogData = '';
        $categoryData = BlogCategory::where('status', '1')->get();
		return view('pages.blog.add_blog', compact('page_title','blogData','categoryData'));

    }
 
    public function manageBlog(Request $request)
    {
        $edit_id = $request->edit_id;
        $data = [
            'blog_category_id'  => $request->blog_category_id,
            'heading'           => $request->heading,
            'blog_content'      => $request->blog_content,
            'meta_title'        => $request->meta_title,
            'meta_keyword'      => $request->meta_keyword,
            'meta_description'  => $request->meta_description,
            'meta_slug'         => $request->meta_slug,
            'status'              => '1',
            'organization'        => Auth::user()->id
        ];
        if ($request->hasFile('photo')) {
            $existingBanner = DB::table('blogs')->where('id', $edit_id)->value('photo');
    
            if ($existingBanner && Storage::disk('public')->exists('files/blogs/' . $existingBanner)) {
                Storage::disk('public')->delete('files/blogs/' . $existingBanner);
            }
    
            $filename = 'photo_' . time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->storeAs('files/blogs/', $filename, 'public');
            $data['photo'] = $filename;
        } elseif (!empty($edit_id)) {
            $data['photo'] = DB::table('blogs')->where('id', $edit_id)->value('photo');
        }
        if (!empty($edit_id)) {
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = now();
            $updated = DB::table('blogs')->where('id', $edit_id)->update($data);
            $response = ['res' => $updated ? '3' : '0']; 
        } else {
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $insertedId = DB::table('blogs')->insertGetId($data);
            $response = ['res' => $insertedId ? '1' : '0']; 
        }
    
        return response()->json($response, 200, ['Content-Type' => 'application/json']);
    }
    


    // public function fetchBlog(Request $request)
    // {
    //     $user = Auth::user();
    //     $user_id = $user->id;
    //     $user_role_id = $user->role_id;

    //     $aColumns = array('mst.id','mst.heading','mst.blog_content','blog_categories.name as blog_categories_name','mst.photo','mst.meta_title','mst.meta_keyword','mst.meta_description','user.first_name','user.last_name','mst.status', 'mst.created_at');
    //     $isWhere = array("mst.status != '2'"); 
    //     $where = '';
       
    //     $where = " AND (mst.created_by = '$user_id')";
    //     $isWhere[0] .= $where;
    //     $table = "blogs as mst";
    //     $isJOIN = array(
    //         'left join users as user on user.id = mst.created_by',
    //         'left join blog_categories as blog_categories on blog_categories.id = mst.blog_category_id',
    //     );
    //     $hOrder = "mst.id desc";
    //     $sqlReturn = Pagging::get_datatables($aColumns, $table, $hOrder, $isJOIN, $isWhere, $request);

    //     $appData = array();
    //     $no = $request->iDisplayStart + 1;
    //     foreach ($sqlReturn['data'] as $row) {        
    //         $row_data = array();
    //         $row_data[] = $no;
    //         if (!empty($row->photo)) {
    //             $photoUrl = asset('storage/app/public/files/blogs/' . $row->photo);
    //             $row_data[] = '<img src="' . $photoUrl . '" alt="Photo" class="img-thumbnail" style="width: 100px; height: auto;">';
    //         } else {
    //             $row_data[] = '<span class="text-muted">No Image</span>';
    //         }     
    //         $row_data[] = $row->blog_categories_name;         
    //         $row_data[] = $row->heading;        
    //         $row_data[] = $row->blog_content;          
    //         $row_data[] = $row->meta_title;         
    //         $row_data[] = $row->meta_keyword;         
    //         $row_data[] = $row->meta_description;         
    //         $editbtn = '';
    //         $deletebtn = '';
            
    //         $editbtn =  '<a href="'.url('edit-blog/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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

    public function fetchBlog(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_role_id = $user->role_id;
    
        $aColumns = array('mst.id','mst.heading','mst.blog_content','blog_categories.name as blog_categories_name','mst.photo','mst.meta_title','mst.meta_keyword','mst.meta_description','user.first_name','user.last_name','mst.status', 'mst.created_at');
        $isWhere = array("mst.status != '2'"); 
        $where = " AND (mst.created_by = '$user_id')";
        $isWhere[0] .= $where;
        $table = "blogs as mst";
        $isJOIN = array(
            'left join users as user on user.id = mst.created_by',
            'left join blog_categories as blog_categories on blog_categories.id = mst.blog_category_id',
        );
        $hOrder = "mst.id desc";
        $sqlReturn = Pagging::get_datatables($aColumns, $table, $hOrder, $isJOIN, $isWhere, $request);
    
        $appData = array();
        $no = $request->iDisplayStart + 1;
        foreach ($sqlReturn['data'] as $row) {        
            $row_data = array();
            $row_data[] = $no;
    
            if (!empty($row->photo)) {
                $photoUrl = asset('storage/app/public/files/blogs/' . $row->photo);
                $row_data[] = '<img src="' . $photoUrl . '" alt="Photo" class="img-thumbnail" style="width: 100px; height: auto;">';
            } else {
                $row_data[] = '<span class="text-muted">No Image</span>';
            }     
    
            $row_data[] = $row->blog_categories_name;         
            $row_data[] = $row->heading;        
            // $row_data[] = Str::words($row->blog_content, 10, '...'); // Limit to 10 words       
            // $row_data[] = $row->meta_title;         
            // $row_data[] = $row->meta_keyword;         
            // $row_data[] = Str::words($row->meta_description, 10, '...'); // Limit to 10 words  
    
            $editbtn = '<a href="'.url('edit-blog/'.$row->id).'" type="button" class="btn btn-sm btn-primary">
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
    
    public function editBlog($id)
    {
        $page_title = 'Edit Blog';    
        $blogData = Blog::where('status', '1')->where('id', $id)->first();
        
        $categoryData = BlogCategory::where('status', '1')->get();
        return view('pages.blog.add_blog', compact('page_title','blogData','categoryData'));
    }
    

    public function deleteBlog(Request $request)
	{
		$data = array(
			"status" => '2'
		);
		$affected = DB::table('blogs')
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
