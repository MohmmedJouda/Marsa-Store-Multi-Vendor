@props([
'variant' => 'standard',
'categories' => collect(),
'carts' => collect(),
'userWishlistIds' => [],
'wishlistProducts' => [],
])

@php
if (Auth::check()) {
    if (empty($userWishlistIds)) {
        $userWishlistIds = Auth::user()->wishlistProducts()->pluck('products.id')->toArray();
    }
    if (empty($wishlistProducts) || (is_iterable($wishlistProducts) && count($wishlistProducts) === 0)) {
        $wishlistProducts = Auth::user()->wishlistProducts()->with(['images', 'store'])->get();
    }
    $wishlistCount = count($userWishlistIds ?? []);
    $cartCount = \App\Models\CartItem::whereHas('cart', function($q) {
        $q->where('user_id', Auth::id())->where('status', 'open');
    })->count();
} else {
    $userWishlistIds = $userWishlistIds ?? [];
    $wishlistProducts = $wishlistProducts ?? collect();
    $wishlistCount = count($userWishlistIds);
    $cartCount = 0;
}
@endphp

@if($variant === 'minimal')

<!-- MINIMAL HEADER VARIANT (Distraction-Free Mode for Checkout/Auth) -->
<div class="bg-gradient-to-r from-brand-950 via-slate-900 to-brand-950 text-xs py-2 border-b border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <div class="flex items-center gap-2 text-slate-300">
            <span class="inline-flex items-center gap-1.5 text-amber-400 font-bold">
                <i class="fa-solid fa-lock text-xs"></i>
                دفع آمن 100% ومشفر بواسطة مرساة
            </span>
        </div>
        <a href="{{ route('customer.main-page') }}" class="text-slate-300 hover:text-white transition-colors duration-300 ease-in-out flex items-center gap-1.5 text-xs font-semibold">
            <span>العودة للمتجر</span>
            <i class="fa-solid fa-arrow-left text-xs"></i>
        </a>
    </div>
</div>

<header class="sticky top-0 z-50 glass-header shadow-2xl transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 gap-4">
            <!-- Logo -->
            <a href="{{ route('guest.main-page') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-brand-600 to-brand-400 flex items-center justify-center p-2 shadow-lg shadow-brand-500/30 group-hover:scale-105 transition-transform duration-300 ease-in-out">
                    <img src="{{ asset('img/logo.svg') }}" alt="Marsa Logo" class="w-full h-full object-contain filter brightness-200" />
                </div>
                <div class="flex flex-col">
                    <span class="text-2xl font-black gradient-text tracking-tight leading-none">
                        مرساة
                    </span>
                    <span class="text-[10px] text-slate-400 font-semibold tracking-wider">MARSA STORE</span>
                </div>
            </a>

            <!-- Trust Badge -->
            <div class="flex items-center gap-3 text-xs">
                <span class="inline-flex items-center gap-2 bg-emerald-500/10 text-emerald-400 px-4 py-2 rounded-full border border-emerald-500/30 font-bold">
                    <i class="fa-solid fa-shield-check"></i>
                    <span>اتصال آمن ومشفر 256-bit</span>
                </span>
            </div>
        </div>
    </div>
</header>

@else

<!-- STANDARD HEADER VARIANT (Full Shopping Mode) -->
<div class="bg-gradient-to-r from-brand-950 via-slate-900 to-brand-950 text-xs py-2 border-b border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <div class="flex items-center gap-4 text-slate-300">
            <span class="inline-flex items-center gap-1.5 text-amber-400 font-bold">
                <i class="fa-solid fa-shield-halved text-xs"></i>
                مرساة | تسوق آمن وحماية كاملة للمشترين 100%
            </span>
            <span class="hidden md:inline-block text-slate-700">|</span>
            <span class="hidden md:inline-flex items-center gap-1.5 text-slate-200">
                <i class="fa-solid fa-truck-fast text-slate-200"></i>
                شحن سريع إلى كافة المناطق والمحافظات
            </span>
        </div>
        <div class="flex items-center gap-5 text-slate-300">
            <!-- Language / Currency Dropdown Cue -->
            <div class="flex items-center gap-1.5 cursor-pointer hover:text-white transition-colors duration-300 ease-in-out">
                <i class="fa-solid fa-globe text-slate-200"></i>
                <span class="font-medium">العربية (₪)</span>
                <i class="fa-solid fa-chevron-down text-[10px] ms-1 text-slate-400"></i>
            </div>
            <a href="{{ route('customer.contact') }}" class="hover:text-white transition-colors duration-300 ease-in-out hidden sm:inline-block">مركز المساعدة والمعلومات</a>
        </div>
    </div>
