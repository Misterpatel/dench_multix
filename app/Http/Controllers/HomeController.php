<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\ExtraPage;
use App\Models\FrontendContact;
use App\Models\Home;
use App\Models\Service;
use App\Models\{Setting, TeamMember, BlogCategory,FAQ,Feature,ServiceCategory,Testimonial,PhotoGallery,Default_home_pages,Pricing,Slider};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Artisan; 
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class HomeController extends Controller
{
    public function index()
    {
		// $migrationPath = 'database/migrations/2025_03_31_132215_add_column_to_table.php';
       // Artisan::call('migrate', ['--path' => $migrationPath, '--force' => true]);
	    // Artisan::call('optimize:clear'); 
	
        $meta = Home::where('status', '1')->first();  

        if (!$meta) {
            $meta = (object) [
                'meta_title' => '',
                'meta_keyword' => '',
                'meta_description' => '',
            ];
        } else {
            $meta->meta_title = $meta->title ?? '';
            $meta->meta_keyword = $meta->meta_keyword ?? '';
            $meta->meta_description = $meta->meta_description ?? '';
        }
		           
        $banner = Setting::where('status', '1')->value('logo');
        $teamMembers = TeamMember::where('status', '1')->orderBy('id', 'desc')->limit(4)->get();
        $services = Service::with('service_category:id,name')->orderBy('id', 'desc')->limit(4)->get();
        $blogs = Blog::where('status', '1')->orderBy('created_at', 'desc')->limit(4)->get();
        $faqs = FAQ::where('status', '1')->where('show_home','1')->orderBy('created_at', 'desc')->limit(5)->get();
        $feature_services = Feature::where('status', '1')->orderBy('created_at', 'desc')->limit(4)->get();
        $partners_images = PhotoGallery::where('status', '1')->orderBy('created_at', 'desc')->limit(12)->get();
        $testimonials = Testimonial::where('status', '1')->orderBy('created_at', 'desc')->limit(4)->get();
        $pricings = Pricing::where('status', '1')->orderBy('created_at', 'desc')->limit(3)->get();
        $default_page = Default_home_pages::where(['status'=> '1','defalut_page'=>'show'])->first();
        $sliders = Slider::where(['status'=> '1'])->get();
        return view('frontend.index', compact('meta', 'sliders','banner', 'teamMembers', 'services','blogs','faqs','feature_services','pricings','partners_images','testimonials','default_page'));
    }
	
	

    public function about()
    {
        $meta = About::where('status', '1')->first();

        if (!$meta) {
            $meta = (object) [
                'meta_title' => '',
                'meta_keyword' => '',
                'meta_description' => '',
            ];
        } else {
            $meta->meta_title = $meta->mt_about ?? '';
            $meta->meta_keyword = $meta->mk_about ?? '';
            $meta->meta_description = $meta->md_about ?? '';
        }

        $banner = Setting::where('status', '1')->value('banner_about');
        $services = Service::with('service_category:id,name')->orderBy('id', 'desc')->limit(4)->get();
        $teamMembers = TeamMember::where('status', '1')->orderBy('id', 'desc')->limit(4)->get();
		$faqs = FAQ::where('status', '1')->where('show_home','1')->orderBy('created_at', 'desc')->limit(5)->get();
		$testimonials = Testimonial::where('status', '1')->orderBy('created_at', 'desc')->limit(4)->get();
        return view('frontend.about', compact('meta', 'banner', 'teamMembers', 'services','faqs','testimonials'));
    }

    public function services()
    {
        $services = Service::with('service_category:id,name')->orderBy('id', 'desc')->limit(4)->get();
        return view('frontend.services', compact('services'));
    }
   
    public function serviceDetails($category = null, $slug = null)
    { 
		if (!$category || !$slug) {
				abort(404);
			}
		$pageHeading=$slug;
		$serviceDetails = Service::whereHas('service_category', function ($query) use ($category) {
				$query->where('name', $category);
			})->where('heading', 'like', '%' . str_replace('-', ' ', $slug) . '%')->first();


		$services = Service::whereHas('service_category', function ($query) use ($category) {
				$query->where('name', $category);
			})->get();
        return view('frontend.services-details',compact('serviceDetails','services','category','pageHeading'));  
    }



    public function contact()
    {
		
        $meta = Contact::where('status', '1')->first();

        if (!$meta) {   
            $meta = (object) [
                'meta_title' => '',
                'meta_keyword' => '',
                'meta_description' => '',
            ];
        } else {
            $meta->meta_title = $meta->mt_contact ?? '';
            $meta->meta_keyword = $meta->mk_contact ?? '';
            $meta->meta_description = $meta->md_contact ?? '';
        }

        $banner = Setting::where('status', '1')->value('banner_contact');
        $contact = Contact::where('status', '1')->first();
        $settings = Setting::where('status', '1')->first();
        return view('frontend.contact', compact('meta', 'banner', 'contact', 'settings'));
    }


    public function contactSubmit(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string',
            'email'    => 'required|email',
            'address' => 'nullable|string',
            'phone'   => 'nullable|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        // Get only the validated data
        $validated = $validator->validated();

        // Prepare data for storing
        $data = [
            'name'         => $validated['name'],
            'email'        => $validated['email'],
            'address'      => $validated['address'] ?? null,
            'phone'        => $validated['phone'] ?? null,
            'subject'      => $validated['subject'],
            'message'      => $validated['message'],
            'status'       => '1',
            'organization' => '0', 
            'created_by'   => '0',
            'updated_by'   => '0',
            'created_at'   => now(),
            'updated_at'   => now(),
        ];


		$pageName ='Contact Page';
        //send mail 
        $mailData=[
            'subject'=>'New '.$pageName.' Request from Website',
            'data'=>$validated,
        ];
        Mail::to('webmasterpyjourneys@gmail.com')->send(new ContactMail($mailData));

        // Store data in the database
        FrontendContact::create($data);

        return response()->json(['status' => 'success', 'message' => 'Message send successfully']);
    }

    public function blogPgae(Request $request)
    {
        $meta = Blog::where('status', '1')->first();

        if (!$meta) {
            $meta = (object) [
                'meta_title' => '',
                'meta_keyword' => '',
                'meta_description' => '',
            ];
        } else {
            $meta->meta_title = $meta->meta_title ?? '';
            $meta->meta_keyword = $meta->meta_keyword ?? '';
            $meta->meta_description = $meta->meta_description ?? '';
        }

        $getblog = Blog::where('status', '1');
        $getpopularBlog = Blog::where('status', '1');

      // Category Filter
      if(!empty($request->get('category')))
      {
        $categoryData=BlogCategory::where('name',$request->get('category'))->first();
        $category_id=$categoryData->id;

        $getblog=$getblog->where('blog_category_id',$category_id);
        $getpopularBlog=$getpopularBlog->where('blog_category_id',$category_id);

      }

        $banner = Setting::where('status', '1')->value('banner_news');
        $blogs = $getblog->orderBy('created_at', 'desc')->paginate(3);
        $popularBlogs = $getpopularBlog->orderBy('created_at', 'desc')->limit(4)->get();
        $blogCategory = BlogCategory::where('status', '1')->get();
        return view('frontend.blogs', compact('meta', 'banner', 'blogs', 'popularBlogs', 'blogCategory'));
    }


    public function getService($id)
    {
        $services = Service::whereRaw('LOWER(REPLACE(heading, " ", "-")) = ?', [$id])->first();

        if (!$services) {
            return abort(404); // Return a 404 error if service is not found
        }

        $meta = (object) [
            'meta_title' => $services->meta_title ?? '',
            'meta_keyword' => $services->meta_keyword ?? '',
            'meta_description' => $services->meta_description ?? '',
        ];

        $banner = Setting::where('status', '1')->value('banner_service');
        return view('frontend.service', compact('services', 'meta', 'banner'));
    }

    public function getBlog($id)
    {  
        // Fetch the blog based on formatted heading
        $blog = Blog::whereRaw('LOWER(REPLACE(heading, " ", "-")) = ?', [$id])->first();
        if (!$blog) {
            return abort(404); // Return a 404 error if blog is not found
        }

        // Use the same blog data for meta
        $meta = (object) [
            'meta_title' => $blog->meta_title ?? '',
            'meta_keyword' => $blog->meta_keyword ?? '',
            'meta_description' => $blog->meta_description ?? '',
        ];

        $banner = Setting::where('status', '1')->value('banner_news');
        $popularBlogs = Blog::where('status', '1')->orderBy('created_at', 'desc')->limit(4)->get();

        $idFormatted = strtolower(str_replace(' ', '-', $id));
        $regexPattern = implode('|', str_split($idFormatted));
        $relatedBlogs = Blog::where('status', '1')
            ->whereRaw('LOWER(REPLACE(heading, " ", "-")) != ?', [$idFormatted])
            ->whereRaw('LOWER(REPLACE(heading, " ", "-")) REGEXP ?', [$regexPattern])
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        $blogCategory = BlogCategory::where('status', '1')->get();
        return view('frontend.blog', compact('blog', 'meta', 'banner', 'popularBlogs', 'blogCategory', 'relatedBlogs'));
    }


    public function extraPage($slug)
    {
        // Fetch the extra page by converting the slug back to its original format
        $extraPage = ExtraPage::whereRaw('LOWER(REPLACE(heading, " ", "-")) = ?', [$slug])->first();

        if (!$extraPage) {
            abort(404); // Return 404 if the page is not found
        }

        // Create a meta object to prevent errors if any meta field is null
        $meta = (object) [
            'meta_title' => $extraPage->meta_title ?? '',
            'meta_keyword' => $extraPage->meta_keyword ?? '',
            'meta_description' => $extraPage->meta_description ?? '',
        ];

        $banner = Setting::where('status', '1')->value('logo');

        return view('frontend.extra_page', compact('extraPage', 'meta', 'banner'));
    }
}
