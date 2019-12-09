<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSession
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
        if(session()->has(Auth::user()->id)){
            // return view('messenger',['name'=>session()->get(Auth::user()->id)['exam_name']]);
            return redirect('/');
        }
        return $next($request);
    }
}
