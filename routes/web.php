<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use \App\Http\Controllers\LogoutController;
use \App\Http\Controllers\Backend\ReportController;
use \App\Http\Controllers\Backend\UserController;
use \App\Http\Controllers\Backend\ProjectController;
use \App\Http\Controllers\Backend\ProjectRoleController;
use \App\Http\Controllers\Backend\StaticReportController;
use \App\Http\Controllers\Backend\StaticMangerController;

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


Route::get('login', [LoginController::class, 'login'])->name('login');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('submitRegister', [RegisterController::class, 'submitRegister'])->name('add-register');
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
Route::post('login', [LoginController::class, 'submitLogin'])->name('submitLogin');

Route::get('report', [ReportController::class, 'getReportAll'])->name('report.index');
Route::get('createReport', [ReportController::class, 'add'])->name('report.create');
Route::post('storeReport', [ReportController::class, 'store'])->name('report.store');
Route::get('editReport/{id}', [ReportController::class, 'edit'])->name('report.edit');
Route::put('updateReport/{id}', [ReportController::class, 'update'])->name('report.update');
Route::delete('deleteReport/{id}', [ReportController::class, 'delete'])->name('report.delete');

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('create', [UserController::class, 'add'])->name('users.create');
    Route::post('store', [UserController::class, 'store'])->name('users.store');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('delete/{id}', [UserController::class, 'delete'])->name('users.delete');
});

Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('create', [ProjectController::class, 'add'])->name('projects.create');
    Route::post('store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('update/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('delete/{id}', [ProjectController::class, 'delete'])->name('projects.delete');
});

Route::prefix('project-roles')->group(function () {
    Route::get('/', [ProjectRoleController::class, 'index'])->name('project-roles.index');
    Route::get('create', [ProjectRoleController::class, 'add'])->name('project-roles.create');
    Route::post('store', [ProjectRoleController::class, 'store'])->name('project-roles.store');
    Route::get('edit/{id}', [ProjectRoleController::class, 'edit'])->name('project-roles.edit');
    Route::put('update/{id}', [ProjectRoleController::class, 'update'])->name('project-roles.update');
    Route::delete('delete/{id}', [ProjectRoleController::class, 'delete'])->name('project-roles.delete');
});
Route::prefix('static')->group(function (){
    Route::get('employee-month',[StaticReportController::class,'staticByMonth'])->name('static-employee.month');
    Route::get('employee-project',[StaticReportController::class,'staticByProject'])->name('static-employee.project');
    Route::get('manager-role',[StaticMangerController::class,'sumByRole'])->name('static-manager.role');
    Route::get('manager-member',[StaticMangerController::class,'sumTimeByMember'])->name('static-manager.member');
});

