<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function CRUD(){
        return view('admin.CRUD');
      
    }
    public function showLoginLogs(Request $request)
    {
        // Get recent student logins (e.g., last 10)
        $recentLogins = User::whereHas('student') // Filter users with linked students
            ->with('student') // Eager load student data
            ->orderBy('last_login_at', 'desc') // Order by last login time (descending)
            ->limit(10) // Limit to 10 recent logins
            ->get();

        return view('admin.loginlogs', compact('recentLogins'));
    }
  

  
}
