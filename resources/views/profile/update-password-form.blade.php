<div>
    <x-form-section submit="updatePassword">
        <x-slot name="title">
            <span class="text-white font-bold text-lg flex items-center gap-2">
                <i class="fa-solid fa-lock text-brand-400"></i> {{ __('تغيير كلمة المرور') }}
            </span>
        </x-slot>

        <x-slot name="description">
            <span class="text-slate-400 text-xs block leading-relaxed">
                {{ __('تأكد من استخدام كلمة مرور قوية وطويلة للحفاظ على أمان حسابك.') }}
            </span>
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4 space-y-1.5">
                <x-label for="current_password" value="{{ __('كلمة المرور الحالية') }}" class="text-slate-300 font-semibold text-xs" />
                <x-input id="current_password" type="password" class="mt-1 block w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 text-xs outline-none focus:border-brand-500 text-left transition" wire:model="state.current_password" autocomplete="current-password" />
                <x-input-error for="current_password" class="mt-1 text-xs text-rose-400" />
            </div>

            <div class="col-span-6 sm:col-span-4 space-y-1.5">
                <x-label for="password" value="{{ __('كلمة المرور الجديدة') }}" class="text-slate-300 font-semibold text-xs" />
                <x-input id="password" type="password" class="mt-1 block w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 text-xs outline-none focus:border-brand-500 text-left transition" wire:model="state.password" autocomplete="new-password" />
                <x-input-error for="password" class="mt-1 text-xs text-rose-400" />
            </div>

            <div class="col-span-6 sm:col-span-4 space-y-1.5">
                <x-label for="password_confirmation" value="{{ __('تأكيد كلمة المرور الجديدة') }}" class="text-slate-300 font-semibold text-xs" />
                <x-input id="password_confirmation" type="password" class="mt-1 block w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 text-xs outline-none focus:border-brand-500 text-left transition" wire:model="state.password_confirmation" autocomplete="new-password" />
                <x-input-error for="password_confirmation" class="mt-1 text-xs text-rose-400" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-action-message class="me-3 text-xs font-bold text-emerald-400" on="saved">
                {{ __('تم تغيير كلمة المرور بنجاح.') }}
            </x-action-message>

            <x-button class="bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-bold text-xs px-6 py-2.5 rounded-full shadow-lg shadow-brand-600/30 transition">
                {{ __('حفظ كلمة المرور') }}
            </x-button>
        </x-slot>
    </x-form-section>
</div>
