<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use \App\Http\Controllers\LogoutController;
use \App\Http\Controllers\Employee\ReportController;
use \App\Http\Controllers\Manager\UserController;
use \App\Http\Controllers\Manager\ProjectController;
use \App\Http\Controllers\Manager\ProjectRoleController;

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

Route::get('/', [StaterkitController::class, 'home'])->name('home');
Route::get('home', [StaterkitController::class, 'home'])->name('home');
// Route Components
Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');


// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('login',[LoginController::class,'login'])->name('login');
Route::get('register',[RegisterController::class,'register'])->name('register');
Route::post('submitRegister',[RegisterController::class,'submitRegister'])->name('add-register');
Route::post('logout',[LogoutController::class,'logout'])->name('logout');
Route::post('login',[LoginController::class,'submitLogin'])->name('submitLogin');

Route::get('report/{userId}',[ReportController::class,'getReportAll'])->name('report.index');
Route::get('createReport/{userId}',[ReportController::class,'add'])->name('report.create');
Route::post('storeReport/{userId}',[ReportController::class,'store'])->name('report.store');
Route::get('editReport/{userId}/{id}',[ReportController::class,'edit'])->name('report.edit');
Route::put('updateReport/{userId}/{id}',[ReportController::class,'update'])->name('report.update');
Route::delete('deleteReport/{id}',[ReportController::class,'delete'])->name('report.delete');

Route::get('managerUser',[UserController::class,'index'])->name('managerUser.index');
Route::get('CreateManagerUser',[UserController::class,'add'])->name('managerUser.create');
Route::post('storeManagerUser',[UserController::class,'store'])->name('managerUser.store');
Route::get('editManagerUser/{id}',[UserController::class,'edit'])->name('managerUser.edit');
Route::put('updateManagerUser/{id}',[UserController::class,'update'])->name('managerUser.update');
Route::delete('deleteManagerUser/{id}',[UserController::class,'delete'])->name('managerUser.delete');

Route::get('managerProject',[ProjectController::class,'index'])->name('managerProject.index');
Route::get('createManagerProject',[ProjectController::class,'add'])->name('managerProject.create');
Route::post('storeManagerProject',[ProjectController::class,'store'])->name('managerProject.store');
Route::get('editManagerProject/{id}',[ProjectController::class,'edit'])->name('managerProject.edit');
Route::put('updateManagerProject/{id}',[ProjectController::class,'update'])->name('managerProject.update');
Route::delete('deleteManagerProject/{id}',[ProjectController::class,'delete'])->name('managerProject.delete');

Route::get('projectRole',[ProjectRoleController::class,'index'])->name('managerProjectRole.index');
Route::get('createProjectRole',[ProjectRoleController::class,'add'])->name('managerProjectRole.create');
Route::post('storeProjectRole',[ProjectRoleController::class,'store'])->name('managerProjectRole.store');
Route::get('editProjectRole/{id}',[ProjectRoleController::class,'edit'])->name('managerProjectRole.edit');
Route::put('updateProjectRole/{id}',[ProjectRoleController::class,'update'])->name('managerProjectRole.update');
Route::delete('deleteProjectRole/{id}',[ProjectRoleController::class,'delete'])->name('managerProjectRole.delete');
