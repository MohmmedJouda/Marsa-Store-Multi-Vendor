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

Route::get('/', [CustomerController::class, 'index'])->name('guest.main-page');

Route::get('/vendor/register', [VendorAuthController::class, 'showRegistrationForm'])->name('vendor.register');
Route::post('/vendor/register', [VendorAuthController::class, 'register']);
Route::get('/search-products', [ProductController::class, 'search'])->name('products.search');

// Customer routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:customer',
])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('main-page');
    Route::post('/wishlist/toggle', [CustomerController::class, 'toggleWishlist'])->name('wishlist.toggle');
    Route::post('/wishlist/move-to-cart', [CustomerController::class, 'moveToCart'])->name('wishlist.moveToCart');
    Route::post('/update-photo', [UserController::class, 'updateProfilePhoto'])->name('update-photo');

    Route::get('/cart', [CartItemController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartItemController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{id}', [CartItemController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartItemController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/remove-multiple', [CartItemController::class, 'removeMultiple'])->name('cart.removeMultiple');
    Route::delete('/cart', [CartItemController::class, 'clear'])->name('cart.clear');

    Route::post('/product/{id}/rate', [ProductRatingController::class, 'rateProduct'])->name('product.rate');
    Route::post('/store/{id}/rate', [StoreRatingController::class, 'rateStore'])->name('store.rate');
    Route::post('/stores/{store}/comments', [StoreCommentController::class, 'store'])->name('stores.comments.store');
    Route::post('/products/{product}/comments', [ProductCommentController::class, 'store'])->name('products.comments.store');

    Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
    Route::post('/address/store', [AddressesController::class, 'store'])->name('address.store');
    Route::put('/address/{address}', [AddressesController::class, 'update'])->name('address.update');
    Route::get('/checkout/{order}', [StripeController::class, 'index'])->name('payment.index');
    Route::post('/checkout/{order}/bank-transfer', [PaymentMethodController::class, 'storeBankTransfer'])->name('checkout.bank_transfer');
    Route::post('/checkout/{order}/pay-on-delivery', [PaymentMethodController::class, 'storePayOnDelivery'])->name('checkout.pay_on_delivery');
    Route::post('/checkout/process', [StripeController::class, 'process'])->name('checkout.process');
    Route::post('/orders/{order}/credit_card', [StripeController::class, 'credit_card'])->name('checkout.credit_card');

    Route::get('/contact-us/', function () { return view('users.customer.contact'); })->name('contact');
    Route::get('/orders', [CustomerController::class, 'orders_show'])->name('orders.show');
    Route::patch('/orders/{order}/cancel', [CustomerController::class, 'cancel'])->name('orders.cancel');
    Route::patch('/orders/{order}/refund', [CustomerController::class, 'refund'])->name('orders.refund');

    Route::get('/feedback/create/{order_id}/{status}', [FeedBackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback/store', [FeedBackController::class, 'store'])->name('feedback.store');
});

// Stripe must be reachable by Stripe itself; it must not require a customer session.
Route::post('/stripe/webhook', [StripeController::class, 'handle'])->name('stripe.webhook');

// Public storefront routes
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/product/{id}', [CustomerController::class, 'product_show'])->name('product.show');
    Route::get('/products-customer', [CustomerController::class, 'product_index'])->name('products.index');
    Route::get('/categories/{id}/products', [CustomerController::class, 'products_cat_index'])->name('category_products.index');
    Route::get('/stores', [CustomerController::class, 'stores'])->name('stores.index');
    Route::get('/store/{id}', [CustomerController::class, 'store'])->name('stores.show');
    Route::get('/faq/', function () { return view('users.customer.faq'); })->name('faq');
});

// Vendor routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:vendor',
])->prefix('vendor')->name('vendor.')->group(function () {
    Route::get('/dashboard', [vendorController::class, 'dashboard'])->name('dashboard');
    Route::post('/update-photo', [UserController::class, 'updateProfilePhoto'])->name('update-photo');
    Route::post('/store/update-photo', [vendorController::class, 'updateStorePhoto'])->name('store.update-photo');

    Route::resource('products', ProductController::class);
    Route::get('/product/trashed/{subcategory_id?}', [ProductController::class, 'trashed'])->name('products.trashed');
    Route::get('/product/restore/{id}', [ProductController::class, 'product_restore'])->name('products.restore');
    Route::delete('/product/hdelete/{id}', [ProductController::class, 'forceDelete'])->name('products.forceDelete');
    Route::get('product/{slug}', [ProductController::class, 'show'])->name('product.show');
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::get('/get-subcategories', [ProductController::class, 'getSubcategories'])->name('getSubcategories');
    Route::get('/orders', [vendorController::class, 'index'])->name('orders');
    Route::delete('/orders/{id}', [vendorController::class, 'destroy'])->name('orders.destroy');
    Route::post('/store/{store}/update-slogan', [vendorController::class, 'updateSlogan'])->name('store.updateSlogan');
});

Route::get('vendor/register-request/{status}', function ($status) { return view('users.vendor.registerOrderSuccess', compact('status')); })->name('vendor.register.request');
Route::get('vendor/status-request', [VendorAuthController::class, 'documentStatus'])->name('vendor.status');
Route::get('/get-subcategories', [ProductController::class, 'getSubcategories'])->name('getSubcategories');

