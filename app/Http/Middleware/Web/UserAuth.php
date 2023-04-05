<?php

namespace App\Http\Middleware\Web;

use Closure;

class UserAuth
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
        if (is_null($request->session()->get('user'))) {

            return redirect()->route('login_page');
        }

        return $next($request);
    }
}
