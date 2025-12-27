<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentPages; //Important: Explicit import required in Laravel 12
use App\Http\Controllers\admin\SiteSettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\SubCategoriesController;
use App\Http\Controllers\admin\PlansController;


Route::post('/home', [ContentPages::class, 'home']);
Route::post('/about', [ContentPages::class, 'about']);
Route::post('/become-professional', [ContentPages::class, 'become_professional']);
Route::post('/contact', [ContentPages::class, 'contact']);
Route::post('/login', [ContentPages::class, 'login']);
Route::post('/register', [ContentPages::class, 'register']);
Route::post('/trade-person-register', [ContentPages::class, 'trade_person_register']);
Route::post('/privacy-policy', [ContentPages::class, 'privacy_policy']);
Route::post('/terms-conditions', [ContentPages::class, 'terms_conditions']);

// ==================== USER ROUTES ========================
Route::post('/register-user', [UserController::class, 'register_user']);
Route::post('/login-user', [UserController::class, 'login_user']);
Route::post('/verify-email', [UserController::class, 'verify_email']);
Route::post('/resend-code', [UserController::class, 'resend_verification_code']);
Route::post('/professional-registeration', [UserController::class, 'professional_user_register']);

Route::post('/buyer-profile-fetch', [UserController::class, 'buyer_profile_fetch']);
Route::post('/professional-profile-fetch', [UserController::class, 'professional_profile_fetch']);
Route::post('/fetch-categories', [CategoriesController::class, 'fetch_categories']);
Route::post('/fetch-subcategories', [SubCategoriesController::class, 'fetch_subcategories']);
Route::post('/fetch-professional-services', [UserController::class, 'fetch_professional_services']);

Route::post('/add-new-service', [UserController::class, 'add_new_service']);
Route::post('/delete-service', [UserController::class, 'delete_service']);
Route::post('/edit-service', [UserController::class, 'edit_service']);
Route::post('/fetch-one-service', [UserController::class, 'fetch_one_service']);


Route::post('/fetch-plans', [PlansController::class, 'fetch_plans']);

Route::post('/change-password', [UserController::class, 'change_password']);



// =========================================================

Route::get('/site-settings', [SiteSettingsController::class, 'site_settings_data']);
