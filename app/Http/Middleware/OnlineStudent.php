<?php

namespace App\Http\Middleware;


use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Models\student;
class OnlineStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

     public function handle(Request $request, Closure $next)
     {
         if(Auth::check()){
             $expireAt = now()->addMinutes(2);
             Cache::put("student-is-online-" .Auth::id(),true,$expireAt);
             student::where("id", Auth::id())->update(['last_seen' => now()]);
         }
         return $next($request);
     }
    
    
    
}
