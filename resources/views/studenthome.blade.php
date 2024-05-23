<!DOCTYPE html>
@extends('layouts.login')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    </head>
<body>
<a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <!--<i class="fa-solid fa-power-off  align-middle me-1"></i>-->
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
        </header>
<div class="text-center">
            <a href="/" aria-label="Space">
                <img class="mb-3" src="/images/isat.jpg" alt="Logo" width="100" height="100">
            </a>
          </div>
          
        <div class="text-center mb-4">
        @if (isset($studentName))
        <h1 class="h3 mb-0" style="color:#0b0a8d; ">Welcome, {{ $studentName }}!</h1>
    @else
        <p>Student information not found.</p>
    @endif
        </div>
       
        
       
</body>
</html>
