<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="إدارة الملف الشخصي والإعدادات - مرساة" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>الملف الشخصي والإعدادات | مرساة Store</title>

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

    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    @livewireStyles

    <style>
        body {
            font-family: 'Tajawal', 'Cairo', sans-serif;
            background-color: #0b192c;
            color: #f1f5f9;
        }

        .glass-header {
            background: rgba(11, 25, 44, 0.88);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.65);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .gradient-text {
            background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 50%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="bg-[#0b192c] text-slate-100 min-h-screen flex flex-col antialiased selection:bg-brand-500 selection:text-white">

    <!-- 1. STICKY GLASSMORPHIC NAVIGATION HEADER -->
    <nav class="sticky top-0 z-50 glass-header shadow-2xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Logo & Brand -->
                <div class="flex items-center gap-6">
                    <a href="{{ route('customer.main-page') }}" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-brand-600 to-brand-400 flex items-center justify-center p-2 shadow-lg shadow-brand-500/30 group-hover:scale-105 transition duration-300">
                            <img src="{{ asset('img/logo.svg') }}" alt="Marsa Logo" class="w-full h-full object-contain filter brightness-200" />
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xl font-black gradient-text">مرساة</span>
                            <span class="text-[9px] text-slate-400 font-bold tracking-widest">MARSA STORE</span>
                        </div>
                    </a>

                    <!-- Nav Links -->
                    <div class="hidden md:flex items-center gap-4 text-xs font-bold text-slate-300">
                        <a href="{{ route('customer.main-page') }}" class="hover:text-brand-400 transition flex items-center gap-1.5">
                            <i class="fa-solid fa-house text-slate-400"></i> الرئيسية
                        </a>
                        <span class="text-slate-700">/</span>
                        <a href="{{ route('customer.products.index') }}" class="hover:text-brand-400 transition flex items-center gap-1.5">
                            <i class="fa-solid fa-shop text-slate-400"></i> المنتجات
                        </a>
                        <span class="text-slate-700">/</span>
                        <span class="text-brand-400">إدارة الملف الشخصي</span>
                    </div>
                </div>

                <!-- User Profile & Quick Actions -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('customer.main-page') }}" class="bg-slate-900 hover:bg-slate-800 text-slate-200 border border-slate-800 text-xs font-bold px-4 py-2 rounded-full transition flex items-center gap-2">
                        <i class="fa-solid fa-arrow-right text-brand-400"></i> العودة للمتجر
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 border border-rose-500/30 text-xs font-bold px-4 py-2 rounded-full transition flex items-center gap-1.5">
                            <i class="fa-solid fa-right-from-bracket"></i> خروج
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </nav>

    <!-- 2. MAIN CONTENT BODY -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full space-y-12" data-aos="fade-up">

        <!-- TOP HERO PROFILE BANNER CARD (FULL WIDTH) -->
        <div class="w-full glass-card rounded-3xl p-8 bg-gradient-to-r from-slate-900/90 via-slate-900/70 to-slate-950/90 border border-slate-800 shadow-2xl relative overflow-hidden">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-brand-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="flex flex-col md:flex-row items-center justify-between gap-8 relative z-10">

                <!-- User Details & Avatar -->
                <div class="flex flex-col md:flex-row items-center gap-6 text-center md:text-right">

                    <!-- Avatar Uploader -->
                    @if (Auth()->user()->role !== 'vendor')
                    <form action="{{ route('user.update-photo') }}" method="POST" enctype="multipart/form-data" class="relative group">
                        @csrf
                        <label class="relative cursor-pointer block">
                            <img src="{{ auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : asset('img/default-avatar.png') }}"
                                class="w-28 h-28 rounded-full object-cover border-4 border-brand-500/40 group-hover:border-brand-400 shadow-2xl transition duration-300 group-hover:scale-105" />
                            <input type="file" name="photo" class="hidden" accept="image/*" onchange="this.form.submit()" />
                            <div class="absolute inset-0 flex items-center justify-center bg-slate-950/75 rounded-full opacity-0 group-hover:opacity-100 transition duration-300">
                                <i class="fa-solid fa-camera text-white text-lg"></i>
                            </div>
                        </label>
                    </form>
                    @else
                    <div class="flex items-center gap-4">
                        <!-- User Avatar -->
                        <form action="{{ route('user.update-photo') }}" method="POST" enctype="multipart/form-data" class="relative group">
                            @csrf
                            <label class="relative cursor-pointer block" title="تحديث صورة الحساب">
                                <img src="{{ auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : asset('img/default-avatar.png') }}"
                                    class="w-24 h-24 rounded-full object-cover border-4 border-brand-500/40 group-hover:border-brand-400 shadow-2xl transition duration-300" />
                                <input type="file" name="photo" class="hidden" accept="image/*" onchange="this.form.submit()" />
                                <div class="absolute inset-0 flex items-center justify-center bg-slate-950/75 rounded-full opacity-0 group-hover:opacity-100 transition">
                                    <i class="fa-solid fa-camera text-white text-sm"></i>
                                </div>
                            </label>
                        </form>

                        <!-- Store Logo -->
                        <form action="{{ route('vendor.store.update-photo') }}" method="POST" enctype="multipart/form-data" class="relative group">
                            @csrf
                            <label class="relative cursor-pointer block" title="تحديث صورة المتجر">
                                <img src="{{ auth()->user()->store?->logo ? asset('storage/' . auth()->user()->store->logo) : asset('img/store-logo.jpg') }}"
                                    class="w-24 h-24 rounded-2xl object-cover border-4 border-slate-700 group-hover:border-brand-400 shadow-2xl transition duration-300" />
                                <input type="file" name="store_photo" class="hidden" accept="image/*" onchange="this.form.submit()" />
                                <div class="absolute inset-0 flex items-center justify-center bg-slate-950/75 rounded-2xl opacity-0 group-hover:opacity-100 transition">
                                    <i class="fa-solid fa-store text-white text-sm"></i>
                                </div>
                            </label>
                        </form>
                    </div>
                    @endif

                    <div class="space-y-1.5">
                        <div class="flex items-center justify-center md:justify-start gap-3">
                            <h1 class="text-2xl font-black text-white tracking-tight">{{ auth()->user()->name }}</h1>
                            <span class="bg-brand-500/10 border border-brand-500/30 text-brand-400 text-[11px] font-bold px-3 py-0.5 rounded-full">
                                {{ auth()->user()->role === 'vendor' ? 'بائع موثق' : 'مشتري معتمد' }}
                            </span>
                        </div>
                        <p class="text-slate-400 text-xs flex items-center justify-center md:justify-start gap-2">
                            <i class="fa-solid fa-envelope text-slate-500"></i> {{ auth()->user()->email }}
                        </p>
                        @if(auth()->user()->store)
                        <p class="text-emerald-400 text-xs font-bold flex items-center justify-center md:justify-start gap-1.5">
                            <i class="fa-solid fa-shop"></i> متجر: {{ auth()->user()->store->name }}
                        </p>
                        @endif
                    </div>
                </div>

                <!-- Quick Status Badge -->
                <div class="flex items-center gap-3 bg-slate-950/80 p-4 rounded-2xl border border-slate-800 text-center">
                    <div>
                        <span class="text-[10px] text-slate-400 block font-semibold">حالة الحساب</span>
                        <span class="text-xs font-bold text-emerald-400 flex items-center gap-1">
                            <i class="fa-solid fa-circle-check"></i> نشط وآمن
                        </span>
                    </div>
                </div>

            </div>
        </div>

        <!-- 3. FULL WIDTH STACKED SECTIONS -->
        <div class="space-y-10 w-full">

            <!-- SECTION 1: PROFILE INFORMATION (FULL WIDTH) -->
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            <div class="w-full">
                @livewire('profile.update-profile-information-form')
            </div>

            <x-section-border />
            @endif

            <!-- SECTION 2: PASSWORD CHANGE (FULL WIDTH) -->
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="w-full">
                @livewire('profile.update-password-form')
            </div>

            <x-section-border />
            @endif

            <!-- SECTION 3: VENDOR SLOGAN (FULL WIDTH - IF VENDOR) -->
            @if (Auth::user()->role === 'vendor' && auth()->user()->store)
            <div class="w-full space-y-4">
                <div class="px-1 space-y-1">
                    <h3 class="text-xl font-black text-white flex items-center gap-2">
                        <i class="fa-solid fa-quote-right text-brand-400"></i> العبارة الدعائية للمتجر (Slogan)
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        قم بتحديد أو تحديث الهوية والعبارة التسويقية الخاصة بمتجرك التي تظهر للعملاء.
                    </p>
                </div>

                <div class="w-full p-6 sm:p-8 bg-slate-950/80 border border-slate-800 rounded-3xl shadow-2xl">
                    <form method="POST" action="{{ route('vendor.store.updateSlogan', auth()->user()->store->id) }}" class="space-y-4">
                        @csrf
                        <div class="space-y-1.5">
                            <label class="text-xs text-slate-300 font-semibold">العبارة التسويقية للمتجر</label>
                            <input type="text" name="slogan" value="{{ auth()->user()->store->slogan }}" placeholder="مثال: الجودة والتميز أولاً"
                                class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3.5 outline-none focus:border-brand-500 text-xs transition" />
                        </div>
                        <button type="submit" class="bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-bold text-xs px-6 py-3 rounded-full transition shadow-lg shadow-brand-600/30">
                            تحديث العبارة الدعائية
                        </button>
                        @if (session()->has('success')) <span class="text-emerald-400 text-xs block font-bold mt-2">{{ session('success') }}</span> @endif
                    </form>
                </div>
            </div>

            <x-section-border />
            @endif

            <!-- SECTION 4: TWO-FACTOR AUTHENTICATION (FULL WIDTH) -->
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <div class="w-full">
                @livewire('profile.two-factor-authentication-form')
            </div>

            <x-section-border />
            @endif

            <!-- SECTION 5: BROWSER SESSIONS (FULL WIDTH) -->
            <div class="w-full">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            <!-- SECTION 6: DELETE ACCOUNT DANGER ZONE (FULL WIDTH) -->
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <x-section-border />

            <div class="w-full">
                @livewire('profile.delete-user-form')
            </div>
            @endif

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-slate-400 border-t border-slate-800 text-xs mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex items-center justify-between">
            <p>© {{ date('Y') }} جميع الحقوق محفوظة - مرساة Store</p>
            <div class="flex items-center gap-4 text-slate-500">
                <a href="{{ route('customer.main-page') }}" class="hover:text-slate-300">الرئيسية</a>
                <a href="{{ route('customer.faq') }}" class="hover:text-slate-300">الأسئلة الشائعة</a>
                <a href="{{ route('customer.contact') }}" class="hover:text-slate-300">اتصل بنا</a>
            </div>
        </div>
    </footer>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>

</html>