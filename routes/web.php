<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\vendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedBackController;
use App\Http\Middleware\CheckVendorDocument;
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\VendorAuthController;
use App\Http\Controllers\StoreRatingController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\StoreCommentController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductRatingController;
use App\Http\Controllers\ProductCommentController;


Route::get('/main-page', [CustomerController::class, 'index'])->name('main-page');

Route::get('/layout', function () {
    return view('layout');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/vendor/register', [VendorAuthController::class, 'showRegistrationForm'])->name('vendor.register');
Route::post('/vendor/register', [VendorAuthController::class, 'register']);

// routes/web.php
Route::get('/search-products', [ProductController::class, 'search'])->name('products.search');



//  customer
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:customer',
])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/main-page', [CustomerController::class, 'index'])->name('main-page');

    Route::post('/update-photo', [UserController::class, 'updateProfilePhoto'])->name('update-photo');


    Route::get('/cart', [CartItemController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartItemController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{id}', [CartItemController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartItemController::class, 'remove'])->name('cart.remove');
    // routes/web.php
    Route::delete('/cart/remove-multiple', [CartItemController::class, 'removeMultiple'])
        ->name('cart.removeMultiple');
    Route::delete('/cart', [CartItemController::class, 'clear'])->name('cart.clear');

    Route::post('/product/{id}/rate', [ProductRatingController::class, 'rateProduct'])->middleware('auth')->name('product.rate');
    Route::post('/store/{id}/rate', [StoreRatingController::class, 'rateStore'])->middleware('auth')->name('store.rate');

    Route::post('/stores/{store}/comments', [StoreCommentController::class, 'store'])->name('stores.comments.store');
    Route::post('/products/{product}/comments', [ProductCommentController::class, 'store'])->name('products.comments.store');

    Route::get('/checkout', [CheckoutController::class, 'showCheckout'])
        ->middleware('auth')->name('checkout.show');

    Route::post('/address/store', [AddressesController::class, 'store'])->name('address.store');
    Route::put('/address/{address}', [AddressesController::class, 'update'])->name('address.update');
    Route::get('/checkout/{order}', [StripeController::class, 'index'])->name('payment.index');
    Route::post('/checkout/{order}/bank-transfer', [PaymentMethodController::class, 'storeBankTransfer'])
    ->middleware('auth')
    ->name('checkout.bank_transfer');
    Route::post('/checkout/{order}/pay-on-delivery', [PaymentMethodController::class, 'storePayOnDelivery'])
    ->middleware('auth')
    ->name('checkout.pay_on_delivery');
    Route::post('/checkout/process', [StripeController::class, 'process'])
        ->middleware('auth')->name('checkout.process');
    // Route::post('/orders/{order}/bank_transfer', [StripeController::class, 'bank_transfer'])
    //     ->middleware('auth')->name('checkout.bank_transfer');
    Route::post('/orders/{order}/credit_card', [StripeController::class, 'credit_card'])
        ->middleware('auth')->name('checkout.credit_card');
    // Route::get('/checkout/success/{order}', [StripeController::class, 'checkoutSuccess'])->name('checkout.success');
    Route::post('/stripe/webhook', [StripeController::class, 'handle'])->name('stripe.webhook');

    Route::get('/contact-us/', function () {
        return view('users.customer.contact');
    })->name('contact');

    Route::get('/orders', [CustomerController::class, 'orders_show'])->name('orders.show');
    // routes/web.php
    Route::patch('/orders/{order}/cancel', [CustomerController::class, 'cancel'])->name('orders.cancel');
    Route::patch('/orders/{order}/refund', [CustomerController::class, 'refund'])->name('orders.refund');

    // web.php
    Route::post('/orders/{order}/update-status', [StripeController::class, 'updateOrderStatus'])
    ->middleware('auth')
    ->name('checkout.update_status');

    // صفحة الفورم
    Route::get('/feedback/create/{order_id}/{status}', [FeedBackController::class, 'create'])->name('feedback.create');
    // تخزين البيانات
    Route::post('/feedback/store', [FeedBackController::class, 'store'])->name('feedback.store');
});

Route::get('/main-page', [CustomerController::class, 'guest'])->middleware('guest')->name('guest.main-page');

Route::prefix('customer')->name('customer.')->group(function () {

    Route::get('/product/{id}', [CustomerController::class, 'product_show'])->name('product.show');
    Route::get('/products-customer', [CustomerController::class, 'product_index'])->name('products.index');
    Route::get('/categories/{id}/products', [CustomerController::class, 'products_cat_index'])->name('category_products.index');
    Route::get('/stores', [CustomerController::class, 'stores'])->name('stores.index');
    Route::get('/store/{id}', [CustomerController::class, 'store'])->name('stores.show');

    Route::get('/faq/', function () {
        return view('users.customer.faq');
    })->name('faq');
});

// Routes for vendor
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:vendor',
    // \App\Http\Middleware\VerifiedVendor::class, // التأكد من أن المستخدم له صلاحية 'vendor'
])->prefix('vendor')->name('vendor.')->group(function () {
    // التوجيه إلى لوحة التحكم الخاصة بالتاجر
    Route::get('/dashboard', function () {
        return view('users.vendor.dashboard'); // التأكد من أن العرض الخاص بـ vendor موجود
    })->name('dashboard');

        Route::post('/update-photo', [UserController::class, 'updateProfilePhoto'])->name('update-photo');
        Route::post('/store/update-photo', [vendorController::class, 'updateStorePhoto'])->name('store.update-photo');

    // باقي المسارات الخاصة بـ vendor
    Route::resource('products', ProductController::class);
    Route::get('/product/trashed/{subcategory_id?}', [ProductController::class, 'trashed'])->name('products.trashed');
    Route::get('/product/restore/{id}', [ProductController::class, 'product_restore'])->name('products.restore');
    Route::delete('/product/hdelete/{id}', [ProductController::class, 'forceDelete'])->name('products.forceDelete');
    Route::get('product/{slug}', [ProductController::class, 'show'])->name('product.show');
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::get('/get-subcategories', [ProductController::class, 'getSubcategories'])->name('getSubcategories');
    Route::get('/orders', action: [vendorController::class, 'index'])->name('orders');
    Route::delete('/orders/{id}', [vendorController::class, 'destroy'])->name('orders.destroy');
    Route::post('/store/{store}/update-slogan', [vendorController::class, 'updateSlogan'])
         ->name('store.updateSlogan');
});

Route::get('vendor/register-request/{status}', function ($status) {
    return view('users.vendor.registerOrderSuccess', compact('status'));
})->name('vendor.register.request');

Route::get('vendor/status-request', [VendorAuthController::class, 'documentStatus'])->name('vendor.status');

Route::get('/get-subcategories', [ProductController::class, 'getSubcategories'])->name('getSubcategories');

//  moderator
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:moderator',
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
    Route::patch('/vendor-documents/{document}/status', [VendorAuthController::class, 'updateStatus'])->name('vendor-documents.updateStatus');
    Route::get('/orders', action: [ModeratorController::class, 'orders_in_admin'])->name('orders');


});

//  admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:super_admin',
])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('users.admin.dashboard');
    })->name('dashboard');
        Route::get('/orders', action: [ModeratorController::class, 'orders_in_admin'])->name('orders');

});
//
        Route::post('/user/update-photo', [UserController::class, 'updateProfilePhoto'])->name('user.update-photo');


// Google
Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
// Facebook
Route::get('/auth/facebook', [SocialAuthController::class, 'redirectToFacebook']);
Route::get('/auth/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback']);
