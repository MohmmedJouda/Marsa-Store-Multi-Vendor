<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('الملف الشخصي') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            {{-- تحديث المعلومات الشخصية --}}
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <h3 class="text-lg font-medium text-gray-900 mb-4">تحديث المعلومات الشخصية</h3>
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            {{-- تحديث كلمة المرور --}}
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">تغيير كلمة المرور</h3>
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            {{-- إدارة التحقق بخطوتين --}}
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">إدارة التحقق بخطوتين</h3>
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            {{-- تسجيل الخروج من الجلسات الأخرى --}}
            <div class="mt-10 sm:mt-0">
                <h3 class="text-lg font-medium text-gray-900 mb-4">تسجيل الخروج من جميع الأجهزة</h3>
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            {{-- حذف الحساب --}}
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    <h3 class="text-lg font-medium text-red-600 mb-4">حذف الحساب</h3>
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>