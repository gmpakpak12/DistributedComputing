<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\StudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/admin/CRUD', [AdminController::class, 'CRUD'])->name('admin.CRUD')->middleware('is_admin');

/*ADMIN CRUD NI*/ 
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/student',[CRUDController::class, 'index'])->name('student.index')->middleware('is_admin');
Route::get('/student/create',[CRUDController::class, 'create'])->name('student.create')->middleware('is_admin');
Route::post('/student',[CRUDController::class, 'store'])->name('student.store')->middleware('is_admin');
Route::get('/student/{student}/edit',[CRUDController::class, 'edit'])->name('student.edit')->middleware('is_admin');
Route::put('/student/{student}/update',[CRUDController::class, 'update'])->name('student.update')->middleware('is_admin');
Route::get('/student/{student}/show',[CRUDController::class, 'show'])->name('student.show')->middleware('is_admin');
Route::delete('/student/{student}/destroy',[CRUDController::class, 'destroy'])->name('student.destroy')->middleware('is_admin');

Route::get('/admin/loginlogs', [App\Http\Controllers\AdminController::class, 'showLoginLogs'])->name('admin.loginlogs')->middleware('is_admin');

/*student routes*/ 


// routes/web.php
Route::get('search-student', [StudentController::class, 'searchStudent'])->name('search-student');



