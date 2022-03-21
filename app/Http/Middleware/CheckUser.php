<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class CheckUser
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



        if(!Auth::check())
        {
                return redirect()->route('userlogin');
        }

        else
        {
            if (Auth::user()->isadmin==0)
            {
           //     return redirect()->route('adminhome');
                return $next($request);

            }
            else
            {
               return redirect()->route('userlogout');

            }

        }


    }
}
