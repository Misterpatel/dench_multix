<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pagging;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SocialmediaController extends Controller
{
    public function index()
    {
        $page_title 	= 'Social Media Links';
        $socialMediaData = SocialMedia::where('status', '1')->first();
		return view('pages.socialmedia.index', compact('page_title','socialMediaData'));

    }
    

    public function updateSocialmedia(Request $request)
    {
        $request->validate([
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'google_plus' => 'nullable|url',
            'pinterest' => 'nullable|url',
            'youtube' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tumblr' => 'nullable|url',
            'flickr' => 'nullable|url',
            'reddit' => 'nullable|url',
            'snapchat' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'quora' => 'nullable|url',
            'stumbleupon' => 'nullable|url',
            'delicious' => 'nullable|url',
            'digg' => 'nullable|url',
        ]);

        $socialMedia = SocialMedia::where('created_by', Auth::id())->first();

        if ($socialMedia) {
            // Update existing record
            $socialMedia->update($request->all());
        } else {
            // Create new record
            SocialMedia::create(array_merge($request->all(), [
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
                'status' => '1',
            ]));
        }

        return redirect()->back()->with('success', 'Social media links saved successfully!');
    }

   
}
