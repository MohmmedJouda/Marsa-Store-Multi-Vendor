<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="جميع المنتجات - مرساة للتسوق الرقمي والبيع المباشر المضمون" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>كافة المنتجات | مرساة Store</title>

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
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <!-- AOS Animation -->
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
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.65);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-card:hover {
            border-color: rgba(0, 102, 255, 0.45);
            box-shadow: 0 20px 40px -15px rgba(0, 102, 255, 0.3);
        }

        .gradient-text {
            background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 50%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0b192c;
        }

        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #0066ff;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-[#0b192c] text-slate-100 min-h-screen flex flex-col antialiased selection:bg-brand-500 selection:text-white">

    <!-- 1. TOP ANNOUNCEMENT BAR -->
    <!-- CENTRALIZED GLOBAL HEADER COMPONENT -->
    <x-global-header variant="standard" :categories="$categories ?? collect()" :carts="$carts ?? null" :userWishlistIds="$userWishlistIds ?? []" />

    <!-- BREADCRUMBS -->
    <div class="bg-slate-950/60 border-b border-slate-800/80 py-3 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <div class="flex items-center gap-2 text-slate-400">
                <a href="{{ route('customer.main-page') }}" class="hover:text-white transition flex items-center gap-1">
                    <i class="fa-solid fa-house text-brand-400"></i> الرئيسية
                </a>
                <span>/</span>
                <span class="text-slate-200 font-bold">معرض المنتجات</span>
            </div>
        </div>
    </div>

    <!-- PRODUCTS CATALOG -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10 w-full">

        <!-- HEADER BANNER -->
        <section class="glass-card rounded-3xl p-8 sm:p-10 relative overflow-hidden bg-gradient-to-br from-brand-950 via-slate-900 to-slate-950 border border-slate-700/60 shadow-2xl" data-aos="fade-up">
            <div class="max-w-2xl space-y-4">
                <span class="inline-flex items-center gap-2 bg-brand-500/10 border border-brand-500/30 text-brand-400 text-xs font-bold px-3.5 py-1.5 rounded-full">
                    <i class="fa-solid fa-boxes-stacked"></i> السوق العام
                </span>
                <h1 class="text-3xl sm:text-4xl font-black text-white leading-tight">
                    استكشف كافة <span class="gradient-text">المنتجات والمعروضات</span>
                </h1>
                <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                    تصفح أحدث المنتجات من جميع المتاجر المعتمدة بأسعار ممتازة وضمان تسوق آمن.
                </p>
            </div>
        </section>

        <!-- PRODUCTS GRID -->
        <section class="space-y-6" data-aos="fade-up">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($products as $product)
                @php
                $mainImage = $product->images()->where('is_main', true)->first();
                $averageRate = $product->ratings->avg('rate') ?? 0;
                $finalPrice = number_format($product->price * (1 - $product->discount / 100), 2);
                @endphp
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col justify-between group transition-all duration-300">
                    <div class="relative aspect-square overflow-hidden bg-slate-900/80">
                        @if($product->discount > 0)
                        <span class="absolute top-3 right-3 z-10 bg-rose-600 text-white font-black text-xs px-2.5 py-1 rounded-full shadow-lg">
                            -{{ round($product->discount) }}%
                        </span>
                        @endif

                        <a href="{{ route('customer.product.show', $product->id) }}" class="block w-full h-full">
                            <img src="{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/no-image.png') }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        </a>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center justify-between text-xs text-slate-400 mb-2">
                                <span class="bg-slate-800 px-2.5 py-0.5 rounded-md text-slate-300 font-medium">
                                    {{ $product->subcategory->name ?? 'قسم عام' }}
                                </span>
                                <button type="button"
                                    onclick="toggleWishlist(this, {{ $product->id }})"
                                    title="قائمة الرغبات"
                                    class="group/wishlist h-9 px-2.5 hover:px-3 rounded-full bg-slate-800/80 hover:bg-rose-500/20 text-slate-400 hover:text-rose-500 border border-slate-700/60 hover:border-rose-500/40 flex items-center justify-center gap-0 group-hover/wishlist:gap-1.5 shadow transition-all duration-300 ease-out hover:scale-105 shrink-0">
                                    <i class="{{ in_array($product->id, $userWishlistIds ?? []) ? 'fa-solid fa-heart text-rose-500' : 'fa-regular fa-heart text-slate-400 group-hover/wishlist:text-rose-500' }} text-xs shrink-0 transition-colors"></i>
                                    <span class="wishlist-text max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/wishlist:max-w-[100px] group-hover/wishlist:opacity-100 transition-all duration-300 text-[11px] font-bold">
                                        {{ in_array($product->id, $userWishlistIds ?? []) ? 'في المفضلة' : 'أضف للمفضلة' }}
                                    </span>
                                </button>
                            </div>

                            <h3 class="font-bold text-white text-base line-clamp-1 hover:text-brand-400 transition">
                                <a href="{{ route('customer.product.show', $product->id) }}">{{ $product->name }}</a>
                            </h3>

                            @php
                            $prAvgRate = round($averageRate > 0 ? $averageRate : 5.0, 1);
                            $prFullStars = floor($prAvgRate);
                            $prHasHalf = ($prAvgRate - $prFullStars) >= 0.5;
                            @endphp
                            <a href="{{ route('customer.product.show', $product->id) }}#reviews" title="عرض التقييمات والمراجعات" class="inline-flex items-center gap-1.5 text-xs text-slate-300 hover:text-accent-gold transition mt-1">
                                <div class="flex items-center gap-0.5 text-accent-gold text-[11px]">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <=$prFullStars)
                                        <i class="fa-solid fa-star text-accent-gold"></i>
                                        @elseif ($i == $prFullStars + 1 && $prHasHalf)
                                        <i class="fa-solid fa-star-half-stroke text-accent-gold"></i>
                                        @else
                                        <i class="fa-regular fa-star text-slate-600"></i>
                                        @endif
                                        @endfor
                                </div>
                                <span class="font-bold text-slate-300 text-[11px]">({{ number_format($prAvgRate, 1) }})</span>
                            </a>

                            @if($product->store)
                            <div class="text-xs text-slate-400 mt-1 flex items-center gap-1">
                                <span>البائع:</span>
                                <a href="{{ route('customer.stores.show', $product->store->id) }}" class="text-brand-400 font-semibold hover:underline">
                                    {{ $product->store->name }}
                                </a>
                            </div>
                            @endif
                        </div>

                        <div class="pt-3 border-t border-slate-800/80 flex items-center justify-between">
                            <div>
                                @if($product->discount > 0)
                                <span class="text-xs text-slate-500 line-through block">{{ $product->price }} ₪</span>
                                <span class="text-lg font-black text-emerald-400">{{ $finalPrice }} <span class="text-xs">₪</span></span>
                                @else
                                <span class="text-lg font-black text-emerald-400">{{ $product->price }} <span class="text-xs">₪</span></span>
                                @endif
                            </div>

                            @php $userCartProductIds = $userCartProductIds ?? (Auth::check() ? \App\Models\CartItem::whereHas('cart', fn($q) => $q->where('user_id', Auth::id())->where('status', 'open'))->pluck('product_id')->toArray() : []); @endphp
                            @php $isInCart = in_array($product->id, $userCartProductIds); @endphp
                            <button type="button" onclick="addToCart({{ $product->id }}, 1, this)" title="{{ $isInCart ? 'في السلة' : 'أضف للسلة' }}"
                                class="group/btn h-10 px-3 hover:px-4 rounded-full {{ $isInCart ? 'bg-emerald-600 hover:bg-emerald-500' : 'bg-brand-600 hover:bg-brand-500' }} text-white flex items-center justify-center gap-0 group-hover/btn:gap-2 shadow-lg transition-all duration-300 ease-out hover:scale-105">
                                <i class="fa-solid {{ $isInCart ? 'fa-check' : 'fa-cart-plus' }} text-sm shrink-0"></i>
                                <span class="max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/btn:max-w-[100px] group-hover/btn:opacity-100 transition-all duration-300 text-xs font-bold cart-btn-text">
                                    {{ $isInCart ? 'في السلة' : 'أضف للسلة' }}
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-16 text-center text-slate-400 glass-card rounded-3xl space-y-3">
                    <i class="fa-solid fa-box-open text-4xl text-slate-600 block"></i>
                    <p class="text-sm">لا توجد منتجات مضافة حالياً</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination Links -->
            @if(method_exists($products, 'links'))
            <div class="pt-6 border-t border-slate-800 flex justify-center">
                {{ $products->links() }}
            </div>
            @endif
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-slate-400 border-t border-slate-800 text-xs mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p>© {{ date('Y') }} جميع الحقوق محفوظة - مرساة Store</p>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true
            });
        });
    </script>
</body>

</html>