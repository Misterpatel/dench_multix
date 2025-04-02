<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    
    public function index()
    {
        $page_title 	= 'Pages';
        $contactData = Contact::where('created_by', Auth::user()->id)->first();
        $aboutData = About::where('created_by', Auth::user()->id)->first();
        $homeData = Home::where('created_by', Auth::user()->id)->first();
		return view('pages.page_section.index', compact('page_title','contactData','aboutData','homeData'));

    }

    public function contactUpdate(Request $request)
    {
        $validated = $request->validate([
            'contact_heading' => 'required|string|max:255',
            'contact_address' => 'required|string',
            'contact_email'   => 'required|string|email',
            'contact_phone'   => 'required|string',
            'contact_map'     => 'required|string',
            'mt_contact'      => 'nullable|string|max:255',
            'mk_contact'      => 'nullable|string',
            'md_contact'      => 'nullable|string',
            'meta_slug'  => 'nullable|regex:/^[a-zA-Z0-9-]+$/',
        ]);

        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();
        $validated['meta_slug'] = $request->contact_meta_slug;

        // Check if contact exists
        $contact = Contact::where('created_by', Auth::user()->id)->first(); // Assuming only one contact entry per user

        if ($contact) {
            $contact->update($validated);
            return response()->json(['success' => true, 'message' => 'Contact updated successfully']);
        } else {
            Contact::create($validated);
            return response()->json(['success' => true, 'message' => 'Contact created successfully']);
        }
    }

    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            'about_heading' => 'required',
            'about_content' => 'required',
            'mt_about'      => 'nullable',
            'mk_about'      => 'nullable',
            'md_about'      => 'nullable',
            'meta_slug'  => 'nullable|regex:/^[a-zA-Z0-9-]+$/',
        ]);
        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();
        $validated['meta_slug'] = $request->about_meta_slug;

        $about = About::where('created_by', Auth::user()->id)->first(); // Single record logic

        if ($about) {
            $about->update($validated);
            return response()->json(['success' => true, 'message' => 'About section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            About::create($validated);
            return response()->json(['success' => true, 'message' => 'About section created successfully']);
        }
    }

    public function updateHomeMeta(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
            'meta_slug'  => 'nullable|regex:/^[a-zA-Z0-9-]+$/',
        ]);
        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();
        $validated['meta_slug'] = $request->home_meta_slug;
        // Process the validated data (e.g., save to database)
        $home = Home::where('created_by', Auth::user()->id)->first(); // Single record logic

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home meta section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home meta section created successfully']);
        }
    }

    public function updateHomeBannerInformation(Request $request)
    {
        $validated = $request->validate([
            'home_bannerInformation_title' => 'required|string|max:255',
            'home_bannerInformation_heading' => 'required|string',
            'home_bannerInformation_description' => 'required|string',
            'home_bannerInformation_status'  => 'required',
        ]);
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();
        // Process the validated data (e.g., save to database)
        $home = Home::where('created_by', Auth::user()->id)->first(); // Single record logic

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home meta section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home meta section created successfully']);
        }
    }
	
	
	public function updateHomeStoryAspireInformation(Request $request)
    {
        $validated = $request->validate([
            'home_storyAspire_heading' => 'required|string',
            'home_storyAspire_description' => 'required|string|max:1000',
            'home_storyAspire_status'  => 'required',
        ]);
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();
        // Process the validated data (e.g., save to database)
        $home = Home::where('created_by', Auth::user()->id)->first(); // Single record logic

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home meta section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id; 
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home meta section created successfully']);
        }
    }
    

    public function updatHomeWelcome(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'home_welcome_title' => 'nullable|string|max:255',
            'home_welcome_subtitle' => 'nullable|string|max:255',
            'home_welcome_text' => 'nullable|string',
            'home_welcome_video' => 'nullable|string',
            'home_welcome_pbar1_text' => 'nullable|string|max:255',
            'home_welcome_pbar1_value' => 'nullable|integer',
            'home_welcome_pbar2_text' => 'nullable|string|max:255',
            'home_welcome_pbar2_value' => 'nullable|integer',
            'home_welcome_pbar3_text' => 'nullable|string|max:255',
            'home_welcome_pbar3_value' => 'nullable|integer',
            'home_welcome_pbar4_text' => 'nullable|string|max:255',
            'home_welcome_pbar4_value' => 'nullable|integer',
            'home_welcome_pbar5_text' => 'nullable|string|max:255',
            'home_welcome_pbar5_value' => 'nullable|integer',
            'home_welcome_status' => 'nullable|string|in:show,hide',
        ]);

        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();
        // Process the validated data (e.g., save to database)
        $home = Home::where('created_by', Auth::user()->id)->first(); // Single record logic

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home welcome section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home welcome section created successfully']);
        }
    }
	
	public function updatHomeContactAbout(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'home_contactAbout_phone' => 'required|numeric|digits:10',
            'home_contactAbout_title' => 'required|string|max:255',
            'home_contactAbout_subtitle' => 'required|string',
            'home_contactAbout_status' => 'required|string',
        ]);

        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();
        // Process the validated data (e.g., save to database)
        $home = Home::where('created_by', Auth::user()->id)->first(); // Single record logic

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home Contact About section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home Contact About section created successfully']);
        }
    }


    public function updatHomeVideoBg(Request $request)
    {
        $request->validate([
            'home_welcome_video_bg' => 'required',
        ]);
    
        $home = Home::first();  
    
        if ($home && $home->home_welcome_video_bg && Storage::disk('public')->exists($home->home_welcome_video_bg)) {
            Storage::disk('public')->delete($home->home_welcome_video_bg);
        }
    
        if ($request->hasFile('home_welcome_video_bg')) {
            $home_welcome_video_bg = $request->file('home_welcome_video_bg');
            $home_welcome_video_bgName = 'home_welcome_video_bg_' . time() . '.' . $home_welcome_video_bg->getClientOriginalExtension();
            
            $home_welcome_video_bg->storeAs('files/home/home_welcome_video_bg', $home_welcome_video_bgName, 'public');
    
            $data = [
                'home_welcome_video_bg' => 'storage/app/public/files/home/home_welcome_video_bg/' . $home_welcome_video_bgName,  // Updated path with 'storage' disk
            ];
    
            if ($home) {
                $home->update($data);
            } else {
                Home::create($data);
            }
        }
    
        return response()->json(['success' => 'Home welcome video background updated successfully!']);
    }

    public function updateWhyChoose(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'home_why_choose_title' => 'required|string|max:255',
            'home_why_choose_subtitle' => 'required|string|max:255',
            'home_why_choose_status' => 'required|in:show,hide',
        ]);

        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();

        $home = Home::where('created_by', Auth::user()->id)->first(); // Single record logic

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home section created successfully']);
        }
    }

    public function updateHomeFeature(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'home_feature_title' => 'required|string|max:255',
            'home_feature_subtitle' => 'required|string|max:1000',
            'home_feature_status' => 'required|in:show,hide',
        ]);

        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();

        $home = Home::where('created_by', Auth::user()->id)->first(); // Single record logic

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home section created successfully']);
        }
    }

    public function updateHomeService(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'home_service_title' => 'required|string|max:255',
            'home_service_subtitle' => 'required|string|max:255',
            'home_service_status' => 'required|in:show,hide',
        ]);

        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();

        $home = Home::where('created_by', Auth::user()->id)->first(); // Single record logic

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home section created successfully']);
        }
    }

    public function updateCounterInfo(Request $request)
    {
        // Validate the data
        $validated = $request->validate([
            'counter_1_title' => 'required|string|max:255',
            'counter_1_value' => 'required|integer',
            'counter_1_icon' => 'required|string|max:255',
            'counter_2_title' => 'required|string|max:255',
            'counter_2_value' => 'required|integer',
            'counter_2_icon' => 'required|string|max:255',
            'counter_3_title' => 'required|string|max:255',
            'counter_3_value' => 'required|integer',
            'counter_3_icon' => 'required|string|max:255',
            'counter_4_title' => 'required|string|max:255',
            'counter_4_value' => 'required|integer',
            'counter_4_icon' => 'required|string|max:255',
            'counter_status' => 'required|string|in:Show,Hide',
        ]);

        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();

        $home = Home::where('created_by', Auth::user()->id)->first(); 

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home section created successfully']);
        }
    }

    public function updatHomeCounterPhoto(Request $request)
    {
        $request->validate([
            'counter_photo' => 'required',
        ]);
    
        $home = Home::first();  
    
        if ($home && $home->counter_photo && Storage::disk('public')->exists($home->counter_photo)) {
            Storage::disk('public')->delete($home->counter_photo);
        }
    
        if ($request->hasFile('counter_photo')) {
            $counter_photo = $request->file('counter_photo');
            $counter_photoName = 'counter_photo_' . time() . '.' . $counter_photo->getClientOriginalExtension();
            
            $counter_photo->storeAs('files/home/counter_photo', $counter_photoName, 'public');
    
            $data = [
                'counter_photo' => 'storage/app/public/files/home/counter_photo/' . $counter_photoName,  // Updated path with 'storage' disk
            ];
    
            if ($home) {
                $home->update($data);
            } else {
                Home::create($data);
            }
        }
    
        return response()->json(['success' => 'Home welcome video background updated successfully!']);
    }

    public function updateWorkPortfolio(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'home_portfolio_title' => 'required|string|max:255',
            'home_portfolio_subtitle' => 'required|string|max:255',
            'home_portfolio_status' => 'required|in:show,hide',
        ]);

        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();

        $home = Home::where('created_by', Auth::user()->id)->first(); 

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home section created successfully']);
        }
    }

    public function updateBookingSection(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'home_booking_form_title' => 'required|string|max:255',
            'home_booking_faq_title' => 'required|string|max:255',
            'home_booking_status' => 'required|in:show,hide',
        ]);

        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();

        $home = Home::where('created_by', Auth::user()->id)->first(); 

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home section created successfully']);
        }
    }

    public function updateBookingPhoto(Request $request)
    {
        $request->validate([
            'home_booking_photo' => 'required',
        ]);
    
        $home = Home::first();  
    
        if ($home && $home->home_booking_photo && Storage::disk('public')->exists($home->home_booking_photo)) {
            Storage::disk('public')->delete($home->home_booking_photo);
        }
    
        if ($request->hasFile('home_booking_photo')) {
            $home_booking_photo = $request->file('home_booking_photo');
            $home_booking_photoName = 'home_booking_photo_' . time() . '.' . $home_booking_photo->getClientOriginalExtension();
            
            $home_booking_photo->storeAs('files/home/home_booking_photo', $home_booking_photoName, 'public');
    
            $data = [
                'home_booking_photo' => 'storage/app/public/files/home/home_booking_photo/' . $home_booking_photoName,  // Updated path with 'storage' disk
            ];
    
            if ($home) {
                $home->update($data);
            } else {
                Home::create($data);
            }
        }
    
        return response()->json(['success' => 'Home updated successfully!']);
    }

    public function updateTeamSection(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'home_team_title' => 'required|string|max:255',
            'home_team_subtitle' => 'required|string|max:255',
            'home_team_status' => 'required|in:show,hide',
        ]);

        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();

        $home = Home::where('created_by', Auth::user()->id)->first(); 

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home section created successfully']);
        }
    }
	
	public function updateOurPartnerSection(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'home_our_partner_title'    => 'required',
            'home_our_partner_subtitle' => 'required',
            'home_our_partner_status'   => 'required|in:show,hide',
        ]);

        $validated['status']       = '1'; 
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();

        $home = Home::where('created_by', Auth::user()->id)->first(); 

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home section created successfully']);
        }
    }
	

    public function updatePricingTable(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'home_ptable_title' => 'required|string|max:255',
            'home_ptable_subtitle' => 'required|string|max:255',
            'home_ptable_status' => 'required|in:show,hide',
        ]);

        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();

        $home = Home::where('created_by', Auth::user()->id)->first(); 

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home section created successfully']);
        }
    }

    public function updateTestimonialSection(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'home_testimonial_title' => 'required|string|max:255',
            'home_testimonial_subtitle' => 'required|string|max:255',
            'home_testimonial_status' => 'required|in:show,hide',
        ]);

        $validated['status']       = '1';
            $validated['organization'] = Auth::user()->id;
            $validated['created_by']   = Auth::user()->id;
            $validated['updated_by']   = Auth::user()->id;
            $validated['created_at']   = now();
            $validated['updated_at']   = now();

            $home = Home::where('created_by', Auth::user()->id)->first(); 

            if ($home) {
                $home->update($validated);
                return response()->json(['success' => true, 'message' => 'Home section updated successfully']);
            } else {
                $validated['created_by'] = Auth::user()->id;
                Home::create($validated);
                return response()->json(['success' => true, 'message' => 'Home section created successfully']);
            }
    }

    public function updateTestimonialPhoto(Request $request)
    {
        $request->validate([
            'home_testimonial_photo' => 'required',
        ]);
    
        $home = Home::first();  
    
        if ($home && $home->home_testimonial_photo && Storage::disk('public')->exists($home->home_testimonial_photo)) {
            Storage::disk('public')->delete($home->home_testimonial_photo);
        }
    
        if ($request->hasFile('home_testimonial_photo')) {
            $home_testimonial_photo = $request->file('home_testimonial_photo');
            $home_testimonial_photoName = 'home_testimonial_photo_' . time() . '.' . $home_testimonial_photo->getClientOriginalExtension();
            
            $home_testimonial_photo->storeAs('files/home/home_testimonial_photo', $home_testimonial_photoName, 'public');
    
            $data = [
                'home_testimonial_photo' => 'storage/app/public/files/home/home_testimonial_photo/' . $home_testimonial_photoName,  // Updated path with 'storage' disk
            ];
    
            if ($home) {
                $home->update($data);
            } else {
                Home::create($data);
            }
        }
    
        return response()->json(['success' => 'Home updated successfully!']);
    }

