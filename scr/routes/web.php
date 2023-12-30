<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

# Home routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/find-job', [HomeController::class, 'findJob']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/detail/{job}', [HomeController::class, 'detail']);
Route::get('/recruitment/{job}', [HomeController::class, 'recruitment'])->middleware('auth');

# Login routes
Route::get('/auth', [AuthController::class, 'index'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/registry-employer', [AuthController::class, 'registryEmployer']);
Route::post('/auth/registry-employer', [AuthController::class, 'registryEmployerSave']);
Route::get('/auth/registry', [AuthController::class, 'registry']);
Route::post('/auth/registry', [AuthController::class, 'registrySave']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

# Logout routes
Route::get('/logout', [AuthController::class, 'index'])->name('logout');

# Admin routes
Route::prefix('admin')->middleware(['auth', 'auth-admin'])->controller(AdminController::class)->group(function () {

    # Admin > Category routes
    Route::prefix('category')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'create');
        Route::post('/add', 'store');
        Route::get('/edit/{category}', 'show');
        Route::post('/edit/{category}', 'update');
        Route::post('/destroy', 'destroy');
    });

    # Admin > Job routes
    Route::prefix('job')->controller(JobController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'create');
        Route::post('/add', 'store');
        Route::get('/view/{job}', 'view');
        Route::get('/edit/{job}', 'show');
        Route::get('/accept/{job}', 'accept');
        Route::post('/edit/{job}', 'update');
        Route::post('/destroy', 'destroy');
        Route::get('/recruitment/{job}', 'recruitment');
    });

    # Admin > Company routes
    Route::prefix('company')->controller(CompanyController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'create');
        Route::post('/add', 'store');
        Route::get('/edit/{company}', 'show');
        Route::post('/edit/{company}', 'update');
        Route::post('/destroy', 'destroy');
    });

    # Admin > Account routes
    Route::prefix('account')->controller(AccountController::class)->group(function () {
        Route::get('/{accountType}', 'index');
        Route::post('/destroy', 'destroy');
    });

    # Admin > Category routes
    Route::prefix('profile')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'save');
    });
});
