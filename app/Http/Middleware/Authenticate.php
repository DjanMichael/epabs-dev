<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;

use Illuminate\Session\Middleware\AuthenticateSession;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (Auth::viaRemember()) {
            return route('dashboard');
        }else{
            if (! $request->expectsJson()) {
                return route('login');
            }
        }
    }
}
