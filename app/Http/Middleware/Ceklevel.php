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
    public function handle(Request $request, Closure $next, ... $cek)
    {
        if(!$cek){
            redirect('/');
        }
        foreach ($cek as $c) {

            if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->level ==$c){
                return $next($request);
                
            }  
        }
        return abort(404);
    }
}
