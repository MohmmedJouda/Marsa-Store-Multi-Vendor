<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="منتجات تصنيف {{ $name ?? 'القسم' }} - مرساة للتسوق الرقمي والبيع المباشر المضمون" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>منتجات {{ $name ?? 'القسم' }} | مرساة Store</title>

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

    <!-- TOP ANNOUNCEMENT BAR -->
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
                <span class="text-slate-200 font-bold">تصنيف: {{ $name ?? 'القسم' }}</span>
            </div>
        </div>
    </div>

    <!-- CATEGORY PRODUCTS CONTENT -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10 w-full">

        <!-- CATEGORY HERO BANNER SHOWCASE -->
        @php
        $cName = mb_strtolower($name ?? '');
        if (str_contains($cName, 'الكترون') || str_contains($cName, 'إلكترون') || str_contains($cName, 'تقن') || str_contains($cName, 'جهاز') || str_contains($cName, 'هاتف')) {
        $catHeroImg = 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1400&q=80';
        } elseif (str_contains($cName, 'موضة') || str_contains($cName, 'أزياء') || str_contains($cName, 'ملابس') || str_contains($cName, 'fashion')) {
        $catHeroImg = 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1400&q=80';
        } elseif (str_contains($cName, 'بيت') || str_contains($cName, 'مطبخ') || str_contains($cName, 'منزل') || str_contains($cName, 'أثاث')) {
        $catHeroImg = 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=1400&q=80';
        } elseif (str_contains($cName, 'جمال') || str_contains($cName, 'عناية') || str_contains($cName, 'تجميل') || str_contains($cName, 'beauty')) {
        $catHeroImg = 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=1400&q=80';
        } elseif (str_contains($cName, 'كتب') || str_contains($cName, 'مكتب') || str_contains($cName, 'قرطاسية') || str_contains($cName, 'book')) {
        $catHeroImg = 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=1400&q=80';
        } elseif (str_contains($cName, 'ألعاب') || str_contains($cName, 'العاب') || str_contains($cName, 'قيم') || str_contains($cName, 'game')) {
        $catHeroImg = 'https://images.unsplash.com/photo-1612287230202-1ff1d85d1bdf?auto=format&fit=crop&w=1400&q=80';
        } elseif (str_contains($cName, 'رياض') || str_contains($cName, 'outdoor') || str_contains($cName, 'لياقة') || str_contains($cName, 'sport')) {
        $catHeroImg = 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=1400&q=80';
        } elseif (str_contains($cName, 'سيار') || str_contains($cName, 'مركب') || str_contains($cName, 'أغراض') || str_contains($cName, 'car')) {
        $catHeroImg = 'https://images.unsplash.com/photo-1617814076367-b759c7d7e738?auto=format&fit=crop&w=1400&q=80';
        } else {
        $catHeroImg = 'https://images.unsplash.com/photo-1505576399279-565b52d4ac71?auto=format&fit=crop&w=1400&q=80';
        }
        $prodCount = isset($products) ? $products->count() : 0;
        @endphp
        <section class="glass-card rounded-3xl relative overflow-hidden bg-slate-900 border border-slate-800 shadow-2xl min-h-[220px] flex items-center p-8 sm:p-12" data-aos="fade-up">
            <img src="{{ $catHeroImg }}" alt="{{ $name ?? 'قسم' }}" class="absolute inset-0 w-full h-full object-cover opacity-25 filter brightness-90 blur-[1px]" />
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-transparent"></div>

            <div class="relative z-10 max-w-2xl space-y-4">
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 bg-brand-500/20 border border-brand-500/40 text-brand-300 text-xs font-extrabold px-3.5 py-1.5 rounded-full shadow">
                        <i class="fa-solid fa-layer-group"></i> قسم معتمد
                    </span>
                    <span class="bg-slate-900/80 border border-slate-700/80 text-emerald-400 text-xs font-extrabold px-3 py-1 rounded-full shadow">
                        <i class="fa-solid fa-boxes-stacked me-1"></i> {{ $prodCount }} منتج متاح
                    </span>
                </div>
                <h1 class="text-3xl sm:text-5xl font-black text-white leading-tight drop-shadow-lg">
                    جميع منتجات قسم <span class="gradient-text">{{ $name ?? 'القسم' }}</span>
                </h1>
                <p class="text-slate-300 text-xs sm:text-sm leading-relaxed max-w-xl font-medium">
                    تصفح التشكيلة الكاملة والحصرية لجميع المنتجات والماركات المتاحة تحت تصنيف {{ $name ?? 'القسم' }}.
                </p>
            </div>
        </section>

        <!-- SUBCATEGORIES SHOWCASE SECTION -->
        @if(isset($category) && $category->subcategories && $category->subcategories->count() > 0)
        <section class="space-y-6" data-aos="fade-up">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <div>
                    <span class="text-xs font-bold text-brand-400 mb-1 block flex items-center gap-1.5">
                        <i class="fa-solid fa-tags"></i> الفئات الفرعية التابعة للقسم
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">الأقسام التابعة لتصنيف {{ $name ?? '' }}</h2>
                </div>
                <span class="text-xs font-bold text-slate-300 bg-slate-900 border border-slate-800 px-3.5 py-1.5 rounded-full shadow-sm">
                    {{ $category->subcategories->count() }} فئات فرعية
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($category->subcategories as $sub)
                @php
                $sName = mb_strtolower($sub->name);
                if (str_contains($sName, 'هاتف') || str_contains($sName, 'لوحي') || str_contains($sName, 'جوال') || str_contains($sName, 'موبايل') || str_contains($sName, 'ذكي')) {
                $subImg = 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'أحدث الهواتف الذكية والأجهزة اللوحية من كبرى الشركات العالمية بضمان رسمي.';
                } elseif (str_contains($sName, 'لابتوب') || str_contains($sName, 'كمبيوتر') || str_contains($sName, 'حاسوب') || str_contains($sName, 'مكتب')) {
                $subImg = 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'أجهزة لابتوب وحواسيب مكتبية فائقة الأداء للأعمال والألعاب.';
                } elseif (str_contains($sName, 'سماعة') || str_contains($sName, 'صوت') || str_contains($sName, 'مكبر')) {
                $subImg = 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'سماعات رأس لاسلكية ونظامات صوتية ونقية لأفضل تجربة استماع.';
                } elseif (str_contains($sName, 'كاميرا') || str_contains($sName, 'تصوير')) {
                $subImg = 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'كاميرات احترافية وعدسات تصوير رقمية بدقة عالية.';
                } elseif (str_contains($sName, 'تلفاز') || str_contains($sName, 'شاشة')) {
                $subImg = 'https://images.unsplash.com/photo-1593784991095-a205069470b6?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'شاشات ذكية وتلفزيونات فائقة الوضوح بتناغم ألوان مذهل.';
                } elseif (str_contains($sName, 'رجالي') || str_contains($sName, 'رجال')) {
                $subImg = 'https://images.unsplash.com/photo-1617137984095-74e4e5e3613f?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'أحدث الموضة والأزياء الرجالية العصرية والكلاسيكية.';
                } elseif (str_contains($sName, 'نسائي') || str_contains($sName, 'نساء') || str_contains($sName, 'فساتين')) {
                $subImg = 'https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'تشكيلات راقية من ملابس النساء والفساتين لمختلف المناسبات.';
                } elseif (str_contains($sName, 'أحذية') || str_contains($sName, 'احذية') || str_contains($sName, 'جزم')) {
                $subImg = 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'أحذية رياضية ورسمية مصممة للراحة والأناقة اليومية.';
                } elseif (str_contains($sName, 'حقائب') || str_contains($sName, 'شنط')) {
                $subImg = 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'حقائب جلدية فاخرة وحقائب ظهر عملية لمختلف الاحتياجات.';
                } elseif (str_contains($sName, 'ساعات') || str_contains($sName, 'ساعة')) {
                $subImg = 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'ساعات يد قيمة وساعات ذكية تناسب كافة الأذواق.';
                } elseif (str_contains($sName, 'أثاث') || str_contains($sName, 'اثاث')) {
                $subImg = 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'أثاث منزلي مودرن يضفي لمسة فخامة وراحة على منزلك.';
                } elseif (str_contains($sName, 'مطبخ') || str_contains($sName, 'طهي')) {
                $subImg = 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'معدات وأدوات مطبخ حديثة لسهولة تحضير أشهى الوجبات.';
                } elseif (str_contains($sName, 'بشرة') || str_contains($sName, 'ماكياج') || str_contains($sName, 'مكياج')) {
                $subImg = 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'منتجات العناية بالبشرة والمكياج الطبيعي لإطلالة ساحرة.';
                } elseif (str_contains($sName, 'عطور') || str_contains($sName, 'عطر')) {
                $subImg = 'https://images.unsplash.com/photo-1594035910387-fea47794261f?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'عطور شرقية وغربية تشيع الانتعاش والفخامة طوال اليوم.';
                } else {
                $subImg = !empty($sub->image) ? asset('storage/' . $sub->image) : 'https://images.unsplash.com/photo-1472851294608-062f824d29cc?auto=format&fit=crop&w=800&q=80';
                $subDesc = 'مجموعة مختارة ومميزة من أفضل المنتجات التابعة لفئة ' . $sub->name . '.';
                }

                $subProductCount = $sub->products ? $sub->products->count() : 0;
                @endphp
                <div class="glass-card rounded-3xl overflow-hidden group hover:border-brand-500/50 transition duration-500 flex flex-col justify-between shadow-xl">
                    <!-- Subcategory Image Header -->
                    <div class="relative h-52 overflow-hidden bg-slate-900">
                        <img src="{{ $subImg }}" alt="{{ $sub->name }}"
                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1472851294608-062f824d29cc?auto=format&fit=crop&w=800&q=80';"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-90 group-hover:opacity-100 filter brightness-95" />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>

                        <span class="absolute top-3 right-3 bg-slate-950/80 backdrop-blur-md border border-slate-700/80 text-brand-400 text-[11px] font-extrabold px-3 py-1 rounded-full shadow-lg">
                            <i class="fa-solid fa-box-open me-1"></i> {{ $subProductCount }} منتج متوفر
                        </span>

                        <div class="absolute bottom-4 right-4 left-4">
                            <span class="text-[10px] font-extrabold text-brand-400 tracking-wider uppercase block mb-1">فئة معتمدة</span>
                            <h3 class="text-xl font-black text-white drop-shadow-md group-hover:text-brand-300 transition">
                                {{ $sub->name }}
                            </h3>
                        </div>
                    </div>

                    <!-- Subcategory Info & Action Button -->
                    <div class="p-5 bg-slate-900/90 space-y-4 border-t border-slate-800/80 flex-1 flex flex-col justify-between">
                        <div class="space-y-2">
                            <p class="text-xs text-slate-300 leading-relaxed font-medium">
                                {{ $subDesc }}
                            </p>
                            <div class="flex flex-wrap gap-1.5 pt-1">
                                <span class="text-[10px] bg-slate-800 text-slate-300 px-2.5 py-1 rounded-md border border-slate-700/60 font-semibold">
                                    <i class="fa-solid fa-shield-halved text-emerald-400 me-1"></i> ضمان الجودة
                                </span>
                                <span class="text-[10px] bg-slate-800 text-slate-300 px-2.5 py-1 rounded-md border border-slate-700/60 font-semibold">
                                    <i class="fa-solid fa-truck-fast text-brand-400 me-1"></i> توصيل سريع
                                </span>
                            </div>
                        </div>

                        <div class="space-y-3 pt-3 border-t border-slate-800/80">
                            <div class="flex items-center justify-between text-xs text-slate-400">
                                <span class="flex items-center gap-1.5 text-emerald-400 font-bold">
                                    <i class="fa-solid fa-circle-check text-[9px]"></i> فئة معتمدة في {{ $name ?? '' }}
                                </span>
                                <span class="text-slate-300 font-bold">{{ $subProductCount }} منتج</span>
                            </div>

                            <a href="{{ route('customer.products.index', ['subcategory' => $sub->id]) }}"
                                class="w-full bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-extrabold text-xs py-3 px-4 rounded-2xl shadow-lg shadow-brand-600/30 flex items-center justify-center gap-2 transition hover:scale-[1.02]">
                                <span>عرض منتجات {{ $sub->name }}</span>
                                <i class="fa-solid fa-arrow-left text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- PRODUCTS GRID -->
        <section class="space-y-6" data-aos="fade-up">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <div>
                    <span class="text-xs font-bold text-brand-400 mb-1 block flex items-center gap-1.5">
                        <i class="fa-solid fa-boxes-stacked"></i> المعروضات والمنتجات
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">منتجات قسم {{ $name ?? 'القسم' }}</h2>
                </div>
                <span class="text-xs font-bold text-emerald-400 bg-slate-900 border border-slate-800 px-3.5 py-1.5 rounded-full">
                    {{ $prodCount }} منتج معروض
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($products ?? [] as $product)
                @php
                $mainImage = $product->mainImage ?? ($product->images ? $product->images->first() : null);
                $productImg = $mainImage ? asset('storage/' . $mainImage->image_path) : 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=80';
                $averageRate = ($product->ratings && $product->ratings->count() > 0) ? $product->ratings->avg('rate') : 5.0;
                $finalPrice = number_format($product->price * (1 - ($product->discount ?? 0) / 100), 2);
                @endphp
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col justify-between group transition-all duration-300 shadow-xl">
                    <div class="relative aspect-square overflow-hidden bg-slate-900/80">
                        @if(($product->discount ?? 0) > 0)
                        <span class="absolute top-3 right-3 z-10 bg-rose-600 text-white font-black text-xs px-2.5 py-1 rounded-full shadow-lg">
                            -{{ round($product->discount) }}%
                        </span>
                        @endif

                        <a href="{{ route('customer.product.show', $product->id) }}" class="block w-full h-full">
                            <img src="{{ $productImg }}"
                                onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=80';"
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
                            $cAvgRate = round($averageRate > 0 ? $averageRate : 5.0, 1);
                            $cFullStars = floor($cAvgRate);
                            $cHasHalf = ($cAvgRate - $cFullStars) >= 0.5;
                            @endphp
                            <a href="{{ route('customer.product.show', $product->id) }}#reviews" title="عرض التقييمات والمراجعات" class="inline-flex items-center gap-1.5 text-xs text-slate-300 hover:text-accent-gold transition mt-1">
                                <div class="flex items-center gap-0.5 text-accent-gold text-[11px]">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <=$cFullStars)
                                        <i class="fa-solid fa-star text-accent-gold"></i>
                                        @elseif ($i == $cFullStars + 1 && $cHasHalf)
                                        <i class="fa-solid fa-star-half-stroke text-accent-gold"></i>
                                        @else
                                        <i class="fa-regular fa-star text-slate-600"></i>
                                        @endif
                                        @endfor
                                </div>
                                <span class="font-bold text-slate-300 text-[11px]">({{ number_format($cAvgRate, 1) }})</span>
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
                                @if(($product->discount ?? 0) > 0)
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
                    <p class="text-sm">لا توجد منتجات في هذا التصنيف حالياً</p>
                </div>
                @endforelse
            </div>
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
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    once: true
                });
            }
        });
    </script>
</body>

</html>