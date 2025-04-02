<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $page_title 	= 'Setting';
        $setting = Setting::where('created_by', Auth::user()->id)->first();
		return view('pages.setting.index', compact('page_title','setting'));

    }
    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Fetch the current setting (if any) from the database
        $setting = Setting::first();  // Get the first setting record or null if none exists
    
        // If there is an existing logo, delete it
        if ($setting && $setting->logo && Storage::disk('public')->exists($setting->logo)) {
            Storage::disk('public')->delete($setting->logo);
        }
    
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = 'logo_' . time() . '.' . $image->getClientOriginalExtension();
            
            // Store image in the 'files/setting/logo' directory
            $image->storeAs('files/setting/logo', $imageName, 'public');
    
            // Prepare data to update
            $data = [
                'logo'         => 'storage/app/public/files/setting/logo/' . $imageName,  // Updated path with 'storage' disk
                'status'       => '1',
                'organization' => Auth::user()->id,
                'created_by'   => Auth::user()->id,
                'updated_by'   => Auth::user()->id,
                'created_at'   => now(),
                'updated_at'   => now(),
            ];
    
            // If there's no setting record, create a new one
            if ($setting) {
                // Update the existing setting
                $setting->update($data);
            } else {
                // Otherwise, create a new setting record
                Setting::create($data);
            }
        }
    
        return response()->json(['success' => 'Logo updated successfully!']);
    }
    

    public function updateFavicon(Request $request)
    {
        $request->validate([
            'favicon' => 'required|mimes:ico,png,jpg,gif|max:1024',
        ]);
    
        // Fetch the current setting (if any) from the database
        $setting = Setting::first();  // Get the first setting record or null if none exists
    
        // If there is an existing favicon, delete it
        if ($setting && $setting->favicon && Storage::disk('public')->exists($setting->favicon)) {
            Storage::disk('public')->delete($setting->favicon);
        }
    
        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $faviconName = 'favicon_' . time() . '.' . $favicon->getClientOriginalExtension();
            
            // Store image in the 'files/setting/favicon' directory
            $favicon->storeAs('files/setting/favicon', $faviconName, 'public');
    
            // Prepare data to update
            $data = [
                'favicon' => 'storage/app/public/files/setting/favicon/' . $faviconName,  // Updated path with 'storage' disk
                'status'       => '1',
                'organization' => Auth::user()->id,
                'created_by'   => Auth::user()->id,
                'updated_by'   => Auth::user()->id,
                'created_at'   => now(),
                'updated_at'   => now(),
            ];
    
            // If there's no setting record, create a new one
            if ($setting) {
                // Update the existing setting
                $setting->update($data);
            } else {
                // Otherwise, create a new setting record
                Setting::create($data);
            }
        }
    
        return response()->json(['success' => 'Favicon updated successfully!']);
    }
    

    public function updateTopBar(Request $request)
    {
        $request->validate([
            'top_bar_email' => 'required|email|max:255',  // Ensure email is not empty
            'top_bar_phone' => 'required|string|max:255',  // Ensure phone number is not empty
        ]);
    
        $data = [
            'top_bar_email' => $request->top_bar_email,
            'top_bar_phone' => $request->top_bar_phone,
            'status'       => '1',
            'organization' => Auth::user()->id,
            'created_by'   => Auth::user()->id,
            'updated_by'   => Auth::user()->id,
            'created_at'   => now(),
            'updated_at'   => now(),
        ];
    
        Setting::updateOrCreate([], $data);
    
        return response()->json(['success' => 'Top Bar settings updated successfully!']);
    }
    
    public function updateFooter(Request $request)
    {
        $request->validate([
            'footer_col1_title' => 'required|string|max:255',
            'footer_col2_title' => 'required|string|max:255',
            'footer_col3_title' => 'required|string|max:255',
            'footer_col4_title' => 'required|string|max:255',
            'footer_copyright' => 'required|string|max:255',
            'footer_address' => 'required|string|max:255',
            'footer_email' => 'required|email|max:255',
            'footer_phone' => 'required|string|max:255',
            'footer_recent_news_item' => 'required|integer|min:1',
            'footer_recent_portfolio_item' => 'required|integer|min:1',
        ]);

        $footerSettings = Setting::first(); // Fetch the first setting record, or handle accordingly

        if (!$footerSettings) {
            $footerSettings = new Setting(); // Create new if none exists
        }

        $footerSettings->footer_col1_title = $request->footer_col1_title;
        $footerSettings->footer_col2_title = $request->footer_col2_title;
        $footerSettings->footer_col3_title = $request->footer_col3_title;
        $footerSettings->footer_col4_title = $request->footer_col4_title;
        $footerSettings->footer_copyright = $request->footer_copyright;
        $footerSettings->footer_address = $request->footer_address;
        $footerSettings->footer_email = $request->footer_email;
        $footerSettings->footer_phone = $request->footer_phone;
        $footerSettings->footer_recent_news_item = $request->footer_recent_news_item;
        $footerSettings->footer_recent_portfolio_item = $request->footer_recent_portfolio_item;

        // Save or update the settings in the database
        $footerSettings->save();

        return response()->json(['success' => 'Footer settings updated successfully!']);
    }

    public function updateNewsletter(Request $request)
    {
        $request->validate([
            'newsletter_text' => 'required|string|max:1000',
        ]);

        $setting = Setting::first(); // Fetch the first setting record, or handle accordingly

        if (!$setting) {
            $setting = new Setting(); // Create a new record if none exists
        }

        // Update the newsletter text
        $setting->newsletter_text = $request->newsletter_text;

        // Save the updated settings
        $setting->save();

        return response()->json(['success' => 'Newsletter text updated successfully!']);
    }
	
	public function updateStoreTechex(Request $request)
	{
		$request->validate([
            'storeOfTechex_heading' => 'required',
            'storeOfTechex_text' => 'required|string|max:1000',
        ]);

        $setting = Setting::first(); // Fetch the first setting record, or handle accordingly

        if (!$setting) {
            $setting = new Setting(); // Create a new record if none exists
        }

        // Update the newsletter text
        $setting->storeOfTechex_heading = $request->storeOfTechex_heading;
        $setting->storeOfTechex_text = $request->storeOfTechex_text;

        // Save the updated settings
        $setting->save();
        return response()->json(['success' => 'Store Techex updated successfully!']);
	}

    public function updateCTA(Request $request)
    {
        $request->validate([
            'cta_text' => 'required|string|max:1000',
            'cta_button_text' => 'required|string|max:255',
            'cta_button_url' => 'required|url',
        ]);

        $setting = Setting::first(); // Fetch the first setting record, or handle accordingly

        if (!$setting) {
            $setting = new Setting(); // Create a new record if none exists
        }

        // Update the CTA section fields
        $setting->cta_text = $request->cta_text;
        $setting->cta_button_text = $request->cta_button_text;
        $setting->cta_button_url = $request->cta_button_url;

        // Save the updated settings
        $setting->save();

        return response()->json(['success' => 'CTA section updated successfully!']);
    }

    public function updateCTABackground(Request $request)
    {
        $request->validate([
            'cta_background' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $setting = Setting::first(); // Fetch the first setting record, or handle accordingly

        if (!$setting) {
            $setting = new Setting(); // Create a new record if none exists
        }

        if ($request->hasFile('cta_background')) {
            // Handle the old background image deletion (if any)
            $existingBackground = $setting->footer_background;
            if ($existingBackground && Storage::disk('public')->exists($existingBackground)) {
                Storage::disk('public')->delete($existingBackground);
            }

            // Store the new background image
            $image = $request->file('cta_background');
            $imageName = 'cta_background_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/cta-background', $imageName, 'public');

            // Update the background image in the database
            $setting->cta_background = 'storage/app/public/files/setting/cta-background/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'CTA background photo updated successfully!']);
    }

    public function updateEmailSettings(Request $request)
    {
        // Validation rules
        $request->validate([
            'send_email_from' => 'required|email',
            'receive_email_to' => 'required|email',
        ]);

        // Update email settings logic here
        // You can save it to the database or session, as needed
        // For example:
        Setting::updateOrCreate(
            [],  // Add appropriate conditions if needed
            [
                'send_email_from' => $request->send_email_from,
                'receive_email_to' => $request->receive_email_to,
            ]
        );

        // Return success response
        return response()->json(['success' => 'Email settings updated successfully!']);
    }

    public function saveSidebarSettings(Request $request)
    {
        // Validation rules
        $request->validate([
            'sidebar_total_recent_post' => 'required|integer',
            'sidebar_news_heading_category' => 'required|string|max:255',
            'sidebar_news_heading_recent_post' => 'required|string|max:255',
            'sidebar_total_upcoming_event' => 'required|integer',
            'sidebar_total_past_event' => 'required|integer',
            'sidebar_event_heading_upcoming' => 'required|string|max:255',
            'sidebar_event_heading_past' => 'required|string|max:255',
            'sidebar_service_heading_service' => 'required|string|max:255',
            'sidebar_service_heading_quick_contact' => 'required|string|max:255',
            'sidebar_portfolio_heading_project_detail' => 'required|string|max:255',
            'sidebar_portfolio_heading_quick_contact' => 'required|string|max:255',
        ]);
    
        // Update or create settings in the database
        Setting::updateOrCreate(
            [], // Update if record exists, otherwise create a new one
            [
                'sidebar_total_recent_post' => $request->sidebar_total_recent_post,
                'sidebar_news_heading_category' => $request->sidebar_news_heading_category,
                'sidebar_news_heading_recent_post' => $request->sidebar_news_heading_recent_post,
                'sidebar_total_upcoming_event' => $request->sidebar_total_upcoming_event,
                'sidebar_total_past_event' => $request->sidebar_total_past_event,
                'sidebar_event_heading_upcoming' => $request->sidebar_event_heading_upcoming,
                'sidebar_event_heading_past' => $request->sidebar_event_heading_past,
                'sidebar_service_heading_service' => $request->sidebar_service_heading_service,
                'sidebar_service_heading_quick_contact' => $request->sidebar_service_heading_quick_contact,
                'sidebar_portfolio_heading_project_detail' => $request->sidebar_portfolio_heading_project_detail,
                'sidebar_portfolio_heading_quick_contact' => $request->sidebar_portfolio_heading_quick_contact,
            ]
        );
    
        // Return success response
        return response()->json(['success' => 'Sidebar settings updated successfully!']);
    }
    public function saveColorSettings(Request $request)
    {
        // Validation rules for color
        $request->validate([
            'front_end_color' => 'required|string|max:7', // Hex color format validation (e.g., #A941B0)
        ]);

        // Example: Save the color code to a settings table or another relevant model
        Setting::updateOrCreate(
            [],
            [
                'front_end_color' => $request->color
            ]
        );

        // Return success message
        return response()->json(['success' => 'Color updated successfully!']);
    }

    public function updateAboutBanner(Request $request)
    {
        $request->validate([
            'banner_about' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_about')) {
            $banner_about = $setting->banner_about;
            if ($banner_about && Storage::disk('public')->exists($banner_about)) {
                Storage::disk('public')->delete($banner_about);
            }

            $image = $request->file('banner_about');
            $imageName = 'about_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/about/', $imageName, 'public');

            $setting->banner_about = 'storage/app/public/files/setting/banner/about/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

    public function updateTestimonialBanner(Request $request)
    {
        $request->validate([
            'banner_testimonial' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_testimonial')) {
            $banner_testimonial = $setting->banner_testimonial;
            if ($banner_testimonial && Storage::disk('public')->exists($banner_testimonial)) {
                Storage::disk('public')->delete($banner_testimonial);
            }

            $image = $request->file('banner_testimonial');
            $imageName = 'testimonial_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/testimonial/', $imageName, 'public');

            $setting->banner_testimonial = 'storage/app/public/files/setting/banner/testimonial/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

    public function updateNewsBanner(Request $request)
    {
        $request->validate([
            'banner_news' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_news')) {
            $banner_news = $setting->banner_news;
            if ($banner_news && Storage::disk('public')->exists($banner_news)) {
                Storage::disk('public')->delete($banner_news);
            }

            $image = $request->file('banner_news');
            $imageName = 'news_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/news/', $imageName, 'public');

            $setting->banner_news = 'storage/app/public/files/setting/banner/news/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

    public function updateEventBanner(Request $request)
    {
        $request->validate([
            'banner_event' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_event')) {
            $banner_event = $setting->banner_event;
            if ($banner_event && Storage::disk('public')->exists($banner_event)) {
                Storage::disk('public')->delete($banner_event);
            }

            $image = $request->file('banner_event');
            $imageName = 'event_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/event/', $imageName, 'public');

            $setting->banner_event = 'storage/app/public/files/setting/banner/event/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

    public function updateContactBanner(Request $request)
    {
        $request->validate([
            'banner_contact' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_contact')) {
            $banner_contact = $setting->banner_contact;
            if ($banner_contact && Storage::disk('public')->exists($banner_contact)) {
                Storage::disk('public')->delete($banner_contact);
            }

            $image = $request->file('banner_contact');
            $imageName = 'contact_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/contact/', $imageName, 'public');

            $setting->banner_contact = 'storage/app/public/files/setting/banner/contact/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

    public function updateSearchBanner(Request $request)
    {
        $request->validate([
            'banner_search' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_search')) {
            $banner_search = $setting->banner_search;
            if ($banner_search && Storage::disk('public')->exists($banner_search)) {
                Storage::disk('public')->delete($banner_search);
            }

            $image = $request->file('banner_search');
            $imageName = 'search_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/search/', $imageName, 'public');

            $setting->banner_search = 'storage/app/public/files/setting/banner/search/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

    public function updatePrivacyBanner(Request $request)
    {
        $request->validate([
            'banner_privacy' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_privacy')) {
            $banner_privacy = $setting->banner_privacy;
            if ($banner_privacy && Storage::disk('public')->exists($banner_privacy)) {
                Storage::disk('public')->delete($banner_privacy);
            }

            $image = $request->file('banner_privacy');
            $imageName = 'privacy_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/privacy/', $imageName, 'public');

            $setting->banner_privacy = 'storage/app/public/files/setting/banner/privacy/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

    public function updateFaqBanner(Request $request)
    {
        $request->validate([
            'banner_faq' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_faq')) {
            $banner_faq = $setting->banner_faq;
            if ($banner_faq && Storage::disk('public')->exists($banner_faq)) {
                Storage::disk('public')->delete($banner_faq);
            }

            $image = $request->file('banner_faq');
            $imageName = 'faq_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/faq/', $imageName, 'public');

            $setting->banner_faq = 'storage/app/public/files/setting/banner/faq/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

    public function updateServiceBanner(Request $request)
    {
        $request->validate([
            'banner_service' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_service')) {
            $banner_service = $setting->banner_service;
            if ($banner_service && Storage::disk('public')->exists($banner_service)) {
                Storage::disk('public')->delete($banner_service);
            }

            $image = $request->file('banner_service');
            $imageName = 'service_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/service/', $imageName, 'public');

            $setting->banner_service = 'storage/app/public/files/setting/banner/service/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

    public function updatePortfolioBanner(Request $request)
    {
        $request->validate([
            'banner_portfolio' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_portfolio')) {
            $banner_portfolio = $setting->banner_portfolio;
            if ($banner_portfolio && Storage::disk('public')->exists($banner_portfolio)) {
                Storage::disk('public')->delete($banner_portfolio);
            }

            $image = $request->file('banner_portfolio');
            $imageName = 'portfolio_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/portfolio/', $imageName, 'public');

            $setting->banner_portfolio = 'storage/app/public/files/setting/banner/portfolio/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

    public function updateTeamBanner(Request $request)
    {
        $request->validate([
            'banner_team' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_team')) {
            $banner_team = $setting->banner_team;
            if ($banner_team && Storage::disk('public')->exists($banner_team)) {
                Storage::disk('public')->delete($banner_team);
            }

            $image = $request->file('banner_team');
            $imageName = 'team_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/team/', $imageName, 'public');

            $setting->banner_team = 'storage/app/public/files/setting/banner/team/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

    public function updatePricingBanner(Request $request)
    {
        $request->validate([
            'banner_pricing' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_pricing')) {
            $banner_pricing = $setting->banner_pricing;
            if ($banner_pricing && Storage::disk('public')->exists($banner_pricing)) {
                Storage::disk('public')->delete($banner_pricing);
            }

            $image = $request->file('banner_pricing');
            $imageName = 'pricing_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/pricing/', $imageName, 'public');

            $setting->banner_pricing = 'storage/app/public/files/setting/banner/pricing/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

    public function updatePhotoGalleryBanner(Request $request)
    {
        $request->validate([
            'banner_photo_gallery' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_photo_gallery')) {
            $banner_photo_gallery = $setting->banner_photo_gallery;
            if ($banner_photo_gallery && Storage::disk('public')->exists($banner_photo_gallery)) {
                Storage::disk('public')->delete($banner_photo_gallery);
            }

            $image = $request->file('banner_photo_gallery');
            $imageName = 'photo_gallery_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/photo_gallery/', $imageName, 'public');

            $setting->banner_photo_gallery = 'storage/app/public/files/setting/banner/photo_gallery/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }
	
    public function updateTermBanner(Request $request)
    {
        $request->validate([
            'banner_terms' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_terms')) {
            $banner_terms = $setting->banner_terms;
            if ($banner_terms && Storage::disk('public')->exists($banner_terms)) {
                Storage::disk('public')->delete($banner_terms);
            }

            $image = $request->file('banner_terms');
            $imageName = 'term_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/term/', $imageName, 'public');

            $setting->banner_terms = 'storage/app/public/files/setting/banner/term/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

	public function updatestoryOfTechexBanner(Request $request)
    {
        $request->validate([
            'stroy_of_techex_image' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('stroy_of_techex_image')) {
            $stroy_of_techex_image = $setting->stroy_of_techex_image;
            if ($stroy_of_techex_image && Storage::disk('public')->exists($stroy_of_techex_image)) {
                Storage::disk('public')->delete($stroy_of_techex_image);
            }

            $image = $request->file('stroy_of_techex_image');
            $imageName = 'term_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/storeOfTechex/', $imageName, 'public');

            $setting->stroy_of_techex_image = 'storage/app/public/files/setting/banner/storeOfTechex/' . $imageName;
            $setting->save(); 
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }

    public function updateVerifySubscriberBanner(Request $request)
    {
        $request->validate([
            'banner_verify_subscriber' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $setting = Setting::first(); 
        if ($request->hasFile('banner_verify_subscriber')) {
            $banner_verify_subscriber = $setting->banner_verify_subscriber;
            if ($banner_verify_subscriber && Storage::disk('public')->exists($banner_verify_subscriber)) {
                Storage::disk('public')->delete($banner_verify_subscriber);
            }

            $image = $request->file('banner_verify_subscriber');
            $imageName = 'verify_subscriber_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('files/setting/banner/verify_subscriber/', $imageName, 'public');

            $setting->banner_verify_subscriber = 'storage/app/public/files/setting/banner/verify_subscriber/' . $imageName;
            $setting->save();
        }

        return response()->json(['success' => 'Banner updated successfully!']);
    }
}
