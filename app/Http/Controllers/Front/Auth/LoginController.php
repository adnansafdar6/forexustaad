<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Front\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('front.auth.login');
    }
    protected function attemptLogin(Request $request): bool
    {
        $credentials = $request->only(['email', 'password']);
        if ($this->guard()->attempt($credentials, $request->get('remember'))) {
            // Authentication passed...
            $user = auth()->user();
            $user['token'] = JWTAuth::fromUser($user);
            session()->put('USER', $user->toArray());
//            $this->loadPermissions(session()->get('USER')['role_id']);
            return true;
        }
        return false;
    }
    public function redirectPath()
    {


        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/front/home';
    }
}
