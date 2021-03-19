<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Petugas;



class Ceklevel
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
        if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->level =='admin'){
            return $next($request);
        
        }elseif(Auth::guard('admin')->check() && Auth::guard('admin')->user()->level =='petugas'){
            return $next($request);

        }
        return redirect('/');
    }
    //   public function handle(Request $request, Closure $next, ...$levels)
    // {
    //     if(in_array($request->Petugas()->level,$levels)){
    //         return $next($request);
    //     }
    //     return redirect('/');
    // }
}
