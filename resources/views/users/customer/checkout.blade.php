<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="إتمام الطلب والدفع - مرساة" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>إتمام الطلب والدفع | مرساة Store</title>

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

    <!-- MINIMAL GLOBAL HEADER COMPONENT -->
    <x-global-header variant="minimal" />

    <!-- MAIN CHECKOUT FORM -->
    <main class="flex-grow max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full space-y-8" data-aos="fade-up">

        @if(session('success'))
        <div class="p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-2xl text-emerald-400 text-xs font-bold">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="p-4 bg-rose-500/10 border border-rose-500/30 rounded-2xl text-rose-400 text-xs font-bold">
            {{ session('error') }}
        </div>
        @endif

        <div class="border-b border-slate-800 pb-4 flex items-center justify-between">
            <h1 class="text-3xl font-black text-white flex items-center gap-3">
                <i class="fa-solid fa-credit-card text-brand-400"></i> إتمام الشراء والتوصيل
            </h1>
        </div>

        <form method="POST" action="{{ route('customer.address.store') }}" class="space-y-8">
            @csrf
            <input type="hidden" name="variant_id" value="{{ request('variant_id') }}">
            <input type="hidden" name="qty" id="qtyInput" value="{{ request('qty', 1) }}">

            <!-- 0. ORDER SUMMARY -->
            <div class="glass-card rounded-3xl p-6 bg-slate-900/80 border border-slate-800 space-y-4">
                <h3 class="text-lg font-bold text-white flex items-center justify-between border-b border-slate-800 pb-3">
                    <span class="flex items-center gap-2">
                        <i class="fa-solid fa-receipt text-brand-400"></i> ملخص قائمة المشتروات
                    </span>
                    <span class="text-xs text-slate-400">الكمية الإجمالية: {{ $qty }}</span>
                </h3>

                <div class="space-y-3 text-xs">
                    @if(isset($variant) && $variant)
                    <div class="flex items-center justify-between p-3 bg-slate-950/80 rounded-2xl border border-slate-800">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('storage/' . $variant->image) }}" alt="{{ $variant->product->name }}" class="w-12 h-12 object-cover rounded-xl bg-slate-900 shrink-0" />
                            <div>
                                <h4 class="font-bold text-white text-xs">{{ $variant->product->name }}</h4>
                                <p class="text-slate-400 text-[11px]">
                                    @foreach ($variant->attributeValues as $val)
                                    {{ $val->attribute->name }}: {{ $val->value }} &nbsp;
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <div class="text-emerald-400 font-extrabold text-sm">{{ number_format($subtotalPrice, 2) }} ₪</div>
                    </div>
                    @elseif(isset($cartItems) && $cartItems->isNotEmpty())
                    <div class="space-y-2 max-h-60 overflow-y-auto pr-1">
                        @foreach($cartItems as $cItem)
                        @php $cImg = $cItem->product?->images()->where('is_main', true)->first(); @endphp
                        <div class="flex items-center justify-between p-3 bg-slate-950/80 rounded-2xl border border-slate-800">
                            <div class="flex items-center gap-3">
                                <img src="{{ $cImg ? asset('storage/' . $cImg->image_path) : asset('images/no-image.png') }}"
                                    alt="{{ $cItem->name }}" class="w-10 h-10 object-cover rounded-xl bg-slate-900 shrink-0" />
                                <div>
                                    <h4 class="font-bold text-white text-xs">{{ $cItem->name }}</h4>
                                    <p class="text-slate-400 text-[11px]">الكمية: {{ $cItem->qty }}</p>
                                </div>
                            </div>
                            <div class="text-emerald-400 font-extrabold text-xs">{{ number_format($cItem->qty * $cItem->price, 2) }} ₪</div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <div class="pt-2 space-y-1.5 text-slate-300 border-t border-slate-800">
                        <div class="flex justify-between">
                            <span>المجموع الفرعي:</span>
                            <span class="font-bold text-white">{{ number_format($subtotalPrice, 2) }} ₪</span>
                        </div>
                        @if($discountAmount > 0)
                        <div class="flex justify-between text-rose-400 font-bold">
                            <span>الخصم المطبق:</span>
                            <span>- {{ number_format($discountAmount, 2) }} ₪</span>
                        </div>
                        @endif
                        <div class="flex justify-between">
                            <span>رسوم الشحن المتوقعة:</span>
                            <span class="font-bold text-emerald-400">{{ $shippingAmount }} ₪</span>
                        </div>
                        <div class="flex justify-between">
                            <span>الضرائب:</span>
                            <span class="font-bold text-white">{{ $taxAmount }} ₪</span>
                        </div>
                        <hr class="border-slate-800">
                        <div class="flex justify-between text-sm font-black pt-1">
                            <span class="text-white">المجموع الكلي التقديري:</span>
                            <span class="text-xl font-black text-emerald-400">{{ number_format($totalPriceAfterDiscount + $shippingAmount + $taxAmount, 2) }} ₪</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. SHIPPING OPTIONS -->
            <div class="glass-card rounded-3xl p-6 bg-slate-900/80 border border-slate-800 space-y-4">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-truck-fast text-brand-400"></i> اختر خيار التوصيل المناسب
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                    <label class="relative flex flex-col p-4 bg-slate-950/80 border border-slate-800 rounded-2xl cursor-pointer hover:border-brand-500 transition">
                        <input type="radio" name="shipping_method" value="free" data-price="0.00" class="peer hidden" {{ ($selectedShipping ?? 'free') == 'free' ? 'checked' : '' }} />
                        <div class="flex items-center justify-between font-bold text-white mb-2">
                            <span>الشحن المجاني</span>
                            <span class="text-emerald-400">₪0</span>
                        </div>
                        <span class="text-slate-400 text-[11px]">توصيل خلال 3-5 أيام عمل</span>
                    </label>

                    <label class="relative flex flex-col p-4 bg-slate-950/80 border border-slate-800 rounded-2xl cursor-pointer hover:border-brand-500 transition">
                        <input type="radio" name="shipping_method" value="standard" data-price="15" class="peer hidden" {{ ($selectedShipping ?? '') == 'standard' ? 'checked' : '' }} />
                        <div class="flex items-center justify-between font-bold text-white mb-2">
                            <span>الشحن العادي</span>
                            <span class="text-emerald-400">15 ₪</span>
                        </div>
                        <span class="text-slate-400 text-[11px]">توصيل خلال 2-3 أيام عمل</span>
                    </label>

                    <label class="relative flex flex-col p-4 bg-slate-950/80 border border-slate-800 rounded-2xl cursor-pointer hover:border-brand-500 transition">
                        <input type="radio" name="shipping_method" value="express" data-price="30" class="peer hidden" {{ ($selectedShipping ?? '') == 'express' ? 'checked' : '' }} />
                        <div class="flex items-center justify-between font-bold text-white mb-2">
                            <span>الشحن السريع</span>
                            <span class="text-emerald-400">30 ₪</span>
                        </div>
                        <span class="text-slate-400 text-[11px]">توصيل في نفس اليوم/خلال 24 ساعة</span>
                    </label>
                </div>
            </div>

            <!-- 2. PERSONAL DETAILS -->
            <div class="glass-card rounded-3xl p-6 bg-slate-900/80 border border-slate-800 space-y-4">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-user-check text-brand-400"></i> البيانات الشخصية
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="space-y-1.5">
                        <label class="text-slate-300 font-semibold">الاسم الأول</label>
                        <input type="text" name="first_name" required placeholder="محمد"
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500" />
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-slate-300 font-semibold">الاسم الأخير</label>
                        <input type="text" name="last_name" required placeholder="أحمد"
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500" />
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-slate-300 font-semibold">البريد الإلكتروني</label>
                        <input type="email" name="email" required placeholder="name@example.com"
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left" />
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-slate-300 font-semibold">رقم الهاتف التواصل</label>
                        <input type="text" name="phone_number" required placeholder="059XXXXXXX"
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left" />
                    </div>
                </div>
            </div>

            <!-- 3. ADDRESS DETAILS -->
            <div class="glass-card rounded-3xl p-6 bg-slate-900/80 border border-slate-800 space-y-4">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-location-dot text-brand-400"></i> عنوان التوصيل والتسلم
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="space-y-1.5">
                        <label class="text-slate-300 font-semibold">المحافظة / المنطقة</label>
                        <select name="state" required class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500">
                            <option value="">اختر المنطقة</option>
                            <option value="gaza">قطاع غزة</option>
                            <option value="westbank">الضفة الغربية</option>
                        </select>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-slate-300 font-semibold">المدينة</label>
                        <input type="text" name="city" required placeholder="اسم المدينة"
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500" />
                    </div>
                    <div class="space-y-1.5 sm:col-span-2">
                        <label class="text-slate-300 font-semibold">العنوان التفصيلي (شارع / معلم بارز)</label>
                        <input type="text" name="address" required placeholder="الشارع، رقم البناية، الطابق..."
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500" />
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-slate-300 font-semibold">الرمز البريدي (اختياري)</label>
                        <input type="text" name="postal_code" placeholder="00970"
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500" />
                    </div>
                </div>
            </div>

            <!-- SUBMIT BUTTON -->
            <button type="submit" class="w-full bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-black py-4 rounded-full shadow-xl shadow-brand-600/30 transition text-sm">
                متابعة لتأكيد الطلب والدفع <i class="fa-solid fa-arrow-left ms-2"></i>
            </button>
        </form>
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