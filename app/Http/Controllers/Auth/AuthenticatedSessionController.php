<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\ThirdParty\IpApi;
use App\Models\UserLoginData;
use App\Notifications\NewDeviceLoginNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    protected $ipApiService;

    public function __construct(IpApi $ipApiService)
    {
        $this->ipApiService = $ipApiService;
    }
    
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Get user's IP address
        $ip = $request->getClientIp();
       // $ip = '57.153.232.99';

        // Get IP location using IpApiService
        $ipLocation = $this->ipApiService->getLocation($ip);

        // Get user agent
        $userAgent =  $request->header('User-Agent');

        $userId = auth()->id();
        //handle device information
        $locationString = $this->formattedLocation($ipLocation);
      
        $this->handleNewDeviceLogin($userId, $ip, $userAgent, $locationString);
      
        UserLoginData::create([
            'user_id' => $userId,
            'ip' => $ip,
            'ip_location' =>  $locationString,
            'login_at' => Carbon::now(),
            'user_agent' => $userAgent,
        ]);


        return redirect()->intended(RouteServiceProvider::HOME);
    }
    protected function formattedLocation(array $location): string {
        $locationDetails = '';

        // Define the keys to include in the location details
        $keys = ['country', 'regionName', 'city', 'zip', 'lat', 'lon', 'timezone'];
        
        // Loop through the selected keys and format key-value pairs
        foreach ($keys as $key) {
            if (isset($location[$key])) {
                $locationDetails .= ucfirst(str_replace("_", " ", $key)) . ": " . $location[$key] . "\n";
            }
        }
        
        // Output the location details string
        return $locationDetails;
    }
    protected function handleNewDeviceLogin($user_id, $ip, $userAgent, $ipLocation)
    {
        
        $previousLogin = UserLoginData::where('user_id', $user_id)
            ->where('ip', $ip)
            ->where('user_agent', $userAgent)
            ->first();

        if ($previousLogin) {
           $user = auth()->user();
           Notification::route('mail', $user->email)
           ->notify(new NewDeviceLoginNotification($ip, $userAgent, $ipLocation));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}