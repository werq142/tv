<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;

class RegistrationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $settings = Setting::first();
        if ($settings->registration)
        {
            return $next($request);
        }

        return redirect('/');
    }
}
