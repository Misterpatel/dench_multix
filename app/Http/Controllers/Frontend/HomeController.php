<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
      return view('frontend.home');
    }
    
    public function about()
    {
      return view('frontend.about');
    }
    
    


    public function qualitativeResearch()
    {
      return view('frontend.services.qualitative_research');
    }

    public function quantitativeResearch()
    {
      return view('frontend.services.quantitative_research');
    }

    public function marketIntelligence()
    {
      return view('frontend.services.market_intelligence');
    }

    public function testimonials()
    {
      return view('frontend.services.testimonials');
    }

    public function contactUs()
    {
      return view('frontend.contact_us');
    }

    public function manageContact(Request $request)
    {
        $edit_id = $request->edit_id;
        $row = array();

        // Prepare data with new fields
        $data = [
            'name'                    => $request->name,
            'email'                   => $request->email,
            'message'                 => $request->message,
            'sign_up_for_promotion'   => $request->has('sign_up_for_promotion') ? 1 : 0,
            'status'                  => '1', 
        ];

        if (!empty($edit_id)) {
            // Update existing consumer
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = Carbon::now();

            if (DB::table('contact_us')->where('id', $edit_id)->update($data)) {
                $row['res'] = '3'; // Update successful
            } else {
                $row['res'] = '0'; // Update failed
            }
        } else {
              // Create new consumer
              $data['created_by'] = Auth::user()?->id ?? 0;
              $data['updated_by'] = Auth::user()?->id ?? 0;              
              $data['created_at'] = Carbon::now();
              $data['updated_at'] = Carbon::now();
  
              if ($insertid = DB::table('contact_us')->insertGetId($data)) {
                  $row['res'] = '1'; // Insert successful
              } else {
                  $row['res'] = '0'; // Insert failed
              }
        }

        return response()->json($row, 200, ['Content-Type' => 'application/json']);
    }

    public function joinConsumer()
    {
      return view('frontend.join_consumer');
    }

    public function joinExpert()
    {
      return view('frontend.join_expert');
    }

    public function searchExpert()
    {
        $countries = DB::table('experts')->where('expert_status', '1')->select('country')->distinct()->pluck('country');
        $experts = DB::table('experts')->where('expert_status', '1')->where('status', '1')->get();
    
        return view('frontend.search_expert', compact('experts', 'countries'));
    }
    
    // public function searchExperts(Request $request)
    // {
    //     $query = Expert::query();
    //     $query->where('expert_status', '1');
    //     $query->where('status', '1');
    //     // Filter by country
    //     if ($request->has('countries') && !empty($request->countries)) {
    //         $query->whereIn('country', $request->countries);
    //     }
    
    //     // Filter by role
    //     if ($request->has('roles') && !empty($request->roles)) {
    //         $query->whereIn('role_in_company', $request->roles);
    //     }
    
    //     // Filter by soft skills
    //     if ($request->has('soft_skills') && !empty($request->soft_skills)) {
    //         $query->where(function ($q) use ($request) {
    //             foreach ($request->soft_skills as $skill) {
    //                 $q->orWhere('soft_skills', 'like', '%' . $skill . '%');
    //             }
    //         });
    //     }
    
    //     // Filter by technical skills
    //     if ($request->has('technical_skills') && !empty($request->technical_skills)) {
    //         $query->where(function ($q) use ($request) {
    //             foreach ($request->technical_skills as $skill) {
    //                 $q->orWhere('technical_skills', 'like', '%' . $skill . '%');
    //             }
    //         });
    //     }
    
    //     // Filter by experience
    //     if ($request->has('experience') && !empty($request->experience)) {
    //         $query->whereIn('years_of_experience', $request->experience);
    //     }
    
    //     // Filter by keywords
    //     if ($request->has('keywords') && !empty($request->keywords)) {
    //         $keywords = explode(',', $request->keywords); // Split keywords by comma
    //         $query->where(function ($q) use ($keywords) {
    //             foreach ($keywords as $keyword) {
    //                 $keyword = trim($keyword); // Remove any extra spaces around the keyword
    //                 $q->orWhere('first_name', 'like', '%' . $keyword . '%')
    //                     ->orWhere('last_name', 'like', '%' . $keyword . '%')
    //                     ->orWhere('email', 'like', '%' . $keyword . '%')
    //                     ->orWhere('unique_id', 'like', '%' . $keyword . '%')
    //                     ->orWhere('phone', 'like', '%' . $keyword . '%')
    //                     ->orWhere('city', 'like', '%' . $keyword . '%')
    //                     ->orWhere('state', 'like', '%' . $keyword . '%')
    //                     ->orWhere('country', 'like', '%' . $keyword . '%')
    //                     ->orWhere('linkedin', 'like', '%' . $keyword . '%')
    //                     ->orWhere('about', 'like', '%' . $keyword . '%')
    //                     ->orWhere('years_of_experience', 'like', '%' . $keyword . '%')
    //                     ->orWhere('role_in_company', 'like', '%' . $keyword . '%')
    //                     ->orWhere('work_experience', 'like', '%' . $keyword . '%')
    //                     ->orWhere('soft_skills', 'like', '%' . $keyword . '%')
    //                     ->orWhere('technical_skills', 'like', '%' . $keyword . '%');
    //             }
    //         });
    //     }

    //     $experts = $query->get();
    
    //     return response()->json(['experts' => $experts]);
    // }


    public function searchExperts(Request $request)
    {
        $query = Expert::query();
        $query->where('expert_status', '1');
        $query->where('status', '1');
    
        if ($request->has('countries') && !empty($request->countries)) {
            $query->whereIn('country', $request->countries);
        }
    
        if ($request->has('roles') && !empty($request->roles)) {
            $query->whereIn('role_in_company', $request->roles);
        }
    
        if ($request->has('soft_skills') && !empty($request->soft_skills)) {
            $query->where(function ($q) use ($request) {
                foreach ($request->soft_skills as $skill) {
                    $q->orWhereRaw('LOWER(soft_skills) LIKE ?', ['%' . strtolower($skill) . '%']);
                }
            });
        }
    
        if ($request->has('technical_skills') && !empty($request->technical_skills)) {
            $query->where(function ($q) use ($request) {
                foreach ($request->technical_skills as $skill) {
                    $q->orWhereRaw('LOWER(technical_skills) LIKE ?', ['%' . strtolower($skill) . '%']);
                }
            });
        }
    
        if ($request->has('experience') && !empty($request->experience)) {
            $query->whereIn('years_of_experience', $request->experience);
        }
    
        if ($request->has('company') && !empty($request->company)) {
            $query->where(function ($q) use ($request) {
                foreach ($request->company as $company) {
                    $q->orWhereRaw('LOWER(work_experience) LIKE ?', ['%' . strtolower($company) . '%']);
                }
            });
        }
    
        if ($request->has('keywords') && !empty($request->keywords)) {
            $keywords = explode(',', $request->keywords); 
            $query->where(function ($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $keyword = trim($keyword); 
                    $q->where(function ($subQuery) use ($keyword) {
                        $subQuery->whereRaw('LOWER(first_name) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(last_name) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(email) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(unique_id) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(phone) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(city) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(state) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(country) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(linkedin) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(about) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(years_of_experience) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(role_in_company) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(work_experience) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(soft_skills) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]'])
                            ->orWhereRaw('LOWER(technical_skills) REGEXP ?', ['[[:<:]]' . strtolower($keyword) . '[[:>:]]']);
                    });
                }
            });
        }
    
        $experts = $query->get();
    
        return response()->json(['experts' => $experts]);
    }
    
    // public function searchExperts(Request $request)
    // {
    //     $query = Expert::query();
    //     $query->where('expert_status', '1');
    //     $query->where('status', '1');

    //     // Filter by country
    //     if ($request->has('countries') && !empty($request->countries)) {
    //         $query->whereIn('country', $request->countries);
    //     }

    //     // Filter by role
    //     if ($request->has('roles') && !empty($request->roles)) {
    //         $query->whereIn('role_in_company', $request->roles);
    //     }

    //     // Filter by soft skills
    //     if ($request->has('soft_skills') && !empty($request->soft_skills)) {
    //         $query->where(function ($q) use ($request) {
    //             foreach ($request->soft_skills as $skill) {
    //                 $q->orWhere('soft_skills', 'like', '%' . $skill . '%');
    //             }
    //         });
    //     }

    //     // Filter by technical skills
    //     if ($request->has('technical_skills') && !empty($request->technical_skills)) {
    //         $query->where(function ($q) use ($request) {
    //             foreach ($request->technical_skills as $skill) {
    //                 $q->orWhere('technical_skills', 'like', '%' . $skill . '%');
    //             }
    //         });
    //     }

    //     // Filter by experience
    //     if ($request->has('experience') && !empty($request->experience)) {
    //         $query->whereIn('years_of_experience', $request->experience);
    //     }
    //     if ($request->has('company') && !empty($request->company)) {
    //         $query->where(function ($q) use ($request) {
    //             foreach ($request->company as $company) {
    //                 $q->orWhere('work_experience', 'like', '%' . $company . '%');
    //             }
    //         });
    //     }
    
    //     // Filter by keywords (ensure exact matches for unique words)
    //     if ($request->has('keywords') && !empty($request->keywords)) {
    //         $keywords = explode(',', $request->keywords); // Split keywords by comma
    //         $query->where(function ($q) use ($keywords) {
    //             foreach ($keywords as $keyword) {
    //                 $keyword = trim($keyword); // Remove extra spaces around the keyword
    //                 $q->where(function ($subQuery) use ($keyword) {
    //                     $subQuery->where('first_name', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('last_name', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('email', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('unique_id', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('phone', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('city', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('state', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('country', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('linkedin', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('about', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('years_of_experience', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('role_in_company', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('work_experience', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('soft_skills', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]')
    //                         ->orWhere('technical_skills', 'regexp', '[[:<:]]' . $keyword . '[[:>:]]');
    //                 });
    //             }
    //         });
    //     }

    //     $experts = $query->get();

    //     return response()->json(['experts' => $experts]);
    // }


    public function ourVault()
    {
      $countryData = Expert::select('country', DB::raw('count(*) as count'))
          ->whereNotNull('country')
          ->groupBy('country')
          ->get();
      
          $roleData = Expert::select('role_in_company', DB::raw('count(*) as count'))
          ->whereNotNull('role_in_company')
          ->where('role_in_company', '<>', '') // Exclude empty strings
          ->groupBy('role_in_company')
          ->get();
      
  

        $yearsOfExperienceData = Expert::select('years_of_experience', DB::raw('count(*) as count'))
            ->groupBy('years_of_experience')
            ->get();
        return view('frontend.our_vault', compact('countryData', 'roleData','yearsOfExperienceData'));
    }


    public function policies()
    {
      return view('frontend.policies');
    }

    // public function searchExpertProfile($id)
    // {
          
    //   $expertData = Expert::where('status', '1')->where('id', $id)->first();
    
    //   $soft_skills = $expertData ? json_decode($expertData->soft_skills) : [];
    //   $technical_skills = $expertData ? json_decode($expertData->technical_skills) : [];
    //   $work_experience = $expertData ? json_decode($expertData->work_experience) : [];

    //   return view('frontend.expert_profile', compact('expertData', 'soft_skills', 'technical_skills', 'work_experience'));
    // }
    public function searchExpertProfile($id)
    {
        $expertData = Expert::where('status', '1')->where('expert_status', '1')->where('id', $id)->first();

        $soft_skills = $expertData && $expertData->soft_skills 
            ? array_filter(json_decode($expertData->soft_skills, true), function ($item) {
                return !empty($item);
            })
            : [];

        $technical_skills = $expertData && $expertData->technical_skills 
            ? array_filter(json_decode($expertData->technical_skills, true), function ($item) {
                return !empty($item);
            })
            : [];

        $work_experience = $expertData && $expertData->work_experience 
            ? array_filter(json_decode($expertData->work_experience, true), function ($item) {
                return !empty($item);
            })
            : [];

        return view('frontend.expert_profile', compact('expertData', 'soft_skills', 'technical_skills', 'work_experience'));
    }

}