public function updateAboutFaqSection(Request $request)
{
	$request->validate([
		'faq_image' => 'required',
	]);

	$about = About::first();  
	
	
	
	$filePath = str_replace('storage/app/public/', '', $about->faq_image);
	if (Storage::disk('public')->exists($filePath)) {
		Storage::disk('public')->delete($filePath);
	}

	if ($request->hasFile('faq_image')) {
		$faq_image = $request->file('faq_image');
		$home_testimonial_photoName = 'about_testimonial_photo_' . time() . '.' . $faq_image->getClientOriginalExtension();
		
		$faq_image->storeAs('files/about/faq_image', $home_testimonial_photoName, 'public');

		$data = [
			'faq_image' => 'storage/app/public/files/about/faq_image/' . $home_testimonial_photoName,  // Updated path with 'storage' disk
		];

		if ($about) {
			$about->update($data);
		} else {
			About::create($data);
		}
	}

	return response()->json(['success' => 'About updated successfully!']);
}


public function updateAboutTestimonialSection(Request $request)
{
	$request->validate([
		'testimonial_image' => 'required',
	]);

	$about = About::first();  

	
	$filePath = str_replace('storage/app/public/', '', $about->testimonial_image);
	if (Storage::disk('public')->exists($filePath)) {
		Storage::disk('public')->delete($filePath);
	}

	if ($request->hasFile('testimonial_image')) {
		$testimonial_image = $request->file('testimonial_image');
		$home_testimonial_photoName = 'about_testimonial_photo_' . time() . '.' . $testimonial_image->getClientOriginalExtension();
		
		$testimonial_image->storeAs('files/about/testimonial_image', $home_testimonial_photoName, 'public');
 
		$data = [
			'testimonial_image' => 'storage/app/public/files/about/testimonial_image/' . $home_testimonial_photoName,  // Updated path with 'storage' disk
		];

		if ($about) {
			$about->update($data);
		} else {
			About::create($data);
		}
	}

	return response()->json(['success' => 'About updated successfully!']);
}
	
	


    public function updateBlogSection(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'home_blog_title' => 'required|string|max:255',
            'home_blog_subtitle' => 'required|string|max:255',
            'home_blog_item' => 'required|integer|min:1',
            'home_blog_status' => 'required|in:show,hide',
        ]);

        $validated['status']       = '1';
        $validated['organization'] = Auth::user()->id;
        $validated['created_by']   = Auth::user()->id;
        $validated['updated_by']   = Auth::user()->id;
        $validated['created_at']   = now();
        $validated['updated_at']   = now();

        $home = Home::where('created_by', Auth::user()->id)->first(); 

        if ($home) {
            $home->update($validated);
            return response()->json(['success' => true, 'message' => 'Home section updated successfully']);
        } else {
            $validated['created_by'] = Auth::user()->id;
            Home::create($validated);
            return response()->json(['success' => true, 'message' => 'Home section created successfully']);
        }
    }

}
