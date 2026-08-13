<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="تسجيل الدخول وإنشاء حساب - منصة مرساة" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>تسجيل الدخول والدخول | مرساة Store</title>

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

    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Tajawal', 'Cairo', sans-serif;
            background-color: #0b192c;
            color: #f1f5f9;
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
    </style>
</head>

<body class="bg-[#0b192c] text-slate-100 min-h-screen flex flex-col justify-between antialiased selection:bg-brand-500 selection:text-white">

    <!-- MINIMAL GLOBAL HEADER COMPONENT -->
    <x-global-header variant="minimal" />

    <!-- Main Container -->
    <div class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-md my-8 space-y-6 relative z-10" data-aos="fade-up">

        <!-- Logo Header -->
        <div class="text-center space-y-2">
            <a href="{{ route('guest.main-page') }}" class="inline-flex items-center gap-3 group">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-brand-600 to-brand-400 flex items-center justify-center p-2.5 shadow-xl shadow-brand-500/30 group-hover:scale-105 transition duration-300">
                    <img src="{{ asset('img/logo.svg') }}" alt="Marsa Logo" class="w-full h-full object-contain filter brightness-200" />
                </div>
                <div class="flex flex-col text-right">
                    <span class="text-3xl font-black gradient-text tracking-tight leading-none">مرساة</span>
                    <span class="text-[11px] text-slate-400 font-semibold tracking-wider">MARSA STORE</span>
                </div>
            </a>
            <p class="text-xs text-slate-400 pt-1">بوابتك الرقمية للتسوق والبيع المباشر المضمون</p>
        </div>

        <!-- Errors Alert -->
        @if ($errors->any())
        <div class="p-4 bg-rose-500/10 border border-rose-500/30 rounded-2xl text-rose-300 text-xs space-y-1">
            <strong class="font-bold block text-rose-400">يرجى تصحيح الأخطاء التالية:</strong>
            <ul class="list-disc list-inside space-y-0.5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Card Container -->
        <div class="glass-card rounded-3xl p-6 sm:p-8 shadow-2xl space-y-6">

            <!-- Auth Mode Tab Buttons -->
            <div class="grid grid-cols-2 gap-2 p-1.5 bg-slate-950/80 rounded-2xl border border-slate-800 text-xs font-bold">
                <button id="tab-login-btn" onclick="switchAuthTab('login')" class="py-2.5 rounded-xl transition bg-gradient-to-r from-brand-600 to-brand-500 text-white shadow-md">
                    تسجيل الدخول
                </button>
                <button id="tab-register-btn" onclick="switchAuthTab('register')" class="py-2.5 rounded-xl transition text-slate-400 hover:text-white">
                    حساب جديد
                </button>
            </div>

            <!-- 1. LOGIN FORM SECTION -->
            <div id="auth-login-section" class="space-y-5">
                <form method="POST" action="{{ route('login') }}" class="space-y-4 text-xs">
                    @csrf
                    <div class="space-y-1.5">
                        <label for="signin-id" class="text-slate-300 font-semibold">البريد الإلكتروني</label>
                        <div class="relative">
                            <input id="signin-id" name="email" type="email" required placeholder="example@email.com"
                                class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl py-3 pr-10 pl-4 outline-none focus:border-brand-500 text-left transition" />
                            <i class="fa-solid fa-envelope absolute right-3.5 top-3.5 text-slate-500 text-sm"></i>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label for="signin-code" class="text-slate-300 font-semibold">كلمة المرور</label>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[11px] text-brand-400 hover:underline">نسيت كلمة المرور؟</a>
                            @endif
                        </div>
                        <div class="relative">
                            <input id="signin-code" name="password" type="password" required placeholder="••••••••"
                                class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl py-3 pr-10 pl-4 outline-none focus:border-brand-500 text-left transition" />
                            <i class="fa-solid fa-lock absolute right-3.5 top-3.5 text-slate-500 text-sm"></i>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-black py-3.5 rounded-xl shadow-lg shadow-brand-600/30 transition">
                        تسجيل الدخول
                    </button>
                </form>

                <div class="relative flex items-center justify-center py-2">
                    <hr class="w-full border-slate-800" />
                    <span class="absolute bg-slate-900 px-3 text-slate-500 text-[11px]">أو من خلال</span>
                </div>

                <!-- Google OAuth Button -->
                <a href="{{ url('/auth/google') }}" class="flex items-center justify-center gap-3 bg-slate-950 hover:bg-slate-800 text-slate-200 border border-slate-800 rounded-xl py-3 text-xs font-bold transition shadow">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Logo" class="w-5 h-5" />
                    <span>المتابعة باستخدام حساب Google</span>
                </a>
            </div>

            <!-- 2. REGISTER FORM SECTION -->
            <div id="auth-register-section" class="hidden space-y-5">
                <form method="POST" action="{{ route('register') }}" class="space-y-4 text-xs">
                    @csrf
                    <div class="space-y-1.5">
                        <label for="reg-name" class="text-slate-300 font-semibold">الاسم الكامل</label>
                        <input id="reg-name" name="name" type="text" required placeholder="أدخل اسمك الثلاثي"
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 transition" />
                    </div>

                    <div class="space-y-1.5">
                        <label for="reg-email" class="text-slate-300 font-semibold">البريد الإلكتروني</label>
                        <input id="reg-email" name="email" type="email" required placeholder="example@email.com"
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left transition" />
                    </div>

                    <div class="space-y-1.5">
                        <label for="reg-password" class="text-slate-300 font-semibold">كلمة المرور</label>
                        <input id="reg-password" name="password" type="password" required placeholder="8 أحرف على الأقل"
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left transition" />
                    </div>

                    <div class="space-y-1.5">
                        <label for="reg-password-confirm" class="text-slate-300 font-semibold">تأكيد كلمة المرور</label>
                        <input id="reg-password-confirm" name="password_confirmation" type="password" required placeholder="أعد إدخال كلمة المرور"
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left transition" />
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-black py-3.5 rounded-xl shadow-lg shadow-brand-600/30 transition">
                        إنشاء حساب جديد
                    </button>
                </form>

                <a href="{{ url('/auth/google') }}" class="flex items-center justify-center gap-3 bg-slate-950 hover:bg-slate-800 text-slate-200 border border-slate-800 rounded-xl py-3 text-xs font-bold transition shadow">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Logo" class="w-5 h-5" />
                    <span>التسجيل السريع عبر Google</span>
                </a>
            </div>

            <!-- Merchant Portal CTA -->
            <div class="pt-4 border-t border-slate-800 text-center">
                <p class="text-xs text-slate-400">
                    هل ترغب في البيع وعرض منتجاتك؟
                    <a href="{{ route('vendor.register') }}" class="text-brand-400 font-bold hover:underline me-1">
                        سجل كبائع جديد <i class="fa-solid fa-store ms-1"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });

        function switchAuthTab(tab) {
            const loginSec = document.getElementById('auth-login-section');
            const regSec = document.getElementById('auth-register-section');
            const loginBtn = document.getElementById('tab-login-btn');
            const regBtn = document.getElementById('tab-register-btn');

            if (tab === 'login') {
                loginSec.classList.remove('hidden');
                regSec.classList.add('hidden');
                loginBtn.className = 'py-2.5 rounded-xl transition bg-gradient-to-r from-brand-600 to-brand-500 text-white shadow-md';
                regBtn.className = 'py-2.5 rounded-xl transition text-slate-400 hover:text-white';
            } else {
                loginSec.classList.add('hidden');
                regSec.classList.remove('hidden');
                regBtn.className = 'py-2.5 rounded-xl transition bg-gradient-to-r from-brand-600 to-brand-500 text-white shadow-md';
                loginBtn.className = 'py-2.5 rounded-xl transition text-slate-400 hover:text-white';
            }
        }
    </script>
</body>

</html>