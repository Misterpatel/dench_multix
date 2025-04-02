<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use App\Models\Lead;
use App\Models\LeadStage;
use App\Models\LeadTag;
use App\Models\Lists;
use App\Models\Menu;
use App\Models\Pagging;
use App\Models\ProductGroup;
use App\Models\{User,FAQ,Blog,Feature,Service,TeamMember,FrontendContact};
use App\Models\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
      
    public function postdata()
    {
        $array = array(
            "ALTER TABLE `abouts` ADD `meta_slug` TEXT NULL AFTER `md_about`;",
            "ALTER TABLE `blogs` ADD `meta_slug` TEXT NULL AFTER `meta_description`;",
            "ALTER TABLE `contacts` ADD `meta_slug` TEXT NULL AFTER `md_contact`;",
            "ALTER TABLE `extra_pages` ADD `meta_slug` TEXT NULL AFTER `meta_description`;",
            "ALTER TABLE `homes` ADD `meta_slug` TEXT NULL AFTER `meta_description`;",
            "ALTER TABLE `services` ADD `meta_slug` TEXT NULL AFTER `meta_description`;",
        );
        foreach ($array as $q) {
            $results = DB::select($q); 
        }
        echo "okay";
    }

    public function downloadDatabase()
    {
        // Database configuration from .env
        $dbHost = env('DB_HOST', '127.0.0.1');
        $dbName = env('DB_DATABASE', 'crazyhoo_eduhancers');
        $dbUser = env('DB_USERNAME', 'crazyhoo_eduhancers');
        $dbPass = env('DB_PASSWORD', 'zN(#hDd2%E?q');
        
        // Filename for the exported SQL file
        $filename = $dbName . "_" . date('Y-m-d_H-i-s') . ".sql";
        
        // Path where the SQL file will be stored temporarily
        $filePath = storage_path($filename);
        
        // Create the command to export the database
        $command = "mysqldump --user={$dbUser} --password='{$dbPass}' --host={$dbHost} {$dbName} > {$filePath}";
        
        // Execute the command
        $output = null;
        $resultCode = null;
        exec($command, $output, $resultCode);
            
        // Check if the file was created
        if (file_exists($filePath)) {
            // Return the file as a download response without deleting it after sending
            return response()->download($filePath);
        } 
    }
    

    public function index()
    {
        $page_title     = 'Dashboard'; 
        $menuId = UserPermission::pluck('menu_id'); 
        $menuList = Menu::whereIn('id', $menuId)->get();
      
	   $faqs=FAQ::where('status','1')->count();
	   $blogs=Blog::where('status','1')->count();
	   $features=Feature::where('status','1')->count();
	   $services=Service::where('status','1')->count();  
	   $teamMembers=TeamMember::where('status','1')->count();    
	   $contacts=FrontendContact::where('status','1')->count();    
       return view('dashboard', compact('page_title','menuList','faqs','blogs','features','services','teamMembers','contacts'));
    }

    

}
