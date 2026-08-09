<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="إعادة تعيين كلمة المرور - مرساة" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>إعادة تعيين كلمة المرور | مرساة Store</title>

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

<body class="bg-[#0b192c] text-slate-100 min-h-screen flex flex-col justify-center items-center p-4 selection:bg-brand-500 selection:text-white">

    <div class="w-full max-w-md my-8 space-y-6 relative z-10" data-aos="fade-up">

        <!-- Logo Header -->
        <div class="text-center space-y-2">
            <a href="{{ route('guest.main-page') }}" class="inline-flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-brand-600 to-brand-400 flex items-center justify-center p-2.5 shadow-xl shadow-brand-500/30">
                    <img src="{{ asset('img/logo.svg') }}" alt="Marsa Logo" class="w-full h-full object-contain filter brightness-200" />
                </div>
                <div class="flex flex-col text-right">
                    <span class="text-3xl font-black gradient-text">مرساة</span>
                    <span class="text-[10px] text-slate-400 font-semibold tracking-wider">RESET PASSWORD</span>
                </div>
            </a>
        </div>

        <x-validation-errors class="mb-4 text-xs text-rose-400 bg-rose-500/10 p-4 rounded-2xl border border-rose-500/30" />

        <!-- Form Card -->
        <div class="glass-card rounded-3xl p-6 sm:p-8 shadow-2xl space-y-6">
            <h2 class="text-xl font-bold text-white text-center border-b border-slate-800 pb-3">تعيين كلمة مرور جديدة</h2>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-4 text-xs">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="space-y-1.5">
                    <label for="email" class="text-slate-300 font-semibold">البريد الإلكتروني</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required autofocus
                        class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left transition" />
                </div>

                <div class="space-y-1.5">
                    <label for="password" class="text-slate-300 font-semibold">كلمة المرور الجديدة</label>
                    <input id="password" name="password" type="password" required placeholder="8 أحرف على الأقل"
                        class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left transition" />
                </div>

                <div class="space-y-1.5">
                    <label for="password_confirmation" class="text-slate-300 font-semibold">تأكيد كلمة المرور الجديدة</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required placeholder="أعد إدخال كلمة المرور"
                        class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left transition" />
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-black py-3.5 rounded-xl shadow-lg shadow-brand-600/30 transition">
                    حفظ وتحديث كلمة المرور <i class="fa-solid fa-key ms-2"></i>
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init({ duration: 800, once: true });</script>
</body>

</html>
