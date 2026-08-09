<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="مرساة - السوق العام والمنصة الرقمية للتسوق الآمن والبيع المباشر" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>مرساة | Marsa Store - السوق العام والتسوق الآمن</title>

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

        /* Glassmorphism & Modern Styling */
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

        .gradient-accent-text {
            background: linear-gradient(135deg, #ffb703 0%, #fb8500 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Custom Scrollbar */
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
            width: 200%;
            animation: marquee 25s linear infinite;
        }

        .animate-marquee:hover {
            animation-play-state: paused;
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
                    <i class="fa-solid fa-truck-fast text-brand-400"></i>
                    شحن سريع إلى كافة المناطق والمحافظات
                </span>
            </div>
            <div class="flex items-center gap-5 text-slate-300">
                <div class="flex items-center gap-1.5 cursor-pointer hover:text-white transition">
                    <i class="fa-solid fa-globe text-brand-400"></i>
                    <span class="font-medium">العربية (₪)</span>
                </div>
                <a href="{{ route('customer.contact') }}" class="hover:text-white transition hidden sm:inline-block">مركز المساعدة والمعلومات</a>
            </div>
        </div>
    </div>

    <!-- 2. MAIN STICKY NAVIGATION HEADER -->
    <header class="sticky top-0 z-50 glass-header shadow-2xl transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 gap-4">

                <!-- Logo & Mobile Menu Toggle -->
                <div class="flex items-center gap-3">
                    <button id="mobile-menu-btn" class="lg:hidden p-2 text-slate-300 hover:text-white rounded-xl bg-slate-800/50 focus:outline-none">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                    <a href="{{ route('guest.main-page') }}" class="flex items-center gap-3 group">
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

                <!-- Navigation Actions (Notifications, Cart, Wishlist, User) -->
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
                                <span class="text-[11px] text-slate-400">جديد</span>
                            </div>
                            <div class="pt-3 space-y-2">
                                @forelse (Auth::user()->unreadNotifications as $notification)
                                @php
                                $status = $notification->data['status'] ?? null;
                                $badgeClass = $status === 'approved' ? 'text-emerald-400' : ($status === 'rejected' ? 'text-rose-400' : 'text-slate-300');
                                $icon = $status === 'approved' ? 'fa-circle-check text-emerald-400' : ($status === 'rejected' ? 'fa-circle-xmark text-rose-400' : 'fa-bell text-brand-400');
                                @endphp
                                <div class="p-3 bg-slate-800/80 hover:bg-slate-800 rounded-2xl transition text-xs">
                                    <div class="flex items-start gap-3">
                                        <i class="fa-solid {{ $icon }} text-base mt-0.5"></i>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between">
                                                <span class="font-bold {{ $badgeClass }}">فريق الدعم</span>
                                                <span class="text-[10px] text-slate-400">{{ $notification->created_at->diffForHumans() }}</span>
                                            </div>
                                            <p class="text-slate-200 mt-1 leading-relaxed">{{ $notification->data['message'] ?? '' }}</p>
                                            @if(isset($notification->data['reply']))
                                            <p class="mt-2 p-2.5 bg-slate-950/80 rounded-xl text-slate-300 text-[11px]">
                                                <strong class="text-brand-400">رد الإدارة:</strong> {{ $notification->data['reply'] }}
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="py-8 text-center text-slate-400 text-xs">
                                    <i class="fa-regular fa-bell-slash text-3xl mb-2 text-slate-600 block"></i>
                                    لا توجد إشعارات جديدة حالياً
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @endauth

                    <!-- Wishlist Trigger Button -->
                    <button id="open-wishlist-btn" class="relative flex items-center gap-2 bg-rose-500/20 hover:bg-rose-500/30 text-rose-400 border border-rose-500/40 px-3.5 py-2.5 rounded-full transition group">
                        <i class="fa-solid fa-heart text-base group-hover:scale-110 transition-transform"></i>
                        <span class="text-xs font-bold hidden sm:inline-block">الرغبات</span>
                        <span id="wishlist-count-badge" class="bg-rose-600 text-white text-[11px] font-black px-2.5 py-0.5 rounded-full shadow">
                            {{ count($userWishlistIds ?? []) }}
                        </span>
                    </button>

                    <!-- Cart Trigger Button -->
                    <button id="open-cart-btn" class="relative flex items-center gap-2.5 bg-brand-600/20 hover:bg-brand-600/30 text-brand-400 border border-brand-500/40 px-4 py-2.5 rounded-full transition group">
                        <i class="fa-solid fa-cart-shopping text-base group-hover:scale-110 transition-transform"></i>
                        <span class="text-xs font-bold hidden sm:inline-block">السلة</span>
                        <span id="cart-count-badge" class="bg-brand-500 text-white text-[11px] font-black px-2.5 py-0.5 rounded-full shadow">
                            {{ count($carts->flatMap->items) }}
                        </span>
                    </button>

                    @guest
                    <!-- Guest Auth Buttons -->
                    <div class="flex items-center gap-2">
                        <a href="{{ route('login') }}" class="bg-slate-800/90 hover:bg-slate-700 text-white text-xs font-bold px-4 py-2.5 rounded-full border border-slate-700 transition">
                            تسجيل دخول
                        </a>
                        <a href="{{ route('register') }}" class="hidden sm:inline-block bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white text-xs font-bold px-5 py-2.5 rounded-full transition shadow-lg shadow-brand-600/30">
                            حساب جديد
                        </a>
                    </div>
                    @endguest

                    @auth
                    <!-- Auth User Profile Menu -->
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

                        <!-- User Dropdown Menu -->
                        <div id="userMenuDropdown" class="hidden absolute left-0 mt-3 w-60 bg-slate-900/95 border border-slate-700/80 rounded-3xl shadow-2xl p-2.5 z-50 text-xs space-y-1">
                            <div class="p-3 bg-slate-800/60 rounded-2xl mb-1">
                                <p class="font-bold text-white text-sm truncate">{{ Auth::user()->name }}</p>
                                <p class="text-slate-400 text-[11px] truncate">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="{{ route('profile.show') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800 transition">
                                <i class="fa-solid fa-user-pen text-brand-400 w-4 text-center"></i> الملف الشخصي
                            </a>

                            @if(Auth::user()->role === 'customer')
                            <a href="{{ route('customer.orders.show') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800 transition">
                                <i class="fa-solid fa-box text-brand-400 w-4 text-center"></i> طلباتك ومشترواتك
                            </a>
                            @endif

                            @if(Auth::user()->role === 'vendor')
                            <a href="{{ route('vendor.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800 transition">
                                <i class="fa-solid fa-gauge text-brand-400 w-4 text-center"></i> لوحة التحكم
                            </a>
                            @endif

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

        <!-- 3. SECONDARY CATEGORIES NAV BAR -->
        <div class="border-t border-slate-800/80 bg-slate-950/80">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-6 overflow-x-auto no-scrollbar py-3 text-xs font-semibold text-slate-300">
                    <a href="{{ route('customer.main-page') }}" class="text-brand-400 font-extrabold flex items-center gap-2 shrink-0 bg-brand-500/10 px-3.5 py-1.5 rounded-full border border-brand-500/30">
                        <i class="fa-solid fa-house"></i> الرئيسية
                    </a>
                    <a href="{{ route('customer.stores.index') }}" class="hover:text-white transition shrink-0 flex items-center gap-1.5 text-accent-gold">
                        <i class="fa-solid fa-store"></i> المتاجر المعتمدة
                    </a>
                    <a href="#new-products" class="hover:text-white transition shrink-0">العروض والتنزيلات</a>
                    <a href="#Featured-Categories" class="hover:text-white transition shrink-0">الأقسام الرئيسية</a>
                    <a href="#Suggested-for-you" class="hover:text-white transition shrink-0">الأكثر طلباً</a>
                    <a href="#Special-Offer" class="hover:text-white transition shrink-0">أحدث المنتجات</a>

                    <!-- Category Quick Links Loop -->
                    @foreach ($categories->take(6) as $cat)
                    <a href="{{ route('customer.category_products.index', $cat->id) }}" class="hover:text-white transition shrink-0 text-slate-400 hover:text-slate-200">
                        {{ $cat->name }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </header>

    <!-- MOBILE SEARCH BAR -->
    <div class="md:hidden px-4 pt-3 pb-2 bg-slate-900 border-b border-slate-800">
        <div class="relative flex items-center">
            <input type="text" id="mobile-search-input" placeholder="ابحث عن المنتجات والمتاجر..."
                class="w-full bg-slate-950 text-white placeholder-slate-400 text-xs rounded-full py-3 pr-10 pl-4 border border-slate-800 outline-none" />
            <i class="fa-solid fa-magnifying-glass absolute right-3.5 text-slate-400 text-xs"></i>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="flex-grow space-y-20 py-8">

        <!-- 4. HERO BANNER & PROMO CARDS -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Main Featured Hero Banner (Left / Center Large) -->
                <div class="lg:col-span-2 relative rounded-3xl overflow-hidden glass-card min-h-[380px] sm:min-h-[440px] flex items-center p-8 sm:p-12 bg-gradient-to-br from-brand-900 via-slate-900 to-slate-950 shadow-2xl border border-slate-700/60" data-aos="fade-left">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-brand-500/25 via-transparent to-transparent pointer-events-none"></div>

                    <div class="relative z-10 max-w-xl space-y-6">
                        <div class="inline-flex items-center gap-2 bg-brand-500/10 border border-brand-500/30 text-brand-400 text-xs font-extrabold px-4 py-1.5 rounded-full">
                            <i class="fa-solid fa-crown text-accent-gold"></i> المنصة المعتمدة للتسوق المباشر
                        </div>
                        <h1 class="text-3xl sm:text-5xl font-black text-white leading-tight">
                            مرساتك الآمنة لجميع <span class="gradient-accent-text">مشترياتك واحتياجاتك</span>
                        </h1>
                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                            استمتع بتجربة تسوق عالمية شاملة لكل ما تحتاجه مع ضمان الأمان وحرية الاختيار بين أفضل المتاجر والمنتجات المحلية والعالمية.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-2">
                            <a href="#new-products" class="bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-extrabold text-sm px-8 py-4 rounded-full shadow-xl shadow-brand-600/40 transition hover:scale-105">
                                استكشف العروض الحالية
                            </a>
                            <a href="{{ route('customer.stores.index') }}" class="bg-slate-800/90 hover:bg-slate-700 text-slate-200 font-bold text-sm px-7 py-4 rounded-full border border-slate-700 transition">
                                تصفح المتاجر المعتمدة
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Side Hero Cards -->
                <div class="space-y-6 flex flex-col justify-between" data-aos="fade-right">
                    <!-- Top Promo Card -->
                    <div class="glass-card rounded-3xl p-6 bg-gradient-to-tr from-slate-900 via-slate-900 to-slate-800/90 relative overflow-hidden flex-1 flex flex-col justify-between border border-slate-700/60">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold text-accent-orange bg-accent-orange/10 px-3 py-1 rounded-full border border-accent-orange/20">
                                تنزيلات أسبوعية
                            </span>
                            <i class="fa-solid fa-fire text-accent-orange text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">تخفيضات كبرى تصل إلى 50%</h3>
                            <p class="text-slate-400 text-xs mb-4">على كافة المنتجات الفيزيائية والرقمية ومستلزمات التسوق.</p>
                        </div>
                        <a href="#new-products" class="text-xs font-bold text-brand-400 hover:text-brand-300 flex items-center gap-1.5">
                            استكشف التخفيضات <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>

                    <!-- Bottom Security Guarantee Card -->
                    <div class="glass-card rounded-3xl p-6 bg-gradient-to-br from-slate-900 to-brand-950 relative overflow-hidden flex-1 flex flex-col justify-between border border-slate-700/60">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold text-emerald-400 bg-emerald-400/10 px-3 py-1 rounded-full border border-emerald-400/20">
                                تسوق آمن 100%
                            </span>
                            <i class="fa-solid fa-shield-check text-emerald-400 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">أمان كامل وتتبع المشتريات</h3>
                            <p class="text-slate-400 text-xs mb-4">ضمان الشحن والتوصيل والتواصل المباشر مع التجار لكافة المنتجات.</p>
                        </div>
                        <a href="#howus" class="text-xs font-bold text-slate-300 hover:text-white flex items-center gap-1.5">
                            تعرف علينا أكثر <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- 5. TRUST BADGES BAR -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-6 glass-card rounded-3xl bg-slate-900/60 border border-slate-800 divide-y md:divide-y-0 md:divide-x md:divide-x-reverse divide-slate-800">
                <div class="flex items-center gap-4 p-3">
                    <div class="w-12 h-12 rounded-2xl bg-brand-500/10 border border-brand-500/20 flex items-center justify-center text-brand-400 text-xl shrink-0">
                        <i class="fa-solid fa-truck-ramp-box"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">توصيل سريع</h4>
                        <p class="text-[11px] text-slate-400">توصيل لكافة المحافظات والمناطق</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 p-3 pt-4 md:pt-3">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 text-xl shrink-0">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">دفع آمن 100%</h4>
                        <p class="text-[11px] text-slate-400">حماية فائقة لبياناتك ومعاملاتك</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 p-3 pt-4 md:pt-3">
                    <div class="w-12 h-12 rounded-2xl bg-accent-gold/10 border border-accent-gold/20 flex items-center justify-center text-accent-gold text-xl shrink-0">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">جودة مضمونة</h4>
                        <p class="text-[11px] text-slate-400">منتجات أصلية من متاجر موثوقة</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 p-3 pt-4 md:pt-3">
                    <div class="w-12 h-12 rounded-2xl bg-accent-coral/10 border border-accent-coral/20 flex items-center justify-center text-accent-coral text-xl shrink-0">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">دعم متواصل</h4>
                        <p class="text-[11px] text-slate-400">فريق خدمة العملاء متواجد للمساعدة</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. TIME-SENSITIVE FLASH SALE SECTION (عروض فلاش! لفترة محدودة) -->
        <section id="new-products" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between border-b border-slate-800 pb-4 gap-4">
                <div>
                    <div class="flex items-center gap-2 text-rose-500 text-xs font-black mb-1 uppercase tracking-wider">
                        <i class="fa-solid fa-bolt text-amber-400 animate-pulse"></i> صفقة اليوم الفائقة
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">عروض فلاش! لفترة محدودة</h2>
                </div>

                <!-- Live Countdown Timer -->
                <div class="flex items-center gap-2 bg-slate-900/90 border border-rose-500/40 px-4 py-2 rounded-full text-xs font-mono font-bold text-rose-400 shadow-xl shadow-rose-950/20 shrink-0">
                    <i class="fa-solid fa-clock text-rose-500 text-sm animate-spin" style="animation-duration: 6s;"></i>
                    <span class="text-slate-300 font-sans font-semibold">ينتهي العرض خلال:</span>
                    <span id="flash-sale-countdown" class="text-amber-400 text-sm font-black tracking-widest font-mono">08:42:15</span>
                </div>
            </div>

            <!-- Flash Sale Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                @php
                $mainImage = $product->images()->where('is_main', true)->first();
                $averageRate = $product->ratings->avg('rate') ?? 0;
                $rawDiscount = $product->discount > 0 ? $product->discount : 25;
                $rawSaved = $product->price * ($rawDiscount / 100);
                $finalPrice = number_format($product->price - $rawSaved, 2);
                $savedAmount = number_format($rawSaved, 2);
                $remainingStock = rand(3, 9);
                $stockPercentage = max(20, $remainingStock * 10);
                @endphp
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col justify-between group transition-all duration-300 border border-slate-800 hover:border-rose-500/40 hover:shadow-2xl hover:shadow-rose-500/10">
                    <div class="relative aspect-square overflow-hidden bg-slate-900/80">
                        <span class="absolute top-3 right-3 z-10 bg-gradient-to-r from-rose-600 to-rose-500 text-white font-black text-xs px-3 py-1 rounded-full shadow-xl flex items-center gap-1">
                            <i class="fa-solid fa-bolt text-amber-300 text-[10px]"></i> خصم {{ round($rawDiscount) }}%
                        </span>

                        <button type="button"
                            onclick="toggleWishlist(this, {{ $product->id }})"
                            title="قائمة الرغبات"
                            class="group/wishlist absolute top-3 left-3 z-20 h-9 px-2.5 hover:px-3 rounded-full bg-slate-900/70 backdrop-blur-md hover:bg-rose-500/20 text-slate-300 hover:text-rose-500 border border-slate-700/80 hover:border-rose-500/50 flex items-center justify-center gap-0 group-hover/wishlist:gap-1.5 shadow-lg transition-all duration-300 ease-out hover:scale-105">
                            <i class="{{ in_array($product->id, $userWishlistIds ?? []) ? 'fa-solid fa-heart text-rose-500' : 'fa-regular fa-heart text-slate-300 group-hover/wishlist:text-rose-500' }} text-xs shrink-0 transition-colors"></i>
                            <span class="wishlist-text max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/wishlist:max-w-[100px] group-hover/wishlist:opacity-100 transition-all duration-300 text-[11px] font-bold">
                                {{ in_array($product->id, $userWishlistIds ?? []) ? 'في المفضلة' : 'أضف للمفضلة' }}
                            </span>
                        </button>

                        <a href="{{ route('customer.product.show', $product->id) }}" class="block w-full h-full">
                            <img src="{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/no-image.png') }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        </a>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            @php
                            $pAvgRate = round($averageRate > 0 ? $averageRate : 5.0, 1);
                            $pFullStars = floor($pAvgRate);
                            $pHasHalf = ($pAvgRate - $pFullStars) >= 0.5;
                            @endphp
                            <div class="flex items-center justify-between text-xs text-slate-400 mb-2">
                                <span class="bg-slate-800 px-2.5 py-0.5 rounded-md text-slate-300 font-medium">
                                    {{ $product->subcategory->name ?? 'قسم عام' }}
                                </span>

                                <a href="{{ route('customer.product.show', $product->id) }}#reviews" title="عرض التقييمات والمراجعات" class="inline-flex items-center gap-1 text-xs text-slate-300 hover:text-accent-gold transition">
                                    <div class="flex items-center gap-0.5 text-accent-gold text-[10px]">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <=$pFullStars)
                                            <i class="fa-solid fa-star text-accent-gold"></i>
                                            @elseif ($i == $pFullStars + 1 && $pHasHalf)
                                            <i class="fa-solid fa-star-half-stroke text-accent-gold"></i>
                                            @else
                                            <i class="fa-regular fa-star text-slate-600"></i>
                                            @endif
                                            @endfor
                                    </div>
                                    <span class="font-bold text-slate-300 text-[10px]">({{ number_format($pAvgRate, 1) }})</span>
                                </a>
                            </div>

                            <h3 class="font-bold text-white text-base line-clamp-1 hover:text-brand-400 transition my-2">
                                <a href="{{ route('customer.product.show', $product->id) }}">{{ $product->name }}</a>
                            </h3>

                            @if($product->store)
                            <div class="mt-2">
                                <a href="{{ route('customer.stores.show', $product->store->id) }}" class="inline-flex items-center gap-1.5 bg-slate-800/60 hover:bg-slate-800 border border-slate-700/50 hover:border-brand-500/40 px-2.5 py-1 rounded-full text-xs transition group/store">
                                    <i class="fa-solid fa-store text-brand-400 text-[11px] group-hover/store:scale-110 transition-transform"></i>
                                    <span class="text-slate-400 text-[11px]">البائع:</span>
                                    <span class="text-brand-400 font-semibold group-hover/store:text-brand-300 text-[11px]">{{ $product->store->name }}</span>
                                </a>
                            </div>
                            @endif

                            <!-- Stock Progress Bar (Urgency) -->
                            <div class="space-y-1 mt-3">
                                <div class="flex justify-between text-[11px] font-semibold text-slate-400">
                                    <span>متبقي بالمخزون: <strong class="text-rose-400">{{ $remainingStock }} قطع</strong></span>
                                    <span class="bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-[10px] font-bold px-2 py-0.5 rounded-md">وفر {{ $savedAmount }} ₪</span>
                                </div>
                                <div class="w-full h-1.5 bg-slate-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-rose-500 to-amber-500 rounded-full transition-all duration-500" style="width: {{ $stockPercentage }}%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-slate-800/80 flex items-center justify-between">
                            <div>
                                <span class="text-xs text-slate-500 line-through block">{{ $product->price }} ₪</span>
                                <span class="text-lg font-black text-emerald-400">{{ $finalPrice }} <span class="text-xs">₪</span></span>
                            </div>

                            <form action="{{ route('customer.cart.add') }}" method="POST" class="inline" @guest onsubmit="event.preventDefault(); showToast('يرجى تسجيل الدخول لإضافة المنتجات إلى السلة', 'warning'); openModal(); return false;" @endguest>
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
                @endforeach
            </div>
        </section>

        <!-- 7. FEATURED CATEGORIES SHOWCASE -->
        <section id="Featured-Categories" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
            <div class="flex items-end justify-between border-b border-slate-800 pb-4">
                <div>
                    <span class="text-xs font-bold text-brand-400 mb-1 block flex items-center gap-1.5">
                        <i class="fa-solid fa-layer-group"></i> استكشف الفئات والأقسام
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">الأقسام الرئيسية المميزة</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categories as $category)
                @php
                $cName = mb_strtolower($category->name);

                if (str_contains($cName, 'الكترون') || str_contains($cName, 'إلكترون') || str_contains($cName, 'تقن') || str_contains($cName, 'جهاز') || str_contains($cName, 'هاتف')) {
                // الكترونيات
                $categoryImg = 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'موضة') || str_contains($cName, 'أزياء') || str_contains($cName, 'ملابس') || str_contains($cName, 'fashion')) {
                // موضة
                $categoryImg = 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'بيت') || str_contains($cName, 'مطبخ') || str_contains($cName, 'منزل') || str_contains($cName, 'أثاث')) {
                // بيت ومطبخ
                $categoryImg = 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'جمال') || str_contains($cName, 'عناية') || str_contains($cName, 'تجميل') || str_contains($cName, 'beauty')) {
                // الجمال والعناية الشخصية
                $categoryImg = 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'كتب') || str_contains($cName, 'مكتب') || str_contains($cName, 'قرطاسية') || str_contains($cName, 'book')) {
                // الكتب والأدوات المكتبية
                $categoryImg = 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'ألعاب') || str_contains($cName, 'العاب') || str_contains($cName, 'قيم') || str_contains($cName, 'game')) {
                // الألعاب
                $categoryImg = 'https://images.unsplash.com/photo-1612287230202-1ff1d85d1bdf?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'رياض') || str_contains($cName, 'outdoor') || str_contains($cName, 'لياقة') || str_contains($cName, 'sport')) {
                // رياضة & Outdoors
                $categoryImg = 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'سيار') || str_contains($cName, 'مركب') || str_contains($cName, 'أغراض') || str_contains($cName, 'car')) {
                // أغراض سيارات
                $categoryImg = 'https://images.unsplash.com/photo-1617814076367-b759c7d7e738?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'صح') || str_contains($cName, 'عافية') || str_contains($cName, 'health')) {
                // الصحة
                $categoryImg = 'https://images.unsplash.com/photo-1505576399279-565b52d4ac71?auto=format&fit=crop&w=1000&q=80';
                } else {
                $categoryImg = !empty($category->image) ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1472851294608-062f824d29cc?auto=format&fit=crop&w=1000&q=80';
                }
                @endphp
                @php
                $prodCount = $category->products_count ?? $category->subcategories->sum(fn($sub) => $sub->products?->count() ?? 0);
                @endphp
                <div class="glass-card rounded-3xl overflow-hidden group hover:border-brand-500/50 transition duration-500 flex flex-col justify-between shadow-xl">
                    <a href="{{ route('customer.category_products.index', $category->id) }}" class="relative block h-64 overflow-hidden bg-slate-900 group">
                        <img src="{{ $categoryImg }}" alt="{{ $category->name }}"
                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1472851294608-062f824d29cc?auto=format&fit=crop&w=1000&q=80';"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-90 group-hover:opacity-100 filter brightness-95" />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>

                        <!-- Badges in Top Bar -->
                        <div class="absolute top-3 right-3 flex items-center gap-2">
                            <span class="bg-gradient-to-r from-brand-600 to-brand-500 backdrop-blur-md text-white text-[11px] font-black px-3 py-1 rounded-full shadow-lg flex items-center gap-1.5 border border-brand-400/40">
                                <i class="fa-solid fa-boxes-stacked text-xs"></i>
                                <span>{{ number_format($prodCount) }} منتج</span>
                            </span>

                            <span class="bg-slate-950/80 backdrop-blur-md border border-slate-700/80 text-slate-300 text-[10px] font-extrabold px-2.5 py-1 rounded-full shadow-lg hidden sm:inline-flex items-center gap-1">
                                <i class="fa-solid fa-tag text-brand-400"></i> {{ $category->subcategories->count() }} فئات
                            </span>
                        </div>

                        <!-- Bottom Card Info -->
                        <div class="absolute bottom-4 right-4 left-4 flex items-end justify-between">
                            <div>
                                <span class="text-[11px] text-emerald-400 font-extrabold tracking-wider uppercase flex items-center gap-1 mb-0.5">
                                    <i class="fa-solid fa-circle-check text-[9px]"></i> {{ number_format($prodCount) }} منتج متوفر
                                </span>
                                <h3 class="text-2xl font-black text-white drop-shadow-md group-hover:text-brand-300 transition">
                                    {{ $category->name }}
                                </h3>
                            </div>
                            <span class="w-10 h-10 rounded-2xl bg-brand-600/80 group-hover:bg-brand-500 text-white flex items-center justify-center backdrop-blur-md shadow-lg group-hover:scale-110 transition duration-300">
                                <i class="fa-solid fa-arrow-left text-sm"></i>
                            </span>
                        </div>
                    </a>

                    <div class="p-4 bg-slate-900/90 flex flex-wrap gap-2 border-t border-slate-800/80">
                        @foreach ($category->subcategories as $sub)
                        <a href="{{ route('customer.products.index', ['subcategory' => $sub->id]) }}"
                            class="text-xs bg-slate-950 hover:bg-brand-600 text-slate-300 hover:text-white px-3 py-1.5 rounded-full border border-slate-800 hover:border-brand-500 transition font-semibold flex items-center gap-1">
                            <span>{{ $sub->name }}</span>
                            <i class="fa-solid fa-chevron-left text-[9px] opacity-60"></i>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- 8. MOST ORDERED PRODUCTS (الأكثر طلباً) -->
        <section id="Suggested-for-you" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
            <div class="flex items-end justify-between border-b border-slate-800 pb-4">
                <div>
                    <span class="text-xs font-bold text-accent-gold mb-1 block"><i class="fa-solid fa-crown"></i> الأكثر مبيعاً</span>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">المنتجات الأعلى طلباً</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($mostOrdereds as $mostOrdered)
                @php
                $mainImage = $mostOrdered->images()->where('is_main', true)->first();
                $averageRate = $mostOrdered->ratings->avg('rate') ?? 0;
                $finalPrice = number_format($mostOrdered->price * (1 - $mostOrdered->discount / 100), 2);
                @endphp
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col justify-between group transition-all duration-300">
                    <div class="relative aspect-square overflow-hidden bg-slate-900/80">
                        <span class="absolute top-3 right-3 z-10 bg-accent-gold text-slate-950 font-black text-[11px] px-2.5 py-1 rounded-full shadow-lg">
                            مبيعات: {{ $mostOrdered->total_sales }}
                        </span>

                        <button type="button"
                            onclick="toggleWishlist(this, {{ $mostOrdered->id }})"
                            title="قائمة الرغبات"
                            class="group/wishlist absolute top-3 left-3 z-20 h-9 px-2.5 hover:px-3 rounded-full bg-slate-900/70 backdrop-blur-md hover:bg-rose-500/20 text-slate-300 hover:text-rose-500 border border-slate-700/80 hover:border-rose-500/50 flex items-center justify-center gap-0 group-hover/wishlist:gap-1.5 shadow-lg transition-all duration-300 ease-out hover:scale-105">
                            <i class="{{ in_array($mostOrdered->id, $userWishlistIds ?? []) ? 'fa-solid fa-heart text-rose-500' : 'fa-regular fa-heart text-slate-300 group-hover/wishlist:text-rose-500' }} text-xs shrink-0 transition-colors"></i>
                            <span class="wishlist-text max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/wishlist:max-w-[100px] group-hover/wishlist:opacity-100 transition-all duration-300 text-[11px] font-bold">
                                {{ in_array($mostOrdered->id, $userWishlistIds ?? []) ? 'في المفضلة' : 'أضف للمفضلة' }}
                            </span>
                        </button>

                        <a href="{{ route('customer.product.show', $mostOrdered->id) }}" class="block w-full h-full">
                            <img src="{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/no-image.png') }}"
                                alt="{{ $mostOrdered->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        </a>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            @php
                            $mAvgRate = round($averageRate > 0 ? $averageRate : 5.0, 1);
                            $mFullStars = floor($mAvgRate);
                            $mHasHalf = ($mAvgRate - $mFullStars) >= 0.5;
                            @endphp
                            <div class="flex items-center justify-between text-xs text-slate-400 mb-2">
                                <span class="bg-slate-800 px-2.5 py-0.5 rounded-md text-slate-300 font-medium">
                                    {{ $mostOrdered->subcategory->name ?? 'فئة عامة' }}
                                </span>

                                <a href="{{ route('customer.product.show', $mostOrdered->id) }}#reviews" title="عرض التقييمات والمراجعات" class="inline-flex items-center gap-1 text-xs text-slate-300 hover:text-accent-gold transition">
                                    <div class="flex items-center gap-0.5 text-accent-gold text-[10px]">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <=$mFullStars)
                                            <i class="fa-solid fa-star text-accent-gold"></i>
                                            @elseif ($i == $mFullStars + 1 && $mHasHalf)
                                            <i class="fa-solid fa-star-half-stroke text-accent-gold"></i>
                                            @else
                                            <i class="fa-regular fa-star text-slate-600"></i>
                                            @endif
                                            @endfor
                                    </div>
                                    <span class="font-bold text-slate-300 text-[10px]">({{ number_format($mAvgRate, 1) }})</span>
                                </a>
                            </div>

                            <h3 class="font-bold text-white text-base line-clamp-1 hover:text-brand-400 transition my-2">
                                <a href="{{ route('customer.product.show', $mostOrdered->id) }}">{{ $mostOrdered->name }}</a>
                            </h3>

                            @if($mostOrdered->store)
                            <div class="mt-2">
                                <a href="{{ route('customer.stores.show', $mostOrdered->store->id) }}" class="inline-flex items-center gap-1.5 bg-slate-800/60 hover:bg-slate-800 border border-slate-700/50 hover:border-brand-500/40 px-2.5 py-1 rounded-full text-xs transition group/store">
                                    <i class="fa-solid fa-store text-brand-400 text-[11px] group-hover/store:scale-110 transition-transform"></i>
                                    <span class="text-slate-400 text-[11px]">البائع:</span>
                                    <span class="text-brand-400 font-semibold group-hover/store:text-brand-300 text-[11px]">{{ $mostOrdered->store->name }}</span>
                                </a>
                            </div>
                            @endif
                        </div>

                        <div class="pt-3 border-t border-slate-800/80 flex items-center justify-between">
                            <div>
                                @if($mostOrdered->discount > 0)
                                <span class="text-xs text-slate-500 line-through block">{{ $mostOrdered->price }} ₪</span>
                                <span class="text-lg font-black text-emerald-400">{{ $finalPrice }} <span class="text-xs">₪</span></span>
                                @else
                                <span class="text-lg font-black text-emerald-400">{{ $mostOrdered->price }} <span class="text-xs">₪</span></span>
                                @endif
                            </div>

                            <form action="{{ route('customer.cart.add') }}" method="POST" class="inline" @guest onsubmit="event.preventDefault(); showToast('يرجى تسجيل الدخول لإضافة المنتجات إلى السلة', 'warning'); openModal(); return false;" @endguest>
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $mostOrdered->id }}">
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
                @endforeach
            </div>
        </section>

        <!-- 9. LATEST ADDITIONS (أحدث المنتجات) -->
        <section id="Special-Offer" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
            <div class="flex items-end justify-between border-b border-slate-800 pb-4">
                <div>
                    <span class="text-xs font-bold text-emerald-400 mb-1 block"><i class="fa-solid fa-sparkles"></i> جديد السوق</span>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">آخر المنتجات المعروضة</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($latest as $product)
                @php
                $mainImage = $product->images()->where('is_main', true)->first();
                $averageRate = $product->ratings->avg('rate') ?? 0;
                $finalPrice = number_format($product->price * (1 - $product->discount / 100), 2);
                @endphp
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col justify-between group transition-all duration-300">
                    <div class="relative aspect-square overflow-hidden bg-slate-900/80">
                        <span class="absolute top-3 right-3 z-10 bg-slate-800/90 text-white font-bold text-[10px] px-2.5 py-1 rounded-full border border-slate-700">
                            {{ $product->created_at?->diffForHumans() }}
                        </span>

                        <button type="button"
                            onclick="toggleWishlist(this, {{ $product->id }})"
                            title="قائمة الرغبات"
                            class="group/wishlist absolute top-3 left-3 z-20 h-9 px-2.5 hover:px-3 rounded-full bg-slate-900/70 backdrop-blur-md hover:bg-rose-500/20 text-slate-300 hover:text-rose-500 border border-slate-700/80 hover:border-rose-500/50 flex items-center justify-center gap-0 group-hover/wishlist:gap-1.5 shadow-lg transition-all duration-300 ease-out hover:scale-105">
                            <i class="{{ in_array($product->id, $userWishlistIds ?? []) ? 'fa-solid fa-heart text-rose-500' : 'fa-regular fa-heart text-slate-300 group-hover/wishlist:text-rose-500' }} text-xs shrink-0 transition-colors"></i>
                            <span class="wishlist-text max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/wishlist:max-w-[100px] group-hover/wishlist:opacity-100 transition-all duration-300 text-[11px] font-bold">
                                {{ in_array($product->id, $userWishlistIds ?? []) ? 'في المفضلة' : 'أضف للمفضلة' }}
                            </span>
                        </button>

                        <a href="{{ route('customer.product.show', $product->id) }}" class="block w-full h-full">
                            <img src="{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/no-image.png') }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        </a>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            @php
                            $lAvgRate = round($averageRate > 0 ? $averageRate : 5.0, 1);
                            $lFullStars = floor($lAvgRate);
                            $lHasHalf = ($lAvgRate - $lFullStars) >= 0.5;
                            @endphp
                            <div class="flex items-center justify-between text-xs text-slate-400 mb-2">
                                <span class="bg-slate-800 px-2.5 py-0.5 rounded-md text-slate-300 font-medium">
                                    {{ $product->subcategory->name ?? 'عام' }}
                                </span>

                                <a href="{{ route('customer.product.show', $product->id) }}#reviews" title="عرض التقييمات والمراجعات" class="inline-flex items-center gap-1 text-xs text-slate-300 hover:text-accent-gold transition">
                                    <div class="flex items-center gap-0.5 text-accent-gold text-[10px]">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <=$lFullStars)
                                            <i class="fa-solid fa-star text-accent-gold"></i>
                                            @elseif ($i == $lFullStars + 1 && $lHasHalf)
                                            <i class="fa-solid fa-star-half-stroke text-accent-gold"></i>
                                            @else
                                            <i class="fa-regular fa-star text-slate-600"></i>
                                            @endif
                                            @endfor
                                    </div>
                                    <span class="font-bold text-slate-300 text-[10px]">({{ number_format($lAvgRate, 1) }})</span>
                                </a>
                            </div>

                            <h3 class="font-bold text-white text-base line-clamp-1 hover:text-brand-400 transition my-2">
                                <a href="{{ route('customer.product.show', $product->id) }}">{{ $product->name }}</a>
                            </h3>

                            @if($product->store)
                            <div class="mt-2">
                                <a href="{{ route('customer.stores.show', $product->store->id) }}" class="inline-flex items-center gap-1.5 bg-slate-800/60 hover:bg-slate-800 border border-slate-700/50 hover:border-brand-500/40 px-2.5 py-1 rounded-full text-xs transition group/store">
                                    <i class="fa-solid fa-store text-brand-400 text-[11px] group-hover/store:scale-110 transition-transform"></i>
                                    <span class="text-slate-400 text-[11px]">البائع:</span>
                                    <span class="text-brand-400 font-semibold group-hover/store:text-brand-300 text-[11px]">{{ $product->store->name }}</span>
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

                            <form action="{{ route('customer.cart.add') }}" method="POST" class="inline" @guest onsubmit="event.preventDefault(); showToast('يرجى تسجيل الدخول لإضافة المنتجات إلى السلة', 'warning'); openModal(); return false;" @endguest>
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
                @endforeach
            </div>
        </section>

        <!-- FEATURED VENDOR SHOWCASE (بائعون مميزون) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
            <div class="flex items-end justify-between border-b border-slate-800 pb-4">
                <div>
                    <span class="text-xs font-bold text-brand-400 mb-1 block">
                        <i class="fa-solid fa-store text-accent-gold"></i> متاجر معتمدة
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">بائعون مميزون</h2>
                </div>
                <a href="{{ route('customer.stores.index') }}" class="text-xs font-bold text-brand-400 hover:text-brand-300 flex items-center gap-1">
                    عرض جميع المتاجر <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>

            <!-- Horizontal Carousel Slider -->
            <div class="relative">
                <div class="flex overflow-x-auto gap-6 scrollbar-none snap-x snap-mandatory pb-4 pt-1">
                    @if(isset($featuredStores) && count($featuredStores) > 0)
                    @foreach ($featuredStores as $store)
                    @php
                    $avgRate = round($store->ratings->avg('rate') ?? 5.0, 1);
                    $fullStars = floor($avgRate);
                    $hasHalf = ($avgRate - $fullStars) >= 0.5;
                    @endphp
                    <div class="snap-start shrink-0 w-72 sm:w-80 glass-card rounded-3xl p-6 flex flex-col justify-between items-center text-center space-y-4 group transition-all duration-300 hover:border-brand-500/50 hover:shadow-xl hover:shadow-brand-500/10 relative overflow-hidden">

                        <!-- Top Tag -->
                        <span class="absolute top-4 right-4 bg-amber-500/10 border border-amber-500/30 text-accent-gold text-[10px] font-black px-2.5 py-0.5 rounded-full flex items-center gap-1">
                            <i class="fa-solid fa-medal text-xs"></i> بائع مميز
                        </span>

                        <!-- Circular Profile Logo -->
                        <div class="relative w-24 h-24 rounded-full p-1 bg-gradient-to-tr from-brand-600 via-brand-500 to-accent-orange shadow-xl group-hover:scale-105 transition-transform duration-300 shrink-0 mt-2">
                            <img src="{{ $store->logo ? asset('storage/' . $store->logo) : 'https://images.unsplash.com/photo-1534723452862-4c874018d66d?auto=format&fit=crop&w=300&q=80' }}"
                                onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1534723452862-4c874018d66d?auto=format&fit=crop&w=300&q=80';"
                                alt="{{ $store->name }}"
                                class="w-full h-full object-cover rounded-full bg-slate-900" />
                        </div>

                        <!-- Store Info -->
                        <div class="space-y-1 w-full">
                            <h3 class="font-black text-white text-lg truncate hover:text-brand-400 transition">
                                <a href="{{ route('customer.stores.show', $store->id) }}">{{ $store->name }}</a>
                            </h3>
                            <p class="text-slate-400 text-xs truncate px-2">
                                {{ $store->slogan ?? 'متجر معتمد وموثوق على منصة مرساة' }}
                            </p>
                        </div>

                        <!-- 5-Star Rating Scale -->
                        <div class="flex items-center justify-center gap-1 text-accent-gold text-xs">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <=$fullStars)
                                <i class="fa-solid fa-star"></i>
                                @elseif ($i == $fullStars + 1 && $hasHalf)
                                <i class="fa-solid fa-star-half-stroke"></i>
                                @else
                                <i class="fa-regular fa-star text-slate-600"></i>
                                @endif
                                @endfor
                                <span class="font-bold text-slate-300 mr-1 text-xs">({{ number_format($avgRate, 1) }})</span>
                        </div>

                        <!-- Follow / Visit Store Button -->
                        <a href="{{ route('customer.stores.show', $store->id) }}"
                            class="w-full bg-brand-600 hover:bg-brand-500 text-white text-xs font-extrabold py-3 px-4 rounded-full shadow-lg shadow-brand-600/30 transition-all duration-300 flex items-center justify-center gap-2 hover:scale-105">
                            <i class="fa-solid fa-user-plus text-xs"></i>
                            <span>متابعة المتجر</span>
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </section>

        <!-- 10. BRANDS MARQUEE -->
        <section class="py-8 bg-slate-950/80 border-y border-slate-800/80 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 mb-4 text-center">
                <span class="text-xs text-slate-400 font-bold uppercase tracking-wider">علامات تجارية ومتاجر شريكة</span>
            </div>
            <div class="relative w-full overflow-hidden">
                <div class="animate-marquee items-center gap-12 sm:gap-16 opacity-60 grayscale hover:grayscale-0 transition duration-500">
                    <img alt="Microsoft" src="{{ asset('assets2/images/Popular Brands/microsoft.png') }}" class="h-8 object-contain" />
                    <img alt="Adidas" src="https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg" class="h-8 object-contain filter invert" />
                    <img alt="Samsung" src="{{ asset('assets2/images/Popular Brands/samsung.png') }}" class="h-8 object-contain" />
                    <img alt="Nike" src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" class="h-8 object-contain filter invert" />
                    <img alt="Puma" src="{{ asset('assets2/images/Popular Brands/puma.png') }}" class="h-8 object-contain" />
                    <img alt="HP" src="{{ asset('assets2/images/Popular Brands/hp.svg') }}" class="h-8 object-contain" />
                    <img alt="Zara" src="{{ asset('assets2/images/Popular Brands/zara.png') }}" class="h-8 object-contain filter invert" />
                    <!-- Marquee Loop Duplicate -->
                    <img alt="Microsoft" src="{{ asset('assets2/images/Popular Brands/microsoft.png') }}" class="h-8 object-contain" />
                    <img alt="Adidas" src="https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg" class="h-8 object-contain filter invert" />
                    <img alt="Samsung" src="{{ asset('assets2/images/Popular Brands/samsung.png') }}" class="h-8 object-contain" />
                    <img alt="Nike" src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" class="h-8 object-contain filter invert" />
                </div>
            </div>
        </section>

        <!-- 11. ABOUT US SECTION (من نحن - منصة مرساة Store) -->
        <section id="howus" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">
            <div class="glass-card rounded-3xl p-8 sm:p-12 relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-900/90 to-brand-950/80 border border-slate-800 shadow-2xl flex flex-col md:flex-row items-center gap-10">

                <!-- Glowing Background Accents -->
                <div class="absolute -right-20 -top-20 w-80 h-80 bg-brand-500/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-brand-600/10 rounded-full blur-3xl pointer-events-none"></div>

                <!-- Professional 3D Graphic Image -->
                <div class="w-full md:w-5/12 flex justify-center relative z-10">
                    <div class="relative group w-full">
                        <div class="absolute -inset-1 bg-gradient-to-r from-brand-600 to-brand-400 rounded-3xl blur opacity-30 group-hover:opacity-60 transition duration-500"></div>
                        <img src="https://images.unsplash.com/photo-1556742049-0a67daf40953?auto=format&fit=crop&w=1000&q=80"
                            alt="منصة مرساة Store"
                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=1000&q=80';"
                            class="relative rounded-2xl shadow-2xl w-full max-h-80 object-cover border border-slate-700/60 transform group-hover:scale-[1.02] transition duration-500" />
                        <div class="absolute -bottom-4 -left-4 bg-slate-950/90 border border-slate-700 backdrop-blur-md px-4 py-2.5 rounded-2xl shadow-xl flex items-center gap-2">
                            <i class="fa-solid fa-shield-halved text-emerald-400 text-base"></i>
                            <span class="text-xs font-bold text-white">منصة تجارة إلكترونية موثوقة 100%</span>
                        </div>
                    </div>
                </div>

                <!-- Professional Store Overview & Metrics -->
                <div class="w-full md:w-7/12 space-y-5 text-center md:text-right relative z-10">
                    <div class="inline-flex items-center gap-2 bg-brand-500/10 border border-brand-500/30 text-brand-400 text-xs font-extrabold px-3.5 py-1.5 rounded-full">
                        <i class="fa-solid fa-building"></i> عن منصة مرساة Store
                    </div>

                    <h2 class="text-3xl sm:text-4xl font-black text-white tracking-tight leading-tight">
                        الوجهة الرقمية الأولى للتسوق المتعدد المتاجر والبيع المباشر
                    </h2>

                    <p class="text-slate-300 text-sm leading-relaxed max-w-2xl font-medium">
                        تعتبر منصة <strong class="text-white">مرساة (MARSA STORE)</strong> بيئة تجارية رقمية متكاملة تهدف إلى الربط بين التجار المعتمدين والمشترين، وتوفير منتجات أصلية متنوعة مع تجربة تسوق مضمونة وسلسة تشمل الشحن السريع، وتعدد طرق الدفع، وتأمين وحماية كلي للبيانات.
                    </p>

                    <!-- Key Feature Badges -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2 text-xs">
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-2xl text-center">
                            <i class="fa-solid fa-store text-brand-400 text-base block mb-1"></i>
                            <span class="font-bold text-white block">+100</span>
                            <span class="text-[10px] text-slate-400">متجر موثق</span>
                        </div>
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-2xl text-center">
                            <i class="fa-solid fa-box text-emerald-400 text-base block mb-1"></i>
                            <span class="font-bold text-white block">+5,000</span>
                            <span class="text-[10px] text-slate-400">منتج أصلي</span>
                        </div>
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-2xl text-center">
                            <i class="fa-solid fa-truck-fast text-accent-gold text-base block mb-1"></i>
                            <span class="font-bold text-white block">توصيل سريع</span>
                            <span class="text-[10px] text-slate-400">كافة المناطق</span>
                        </div>
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-2xl text-center">
                            <i class="fa-solid fa-headset text-rose-400 text-base block mb-1"></i>
                            <span class="font-bold text-white block">دعم 24/7</span>
                            <span class="text-[10px] text-slate-400">خدمة متميزة</span>
                        </div>
                    </div>

                    <!-- Action Buttons & Social -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 pt-3">
                        <a href="{{ route('customer.stores.index') }}" class="bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-black text-xs px-6 py-3 rounded-full shadow-lg shadow-brand-600/30 transition">
                            استكشف المتاجر المعتمدة <i class="fa-solid fa-arrow-left ms-1.5"></i>
                        </a>
                        <a href="{{ route('vendor.register') }}" class="bg-slate-950 hover:bg-slate-800 text-slate-200 border border-slate-800 font-bold text-xs px-6 py-3 rounded-full transition">
                            انضم كبائع جديد <i class="fa-solid fa-store ms-1.5 text-brand-400"></i>
                        </a>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- 12. MODERN FOOTER -->
    <footer class="bg-slate-950 text-slate-400 border-t border-slate-800 text-xs">
        <!-- Newsletter Top Section -->
        <div class="border-b border-slate-800/80 py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                    <div class="text-center lg:text-right space-y-1">
                        <h3 class="text-lg font-bold text-white">اشترك في النشرة الإخبارية لمرساة</h3>
                        <p class="text-slate-400">احصل على أحدث التخفيضات والعروض الحصرية مباشرة إلى بريدك.</p>
                    </div>
                    <form action="#" method="get" class="w-full lg:w-auto flex items-center gap-2 max-w-md">
                        <input type="email" placeholder="أدخل البريد الإلكتروني..." required
                            class="w-full bg-slate-900 border border-slate-700 text-white rounded-full px-5 py-3 text-xs outline-none focus:border-brand-500" />
                        <button type="submit" class="bg-brand-600 hover:bg-brand-500 text-white font-bold px-6 py-3 rounded-full shrink-0 transition shadow-lg shadow-brand-600/30">
                            اشتراك
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Links Grid -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="space-y-4">
                <a href="{{ route('customer.main-page') }}" class="flex items-center gap-2">
                    <img src="{{ asset('assets2/images/logo/logo.svg') }}" alt="Marsa Logo" class="h-8 w-auto" />
                    <span class="text-xl font-black text-white">مرساة</span>
                </a>
                <p class="text-slate-400 leading-relaxed">
                    منصتك الآمنة والموثوقة للتسوق الإلكتروني والشراء المباشر مع أحدث المتاجر وأعلى معايير الحماية.
                </p>
                <div class="text-slate-300 space-y-1">
                    <p><i class="fa-solid fa-phone text-brand-400 me-2"></i> +970 59 5570612</p>
                    <p><i class="fa-solid fa-envelope text-brand-400 me-2"></i> support@shopgrids.com</p>
                </div>
            </div>

            <div class="space-y-3">
                <h4 class="text-sm font-bold text-white uppercase tracking-wider">روابط سريعة</h4>
                <ul class="space-y-2">
                    <li><a href="#howus" class="hover:text-white transition">من نحن</a></li>
                    <li><a href="{{ route('customer.stores.index') }}" class="hover:text-white transition">المتاجر المعتمدة</a></li>
                    <li><a href="{{ route('customer.contact') }}" class="hover:text-white transition">مركز التواصل والدعم</a></li>
                    <li><a href="{{ route('customer.faq') }}" class="hover:text-white transition">الأسئلة الشائعة</a></li>
                </ul>
            </div>

            <div class="space-y-3">
                <h4 class="text-sm font-bold text-white uppercase tracking-wider">أقسام متجر مرساة</h4>
                <ul class="space-y-2">
                    @foreach ($categories->take(5) as $cat)
                    <li>
                        <a href="{{ route('customer.category_products.index', $cat->id) }}" class="hover:text-white transition">
                            {{ $cat->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="space-y-3">
                <h4 class="text-sm font-bold text-white uppercase tracking-wider">تطبيقاتنا والمدفوعات</h4>
                <p class="text-slate-400">تابع مشترياتك وسلّتك من أي مكان.</p>
                <div class="flex flex-col gap-2 pt-2">
                    <div class="flex items-center gap-3 bg-slate-900 border border-slate-800 p-2.5 rounded-xl">
                        <i class="fa-brands fa-apple text-2xl text-white"></i>
                        <div>
                            <span class="text-[10px] text-slate-500 block">قريباً على</span>
                            <span class="font-bold text-white text-xs">App Store</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 bg-slate-900 border border-slate-800 p-2.5 rounded-xl">
                        <i class="fa-brands fa-google-play text-2xl text-emerald-400"></i>
                        <div>
                            <span class="text-[10px] text-slate-500 block">قريباً على</span>
                            <span class="font-bold text-white text-xs">Google Play</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Bar -->
        <div class="border-t border-slate-900 py-6 bg-slate-950">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p>© {{ date('Y') }} جميع الحقوق محفوظة - تم التطوير بواسطة <span class="text-brand-400 font-bold">WIC std</span></p>
                <div class="flex items-center gap-4 text-slate-400 text-base">
                    <i class="fa-brands fa-cc-visa hover:text-white transition"></i>
                    <i class="fa-brands fa-cc-mastercard hover:text-white transition"></i>
                    <i class="fa-brands fa-cc-paypal hover:text-white transition"></i>
                </div>
            </div>
        </div>
    </footer>

    <!-- 13. CART FLYOUT DRAWER -->
    <div id="cart-drawer-overlay" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-[100] hidden transition-opacity duration-300 opacity-0">
        <div id="cart-drawer" class="fixed inset-y-0 left-0 w-full sm:w-96 bg-slate-900 border-r border-slate-800 shadow-2xl flex flex-col justify-between transform -translate-x-full transition-transform duration-300 ease-in-out">
            <!-- Drawer Header -->
            <div class="p-5 border-b border-slate-800 flex items-center justify-between bg-slate-950">
                <h3 class="font-bold text-white text-base flex items-center gap-2">
                    <i class="fa-solid fa-cart-shopping text-brand-500"></i> سلة المشتريات
                </h3>
                <button id="close-cart-btn" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white flex items-center justify-center transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Drawer Items Body -->
            <div class="p-5 flex-1 overflow-y-auto space-y-4">
                @php $hasItems = false; @endphp
                @foreach ($carts as $cart)
                @foreach ($cart->items as $item)
                @php
                $hasItems = true;
                $pImg = $item->product?->images()->where('is_main', true)->first();
                @endphp
                <div class="flex items-center gap-3 p-3 bg-slate-800/60 rounded-2xl border border-slate-700/60">
                    <img src="{{ $pImg ? asset('storage/' . $pImg->image_path) : asset('images/no-image.png') }}"
                        alt="{{ $item->name }}" class="w-14 h-14 object-cover rounded-xl bg-slate-900 shrink-0" />
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-white text-xs truncate">{{ $item->name }}</h4>
                        <div class="text-emerald-400 font-extrabold text-xs mt-1">
                            {{ number_format($item->price, 2) }} ₪
                        </div>
                    </div>
                    <form action="{{ route('customer.cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-8 h-8 rounded-full bg-rose-500/10 hover:bg-rose-500 text-rose-400 hover:text-white flex items-center justify-center transition">
                            <i class="fa-solid fa-trash-can text-xs"></i>
                        </button>
                    </form>
                </div>
                @endforeach
                @endforeach

                @if(!$hasItems)
                <div class="py-16 text-center space-y-3 text-slate-400">
                    <i class="fa-solid fa-cart-flatbed text-4xl text-slate-600 block"></i>
                    <p class="text-xs">السلة فارغة حالياً</p>
                </div>
                @endif
            </div>

            <!-- Drawer Footer -->
            <div class="p-5 border-t border-slate-800 bg-slate-950 space-y-3">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-slate-400 font-semibold">الإجمالي:</span>
                    <span class="text-lg font-black text-emerald-400">{{ number_format($totalPrice, 2) }} ₪</span>
                </div>
                <a href="{{ route('customer.cart.index') }}" class="block w-full text-center bg-brand-600 hover:bg-brand-500 text-white font-bold py-3.5 rounded-full shadow-lg shadow-brand-600/30 transition text-xs">
                    عرض السلة وتأكيد الشراء
                </a>
            </div>
        </div>
    </div>

    <!-- WISHLIST FLYOUT DRAWER (Off-Canvas) -->
    <div id="wishlist-drawer-overlay" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-[100] hidden transition-opacity duration-300 opacity-0">
        <div id="wishlist-drawer" class="fixed inset-y-0 left-0 w-full sm:w-96 bg-slate-900 border-r border-slate-800 shadow-2xl flex flex-col justify-between transform -translate-x-full transition-transform duration-300 ease-in-out">
            <!-- Drawer Header -->
            <div class="p-5 border-b border-slate-800 flex items-center justify-between bg-slate-950">
                <h3 class="font-bold text-white text-base flex items-center gap-2">
                    <i class="fa-solid fa-heart text-rose-500"></i> قائمة الرغبات
                </h3>
                <button id="close-wishlist-btn" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white flex items-center justify-center transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Drawer Items Body -->
            <div id="wishlist-drawer-body" class="p-5 flex-1 overflow-y-auto space-y-4">
                @if(isset($wishlistProducts) && count($wishlistProducts) > 0)
                @foreach ($wishlistProducts as $wProduct)
                @php
                $wImg = $wProduct->images()->where('is_main', true)->first();
                @endphp
                <div id="wishlist-row-{{ $wProduct->id }}" class="flex items-center gap-3 p-3 bg-slate-800/60 rounded-2xl border border-slate-700/60 transition group hover:border-rose-500/40">
                    <img src="{{ $wImg ? asset('storage/' . $wImg->image_path) : asset('images/no-image.png') }}"
                        alt="{{ $wProduct->name }}" class="w-14 h-14 object-cover rounded-xl bg-slate-950 shrink-0" />
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-white text-xs truncate">
                            <a href="{{ route('customer.product.show', $wProduct->id) }}" class="hover:text-brand-400 transition">{{ $wProduct->name }}</a>
                        </h4>
                        <div class="text-[11px] text-slate-400 truncate">
                            البائع: <span class="text-slate-300 font-semibold">{{ $wProduct->store->name ?? 'متجر عام' }}</span>
                        </div>
                        <div class="text-emerald-400 font-extrabold text-xs mt-0.5">
                            {{ number_format($wProduct->price, 2) }} ₪
                        </div>
                    </div>

                    <!-- Action Buttons: Move to Cart & Delete -->
                    <div class="flex items-center gap-1.5 shrink-0">
                        <button type="button"
                            onclick="moveWishlistItemToCart({{ $wProduct->id }})"
                            title="نقل إلى السلة"
                            class="h-8 px-2.5 rounded-full bg-brand-600/20 hover:bg-brand-600 text-brand-400 hover:text-white border border-brand-500/40 flex items-center justify-center gap-1 text-[11px] font-bold transition">
                            <i class="fa-solid fa-cart-plus text-xs"></i>
                            <span class="hidden sm:inline">للسلة</span>
                        </button>
                        <button type="button"
                            onclick="removeWishlistItem({{ $wProduct->id }})"
                            title="حذف من الرغبات"
                            class="w-8 h-8 rounded-full bg-rose-500/10 hover:bg-rose-500 text-rose-400 hover:text-white flex items-center justify-center transition">
                            <i class="fa-solid fa-trash-can text-xs"></i>
                        </button>
                    </div>
                </div>
                @endforeach
                @else
                <div id="wishlist-empty-state" class="py-16 text-center space-y-4 text-slate-400">
                    <i class="fa-regular fa-heart text-4xl text-slate-600 block"></i>
                    <p class="text-xs font-semibold">قائمة الرغبات فارغة حالياً</p>
                    <button onclick="closeWishlist()" class="inline-block bg-brand-600 hover:bg-brand-500 text-white font-bold px-6 py-2.5 rounded-full text-xs transition">
                        متابعة التسوق
                    </button>
                </div>
                @endif
            </div>

            <!-- Drawer Footer -->
            <div class="p-5 border-t border-slate-800 bg-slate-950 text-center">
                <button onclick="closeWishlist()" class="w-full bg-slate-800 hover:bg-slate-700 text-white font-bold py-3 rounded-full text-xs transition">
                    إغلاق قائمة الرغبات
                </button>
            </div>
        </div>
    </div>

    <!-- 14. LOGIN & REGISTER MODALS -->
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
                <div class="relative text-center my-4">
                    <span class="bg-slate-900 px-3 text-slate-500 text-[11px] relative z-10">أو عبر</span>
                    <hr class="border-slate-800 absolute top-1/2 left-0 right-0 z-0">
                </div>
                <a href="{{ url('/auth/google') }}" class="w-full bg-slate-800 hover:bg-slate-700 text-slate-200 font-semibold py-3 rounded-xl flex items-center justify-center gap-2 border border-slate-700 transition">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-4 h-4" />
                    تسجيل الدخول عبر Google
                </a>
            </form>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true
            });

            // Notification Dropdown
            const notifBtn = document.getElementById('notifDropdownBtn');
            const notifMenu = document.getElementById('notifDropdownMenu');
            if (notifBtn && notifMenu) {
                notifBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    notifMenu.classList.toggle('hidden');
                });
            }

            // User Menu Dropdown
            const userBtn = document.getElementById('userMenuBtn');
            const userMenu = document.getElementById('userMenuDropdown');
            if (userBtn && userMenu) {
                userBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    userMenu.classList.toggle('hidden');
                });
            }

            document.addEventListener('click', function() {
                if (notifMenu) notifMenu.classList.add('hidden');
                if (userMenu) userMenu.classList.add('hidden');
            });

            // Cart Drawer Controls
            const cartDrawerOverlay = document.getElementById('cart-drawer-overlay');
            const cartDrawer = document.getElementById('cart-drawer');
            const openCartBtn = document.getElementById('open-cart-btn');
            const closeCartBtn = document.getElementById('close-cart-btn');

            function openCart() {
                cartDrawerOverlay.classList.remove('hidden');
                setTimeout(() => {
                    cartDrawerOverlay.classList.remove('opacity-0');
                    cartDrawer.classList.remove('-translate-x-full');
                }, 10);
            }

            function closeCart() {
                cartDrawerOverlay.classList.add('opacity-0');
                cartDrawer.classList.add('-translate-x-full');
                setTimeout(() => {
                    cartDrawerOverlay.classList.add('hidden');
                }, 300);
            }

            if (openCartBtn) openCartBtn.addEventListener('click', openCart);
            if (closeCartBtn) closeCartBtn.addEventListener('click', closeCart);
            if (cartDrawerOverlay) {
                cartDrawerOverlay.addEventListener('click', function(e) {
                    if (e.target === cartDrawerOverlay) closeCart();
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

                $input.on('keyup', triggerSearch);
                if ($categorySelect.length) {
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

            // Flash Sale Countdown Timer Script
            function startFlashSaleTimer() {
                const timerElement = document.getElementById('flash-sale-countdown');
                if (!timerElement) return;

                const now = new Date();
                const endOfDay = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 23, 59, 59).getTime();

                function updateTimer() {
                    const currentTime = new Date().getTime();
                    const diff = endOfDay - currentTime;

                    if (diff <= 0) {
                        timerElement.textContent = "00:00:00";
                        return;
                    }

                    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                    timerElement.textContent =
                        String(hours).padStart(2, '0') + ':' +
                        String(minutes).padStart(2, '0') + ':' +
                        String(seconds).padStart(2, '0');
                }

                updateTimer();
                setInterval(updateTimer, 1000);
            }

            startFlashSaleTimer();
        });

        // Modals
        function openModal() {
            document.getElementById('customModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('customModal').classList.add('hidden');
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

        // Reactive Wishlist Toggle Function
        function toggleWishlist(btn, productId) {
            let $btn = $(btn);
            let $icon = $btn.find('i');
            let $text = $btn.find('.wishlist-text');

            $.ajax({
                url: "{{ route('customer.wishlist.toggle') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        if (response.is_wishlisted) {
                            $icon.removeClass('fa-regular text-slate-400').addClass('fa-solid fa-heart text-rose-500 scale-125');
                            if ($text.length) $text.text('في المفضلة');
                        } else {
                            $icon.removeClass('fa-solid text-rose-500').addClass('fa-regular fa-heart text-slate-400 scale-100');
                            if ($text.length) $text.text('أضف للمفضلة');
                        }
                        setTimeout(() => $icon.removeClass('scale-125'), 300);
                        if ($('#wishlist-count-badge').length) {
                            $('#wishlist-count-badge').text(response.wishlist_count);
                        }
                        showToast(response.message, 'success');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        showToast('يرجى تسجيل الدخول لإضافة المنتجات للرغبات', 'warning');
                        openModal();
                    } else {
                        showToast('حدث خطأ أثناء التحديث', 'error');
                    }
                }
            });
        }

        // Wishlist Drawer Control Script
        document.addEventListener('DOMContentLoaded', function() {
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
        });

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
                            if ($('#wishlist-drawer-body').children().length === 0) {
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

                        // Update Header Badges
                        if ($('#wishlist-count-badge').length) $('#wishlist-count-badge').text(response.wishlist_count);
                        if ($('#cart-count-badge').length) $('#cart-count-badge').text(response.cart_count);

                        // Sync card heart icons & text
                        let $cardBtns = $(`button[onclick*="toggleWishlist(this, ${productId})"]`);
                        $cardBtns.find('i').removeClass('fa-solid text-rose-500').addClass('fa-regular fa-heart text-slate-400');
                        $cardBtns.find('.wishlist-text').text('أضف للمفضلة');

                        showToast(response.message, 'success');
                    }
                },
                error: function(xhr) {
                    showToast('حدث خطأ أثناء نقل المنتج إلى السلة', 'error');
                }
            });
        }

        // Remove Item From Wishlist via Trash Bin Icon in Drawer
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
                            if ($('#wishlist-drawer-body').children().length === 0) {
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

                        // Update Header Wishlist Badge
                        if ($('#wishlist-count-badge').length) $('#wishlist-count-badge').text(response.wishlist_count);

                        // Sync card heart icons & text
                        let $cardBtns = $(`button[onclick*="toggleWishlist(this, ${productId})"]`);
                        $cardBtns.find('i').removeClass('fa-solid text-rose-500').addClass('fa-regular fa-heart text-slate-400');
                        $cardBtns.find('.wishlist-text').text('أضف للمفضلة');

                        showToast('تمت إزالة المنتج من قائمة الرغبات', 'info');
                    }
                }
            });
        }
    </script>
</body>

</html>