<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="تقييم التجربة والتغذية الراجعة - مرساة" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>تغذية رجعية وتغذية الخدمة | مرساة Store</title>

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

    <!-- MAIN FEEDBACK CONTENT -->
    <main class="flex-grow max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full space-y-8" data-aos="fade-up">

        @if(session('success'))
        <div class="p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-2xl text-emerald-400 text-xs font-bold flex items-center gap-2">
            <i class="fa-solid fa-circle-check text-base"></i>
            {{ session('success') }}
        </div>
        @endif

        <div class="glass-card rounded-3xl p-8 bg-slate-900/80 border border-slate-800 space-y-6 text-center">
            <div class="w-16 h-16 rounded-full bg-brand-500/10 text-brand-400 flex items-center justify-center text-2xl mx-auto border border-brand-500/30">
                <i class="fa-solid fa-comment-dots"></i>
            </div>

            <div class="space-y-2">
                @if($status === 'delivered')
                <h2 class="text-2xl font-black text-white">رأيك يهمنا في منتجات الطلب</h2>
                <p class="text-slate-400 text-xs">تم تسليم طلبك بنجاح، شاركنا انطباعك لمساعدتنا في التطوير والمتابعة المستمرة.</p>
                @elseif($status === 'cancelled')
                <h2 class="text-2xl font-black text-white">شارِكنا سبب الإلغاء</h2>
                <p class="text-slate-400 text-xs">تم إلغاء الطلب، يهمنا معرفة السبب والملاحظات لتحسين تجاربك القادمة.</p>
                @elseif($status === 'refunded')
                <h2 class="text-2xl font-black text-white">ملاحظات طلب الاسترجاع</h2>
                <p class="text-slate-400 text-xs">تم إكمال الاسترجاع بنجاح، يسعدنا الاستماع لملاحظاتك حول المنتج والخدمة.</p>
                @else
                <h2 class="text-2xl font-black text-white">ملاحظاتك وتقييمك</h2>
                <p class="text-slate-400 text-xs">نحن هنا دائماً لخدمتك وسماع آرائك التطويرية.</p>
                @endif
            </div>

            <form action="{{ route('customer.feedback.store') }}" method="POST" class="space-y-4 text-xs text-right">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <input type="hidden" name="status" value="{{ $status }}">

                <div class="space-y-1">
                    <label class="text-slate-300 font-semibold">ملاحظاتك أو اقتراحاتك</label>
                    <textarea name="feedback" rows="5" required placeholder="اكتب رأيك وتجربتك هنا بكل شفافية..."
                        class="w-full bg-slate-950 border border-slate-800 text-white rounded-2xl p-4 outline-none focus:border-brand-500 resize-none"></textarea>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-bold py-3.5 rounded-full shadow-lg shadow-brand-600/30 transition">
                    إرسال التقييم <i class="fa-solid fa-paper-plane ms-2"></i>
                </button>
            </form>
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