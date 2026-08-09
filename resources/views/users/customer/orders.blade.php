<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="قائمة الطلبات - مرساة للتسوق الرقمي" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>طلباتك ومشترواتك | مرساة Store</title>

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
                <a href="{{ route('customer.main-page') }}" class="text-xs font-bold text-slate-300 hover:text-white transition flex items-center gap-2">
                    العودة للرئيسية <i class="fa-solid fa-house"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- BREADCRUMBS -->
    <div class="bg-slate-950/60 border-b border-slate-800/80 py-3 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-slate-400">
                <a href="{{ route('customer.main-page') }}" class="hover:text-white">الرئيسية</a>
                <span>/</span>
                <span class="text-slate-200 font-bold">قائمة الطلبات</span>
            </div>
        </div>
    </div>

    <!-- MAIN ORDERS CONTENT -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full space-y-8" data-aos="fade-up">

        @if(session('success') || request('success'))
        <div class="p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-2xl text-emerald-400 text-xs font-bold flex items-center gap-2">
            <i class="fa-solid fa-circle-check text-base"></i>
            {{ session('success') ?? 'تمت العملية بنجاح' }}
        </div>
        @endif

        <div class="border-b border-slate-800 pb-4">
            <h1 class="text-3xl font-black text-white flex items-center gap-3">
                <i class="fa-solid fa-box-archive text-brand-400"></i> تتبع وقائمة الطلبات
            </h1>
            <p class="text-slate-400 text-xs mt-1">عرض جميع الطلبات وتفاصيل الشحن والدفع</p>
        </div>

        <div class="glass-card rounded-3xl overflow-hidden border border-slate-800 bg-slate-900/80 shadow-2xl">
            <div class="overflow-x-auto">
                <table class="w-full text-right text-xs">
                    <thead class="bg-slate-950/90 text-slate-400 font-bold border-b border-slate-800">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">المنتج والطلب</th>
                            <th class="p-4">حالة الطلب</th>
                            <th class="p-4">طريقة الدفع</th>
                            <th class="p-4">الكمية</th>
                            <th class="p-4">المجموع</th>
                            <th class="p-4">التاريخ</th>
                            <th class="p-4 text-center">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800 text-slate-200">
                        @php $n = 0; @endphp
                        @forelse ($orders as $order)
                        @foreach ($order->items as $item)
                        @php
                        $pImg = $item->product?->images()->where('is_main', true)->first();
                        $statusBadge = match($order->status) {
                        'pending' => 'bg-amber-500/15 text-amber-400 border-amber-500/30',
                        'shipping', 'shipped' => 'bg-brand-500/15 text-brand-400 border-brand-500/30',
                        'delivered' => 'bg-emerald-500/15 text-emerald-400 border-emerald-500/30',
                        'cancelled' => 'bg-rose-500/15 text-rose-400 border-rose-500/30',
                        default => 'bg-slate-800 text-slate-300 border-slate-700'
                        };
                        $statusLabel = match($order->status) {
                        'pending' => 'قيد العمل',
                        'shipping' => 'جاري الشحن',
                        'shipped' => 'تم الشحن',
                        'delivered' => 'تم التوصيل بنجاح',
                        'cancelled' => 'ملغي',
                        'refunded' => 'مسترد',
                        default => $order->status
                        };
                        @endphp
                        <tr class="hover:bg-slate-800/40 transition">
                            <td class="p-4 font-bold text-slate-400">{{ ++$n }}</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $pImg ? asset('storage/' . $pImg->image_path) : asset('images/no-image.png') }}"
                                        alt="{{ $item->product?->name }}" class="w-12 h-12 object-cover rounded-xl bg-slate-950 shrink-0" />
                                    <div class="font-bold text-white max-w-[180px] truncate">
                                        {{ $item->product?->name ?? 'منتج' }}
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="inline-block px-3 py-1 rounded-full border text-[11px] font-bold {{ $statusBadge }}">
                                    {{ $statusLabel }}
                                </span>
                            </td>
                            <td class="p-4 font-medium">
                                @if ($order->payment && $order->payment->payment_method === 'bank_transfer')
                                التحويل البنكي
                                @elseif ($order->payment && $order->payment->payment_method === 'credit_card')
                                بطاقة الائتمان
                                @elseif ($order->payment && $order->payment->payment_method === 'pay_on_delivery')
                                الدفع عند التسليم
                                @else
                                <a href="{{ route('customer.payment.index', $order->id) }}" class="text-rose-400 font-bold hover:underline">
                                    متابعة الدفع
                                </a>
                                @endif
                            </td>
                            <td class="p-4 font-bold">{{ $item->quantity }}</td>
                            <td class="p-4 font-black text-emerald-400">{{ number_format($order->total_amount, 2) }} ₪</td>
                            <td class="p-4 text-slate-400 text-[11px]">{{ $order->created_at?->diffForHumans() }}</td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    @if (!in_array($order->status, ['delivered', 'refunded', 'cancelled']))
                                    <form method="POST" action="{{ route('customer.orders.cancel', $order->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-rose-500/10 hover:bg-rose-500 text-rose-400 hover:text-white font-bold text-[11px] px-3 py-1.5 rounded-xl border border-rose-500/30 transition">
                                            إلغاء
                                        </button>
                                    </form>
                                    @endif

                                    @if ($order->status === 'delivered')
                                    <form method="POST" action="{{ route('customer.orders.refund', $order->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-amber-500/10 hover:bg-amber-500 text-amber-400 hover:text-white font-bold text-[11px] px-3 py-1.5 rounded-xl border border-amber-500/30 transition">
                                            إرجاع
                                        </button>
                                    </form>
                                    @endif

                                    @if (in_array($order->status, ['delivered', 'refunded', 'cancelled']))
                                    <a href="{{ route('customer.feedback.create', ['order_id' => $order->id, 'status' => $order->status]) }}"
                                        class="bg-brand-500/10 hover:bg-brand-500 text-brand-400 hover:text-white font-bold text-[11px] px-3 py-1.5 rounded-xl border border-brand-500/30 transition">
                                        تقييم التجربة
                                    </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @empty
                        <tr>
                            <td colspan="8" class="p-12 text-center text-slate-400">
                                <i class="fa-solid fa-box-open text-4xl text-slate-600 block mb-2"></i>
                                لا توجد طلبات سابقة
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
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