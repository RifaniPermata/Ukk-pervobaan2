<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Masyarakatis
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
        $cek = Auth::guard('masyarakat')->check() && Auth::guard('masyarakat')->user()->email_verified_at == null;
        if (!$cek){          
          return $next($request);
        }else{
          return redirect('/');    
        }

    }
}
