<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\LoginHistory;
use App\Models\User;
use App\Models\WhatsAppAdminDetail;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Jenssegers\Agent\Facades\Agent;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
 
    // public function store(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'email' => 'required|email',
    //             'password' => 'required',
    //         ]);
    
    //         $credentials = $request->only('email', 'password');
    //         $user = User::where('email', $request->email)->first();
    
    //         if (!$user) {
    //             return response()->json(['res' => 3]);
    //         } else if (!Hash::check($request->password, $user->password)) {
    //             return response()->json(['res' => 2]); 
    //         } else {
    //             if (Auth::attempt($credentials)) {
    //                 $request->session()->regenerate();
    //                 $user = Auth::user()->id;
    //                 $browser = Agent::browser();
    //                 $ip = $request->ip();
            
    //                 LoginHistory::insert([
    //                     'user_id'         => $user,
    //                     'in_time'         => date('Y-m-d H:i:s'),
    //                     'ip_address'      => $ip,
    //                     'browser'         => $browser,
    //                     'version'         => Agent::version($browser),
    //                     'device'          => Agent::device(),
    //                     'os'              => Agent::platform(),
    //                     'created_at'      => now(),
    //                     'updated_at'      => now(),

    //                 ]);
    //                 return response()->json(['res' => 1]); 
    //             }
    //         }
           
    //     } catch (\Exception $e) {
    //         return response()->json(['res' => 0, 'error' => $e->getMessage()], 500);
    //     }
    // }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            $credentials = $request->only('email', 'password');
            $user = User::where('email', $request->email)->where('status','1')->first();
    
            if (!$user) {
                return response()->json(['res' => 3]);
            } else if (!Hash::check($request->password, $user->password)) {
                return response()->json(['res' => 2]); 
                
            } else {
                $dateFormat = 'm/d/Y';
                if ($user->role_id != 1) {
                    if (!empty($user->expiry_date)) {
                        $expiryDate = Carbon::createFromFormat($dateFormat, $user->expiry_date)->endOfDay();
                        if ($expiryDate < now()) {
                            return response()->json(['res' => 6]);
                        }
                    }
                }
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    session_start();
                    
               
                    $user = Auth::user()->id;
                    $ip = $request->ip();
            
                    LoginHistory::insert([
                        'user_id'         => $user,
                        'in_time'         => date('Y-m-d H:i:s'),
                        'ip_address'      => $ip,
                        'browser'         => '',
                        'version'         => '',
                        'device'          => '',
                        'os'              => '',
                        'created_at'      => now(),
                        'updated_at'      => now(),

                    ]);
                    return response()->json(['res' => 1]); 
                }
            }
           
        } catch (\Exception $e) {
            return response()->json(['res' => 0, 'error' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $id = Auth::user()->id;
        Auth::guard('web')->logout();
        LoginHistory::where('user_id', $id)->update([
            'out_time' => date('Y-m-d H:i:s'),
            'updated_at'      => now(),
        ]);

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }
}
