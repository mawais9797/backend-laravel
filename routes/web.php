<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SiteSettingsController;

// Route::get('/', function () {
//     return view('welcome');
// });

// ====================== **** ADMIN ROUTES **** ===============================

Route::middleware(['admin.loggedin'])->group(function(){
    Route::get('/admin/register', [AdminController::class, 'admin_register']);
    Route::post('/admin/register', [AdminController::class, 'register']);

    Route::get('/admin/login', [AdminController::class, 'admin_login']);
    Route::post('/admin/login', [AdminController::class, 'login']);
});

// Route::get('/',[AdminController::class,'index']);


Route::middleware(['check.session'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/logout', [AdminController::class, 'logout']);
    Route::get('/admin/change-password',[AdminController::class,'change_password']);
    Route::post('/admin/change-password',[AdminController::class,'update_password']);

    Route::get('/admin/site_settings',[SiteSettingsController::class,'index']);
    Route::post('/admin/site_settings',[SiteSettingsController::class,'update_settings']);

    Route::get('/admin/sitecontent',[SiteSettingsController::class,'site_content']);
});
// Route::get('/admin/logout', [Index::class, 'logout']);