// Moderator
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:moderator',
])->prefix('moderator')->name('moderator.')->group(function () {
    Route::get('/dashboard', function () { return view('users.moderator.dashboard'); })->name('dashboard');
    Route::get('/{role}', [ModeratorController::class, 'indexByRole'])->where('role', 'vendor|customer')->name('users.byRole');
    Route::post('/vendor', [ModeratorController::class, 'store'])->name('vendorStore');
    Route::get('/create', [ModeratorController::class, 'create'])->name('createVendor');
    Route::get('/vendor/{vendor}/edit', [ModeratorController::class, 'edit'])->name('vendors.edit');
    Route::get('/vendor/trashed', [ModeratorController::class, 'trashed'])->name('vendor.trashed');
    Route::get('/vendor/{id}', [ModeratorController::class, 'show'])->name('vendors.show');
    Route::put('/vendor/{vendor}', [ModeratorController::class, 'update'])->name('vendors.update');
    Route::delete('/vendor/{id}', [ModeratorController::class, 'destroy'])->name('delete');
    Route::get('/vendor/restore/{id}', [ModeratorController::class, 'restore'])->name('vendor.restore');
    Route::delete('/vendor/trashed/{id}', [ModeratorController::class, 'forceDelete'])->name('forceDelete');
    Route::get('/vendors/search', [ModeratorController::class, 'ajaxSearch'])->name('vendors.ajaxSearch');
    Route::patch('/vendor-documents/{document}/status', [VendorAuthController::class, 'updateStatus'])->name('vendor-documents.updateStatus');
    Route::get('/orders', [ModeratorController::class, 'orders_in_admin'])->name('orders');
    Route::get('/feedbacks', [ModeratorController::class, 'feedbacks_in_admin'])->name('feedbacks');
    Route::delete('/feedbacks/{id}', [ModeratorController::class, 'feedback_destroy'])->name('feedbacks.destroy');
    Route::get('/feedback/{id}', [ModeratorController::class, 'feedback_show'])->name('feedback.show');
    Route::post('/feedback/{id}/reply', [ModeratorController::class, 'reply'])->name('feedback.reply');
    Route::get('/orders/bank-transfers', [StripeController::class, 'bankTransferOrders'])->name('orders.bankTransfers');
    Route::post('/bank-transfers/{bankTransfer}/decision', [PaymentMethodController::class, 'decision'])->name('bankTransfer.decision');
});

// Admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:super_admin',
])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () { return view('users.admin.dashboard'); })->name('dashboard');
    Route::get('/orders', [ModeratorController::class, 'orders_in_admin'])->name('orders');
    Route::get('/feedbacks', [ModeratorController::class, 'feedbacks_in_admin'])->name('feedbacks');
    Route::delete('/feedbacks/{id}', [ModeratorController::class, 'feedback_destroy'])->name('feedbacks.destroy');
    Route::get('/feedback/{id}', [ModeratorController::class, 'feedback_show'])->name('feedback.show');
    Route::post('/feedback/{id}/reply', [ModeratorController::class, 'reply'])->name('feedback.reply');
    Route::get('/orders/bank-transfers', [StripeController::class, 'bankTransferOrders'])->name('orders.bankTransfers');
    Route::post('/bank-transfers/{bankTransfer}/decision', [PaymentMethodController::class, 'decision'])->name('bankTransfer.decision');
    Route::get('/users/moderators', [UserController::class, 'moderators_show'])->name('moderators.show');
    Route::delete('/moderator/{id}', [UserController::class, 'deleteModerator'])->name('moderator.delete');
    Route::post('/moderator/add', [UserController::class, 'addModerator'])->name('moderator.add');
    Route::post('/vendor', [ModeratorController::class, 'store'])->name('vendorStore');
    Route::get('/create', [ModeratorController::class, 'create'])->name('createVendor');
    Route::get('/vendor/{vendor}/edit', [ModeratorController::class, 'edit'])->name('vendors.edit');
    Route::get('/vendor/trashed', [ModeratorController::class, 'trashed'])->name('vendor.trashed');
    Route::get('/vendor/{id}', [ModeratorController::class, 'show'])->name('vendors.show');
    Route::put('/vendor/{vendor}', [ModeratorController::class, 'update'])->name('vendors.update');
    Route::delete('/vendor/{id}', [ModeratorController::class, 'destroy'])->name('delete');
    Route::get('/vendor/restore/{id}', [ModeratorController::class, 'restore'])->name('vendor.restore');
    Route::delete('/vendor/trashed/{id}', [ModeratorController::class, 'forceDelete'])->name('forceDelete');
    Route::get('/{role}', [ModeratorController::class, 'indexByRole'])->where('role', 'vendor|customer')->name('users.byRole');
    Route::patch('/vendor-documents/{document}/status', [VendorAuthController::class, 'updateStatus'])->name('vendor-documents.updateStatus');
});

Route::post('/user/update-photo', [UserController::class, 'updateProfilePhoto'])->name('user.update-photo');
Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
