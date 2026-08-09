<div>
    <x-action-section>
        <x-slot name="title">
            <span class="text-white font-bold text-lg flex items-center gap-2">
                <i class="fa-solid fa-desktop text-brand-400"></i> {{ __('تسجيل الخروج من الجلسات الأجهزة الأخرى') }}
            </span>
        </x-slot>

        <x-slot name="description">
            <span class="text-slate-400 text-xs block leading-relaxed">
                {{ __('إدارة وتأمين الجلسات النشطة لحسابك على مختلف الأجهزة والمتصفحات.') }}
            </span>
        </x-slot>

        <x-slot name="content">
            <div class="max-w-xl text-xs text-slate-300 leading-relaxed">
                {{ __('إذا لزم الأمر، يمكنك تسجيل الخروج من كافة جلسات المتصفح الأخرى عبر جميع أجهزتك الذكية المحفوظة.') }}
            </div>

            @if (count($this->sessions) > 0)
                <div class="mt-4 space-y-3">
                    @foreach ($this->sessions as $session)
                        <div class="flex items-center justify-between p-3 bg-slate-950/80 rounded-2xl border border-slate-800 text-xs">
                            <div class="flex items-center gap-3">
                                <div class="text-brand-400 text-xl">
                                    @if ($session->agent->isDesktop())
                                        <i class="fa-solid fa-desktop"></i>
                                    @else
                                        <i class="fa-solid fa-mobile-screen-button"></i>
                                    @endif
                                </div>

                                <div>
                                    <div class="font-bold text-white">
                                        {{ $session->agent->platform() ? $session->agent->platform() : __('غير معروف') }} -
                                        {{ $session->agent->browser() ? $session->agent->browser() : __('غير معروف') }}
                                    </div>
                                    <div class="text-[11px] text-slate-400">
                                        {{ $session->ip_address }},
                                        @if ($session->is_current_device)
                                            <span class="text-emerald-400 font-bold me-1">هذا الجهاز حالياً</span>
                                        @else
                                            <span>آخر نشاط {{ $session->last_active }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="flex items-center mt-5">
                <x-button wire:click="confirmLogout" wire:loading.attr="disabled" class="bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-bold text-xs px-6 py-2.5 rounded-full shadow-lg transition">
                    {{ __('تسجيل الخروج من الجلسات الأخرى') }}
                </x-button>

                <x-action-message class="ms-3 text-xs font-bold text-emerald-400" on="loggedOut">
                    {{ __('تم تسجيل الخروج بنجاح.') }}
                </x-action-message>
            </div>

            <!-- Log Out Other Devices Confirmation Modal -->
            <x-dialog-modal wire:model.live="confirmingLogout">
                <x-slot name="title">
                    <span class="text-white font-bold text-base">{{ __('تسجيل الخروج من جميع الجلسات') }}</span>
                </x-slot>

                <x-slot name="content">
                    <p class="text-xs text-slate-300 mb-3">
                        {{ __('يرجى إدخال كلمة المرور لتأكيد رغبتك في إنهاء الجلسات الأخرى على الأجهزة المحفوظة.') }}
                    </p>

                    <div class="mt-2" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                        <x-input type="password" class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 text-xs outline-none focus:border-brand-500 text-left"
                            placeholder="{{ __('كلمة المرور الحالية') }}" x-ref="password" wire:model="password" wire:keydown.enter="logoutOtherBrowserSessions" />

                        <x-input-error for="password" class="mt-1 text-xs text-rose-400" />
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled" class="bg-slate-800 text-white text-xs px-4 py-2 rounded-full">
                        {{ __('إلغاء') }}
                    </x-secondary-button>

                    <x-button class="ms-3 bg-brand-600 hover:bg-brand-500 text-white text-xs px-6 py-2 rounded-full" wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled">
                        {{ __('تأكيد تسجيل الخروج') }}
                    </x-button>
                </x-slot>
            </x-dialog-modal>
        </x-slot>
    </x-action-section>
</div>
