<x-store-layout :categories="$categories" :carts="$carts ?? null" :userWishlistIds="$userWishlistIds ?? []" :wishlistProducts="$wishlistProducts ?? []" :totalPrice="$totalPrice ?? 0">

    <!-- MOBILE SEARCH BAR -->
    <div class="md:hidden px-4 pt-3 pb-2 bg-slate-900 border-b border-slate-800">
        <div class="relative flex items-center">
            <input type="text" id="mobile-search-input" placeholder="ابحث عن المنتجات والمتاجر..."
                class="w-full bg-slate-950 text-white placeholder-slate-400 text-xs rounded-full py-3 pr-10 pl-4 border border-slate-800 outline-none" />
            <i class="fa-solid fa-magnifying-glass absolute right-3.5 text-slate-400 text-xs"></i>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="flex-grow space-y-20 py-8">

        <!-- 4. HERO BANNER & PROMO CARDS -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Main Featured Hero Banner (Left / Center Large) -->
                <div class="lg:col-span-2 relative rounded-3xl overflow-hidden glass-card min-h-[380px] sm:min-h-[440px] flex items-center p-8 sm:p-12 bg-gradient-to-br from-brand-900 via-slate-900 to-slate-950 shadow-2xl border border-slate-700/60" data-aos="fade-left">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-brand-500/25 via-transparent to-transparent pointer-events-none"></div>

                    <div class="relative z-10 max-w-xl space-y-6">
                        <div class="inline-flex items-center gap-2 bg-brand-500/10 border border-brand-500/30 text-brand-400 text-xs font-extrabold px-4 py-1.5 rounded-full">
                            <i class="fa-solid fa-crown text-accent-gold"></i> المنصة المعتمدة للتسوق المباشر
                        </div>
                        <h1 class="text-3xl sm:text-5xl font-black text-white leading-tight">
                            مرساتك الآمنة لجميع <span class="gradient-accent-text">مشترياتك واحتياجاتك</span>
                        </h1>
                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                            استمتع بتجربة تسوق عالمية شاملة لكل ما تحتاجه مع ضمان الأمان وحرية الاختيار بين أفضل المتاجر والمنتجات المحلية والعالمية.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-2">
                            <a href="#new-products" class="bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-extrabold text-sm px-8 py-4 rounded-full shadow-xl shadow-brand-600/40 transition hover:scale-105">
                                استكشف العروض الحالية
                            </a>
                            <a href="{{ route('customer.stores.index') }}" class="bg-slate-800/90 hover:bg-slate-700 text-slate-200 font-bold text-sm px-7 py-4 rounded-full border border-slate-700 transition">
                                تصفح المتاجر المعتمدة
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Side Hero Cards -->
                <div class="space-y-6 flex flex-col justify-between" data-aos="fade-right">
                    <!-- Top Promo Card -->
                    <div class="glass-card rounded-3xl p-6 bg-gradient-to-tr from-slate-900 via-slate-900 to-slate-800/90 relative overflow-hidden flex-1 flex flex-col justify-between border border-slate-700/60">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold text-accent-orange bg-accent-orange/10 px-3 py-1 rounded-full border border-accent-orange/20">
                                تنزيلات أسبوعية
                            </span>
                            <i class="fa-solid fa-fire text-accent-orange text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">تخفيضات كبرى تصل إلى 50%</h3>
                            <p class="text-slate-400 text-xs mb-4">على كافة المنتجات الفيزيائية والرقمية ومستلزمات التسوق.</p>
                        </div>
                        <a href="#new-products" class="text-xs font-bold text-brand-400 hover:text-brand-300 flex items-center gap-1.5">
                            استكشف التخفيضات <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>

                    <!-- Bottom Security Guarantee Card -->
                    <div class="glass-card rounded-3xl p-6 bg-gradient-to-br from-slate-900 to-brand-950 relative overflow-hidden flex-1 flex flex-col justify-between border border-slate-700/60">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold text-emerald-400 bg-emerald-400/10 px-3 py-1 rounded-full border border-emerald-400/20">
                                تسوق آمن 100%
                            </span>
                            <i class="fa-solid fa-shield-check text-emerald-400 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">أمان كامل وتتبع المشتريات</h3>
                            <p class="text-slate-400 text-xs mb-4">ضمان الشحن والتوصيل والتواصل المباشر مع التجار لكافة المنتجات.</p>
                        </div>
                        <a href="#howus" class="text-xs font-bold text-slate-300 hover:text-white flex items-center gap-1.5">
                            تعرف علينا أكثر <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- 5. TRUST BADGES BAR -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-6 glass-card rounded-3xl bg-slate-900/60 border border-slate-800 divide-y md:divide-y-0 md:divide-x md:divide-x-reverse divide-slate-800">
                <div class="flex items-center gap-4 p-3">
                    <div class="w-12 h-12 rounded-2xl bg-brand-500/10 border border-brand-500/20 flex items-center justify-center text-brand-400 text-xl shrink-0">
                        <i class="fa-solid fa-truck-ramp-box"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">توصيل سريع</h4>
                        <p class="text-[11px] text-slate-400">توصيل لكافة المحافظات والمناطق</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 p-3 pt-4 md:pt-3">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 text-xl shrink-0">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">دفع آمن 100%</h4>
                        <p class="text-[11px] text-slate-400">حماية فائقة لبياناتك ومعاملاتك</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 p-3 pt-4 md:pt-3">
                    <div class="w-12 h-12 rounded-2xl bg-accent-gold/10 border border-accent-gold/20 flex items-center justify-center text-accent-gold text-xl shrink-0">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">جودة مضمونة</h4>
                        <p class="text-[11px] text-slate-400">منتجات أصلية من متاجر موثوقة</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 p-3 pt-4 md:pt-3">
                    <div class="w-12 h-12 rounded-2xl bg-accent-coral/10 border border-accent-coral/20 flex items-center justify-center text-accent-coral text-xl shrink-0">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">دعم متواصل</h4>
                        <p class="text-[11px] text-slate-400">فريق خدمة العملاء متواجد للمساعدة</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. TIME-SENSITIVE FLASH SALE SECTION (عروض فلاش! لفترة محدودة) -->
        <section id="new-products" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between border-b border-slate-800 pb-4 gap-4">
                <div>
                    <div class="flex items-center gap-2 text-rose-500 text-xs font-black mb-1 uppercase tracking-wider">
                        <i class="fa-solid fa-bolt text-amber-400 animate-pulse"></i> صفقة اليوم الفائقة
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">عروض فلاش! لفترة محدودة</h2>
                </div>

                <!-- Live Countdown Timer -->
                <div class="flex items-center gap-2 bg-slate-900/90 border border-rose-500/40 px-4 py-2 rounded-full text-xs font-mono font-bold text-rose-400 shadow-xl shadow-rose-950/20 shrink-0">
                    <i class="fa-solid fa-clock text-rose-500 text-sm animate-spin" style="animation-duration: 6s;"></i>
                    <span class="text-slate-300 font-sans font-semibold">ينتهي العرض خلال:</span>
                    <span id="flash-sale-countdown" class="text-amber-400 text-sm font-black tracking-widest font-mono">08:42:15</span>
                </div>
            </div>

            <!-- Flash Sale Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                @php
                $mainImage = $product->images()->where('is_main', true)->first();
                $averageRate = $product->ratings->avg('rate') ?? 0;
                $rawDiscount = $product->discount > 0 ? $product->discount : 25;
                $rawSaved = $product->price * ($rawDiscount / 100);
                $finalPrice = number_format($product->price - $rawSaved, 2);
                $savedAmount = number_format($rawSaved, 2);
                $remainingStock = rand(3, 9);
                $stockPercentage = max(20, $remainingStock * 10);
                @endphp
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col justify-between group transition-all duration-300 border border-slate-800 hover:border-rose-500/40 hover:shadow-2xl hover:shadow-rose-500/10">
                    <div class="relative aspect-square overflow-hidden bg-slate-900/80">
                        <span class="absolute top-3 right-3 z-10 bg-gradient-to-r from-rose-600 to-rose-500 text-white font-black text-xs px-3 py-1 rounded-full shadow-xl flex items-center gap-1">
                            <i class="fa-solid fa-bolt text-amber-300 text-[10px]"></i> خصم {{ round($rawDiscount) }}%
                        </span>

                        <button type="button"
                            onclick="toggleWishlist(this, {{ $product->id }})"
                            title="قائمة الرغبات"
                            class="group/wishlist absolute top-3 left-3 z-20 h-9 px-2.5 hover:px-3 rounded-full bg-slate-900/70 backdrop-blur-md hover:bg-rose-500/20 text-slate-300 hover:text-rose-500 border border-slate-700/80 hover:border-rose-500/50 flex items-center justify-center gap-0 group-hover/wishlist:gap-1.5 shadow-lg transition-all duration-300 ease-out hover:scale-105">
                            <i class="{{ in_array($product->id, $userWishlistIds ?? []) ? 'fa-solid fa-heart text-rose-500' : 'fa-regular fa-heart text-slate-300 group-hover/wishlist:text-rose-500' }} text-xs shrink-0 transition-colors"></i>
                            <span class="wishlist-text max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/wishlist:max-w-[100px] group-hover/wishlist:opacity-100 transition-all duration-300 text-[11px] font-bold">
                                {{ in_array($product->id, $userWishlistIds ?? []) ? 'في المفضلة' : 'أضف للمفضلة' }}
                            </span>
                        </button>

                        <a href="{{ route('customer.product.show', $product->id) }}" class="block w-full h-full">
                            <img src="{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/no-image.png') }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        </a>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            @php
                            $pAvgRate = round($averageRate > 0 ? $averageRate : 5.0, 1);
                            $pFullStars = floor($pAvgRate);
                            $pHasHalf = ($pAvgRate - $pFullStars) >= 0.5;
                            @endphp
                            <div class="flex items-center justify-between text-xs text-slate-400 mb-2">
                                <span class="bg-slate-800 px-2.5 py-0.5 rounded-md text-slate-300 font-medium">
                                    {{ $product->subcategory->name ?? 'قسم عام' }}
                                </span>

                                <a href="{{ route('customer.product.show', $product->id) }}#reviews" title="عرض التقييمات والمراجعات" class="inline-flex items-center gap-1 text-xs text-slate-300 hover:text-accent-gold transition">
                                    <div class="flex items-center gap-0.5 text-accent-gold text-[10px]">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <=$pFullStars)
                                            <i class="fa-solid fa-star text-accent-gold"></i>
                                            @elseif ($i == $pFullStars + 1 && $pHasHalf)
                                            <i class="fa-solid fa-star-half-stroke text-accent-gold"></i>
                                            @else
                                            <i class="fa-regular fa-star text-slate-600"></i>
                                            @endif
                                            @endfor
                                    </div>
                                    <span class="font-bold text-slate-300 text-[10px]">({{ number_format($pAvgRate, 1) }})</span>
                                </a>
                            </div>

                            <h3 class="font-bold text-white text-base line-clamp-1 hover:text-brand-400 transition my-2">
                                <a href="{{ route('customer.product.show', $product->id) }}">{{ $product->name }}</a>
                            </h3>

                            @if($product->store)
                            <div class="mt-2">
                                <a href="{{ route('customer.stores.show', $product->store->id) }}" class="inline-flex items-center gap-1.5 bg-slate-800/60 hover:bg-slate-800 border border-slate-700/50 hover:border-brand-500/40 px-2.5 py-1 rounded-full text-xs transition group/store">
                                    <i class="fa-solid fa-store text-brand-400 text-[11px] group-hover/store:scale-110 transition-transform"></i>
                                    <span class="text-slate-400 text-[11px]">البائع:</span>
                                    <span class="text-brand-400 font-semibold group-hover/store:text-brand-300 text-[11px]">{{ $product->store->name }}</span>
                                </a>
                            </div>
                            @endif

                            <!-- Stock Progress Bar (Urgency) -->
                            <div class="space-y-1 mt-3">
                                <div class="flex justify-between text-[11px] font-semibold text-slate-400">
                                    <span>متبقي بالمخزون: <strong class="text-rose-400">{{ $remainingStock }} قطع</strong></span>
                                    <span class="bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-[10px] font-bold px-2 py-0.5 rounded-md">وفر {{ $savedAmount }} ₪</span>
                                </div>
                                <div class="w-full h-1.5 bg-slate-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-rose-500 to-amber-500 rounded-full transition-all duration-500" style="width: {{ $stockPercentage }}%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-slate-800/80 flex items-center justify-between">
                            <div>
                                <span class="text-xs text-slate-500 line-through block">{{ $product->price }} ₪</span>
                                <span class="text-lg font-black text-emerald-400">{{ $finalPrice }} <span class="text-xs">₪</span></span>
                            </div>

                            @php $isInCart = in_array($product->id, $userCartProductIds ?? []); @endphp
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
                @endforeach
            </div>
        </section>

        <!-- 7. FEATURED CATEGORIES SHOWCASE -->
        <section id="Featured-Categories" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
            <div class="flex items-end justify-between border-b border-slate-800 pb-4">
                <div>
                    <span class="text-xs font-bold text-brand-400 mb-1 block flex items-center gap-1.5">
                        <i class="fa-solid fa-layer-group"></i> استكشف الفئات والأقسام
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">الأقسام الرئيسية المميزة</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categories as $category)
                @php
                $cName = mb_strtolower($category->name);

                if (str_contains($cName, 'الكترون') || str_contains($cName, 'إلكترون') || str_contains($cName, 'تقن') || str_contains($cName, 'جهاز') || str_contains($cName, 'هاتف')) {
                // الكترونيات
                $categoryImg = 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'موضة') || str_contains($cName, 'أزياء') || str_contains($cName, 'ملابس') || str_contains($cName, 'fashion')) {
                // موضة
                $categoryImg = 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'بيت') || str_contains($cName, 'مطبخ') || str_contains($cName, 'منزل') || str_contains($cName, 'أثاث')) {
                // بيت ومطبخ
                $categoryImg = 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'جمال') || str_contains($cName, 'عناية') || str_contains($cName, 'تجميل') || str_contains($cName, 'beauty')) {
                // الجمال والعناية الشخصية
                $categoryImg = 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'كتب') || str_contains($cName, 'مكتب') || str_contains($cName, 'قرطاسية') || str_contains($cName, 'book')) {
                // الكتب والأدوات المكتبية
                $categoryImg = 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'ألعاب') || str_contains($cName, 'العاب') || str_contains($cName, 'قيم') || str_contains($cName, 'game')) {
                // الألعاب
                $categoryImg = 'https://images.unsplash.com/photo-1612287230202-1ff1d85d1bdf?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'رياض') || str_contains($cName, 'outdoor') || str_contains($cName, 'لياقة') || str_contains($cName, 'sport')) {
                // رياضة & Outdoors
                $categoryImg = 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'سيار') || str_contains($cName, 'مركب') || str_contains($cName, 'أغراض') || str_contains($cName, 'car')) {
                // أغراض سيارات
                $categoryImg = 'https://images.unsplash.com/photo-1617814076367-b759c7d7e738?auto=format&fit=crop&w=1000&q=80';
                } elseif (str_contains($cName, 'صح') || str_contains($cName, 'عافية') || str_contains($cName, 'health')) {
                // الصحة
                $categoryImg = 'https://images.unsplash.com/photo-1505576399279-565b52d4ac71?auto=format&fit=crop&w=1000&q=80';
                } else {
                $categoryImg = !empty($category->image) ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-1472851294608-062f824d29cc?auto=format&fit=crop&w=1000&q=80';
                }
                @endphp
                @php
                $prodCount = $category->products_count ?? $category->subcategories->sum(fn($sub) => $sub->products?->count() ?? 0);
                @endphp
                <div class="glass-card rounded-3xl overflow-hidden group hover:border-brand-500/50 transition duration-500 flex flex-col justify-between shadow-xl">
                    <a href="{{ route('customer.category_products.index', $category->id) }}" class="relative block h-64 overflow-hidden bg-slate-900 group">
                        <img src="{{ $categoryImg }}" alt="{{ $category->name }}"
                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1472851294608-062f824d29cc?auto=format&fit=crop&w=1000&q=80';"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-90 group-hover:opacity-100 filter brightness-95" />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>

                        <!-- Badges in Top Bar -->
                        <div class="absolute top-3 right-3 flex items-center gap-2">
                            <span class="bg-gradient-to-r from-brand-600 to-brand-500 backdrop-blur-md text-white text-[11px] font-black px-3 py-1 rounded-full shadow-lg flex items-center gap-1.5 border border-brand-400/40">
                                <i class="fa-solid fa-boxes-stacked text-xs"></i>
                                <span>{{ number_format($prodCount) }} منتج</span>
                            </span>

                            <span class="bg-slate-950/80 backdrop-blur-md border border-slate-700/80 text-slate-300 text-[10px] font-extrabold px-2.5 py-1 rounded-full shadow-lg hidden sm:inline-flex items-center gap-1">
                                <i class="fa-solid fa-tag text-brand-400"></i> {{ $category->subcategories->count() }} فئات
                            </span>
                        </div>

                        <!-- Bottom Card Info -->
                        <div class="absolute bottom-4 right-4 left-4 flex items-end justify-between">
                            <div>
                                <span class="text-[11px] text-emerald-400 font-extrabold tracking-wider uppercase flex items-center gap-1 mb-0.5">
                                    <i class="fa-solid fa-circle-check text-[9px]"></i> {{ number_format($prodCount) }} منتج متوفر
                                </span>
                                <h3 class="text-2xl font-black text-white drop-shadow-md group-hover:text-brand-300 transition">
                                    {{ $category->name }}
                                </h3>
                            </div>
                            <span class="w-10 h-10 rounded-2xl bg-brand-600/80 group-hover:bg-brand-500 text-white flex items-center justify-center backdrop-blur-md shadow-lg group-hover:scale-110 transition duration-300">
                                <i class="fa-solid fa-arrow-left text-sm"></i>
                            </span>
                        </div>
                    </a>

                    <div class="p-4 bg-slate-900/90 flex flex-wrap gap-2 border-t border-slate-800/80">
                        @foreach ($category->subcategories as $sub)
                        <a href="{{ route('customer.products.index', ['subcategory' => $sub->id]) }}"
                            class="text-xs bg-slate-950 hover:bg-brand-600 text-slate-300 hover:text-white px-3 py-1.5 rounded-full border border-slate-800 hover:border-brand-500 transition font-semibold flex items-center gap-1">
                            <span>{{ $sub->name }}</span>
                            <i class="fa-solid fa-chevron-left text-[9px] opacity-60"></i>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- 8. MOST ORDERED PRODUCTS (الأكثر طلباً) -->
        <section id="Suggested-for-you" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
            <div class="flex items-end justify-between border-b border-slate-800 pb-4">
                <div>
                    <span class="text-xs font-bold text-accent-gold mb-1 block"><i class="fa-solid fa-crown"></i> الأكثر مبيعاً</span>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">المنتجات الأعلى طلباً</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($mostOrdereds as $mostOrdered)
                @php
                $mainImage = $mostOrdered->images()->where('is_main', true)->first();
                $averageRate = $mostOrdered->ratings->avg('rate') ?? 0;
                $finalPrice = number_format($mostOrdered->price * (1 - $mostOrdered->discount / 100), 2);
                @endphp
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col justify-between group transition-all duration-300">
                    <div class="relative aspect-square overflow-hidden bg-slate-900/80">
                        <span class="absolute top-3 right-3 z-10 bg-accent-gold text-slate-950 font-black text-[11px] px-2.5 py-1 rounded-full shadow-lg">
                            مبيعات: {{ $mostOrdered->total_sales }}
                        </span>

                        <button type="button"
                            onclick="toggleWishlist(this, {{ $mostOrdered->id }})"
                            title="قائمة الرغبات"
                            class="group/wishlist absolute top-3 left-3 z-20 h-9 px-2.5 hover:px-3 rounded-full bg-slate-900/70 backdrop-blur-md hover:bg-rose-500/20 text-slate-300 hover:text-rose-500 border border-slate-700/80 hover:border-rose-500/50 flex items-center justify-center gap-0 group-hover/wishlist:gap-1.5 shadow-lg transition-all duration-300 ease-out hover:scale-105">
                            <i class="{{ in_array($mostOrdered->id, $userWishlistIds ?? []) ? 'fa-solid fa-heart text-rose-500' : 'fa-regular fa-heart text-slate-300 group-hover/wishlist:text-rose-500' }} text-xs shrink-0 transition-colors"></i>
                            <span class="wishlist-text max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/wishlist:max-w-[100px] group-hover/wishlist:opacity-100 transition-all duration-300 text-[11px] font-bold">
                                {{ in_array($mostOrdered->id, $userWishlistIds ?? []) ? 'في المفضلة' : 'أضف للمفضلة' }}
                            </span>
                        </button>

                        <a href="{{ route('customer.product.show', $mostOrdered->id) }}" class="block w-full h-full">
                            <img src="{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/no-image.png') }}"
                                alt="{{ $mostOrdered->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        </a>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            @php
                            $mAvgRate = round($averageRate > 0 ? $averageRate : 5.0, 1);
                            $mFullStars = floor($mAvgRate);
                            $mHasHalf = ($mAvgRate - $mFullStars) >= 0.5;
                            @endphp
                            <div class="flex items-center justify-between text-xs text-slate-400 mb-2">
                                <span class="bg-slate-800 px-2.5 py-0.5 rounded-md text-slate-300 font-medium">
                                    {{ $mostOrdered->subcategory->name ?? 'فئة عامة' }}
                                </span>

                                <a href="{{ route('customer.product.show', $mostOrdered->id) }}#reviews" title="عرض التقييمات والمراجعات" class="inline-flex items-center gap-1 text-xs text-slate-300 hover:text-accent-gold transition">
                                    <div class="flex items-center gap-0.5 text-accent-gold text-[10px]">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <=$mFullStars)
                                            <i class="fa-solid fa-star text-accent-gold"></i>
                                            @elseif ($i == $mFullStars + 1 && $mHasHalf)
                                            <i class="fa-solid fa-star-half-stroke text-accent-gold"></i>
                                            @else
                                            <i class="fa-regular fa-star text-slate-600"></i>
                                            @endif
                                            @endfor
                                    </div>
                                    <span class="font-bold text-slate-300 text-[10px]">({{ number_format($mAvgRate, 1) }})</span>
                                </a>
                            </div>

                            <h3 class="font-bold text-white text-base line-clamp-1 hover:text-brand-400 transition my-2">
                                <a href="{{ route('customer.product.show', $mostOrdered->id) }}">{{ $mostOrdered->name }}</a>
                            </h3>

                            @if($mostOrdered->store)
                            <div class="mt-2">
                                <a href="{{ route('customer.stores.show', $mostOrdered->store->id) }}" class="inline-flex items-center gap-1.5 bg-slate-800/60 hover:bg-slate-800 border border-slate-700/50 hover:border-brand-500/40 px-2.5 py-1 rounded-full text-xs transition group/store">
                                    <i class="fa-solid fa-store text-brand-400 text-[11px] group-hover/store:scale-110 transition-transform"></i>
                                    <span class="text-slate-400 text-[11px]">البائع:</span>
                                    <span class="text-brand-400 font-semibold group-hover/store:text-brand-300 text-[11px]">{{ $mostOrdered->store->name }}</span>
                                </a>
                            </div>
                            @endif
                        </div>

                        <div class="pt-3 border-t border-slate-800/80 flex items-center justify-between">
                            <div>
                                @if($mostOrdered->discount > 0)
                                <span class="text-xs text-slate-500 line-through block">{{ $mostOrdered->price }} ₪</span>
                                <span class="text-lg font-black text-emerald-400">{{ $finalPrice }} <span class="text-xs">₪</span></span>
                                @else
                                <span class="text-lg font-black text-emerald-400">{{ $mostOrdered->price }} <span class="text-xs">₪</span></span>
                                @endif
                            </div>

                            @php $isMostOrderedInCart = in_array($mostOrdered->id, $userCartProductIds ?? []); @endphp
                            <button type="button" onclick="addToCart({{ $mostOrdered->id }}, 1, this)" title="{{ $isMostOrderedInCart ? 'في السلة' : 'أضف للسلة' }}"
                                class="group/btn h-10 px-3 hover:px-4 rounded-full {{ $isMostOrderedInCart ? 'bg-emerald-600 hover:bg-emerald-500' : 'bg-brand-600 hover:bg-brand-500' }} text-white flex items-center justify-center gap-0 group-hover/btn:gap-2 shadow-lg transition-all duration-300 ease-out hover:scale-105">
                                <i class="fa-solid {{ $isMostOrderedInCart ? 'fa-check' : 'fa-cart-plus' }} text-sm shrink-0"></i>
                                <span class="max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/btn:max-w-[100px] group-hover/btn:opacity-100 transition-all duration-300 text-xs font-bold cart-btn-text">
                                    {{ $isMostOrderedInCart ? 'في السلة' : 'أضف للسلة' }}
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- 9. LATEST ADDITIONS (أحدث المنتجات) -->
        <section id="Special-Offer" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
            <div class="flex items-end justify-between border-b border-slate-800 pb-4">
                <div>
                    <span class="text-xs font-bold text-emerald-400 mb-1 block"><i class="fa-solid fa-sparkles"></i> جديد السوق</span>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">آخر المنتجات المعروضة</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($latest as $product)
                @php
                $mainImage = $product->images()->where('is_main', true)->first();
                $averageRate = $product->ratings->avg('rate') ?? 0;
                $finalPrice = number_format($product->price * (1 - $product->discount / 100), 2);
                @endphp
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col justify-between group transition-all duration-300">
                    <div class="relative aspect-square overflow-hidden bg-slate-900/80">
                        <span class="absolute top-3 right-3 z-10 bg-slate-800/90 text-white font-bold text-[10px] px-2.5 py-1 rounded-full border border-slate-700">
                            {{ $product->created_at?->diffForHumans() }}
                        </span>

                        <button type="button"
                            onclick="toggleWishlist(this, {{ $product->id }})"
                            title="قائمة الرغبات"
                            class="group/wishlist absolute top-3 left-3 z-20 h-9 px-2.5 hover:px-3 rounded-full bg-slate-900/70 backdrop-blur-md hover:bg-rose-500/20 text-slate-300 hover:text-rose-500 border border-slate-700/80 hover:border-rose-500/50 flex items-center justify-center gap-0 group-hover/wishlist:gap-1.5 shadow-lg transition-all duration-300 ease-out hover:scale-105">
                            <i class="{{ in_array($product->id, $userWishlistIds ?? []) ? 'fa-solid fa-heart text-rose-500' : 'fa-regular fa-heart text-slate-300 group-hover/wishlist:text-rose-500' }} text-xs shrink-0 transition-colors"></i>
                            <span class="wishlist-text max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/wishlist:max-w-[100px] group-hover/wishlist:opacity-100 transition-all duration-300 text-[11px] font-bold">
                                {{ in_array($product->id, $userWishlistIds ?? []) ? 'في المفضلة' : 'أضف للمفضلة' }}
                            </span>
                        </button>

                        <a href="{{ route('customer.product.show', $product->id) }}" class="block w-full h-full">
                            <img src="{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/no-image.png') }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        </a>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            @php
                            $lAvgRate = round($averageRate > 0 ? $averageRate : 5.0, 1);
                            $lFullStars = floor($lAvgRate);
                            $lHasHalf = ($lAvgRate - $lFullStars) >= 0.5;
                            @endphp
                            <div class="flex items-center justify-between text-xs text-slate-400 mb-2">
                                <span class="bg-slate-800 px-2.5 py-0.5 rounded-md text-slate-300 font-medium">
                                    {{ $product->subcategory->name ?? 'عام' }}
                                </span>

                                <a href="{{ route('customer.product.show', $product->id) }}#reviews" title="عرض التقييمات والمراجعات" class="inline-flex items-center gap-1 text-xs text-slate-300 hover:text-accent-gold transition">
                                    <div class="flex items-center gap-0.5 text-accent-gold text-[10px]">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <=$lFullStars)
                                            <i class="fa-solid fa-star text-accent-gold"></i>
                                            @elseif ($i == $lFullStars + 1 && $lHasHalf)
                                            <i class="fa-solid fa-star-half-stroke text-accent-gold"></i>
                                            @else
                                            <i class="fa-regular fa-star text-slate-600"></i>
                                            @endif
                                            @endfor
                                    </div>
                                    <span class="font-bold text-slate-300 text-[10px]">({{ number_format($lAvgRate, 1) }})</span>
                                </a>
                            </div>

                            <h3 class="font-bold text-white text-base line-clamp-1 hover:text-brand-400 transition my-2">
                                <a href="{{ route('customer.product.show', $product->id) }}">{{ $product->name }}</a>
                            </h3>

                            @if($product->store)
                            <div class="mt-2">
                                <a href="{{ route('customer.stores.show', $product->store->id) }}" class="inline-flex items-center gap-1.5 bg-slate-800/60 hover:bg-slate-800 border border-slate-700/50 hover:border-brand-500/40 px-2.5 py-1 rounded-full text-xs transition group/store">
                                    <i class="fa-solid fa-store text-brand-400 text-[11px] group-hover/store:scale-110 transition-transform"></i>
                                    <span class="text-slate-400 text-[11px]">البائع:</span>
                                    <span class="text-brand-400 font-semibold group-hover/store:text-brand-300 text-[11px]">{{ $product->store->name }}</span>
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

                            @php $isNewInCart = in_array($product->id, $userCartProductIds ?? []); @endphp
                            <button type="button" onclick="addToCart({{ $product->id }}, 1, this)" title="{{ $isNewInCart ? 'في السلة' : 'أضف للسلة' }}"
                                class="group/btn h-10 px-3 hover:px-4 rounded-full {{ $isNewInCart ? 'bg-emerald-600 hover:bg-emerald-500' : 'bg-brand-600 hover:bg-brand-500' }} text-white flex items-center justify-center gap-0 group-hover/btn:gap-2 shadow-lg transition-all duration-300 ease-out hover:scale-105">
                                <i class="fa-solid {{ $isNewInCart ? 'fa-check' : 'fa-cart-plus' }} text-sm shrink-0"></i>
                                <span class="max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/btn:max-w-[100px] group-hover/btn:opacity-100 transition-all duration-300 text-xs font-bold cart-btn-text">
                                    {{ $isNewInCart ? 'في السلة' : 'أضف للسلة' }}
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- FEATURED VENDOR SHOWCASE (بائعون مميزون) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6" data-aos="fade-up">
            <div class="flex items-end justify-between border-b border-slate-800 pb-4">
                <div>
                    <span class="text-xs font-bold text-brand-400 mb-1 block">
                        <i class="fa-solid fa-store text-accent-gold"></i> متاجر معتمدة
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">بائعون مميزون</h2>
                </div>
                <a href="{{ route('customer.stores.index') }}" class="text-xs font-bold text-brand-400 hover:text-brand-300 flex items-center gap-1">
                    عرض جميع المتاجر <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>

            <!-- Horizontal Carousel Slider -->
            <div class="relative overflow-hidden">
                <div class="flex overflow-x-auto gap-6 no-scrollbar snap-x snap-mandatory pb-4 pt-1">
                    @if(isset($featuredStores) && count($featuredStores) > 0)
                    @foreach ($featuredStores as $store)
                    @php
                    $avgRate = round($store->ratings->avg('rate') ?? 5.0, 1);
                    $fullStars = floor($avgRate);
                    $hasHalf = ($avgRate - $fullStars) >= 0.5;
                    @endphp
                    <div class="snap-start shrink-0 w-72 sm:w-80 glass-card rounded-3xl p-6 flex flex-col justify-between items-center text-center space-y-4 group transition-all duration-300 hover:border-brand-500/50 hover:shadow-xl hover:shadow-brand-500/10 relative overflow-hidden">

                        <!-- Top Tag -->
                        <span class="absolute top-4 right-4 bg-amber-500/10 border border-amber-500/30 text-accent-gold text-[10px] font-black px-2.5 py-0.5 rounded-full flex items-center gap-1">
                            <i class="fa-solid fa-medal text-xs"></i> بائع مميز
                        </span>

                        <!-- Circular Profile Logo -->
                        <div class="relative w-24 h-24 rounded-full p-1 bg-gradient-to-tr from-brand-600 via-brand-500 to-accent-orange shadow-xl group-hover:scale-105 transition-transform duration-300 shrink-0 mt-2">
                            <img src="{{ $store->logo ? asset('storage/' . $store->logo) : 'https://images.unsplash.com/photo-1534723452862-4c874018d66d?auto=format&fit=crop&w=300&q=80' }}"
                                onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1534723452862-4c874018d66d?auto=format&fit=crop&w=300&q=80';"
                                alt="{{ $store->name }}"
                                class="w-full h-full object-cover rounded-full bg-slate-900" />
                        </div>

                        <!-- Store Info -->
                        <div class="space-y-1 w-full">
                            <h3 class="font-black text-white text-lg truncate hover:text-brand-400 transition">
                                <a href="{{ route('customer.stores.show', $store->id) }}">{{ $store->name }}</a>
                            </h3>
                            <p class="text-slate-400 text-xs truncate px-2">
                                {{ $store->slogan ?? 'متجر معتمد وموثوق على منصة مرساة' }}
                            </p>
                        </div>

                        <!-- 5-Star Rating Scale -->
                        <div class="flex items-center justify-center gap-1 text-accent-gold text-xs">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <=$fullStars)
                                <i class="fa-solid fa-star"></i>
                                @elseif ($i == $fullStars + 1 && $hasHalf)
                                <i class="fa-solid fa-star-half-stroke"></i>
                                @else
                                <i class="fa-regular fa-star text-slate-600"></i>
                                @endif
                                @endfor
                                <span class="font-bold text-slate-300 mr-1 text-xs">({{ number_format($avgRate, 1) }})</span>
                        </div>

                        <!-- Follow / Visit Store Button -->
                        <a href="{{ route('customer.stores.show', $store->id) }}"
                            class="w-full bg-brand-600 hover:bg-brand-500 text-white text-xs font-extrabold py-3 px-4 rounded-full shadow-lg shadow-brand-600/30 transition-all duration-300 flex items-center justify-center gap-2 hover:scale-105">
                            <i class="fa-solid fa-user-plus text-xs"></i>
                            <span>متابعة المتجر</span>
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </section>

        <!-- 10. BRANDS MARQUEE -->
        <section class="py-10 bg-slate-950/80 border-y border-slate-800/80 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 mb-8 text-center">
                <h2 class="text-xl sm:text-2xl font-bold text-slate-300 tracking-wider">علامات تجارية ومتاجر شريكة</h2>
            </div>
            <div class="relative w-full overflow-hidden">
                <!-- Side gradient blur masks -->
                <div class="absolute left-0 top-0 bottom-0 w-16 sm:w-24 bg-gradient-to-r from-slate-950 to-transparent z-10 pointer-events-none"></div>
                <div class="absolute right-0 top-0 bottom-0 w-16 sm:w-24 bg-gradient-to-l from-slate-950 to-transparent z-10 pointer-events-none"></div>

                <div class="animate-marquee flex items-center gap-12 sm:gap-16">
                    <!-- First Set of Logos -->
                    <div class="flex items-center gap-12 sm:gap-16 shrink-0">
                        <img alt="Microsoft" src="{{ asset('assets2/images/Popular Brands/microsoft.png') }}" class="h-8 sm:h-10 w-auto object-contain grayscale contrast-200 brightness-200 opacity-60 hover:grayscale-0 hover:contrast-100 hover:brightness-100 hover:opacity-100 transition-all duration-300" />
                        <img alt="Adidas" src="https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg" class="h-8 sm:h-10 w-auto object-contain grayscale brightness-200 contrast-200 opacity-60 hover:grayscale-0 hover:opacity-100 filter invert transition-all duration-300" />
                        <img alt="Samsung" src="{{ asset('assets2/images/Popular Brands/samsung.png') }}" class="h-8 sm:h-10 w-auto object-contain grayscale contrast-200 brightness-200 opacity-60 hover:grayscale-0 hover:contrast-100 hover:brightness-100 hover:opacity-100 transition-all duration-300" />
                        <img alt="Nike" src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" class="h-8 sm:h-10 w-auto object-contain grayscale brightness-200 contrast-200 opacity-60 hover:grayscale-0 hover:opacity-100 filter invert transition-all duration-300" />
                        <img alt="Puma" src="{{ asset('assets2/images/Popular Brands/puma.png') }}" class="h-8 sm:h-10 w-auto object-contain grayscale contrast-200 brightness-200 opacity-60 hover:grayscale-0 hover:contrast-100 hover:brightness-100 hover:opacity-100 transition-all duration-300" />
                        <img alt="HP" src="{{ asset('assets2/images/Popular Brands/hp.svg') }}" class="h-8 sm:h-10 w-auto object-contain grayscale contrast-200 brightness-200 opacity-60 hover:grayscale-0 hover:contrast-100 hover:brightness-100 hover:opacity-100 transition-all duration-300" />
                        <img alt="Zara" src="{{ asset('assets2/images/Popular Brands/zara.png') }}" class="h-8 sm:h-10 w-auto object-contain grayscale brightness-200 contrast-200 opacity-60 hover:grayscale-0 hover:opacity-100 filter invert transition-all duration-300" />
                    </div>

                    <!-- Second Set of Logos (Duplicate for Infinite Marquee) -->
                    <div class="flex items-center gap-12 sm:gap-16 shrink-0">
                        <img alt="Microsoft" src="{{ asset('assets2/images/Popular Brands/microsoft.png') }}" class="h-8 sm:h-10 w-auto object-contain grayscale contrast-200 brightness-200 opacity-60 hover:grayscale-0 hover:contrast-100 hover:brightness-100 hover:opacity-100 transition-all duration-300" />
                        <img alt="Adidas" src="https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg" class="h-8 sm:h-10 w-auto object-contain grayscale brightness-200 contrast-200 opacity-60 hover:grayscale-0 hover:opacity-100 filter invert transition-all duration-300" />
                        <img alt="Samsung" src="{{ asset('assets2/images/Popular Brands/samsung.png') }}" class="h-8 sm:h-10 w-auto object-contain grayscale contrast-200 brightness-200 opacity-60 hover:grayscale-0 hover:contrast-100 hover:brightness-100 hover:opacity-100 transition-all duration-300" />
                        <img alt="Nike" src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" class="h-8 sm:h-10 w-auto object-contain grayscale brightness-200 contrast-200 opacity-60 hover:grayscale-0 hover:opacity-100 filter invert transition-all duration-300" />
                        <img alt="Puma" src="{{ asset('assets2/images/Popular Brands/puma.png') }}" class="h-8 sm:h-10 w-auto object-contain grayscale contrast-200 brightness-200 opacity-60 hover:grayscale-0 hover:contrast-100 hover:brightness-100 hover:opacity-100 transition-all duration-300" />
                        <img alt="HP" src="{{ asset('assets2/images/Popular Brands/hp.svg') }}" class="h-8 sm:h-10 w-auto object-contain grayscale contrast-200 brightness-200 opacity-60 hover:grayscale-0 hover:contrast-100 hover:brightness-100 hover:opacity-100 transition-all duration-300" />
                        <img alt="Zara" src="{{ asset('assets2/images/Popular Brands/zara.png') }}" class="h-8 sm:h-10 w-auto object-contain grayscale brightness-200 contrast-200 opacity-60 hover:grayscale-0 hover:opacity-100 filter invert transition-all duration-300" />
                    </div>
                </div>
            </div>
        </section>

        <!-- 11. ABOUT US SECTION (من نحن - منصة مرساة Store) -->
        <section id="howus" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">
            <div class="glass-card rounded-3xl p-8 sm:p-12 relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-900/90 to-brand-950/80 border border-slate-800 shadow-2xl flex flex-col md:flex-row items-center gap-10">

                <!-- Glowing Background Accents -->
                <div class="absolute -right-20 -top-20 w-80 h-80 bg-brand-500/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-brand-600/10 rounded-full blur-3xl pointer-events-none"></div>

                <!-- Professional 3D Graphic Image -->
                <div class="w-full md:w-5/12 flex justify-center relative z-10">
                    <div class="relative group w-full">
                        <div class="absolute -inset-1 bg-gradient-to-r from-brand-600 to-brand-400 rounded-3xl blur opacity-30 group-hover:opacity-60 transition duration-500"></div>
                        <img src="https://images.unsplash.com/photo-1556742049-0a67daf40953?auto=format&fit=crop&w=1000&q=80"
                            alt="منصة مرساة Store"
                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=1000&q=80';"
                            class="relative rounded-2xl shadow-2xl w-full max-h-80 object-cover border border-slate-700/60 transform group-hover:scale-[1.02] transition duration-500" />
                        <div class="absolute -bottom-4 -left-4 bg-slate-950/90 border border-slate-700 backdrop-blur-md px-4 py-2.5 rounded-2xl shadow-xl flex items-center gap-2">
                            <i class="fa-solid fa-shield-halved text-emerald-400 text-base"></i>
                            <span class="text-xs font-bold text-white">منصة تجارة إلكترونية موثوقة 100%</span>
                        </div>
                    </div>
                </div>

                <!-- Professional Store Overview & Metrics -->
                <div class="w-full md:w-7/12 space-y-5 text-center md:text-right relative z-10">
                    <div class="inline-flex items-center gap-2 bg-brand-500/10 border border-brand-500/30 text-brand-400 text-xs font-extrabold px-3.5 py-1.5 rounded-full">
                        <i class="fa-solid fa-building"></i> عن منصة مرساة Store
                    </div>

                    <h2 class="text-3xl sm:text-4xl font-black text-white tracking-tight leading-tight">
                        الوجهة الرقمية الأولى للتسوق المتعدد المتاجر والبيع المباشر
                    </h2>

                    <p class="text-slate-300 text-sm leading-relaxed max-w-2xl font-medium">
                        تعتبر منصة <strong class="text-white">مرساة (MARSA STORE)</strong> بيئة تجارية رقمية متكاملة تهدف إلى الربط بين التجار المعتمدين والمشترين، وتوفير منتجات أصلية متنوعة مع تجربة تسوق مضمونة وسلسة تشمل الشحن السريع، وتعدد طرق الدفع، وتأمين وحماية كلي للبيانات.
                    </p>

                    <!-- Key Feature Badges -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2 text-xs">
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-2xl text-center">
                            <i class="fa-solid fa-store text-brand-400 text-base block mb-1"></i>
                            <span class="font-bold text-white block">+100</span>
                            <span class="text-[10px] text-slate-400">متجر موثق</span>
                        </div>
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-2xl text-center">
                            <i class="fa-solid fa-box text-emerald-400 text-base block mb-1"></i>
                            <span class="font-bold text-white block">+5,000</span>
                            <span class="text-[10px] text-slate-400">منتج أصلي</span>
                        </div>
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-2xl text-center">
                            <i class="fa-solid fa-truck-fast text-accent-gold text-base block mb-1"></i>
                            <span class="font-bold text-white block">توصيل سريع</span>
                            <span class="text-[10px] text-slate-400">كافة المناطق</span>
                        </div>
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-2xl text-center">
                            <i class="fa-solid fa-headset text-rose-400 text-base block mb-1"></i>
                            <span class="font-bold text-white block">دعم 24/7</span>
                            <span class="text-[10px] text-slate-400">خدمة متميزة</span>
                        </div>
                    </div>

                    <!-- Action Buttons & Social -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 pt-3">
                        <a href="{{ route('customer.stores.index') }}" class="bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-black text-xs px-6 py-3 rounded-full shadow-lg shadow-brand-600/30 transition">
                            استكشف المتاجر المعتمدة <i class="fa-solid fa-arrow-left ms-1.5"></i>
                        </a>
                        <a href="{{ route('vendor.register') }}" class="bg-slate-950 hover:bg-slate-800 text-slate-200 border border-slate-800 font-bold text-xs px-6 py-3 rounded-full transition">
                            انضم كبائع جديد <i class="fa-solid fa-store ms-1.5 text-brand-400"></i>
                        </a>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- 12. MODERN FOOTER -->
    <footer class="bg-slate-950 text-slate-400 border-t border-slate-800 text-xs">
        <!-- Newsletter Top Section -->
        <div class="border-b border-slate-800/80 py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                    <div class="text-center lg:text-right space-y-1">
                        <h3 class="text-lg font-bold text-white">اشترك في النشرة الإخبارية لمرساة</h3>
                        <p class="text-slate-400">احصل على أحدث التخفيضات والعروض الحصرية مباشرة إلى بريدك.</p>
                    </div>
                    <form action="#" method="get" class="w-full lg:w-auto flex items-center gap-2 max-w-md">
                        <input type="email" placeholder="أدخل البريد الإلكتروني..." required
                            class="w-full bg-slate-900 border border-slate-700 text-white rounded-full px-5 py-3 text-xs outline-none focus:border-brand-500" />
                        <button type="submit" class="bg-brand-600 hover:bg-brand-500 text-white font-bold px-6 py-3 rounded-full shrink-0 transition shadow-lg shadow-brand-600/30">
                            اشتراك
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Links Grid -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="space-y-4">
                <a href="{{ route('customer.main-page') }}" class="flex items-center gap-2">
                    <img src="{{ asset('assets2/images/logo/logo.svg') }}" alt="Marsa Logo" class="h-8 w-auto" />
                    <span class="text-xl font-black text-white">مرساة</span>
                </a>
                <p class="text-slate-400 leading-relaxed">
                    منصتك الآمنة والموثوقة للتسوق الإلكتروني والشراء المباشر مع أحدث المتاجر وأعلى معايير الحماية.
                </p>
                <div class="text-slate-300 space-y-1">
                    <p><i class="fa-solid fa-phone text-brand-400 me-2"></i> +970 59 5570612</p>
                    <p><i class="fa-solid fa-envelope text-brand-400 me-2"></i> support@shopgrids.com</p>
                </div>
            </div>

            <div class="space-y-3">
                <h4 class="text-sm font-bold text-white uppercase tracking-wider">روابط سريعة</h4>
                <ul class="space-y-2">
                    <li><a href="#howus" class="hover:text-white transition">من نحن</a></li>
                    <li><a href="{{ route('customer.stores.index') }}" class="hover:text-white transition">المتاجر المعتمدة</a></li>
                    <li><a href="{{ route('customer.contact') }}" class="hover:text-white transition">مركز التواصل والدعم</a></li>
                    <li><a href="{{ route('customer.faq') }}" class="hover:text-white transition">الأسئلة الشائعة</a></li>
                </ul>
            </div>

            <div class="space-y-3">
                <h4 class="text-sm font-bold text-white uppercase tracking-wider">أقسام متجر مرساة</h4>
                <ul class="space-y-2">
                    @foreach ($categories->take(5) as $cat)
                    <li>
                        <a href="{{ route('customer.category_products.index', $cat->id) }}" class="hover:text-white transition">
                            {{ $cat->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="space-y-3">
                <h4 class="text-sm font-bold text-white uppercase tracking-wider">تطبيقاتنا والمدفوعات</h4>
                <p class="text-slate-400">تابع مشترياتك وسلّتك من أي مكان.</p>
                <div class="flex flex-col gap-2 pt-2">
                    <div class="flex items-center gap-3 bg-slate-900 border border-slate-800 p-2.5 rounded-xl">
                        <i class="fa-brands fa-apple text-2xl text-white"></i>
                        <div>
                            <span class="text-[10px] text-slate-500 block">قريباً على</span>
                            <span class="font-bold text-white text-xs">App Store</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 bg-slate-900 border border-slate-800 p-2.5 rounded-xl">
                        <i class="fa-brands fa-google-play text-2xl text-emerald-400"></i>
                        <div>
                            <span class="text-[10px] text-slate-500 block">قريباً على</span>
                            <span class="font-bold text-white text-xs">Google Play</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Bar -->
        <div class="border-t border-slate-900 py-6 bg-slate-950">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p>© {{ date('Y') }} جميع الحقوق محفوظة - تم التطوير بواسطة <span class="text-brand-400 font-bold">WIC std</span></p>
                <div class="flex items-center gap-4 text-slate-400 text-base">
                    <i class="fa-brands fa-cc-visa hover:text-white transition"></i>
                    <i class="fa-brands fa-cc-mastercard hover:text-white transition"></i>
                    <i class="fa-brands fa-cc-paypal hover:text-white transition"></i>
                </div>
            </div>
        </div>
    </footer>

</x-store-layout>