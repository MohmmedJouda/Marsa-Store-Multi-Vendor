<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="المتاجر المعتمدة - مرساة للتسوق الرقمي والبيع المباشر المضمون" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>المتاجر المعتمدة | مرساة Store</title>

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
                    <i class="fa-solid fa-store text-brand-400"></i>
                    جميع المتاجر موثوقة ومراجعة
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

                <!-- Logo & Mobile Menu Toggle -->
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

                    <!-- Cart Trigger Button -->
                    <button id="open-cart-btn" class="relative flex items-center gap-2.5 bg-brand-600/20 hover:bg-brand-600/30 text-brand-400 border border-brand-500/40 px-4 py-2.5 rounded-full transition group">
                        <i class="fa-solid fa-cart-shopping text-base group-hover:scale-110 transition-transform"></i>
                        <span class="text-xs font-bold hidden sm:inline-block">السلة</span>
                        <span id="cart-count-badge" class="bg-brand-500 text-white text-[11px] font-black px-2.5 py-0.5 rounded-full shadow">
                            {{ count($carts->flatMap->items) }}
                        </span>
                    </button>

                    @guest
                    <div class="flex items-center gap-2">
                        <button onclick="openModal()" class="bg-slate-800/90 hover:bg-slate-700 text-white text-xs font-bold px-4 py-2.5 rounded-full border border-slate-700 transition">
                            تسجيل دخول
                        </button>
                    </div>
                    @endguest

                    @auth
                    <!-- Auth User Menu -->
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
                                <p class="text-slate-400 text-[11px] truncate">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="{{ route('profile.show') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800 transition">
                                <i class="fa-solid fa-user-pen text-brand-400 w-4 text-center"></i> الملف الشخصي
                            </a>
                            <a href="{{ route('customer.orders.show') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800 transition">
                                <i class="fa-solid fa-box text-brand-400 w-4 text-center"></i> طلباتك ومشترواتك
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
                    <a href="{{ route('customer.stores.index') }}" class="text-brand-400 font-extrabold flex items-center gap-2 shrink-0 bg-brand-500/10 px-3.5 py-1.5 rounded-full border border-brand-500/30">
                        <i class="fa-solid fa-store text-accent-gold"></i> المتاجر المعتمدة
                    </a>
                    @foreach ($categories->take(6) as $cat)
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
                <span class="text-slate-200 font-bold">دليل المتاجر المعتمدة</span>
            </div>
            <span class="text-slate-400 font-medium">عدد المتاجر: <strong class="text-brand-400">{{ $stores->count() }}</strong></span>
        </div>
    </div>

    <!-- MAIN STORES CATALOG -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10 w-full">

        <!-- HEADER BANNER FOR STORES -->
        <section class="glass-card rounded-3xl p-8 sm:p-10 relative overflow-hidden bg-gradient-to-br from-brand-950 via-slate-900 to-slate-950 border border-slate-700/60 shadow-2xl" data-aos="fade-up">
            <div class="max-w-2xl space-y-4">
                <span class="inline-flex items-center gap-2 bg-accent-gold/10 border border-accent-gold/30 text-accent-gold text-xs font-bold px-3.5 py-1.5 rounded-full">
                    <i class="fa-solid fa-circle-check"></i> متاجر موثقة ومعتمدة
                </span>
                <h1 class="text-3xl sm:text-4xl font-black text-white leading-tight">
                    دليل المتاجر والبائعين المعتمدين في <span class="gradient-text">مرساة</span>
                </h1>
                <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                    تصفح كوكبة المتاجر المعتمدة، واطلع على منتجاتهم، تقييماتهم، ووسائل التواصل المباشر مع التجار.
                </p>
            </div>
        </section>

        <!-- STORE FILTER & SEARCH -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-slate-900/70 p-4 rounded-2xl border border-slate-800">
            <div class="relative w-full sm:w-80">
                <input type="text" id="store-search" placeholder="تصفية حسب اسم المتجر..."
                    class="w-full bg-slate-950 text-white placeholder-slate-400 text-xs rounded-full py-3 pr-10 pl-4 border border-slate-800 outline-none focus:border-brand-500" />
                <i class="fa-solid fa-filter absolute right-3.5 text-slate-400 text-xs top-3.5"></i>
            </div>
            <div class="text-xs text-slate-400 font-semibold">
                عرض جميع المتاجر النشطة ({{ $stores->count() }})
            </div>
        </div>

        <!-- STORES GRID -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up">
            @forelse ($stores as $store)
            @php
            $avgRate = number_format($store->storeRating()->avg('rate') ?? 0, 1);
            @endphp
            <div class="store-card glass-card rounded-3xl overflow-hidden p-6 flex flex-col justify-between space-y-6 group transition-all duration-300 relative bg-gradient-to-b from-slate-900/90 to-slate-950/90 border border-slate-800 hover:border-brand-500/50" data-name="{{ mb_strtolower($store->name) }}">
                <!-- Store Top Header -->
                <div class="flex items-start gap-4">
                    <div class="relative w-20 h-20 rounded-2xl overflow-hidden border-2 border-slate-700 bg-slate-900 shrink-0 shadow-lg group-hover:scale-105 transition duration-300">
                        <img src="{{ $store->logo ? asset('storage/' . $store->logo) : asset('img/store-logo.jpg') }}"
                            alt="{{ $store->name }}" class="w-full h-full object-cover" />
                    </div>

                    <div class="flex-1 min-w-0 space-y-1">
                        <div class="flex items-center justify-between gap-2">
                            <h3 class="font-black text-white text-lg truncate hover:text-brand-400 transition">
                                <a href="{{ route('customer.stores.show', $store->id) }}">{{ $store->name }}</a>
                            </h3>
                            <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-[10px] font-bold px-2.5 py-0.5 rounded-full shrink-0">
                                نشط
                            </span>
                        </div>

                        <p class="text-slate-400 text-xs truncate">
                            التاجر: <strong class="text-slate-200">{{ $store->user->name }}</strong>
                        </p>

                        @if($store->slogan)
                        <p class="text-slate-400 text-[11px] italic line-clamp-1">"{{ $store->slogan }}"</p>
                        @endif
                    </div>
                </div>

                <!-- Store Stats Row -->
                <div class="grid grid-cols-2 gap-3 p-3 bg-slate-950/70 rounded-2xl border border-slate-800/80 text-center text-xs">
                    <div>
                        <span class="text-slate-400 text-[10px] block mb-0.5">التقييم العام</span>
                        <span class="font-black text-accent-gold flex items-center justify-center gap-1">
                            <i class="fa-solid fa-star text-xs"></i> {{ $avgRate }} / 5
                        </span>
                    </div>
                    <div>
                        <span class="text-slate-400 text-[10px] block mb-0.5">التواصل</span>
                        <span class="font-bold text-emerald-400 flex items-center justify-center gap-1">
                            <i class="fa-brands fa-whatsapp text-xs"></i> {{ $store->phone ? 'متوفر' : 'غير محدد' }}
                        </span>
                    </div>
                </div>

                <!-- Store Card Footer Action -->
                <div class="pt-2 flex items-center gap-3">
                    <a href="{{ route('customer.stores.show', $store->id) }}"
                        class="w-full text-center bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-extrabold py-3 rounded-2xl shadow-lg shadow-brand-600/30 transition text-xs flex items-center justify-center gap-2">
                        <span>تصفح المتجر والمنتجات</span>
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full py-16 text-center text-slate-400 glass-card rounded-3xl space-y-3">
                <i class="fa-solid fa-store-slash text-4xl text-slate-600 block"></i>
                <p class="text-sm">لا توجد متاجر مضافة حالياً</p>
            </div>
            @endforelse
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-slate-400 border-t border-slate-800 text-xs mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p>© {{ date('Y') }} جميع الحقوق محفوظة - دليل المتاجر المعتمدة على <span class="text-brand-400 font-bold">مرساة</span></p>
            <div class="flex items-center gap-4 text-slate-400 text-base">
                <i class="fa-brands fa-cc-visa hover:text-white transition"></i>
                <i class="fa-brands fa-cc-mastercard hover:text-white transition"></i>
            </div>
        </div>
    </footer>

    <!-- CART FLYOUT DRAWER -->
    <div id="cart-drawer-overlay" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-[100] hidden transition-opacity duration-300 opacity-0">
        <div id="cart-drawer" class="fixed inset-y-0 left-0 w-full sm:w-96 bg-slate-900 border-r border-slate-800 shadow-2xl flex flex-col justify-between transform -translate-x-full transition-transform duration-300 ease-in-out">
            <div class="p-5 border-b border-slate-800 flex items-center justify-between bg-slate-950">
                <h3 class="font-bold text-white text-base flex items-center gap-2">
                    <i class="fa-solid fa-cart-shopping text-brand-500"></i> سلة المشتريات
                </h3>
                <button id="close-cart-btn" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

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

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true
            });

            // Store Live Client Search Filter
            $('#store-search').on('keyup', function() {
                let term = $(this).val().toLowerCase();
                $('.store-card').each(function() {
                    let name = $(this).data('name');
                    if (name.includes(term)) {
                        $(this).removeClass('hidden');
                    } else {
                        $(this).addClass('hidden');
                    }
                });
            });

            // Notifications Dropdown
            const notifBtn = document.getElementById('notifDropdownBtn');
            const notifMenu = document.getElementById('notifDropdownMenu');
            if (notifBtn && notifMenu) {
                notifBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    notifMenu.classList.toggle('hidden');
                });
            }

            // User Dropdown
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

            // Cart Drawer
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

            // AJAX Live Search
            $('#search-input').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: "{{ route('products.search') }}",
                        type: "GET",
                        data: {
                            query: query
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
                                                <a href="/products/${product.id}" class="bg-brand-600 text-white text-[11px] font-bold px-3 py-1.5 rounded-full">تفاصيل</a>
                                            </div>
                                        </li>`;
                                });
                            } else {
                                results = '<li class="p-4 text-center text-slate-400 text-xs">لا توجد نتائج</li>';
                            }
                            $('#search-results').html(results).removeClass('hidden');
                        }
                    });
                } else {
                    $('#search-results').addClass('hidden');
                }
            });
        });

        function openModal() {
            document.getElementById('customModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('customModal').classList.add('hidden');
        }
    </script>
</body>

</html>