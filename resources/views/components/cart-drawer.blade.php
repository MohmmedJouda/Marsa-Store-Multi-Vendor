@props(['carts' => null, 'totalPrice' => 0])

<!-- CART FLYOUT DRAWER (Off-Canvas) -->
<div id="cart-drawer-overlay" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-[100] hidden transition-opacity duration-300 opacity-0">
    <div id="cart-drawer" class="fixed inset-y-0 left-0 w-full sm:w-96 bg-slate-900 border-r border-slate-800 shadow-2xl flex flex-col justify-between transform -translate-x-full transition-transform duration-300 ease-in-out">
        <!-- Drawer Header -->
        <div class="p-5 border-b border-slate-800 flex items-center justify-between bg-slate-950">
            <h3 class="font-bold text-white text-base flex items-center gap-2">
                <i class="fa-solid fa-cart-shopping text-brand-500"></i> سلة المشتريات
            </h3>
            <button id="close-cart-btn" type="button" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white flex items-center justify-center transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Drawer Items Body -->
        <div class="p-5 flex-1 overflow-y-auto space-y-4">
            @php 
                $hasItems = false; 
                $calcTotal = 0;
            @endphp
            @if(isset($carts) && count($carts) > 0)
                @foreach ($carts as $cart)
                    @foreach ($cart->items as $item)
                        @php
                            $hasItems = true;
                            $calcTotal += ($item->price * ($item->qty ?? 1));
                            $pImg = $item->product?->images()->where('is_main', true)->first();
                        @endphp
                        <div id="cart-item-row-{{ $item->id }}" class="flex items-center gap-3 p-3 bg-slate-800/60 rounded-2xl border border-slate-700/60">
                            <img src="{{ $pImg ? asset('storage/' . $pImg->image_path) : asset('images/no-image.png') }}"
                                alt="{{ $item->name }}" class="w-14 h-14 object-cover rounded-xl bg-slate-900 shrink-0" />
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5">
                                    <h4 class="font-bold text-white text-xs truncate">{{ $item->name }}</h4>
                                    <i class="fa-solid fa-cart-shopping text-[10px] text-emerald-400" title="في السلة"></i>
                                </div>
                                <div class="text-emerald-400 font-extrabold text-xs mt-0.5">
                                    {{ number_format($item->price, 2) }} ₪
                                </div>
                            </div>
                            <div class="flex items-center gap-1 shrink-0">
                                <button type="button" onclick="toggleWishlist(this, {{ $item->product_id }})" title="المفضلة" class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-slate-700 text-slate-400 flex items-center justify-center transition">
                                    <i class="fa-regular fa-heart text-xs"></i>
                                </button>
                                <button type="button" onclick="removeFromCart({{ $item->id }}, this)" title="حذف من السلة" class="w-8 h-8 rounded-full bg-rose-500/10 hover:bg-rose-500 text-rose-400 hover:text-white flex items-center justify-center transition">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            @endif

            @if(!$hasItems)
                <div class="py-16 text-center space-y-3 text-slate-400">
                    <i class="fa-solid fa-cart-flatbed text-4xl text-slate-600 block"></i>
                    <p class="text-xs font-semibold">السلة فارغة حالياً</p>
                </div>
            @endif
        </div>

        <!-- Drawer Footer -->
        <div class="p-5 border-t border-slate-800 bg-slate-950 space-y-3">
            <div class="flex items-center justify-between text-sm">
                <span class="text-slate-400 font-semibold">الإجمالي:</span>
                <span class="text-lg font-black text-emerald-400">{{ number_format($totalPrice > 0 ? $totalPrice : $calcTotal, 2) }} ₪</span>
            </div>
            <a href="{{ route('customer.cart.index') }}" class="block w-full text-center bg-brand-600 hover:bg-brand-500 text-white font-bold py-3.5 rounded-full shadow-lg shadow-brand-600/30 transition text-xs">
                عرض السلة وتأكيد الشراء
            </a>
        </div>
    </div>
</div>
