<div>
    <x-action-section>
        <x-slot name="title">
            <span class="text-white font-bold text-lg flex items-center gap-2">
                <i class="fa-solid fa-shield-halved text-brand-400"></i> {{ __('المصادقة الثنائية (2FA)') }}
            </span>
        </x-slot>

        <x-slot name="description">
            <span class="text-slate-400 text-xs block leading-relaxed">
                {{ __('إضافة طبقة أمان وحماية إضافية لحسابك باستخدام المصادقة الثنائية.') }}
            </span>
        </x-slot>

        <x-slot name="content">
            <h3 class="text-sm font-bold text-white mb-2">
                @if ($this->enabled)
                    @if ($showingConfirmation)
                        {{ __('إكمال إعداد تمكين المصادقة الثنائية.') }}
                    @else
                        {{ __('تم تمكين المصادقة الثنائية للحساب بنجاح.') }}
                    @endif
                @else
                    {{ __('لم تقم بتمكين المصادقة الثنائية بعد.') }}
                @endif
            </h3>

            <div class="mt-2 max-w-xl text-xs text-slate-300 leading-relaxed">
                <p>
                    {{ __('عند تمكين المصادقة الثنائية، سيُطلب منك إدخال رمز عشوائي وآمن أثناء عملية تسجيل الدخول. يمكنك الحصول على هذا الرمز من تطبيق Google Authenticator.') }}
                </p>
            </div>

            @if ($this->enabled)
                @if ($showingQrCode)
                    <div class="mt-4 max-w-xl text-xs text-slate-300">
                        <p class="font-semibold text-brand-400">
                            @if ($showingConfirmation)
                                {{ __('لإكمال التفعيل، قم بمسح رمز الاستجابة السريعة (QR) باستخدام تطبيق المصادقة ثم أدخل الرمز النتاج أدناه.') }}
                            @else
                                {{ __('تم التفعيل. قم بمسح رمز QR التالي لربط التطبيق بحسابك.') }}
                            @endif
                        </p>
                    </div>

                    <div class="mt-4 p-3 inline-block bg-white rounded-2xl shadow-xl">
                        {!! $this->user->twoFactorQrCodeSvg() !!}
                    </div>

                    <div class="mt-3 max-w-xl text-xs font-mono text-slate-300 bg-slate-950 p-3 rounded-xl border border-slate-800">
                        <p class="font-bold text-white">مفتاح الإعداد اليدوي (Setup Key):</p>
                        <span class="text-emerald-400 tracking-wider font-bold">{{ decrypt($this->user->two_factor_secret) }}</span>
                    </div>

                    @if ($showingConfirmation)
                        <div class="mt-4 space-y-1.5">
                            <x-label for="code" value="{{ __('رمز التحقق (Code)') }}" class="text-xs text-slate-300 font-semibold" />

                            <x-input id="code" type="text" name="code" class="block mt-1 w-full sm:w-1/2 bg-slate-950 border border-slate-800 text-white rounded-xl p-3 text-xs outline-none focus:border-brand-500 font-mono tracking-widest text-center" inputmode="numeric" autofocus
                                autocomplete="one-time-code" wire:model="code" wire:keydown.enter="confirmTwoFactorAuthentication" />

                            <x-input-error for="code" class="mt-1 text-xs text-rose-400" />
                        </div>
                    @endif
                @endif

                @if ($showingRecoveryCodes)
                    <div class="mt-4 max-w-xl text-xs text-slate-300">
                        <p class="font-semibold text-amber-400">
                            {{ __('احتفظ برموز الاسترداد هذه في مكان آمن. يمكن استخدامها لاستعادة الوصول لحسابك في حال فقدان جهازك.') }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-2 max-w-xl mt-3 p-4 font-mono text-xs bg-slate-950 text-brand-400 rounded-2xl border border-slate-800">
                        @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                            <div>{{ $code }}</div>
                        @endforeach
                    </div>
                @endif
            @endif

            <div class="mt-5">
                @if (!$this->enabled)
                    <x-confirms-password wire:then="enableTwoFactorAuthentication">
                        <x-button type="button" wire:loading.attr="disabled" class="bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-bold text-xs px-6 py-2.5 rounded-full shadow-lg transition">
                            {{ __('تمكين المصادقة الثنائية') }}
                        </x-button>
                    </x-confirms-password>
                @else
                    @if ($showingRecoveryCodes)
                        <x-confirms-password wire:then="regenerateRecoveryCodes">
                            <x-secondary-button class="me-3 bg-slate-800 text-white hover:bg-slate-700 text-xs py-2 px-4 rounded-full border-slate-700">
                                {{ __('تجديد رموز الاسترداد') }}
                            </x-secondary-button>
                        </x-confirms-password>
                    @elseif ($showingConfirmation)
                        <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                            <x-button type="button" class="me-3 bg-emerald-600 text-white hover:bg-emerald-500 text-xs py-2 px-6 rounded-full" wire:loading.attr="disabled">
                                {{ __('تأكيد الرمز') }}
                            </x-button>
                        </x-confirms-password>
                    @else
                        <x-confirms-password wire:then="showRecoveryCodes">
                            <x-secondary-button class="me-3 bg-slate-800 text-white hover:bg-slate-700 text-xs py-2 px-4 rounded-full border-slate-700">
                                {{ __('إظهار رموز الاسترداد') }}
                            </x-secondary-button>
                        </x-confirms-password>
                    @endif

                    @if ($showingConfirmation)
                        <x-confirms-password wire:then="disableTwoFactorAuthentication">
                            <x-secondary-button wire:loading.attr="disabled" class="bg-slate-800 text-slate-300 hover:bg-slate-700 text-xs py-2 px-4 rounded-full border-slate-700">
                                {{ __('إلغاء') }}
                            </x-secondary-button>
                        </x-confirms-password>
                    @else
                        <x-confirms-password wire:then="disableTwoFactorAuthentication">
                            <x-danger-button wire:loading.attr="disabled" class="bg-rose-600/20 hover:bg-rose-600 text-rose-400 hover:text-white border border-rose-500/30 font-bold text-xs px-5 py-2.5 rounded-full transition">
                                {{ __('تعطيل') }}
                            </x-danger-button>
                        </x-confirms-password>
                    @endif
                @endif
            </div>
        </x-slot>
    </x-action-section>
</div>
