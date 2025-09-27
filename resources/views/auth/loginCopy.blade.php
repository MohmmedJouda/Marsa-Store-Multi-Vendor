<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>

            <!-- زر Google -->
            <div class="flex flex-col space-y-3 mt-4">
                <a href="{{ url('/auth/google') }}" class="flex items-center justify-center gap-2 bg-white text-gray-700 border border-gray-300 rounded-md px-4 py-2 shadow hover:bg-gray-100">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google Logo">
                    <span>تسجيل الدخول بواسطة Google</span>
                </a>

                <!-- زر Facebook -->
                <a href="{{ url('/auth/facebook') }}" class="flex items-center justify-center gap-2 bg-blue-600 text-white rounded-md px-4 py-2 shadow hover:bg-blue-700">
                    <img src="https://www.svgrepo.com/show/475645/facebook-color.svg" class="w-5 h-5 bg-white rounded-full p-0.5" alt="Facebook Logo">
                    <span>تسجيل الدخول بواسطة Facebook</span>
                </a>

                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        {{ __('Not registered yet?') }}
                        <a href="#" id="show-register-options" class="text-blue-600 hover:text-blue-700">{{ __('Register here') }}</a>
                    </p>
                </div>
            </div>

        </form>

        <!-- Modal for Register options -->
        <div id="register-modal" class="modal hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="modal-content bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h3 class="text-lg font-semibold mb-4 text-center">اختر نوع التسجيل</h3>
                <div class="flex justify-center space-x-4 mt-3">
                    <!-- تسجيل كزبون -->
                    <a href="{{ route('register') }}" class="flex items-center justify-center gap-2 bg-green-600 text-white rounded-md px-4 py-2 shadow hover:bg-green-700">
                        <span>تسجيل كزبون</span>
                    </a>

                    <!-- تسجيل كتاجر -->
                    <a href="{{ route('vendor.register') }}" class="flex items-center justify-center gap-2 bg-yellow-600 text-white rounded-md px-4 py-2 shadow hover:bg-yellow-700">
                        <span>تسجيل كتاجر</span>
                    </a>
                </div>
                <button id="close-modal" class="mt-4 text-center w-full bg-gray-300 text-gray-700 py-2 rounded-lg">إغلاق</button>
            </div>
        </div>


        <style>
            /* Hide the modal by default */
.modal.hidden {
    display: none;
}

/* Basic styling for modal */
.modal-content {
    max-width: 500px;
    width: 100%;
    background: white;
    padding: 20px;
    border-radius: 10px;
}

.modal {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
}

.modal-content {
    max-width: 500px;
    width: 80%;
    margin: auto;
    background: white;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

button {
    cursor: pointer;
}

.bg-gray-300 {
    background-color: #d1d5db;
}

.bg-opacity-50 {
    background-color: rgba(0, 0, 0, 0.5);
}

        </style>

        <script>
            document.getElementById('show-register-options').addEventListener('click', function(e) {
    e.preventDefault();  // Prevent default link action
    document.getElementById('register-modal').classList.remove('hidden');  // Show the modal
});

document.getElementById('close-modal').addEventListener('click', function() {
    document.getElementById('register-modal').classList.add('hidden');  // Close the modal
});

        </script>

    </x-authentication-card>
</x-guest-layout>
