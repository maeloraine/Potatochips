<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;
use Illuminate\Support\Str;

class Auth0Controller extends Controller
{
    public $auth0;
    
    public function __construct() {
        $configuration = new SdkConfiguration(
            domain: env('AUTH0_DOMAIN'),
            clientId: env('AUTH0_CLIENT_ID'),
            clientSecret: env('AUTH0_CLIENT_SECRET'),
            cookieSecret: env('AUTH0_COOKIE_SECRET', Str::random(50)),
            redirectUri: env('AUTH0_REDIRECT_URI', 'http://localhost:8000/callback')
        );
    
        $this->auth0 = new Auth0($configuration);
    }
    
    public function auth0(){
        // getCredentials() returns null if the user is not authenticated.
        $session = $this->auth0->getCredentials();

        if (null === $session || $session->accessTokenExpired) {
            // Redirect to Auth0 to authenticate the user.
            return redirect($this->auth0->login());
        }
    }

    public function callback(Request $request) {
            $user = \App::make('auth0')->user();
        if (!$user) {
            return redirect('/login'); // Redirect if user data is not found
        }

        \Auth::login($user); // Log the user into Laravel's session
        return redirect()->route('employee-dashboard');
        // // Ensure the user is authenticated via Auth0
        // $user = Auth::user();

        // if ($user) {
        //     // Redirect to the employee dashboard
        //     return redirect()->route('employee-dashboard');
        // }

        // // If authentication failed, redirect to the login page
        // return redirect()->route('login');
    }    
}
