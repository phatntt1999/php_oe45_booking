<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleIdentification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && !(Auth::user()->role == 'user')) {
            //flash for save data temporarily
            //$request->session()->flash('successMessage', 'Access successful.');
            return $next($request);
        } else {
            return redirect(route('login'))->with('failMessage', 'Please login first!!!');
        }
    }
}
