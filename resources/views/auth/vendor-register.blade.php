<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل بائع جديد</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">

</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-600 py-4 px-6">
                <h1 class="text-white text-2xl font-bold">تسجيل بائع جديد</h1>
            </div>

            <form action="{{ route('vendor.register') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf

                <!-- معلومات الشخصية -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">المعلومات الشخصية</h2>

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 mb-2">الاسم الكامل</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="أدخل اسمك الكامل">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">البريد الإلكتروني</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="example@domain.com">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 mb-2">كلمة المرور</label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="8 أحرف على الأقل">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700 mb-2">تأكيد كلمة المرور</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="أعد إدخال كلمة المرور">
                    </div>
                </div>

                <!-- معلومات المتجر -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">معلومات المتجر</h2>

                    <div class="mb-4">
                        <label for="store_name" class="block text-gray-700 mb-2">اسم المتجر</label>
                        <input type="text" id="store_name" name="store_name" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="اسم المتجر كما سيظهر للعملاء">
                        @error('store_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- الوثائق المطلوبة -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">الوثائق المطلوبة</h2>

                    <div class="mb-4">
                        <label for="document_file" class="block text-gray-700 mb-2">رفع السجل التجاري</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                            <input type="file" id="document_file" name="document_file" required class="hidden"
                                accept=".pdf,.jpg,.png">
                            <div id="file-upload-area" class="cursor-pointer">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mt-1 text-sm text-gray-600">اسحب وأسقط الملف هنا أو انقر للاختيار</p>
                                <p class="text-xs text-gray-500">PDF, JPG, PNG (حجم أقصى 2MB)</p>
                            </div>
                            <div id="file-name" class="mt-2 text-sm font-medium text-gray-700 hidden"></div>
                        </div>
                        @error('document_file')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- شروط وأحكام -->
                <div class="mb-6">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox" required
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                        </div>
                        <label for="terms" class="mr-2 text-sm text-gray-700">
                            أوافق على <a href="#" class="text-blue-600 hover:underline">الشروط والأحكام</a> و <a
                                href="#" class="text-blue-600 hover:underline">سياسة الخصوصية</a>
                        </label>
                    </div>
                    @error('terms')
                        <span class="text-red-500 text-sm">يجب الموافقة على الشروط والأحكام</span>
                    @enderror
                </div>

                <!-- زر التسجيل -->
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150">
                    تسجيل الحساب
                </button>

                <!-- رابط تسجيل الدخول -->
                <div class="mt-4 text-center">
                    <p class="text-gray-600">لديك حساب بالفعل؟ <a href="{{ route('login') }}"
                            class="text-blue-600 hover:underline">سجل الدخول</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>