<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="جميع المنتجات - مرساة للتسوق الرقمي والبيع المباشر المضمون" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>كافة المنتجات | مرساة Store</title>

    <!-- Google Fonts -->
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
            background: rgba(11, 25, 44, 0.88);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.65);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-card:hover {
            border-color: rgba(0, 102, 255, 0.45);
            box-shadow: 0 20px 40px -15px rgba(0, 102, 255, 0.3);
        }

        .gradient-text {
            background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 50%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0b192c;
        }

        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #0066ff;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-[#0b192c] text-slate-100 min-h-screen flex flex-col antialiased selection:bg-brand-500 selection:text-white">

    <!-- 1. TOP ANNOUNCEMENT BAR -->
    <div class="bg-gradient-to-r from-brand-950 via-slate-900 to-brand-950 text-xs py-2 border-b border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <div class="flex items-center gap-4 text-slate-300">
                <span class="inline-flex items-center gap-1.5 text-accent-gold font-bold">
                    <i class="fa-solid fa-shield-halved text-xs"></i>
                    مرساة | تسوق آمن وحماية كاملة للمشترين 100%
                </span>
                <span class="hidden md:inline-block text-slate-700">|</span>
                <span class="hidden md:inline-flex items-center gap-1.5 text-slate-300">
                    <i class="fa-solid fa-layer-group text-brand-400"></i>
                    جميع المنتجات المعروضة مراجعة ومضمونة
                </span>
            </div>
            <div class="flex items-center gap-5 text-slate-300">
                <div class="flex items-center gap-1.5 cursor-pointer hover:text-white transition">
                    <i class="fa-solid fa-globe text-brand-400"></i>
                    <span class="font-medium">العربية (₪)</span>
                </div>
                <a href="{{ route('customer.contact') }}" class="hover:text-white transition hidden sm:inline-block">مركز المساعدة</a>
            </div>
        </div>
    </div>

    <!-- 2. MAIN STICKY NAVIGATION HEADER -->
    <header class="sticky top-0 z-50 glass-header shadow-2xl transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 gap-4">

                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <button id="mobile-menu-btn" class="lg:hidden p-2 text-slate-300 hover:text-white rounded-xl bg-slate-800/50 focus:outline-none">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                    <a href="{{ route('customer.main-page') }}" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-brand-600 to-brand-400 flex items-center justify-center p-2 shadow-lg shadow-brand-500/30 group-hover:scale-105 transition duration-300">
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

                <!-- Live AJAX Smart Search Bar -->
                <div class="flex-1 max-w-3xl relative hidden md:block">
                    <form action="{{ route('customer.products.index') }}" method="GET" class="relative flex items-center bg-slate-900/90 rounded-full border border-slate-700/80 focus-within:border-brand-500 focus-within:ring-2 focus-within:ring-brand-500/30 transition-all duration-200 shadow-inner overflow-hidden">
                        <!-- Category Selector Dropdown -->
                        <div class="relative flex items-center border-l border-slate-700/80 bg-slate-800/60 hover:bg-slate-800 transition shrink-0">
                            <select name="category" id="header-category-select" class="bg-transparent text-slate-200 text-xs font-semibold py-3.5 pr-4 pl-8 appearance-none outline-none cursor-pointer">
                                <option value="all" class="bg-slate-900 text-white">كل الأقسام</option>
                                @if(isset($categories))
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
                                class="w-full bg-transparent text-white placeholder-slate-400 text-xs sm:text-sm py-3.5 pr-10 pl-24 outline-none" />
                            <i class="fa-solid fa-magnifying-glass absolute right-3.5 text-slate-400 text-sm"></i>
                            <button type="submit" class="absolute left-2 bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white px-5 py-2 rounded-full text-xs font-bold transition shadow-md">
                                بحث
                            </button>
                        </div>
                    </form>

                    <!-- AJAX Live Results Dropdown -->
                    <ul id="search-results" class="absolute top-full right-0 left-0 mt-2 bg-slate-900/95 backdrop-blur-2xl border border-slate-700/80 rounded-3xl shadow-2xl overflow-hidden z-50 hidden divide-y divide-slate-800 max-h-96 overflow-y-auto">
                    </ul>
                </div>

                <!-- Navigation Actions -->
                <div class="flex items-center gap-3">
                    @auth
                    <!-- Notifications Dropdown -->
                    <div class="relative">
                        <button id="notifDropdownBtn" class="relative p-3 text-slate-300 hover:text-white bg-slate-800/70 hover:bg-slate-800 rounded-full transition border border-slate-700/60">
                            <i class="fa-solid fa-bell text-lg"></i>
                            @if(Auth::user()->unreadNotifications->count() > 0)
                            <span class="absolute -top-1 -right-1 bg-accent-coral text-white text-[10px] font-black w-5 h-5 flex items-center justify-center rounded-full animate-pulse border-2 border-slate-900">
                                {{ Auth::user()->unreadNotifications->count() }}
                            </span>
                            @endif
                        </button>

                        <div id="notifDropdownMenu" class="hidden absolute left-0 mt-3 w-80 sm:w-96 bg-slate-900/95 border border-slate-700/80 rounded-3xl shadow-2xl p-4 z-50 divide-y divide-slate-800 max-h-96 overflow-y-auto">
                            <div class="flex items-center justify-between pb-3">
                                <h4 class="font-bold text-sm text-white flex items-center gap-2">
                                    <i class="fa-solid fa-bell text-brand-400"></i> مركز الإشعارات
                                </h4>
                            </div>
                            <div class="pt-3 space-y-2">
                                @forelse (Auth::user()->unreadNotifications as $notification)
                                <div class="p-3 bg-slate-800/80 rounded-2xl text-xs">
                                    <p class="text-slate-200">{{ $notification->data['message'] ?? '' }}</p>
                                </div>
                                @empty
                                <div class="py-6 text-center text-slate-400 text-xs">لا توجد إشعارات جديدة</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @endauth

                    <!-- Cart Trigger Button -->
                    <button id="open-cart-btn" class="relative flex items-center gap-2.5 bg-brand-600/20 hover:bg-brand-600/30 text-brand-400 border border-brand-500/40 px-4 py-2.5 rounded-full transition group">
                        <i class="fa-solid fa-cart-shopping text-base group-hover:scale-110 transition-transform"></i>
                        <span class="text-xs font-bold hidden sm:inline-block">السلة</span>
                        <span id="cart-count-badge" class="bg-brand-500 text-white text-[11px] font-black px-2.5 py-0.5 rounded-full shadow">
                            {{ count($carts->flatMap->items) }}
                        </span>
                    </button>

                    @guest
                    <button onclick="openModal()" class="bg-slate-800/90 hover:bg-slate-700 text-white text-xs font-bold px-4 py-2.5 rounded-full border border-slate-700 transition">
                        تسجيل دخول
                    </button>
                    @endguest

                    @auth
                    <!-- User Menu Dropdown -->
                    <div class="relative">
                        <button id="userMenuBtn" class="flex items-center gap-2 p-1.5 pl-3.5 bg-slate-800/80 hover:bg-slate-800 border border-slate-700/80 rounded-full transition">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-brand-600 to-accent-orange flex items-center justify-center text-white font-black text-xs shadow">
                                {{ mb_substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="text-xs font-bold text-slate-200 hidden md:inline-block max-w-[100px] truncate">
                                {{ Auth::user()->name }}
                            </span>
                            <i class="fa-solid fa-chevron-down text-xs text-slate-400"></i>
                        </button>

                        <div id="userMenuDropdown" class="hidden absolute left-0 mt-3 w-60 bg-slate-900/95 border border-slate-700/80 rounded-3xl shadow-2xl p-2.5 z-50 text-xs space-y-1">
                            <div class="p-3 bg-slate-800/60 rounded-2xl mb-1">
                                <p class="font-bold text-white text-sm truncate">{{ Auth::user()->name }}</p>
                            </div>
                            <a href="{{ route('profile.show') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800 transition">
                                <i class="fa-solid fa-user-pen text-brand-400 w-4 text-center"></i> الملف الشخصي
                            </a>
                            <a href="{{ route('customer.orders.show') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800 transition">
                                <i class="fa-solid fa-box text-brand-400 w-4 text-center"></i> طلباتك
                            </a>
                            <hr class="border-slate-800 my-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-rose-400 hover:bg-rose-500/10 transition font-bold text-right">
                                    <i class="fa-solid fa-right-from-bracket w-4 text-center"></i> تسجيل الخروج
                                </button>
                            </form>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>

        <div class="border-t border-slate-800/80 bg-slate-950/80">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-6 overflow-x-auto no-scrollbar py-3 text-xs font-semibold text-slate-300">
                    <a href="{{ route('customer.main-page') }}" class="hover:text-white transition shrink-0 flex items-center gap-1.5">
                        <i class="fa-solid fa-house"></i> الرئيسية
                    </a>
                    <a href="{{ route('customer.stores.index') }}" class="hover:text-white transition shrink-0 flex items-center gap-1.5">
                        <i class="fa-solid fa-store text-accent-gold"></i> المتاجر المعتمدة
                    </a>
                    @foreach ($categories as $cat)
                    <a href="{{ route('customer.category_products.index', $cat->id) }}" class="hover:text-white transition shrink-0 text-slate-400 hover:text-slate-200">
                        {{ $cat->name }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </header>

    <!-- BREADCRUMBS -->
    <div class="bg-slate-950/60 border-b border-slate-800/80 py-3 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <div class="flex items-center gap-2 text-slate-400">
                <a href="{{ route('customer.main-page') }}" class="hover:text-white transition flex items-center gap-1">
                    <i class="fa-solid fa-house text-brand-400"></i> الرئيسية
                </a>
                <span>/</span>
                <span class="text-slate-200 font-bold">معرض المنتجات</span>
            </div>
        </div>
    </div>

    <!-- PRODUCTS CATALOG -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10 w-full">

        <!-- HEADER BANNER -->
        <section class="glass-card rounded-3xl p-8 sm:p-10 relative overflow-hidden bg-gradient-to-br from-brand-950 via-slate-900 to-slate-950 border border-slate-700/60 shadow-2xl" data-aos="fade-up">
            <div class="max-w-2xl space-y-4">
                <span class="inline-flex items-center gap-2 bg-brand-500/10 border border-brand-500/30 text-brand-400 text-xs font-bold px-3.5 py-1.5 rounded-full">
                    <i class="fa-solid fa-boxes-stacked"></i> السوق العام
                </span>
                <h1 class="text-3xl sm:text-4xl font-black text-white leading-tight">
                    استكشف كافة <span class="gradient-text">المنتجات والمعروضات</span>
                </h1>
                <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                    تصفح أحدث المنتجات من جميع المتاجر المعتمدة بأسعار ممتازة وضمان تسوق آمن.
                </p>
            </div>
        </section>

        <!-- PRODUCTS GRID -->
        <section class="space-y-6" data-aos="fade-up">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($products as $product)
                @php
                $mainImage = $product->images()->where('is_main', true)->first();
                $averageRate = $product->ratings->avg('rate') ?? 0;
                $finalPrice = number_format($product->price * (1 - $product->discount / 100), 2);
                @endphp
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col justify-between group transition-all duration-300">
                    <div class="relative aspect-square overflow-hidden bg-slate-900/80">
                        @if($product->discount > 0)
                        <span class="absolute top-3 right-3 z-10 bg-rose-600 text-white font-black text-xs px-2.5 py-1 rounded-full shadow-lg">
                            -{{ round($product->discount) }}%
                        </span>
                        @endif

                        <a href="{{ route('customer.product.show', $product->id) }}" class="block w-full h-full">
                            <img src="{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/no-image.png') }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        </a>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center justify-between text-xs text-slate-400 mb-2">
                                <span class="bg-slate-800 px-2.5 py-0.5 rounded-md text-slate-300 font-medium">
                                    {{ $product->subcategory->name ?? 'قسم عام' }}
                                </span>
                                <button type="button"
                                    onclick="toggleWishlist(this, {{ $product->id }})"
                                    title="قائمة الرغبات"
                                    class="group/wishlist h-9 px-2.5 hover:px-3 rounded-full bg-slate-800/80 hover:bg-rose-500/20 text-slate-400 hover:text-rose-500 border border-slate-700/60 hover:border-rose-500/40 flex items-center justify-center gap-0 group-hover/wishlist:gap-1.5 shadow transition-all duration-300 ease-out hover:scale-105 shrink-0">
                                    <i class="{{ in_array($product->id, $userWishlistIds ?? []) ? 'fa-solid fa-heart text-rose-500' : 'fa-regular fa-heart text-slate-400 group-hover/wishlist:text-rose-500' }} text-xs shrink-0 transition-colors"></i>
                                    <span class="wishlist-text max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/wishlist:max-w-[100px] group-hover/wishlist:opacity-100 transition-all duration-300 text-[11px] font-bold">
                                        {{ in_array($product->id, $userWishlistIds ?? []) ? 'في المفضلة' : 'أضف للمفضلة' }}
                                    </span>
                                </button>
                            </div>

                            <h3 class="font-bold text-white text-base line-clamp-1 hover:text-brand-400 transition">
                                <a href="{{ route('customer.product.show', $product->id) }}">{{ $product->name }}</a>
                            </h3>

                            @php
                            $prAvgRate = round($averageRate > 0 ? $averageRate : 5.0, 1);
                            $prFullStars = floor($prAvgRate);
                            $prHasHalf = ($prAvgRate - $prFullStars) >= 0.5;
                            @endphp
                            <a href="{{ route('customer.product.show', $product->id) }}#reviews" title="عرض التقييمات والمراجعات" class="inline-flex items-center gap-1.5 text-xs text-slate-300 hover:text-accent-gold transition mt-1">
                                <div class="flex items-center gap-0.5 text-accent-gold text-[11px]">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <=$prFullStars)
                                        <i class="fa-solid fa-star text-accent-gold"></i>
                                        @elseif ($i == $prFullStars + 1 && $prHasHalf)
                                        <i class="fa-solid fa-star-half-stroke text-accent-gold"></i>
                                        @else
                                        <i class="fa-regular fa-star text-slate-600"></i>
                                        @endif
                                        @endfor
                                </div>
                                <span class="font-bold text-slate-300 text-[11px]">({{ number_format($prAvgRate, 1) }})</span>
                            </a>

                            @if($product->store)
                            <div class="text-xs text-slate-400 mt-1 flex items-center gap-1">
                                <span>البائع:</span>
                                <a href="{{ route('customer.stores.show', $product->store->id) }}" class="text-brand-400 font-semibold hover:underline">
                                    {{ $product->store->name }}
                                </a>
                            </div>
                            @endif
                        </div>

                        <div class="pt-3 border-t border-slate-800/80 flex items-center justify-between">
                            <div>
                                @if($product->discount > 0)
                                <span class="text-xs text-slate-500 line-through block">{{ $product->price }} ₪</span>
                                <span class="text-lg font-black text-emerald-400">{{ $finalPrice }} <span class="text-xs">₪</span></span>
                                @else
                                <span class="text-lg font-black text-emerald-400">{{ $product->price }} <span class="text-xs">₪</span></span>
                                @endif
                            </div>

                            <form action="{{ route('customer.cart.add') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="qty" value="1">
                                <button type="submit" title="أضف للسلة"
                                    class="group/btn h-10 px-3 hover:px-4 rounded-full bg-brand-600 hover:bg-brand-500 text-white flex items-center justify-center gap-0 group-hover/btn:gap-2 shadow-lg shadow-brand-600/30 transition-all duration-300 ease-out hover:scale-105">
                                    <i class="fa-solid fa-cart-plus text-sm shrink-0"></i>
                                    <span class="max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/btn:max-w-[100px] group-hover/btn:opacity-100 transition-all duration-300 text-xs font-bold">
                                        أضف للسلة
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-16 text-center text-slate-400 glass-card rounded-3xl space-y-3">
                    <i class="fa-solid fa-box-open text-4xl text-slate-600 block"></i>
                    <p class="text-sm">لا توجد منتجات مضافة حالياً</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination Links -->
            @if(method_exists($products, 'links'))
            <div class="pt-6 border-t border-slate-800 flex justify-center">
                {{ $products->links() }}
            </div>
            @endif
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-slate-400 border-t border-slate-800 text-xs mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p>© {{ date('Y') }} جميع الحقوق محفوظة - مرساة Store</p>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true
            });
        });
    </script>
</body>

</html>