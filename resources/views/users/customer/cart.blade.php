<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="سلة المشتريات - مرساة للتسوق الرقمي" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>سلة المشتريات | مرساة Store</title>

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

    <!-- CENTRALIZED GLOBAL HEADER COMPONENT -->
    <x-global-header variant="standard" :categories="$categories ?? collect()" :carts="$carts ?? null" :userWishlistIds="$userWishlistIds ?? []" />

    <!-- BREADCRUMBS -->
    <div class="bg-slate-950/60 border-b border-slate-800/80 py-3 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-slate-400">
                <a href="{{ route('customer.main-page') }}" class="hover:text-white">الرئيسية</a>
                <span>/</span>
                <span class="text-slate-200 font-bold">سلة المشتريات</span>
            </div>
        </div>
    </div>

    <!-- MAIN CART CONTENT -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full space-y-8">
        <div class="border-b border-slate-800 pb-4">
            <h1 class="text-3xl font-black text-white flex items-center gap-3">
                <i class="fa-solid fa-cart-shopping text-brand-400"></i> سلة المشتريات
            </h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8" data-aos="fade-up">
            <!-- Items List -->
            <div class="lg:col-span-2 space-y-4">
                @forelse ($items as $item)
                @php
                $mainImg = $item->product?->images()->where('is_main', true)->first();
                $isFav = in_array($item->product_id, $userWishlistIds ?? []);
                @endphp
                <div id="cart-item-row-{{ $item->id }}" class="glass-card rounded-3xl p-5 flex flex-col sm:flex-row items-center justify-between gap-5 bg-slate-900/70 border border-slate-800 hover:border-brand-500/30 transition">
                    <div class="flex items-center gap-4 w-full sm:w-auto">
                        <img src="{{ $mainImg ? asset('storage/' . $mainImg->image_path) : asset('images/no-image.png') }}"
                            alt="{{ $item->name }}" class="w-20 h-20 object-cover rounded-2xl bg-slate-950 shrink-0" />
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <h3 class="font-bold text-white text-base hover:text-brand-400 transition">
                                    <a href="{{ route('customer.product.show', $item->product_id) }}">{{ $item->name }}</a>
                                </h3>
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                    <i class="fa-solid fa-cart-shopping text-xs"></i> في السلة
                                </span>
                            </div>
                            <div class="text-xs text-slate-400">تاريخ الإضافة: {{ $item->created_at?->format('Y-m-d') }}</div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between sm:justify-end gap-3 w-full sm:w-auto border-t sm:border-t-0 pt-3 sm:pt-0 border-slate-800">
                        <span class="text-xl font-black text-emerald-400 me-2">{{ number_format($item->price, 2) }} ₪</span>
                        
                        <button type="button" onclick="toggleWishlist(this, {{ $item->product_id }})" title="{{ $isFav ? 'في المفضلة' : 'أضف للمفضلة' }}" class="w-10 h-10 rounded-full bg-slate-800 hover:bg-slate-700 flex items-center justify-center transition group">
                            <i class="{{ $isFav ? 'fa-solid fa-heart text-rose-500' : 'fa-regular fa-heart text-slate-400' }} text-sm transition group-hover:scale-110"></i>
                        </button>

                        <button type="button" onclick="removeFromCart({{ $item->id }}, this)" class="w-10 h-10 rounded-full bg-rose-500/10 hover:bg-rose-500 text-rose-400 hover:text-white flex items-center justify-center transition" title="حذف المنتج">
                            <i class="fa-solid fa-trash-can text-sm"></i>
                        </button>
                    </div>
                </div>
                @empty
                <div class="glass-card rounded-3xl py-16 text-center text-slate-400 space-y-4">
                    <i class="fa-solid fa-cart-flatbed text-5xl text-slate-600 block"></i>
                    <p class="text-sm font-semibold">سلة المشتريات فارغة حالياً</p>
                    <a href="{{ route('customer.main-page') }}" class="inline-block bg-brand-600 hover:bg-brand-500 text-white font-bold text-xs px-6 py-3 rounded-full transition shadow-lg">
                        العودة للتسوق
                    </a>
                </div>
                @endforelse
            </div>

            <!-- Order Summary Sidebar -->
            <div class="glass-card rounded-3xl p-6 bg-slate-900/90 border border-slate-800 space-y-6 h-fit">
                <h3 class="text-xl font-bold text-white border-b border-slate-800 pb-3">ملخص الطلب</h3>

                <div class="space-y-3 text-xs">
                    <div class="flex justify-between text-slate-300">
                        <span>عدد العناصر:</span>
                        <span class="font-bold text-white">{{ $items->count() }} منتجات</span>
                    </div>
                    <div class="flex justify-between text-slate-300">
                        <span>الشحن والخدمات:</span>
                        <span class="font-bold text-emerald-400">يحدد عند الدفع</span>
                    </div>
                    <hr class="border-slate-800">
                    <div class="flex justify-between text-sm font-bold">
                        <span class="text-white">الإجمالي:</span>
                        <span class="text-xl font-black text-emerald-400">{{ number_format($items->sum('price'), 2) }} ₪</span>
                    </div>
                </div>

                @if($items->count() > 0)
                <a href="{{ route('customer.checkout.show') }}" class="block w-full text-center bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-black py-4 rounded-full shadow-lg shadow-brand-600/30 transition text-xs">
                    الانتقال لإتمام الدفع والطلب <i class="fa-solid fa-arrow-left ms-2"></i>
                </a>
                @endif
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