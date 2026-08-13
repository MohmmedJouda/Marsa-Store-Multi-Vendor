@props([
'variant' => 'standard',
'categories' => collect(),
'carts' => null,
'userWishlistIds' => [],
'userCartProductIds' => [],
'wishlistProducts' => [],
'totalPrice' => 0,
'title' => 'مرساة | Marsa Store - السوق العام والتسوق الآمن'
])

@php
if (\Illuminate\Support\Facades\Auth::check()) {
    if (empty($userCartProductIds)) {
        $userCartProductIds = \App\Models\CartItem::whereHas('cart', function($q) {
            $q->where('user_id', \Illuminate\Support\Facades\Auth::id())->where('status', 'open');
        })->pluck('product_id')->toArray();
    }
    if (empty($userWishlistIds)) {
        $userWishlistIds = \Illuminate\Support\Facades\Auth::user()->wishlistProducts()->pluck('products.id')->toArray();
    }
}
$userCartProductIds = $userCartProductIds ?? [];
$userWishlistIds = $userWishlistIds ?? [];
@endphp

<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="مرساة - السوق العام والمنصة الرقمية للتسوق الآمن والبيع المباشر" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>{{ $title }}</title>

    <!-- Google Fonts: Tajawal & Cairo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            200: '#bae0fd',
                            400: '#38bdf8',
                            500: '#0066ff',
                            600: '#0052cc',
                            700: '#003d99',
                            800: '#0b192c',
                            900: '#1e1e2f',
                            950: '#0f0f1a',
                        },
                        accent: {
                            gold: '#ffb703',
                            amber: '#f59e0b',
                            orange: '#fb8500',
                            coral: '#ff4d6d',
                            emerald: '#10b981',
                        }
                    },
                    fontFamily: {
                        sans: ['Tajawal', 'Cairo', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome 6 & LineIcons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <!-- AOS Animation -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Tajawal', 'Cairo', sans-serif;
            background-color: #0b192c;
            color: #f1f5f9;
        }

        .glass-header {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .gradient-text {
            background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 50%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gradient-accent-text {
            background: linear-gradient(135deg, #ffb703 0%, #fb8500 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Continuous Marquee Animation */
        @keyframes marquee {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 25s linear infinite;
        }

        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</head>

<body class="bg-[#0b192c] text-slate-100 min-h-screen flex flex-col antialiased selection:bg-brand-500 selection:text-white">

    <!-- GLOBAL HEADER COMPONENT -->
    <x-global-header :variant="$variant" :categories="$categories" :carts="$carts" :userWishlistIds="$userWishlistIds" />

    <!-- MAIN PAGE CONTENT -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- OFF-CANVAS DRAWERS (Cart, Wishlist, Notifications) -->
    <x-cart-drawer :carts="$carts" :totalPrice="$totalPrice" />
    <x-wishlist-drawer :wishlistProducts="$wishlistProducts" />
    <x-notifications-drawer />

    <!-- GUEST LOGIN MODAL -->
    <div id="customModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-[110] hidden flex items-center justify-center p-4">
        <div class="glass-card bg-slate-900 border border-slate-700/80 rounded-3xl p-6 sm:p-8 max-w-md w-full relative shadow-2xl space-y-6">
            <button onclick="closeModal()" class="absolute top-4 left-4 w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="text-center space-y-1">
                <h3 class="text-xl font-black text-white">تسجيل الدخول</h3>
                <p class="text-xs text-slate-400">مرحباً بك مجدداً في مرساة</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="space-y-4 text-xs">
                @csrf
                <div class="space-y-1 text-right">
                    <label for="email" class="text-slate-300 font-semibold">البريد الإلكتروني</label>
                    <input id="email" name="email" type="email" required placeholder="example@email.com"
                        class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500" />
                </div>
                <div class="space-y-1 text-right">
                    <label for="password" class="text-slate-300 font-semibold">كلمة المرور</label>
                    <input id="password" name="password" type="password" required placeholder="••••••••"
                        class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500" />
                </div>
                <button type="submit" class="w-full bg-brand-600 hover:bg-brand-500 text-white font-bold py-3 rounded-xl shadow-lg transition">
                    دخول
                </button>
            </form>
        </div>
    </div>

    <!-- GLOBAL SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });

        // Global Drawers Logic (Cart, Wishlist, Notifications)
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

            // AJAX Live Search with Category Filtering
            function initSearch(inputId) {
                let $input = $('#' + inputId);
                let $categorySelect = $('#header-category-select');

                function triggerSearch() {
                    let query = $input.val();
                    let categoryId = $categorySelect.length ? $categorySelect.val() : 'all';

                    if (query && query.length > 0) {
                        $.ajax({
                            url: "{{ route('products.search') }}",
                            type: "GET",
                            data: {
                                query: query,
                                category_id: categoryId
                            },
                            success: function(data) {
                                let results = '';
                                if (data.length > 0) {
                                    data.forEach(product => {
                                        results += `
                                            <li class="p-3 hover:bg-slate-800/80 transition cursor-pointer">
                                                <div class="flex items-center justify-between gap-3">
                                                    <div class="flex items-center gap-3">
                                                        <img src="${product.image_url}" alt="منتج" class="w-10 h-10 object-cover rounded-lg bg-slate-950">
                                                        <div>
                                                            <div class="font-bold text-white text-xs">${product.name}</div>
                                                            <div class="text-emerald-400 font-extrabold text-xs">${product.price} ₪</div>
                                                        </div>
                                                    </div>
                                                    <a href="/products/${product.id}" class="bg-brand-600 hover:bg-brand-500 text-white text-[11px] font-bold px-3 py-1.5 rounded-full transition">
                                                        تفاصيل
                                                    </a>
                                                </div>
                                            </li>`;
                                    });
                                } else {
                                    results = '<li class="p-4 text-center text-slate-400 text-xs">لا توجد نتائج مطابقة</li>';
                                }
                                $('#search-results').html(results).removeClass('hidden');
                            }
                        });
                    } else {
                        $('#search-results').addClass('hidden');
                    }
                }

                if ($input.length) {
                    $input.on('keyup', triggerSearch);
                }
                if ($categorySelect.length && $input.length) {
                    $categorySelect.on('change', function() {
                        if ($input.val().length > 0) {
                            triggerSearch();
                        }
                    });
                }
            }

            initSearch('search-input');
            initSearch('mobile-search-input');

            $(document).click(function(e) {
                if (!$(e.target).closest('#search-input, #mobile-search-input, #search-results').length) {
                    $('#search-results').addClass('hidden');
                }
            });
        });

        // Modals
        function openModal() {
            document.getElementById('customModal')?.classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('customModal')?.classList.add('hidden');
        }

        // Toast Notification System
        function showToast(message, type = 'success') {
            let toastContainer = document.getElementById('toast-container');
            if (!toastContainer) {
                toastContainer = document.createElement('div');
                toastContainer.id = 'toast-container';
                toastContainer.className = 'fixed bottom-6 left-6 z-[200] space-y-2 pointer-events-none';
                document.body.appendChild(toastContainer);
            }

            const toast = document.createElement('div');
            const bgClass = type === 'success' ? 'bg-slate-900/95 border-emerald-500/50 text-emerald-400 shadow-emerald-950/40' : (type === 'warning' ? 'bg-slate-900/95 border-amber-500/50 text-amber-400 shadow-amber-950/40' : 'bg-slate-900/95 border-rose-500/50 text-rose-400 shadow-rose-950/40');
            const iconClass = type === 'success' ? 'fa-circle-check text-emerald-400' : (type === 'warning' ? 'fa-triangle-exclamation text-amber-400' : 'fa-circle-xmark text-rose-400');

            toast.className = `flex items-center gap-3 px-4 py-3 rounded-2xl border shadow-2xl backdrop-blur-xl transition-all duration-500 transform translate-y-4 opacity-0 pointer-events-auto text-xs font-bold ${bgClass}`;
            toast.innerHTML = `<i class="fa-solid ${iconClass} text-sm"></i><span>${message}</span>`;

            toastContainer.appendChild(toast);

            setTimeout(() => {
                toast.classList.remove('translate-y-4', 'opacity-0');
            }, 10);

            setTimeout(() => {
                toast.classList.add('translate-y-4', 'opacity-0');
                setTimeout(() => toast.remove(), 500);
            }, 3000);
        }

        // Badge Counter Helper Functions
        function updateWishlistBadge(count) {
            const $badge = $('[id="wishlist-count-badge"]');
            if ($badge.length) {
                const num = parseInt(count) || 0;
                $badge.text(num);
                if (num > 0) {
                    $badge.removeClass('hidden').addClass('flex');
                } else {
                    $badge.addClass('hidden').removeClass('flex');
                }
            }
        }

        function updateCartBadge(count) {
            const $badge = $('[id="cart-count-badge"]');
            if ($badge.length) {
                const num = parseInt(count) || 0;
                $badge.text(num);
                if (num > 0) {
                    $badge.removeClass('hidden').addClass('flex');
                } else {
                    $badge.addClass('hidden').removeClass('flex');
                }
            }
        }

        // Reactive Wishlist Toggle Function
        function toggleWishlist(arg1, arg2) {
            let btn, productId;
            if (typeof arg1 === 'number' || (typeof arg1 === 'string' && !isNaN(arg1))) {
                productId = arg1;
                btn = arg2;
            } else {
                btn = arg1;
                productId = arg2;
            }

            let $btn = btn ? $(btn) : null;
            let $icon = $btn && $btn.length ? $btn.find('i') : null;
            let $text = $btn && $btn.length ? $btn.find('.wishlist-text') : null;

            $.ajax({
                url: "{{ route('customer.wishlist.toggle') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        let $cardBtns = $(`button[onclick*="toggleWishlist"][onclick*="${productId}"]`);

                        if (response.is_wishlisted) {
                            if ($icon && $icon.length) $icon.removeClass('fa-regular text-slate-400 text-slate-300').addClass('fa-solid fa-heart text-rose-500 scale-125');
                            if ($text && $text.length) $text.text('في المفضلة');

                            $cardBtns.find('i').removeClass('fa-regular text-slate-400 text-slate-300').addClass('fa-solid fa-heart text-rose-500');
                            $cardBtns.find('.wishlist-text').text('في المفضلة');

                            if (response.product) {
                                $('#wishlist-empty-state').remove();
                                if ($(`#wishlist-row-${response.product.id}`).length === 0) {
                                    let newRow = `
                                        <div id="wishlist-row-${response.product.id}" class="flex items-center gap-3 p-3 bg-slate-800/60 rounded-2xl border border-slate-700/60 transition group hover:border-rose-500/40">
                                            <img src="${response.product.image_url}" alt="${response.product.name}" class="w-14 h-14 object-cover rounded-xl bg-slate-950 shrink-0" />
                                            <div class="flex-1 min-w-0">
                                                <h4 class="font-bold text-white text-xs truncate">
                                                    <a href="${response.product.url}" class="hover:text-brand-400 transition">${response.product.name}</a>
                                                </h4>
                                                <div class="text-[11px] text-slate-400 truncate">
                                                    البائع: <span class="text-slate-300 font-semibold">${response.product.store_name}</span>
                                                </div>
                                                <div class="text-emerald-400 font-extrabold text-xs mt-0.5">
                                                    ${response.product.price} ₪
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-1.5 shrink-0">
                                                <button type="button" onclick="moveWishlistItemToCart(${response.product.id})" title="نقل إلى السلة" class="h-8 px-2.5 rounded-full bg-brand-600/20 hover:bg-brand-600 text-brand-400 hover:text-white border border-brand-500/40 flex items-center justify-center gap-1 text-[11px] font-bold transition">
                                                    <i class="fa-solid fa-cart-plus text-xs"></i>
                                                    <span class="hidden sm:inline">للسلة</span>
                                                </button>
                                                <button type="button" onclick="removeWishlistItem(${response.product.id})" title="حذف من الرغبات" class="w-8 h-8 rounded-full bg-rose-500/10 hover:bg-rose-500 text-rose-400 hover:text-white flex items-center justify-center transition">
                                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                                </button>
                                            </div>
                                        </div>`;
                                    $('#wishlist-drawer-body').prepend(newRow);
                                }
                            }
                        } else {
                            if ($icon && $icon.length) $icon.removeClass('fa-solid text-rose-500').addClass('fa-regular fa-heart text-slate-400 scale-100');
                            if ($text && $text.length) $text.text('أضف للمفضلة');

                            $cardBtns.find('i').removeClass('fa-solid text-rose-500').addClass('fa-regular fa-heart text-slate-400');
                            $cardBtns.find('.wishlist-text').text('أضف للمفضلة');

                            $(`#wishlist-row-${productId}`).fadeOut(300, function() {
                                $(this).remove();
                                if ($('#wishlist-drawer-body').children(':visible').length === 0) {
                                    $('#wishlist-drawer-body').html(`
                                        <div id="wishlist-empty-state" class="py-16 text-center space-y-4 text-slate-400">
                                            <i class="fa-regular fa-heart text-4xl text-slate-600 block"></i>
                                            <p class="text-xs font-semibold">قائمة الرغبات فارغة حالياً</p>
                                            <button onclick="closeWishlist()" class="inline-block bg-brand-600 hover:bg-brand-500 text-white font-bold px-6 py-2.5 rounded-full text-xs transition">
                                                متابعة التسوق
                                            </button>
                                        </div>
                                    `);
                                }
                            });
                        }
                        if ($icon && $icon.length) setTimeout(() => $icon.removeClass('scale-125'), 300);

                        updateWishlistBadge(response.wishlist_count);
                        showToast(response.message, 'success');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        showToast('يرجى تسجيل الدخول لإضافة المنتجات للرغبات', 'warning');
                        if (typeof openModal === 'function') openModal();
                    } else {
                        showToast('حدث خطأ أثناء التحديث', 'error');
                    }
                }
            });
        }

        // Move Item From Wishlist to Cart
        function moveWishlistItemToCart(productId) {
            $.ajax({
                url: "{{ route('customer.wishlist.moveToCart') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        $(`#wishlist-row-${productId}`).fadeOut(300, function() {
                            $(this).remove();
                            if ($('#wishlist-drawer-body').children(':visible').length === 0) {
                                $('#wishlist-drawer-body').html(`
                                    <div id="wishlist-empty-state" class="py-16 text-center space-y-4 text-slate-400">
                                        <i class="fa-regular fa-heart text-4xl text-slate-600 block"></i>
                                        <p class="text-xs font-semibold">قائمة الرغبات فارغة حالياً</p>
                                        <button onclick="closeWishlist()" class="inline-block bg-brand-600 hover:bg-brand-500 text-white font-bold px-6 py-2.5 rounded-full text-xs transition">
                                            متابعة التسوق
                                        </button>
                                    </div>
                                `);
                            }
                        });

                        updateWishlistBadge(response.wishlist_count);
                        updateCartBadge(response.cart_count);

                        let $cardBtns = $(`button[onclick*="toggleWishlist"][onclick*="${productId}"]`);
                        $cardBtns.find('i').removeClass('fa-solid text-rose-500').addClass('fa-regular fa-heart text-slate-400');
                        $cardBtns.find('.wishlist-text').text('أضف للمفضلة');

                        let $cartCardBtns = $(`button[onclick*="addToCart(${productId}"]`);
                        if ($cartCardBtns.length) {
                            $cartCardBtns.addClass('bg-emerald-600 hover:bg-emerald-500')
                                         .removeClass('bg-brand-600 hover:bg-brand-500');
                            $cartCardBtns.find('i').removeClass('fa-cart-plus').addClass('fa-check');
                            $cartCardBtns.find('.cart-btn-text').text('في السلة');
                            $cartCardBtns.attr('title', 'في السلة');
                        }

                        showToast(response.message || 'تم نقل المنتج إلى سلة المشتريات بنجاح', 'success');
                    } else {
                        showToast(response.message || 'حدث خطأ أثناء نقل المنتج إلى السلة', 'error');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        showToast('يرجى تسجيل الدخول أولاً لنقل المنتج إلى السلة', 'warning');
                        if (typeof openModal === 'function') openModal();
                    } else {
                        const errMsg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : 'حدث خطأ أثناء نقل المنتج إلى السلة';
                        showToast(errMsg, 'error');
                    }
                }
            });
        }

        // Add Product To Cart (AJAX)
        function addToCart(productId, qty = 1, btn = null) {
            let $btn = btn ? $(btn) : null;
            if ($btn) $btn.prop('disabled', true).addClass('opacity-75');

            $.ajax({
                url: "{{ route('customer.cart.add') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId,
                    qty: qty
                },
                success: function(response) {
                    if ($btn) $btn.prop('disabled', false).removeClass('opacity-75');
                    if (response.status === 'success') {
                        updateCartBadge(response.cart_count);

                        // Visual indicator update for Cart buttons matching this product
                        let $cardBtns = $(`button[onclick*="addToCart(${productId}"]`);
                        if ($cardBtns.length) {
                            $cardBtns.addClass('bg-emerald-600 hover:bg-emerald-500')
                                     .removeClass('bg-brand-600 hover:bg-brand-500');
                            $cardBtns.find('i').removeClass('fa-cart-plus').addClass('fa-check');
                            $cardBtns.find('.cart-btn-text').text('في السلة');
                            $cardBtns.attr('title', 'في السلة');
                        }

                        showToast(response.message || 'تمت إضافة المنتج إلى سلة المشتريات بنجاح', 'success');
                    }
                },
                error: function(xhr) {
                    if ($btn) $btn.prop('disabled', false).removeClass('opacity-75');
                    if (xhr.status === 401) {
                        showToast('يرجى تسجيل الدخول لإضافة المنتجات إلى السلة', 'warning');
                        if (typeof openModal === 'function') openModal();
                    } else {
                        showToast('حدث خطأ أثناء إضافة المنتج إلى السلة', 'error');
                    }
                }
            });
        }

        // Remove Product From Cart (AJAX)
        function removeFromCart(cartItemId, btn = null) {
            let $btn = btn ? $(btn) : null;
            if ($btn) $btn.prop('disabled', true).addClass('opacity-75');

            $.ajax({
                url: "{{ url('/customer/cart') }}/" + cartItemId,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if ($btn) $btn.prop('disabled', false).removeClass('opacity-75');
                    if (response.status === 'success') {
                        $(`#cart-item-row-${cartItemId}`).fadeOut(300, function() {
                            $(this).remove();
                        });

                        updateCartBadge(response.cart_count);

                        if (response.product_id) {
                            let $cardBtns = $(`button[onclick*="addToCart(${response.product_id}"]`);
                            if ($cardBtns.length) {
                                $cardBtns.removeClass('bg-emerald-600 hover:bg-emerald-500')
                                         .addClass('bg-brand-600 hover:bg-brand-500');
                                $cardBtns.find('i').removeClass('fa-check').addClass('fa-cart-plus');
                                $cardBtns.find('.cart-btn-text').text('أضف للسلة');
                                $cardBtns.attr('title', 'أضف للسلة');
                            }
                        }

                        showToast(response.message || 'تمت إزالة المنتج من سلة المشتريات بنجاح', 'info');
                    }
                },
                error: function(xhr) {
                    if ($btn) $btn.prop('disabled', false).removeClass('opacity-75');
                    if (xhr.status === 401) {
                        showToast('يرجى تسجيل الدخول أولاً', 'warning');
                        if (typeof openModal === 'function') openModal();
                    } else {
                        showToast('حدث خطأ أثناء إزالة المنتج من السلة', 'error');
                    }
                }
            });
        }

        // Remove Item From Wishlist
        function removeWishlistItem(productId) {
            $.ajax({
                url: "{{ route('customer.wishlist.toggle') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        $(`#wishlist-row-${productId}`).fadeOut(300, function() {
                            $(this).remove();
                            if ($('#wishlist-drawer-body').children(':visible').length === 0) {
                                $('#wishlist-drawer-body').html(`
                                    <div id="wishlist-empty-state" class="py-16 text-center space-y-4 text-slate-400">
                                        <i class="fa-regular fa-heart text-4xl text-slate-600 block"></i>
                                        <p class="text-xs font-semibold">قائمة الرغبات فارغة حالياً</p>
                                        <button onclick="closeWishlist()" class="inline-block bg-brand-600 hover:bg-brand-500 text-white font-bold px-6 py-2.5 rounded-full text-xs transition">
                                            متابعة التسوق
                                        </button>
                                    </div>
                                `);
                            }
                        });

                        updateWishlistBadge(response.wishlist_count);

                        let $cardBtns = $(`button[onclick*="toggleWishlist"][onclick*="${productId}"]`);
                        $cardBtns.find('i').removeClass('fa-solid text-rose-500').addClass('fa-regular fa-heart text-slate-400');
                        $cardBtns.find('.wishlist-text').text('أضف للمفضلة');

                        showToast('تمت إزالة المنتج من قائمة الرغبات', 'info');
                    }
                }
            });
        }
    </script>

    <!-- Session Flash Toast Notifications -->
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof showToast === 'function') {
                    showToast(@json(session('success')), 'success');
                }
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof showToast === 'function') {
                    showToast(@json(session('error')), 'error');
                }
            });
        </script>
    @endif
    @if(session('warning'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof showToast === 'function') {
                    showToast(@json(session('warning')), 'warning');
                }
            });
        </script>
    @endif
    @if(session('info'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof showToast === 'function') {
                    showToast(@json(session('info')), 'info');
                }
            });
        </script>
    @endif
</body>

</html>