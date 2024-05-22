<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class OnlineStudent
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $expireAt = now()->addMinutes(2);
            Cache::put("student-is-online-" . Auth::id(), true, $expireAt);
            Student::where("id", Auth::id())->update(['last_seen' => now()]);
        }
        return $next($request);
    }
}
