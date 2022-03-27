<?php

use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

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
    return auth()->user()->name;
})->name('home');

Route::get('/register', [registerController::class,'index'])->name('register');
Route::post('/register', [registerController::class,'store']);

Route::get('/login', [loginController::class,'index'])->name('login');
Route::post('/login', [loginController::class,'store']);

Route::resource('departments', DepartmentController::class);
Route::resource('services', ServiceController::class);
Route::resource('complaints',ComplaintController::class);

