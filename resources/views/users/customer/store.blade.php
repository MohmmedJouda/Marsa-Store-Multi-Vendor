<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="متجر {{ $store->name }} - مرساة للتسوق الرقمي والبيع المباشر" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>متجر {{ $store->name }} | مرساة Store</title>

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
                    متجر معتمد وموثق
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
    </header>

    <!-- BREADCRUMBS -->
    <div class="bg-slate-950/60 border-b border-slate-800/80 py-3 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <div class="flex items-center gap-2 text-slate-400">
                <a href="{{ route('customer.main-page') }}" class="hover:text-white transition flex items-center gap-1">
                    <i class="fa-solid fa-house text-brand-400"></i> الرئيسية
                </a>
                <span>/</span>
                <a href="{{ route('customer.stores.index') }}" class="hover:text-white transition">المتاجر</a>
                <span>/</span>
                <span class="text-slate-200 font-bold">{{ $store->name }}</span>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-12 w-full">

        <!-- STORE HERO PROFILE HEADER -->
        <section class="glass-card rounded-3xl p-6 sm:p-10 relative overflow-hidden bg-gradient-to-br from-slate-900 via-brand-950 to-slate-950 border border-slate-700/60 shadow-2xl" data-aos="fade-up">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-brand-500/15 via-transparent to-transparent pointer-events-none"></div>

            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                <!-- Store Info Header Left -->
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 text-center sm:text-right">
                    <div class="relative w-28 h-28 sm:w-36 sm:h-36 rounded-3xl overflow-hidden border-4 border-slate-800 shadow-2xl bg-slate-900 shrink-0">
                        <img src="{{ $store->logo ? asset('storage/' . $store->logo) : asset('img/store-logo.jpg') }}"
                            alt="{{ $store->name }}" class="w-full h-full object-cover" />
                        <span class="absolute bottom-2 left-2 bg-emerald-500 text-white text-[9px] font-black px-2 py-0.5 rounded-full shadow">
                            موثق
                        </span>
                    </div>

                    <div class="space-y-3">
                        <div class="flex flex-wrap items-center justify-center sm:justify-start gap-3">
                            <h1 class="text-2xl sm:text-4xl font-black text-white">{{ $store->name }}</h1>
                            <span class="bg-brand-500/15 border border-brand-500/30 text-brand-400 text-xs font-bold px-3 py-1 rounded-full">
                                متجر معتمد
                            </span>
                        </div>

                        <p class="text-slate-300 text-xs sm:text-sm font-medium">
                            المالك والمسؤول: <span class="text-accent-coral font-bold">{{ $store->user->name }}</span>
                        </p>

                        @if($store->slogan)
                        <p class="text-slate-400 text-xs italic bg-slate-900/60 px-3.5 py-1.5 rounded-xl inline-block border border-slate-800">
                            "{{ $store->slogan }}"
                        </p>
                        @endif

                        <!-- Rating Display & Form -->
                        <div class="flex items-center justify-center sm:justify-start gap-4 pt-1">
                            @php
                            $avgStoreRate = number_format($store->storeRating()->avg('rate') ?? 0, 1);
                            @endphp
                            <div class="flex items-center gap-1 text-accent-gold text-lg">
                                <i class="fa-solid fa-star"></i>
                                <span class="font-black text-white text-sm me-1">{{ $avgStoreRate }}</span>
                                <span class="text-slate-400 text-xs">(تقييم المتجر)</span>
                            </div>

                            <!-- Interactive Store Rating Form -->
                            <form action="{{ route('customer.store.rate', $store->id) }}" method="POST" id="rating-form" class="flex items-center gap-1 bg-slate-900/80 px-3 py-1 rounded-full border border-slate-800">
                                @csrf
                                <div class="flex flex-row-reverse gap-1 text-accent-gold cursor-pointer text-sm">
                                    @for($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="star{{$i}}" name="rate" value="{{$i}}" class="hidden" />
                                    <label for="star{{$i}}" title="{{$i}} نجوم" class="hover:scale-125 transition cursor-pointer">&#9733;</label>
                                    @endfor
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Action Controls Right -->
                <div class="flex flex-wrap items-center justify-center gap-3 shrink-0">
                    @if($store->phone)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $store->phone) }}" target="_blank"
                        class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs px-5 py-3 rounded-full flex items-center gap-2 shadow-lg shadow-emerald-600/30 transition hover:scale-105">
                        <i class="fa-brands fa-whatsapp text-base"></i> تواصل عبر الواتساب
                    </a>
                    @endif
                    <button onclick="toggleSellerDetails()"
                        class="bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-xs px-5 py-3 rounded-full border border-slate-700 flex items-center gap-2 transition">
                        <i class="fa-solid fa-circle-info text-brand-400"></i> تفاصيل التواصل
                    </button>
                </div>
            </div>

            <!-- Extra Info Drawer -->
            <div id="seller-extra-info" class="hidden mt-6 pt-6 border-t border-slate-800 text-xs text-slate-300 space-y-2 bg-slate-950/60 p-4 rounded-2xl">
                <p class="flex items-center gap-2">
                    <i class="fa-solid fa-phone text-emerald-400"></i>
                    <strong>الهاتف:</strong>
                    <span dir="ltr">{{ $store->phone }}</span>
                </p>
                <p class="flex items-center gap-2">
                    <i class="fa-solid fa-boxes-packing text-brand-400"></i>
                    <strong>إجمالي المنتجات المتاحة:</strong>
                    <span class="font-bold text-white">{{ $products->count() }} منتج</span>
                </p>
            </div>
        </section>

        <!-- STORE PRODUCTS SECTION -->
        <section class="space-y-6" data-aos="fade-up">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <div>
                    <span class="text-xs font-bold text-brand-400 mb-1 block">منتجات التاجر</span>
                    <h2 class="text-2xl font-black text-white">معروضات متجر {{ $store->name }}</h2>
                </div>
                <span class="text-xs text-slate-400 font-medium">عدد المنتجات: {{ $products->count() }}</span>
            </div>

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
                            $sAvgRate = round($averageRate > 0 ? $averageRate : 5.0, 1);
                            $sFullStars = floor($sAvgRate);
                            $sHasHalf = ($sAvgRate - $sFullStars) >= 0.5;
                            @endphp
                            <a href="{{ route('customer.product.show', $product->id) }}#reviews" title="عرض التقييمات والمراجعات" class="inline-flex items-center gap-1.5 text-xs text-slate-300 hover:text-accent-gold transition mt-1">
                                <div class="flex items-center gap-0.5 text-accent-gold text-[11px]">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <=$sFullStars)
                                        <i class="fa-solid fa-star text-accent-gold"></i>
                                        @elseif ($i == $sFullStars + 1 && $sHasHalf)
                                        <i class="fa-solid fa-star-half-stroke text-accent-gold"></i>
                                        @else
                                        <i class="fa-regular fa-star text-slate-600"></i>
                                        @endif
                                        @endfor
                                </div>
                                <span class="font-bold text-slate-300 text-[11px]">({{ number_format($sAvgRate, 1) }})</span>
                            </a>

                            <div class="text-xs text-slate-400 mt-1">
                                المبيعات: <span class="text-white font-bold">{{ $product->total_sales }}</span>
                            </div>
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
                    <p class="text-sm">لا توجد منتجات مضافة لهذا المتجر حالياً</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- STORE REVIEWS & COMMENTS SECTION -->
        <section class="glass-card rounded-3xl p-6 sm:p-8 space-y-6 bg-slate-900/70 border border-slate-800" data-aos="fade-up">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-comments text-brand-400"></i> آراء وتقييمات العملاء
                </h3>
                <span class="text-xs text-slate-400 font-semibold">{{ $store->comments->count() }} تعليق</span>
            </div>

            <!-- Comments List -->
            <div class="space-y-3 max-h-96 overflow-y-auto pr-1">
                @forelse($store->comments as $comment)
                <div class="p-4 bg-slate-950/80 rounded-2xl border border-slate-800 space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-white text-xs sm:text-sm flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-brand-600/30 text-brand-400 flex items-center justify-center text-[10px]">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            {{ $comment->user->name }}
                        </span>
                        @if($comment->rating)
                        <div class="flex items-center gap-1 text-accent-gold text-xs">
                            @for($i = 1; $i <= 5; $i++)
                                <span style="color: {{ $i <= $comment->rating->rate ? '#ffb703' : '#334155' }}">&#9733;</span>
                                @endfor
                        </div>
                        @endif
                    </div>
                    <p class="text-slate-300 text-xs leading-relaxed">{{ $comment->comment }}</p>
                </div>
                @empty
                <div class="py-8 text-center text-slate-500 text-xs">
                    لا توجد آراء سابقة، كن أول من يترك تعليقاً لهذا المتجر.
                </div>
                @endforelse
            </div>

            <!-- New Comment Input Form -->
            <form action="{{ route('customer.stores.comments.store', $store->id) }}" method="POST" class="pt-4 border-t border-slate-800 space-y-3">
                @csrf
                <textarea name="comment" required placeholder="أضف تجربتك أو رأيك في متجر {{ $store->name }}..." rows="3"
                    class="w-full bg-slate-950 border border-slate-800 text-white rounded-2xl p-4 text-xs outline-none focus:border-brand-500 resize-none"></textarea>
                <button type="submit" class="bg-brand-600 hover:bg-brand-500 text-white font-bold text-xs px-6 py-3 rounded-full transition shadow-lg shadow-brand-600/30">
                    إرسال التعليق
                </button>
            </form>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-slate-400 border-t border-slate-800 text-xs mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p>© {{ date('Y') }} جميع الحقوق محفوظة - متجر {{ $store->name }} على <span class="text-brand-400 font-bold">مرساة</span></p>
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

    <!-- LOGIN MODAL -->
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

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true
            });

            // Rating Form Auto-Submit
            document.querySelectorAll('#rating-form label').forEach(label => {
                label.addEventListener('click', function() {
                    const input = document.getElementById(this.getAttribute('for'));
                    if (input) {
                        input.checked = true;
                        document.getElementById('rating-form').submit();
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

            // Live Search
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

        function toggleSellerDetails() {
            const extra = document.getElementById('seller-extra-info');
            if (extra) extra.classList.toggle('hidden');
        }

        function openModal() {
            document.getElementById('customModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('customModal').classList.add('hidden');
        }
    </script>
</body>

</html>