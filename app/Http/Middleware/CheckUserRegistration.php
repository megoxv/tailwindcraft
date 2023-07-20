<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userRegistrationEnabled = (bool) getSetting('user_registration', true);

        if (! $userRegistrationEnabled) {
            return redirect()->route('login')->withErrors(['message' => 'User registration is currently disabled.']);
        }

        return $next($request);
    }
}
