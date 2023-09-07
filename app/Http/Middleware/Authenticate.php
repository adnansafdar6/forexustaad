<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
//        dd($request);
        if (!$request->expectsJson()) {
            if (str_contains(Request::url(), "admin")) {
                return route('admin.login');
            } else {

                return route('login');
            }
        }
    }
}
