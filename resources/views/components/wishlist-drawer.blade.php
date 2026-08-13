@props(['wishlistProducts' => []])

<!-- WISHLIST FLYOUT DRAWER (Off-Canvas) -->
<div id="wishlist-drawer-overlay" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-[100] hidden transition-opacity duration-300 opacity-0">
    <div id="wishlist-drawer" class="fixed inset-y-0 left-0 w-full sm:w-96 bg-slate-900 border-r border-slate-800 shadow-2xl flex flex-col justify-between transform -translate-x-full transition-transform duration-300 ease-in-out">
        <!-- Drawer Header -->
        <div class="p-5 border-b border-slate-800 flex items-center justify-between bg-slate-950">
            <h3 class="font-bold text-white text-base flex items-center gap-2">
                <i class="fa-solid fa-heart text-rose-500"></i> قائمة الرغبات
            </h3>
            <button id="close-wishlist-btn" type="button" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white flex items-center justify-center transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Drawer Items Body -->
        <div id="wishlist-drawer-body" class="p-5 flex-1 overflow-y-auto space-y-4">
            @if(isset($wishlistProducts) && count($wishlistProducts) > 0)
                @foreach ($wishlistProducts as $wProduct)
                @php
                $wImg = $wProduct->images()->where('is_main', true)->first();
                @endphp
                <div id="wishlist-row-{{ $wProduct->id }}" class="flex items-center gap-3 p-3 bg-slate-800/60 rounded-2xl border border-slate-700/60 transition group hover:border-rose-500/40">
                    <img src="{{ $wImg ? asset('storage/' . $wImg->image_path) : asset('images/no-image.png') }}"
                        alt="{{ $wProduct->name }}" class="w-14 h-14 object-cover rounded-xl bg-slate-950 shrink-0" />
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-white text-xs truncate">
                            <a href="{{ route('customer.product.show', $wProduct->id) }}" class="hover:text-brand-400 transition">{{ $wProduct->name }}</a>
                        </h4>
                        <div class="text-[11px] text-slate-400 truncate">
                            البائع: <span class="text-slate-300 font-semibold">{{ $wProduct->store->name ?? 'متجر عام' }}</span>
                        </div>
                        <div class="text-emerald-400 font-extrabold text-xs mt-0.5">
                            {{ number_format($wProduct->price, 2) }} ₪
                        </div>
                    </div>

                    <!-- Action Buttons: Move to Cart & Delete -->
                    <div class="flex items-center gap-1.5 shrink-0">
                        <button type="button"
                            onclick="moveWishlistItemToCart({{ $wProduct->id }})"
                            title="نقل إلى السلة"
                            class="h-8 px-2.5 rounded-full bg-brand-600/20 hover:bg-brand-600 text-brand-400 hover:text-white border border-brand-500/40 flex items-center justify-center gap-1 text-[11px] font-bold transition">
                            <i class="fa-solid fa-cart-plus text-xs"></i>
                            <span class="hidden sm:inline">للسلة</span>
                        </button>
                        <button type="button"
                            onclick="removeWishlistItem({{ $wProduct->id }})"
                            title="حذف من الرغبات"
                            class="w-8 h-8 rounded-full bg-rose-500/10 hover:bg-rose-500 text-rose-400 hover:text-white flex items-center justify-center transition">
                            <i class="fa-solid fa-trash-can text-xs"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            @else
                <div id="wishlist-empty-state" class="py-16 text-center space-y-4 text-slate-400">
                    <i class="fa-regular fa-heart text-4xl text-slate-600 block"></i>
                    <p class="text-xs font-semibold">قائمة الرغبات فارغة حالياً</p>
                    <button onclick="closeWishlist()" class="inline-block bg-brand-600 hover:bg-brand-500 text-white font-bold px-6 py-2.5 rounded-full text-xs transition">
                        متابعة التسوق
                    </button>
                </div>
            @endif
        </div>

        <!-- Drawer Footer -->
        <div class="p-5 border-t border-slate-800 bg-slate-950 text-center">
            <button onclick="closeWishlist()" class="w-full bg-slate-800 hover:bg-slate-700 text-white font-bold py-3 rounded-full text-xs transition">
                إغلاق قائمة الرغبات
            </button>
        </div>
    </div>
</div>
