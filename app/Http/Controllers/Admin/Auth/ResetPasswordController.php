<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    public function __construct()
    {
        $this->middleware('guest:admin');
        Password::setDefaultDriver('admins');
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN;

    public function showResetForm(Request $request)
    {

        $token = $request->route()->parameter('token');

        return view('admin.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

//    public function reset(Request $request)
//    {
////        dd($request->all());
//        $request->validate($this->rules(), $this->validationErrorMessages());
//
//
//        // Here we will attempt to reset the user's password. If it is successful we
//        // will update the password on an actual user model and persist it to the
//        // database. Otherwise we will parse the error and return the response.
//        $response = $this->broker()->reset(
//            $this->credentials($request), function ($user, $password) {
//            $this->resetPassword($user, $password);
//        }
//        );
//
//        // If the password was successfully reset, we will redirect the user back to
//        // the application's home authenticated view. If there is an error we can
//        // redirect them back to where they came from with their error message.
//        return $response == Password::PASSWORD_RESET
//            ? $this->sendResetResponse($request, $response)
//            : $this->sendResetFailedResponse($request, $response);
//    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
//    public function broker()
//    {
//        return Password::broker(request()->get('admin'));
//    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

}
