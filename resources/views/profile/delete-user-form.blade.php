<div>
    <x-action-section>
        <x-slot name="title">
            <span class="text-rose-400 font-bold text-lg flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation"></i> {{ __('حذف الحساب نهائياً') }}
            </span>
        </x-slot>

        <x-slot name="description">
            <span class="text-slate-400 text-xs block leading-relaxed">
                {{ __('إلغاء وتفريغ بيانات حسابك بشكل نهائي من القاعدة.') }}
            </span>
        </x-slot>

        <x-slot name="content">
            <div class="max-w-xl text-xs text-rose-300/80 leading-relaxed font-semibold bg-rose-500/10 p-4 rounded-2xl border border-rose-500/20">
                {{ __('بمجرد حذف حسابك، سيتم مسح كافة البيانات والمحتويات المرتبطة به نهائياً وبلا رجعة. يرجى الاحتفاظ وتنزيل أي ملفات ترغب بها قبل إتمام الحذف.') }}
            </div>

            <div class="mt-5">
                <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled" class="bg-gradient-to-r from-rose-600 to-rose-500 hover:from-rose-500 hover:to-rose-400 text-white font-bold text-xs px-6 py-2.5 rounded-full shadow-lg shadow-rose-600/30 transition">
                    {{ __('حذف الحساب بشكل نهائي') }}
                </x-danger-button>
            </div>

            <!-- Delete User Confirmation Modal -->
            <x-dialog-modal wire:model.live="confirmingUserDeletion">
                <x-slot name="title">
                    <span class="text-rose-400 font-bold text-base">{{ __('تأكيد حذف الحساب') }}</span>
                </x-slot>

                <x-slot name="content">
                    <p class="text-xs text-slate-300 leading-relaxed">
                        {{ __('هل أنت متأكد من رغبتك في حذف حسابك؟ يرجى إدخال كلمة المرور لتأكيد الحذف النهائي للحساب.') }}
                    </p>

                    <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                        <x-input type="password" class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 text-xs outline-none focus:border-rose-500 text-left"
                            placeholder="{{ __('كلمة المرور لتأكيد الحذف') }}" x-ref="password" wire:model="password" wire:keydown.enter="deleteUser" />

                        <x-input-error for="password" class="mt-1 text-xs text-rose-400" />
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled" class="bg-slate-800 text-white text-xs px-4 py-2 rounded-full">
                        {{ __('إلغاء الأمر') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3 bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs px-6 py-2 rounded-full" wire:click="deleteUser" wire:loading.attr="disabled">
                        {{ __('تأكيد الحذف النهائي') }}
                    </x-danger-button>
                </x-slot>
            </x-dialog-modal>
        </x-slot>
    </x-action-section>
</div>