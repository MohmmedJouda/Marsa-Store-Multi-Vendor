<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="الأسئلة الشائعة - مرساة" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>الأسئلة الشائعة | مرساة Store</title>

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
                <span class="text-slate-200 font-bold">الأسئلة الشائعة</span>
            </div>
        </div>
    </div>

    <!-- MAIN FAQ CONTENT -->
    <main class="flex-grow max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full space-y-8" data-aos="fade-up">

        <div class="text-center space-y-3">
            <h1 class="text-3xl sm:text-4xl font-black text-white">الأسئلة والإجابات <span class="gradient-text">الشائعة</span></h1>
            <p class="text-slate-400 text-xs sm:text-sm">إجابات سريعة ومباشرة لأبرز الاستفسارات المتعلقة بالطلب والشحن والدفع.</p>
        </div>

        <div class="space-y-4 text-xs">
            <div class="glass-card rounded-3xl p-6 bg-slate-900/80 border border-slate-800 space-y-2">
                <h3 class="font-bold text-white text-sm flex items-center gap-2">
                    <i class="fa-solid fa-circle-question text-brand-400"></i> كيف يمكنني الطلب من منصة مرساة؟
                </h3>
                <p class="text-slate-300 leading-relaxed me-6">يمكنك تصفح المنتجات والمتاجر، ثم إضافتها لسلة المشتريات والانتقال لصفحة إتمام الطلب وتحديد عنوان التوصيل ووسيلة الدفع المفضل لديكم.</p>
            </div>

            <div class="glass-card rounded-3xl p-6 bg-slate-900/80 border border-slate-800 space-y-2">
                <h3 class="font-bold text-white text-sm flex items-center gap-2">
                    <i class="fa-solid fa-circle-question text-brand-400"></i> ما هي طرق الدفع المتاحة؟
                </h3>
                <p class="text-slate-300 leading-relaxed me-6">نوفر وسائل دفع آمنة ومتنوعة تشمل: الدفع عند الاستلام والتسليم النقدية، والتحويل البنكي المباشر، وبطاقات الائتمان المشفرة.</p>
            </div>

            <div class="glass-card rounded-3xl p-6 bg-slate-900/80 border border-slate-800 space-y-2">
                <h3 class="font-bold text-white text-sm flex items-center gap-2">
                    <i class="fa-solid fa-circle-question text-brand-400"></i> كم تستغرق مدة توصيل الطلبات؟
                </h3>
                <p class="text-slate-300 leading-relaxed me-6">تتراوح خيارات الشحن من التوصيل السريع خلال 24 ساعة، أو التوصيل العادي والمجاني خلال 2 إلى 4 أيام عمل بحسب منطقتك.</p>
            </div>

            <div class="glass-card rounded-3xl p-6 bg-slate-900/80 border border-slate-800 space-y-2">
                <h3 class="font-bold text-white text-sm flex items-center gap-2">
                    <i class="fa-solid fa-circle-question text-brand-400"></i> هل المنتجات المعروضة مضمونة وموثقة؟
                </h3>
                <p class="text-slate-300 leading-relaxed me-6">نعم، جميع المتاجر والبائعين المسجلين في المنصة يخضعون لعملية تدقيق ومراجعة دقيقة مع ضمان حماية كاملة للمشترين.</p>
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