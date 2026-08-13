<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="حالة طلب تسجيل المتجر - منصة مرساة" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>حالة طلب الانضمام | مرساة Store</title>

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

<body class="bg-[#0b192c] text-slate-100 min-h-screen flex flex-col justify-between items-center p-4 sm:p-6 selection:bg-brand-500 selection:text-white relative overflow-x-hidden">

    @php
        $currentStatus = $status ?? (isset($latestDoc) ? $latestDoc->status : 'pending');
    @endphp

    <!-- Background Ambient Glow Accents -->
    <div class="fixed top-1/4 -right-32 w-96 h-96 {{ $currentStatus === 'approved' ? 'bg-emerald-500/10' : ($currentStatus === 'rejected' ? 'bg-rose-500/10' : 'bg-amber-500/10') }} rounded-full blur-3xl pointer-events-none"></div>
    <div class="fixed bottom-1/4 -left-32 w-96 h-96 bg-brand-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Header Bar -->
    <header class="w-full max-w-2xl py-4 flex items-center justify-between z-10">
        <a href="{{ route('guest.main-page') }}" class="inline-flex items-center gap-3 group">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-brand-600 to-brand-400 flex items-center justify-center p-2 shadow-lg shadow-brand-500/30 group-hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('assets2/images/logo/logo.svg') }}" alt="Marsa Logo" class="w-full h-full object-contain filter brightness-200" onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/3081/3081559.png';" />
            </div>
            <div class="flex flex-col text-right">
                <span class="text-2xl font-black gradient-text">مرساة</span>
                <span class="text-[10px] text-slate-400 font-bold tracking-wider uppercase">Marsa Store</span>
            </div>
        </a>

        <a href="{{ route('guest.main-page') }}" class="text-xs text-slate-400 hover:text-white font-bold flex items-center gap-1.5 bg-slate-900/80 border border-slate-800 px-4 py-2 rounded-full transition">
            <i class="fa-solid fa-house text-brand-400"></i>
            <span>تصفح المتجر</span>
        </a>
    </header>

    <!-- Main Container -->
    <main class="w-full max-w-xl my-auto py-8 z-10">
        <div class="glass-card rounded-3xl p-6 sm:p-10 shadow-2xl relative overflow-hidden border border-slate-800">

            @if($currentStatus === 'approved')
                <!-- APPROVED STATE -->
                <div class="text-center space-y-6">
                    <div class="relative inline-flex items-center justify-center">
                        <div class="w-24 h-24 rounded-3xl bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center shadow-2xl shadow-emerald-500/20">
                            <i class="fa-solid fa-circle-check text-emerald-400 text-5xl animate-bounce" style="animation-duration: 2s;"></i>
                        </div>
                        <span class="absolute -top-1 -right-1 flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-emerald-500"></span>
                        </span>
                    </div>

                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-2 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-black px-4 py-1.5 rounded-full">
                            <i class="fa-solid fa-badge-check"></i> تم اعتماد الحساب
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-black text-white">مرحباً بك! تم قبول طلبك بنجاح</h1>
                        <p class="text-slate-300 text-sm leading-relaxed max-w-md mx-auto">
                            تهانينا! تمت الموافقة على وثائقك التجارية وحساب البائع الخاص بك بنجاح. يمكنك الآن الانتقال مباشرة إلى لوحة تحكم متجرك والبدء بإضافة منتجاتك.
                        </p>
                    </div>

                    <!-- Process Steps -->
                    <div class="grid grid-cols-3 gap-2 py-4 border-y border-slate-800/80 text-xs">
                        <div class="flex flex-col items-center gap-1.5 text-emerald-400 font-bold">
                            <div class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-500/40 flex items-center justify-center">
                                <i class="fa-solid fa-check text-xs"></i>
                            </div>
                            <span>تقديم الطلب</span>
                        </div>
                        <div class="flex flex-col items-center gap-1.5 text-emerald-400 font-bold">
                            <div class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-500/40 flex items-center justify-center">
                                <i class="fa-solid fa-check text-xs"></i>
                            </div>
                            <span>المراجعة والتدقيق</span>
                        </div>
                        <div class="flex flex-col items-center gap-1.5 text-emerald-400 font-bold">
                            <div class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-500/40 flex items-center justify-center">
                                <i class="fa-solid fa-store text-xs"></i>
                            </div>
                            <span>تفعيل المتجر</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3 pt-2">
                        @if(Route::has('vendor.dashboard'))
                        <a href="{{ route('vendor.dashboard') }}" class="w-full bg-gradient-to-r from-emerald-600 to-emerald-500 hover:from-emerald-500 hover:to-emerald-400 text-white font-black py-4 px-6 rounded-2xl shadow-xl shadow-emerald-600/30 transition-all duration-300 flex items-center justify-center gap-2 hover:scale-[1.02]">
                            <i class="fa-solid fa-chart-line text-sm"></i>
                            <span>الانتقال إلى لوحة تحكم المتجر</span>
                        </a>
                        @endif
                        <a href="{{ route('guest.main-page') }}" class="w-full bg-slate-900 hover:bg-slate-800 text-slate-300 font-bold py-3.5 px-6 rounded-2xl border border-slate-800 transition flex items-center justify-center gap-2 text-xs">
                            <i class="fa-solid fa-house"></i>
                            <span>العودة إلى الصفحة الرئيسية للمتجر</span>
                        </a>
                    </div>
                </div>

            @elseif($currentStatus === 'rejected')
                <!-- REJECTED STATE -->
                <div class="text-center space-y-6">
                    <div class="relative inline-flex items-center justify-center">
                        <div class="w-24 h-24 rounded-3xl bg-rose-500/10 border border-rose-500/30 flex items-center justify-center shadow-2xl shadow-rose-500/20">
                            <i class="fa-solid fa-circle-xmark text-rose-500 text-5xl"></i>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-2 bg-rose-500/10 border border-rose-500/30 text-rose-400 text-xs font-black px-4 py-1.5 rounded-full">
                            <i class="fa-solid fa-circle-exclamation"></i> يتطلب إجراء من قبلك
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-black text-white">تعذر قبول الوثائق الحالية</h1>
                        <p class="text-slate-300 text-sm leading-relaxed max-w-md mx-auto">
                            نأسف، لم نتمكن من اعتماد طلبك بناءً على المستندات المرفقة حالياً. يرجى مراجعة بيانات السجل التجاري أو التواصل مع الدعم لإعادة إرسال الوثائق.
                        </p>
                    </div>

                    <!-- Process Steps -->
                    <div class="grid grid-cols-3 gap-2 py-4 border-y border-slate-800/80 text-xs">
                        <div class="flex flex-col items-center gap-1.5 text-emerald-400 font-bold">
                            <div class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-500/40 flex items-center justify-center">
                                <i class="fa-solid fa-check text-xs"></i>
                            </div>
                            <span>تقديم الطلب</span>
                        </div>
                        <div class="flex flex-col items-center gap-1.5 text-rose-400 font-bold">
                            <div class="w-8 h-8 rounded-full bg-rose-500/20 border border-rose-500/40 flex items-center justify-center">
                                <i class="fa-solid fa-xmark text-xs"></i>
                            </div>
                            <span>المراجعة والتدقيق</span>
                        </div>
                        <div class="flex flex-col items-center gap-1.5 text-slate-500">
                            <div class="w-8 h-8 rounded-full bg-slate-900 border border-slate-800 flex items-center justify-center">
                                <i class="fa-solid fa-store text-xs"></i>
                            </div>
                            <span>تفعيل المتجر</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3 pt-2">
                        @if(Route::has('customer.contact'))
                        <a href="{{ route('customer.contact') }}" class="w-full bg-gradient-to-r from-rose-600 to-rose-500 hover:from-rose-500 hover:to-rose-400 text-white font-black py-4 px-6 rounded-2xl shadow-xl shadow-rose-600/30 transition-all duration-300 flex items-center justify-center gap-2 hover:scale-[1.02]">
                            <i class="fa-solid fa-headset text-sm"></i>
                            <span>التواصل مع الدعم الفني للاستفسار</span>
                        </a>
                        @endif
                        @if(Route::has('vendor.register'))
                        <a href="{{ route('vendor.register') }}" class="w-full bg-slate-900 hover:bg-slate-800 text-slate-300 font-bold py-3.5 px-6 rounded-2xl border border-slate-800 transition flex items-center justify-center gap-2 text-xs">
                            <i class="fa-solid fa-file-signature"></i>
                            <span>إعادة تقديم طلب انضمام جديد</span>
                        </a>
                        @endif
                    </div>
                </div>

            @else
                <!-- PENDING STATE (DEFAULT) -->
                <div class="text-center space-y-6">
                    <div class="relative inline-flex items-center justify-center">
                        <div class="w-24 h-24 rounded-3xl bg-amber-500/10 border border-amber-500/30 flex items-center justify-center shadow-2xl shadow-amber-500/20">
                            <i class="fa-solid fa-clock-rotate-left text-amber-400 text-4xl sm:text-5xl animate-pulse"></i>
                        </div>
                        <span class="absolute -top-1 -right-1 flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-amber-500"></span>
                        </span>
                    </div>

                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-2 bg-amber-500/10 border border-amber-500/30 text-amber-400 text-xs font-black px-4 py-1.5 rounded-full">
                            <i class="fa-solid fa-hourglass-half animate-spin" style="animation-duration: 4s;"></i> تحت المراجعة والتدقيق
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-black text-white">تم تقديم طلبك بنجاح!</h1>
                        <p class="text-slate-300 text-sm leading-relaxed max-w-md mx-auto font-medium">
                            حساب التاجر الخاص بك والوثائق التجارية تحت الدراسة والتدقيق حالياً من قبل الفريق المختص. سيتم مراجعة بياناتك واعتماد المتجر في أقرب وقت.
                        </p>
                    </div>

                    <!-- Process Steps -->
                    <div class="grid grid-cols-3 gap-2 py-4 border-y border-slate-800/80 text-xs">
                        <div class="flex flex-col items-center gap-1.5 text-emerald-400 font-bold">
                            <div class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-500/40 flex items-center justify-center">
                                <i class="fa-solid fa-check text-xs"></i>
                            </div>
                            <span>تقديم المستندات</span>
                        </div>
                        <div class="flex flex-col items-center gap-1.5 text-amber-400 font-bold">
                            <div class="w-8 h-8 rounded-full bg-amber-500/20 border border-amber-500/40 flex items-center justify-center animate-pulse">
                                <i class="fa-solid fa-ellipsis text-xs"></i>
                            </div>
                            <span>المراجعة والتدقيق</span>
                        </div>
                        <div class="flex flex-col items-center gap-1.5 text-slate-500">
                            <div class="w-8 h-8 rounded-full bg-slate-900 border border-slate-800 flex items-center justify-center">
                                <i class="fa-solid fa-store text-xs"></i>
                            </div>
                            <span>تفعيل المتجر</span>
                        </div>
                    </div>

                    <!-- Document Metadata Box (if available) -->
                    @if(isset($latestDoc))
                    <div class="bg-slate-950/60 border border-slate-800 p-4 rounded-2xl text-right text-xs space-y-2">
                        <div class="flex items-center justify-between text-slate-400">
                            <span class="font-bold text-white flex items-center gap-1.5">
                                <i class="fa-solid fa-file-contract text-brand-400"></i> وثيقة السجل التجاري
                            </span>
                            <span class="bg-amber-500/10 text-amber-400 px-2.5 py-0.5 rounded-full border border-amber-500/20 font-bold text-[10px]">
                                قيد الانتظار
                            </span>
                        </div>
                        @if($latestDoc->created_at)
                        <div class="text-[11px] text-slate-400 flex items-center gap-1">
                            <i class="fa-regular fa-calendar text-slate-500"></i>
                            <span>تاريخ تقديم الطلب: </span>
                            <span class="text-slate-300 font-semibold">{{ $latestDoc->created_at->format('Y-m-d (h:i A)') }}</span>
                        </div>
                        @endif
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="space-y-3 pt-2">
                        <a href="{{ route('guest.main-page') }}" class="w-full bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-black py-4 px-6 rounded-2xl shadow-xl shadow-brand-600/30 transition-all duration-300 flex items-center justify-center gap-2 hover:scale-[1.02]">
                            <i class="fa-solid fa-basket-shopping text-sm"></i>
                            <span>تصفح منتجات ومتاجر منصة مرساة</span>
                        </a>

                        <button type="button" onclick="window.location.reload()" class="w-full bg-slate-900 hover:bg-slate-800 text-slate-300 font-bold py-3.5 px-6 rounded-2xl border border-slate-800 transition flex items-center justify-center gap-2 text-xs">
                            <i class="fa-solid fa-rotate-right text-brand-400"></i>
                            <span>تحديث حالة الطلب الآن</span>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Security & Guarantee Footer info -->
            <div class="mt-8 pt-4 border-t border-slate-800/80 flex items-center justify-between text-[11px] text-slate-400">
                <span class="flex items-center gap-1.5">
                    <i class="fa-solid fa-shield-halved text-emerald-400"></i> بيئة تجارية موثوقة 100%
                </span>
                <a href="{{ route('customer.faq') }}" class="hover:text-white transition flex items-center gap-1">
                    <i class="fa-solid fa-circle-question text-brand-400"></i> الأسئلة الشائعة
                </a>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full max-w-2xl py-4 text-center text-xs text-slate-500 z-10">
        <p>© {{ date('Y') }} منصة مرساة Store - جميع الحقوق محفوظة</p>
    </footer>

</body>

</html>