<div>
    <x-form-section submit="updateProfileInformation">
        <x-slot name="title">
            <span class="text-white font-bold text-lg flex items-center gap-2">
                <i class="fa-solid fa-user-pen text-brand-400"></i> {{ __('تحديث المعلومات الشخصية') }}
            </span>
        </x-slot>

        <x-slot name="description">
            <span class="text-slate-400 text-xs block leading-relaxed">
                {{ __('قم بتحديث معلومات ملف تعريف حسابك وعنوان البريد الإلكتروني الخاص بك.') }}
            </span>
        </x-slot>

        <x-slot name="form">
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4 space-y-1.5">
                <x-label for="name" value="{{ __('الاسم الكامل') }}" class="text-slate-300 font-semibold text-xs" />
                <x-input id="name" type="text" class="mt-1 block w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 text-xs outline-none focus:border-brand-500 transition" required autocomplete="name" wire:model="state.name" />
                <x-input-error for="name" class="mt-1 text-xs text-rose-400" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4 space-y-1.5">
                <x-label for="email" value="{{ __('البريد الإلكتروني') }}" class="text-slate-300 font-semibold text-xs" />
                <x-input id="email" type="email" class="mt-1 block w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 text-xs outline-none focus:border-brand-500 text-left transition" required autocomplete="username" wire:model="state.email" />
                <x-input-error for="email" class="mt-1 text-xs text-rose-400" />

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !$this->user->hasVerifiedEmail())
                    <p class="text-xs mt-2 text-amber-400 font-medium">
                        {{ __('عنوان بريدك الإلكتروني غير مؤكد حالياً.') }}

                        <button type="button" class="underline text-xs text-brand-400 hover:text-white ms-1" wire:click.prevent="sendEmailVerification">
                            {{ __('انقر هنا لإعادة إرسال رابط التفعيل.') }}
                        </button>
                    </p>

                    @if ($this->verificationLinkSent)
                        <p class="mt-2 font-bold text-xs text-emerald-400">
                            {{ __('تم إرسال رابط التفعيل الجديد إلى عنوان بريدك الإلكتروني بنجاح.') }}
                        </p>
                    @endif
                @endif
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-action-message class="me-3 text-xs font-bold text-emerald-400" on="saved">
                {{ __('تم الحفظ بنجاح.') }}
            </x-action-message>

            <x-button wire:loading.attr="disabled" wire:target="photo" class="bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-bold text-xs px-6 py-2.5 rounded-full shadow-lg shadow-brand-600/30 transition">
                {{ __('حفظ التعديلات') }}
            </x-button>
        </x-slot>
    </x-form-section>
</div>
