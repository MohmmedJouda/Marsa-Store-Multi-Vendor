<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="اختيار طريقة الدفع - مرساة" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>تأكيد الدفع | مرساة Store</title>

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

    <!-- Font Awesome 6 & LineIcons -->
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

    <!-- HEADER -->
    <header class="sticky top-0 z-50 glass-header shadow-2xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="{{ route('customer.main-page') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-brand-600 to-brand-400 flex items-center justify-center p-2 shadow-lg">
                        <img src="{{ asset('img/logo.svg') }}" alt="Marsa Logo" class="w-full h-full object-contain filter brightness-200" />
                    </div>
                    <span class="text-2xl font-black gradient-text">مرساة</span>
                </a>
                <span class="text-xs font-bold text-slate-300 flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved text-emerald-400"></i> حماية الدفع المباشر
                </span>
            </div>
        </div>
    </header>

    <!-- MAIN PAYMENT CONTENT -->
    <main class="flex-grow max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full space-y-8" data-aos="fade-up">

        @if(session('success'))
        <div class="p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-2xl text-emerald-400 text-xs font-bold">
            {{ session('success') }}
        </div>
        @endif

        <div class="border-b border-slate-800 pb-4">
            <h1 class="text-3xl font-black text-white flex items-center gap-3">
                <i class="fa-solid fa-wallet text-brand-400"></i> اختيار وسيلة الدفع
            </h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Sidebar Order Summary -->
            <div class="glass-card rounded-3xl p-6 bg-slate-900/90 border border-slate-800 space-y-4 h-fit">
                <h3 class="font-bold text-white text-base border-b border-slate-800 pb-3">تفاصيل الفاتورة والطلب</h3>

                @php $firstItem = $items->first(); @endphp
                @if($firstItem)
                <div class="space-y-2 text-xs">
                    <h4 class="font-bold text-brand-400 text-sm">{{ $firstItem->variant->product->name }}</h4>
                    <div class="flex justify-between text-slate-300">
                        <span>سعر التشكيلة:</span>
                        <span class="font-bold text-white">{{ $firstItem->variant->price }} ₪</span>
                    </div>
                    <div class="flex justify-between text-slate-300">
                        <span>الكمية:</span>
                        <span class="font-bold text-white">{{ $firstItem->quantity }}</span>
                    </div>
                    <div class="flex justify-between text-slate-300">
                        <span>تكاليف الشحن:</span>
                        <span class="font-bold text-white">{{ $order->shipping_amount }} ₪</span>
                    </div>
                    <div class="flex justify-between text-slate-300">
                        <span>الضرائب والرسوم:</span>
                        <span class="font-bold text-white">{{ $taxAmount }} ₪</span>
                    </div>
                    <hr class="border-slate-800">
                    <div class="flex justify-between text-sm font-bold pt-1">
                        <span class="text-white">المجموع النهائي:</span>
                        <span class="text-xl font-black text-emerald-400">{{ $total }} ₪</span>
                    </div>
                </div>
                @endif
            </div>

            <!-- Payment Form Methods -->
            <div class="lg:col-span-2 space-y-6">
                <div class="glass-card rounded-3xl p-6 bg-slate-900/80 border border-slate-800 space-y-6">
                    <h3 class="font-bold text-white text-base">اختر وسيلة الدفع المفضل لديك</h3>

                    <div class="space-y-4 text-xs">
                        <!-- Pay on delivery -->
                        <div class="p-4 bg-slate-950/80 rounded-2xl border border-slate-800 space-y-3">
                            <label class="flex items-center gap-3 cursor-pointer font-bold text-white text-sm">
                                <input type="radio" name="payment_method" value="pay_on_delivery" class="w-4 h-4 text-brand-500" checked />
                                <i class="fa-solid fa-hand-holding-dollar text-emerald-400 text-lg"></i>
                                الدفع عند التوصيل والاستلام
                            </label>
                            <p class="text-slate-400 text-xs me-7">يتم تسليم المبلغ نقدياً لمندوب الشحن والتوصيل عند معاينة المنتجات.</p>
                            <form action="{{ route('customer.checkout.pay_on_delivery', $order->id) }}" method="POST" class="pt-2 me-7">
                                @csrf
                                <button type="submit" class="bg-brand-600 hover:bg-brand-500 text-white font-bold text-xs px-6 py-3 rounded-full transition shadow-md">
                                    تأكيد الطلب والدفع عند التسليم
                                </button>
                            </form>
                        </div>

                        <!-- Bank transfer -->
                        <div class="p-4 bg-slate-950/80 rounded-2xl border border-slate-800 space-y-3">
                            <label class="flex items-center gap-3 cursor-pointer font-bold text-white text-sm">
                                <input type="radio" name="payment_method" value="bank_transfer" class="w-4 h-4 text-brand-500" />
                                <i class="fa-solid fa-building-columns text-brand-400 text-lg"></i>
                                التحويل البنكي المباشر
                            </label>
                            <p class="text-slate-400 text-xs me-7">تحويل مباشر للحساب البنكي الخاص بالمنصة أو التاجر.</p>
                            <form action="{{ route('customer.checkout.bank_transfer', $order->id) }}" method="POST" class="pt-2 me-7">
                                @csrf
                                <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-xs px-6 py-3 rounded-full border border-slate-700 transition">
                                    متابعة بالتحويل البنكي
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
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