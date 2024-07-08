<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin 
{
    /**
     * Check if the user is an admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin_emails = config('auth.admin_emails');
        $counter_user_emails = config('auth.counter_user_emails');

        if (!in_array($request->user()->email, $admin_emails)) {
            if(in_array($request->user()->email, $counter_user_emails)){
                return redirect()->route('manage-appointment');
            }
            return redirect()->route('home-page');
        }

        return $next($request);
    }
}
