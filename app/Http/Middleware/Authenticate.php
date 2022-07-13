<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

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
        dd(auth()->user()->role);
        if (!auth()->user() || (auth()->user() && (auth()->user()->is_active == '0' || auth()->user()->role == '0') )) {
            return route('home.login');
        }
    }
}
