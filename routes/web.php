<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\VendorAuthController;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});
Route::get('/layout', function () {
    return view('layout');
});

Route::get('/vendor/register', [VendorAuthController::class, 'showRegistrationForm'])->name('vendor.register');
Route::post('/vendor/register', [VendorAuthController::class, 'register']);


//  customer
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:customer'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('users.customer.dashboard');
    })->name('dashboard');
});
//


// Routes for vendor
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:vendor', // التأكد من أن المستخدم له صلاحية 'vendor'
])->prefix('vendor')->name('vendor.')->group(function () {
    // التوجيه إلى لوحة التحكم الخاصة بالتاجر
    Route::get('/dashboard', function () {
        return view('users.vendor.dashboard'); // التأكد من أن العرض الخاص بـ vendor موجود
    })->name('dashboard');

    // باقي المسارات الخاصة بـ vendor
    Route::resource('products', ProductController::class);
    Route::get('/product/trashed/{subcategory_id?}', [ProductController::class, 'trashed'])->name('products.trashed');
    Route::get('/product/restore/{id}', [ProductController::class, 'product_restore'])->name('products.restore');
    Route::delete('/product/hdelete/{id}', [ProductController::class, 'forceDelete'])->name('products.forceDelete');
    Route::get('product/{slug}', [ProductController::class, 'show'])->name('product.show');
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::get('/get-subcategories', [ProductController::class, 'getSubcategories'])->name('getSubcategories');
});






Route::get('/get-subcategories', [ProductController::class, 'getSubcategories'])->name('getSubcategories');

//  moderator
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:moderator'
])->prefix('moderator')->name('moderator.')->group(function () {
    Route::get('/dashboard', function () {
        return view('users.moderator.dashboard');
    })->name('dashboard');
    // Route::resource('vendors', ModeratorController::class);
    // Vendors
    // Route::get('/{role}', [ModeratorController::class, 'indexByRole'])->name('vendor');

    Route::get('/{role}', [ModeratorController::class, 'indexByRole'])
        ->where('role', 'vendor|customer') // تأكد أن القيمة صحيحة فقط
        ->name('users.byRole');


    Route::post('/vendor', [ModeratorController::class, 'store'])->name('vendorStore');
    Route::get('/create', [ModeratorController::class, 'create'])->name('createVendor');
    Route::get('/vendor/{vendor}/edit', [ModeratorController::class, 'edit'])->name('vendors.edit');
    Route::get('/vendor/trashed', [ModeratorController::class, 'trashed'])->name('vendor.trashed');
    Route::get('/vendor/{id}', [ModeratorController::class, 'show'])->name('vendors.show');
    Route::put('/vendor/{vendor}', [ModeratorController::class, 'update'])->name('vendors.update');
    Route::delete('/vendor/{id}', [ModeratorController::class, 'destroy'])->name('delete');
    Route::get('/vendor/restore/{id}', [ModeratorController::class, 'restore'])->name('vendor.restore');
    Route::delete('/vendor/trashed/{id}', [ModeratorController::class, 'forceDelete'])->name('forceDelete');
    // routes/web.php
    Route::get('/vendors/search', [ModeratorController::class, 'ajaxSearch'])->name('vendors.ajaxSearch');

    // Customer
    // Route::get('/{role}', [ModeratorController::class, 'indexByRole'])->name('customer');
});

//  admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin'
])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('users.admin.dashboard');
    })->name('dashboard');
});
//





// Google
Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
// Facebook
Route::get('/auth/facebook', [SocialAuthController::class, 'redirectToFacebook']);
Route::get('/auth/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback']);
