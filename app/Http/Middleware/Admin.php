<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Admin
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
         $user = Auth::user();

        if(Auth::check())
        {
            if($user->role->name == 'Administrator' && $user->is_active == 1)
            {
                return $next($request);

            }elseif($user->role->name == 'Author' && $user->is_active == 1){

                 return $next($request);

            }else{

                return redirect()->route('home');
            }
        }

        return redirect('/errors.404');
    }
}
