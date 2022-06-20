<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/',[UserController::class,'welcome'])->name('welcome');
Route::get('/register',[UserController::class,'register'])->name('user.register');
Route::post('/register',[UserController::class,'registerSubmit'])->name('user.register.submit');
Route::get('/login',[UserController::class,'login'])->name('user.login');
Route::post('/login',[UserController::class,'loginSubmit'])->name('user.login.submit');

//USER
Route::get('/dashboard',[UserController::class,'dashboard'])->name('user.dashboard')->middleware('logged.user');
Route::get('/user/details/{id}',[UserController::class,'details'])->name('user.details')->middleware('logged.user');
Route::get('/error',[UserController::class,'error'])->name('user.error');
Route::get('/logout',[UserController::class,'logout'])->name('user.logout');



//ADMIN
Route::get('/admin/home',[UserController::class,'adminHome'])->name('admin.home')->middleware('logged.admin');
Route::get('/admin/details',[UserController::class,'allDetails'])->name('admin.details')->middleware('logged.admin');
Route::get('/user/all/details',[UserController::class,'allDetails'])->name('user.details.all')->middleware('logged.admin');
Route::get('/user/delete/{id}',[UserController::class,'delete'])->name('user.delete')->middleware('logged.admin');
Route::get('/user/modify/{id}',[UserController::class,'modify'])->name('user.modify')->middleware('logged.admin');
Route::post('/user/modify/{id}',[UserController::class,'modified'])->name('user.modified')->middleware('logged.admin');