<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SiteSettingsController;
use App\Http\Controllers\admin\Pages;
use App\Http\Controllers\admin\BannerImagesController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\TestimonialsController;


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

    Route::match(['GET', 'POST'], '/admin/pages/home', [Pages::class,'home']);
    Route::match(['GET', 'POST'], '/admin/pages/about', [Pages::class,'about']);
    Route::match(['GET', 'POST'],'/admin/pages/become-professional',[Pages::class,'become_professional']);
    Route::match(['GET', 'POST'],'/admin/pages/contact',[Pages::class,'contact']);
    Route::match(['GET', 'POST'],'/admin/pages/login',[Pages::class,'login']);
    Route::match(['GET', 'POST'],'/admin/pages/register', [Pages::class,'register']);
    Route::match(['GET', 'POST'],'admin/pages/trade-person-register', [Pages::class,'trade_person_register']);
    Route::match(['GET', 'POST'],'admin/pages/privacy-policy', [Pages::class,'privacy_policy']);
    Route::match(['GET', 'POST'],'admin/pages/terms-conditions', [Pages::class,'terms_conditions']);

    Route::get('/admin/bannerimages/index',[BannerImagesController::class,'index']);
    Route::match(['GET', 'POST'], '/admin/bannerimages/add',[BannerImagesController::class,'add_image']);
    Route::match(['GET', 'POST'], '/admin/bannerimages/edit/{id}',[BannerImagesController::class,'edit_image']);
    Route::match(['GET', 'POST'], '/admin/bannerimages/delete/{id}',[BannerImagesController::class,'delete_image']);

    Route::get('admin/categories/index',[CategoriesController::class,'index']);
    Route::match(['GET','POST'],'admin/categories/add', [CategoriesController::class,'add_category']);
    Route::match(['GET','POST'],'admin/categories/edit/{id}', [CategoriesController::class,'edit_category']);
    Route::match(['GET','POST'],'admin/categories/delete/{id}', [CategoriesController::class,'delete_category']);

    Route::get('admin/testimonials/index',[TestimonialsController::class,'index']);
    Route::match(['GET','POST'],'admin/testimonials/add', [TestimonialsController::class,'add_testimonials']);
    Route::match(['GET','POST'],'admin/testimonials/edit/{id}', [TestimonialsController::class,'edit_testimonials']);
    Route::match(['GET','POST'],'admin/testimonials/delete/{id}', [TestimonialsController::class,'delete_testimonials']);
});
// Route::get('/admin/logout', [Index::class, 'logout']);
