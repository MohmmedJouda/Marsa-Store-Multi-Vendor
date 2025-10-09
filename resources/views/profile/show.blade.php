<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('الملف الشخصي') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center mb-10">
                @if (Auth()->user()->role !== 'vendor')
                            {{-- 🌟 نموذج الزبون --}}
                            <form action="{{ route('user.update-photo') }}" method="POST" enctype="multipart/form-data"
                                class="flex flex-col items-center">
                                @csrf
                                <label class="relative cursor-pointer group">
                                    <img src="{{ auth()->user()->profile_photo_path
                    ? asset('storage/' . auth()->user()->profile_photo_path)
                    : asset('images/default-avatar.png') }}"
                                        class="w-32 h-32 rounded-full object-cover border-4 border-gray-300 shadow-sm transition group-hover:opacity-80" />

                                    <input type="file" name="photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                        accept="image/*">

                                    <div
                                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full opacity-0 group-hover:opacity-100 transition pointer-events-none">
                                        <span class="text-white text-sm">تغيير الصورة</span>
                                    </div>
                                </label>

                                <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">تحديث
                                    الصورة</button>

                                @error('photo')
                                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                                @enderror

                                @if (session()->has('success'))
                                    <span class="text-green-600 text-sm mt-2">{{ session('success') }}</span>
                                @endif
                            </form>
                @else
                            {{-- 🌟 نموذج البائع --}}
                            <div class="flex flex-wrap justify-center gap-12">

                                {{-- 🧍‍♂️ صورة الحساب --}}
                                <form action="{{ route('user.update-photo') }}" method="POST" enctype="multipart/form-data"
                                    class="flex flex-col items-center">
                                    @csrf
                                    <label class="relative cursor-pointer group">
                                        <img src="{{ auth()->user()->profile_photo_path
                    ? asset('storage/' . auth()->user()->profile_photo_path)
                    : asset('images/default-avatar.png') }}"
                                            class="w-32 h-32 rounded-full object-cover border-4 border-gray-300 shadow-sm transition group-hover:opacity-80" />

                                        <input type="file" name="photo"
                                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">

                                        <div
                                            class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full opacity-0 group-hover:opacity-100 transition pointer-events-none">
                                            <span class="text-white text-sm">تغيير صورة الحساب</span>
                                        </div>
                                    </label>

                                    <button type="submit"
                                        class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">تحديث الصورة
                                        الشخصية
                                    </button>
                                    @error('photo')
                                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                                    @enderror

                                    @if (session()->has('user_photo_success'))
                                        <span class="text-green-600 text-sm mt-2">{{ session('user_photo_success') }}</span>
                                    @endif
                                </form>

                                {{-- 🏪 صورة المتجر --}}
                                <form action="{{ route('vendor.store.update-photo') }}" method="POST" enctype="multipart/form-data"
                                    class="flex flex-col items-center">
                                    @csrf
                                    <label class="relative cursor-pointer group">
                                        <img src="{{ auth()->user()->store && auth()->user()->store->logo
                    ? asset('storage/' . auth()->user()->store->logo)
                    : asset('assets2/images/store-logo.jpg') }}"
                                            class="w-32 h-32 rounded-full object-cover border-4 border-gray-300 shadow-sm transition group-hover:opacity-80" />

                                        <input type="file" name="store_photo"
                                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">

                                        <div
                                            class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full opacity-0 group-hover:opacity-100 transition pointer-events-none">
                                            <span class="text-white text-sm">تغيير صورة المتجر</span>
                                        </div>
                                    </label>

                                    <button type="submit"
                                        class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">تحديث صورة
                                        المتجر</button>

                                    @error('photo')
                                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                                    @enderror

                                    @if (session()->has('store_photo_success'))
                                        <span class="text-green-600 text-sm mt-2">{{ session('store_photo_success') }}</span>
                                    @endif
                                </form>
                            </div>
                @endif
            </div>



            <hr style="margin-bottom: 30px">


            @if (Auth::user()->role === 'vendor')


                <div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
                    <div class="grid grid-cols-12 gap-6">
                        <!-- العنوان والوصف -->
                        <div class="col-span-12 md:col-span-4 flex flex-col justify-center">
                            <h2 class="text-lg font-semibold">العبارة الدعائية للمتجر</h2>
                            <p class="text-gray-500 text-sm mt-1">
                                قم بوضع عبارة دعائية خاصة بالمتجر (Slogan).
                            </p>
                        </div>


                        <!-- النموذج -->
                        <div class="col-span-12 md:col-span-8">
                            <form method="POST" action="{{ route('vendor.store.updateSlogan', $user->store->id) }}">
                                @csrf
                                @method('POST') <!-- أو PUT حسب الـRoute -->

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">العبارة الدعائية
                                        للمتجر</label>
                                    <input type="text" name="slogan"
                                        class=" block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500
                                                                                                                                focus:ring-indigo-500 sm:text-sm p-2"
                                        style="color: black" placeholder="مثلاً: الجودة أولاً"
                                        value="{{$user->store->slogan}}">
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-900">
                                        تحديث
                                    </button>
                                </div>
                            </form>
                            @error('store_slogan')
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            @enderror

                            @if (session()->has('success'))
                                <span class="text-green-600 text-sm mt-2">{{ session('success') }}</span>
                            @endif
                        </div>

                    </div>
                </div>

                <hr style="margin-top:30px;margin-bottom:30px">
            @endif

            {{-- تحديث المعلومات الشخصية --}}
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            {{-- تحديث كلمة المرور --}}
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            {{-- إدارة التحقق بخطوتين --}}
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            {{-- تسجيل الخروج من الجلسات الأخرى --}}
            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            {{-- حذف الحساب --}}
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>