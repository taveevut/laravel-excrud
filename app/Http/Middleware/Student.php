<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Carbon;
use Cache;

class Student
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
        if(!Auth::guard('student')->check()){
            return redirect()->route('student.index');
        }

        return $next($request);
    }
}
