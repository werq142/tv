<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;

class IpMiddleware
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
        $ip = $request->ip();
        $settings = Setting::first();
        $ip_list = $settings->ip;

        if (strstr($ip_list, $ip,true))
        {
            return back();
        }

        return $next($request);
    }
}
