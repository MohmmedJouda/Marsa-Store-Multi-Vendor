@props(['notifications' => null])

<!-- NOTIFICATIONS FLYOUT DRAWER (Off-Canvas) -->
<div id="notifications-drawer-overlay" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-[100] hidden transition-opacity duration-300 opacity-0">
    <div id="notifications-drawer" class="fixed inset-y-0 left-0 w-full sm:w-96 bg-slate-900 border-r border-slate-800 shadow-2xl flex flex-col justify-between transform -translate-x-full transition-transform duration-300 ease-in-out">
        <!-- Drawer Header -->
        <div class="p-5 border-b border-slate-800 flex items-center justify-between bg-slate-950">
            <h3 class="font-bold text-white text-base flex items-center gap-2">
                <i class="fa-solid fa-bell text-brand-400"></i> الإشعارات
            </h3>
            <button id="close-notifications-btn" type="button" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white flex items-center justify-center transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Drawer Body -->
        <div id="notifications-drawer-body" class="p-5 flex-1 overflow-y-auto space-y-3">
            @auth
                @php
                    $unreadNotifs = Auth::user()->unreadNotifications ?? collect();
                @endphp
                @forelse ($unreadNotifs as $notification)
                    @php
                        $status = $notification->data['status'] ?? null;
                        $badgeClass = $status === 'approved' ? 'text-emerald-400' : ($status === 'rejected' ? 'text-rose-400' : 'text-slate-300');
                        $icon = $status === 'approved' ? 'fa-circle-check text-emerald-400' : ($status === 'rejected' ? 'fa-circle-xmark text-rose-400' : 'fa-bell text-brand-400');
                    @endphp
                    <div class="p-3.5 bg-slate-800/70 hover:bg-slate-800 rounded-2xl transition border border-slate-700/50 text-xs space-y-1">
                        <div class="flex items-start gap-3">
                            <i class="fa-solid {{ $icon }} text-base mt-0.5 shrink-0"></i>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <span class="font-bold {{ $badgeClass }}">فريق الدعم</span>
                                    <span class="text-[10px] text-slate-400">{{ $notification->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-slate-200 mt-1 leading-relaxed">{{ $notification->data['message'] ?? '' }}</p>
                                @if(isset($notification->data['reply']))
                                <p class="mt-2 p-2.5 bg-slate-950/80 rounded-xl text-slate-300 text-[11px]">
                                    <strong class="text-brand-400">رد الإدارة:</strong> {{ $notification->data['reply'] }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="py-16 text-center space-y-3 text-slate-400">
                        <i class="fa-regular fa-bell-slash text-4xl text-slate-600 block"></i>
                        <p class="text-xs font-semibold">لا توجد إشعارات جديدة حالياً</p>
                    </div>
                @endforelse
            @else
                <div class="py-16 text-center space-y-3 text-slate-400">
                    <i class="fa-regular fa-bell-slash text-4xl text-slate-600 block"></i>
                    <p class="text-xs font-semibold">سجل الدخول لعرض الإشعارات الخاصة بك</p>
                    <button onclick="openModal()" class="inline-block bg-brand-600 hover:bg-brand-500 text-white font-bold px-6 py-2.5 rounded-full text-xs transition shadow-md">
                        تسجيل الدخول
                    </button>
                </div>
            @endauth
        </div>

        <!-- Drawer Footer -->
        <div class="p-5 border-t border-slate-800 bg-slate-950 text-center">
            <button onclick="closeNotifications()" class="w-full bg-slate-800 hover:bg-slate-700 text-white font-bold py-3 rounded-full text-xs transition">
                إغلاق قائمة الإشعارات
            </button>
        </div>
    </div>
</div>