</div>

<!-- 2. MAIN STICKY NAVIGATION HEADER -->
<header class="sticky top-0 z-50 glass-header shadow-2xl transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 gap-4">

            <!-- Logo & Mobile Menu Toggle -->
            <div class="flex items-center gap-3">
                <button id="mobile-menu-btn" class="lg:hidden p-2 text-slate-300 hover:text-white rounded-xl bg-slate-800/50 focus:outline-none transition-colors duration-300 ease-in-out">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <a href="{{ route('guest.main-page') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-brand-600 to-brand-400 flex items-center justify-center p-2 shadow-lg shadow-brand-500/30 group-hover:scale-105 transition-transform duration-300 ease-in-out">
                        <img src="{{ asset('img/logo.svg') }}" alt="Marsa Logo" class="w-full h-full object-contain filter brightness-200" />
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-black gradient-text tracking-tight leading-none">
                            مرساة
                        </span>
                        <span class="text-[10px] text-slate-400 font-semibold tracking-wider">MARSA STORE</span>
                    </div>
                </a>
            </div>

            <!-- Live AJAX Smart Search Bar (Expanded Width) -->
            <div class="flex-1 max-w-4xl relative hidden md:block">
                <form action="{{ route('customer.products.index') }}" method="GET" class="relative flex items-center bg-slate-900/90 rounded-full border border-slate-700/80 focus-within:border-brand-500 focus-within:ring-2 focus-within:ring-brand-500/30 transition-all duration-300 ease-in-out shadow-inner overflow-hidden">
                    <!-- Category Selector Dropdown -->
                    <div class="relative flex items-center border-l border-slate-700/80 bg-slate-800/60 hover:bg-slate-800 transition-colors duration-300 ease-in-out shrink-0">
                        <select name="category" id="header-category-select" class="bg-transparent text-slate-200 text-xs font-semibold py-3.5 pr-4 pl-8 appearance-none outline-none cursor-pointer">
                            <option value="all" class="bg-slate-900 text-white">كل الأقسام</option>
                            @if(isset($categories) && count($categories) > 0)
                            @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" class="bg-slate-900 text-white" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                            @endforeach
                            @endif
                        </select>
                        <i class="fa-solid fa-chevron-down absolute left-3 text-slate-400 text-[10px] pointer-events-none"></i>
                    </div>

                    <!-- Search Input Field -->
                    <div class="relative flex-1 flex items-center">
                        <input type="text" name="search" id="search-input" autocomplete="off"
                            value="{{ request('search') }}"
                            placeholder="ابحث عن المنتجات، المتاجر، أو الفئات..."
                            class="w-full bg-transparent text-white placeholder-slate-400 text-xs sm:text-sm py-3.5 pr-4 pl-14 outline-none" />
                        <button type="submit" aria-label="بحث" class="absolute left-2 text-slate-400 hover:text-white p-2.5 rounded-full transition-colors duration-300 ease-in-out">
                            <i class="fa-solid fa-magnifying-glass text-base"></i>
                        </button>
                    </div>
                </form>

                <!-- AJAX Live Results Dropdown -->
                <ul id="search-results" class="absolute top-full right-0 left-0 mt-2 bg-slate-900/95 backdrop-blur-2xl border border-slate-700/80 rounded-3xl shadow-2xl overflow-hidden z-50 hidden divide-y divide-slate-800 max-h-96 overflow-y-auto">
                </ul>
            </div>

            <!-- Navigation Actions (Notifications, Wishlist, Cart, User) -->
            <div class="flex items-center gap-4 sm:gap-5">

                <!-- Notifications Trigger Button -->
                <button id="open-notifications-btn" title="الإشعارات" aria-label="الإشعارات" class="relative p-2.5 text-slate-300 hover:text-white hover:bg-slate-800/60 rounded-full transition-colors duration-300 ease-in-out group focus:outline-none">
                    <i class="fa-solid fa-bell text-xl group-hover:scale-110 transition-transform duration-300 ease-in-out"></i>
                    @auth
                    @if(Auth::user()->unreadNotifications->count() > 0)
                    <span id="notifications-count-badge" class="bg-red-500 text-white absolute -top-1 -right-1 text-[10px] font-black w-4 h-4 rounded-full flex items-center justify-center shadow animate-pulse">
                        {{ Auth::user()->unreadNotifications->count() }}
                    </span>
                    @endif
                    @endauth
                </button>

                <!-- Wishlist (المفضلة) Trigger Button -->
                <button id="open-wishlist-btn" title="المفضلة" aria-label="المفضلة" class="relative p-2.5 text-slate-300 hover:text-white hover:bg-slate-800/60 rounded-full transition-colors duration-300 ease-in-out group focus:outline-none">
                    <i class="fa-regular fa-heart text-xl group-hover:scale-110 transition-transform duration-300 ease-in-out"></i>
                    @if($wishlistCount > 0)
                    <span id="wishlist-count-badge" class="bg-red-500 text-white absolute -top-1 -right-1 text-[10px] font-extrabold w-4 h-4 rounded-full flex items-center justify-center shadow">
                        {{ $wishlistCount }}
                    </span>
                    @else
                    <span id="wishlist-count-badge" class="hidden bg-red-500 text-white absolute -top-1 -right-1 text-[10px] font-extrabold w-4 h-4 rounded-full items-center justify-center shadow">0</span>
                    @endif
                </button>

                <!-- Cart (السلة) Trigger Button -->
                <button id="open-cart-btn" title="السلة" aria-label="السلة" class="relative p-2.5 text-slate-300 hover:text-white hover:bg-slate-800/60 rounded-full transition-colors duration-300 ease-in-out group focus:outline-none">
                    <i class="fa-solid fa-cart-shopping text-xl group-hover:scale-110 transition-transform duration-300 ease-in-out"></i>
                    @if($cartCount > 0)
                    <span id="cart-count-badge" class="bg-red-500 text-white absolute -top-1 -right-1 text-[10px] font-extrabold w-4 h-4 rounded-full flex items-center justify-center shadow">
                        {{ $cartCount }}
                    </span>
                    @else
                    <span id="cart-count-badge" class="hidden bg-red-500 text-white absolute -top-1 -right-1 text-[10px] font-extrabold w-4 h-4 rounded-full items-center justify-center shadow">0</span>
                    @endif
                </button>

                @guest
                <!-- Consolidated Guest Auth Link -->
                <a href="{{ route('login') }}" class="flex items-center gap-2 text-slate-300 hover:text-white text-xs font-medium py-2 px-3 transition-colors duration-300 ease-in-out group" title="تسجيل الدخول أو إنشاء حساب">
                    <i class="fa-regular fa-user text-lg group-hover:scale-110 transition-transform duration-300 ease-in-out"></i>
                    <span class="hidden sm:inline">دخول / حساب جديد</span>
                </a>
                @endguest

                @auth
                <!-- Dynamic Authenticated User State -->
                <div class="relative">
                    <button id="userMenuBtn" class="flex items-center gap-2 p-1.5 pl-3.5 bg-slate-800/80 hover:bg-slate-800 border border-slate-700/80 rounded-full transition-colors duration-300 ease-in-out">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-brand-600 to-accent-orange flex items-center justify-center text-white font-black text-xs shadow">
                            {{ mb_substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="text-xs font-bold text-slate-200 hidden md:inline-block max-w-[120px] truncate">
                            مرحباً، {{ strtok(Auth::user()->name, ' ') }}
                        </span>
                        <i class="fa-solid fa-chevron-down text-xs text-slate-400"></i>
                    </button>

                    <!-- User Dropdown Menu -->
                    <div id="userMenuDropdown" class="hidden absolute left-0 mt-3 w-60 bg-slate-900/95 border border-slate-700/80 rounded-3xl shadow-2xl p-2.5 z-50 text-xs space-y-1">
                        <div class="p-3 bg-slate-800/60 rounded-2xl mb-1">
                            <p class="font-bold text-white text-sm truncate">{{ Auth::user()->name }}</p>
                            <p class="text-slate-400 text-[11px] truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="{{ route('profile.show') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800 transition-colors duration-300 ease-in-out">
                            <i class="fa-solid fa-user-pen text-brand-400 w-4 text-center"></i> الملف الشخصي
                        </a>

                        @if(Auth::user()->role === 'customer')
                        <a href="{{ route('customer.orders.show') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800 transition-colors duration-300 ease-in-out">
                            <i class="fa-solid fa-box text-brand-400 w-4 text-center"></i> طلباتك ومشترواتك
                        </a>
                        @endif

                        @if(Auth::user()->role === 'vendor')
                        <a href="{{ route('vendor.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800 transition-colors duration-300 ease-in-out">
                            <i class="fa-solid fa-gauge text-brand-400 w-4 text-center"></i> لوحة التحكم
                        </a>
                        @endif

                        <hr class="border-slate-800 my-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-rose-400 hover:bg-rose-500/10 transition-colors duration-300 ease-in-out font-bold text-right">
                                <i class="fa-solid fa-right-from-bracket w-4 text-center"></i> تسجيل الخروج
                            </button>
                        </form>
                    </div>
                </div>
                @endauth

            </div>
        </div>
    </div>

    <!-- 3. SECONDARY CATEGORIES NAV BAR -->
    <div class="border-t border-slate-800/80 bg-slate-950/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between gap-4 py-2.5 text-xs font-semibold text-slate-300">

                <!-- Right Side: Mega Menu Trigger & Main Categories -->
                <div class="flex items-center gap-3 md:gap-5 overflow-hidden">
                    <!-- Mega Menu Trigger Button (Far Right in RTL) -->
                    <button type="button" id="mega-menu-trigger" class="flex items-center gap-2 bg-brand-600/20 hover:bg-brand-600/30 text-brand-400 border border-brand-500/30 px-3.5 py-1.5 rounded-full font-bold transition-colors duration-300 ease-in-out shrink-0">
                        <i class="fa-solid fa-bars text-xs"></i>
                        <span>جميع الأقسام</span>
                    </button>

                    <a href="{{ route('customer.main-page') }}" class="hover:text-white transition-colors duration-300 ease-in-out shrink-0 hidden sm:inline-flex items-center gap-1.5 text-slate-200">
                        <i class="fa-solid fa-house text-xs text-brand-400"></i> الرئيسية
                    </a>

                    <!-- Top 4 Primary Store Categories -->
                    @if(isset($categories) && count($categories) > 0)
                    <div class="flex items-center gap-4 md:gap-6 overflow-hidden">
                        @foreach ($categories->take(4) as $cat)
                        <a href="{{ route('customer.category_products.index', $cat->id) }}" class="hover:text-white transition-colors duration-300 ease-in-out shrink-0 text-slate-300 hover:text-slate-100 whitespace-nowrap">
                            {{ $cat->name }}
                        </a>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Left Side: Promotional Links (Visually Detached on Far Left in RTL) -->
                <div class="flex items-center gap-4 shrink-0 border-r border-slate-800/80 pr-4">
                    <a href="{{ route('customer.stores.index') }}" class="text-amber-400 hover:text-amber-300 font-bold transition-colors duration-300 ease-in-out shrink-0 flex items-center gap-1.5">
                        <i class="fa-solid fa-store text-xs"></i>
                        <span class="hidden xs:inline">المتاجر المعتمدة</span>
                    </a>
                    <a href="#new-products" class="text-amber-400 hover:text-amber-300 font-bold transition-colors duration-300 ease-in-out shrink-0 flex items-center gap-1.5">
                        <i class="fa-solid fa-tag text-xs"></i>
                        <span>العروض والتنزيلات</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</header>

<!-- GLOBAL OFF-CANVAS DRAWERS (Cart, Wishlist, Notifications) -->
<x-cart-drawer :carts="$carts" />
<x-wishlist-drawer :wishlistProducts="$wishlistProducts" />
<x-notifications-drawer />

<script>
    if (typeof window.drawerScriptsLoaded === 'undefined') {
        window.drawerScriptsLoaded = true;

        function initUserMenuDropdown() {
            const userBtn = document.getElementById('userMenuBtn');
            const userMenu = document.getElementById('userMenuDropdown');
            if (userBtn && userMenu && !userBtn.dataset.menuBound) {
                userBtn.dataset.menuBound = 'true';
                userBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    userMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', function(e) {
                    if (!userMenu.classList.contains('hidden') && !userMenu.contains(e.target) && !userBtn.contains(e.target)) {
                        userMenu.classList.add('hidden');
                    }
                });
            }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initUserMenuDropdown);
        } else {
            initUserMenuDropdown();
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Cart Drawer Controls
            const cartDrawerOverlay = document.getElementById('cart-drawer-overlay');
            const cartDrawer = document.getElementById('cart-drawer');
            const openCartBtn = document.getElementById('open-cart-btn');
            const closeCartBtn = document.getElementById('close-cart-btn');

            window.openCart = function() {
                if (!cartDrawerOverlay || !cartDrawer) return;
                cartDrawerOverlay.classList.remove('hidden');
                setTimeout(() => {
                    cartDrawerOverlay.classList.remove('opacity-0');
                    cartDrawer.classList.remove('-translate-x-full');
                }, 10);
            };

            window.closeCart = function() {
                if (!cartDrawerOverlay || !cartDrawer) return;
                cartDrawer.classList.add('-translate-x-full');
                cartDrawerOverlay.classList.add('opacity-0');
                setTimeout(() => {
                    cartDrawerOverlay.classList.add('hidden');
                }, 300);
            };

            if (openCartBtn) openCartBtn.addEventListener('click', window.openCart);
            if (closeCartBtn) closeCartBtn.addEventListener('click', window.closeCart);
            if (cartDrawerOverlay) {
                cartDrawerOverlay.addEventListener('click', function(e) {
                    if (e.target === cartDrawerOverlay) window.closeCart();
                });
            }

            // Wishlist Drawer Controls
            const openWishlistBtn = document.getElementById('open-wishlist-btn');
            const closeWishlistBtn = document.getElementById('close-wishlist-btn');
            const wishlistDrawerOverlay = document.getElementById('wishlist-drawer-overlay');
            const wishlistDrawer = document.getElementById('wishlist-drawer');

            window.openWishlist = function() {
                if (!wishlistDrawerOverlay || !wishlistDrawer) return;
                wishlistDrawerOverlay.classList.remove('hidden');
                setTimeout(() => {
                    wishlistDrawerOverlay.classList.remove('opacity-0');
                    wishlistDrawer.classList.remove('-translate-x-full');
                }, 10);
            };

            window.closeWishlist = function() {
                if (!wishlistDrawerOverlay || !wishlistDrawer) return;
                wishlistDrawer.classList.add('-translate-x-full');
                wishlistDrawerOverlay.classList.add('opacity-0');
                setTimeout(() => {
                    wishlistDrawerOverlay.classList.add('hidden');
                }, 300);
            };

            if (openWishlistBtn) openWishlistBtn.addEventListener('click', window.openWishlist);
            if (closeWishlistBtn) closeWishlistBtn.addEventListener('click', window.closeWishlist);
            if (wishlistDrawerOverlay) {
                wishlistDrawerOverlay.addEventListener('click', function(e) {
                    if (e.target === wishlistDrawerOverlay) window.closeWishlist();
                });
            }

            // Notifications Drawer Controls
            const openNotifBtn = document.getElementById('open-notifications-btn') || document.getElementById('notifDropdownBtn');
            const closeNotifBtn = document.getElementById('close-notifications-btn');
            const notifDrawerOverlay = document.getElementById('notifications-drawer-overlay');
            const notifDrawer = document.getElementById('notifications-drawer');

            window.openNotifications = function() {
                if (!notifDrawerOverlay || !notifDrawer) return;
                notifDrawerOverlay.classList.remove('hidden');
                setTimeout(() => {
                    notifDrawerOverlay.classList.remove('opacity-0');
                    notifDrawer.classList.remove('-translate-x-full');
                }, 10);
            };

            window.closeNotifications = function() {
                if (!notifDrawerOverlay || !notifDrawer) return;
                notifDrawer.classList.add('-translate-x-full');
                notifDrawerOverlay.classList.add('opacity-0');
                setTimeout(() => {
                    notifDrawerOverlay.classList.add('hidden');
                }, 300);
            };

            if (openNotifBtn) openNotifBtn.addEventListener('click', window.openNotifications);
            if (closeNotifBtn) closeNotifBtn.addEventListener('click', window.closeNotifications);
            if (notifDrawerOverlay) {
                notifDrawerOverlay.addEventListener('click', function(e) {
                    if (e.target === notifDrawerOverlay) window.closeNotifications();
                });
            }
        });
    }
</script>

@endif