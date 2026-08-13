<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="تواصل معنا - مرساة للتسوق الرقمي" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>تواصل معنا | مرساة Store</title>

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

        .glass-header {
            background: rgba(11, 25, 44, 0.88);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.65);
            backdrop-filter: blur(16px);
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

    <!-- CENTRALIZED GLOBAL HEADER COMPONENT -->
    <x-global-header variant="standard" :categories="$categories ?? collect()" :carts="$carts ?? null" :userWishlistIds="$userWishlistIds ?? []" />

    <!-- BREADCRUMBS -->
    <div class="bg-slate-950/60 border-b border-slate-800/80 py-3 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-slate-400">
                <a href="{{ route('customer.main-page') }}" class="hover:text-white">الرئيسية</a>
                <span>/</span>
                <span class="text-slate-200 font-bold">تواصل معنا</span>
            </div>
        </div>
    </div>

    <!-- MAIN CONTACT CONTENT -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full space-y-10" data-aos="fade-up">

        <div class="text-center max-w-2xl mx-auto space-y-3">
            <h1 class="text-3xl sm:text-4xl font-black text-white">تواصل مع <span class="gradient-text">فريق مرساة</span></h1>
            <p class="text-slate-400 text-xs sm:text-sm">نحن هنا لمساعدتك والإجابة على استفساراتك على مدار الساعة.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Contact Info Cards -->
            <div class="space-y-4">
                <div class="glass-card rounded-3xl p-6 bg-slate-900/80 border border-slate-800 flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-brand-600/20 text-brand-400 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-white text-sm">مقر الشركة</h4>
                        <p class="text-slate-400 text-xs mt-1">غزة - مفترق السرايا - برج جاد</p>
                    </div>
                </div>

                <div class="glass-card rounded-3xl p-6 bg-slate-900/80 border border-slate-800 flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-600/20 text-emerald-400 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-white text-sm">الخط المباشر</h4>
                        <p class="text-slate-300 text-xs mt-1" dir="ltr">+970 59 5570612</p>
                        <p class="text-slate-300 text-xs" dir="ltr">+970 59 5196578</p>
                    </div>
                </div>

                <div class="glass-card rounded-3xl p-6 bg-slate-900/80 border border-slate-800 flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-accent-gold/20 text-accent-gold flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-white text-sm">البريد الإلكتروني</h4>
                        <p class="text-slate-300 text-xs mt-1">support@mersaa.com</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2 glass-card rounded-3xl p-8 bg-slate-900/80 border border-slate-800 space-y-6">
                <h3 class="text-xl font-bold text-white">أرسل استفسارك أو طلبك</h3>
                <form action="#" method="POST" class="space-y-4 text-xs">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-slate-300 font-semibold">اسمك الكامل</label>
                            <input type="text" name="name" required placeholder="محمد أحمد"
                                class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500" />
                        </div>
                        <div class="space-y-1">
                            <label class="text-slate-300 font-semibold">موضوع الرسالة</label>
                            <input type="text" name="subject" required placeholder="استفسار عن الشحن..."
                                class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500" />
                        </div>
                        <div class="space-y-1">
                            <label class="text-slate-300 font-semibold">البريد الإلكتروني</label>
                            <input type="email" name="email" required placeholder="name@example.com"
                                class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left" />
                        </div>
                        <div class="space-y-1">
                            <label class="text-slate-300 font-semibold">رقم الهاتف (الواتساب)</label>
                            <input type="text" name="phone" required placeholder="059XXXXXXX"
                                class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left" />
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="text-slate-300 font-semibold">مضمون الرسالة أو الاستفسار</label>
                        <textarea name="message" rows="5" required placeholder="اكتب تفاصيل طلبك هنا..."
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-2xl p-4 outline-none focus:border-brand-500 resize-none"></textarea>
                    </div>

                    <button type="submit" class="bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-bold py-3.5 px-8 rounded-full shadow-lg shadow-brand-600/30 transition">
                        إرسال الرسالة <i class="fa-solid fa-paper-plane ms-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-slate-400 border-t border-slate-800 text-xs mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex items-center justify-between">
            <p>© {{ date('Y') }} جميع الحقوق محفوظة - مرساة Store</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>

</html>