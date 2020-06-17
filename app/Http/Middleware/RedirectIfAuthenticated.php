<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
//            return redirect('/home');
            if(Auth::user()->is_deleted == "1"){
                Auth::logout();
                return redirect()->intended('login')->with('error', 'Incorrect User or Password!');
            }else if(Auth::user()->is_active == "0"){
                Auth::logout();
                return redirect()->intended('login')->with('error', 'Account inactive contact administrator!');
            }else if(Auth::user()->is_approved == "0"){
                Auth::logout();
                return redirect()->intended('login')->with('error', 'Account inactive contact administrator!');
            }
            // Authentication passed...
            else if(Auth::user()->role == "admin"){
                return redirect()->intended('admin/users');
            }
            else if(Auth::user()->role == "fm"){
                return redirect()->intended('fm/create_case');
            }
            else if(Auth::user()->role == "zm"){
                return redirect()->intended('zm/case_lists');
            }
            else if(Auth::user()->role == "nsm"){
                return redirect()->intended('nsm/case_lists');
            }
            else if(Auth::user()->role == "pm"){
                return redirect()->intended('pm/case_lists');
            }
            else{
                Auth::logout();
                return redirect()->back()->with('error', 'Incorrect User or Password!');
            }
        }

        return $next($request);
    }
}
