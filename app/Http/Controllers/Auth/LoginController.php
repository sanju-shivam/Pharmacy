<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hash;
use Socialite;
use Str;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if(Auth::user()->hasAnyRoles(['admin', 'staff', 'sales', 'pages', 'user', 'product', 'categories', 'team', 'lead'])){
            $this->redirectTo = route('admin');
            return $this->redirectTo;
        }

        $this->redirectTo = route('dashboard');
        return $this->redirectTo;
    }


    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $token = $user->token;
        $user->getId();
        $user->getName();
        $user->getEmail();
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function facebookCallback()
    {

        $facebookUser = Socialite::driver('facebook')->user();
        // dd($facebookUser);

        $user = User::where('email', $facebookUser->getEmail())->first();

        if($user){
            Auth::login($user, true);

            return redirect('/');
        }else{
            // Register the user
             $user = User::create(
               ['name' => $facebookUser->getName(), 
                'email' => $facebookUser->getEmail(),
                'provider_id' => $facebookUser->getId(),
            ]);
            Auth::login($user, true);
            return redirect('/');
        }

        // login the user
        // Auth::login($user, true);

        return redirect('/');

    }

    

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function googleCallback()
    {

        $facebookUser = Socialite::driver('google')->user();

         dd($facebookUser);

        // $user = User::where('provider_id', $facebookUser->getId())->first();

        // if(!$user){
        //     // Register the user
        //      $user = User::create(
        //        ['name' => $facebookUser->getName(), 
        //         'email' => $facebookUser->getEmail(),
        //         'provider_id' => $facebookUser->getId(),
        //     ]);
        // }

        // // login the user
        // Auth::login($user, true);

        return redirect($this->redirectTo);

    }

}
