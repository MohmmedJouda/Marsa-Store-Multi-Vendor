<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="إنشاء حساب جديد - مرساة" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>إنشاء حساب جديد | مرساة Store</title>

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

    <style>
        body {
            font-family: 'Tajawal', 'Cairo', sans-serif;
            background-color: #0b192c;
            color: #f1f5f9;
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.75);
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

<body class="bg-[#0b192c] text-slate-100 min-h-screen flex flex-col justify-between antialiased selection:bg-brand-500 selection:text-white">

    <!-- MINIMAL GLOBAL HEADER COMPONENT -->
    <x-global-header variant="minimal" />

    <div class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-md my-8 space-y-6 relative z-10" data-aos="fade-up">

        <!-- Logo Header -->
        <div class="text-center space-y-2">
            <a href="{{ route('guest.main-page') }}" class="inline-flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-brand-600 to-brand-400 flex items-center justify-center p-2.5 shadow-xl shadow-brand-500/30">
                    <img src="{{ asset('img/logo.svg') }}" alt="Marsa Logo" class="w-full h-full object-contain filter brightness-200" />
                </div>
                <div class="flex flex-col text-right">
                    <span class="text-3xl font-black gradient-text">مرساة</span>
                    <span class="text-[11px] text-slate-400 font-semibold tracking-wider">MARSA STORE</span>
                </div>
            </a>
            <p class="text-xs text-slate-400">انضم للمنصة واستمتع بتجربة تسوق رقمية استثنائية</p>
        </div>

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4 text-xs text-rose-400 bg-rose-500/10 p-4 rounded-2xl border border-rose-500/30" />

        <!-- Form Card -->
        <div class="glass-card rounded-3xl p-6 sm:p-8 shadow-2xl space-y-6">
            <h2 class="text-xl font-bold text-white text-center border-b border-slate-800 pb-3">إنشاء حساب مشتري جديد</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4 text-xs">
                @csrf

                <div class="space-y-1.5">
                    <label for="name" class="text-slate-300 font-semibold">الاسم الكامل</label>
                    <input id="name" name="name" type="text" :value="old('name')" required autofocus placeholder="أدخل اسمك الثلاثي"
                        class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 transition" />
                </div>

                <div class="space-y-1.5">
                    <label for="email" class="text-slate-300 font-semibold">البريد الإلكتروني</label>
                    <input id="email" name="email" type="email" :value="old('email')" required placeholder="example@email.com"
                        class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left transition" />
                </div>

                <div class="space-y-1.5">
                    <label for="password" class="text-slate-300 font-semibold">كلمة المرور</label>
                    <input id="password" name="password" type="password" required placeholder="8 أحرف على الأقل"
                        class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left transition" />
                </div>

                <div class="space-y-1.5">
                    <label for="password_confirmation" class="text-slate-300 font-semibold">تأكيد كلمة المرور</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required placeholder="أعد إدخال كلمة المرور"
                        class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left transition" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="pt-2">
                    <label for="terms" class="flex items-center gap-2 text-slate-300 text-[11px] cursor-pointer">
                        <input type="checkbox" name="terms" id="terms" required class="rounded bg-slate-950 border-slate-800 text-brand-500" />
                        <span>أوافق على <a target="_blank" href="{{ route('terms.show') }}" class="text-brand-400 underline">شروط الخدمة</a> و <a target="_blank" href="{{ route('policy.show') }}" class="text-brand-400 underline">سياسة الخصوصية</a></span>
                    </label>
                </div>
                @endif

                <button type="submit" class="w-full bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-black py-3.5 rounded-xl shadow-lg shadow-brand-600/30 transition">
                    تسجيل الحساب
                </button>
            </form>

            <div class="relative flex items-center justify-center py-1">
                <hr class="w-full border-slate-800" />
                <span class="absolute bg-slate-900 px-3 text-slate-500 text-[11px]">أو من خلال</span>
            </div>

            <a href="{{ url('/auth/google') }}" class="flex items-center justify-center gap-3 bg-slate-950 hover:bg-slate-800 text-slate-200 border border-slate-800 rounded-xl py-3 text-xs font-bold transition shadow">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Logo" class="w-5 h-5" />
                <span>سجّل باستخدام Google</span>
            </a>

            <div class="pt-3 border-t border-slate-800 text-center">
                <p class="text-xs text-slate-400">
                    لديك حساب بالفعل؟
                    <a href="{{ route('login') }}" class="text-brand-400 font-bold hover:underline me-1">
                        تسجيل الدخول
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>

</html>