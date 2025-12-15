<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentPages; //Important: Explicit import required in Laravel 12
use App\Http\Controllers\admin\SiteSettingsController;
use App\Http\Controllers\UserController;


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
Route::post('/register-user', [UserController::class,'register_user']);
Route::post('/login-user', [UserController::class,'login_user']);
Route::post('/verify-email', [UserController::class,'verify_email']);
Route::post('/resend-code', [UserController::class,'resend_verification_code']);
// =========================================================

Route::get('/site-settings',[SiteSettingsController::class,'site_settings_data']);
