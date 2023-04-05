<?php

namespace App\Http\Middleware\Web;

use Closure;

class DoctorPermission
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
        $request->session()->get('user');

        if (!$request->session()->get('user')->hasRole('Doctor')) {

            abort(403);
        }
        
        return $next($request);
    }
}
