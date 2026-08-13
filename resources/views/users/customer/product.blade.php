<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $product->name }} - مرساة للتسوق الرقمي والبيع المباشر" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>{{ $product->name }} | مرساة Store</title>

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
                <a href="{{ route('customer.stores.show', $product->store_id) }}" class="hover:text-white transition">{{ $product->store->name }}</a>
                <span>/</span>
                <span class="text-slate-200 font-bold">{{ $product->name }}</span>
            </div>
        </div>
    </div>

    <!-- MAIN PRODUCT DETAILS AREA -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-10 w-full">

        <!-- PRODUCT MAIN CONTAINER (Gallery & Details Grid) -->
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-10" data-aos="fade-up">
            <!-- Left Column: Gallery -->
            <div class="space-y-4">
                @php
                $mainImage = $product->images()->where('is_main', true)->first();
                $otherImages = $product->images()->where('is_main', false)->get();
                $mainImgPath = $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/no-image.png');
                @endphp
                <div class="glass-card rounded-3xl p-4 bg-slate-900/80 border border-slate-800 overflow-hidden text-center aspect-square flex items-center justify-center relative group">
                    <img id="main-product-img" src="{{ $mainImgPath }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain rounded-2xl transition-all duration-300" />
                </div>

                <!-- Thumbnails Carousel -->
                <div class="flex items-center justify-center gap-3 overflow-x-auto no-scrollbar py-1">
                    @if($mainImage)
                    <img src="{{ asset('storage/' . $mainImage->image_path) }}" onclick="changeProductImage(this)"
                        class="w-16 h-16 object-cover rounded-2xl border-2 border-brand-500 cursor-pointer hover:scale-105 transition shrink-0" />
                    @endif
                    @foreach($otherImages as $img)
                    <img src="{{ asset('storage/' . $img->image_path) }}" onclick="changeProductImage(this)"
                        class="w-16 h-16 object-cover rounded-2xl border-2 border-slate-800 hover:border-brand-500 cursor-pointer hover:scale-105 transition shrink-0" />
                    @endforeach
                </div>
            </div>

            <!-- Right Column: Details & Actions -->
            <div class="glass-card rounded-3xl p-6 sm:p-8 bg-slate-900/70 border border-slate-800 space-y-5 flex flex-col justify-between">
                <div class="space-y-4">
                    <!-- Top Category & Rating Bar -->
                    <div class="flex items-center justify-between gap-2">
                        <span class="bg-brand-500/10 border border-brand-500/30 text-brand-400 text-xs font-bold px-3 py-1 rounded-full">
                            {{ $product->subcategory->name ?? 'قسم عام' }}
                        </span>

                        <!-- Product Rating Form -->
                        <form action="{{ route('customer.product.rate', $product->id) }}" method="POST" id="rating-form" class="flex items-center gap-1 bg-slate-950/80 px-3 py-1 rounded-full border border-slate-800">
                            @csrf
                            <div class="flex flex-row-reverse gap-1 text-accent-gold cursor-pointer text-sm">
                                @for($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{$i}}" name="rate" value="{{$i}}" class="hidden" />
                                <label for="star{{$i}}" title="{{$i}} نجوم" class="hover:scale-125 transition cursor-pointer">&#9733;</label>
                                @endfor
                            </div>
                            <span class="text-xs font-bold text-white me-1">{{ number_format($product->ratings()->avg('rate') ?? 0, 1) }}</span>
                        </form>
                    </div>

                    <!-- Title -->
                    <h1 class="text-2xl sm:text-3xl font-black text-white leading-tight">{{ $product->name }}</h1>

                    <!-- Compact Vendor Info Component -->
                    @if($product->store)
                    <div class="flex items-center justify-between bg-slate-950/60 p-3 rounded-2xl border border-slate-800/80">
                        <div class="flex items-center gap-3">
                            <img src="{{ $product->store->logo ? asset('storage/' . $product->store->logo) : asset('img/store-logo.jpg') }}"
                                alt="{{ $product->store->name }}" class="w-10 h-10 rounded-xl object-cover border border-slate-700 bg-slate-900 shrink-0" />
                            <div>
                                <a href="{{ route('customer.stores.show', $product->store_id) }}" class="font-bold text-white text-xs sm:text-sm hover:text-brand-400 transition block leading-tight">
                                    {{ $product->store->name }}
                                </a>
                                <span class="text-[11px] text-slate-400 block mt-0.5">التاجر: <strong class="text-slate-300 font-semibold">{{ $product->store->user->name ?? 'مرساة' }}</strong></span>
                            </div>
                        </div>
                        <a href="{{ route('customer.stores.show', $product->store_id) }}" class="bg-brand-600/10 hover:bg-brand-600 text-brand-400 hover:text-white text-[11px] font-bold px-3.5 py-1.5 rounded-full border border-brand-500/30 transition flex items-center gap-1.5 shrink-0">
                            <span>زيارة المتجر</span>
                            <i class="fa-solid fa-arrow-left text-[10px]"></i>
                        </a>
                    </div>
                    @endif

                    <!-- Price & Stock Info Block -->
                    <div class="flex flex-col gap-1 py-3 border-y border-slate-800/80">
                        <div class="flex items-baseline gap-3">
                            @if ($product->discount > 0)
                            <span class="text-3xl sm:text-4xl font-black text-emerald-400" id="display-price">
                                {{ number_format($product->price * (1 - $product->discount / 100), 2) }} <span class="text-base font-bold">₪</span>
                            </span>
                            <span class="text-sm text-slate-500 line-through">{{ $product->price }} ₪</span>
                            <span class="bg-rose-500/10 text-rose-400 border border-rose-500/30 text-[11px] font-black px-2.5 py-0.5 rounded-full">
                                خصم {{ $product->discount }}%
                            </span>
                            @else
                            <span class="text-3xl sm:text-4xl font-black text-emerald-400" id="display-price">{{ $product->price }} <span class="text-base font-bold">₪</span></span>
                            @endif
                        </div>

                        <div class="flex items-center gap-4 text-xs text-slate-400 mt-1">
                            <span>المبيعات: <strong class="text-white">{{ $product->total_sales }}</strong></span>
                            <span>•</span>
                            <span>المخزون:
                                @if($product->stock > 0)
                                <strong class="text-emerald-400">متوفر ({{ $product->stock }})</strong>
                                @else
                                <strong class="text-rose-400">نفذت الكمية</strong>
                                @endif
                            </span>
                        </div>
                    </div>

                    <!-- Short Description Snippet -->
                    @if($product->description)
                    <div class="text-slate-300 text-xs sm:text-sm leading-relaxed bg-slate-950/40 p-3.5 rounded-2xl border border-slate-800/60">
                        {{ Str::limit(strip_tags($product->description), 150, '...') }}
                        <button type="button" onclick="switchTab('description')" class="text-brand-400 hover:underline font-bold ms-1 text-xs outline-none">قراءة المزيد</button>
                    </div>
                    @endif
                </div>

                <!-- Product Variations Swatches & Action Bar -->
                <div class="space-y-5">
                    @if($product->variants->count() > 0)
                    <div class="space-y-2.5">
                        <div class="flex items-center justify-between">
                            <label class="font-bold text-white text-xs flex items-center gap-1.5">
                                <i class="fa-solid fa-sliders text-brand-400"></i> التشكيلة والخيارات المتاحة:
                            </label>
                            <span id="selected-variant-name" class="text-[11px] text-brand-400 font-bold">اختر الخيار</span>
                        </div>

                        <div class="flex flex-wrap gap-2.5" id="variants-swatch-container">
                            @foreach ($product->variants as $index => $variant)
                            @php
                            $variantLabel = '';
                            $isColor = false;
                            $colorHex = '#38bdf8';
                            $colorMap = [
                            'أحمر' => '#ef4444', 'red' => '#ef4444',
                            'أسود' => '#0f172a', 'black' => '#0f172a',
                            'أزرق' => '#3b82f6', 'blue' => '#3b82f6',
                            'أبيض' => '#ffffff', 'white' => '#ffffff',
                            'أخضر' => '#22c55e', 'green' => '#22c55e',
                            'رمادي' => '#64748b', 'grey' => '#64748b', 'gray' => '#64748b',
                            'وردي' => '#ec4899', 'pink' => '#ec4899',
                            'أصفر' => '#eab308', 'yellow' => '#eab308',
                            'بني' => '#78350f', 'brown' => '#78350f',
                            'برتقالي' => '#f97316', 'orange' => '#f97316',
                            'بنفسجي' => '#a855f7', 'purple' => '#a855f7',
                            'ذهبي' => '#eab308', 'gold' => '#eab308',
                            'فضي' => '#94a3b8', 'silver' => '#94a3b8',
                            ];

                            $attrNames = [];
                            foreach ($variant->attributeValues as $val) {
                            $attrName = strtolower(trim($val->attribute->name ?? ''));
                            $valText = trim($val->value);
                            $attrNames[] = $valText;

                            if (in_array($attrName, ['لون', 'اللون', 'color', 'colors'])) {
                            $isColor = true;
                            $colorHex = $colorMap[mb_strtolower($valText)] ?? (preg_match('/^#[0-9a-f]{3,6}$/i', $valText) ? $valText : '#38bdf8');
                            }
                            }
                            $variantLabel = count($attrNames) > 0 ? implode(' / ', $attrNames) : 'خيار ' . ($index + 1);
                            $variantImg = $variant->image ? asset('storage/' . $variant->image) : null;
                            @endphp

                            @if($isColor)
                            <!-- CIRCULAR COLOR DOT SWATCH -->
                            <button type="button"
                                class="swatch-btn group relative w-9 h-9 rounded-full p-0.5 border-2 border-slate-700 hover:border-brand-400 transition-all duration-200 flex items-center justify-center cursor-pointer select-none focus:outline-none"
                                data-id="{{ $variant->id }}"
                                data-price="{{ $variant->price }}"
                                data-image="{{ $variantImg }}"
                                data-label="{{ $variantLabel }}"
                                title="{{ $variantLabel }} ({{ $variant->price }} ₪)"
                                onclick="selectSwatch(this)">
                                <span class="w-full h-full rounded-full shadow-inner flex items-center justify-center transition-transform group-hover:scale-105" style="background-color: {{ $colorHex }}; border: {{ strtolower($colorHex) === '#ffffff' ? '1px solid #cbd5e1' : 'none' }};">
                                    <i class="fa-solid fa-check text-[10px] text-white drop-shadow check-icon hidden"></i>
                                </span>
                            </button>
                            @else
                            <!-- OUTLINED PILL BUTTON SWATCH -->
                            <button type="button"
                                class="swatch-btn px-4 py-2 rounded-xl border border-slate-700/80 bg-slate-950/80 text-slate-300 text-xs font-bold hover:border-brand-500/80 hover:bg-slate-900 transition-all duration-200 cursor-pointer select-none flex items-center gap-2 focus:outline-none"
                                data-id="{{ $variant->id }}"
                                data-price="{{ $variant->price }}"
                                data-image="{{ $variantImg }}"
                                data-label="{{ $variantLabel }}"
                                onclick="selectSwatch(this)">
                                @if($variantImg)
                                <img src="{{ $variantImg }}" class="w-4 h-4 rounded-full object-cover shrink-0" />
                                @endif
                                <span>{{ $variantLabel }}</span>
                                <span class="text-[11px] text-emerald-400 font-extrabold me-1">({{ $variant->price }} ₪)</span>
                            </button>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Action Form & Wishlist Integration -->
                    <form action="{{ route('customer.cart.add') }}" method="POST" id="add-to-cart-form" class="space-y-4" onsubmit="event.preventDefault(); addToCart({{ $product->id }}, $('#product-qty').val() || 1, this.querySelector('button[type=submit]'));">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="variant_id" id="selected-variant-id" value="">

                        <div class="flex items-center gap-3">
                            <!-- Quantity Selector -->
                            <div class="flex items-center bg-slate-950 border border-slate-800 rounded-full px-3 py-2 shrink-0">
                                <button type="button" onclick="adjustQty(-1)" class="text-slate-400 hover:text-white px-2 font-bold text-base select-none">-</button>
                                <input type="number" id="product-qty" name="qty" value="1" min="1" max="{{ $product->stock > 0 ? $product->stock : 999 }}" class="w-10 bg-transparent text-white font-bold text-center outline-none text-xs" />
                                <button type="button" onclick="adjustQty(1)" class="text-slate-400 hover:text-white px-2 font-bold text-base select-none">+</button>
                            </div>

                            <!-- Primary Add to Cart Button -->
                            @php
                            $userCartProductIds = $userCartProductIds ?? (Auth::check() ? \App\Models\CartItem::whereHas('cart', fn($q) => $q->where('user_id', Auth::id())->where('status', 'open'))->pluck('product_id')->toArray() : []);
                            $isInCart = in_array($product->id, $userCartProductIds);
                            @endphp
                            <button type="submit" class="flex-1 {{ $isInCart ? 'bg-gradient-to-r from-emerald-600 to-emerald-500 hover:from-emerald-500 hover:to-emerald-400' : 'bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400' }} text-white font-black py-3.5 px-6 rounded-full shadow-lg transition text-xs sm:text-sm flex items-center justify-center gap-2 group">
                                <i class="fa-solid {{ $isInCart ? 'fa-check' : 'fa-cart-plus' }} text-base group-hover:scale-110 transition-transform"></i>
                                <span class="cart-btn-text">{{ $isInCart ? 'في السلة' : 'إضافة إلى سلة المشتريات' }}</span>
                            </button>

                            <!-- Integrated Wishlist Button -->
                            @php
                            $isWishlisted = Auth::check() ? Auth::user()->wishlistProducts->contains($product->id) : false;
                            @endphp
                            <button type="button" onclick="toggleWishlist({{ $product->id }}, this)"
                                id="wishlist-btn-{{ $product->id }}"
                                title="{{ $isWishlisted ? 'إزالة من قائمة الرغبات' : 'إضافة إلى قائمة الرغبات' }}"
                                class="w-12 h-12 rounded-full border border-slate-700/80 hover:border-brand-500 bg-slate-950/80 hover:bg-slate-900 text-slate-300 hover:text-accent-coral flex items-center justify-center transition shrink-0 group cursor-pointer shadow-md">
                                <i class="{{ $isWishlisted ? 'fa-solid text-accent-coral' : 'fa-regular group-hover:scale-110' }} fa-heart text-lg transition-transform duration-200"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- PRODUCT INFORMATION TABS SECTION -->
        <section id="product-tabs-section" class="glass-card rounded-3xl p-6 sm:p-8 space-y-6 bg-slate-900/70 border border-slate-800" data-aos="fade-up">
            <!-- Tabs Navigation Header -->
            <div class="flex items-center gap-2 border-b border-slate-800 pb-4 overflow-x-auto no-scrollbar">
                <button type="button" onclick="switchTab('description')" id="tab-btn-description"
                    class="tab-nav-btn px-6 py-3 rounded-2xl text-xs sm:text-sm font-bold transition flex items-center gap-2.5 shrink-0 bg-brand-600 text-white shadow-lg shadow-brand-600/30">
                    <i class="fa-solid fa-file-lines text-sm"></i>
                    <span>الوصف</span>
                </button>

                <button type="button" onclick="switchTab('specs')" id="tab-btn-specs"
                    class="tab-nav-btn px-6 py-3 rounded-2xl text-xs sm:text-sm font-bold transition flex items-center gap-2.5 shrink-0 bg-slate-800/80 text-slate-300 hover:text-white hover:bg-slate-800">
                    <i class="fa-solid fa-list-check text-sm"></i>
                    <span>المواصفات</span>
                </button>

                <button type="button" onclick="switchTab('reviews')" id="tab-btn-reviews"
                    class="tab-nav-btn px-6 py-3 rounded-2xl text-xs sm:text-sm font-bold transition flex items-center gap-2.5 shrink-0 bg-slate-800/80 text-slate-300 hover:text-white hover:bg-slate-800">
                    <i class="fa-solid fa-comments text-sm"></i>
                    <span>آراء العملاء</span>
                    <span class="bg-slate-900 text-brand-400 text-[11px] font-black px-2 py-0.5 rounded-full border border-slate-700">
                        {{ $product->comments->count() }}
                    </span>
                </button>
            </div>

            <!-- TAB 1: DESCRIPTION PANE -->
            <div id="tab-pane-description" class="tab-pane space-y-4">
                <h4 class="text-base font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-align-right text-brand-400"></i> تفاصيل وصف المنتج
                </h4>
                <div class="text-slate-300 text-xs sm:text-sm leading-relaxed whitespace-pre-line bg-slate-950/60 p-5 rounded-2xl border border-slate-800/80">
                    {{ $product->description ?? 'لا يوجد وصف تفصيلي متوفر لهذا المنتج حالياً.' }}
                </div>
            </div>

            <!-- TAB 2: SPECIFICATIONS PANE -->
            <div id="tab-pane-specs" class="tab-pane hidden space-y-4">
                <h4 class="text-base font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-table-list text-brand-400"></i> مواصفات المنتج والبيانات التقنية
                </h4>
                <div class="overflow-x-auto rounded-2xl border border-slate-800 bg-slate-950/60">
                    <table class="w-full text-xs text-right text-slate-300">
                        <tbody class="divide-y divide-slate-800">
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="py-3.5 px-5 font-bold text-slate-400 w-1/3 bg-slate-900/40">اسم المنتج</td>
                                <td class="py-3.5 px-5 font-bold text-white">{{ $product->name }}</td>
                            </tr>
                            @if($product->subcategory)
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="py-3.5 px-5 font-bold text-slate-400 bg-slate-900/40">القسم / الفئة</td>
                                <td class="py-3.5 px-5 font-bold text-brand-400">{{ $product->subcategory->name }}</td>
                            </tr>
                            @endif
                            @if($product->store)
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="py-3.5 px-5 font-bold text-slate-400 bg-slate-900/40">المتجر / التاجر</td>
                                <td class="py-3.5 px-5 font-bold text-white">{{ $product->store->name }} ({{ $product->store->user->name ?? '' }})</td>
                            </tr>
                            @endif
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="py-3.5 px-5 font-bold text-slate-400 bg-slate-900/40">الحالة والمخزون</td>
                                <td class="py-3.5 px-5 font-bold text-emerald-400">
                                    {{ $product->stock > 0 ? 'متوفر في المخزون (' . $product->stock . ' قطعة)' : 'غير متوفر' }}
                                </td>
                            </tr>
                            @if($product->discount > 0)
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="py-3.5 px-5 font-bold text-slate-400 bg-slate-900/40">خصم العرض</td>
                                <td class="py-3.5 px-5 font-bold text-rose-400">{{ $product->discount }}% خصم لفترة محدودة</td>
                            </tr>
                            @endif
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="py-3.5 px-5 font-bold text-slate-400 bg-slate-900/40">تاريخ الإضافة</td>
                                <td class="py-3.5 px-5 font-bold text-slate-300">{{ $product->created_at?->format('Y-m-d') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TAB 3: REVIEWS PANE -->
            <div id="tab-pane-reviews" class="tab-pane hidden space-y-6">
                <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                    <h4 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-comments text-brand-400"></i> آراء العملاء وتقييماتهم
                    </h4>
                    <span class="text-xs text-slate-400 font-semibold">{{ $product->comments->count() }} تعليق</span>
                </div>

                <div class="space-y-3 max-h-96 overflow-y-auto pr-1">
                    @forelse($product->comments as $comment)
                    <div class="p-4 bg-slate-950/80 rounded-2xl border border-slate-800 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-white text-xs sm:text-sm flex items-center gap-2">
                                <i class="fa-solid fa-circle-user text-brand-400"></i> {{ $comment->user->name }}
                            </span>
                            @if($comment->rating)
                            <div class="flex items-center gap-1 text-accent-gold text-xs">
                                @for($i = 1; $i <= 5; $i++)
                                    <span style="color: {{ $i <= $comment->rating->rate ? '#ffb703' : '#334155' }}">&#9733;</span>
                                    @endfor
                            </div>
                            @endif
                        </div>
                        <p class="text-slate-300 text-xs leading-relaxed">{{ $comment->comment }}</p>
                    </div>
                    @empty
                    <div class="py-8 text-center text-slate-500 text-xs">لا توجد تعليقات سابقة لهذا المنتج. كن أول من يضيف رأيه!</div>
                    @endforelse
                </div>

                <form action="{{ route('customer.products.comments.store', $product->id) }}" method="POST" class="pt-4 border-t border-slate-800 space-y-3">
                    @csrf
                    <textarea name="comment" required placeholder="أضف تجربتك أو تعليقك حول هذا المنتج..." rows="3"
                        class="w-full bg-slate-950 border border-slate-800 text-white rounded-2xl p-4 text-xs outline-none focus:border-brand-500 resize-none"></textarea>
                    <button type="submit" class="bg-brand-600 hover:bg-brand-500 text-white font-bold text-xs px-6 py-3 rounded-full transition shadow-lg shadow-brand-600/30">
                        إرسال التعليق
                    </button>
                </form>
            </div>
        </section>

        <!-- RELEVANT PRODUCTS SECTION -->
        <section class="space-y-6" data-aos="fade-up">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <h3 class="text-2xl font-black text-white">منتجات ذات صلة</h3>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($relevantProducts as $relProduct)
                @php
                $relImage = $relProduct->images()->where('is_main', true)->first();
                @endphp
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col justify-between group transition-all duration-300">
                    <div class="relative aspect-square overflow-hidden bg-slate-900/80">
                        <a href="{{ route('customer.product.show', $relProduct->id) }}" class="block w-full h-full">
                            <img src="{{ $relImage ? asset('storage/' . $relImage->image_path) : asset('images/no-image.png') }}"
                                alt="{{ $relProduct->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" />
                        </a>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <h4 class="font-bold text-white text-sm truncate hover:text-brand-400 transition">
                                <a href="{{ route('customer.product.show', $relProduct->id) }}">{{ $relProduct->name }}</a>
                            </h4>
                            @php
                            $relAvgRate = round($relProduct->ratings ? ($relProduct->ratings->avg('rate') ?? 5.0) : 5.0, 1);
                            $relFullStars = floor($relAvgRate);
                            $relHasHalf = ($relAvgRate - $relFullStars) >= 0.5;
                            @endphp
                            <a href="{{ route('customer.product.show', $relProduct->id) }}#reviews" title="عرض التقييمات والمراجعات" class="inline-flex items-center gap-1.5 text-xs text-slate-300 hover:text-accent-gold transition mt-1">
                                <div class="flex items-center gap-0.5 text-accent-gold text-[11px]">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <=$relFullStars)
                                        <i class="fa-solid fa-star text-accent-gold"></i>
                                        @elseif ($i == $relFullStars + 1 && $relHasHalf)
                                        <i class="fa-solid fa-star-half-stroke text-accent-gold"></i>
                                        @else
                                        <i class="fa-regular fa-star text-slate-600"></i>
                                        @endif
                                        @endfor
                                </div>
                                <span class="font-bold text-slate-300 text-[11px]">({{ number_format($relAvgRate, 1) }})</span>
                            </a>
                            @if($relProduct->store)
                            <div class="text-xs text-slate-400 mt-1 flex items-center gap-1">
                                <span>البائع:</span>
                                <a href="{{ route('customer.stores.show', $relProduct->store->id) }}" class="text-brand-400 font-semibold hover:underline">
                                    {{ $relProduct->store->name }}
                                </a>
                            </div>
                            @endif
                            <p class="text-emerald-400 font-extrabold text-sm mt-1">{{ $relProduct->price }} ₪</p>
                        </div>
                        <a href="{{ route('customer.product.show', $relProduct->id) }}" class="w-full text-center bg-slate-800 hover:bg-brand-600 text-slate-200 hover:text-white font-bold py-2.5 rounded-full text-xs transition">
                            عرض التفاصيل
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-slate-400 border-t border-slate-800 text-xs mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p>© {{ date('Y') }} جميع الحقوق محفوظة - مرساة Store</p>
        </div>
    </footer>

    <!-- CART DRAWER -->
    <div id="cart-drawer-overlay" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-[100] hidden transition-opacity duration-300 opacity-0">
        <div id="cart-drawer" class="fixed inset-y-0 left-0 w-full sm:w-96 bg-slate-900 border-r border-slate-800 shadow-2xl flex flex-col justify-between transform -translate-x-full transition-transform duration-300 ease-in-out">
            <div class="p-5 border-b border-slate-800 flex items-center justify-between bg-slate-950">
                <h3 class="font-bold text-white text-base flex items-center gap-2">
                    <i class="fa-solid fa-cart-shopping text-brand-500"></i> سلة المشتريات
                </h3>
                <button id="close-cart-btn" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="p-5 flex-1 overflow-y-auto space-y-4">
                @php $hasItems = false; @endphp
                @foreach ($carts as $cart)
                @foreach ($cart->items as $item)
                @php $hasItems = true; @endphp
                <div class="flex items-center gap-3 p-3 bg-slate-800/60 rounded-2xl border border-slate-700/60">
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-white text-xs truncate">{{ $item->name }}</h4>
                        <div class="text-emerald-400 font-extrabold text-xs mt-1">{{ number_format($item->price, 2) }} ₪</div>
                    </div>
                </div>
                @endforeach
                @endforeach
                @if(!$hasItems)
                <div class="py-16 text-center text-slate-400 text-xs">السلة فارغة حالياً</div>
                @endif
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true
            });

            document.querySelectorAll('#rating-form label').forEach(label => {
                label.addEventListener('click', function() {
                    const input = document.getElementById(this.getAttribute('for'));
                    if (input) {
                        input.checked = true;
                        document.getElementById('rating-form').submit();
                    }
                });
            });

            // Cart & User Controls
            const cartDrawerOverlay = document.getElementById('cart-drawer-overlay');
            const cartDrawer = document.getElementById('cart-drawer');
            const openCartBtn = document.getElementById('open-cart-btn');
            const closeCartBtn = document.getElementById('close-cart-btn');

            if (openCartBtn) openCartBtn.addEventListener('click', () => {
                cartDrawerOverlay.classList.remove('hidden');
                setTimeout(() => {
                    cartDrawerOverlay.classList.remove('opacity-0');
                    cartDrawer.classList.remove('-translate-x-full');
                }, 10);
            });

            if (closeCartBtn) closeCartBtn.addEventListener('click', () => {
                cartDrawerOverlay.classList.add('opacity-0');
                cartDrawer.classList.add('-translate-x-full');
                setTimeout(() => cartDrawerOverlay.classList.add('hidden'), 300);
            });

            // Auto select first variant swatch if available
            const firstSwatch = document.querySelector('.swatch-btn');
            if (firstSwatch) {
                selectSwatch(firstSwatch);
            }

            // Check URL hash for direct tab navigation e.g. #reviews
            if (window.location.hash === '#reviews') {
                switchTab('reviews');
            }
        });

        function adjustQty(amount) {
            const qtyInput = document.getElementById('product-qty');
            if (qtyInput) {
                let current = parseInt(qtyInput.value) || 1;
                let min = parseInt(qtyInput.min) || 1;
                let max = parseInt(qtyInput.max) || 999;
                let updated = current + amount;
                if (updated >= min && updated <= max) {
                    qtyInput.value = updated;
                }
            }
        }

        function selectSwatch(btn) {
            if (!btn) return;
            const container = document.getElementById('variants-swatch-container');
            if (container) {
                container.querySelectorAll('.swatch-btn').forEach(b => {
                    b.classList.remove('border-brand-500', 'ring-4', 'ring-brand-500/30', 'ring-2', 'ring-brand-500/40', 'bg-brand-500/15', 'text-brand-400', 'scale-105');
                    b.classList.add('border-slate-700/80');
                    const checkIcon = b.querySelector('.check-icon');
                    if (checkIcon) checkIcon.classList.add('hidden');
                });
            }

            const isColor = btn.classList.contains('w-9');
            if (isColor) {
                btn.classList.remove('border-slate-700/80', 'border-slate-700');
                btn.classList.add('border-brand-500', 'ring-4', 'ring-brand-500/30', 'scale-105');
                const checkIcon = btn.querySelector('.check-icon');
                if (checkIcon) checkIcon.classList.remove('hidden');
            } else {
                btn.classList.remove('border-slate-700/80');
                btn.classList.add('border-brand-500', 'ring-2', 'ring-brand-500/40', 'bg-brand-500/15', 'text-brand-400');
            }

            const variantId = btn.getAttribute('data-id');
            const price = btn.getAttribute('data-price');
            const image = btn.getAttribute('data-image');
            const label = btn.getAttribute('data-label');

            const hiddenInput = document.getElementById('selected-variant-id');
            if (hiddenInput) hiddenInput.value = variantId;

            const nameDisplay = document.getElementById('selected-variant-name');
            if (nameDisplay && label) nameDisplay.textContent = label;

            const priceDisplay = document.getElementById('display-price');
            if (priceDisplay && price) {
                priceDisplay.innerHTML = `${parseFloat(price).toFixed(2)} <span class="text-base font-bold">₪</span>`;
            }

            if (image) {
                const mainImg = document.getElementById('main-product-img');
                if (mainImg) mainImg.src = image;
            }
        }

        function switchTab(tabName) {
            const tabsSection = document.getElementById('product-tabs-section');
            if (!tabsSection) return;

            document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.add('hidden'));

            document.querySelectorAll('.tab-nav-btn').forEach(btn => {
                btn.classList.remove('bg-brand-600', 'text-white', 'shadow-lg', 'shadow-brand-600/30');
                btn.classList.add('bg-slate-800/80', 'text-slate-300');
            });

            const targetPane = document.getElementById(`tab-pane-${tabName}`);
            const targetBtn = document.getElementById(`tab-btn-${tabName}`);

            if (targetPane) targetPane.classList.remove('hidden');
            if (targetBtn) {
                targetBtn.classList.remove('bg-slate-800/80', 'text-slate-300');
                targetBtn.classList.add('bg-brand-600', 'text-white', 'shadow-lg', 'shadow-brand-600/30');
            }
        }

        function toggleWishlist(productId, btn) {
            $.ajax({
                url: "{{ route('customer.wishlist.toggle') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId
                },
                success: function(response) {
                    const icon = btn.querySelector('i');
                    if (response.is_wishlisted) {
                        icon.className = 'fa-solid fa-heart text-accent-coral text-lg transition-transform duration-200';
                        btn.setAttribute('title', 'إزالة من قائمة الرغبات');
                    } else {
                        icon.className = 'fa-regular fa-heart text-lg group-hover:scale-110 transition-transform duration-200';
                        btn.setAttribute('title', 'إضافة إلى قائمة الرغبات');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        alert('يرجى تسجيل الدخول أولاً لإضافة المنتجات إلى قائمة الرغبات');
                    } else {
                        console.error('Wishlist error:', xhr);
                    }
                }
            });
        }

        function changeProductImage(element) {
            const mainImg = document.getElementById('main-product-img');
            if (mainImg && element) {
                mainImg.src = element.src;
            }
        }
    </script>
</body>

</html>