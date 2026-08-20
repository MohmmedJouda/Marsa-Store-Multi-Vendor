<?php

namespace App\Providers;

use App\Models\Address;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Store;
use App\Models\order as Order;
use App\Policies\AddressPolicy;
use App\Policies\OrderPolicy;
use App\Policies\ProductPolicy;
use App\Policies\ProductVariantPolicy;
use App\Policies\StorePolicy;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Gate::policy(Order::class, OrderPolicy::class);
        Gate::policy(Product::class, ProductPolicy::class);
        Gate::policy(ProductVariant::class, ProductVariantPolicy::class);
        Gate::policy(Store::class, StorePolicy::class);
        Gate::policy(Address::class, AddressPolicy::class);

        // Scope customer resources to the authenticated customer. Vendor/admin
        // routes continue to use the normal implicit model binding behavior.
        Route::bind('order', function ($value) {
            if (request()->routeIs('customer.*')) {
                return Order::whereKey($value)
                    ->where('user_id', request()->user()->id)
                    ->firstOrFail();
            }

            return Order::whereKey($value)->firstOrFail();
        });

        Route::bind('address', function ($value) {
            if (request()->routeIs('customer.*')) {
                return Address::whereKey($value)
                    ->where('user_id', request()->user()->id)
                    ->firstOrFail();
            }

            return Address::whereKey($value)->firstOrFail();
        });

        Route::bind('product', function ($value) {
            if (request()->routeIs('vendor.*')) {
                return Product::whereKey($value)
                    ->where('store_id', request()->user()->store?->id)
                    ->firstOrFail();
            }

            return Product::whereKey($value)->firstOrFail();
        });

        Route::bind('store', function ($value) {
            if (request()->routeIs('vendor.*')) {
                return Store::whereKey($value)
                    ->where('user_id', request()->user()->id)
                    ->firstOrFail();
            }

            return Store::whereKey($value)->firstOrFail();
        });
    }
}
