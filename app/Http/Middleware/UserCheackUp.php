<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserCheackUp
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
       
   /*     if(auth()->user()->user_type == "Admain"){
           return $next($request); 
        }
        elseif(auth()->user()->user_type == "SalseManager"){

            return $next($request); 
         }
        elseif(auth()->user()->user_type == "PurchaeseManager"){

        }else{
            return redirect('welcome');
        }
    }*/
    
    if(session('user_type') === 'normal_user'){
        return $next($request); 
    }
  



    
}
