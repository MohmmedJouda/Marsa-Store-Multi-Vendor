<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="تسجيل بائع جديد وانضمام المتاجر - منصة مرساة" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>تسجيل بائع جديد | مرساة Store</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            200: '#bae0fd',
                            400: '#38bdf8',
                            500: '#0066ff',
                            600: '#0052cc',
                            700: '#003d99',
                            800: '#0b192c',
                            900: '#1e1e2f',
                            950: '#0f0f1a',
                        },
                        accent: {
                            gold: '#ffb703',
                            amber: '#f59e0b',
                            orange: '#fb8500',
                            coral: '#ff4d6d',
                            emerald: '#10b981',
                        }
                    },
                    fontFamily: {
                        sans: ['Tajawal', 'Cairo', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Tajawal', 'Cairo', sans-serif;
            background-color: #0b192c;
            color: #f1f5f9;
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.75);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .gradient-text {
            background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 50%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="bg-[#0b192c] text-slate-100 min-h-screen flex flex-col justify-center items-center p-4 selection:bg-brand-500 selection:text-white">

    <div class="w-full max-w-lg my-8 space-y-6 relative z-10" data-aos="fade-up">

        <!-- Header Logo -->
        <div class="text-center space-y-2">
            <a href="{{ route('guest.main-page') }}" class="inline-flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-brand-600 to-brand-400 flex items-center justify-center p-2.5 shadow-xl shadow-brand-500/30">
                    <img src="{{ asset('img/logo.svg') }}" alt="Marsa Logo" class="w-full h-full object-contain filter brightness-200" />
                </div>
                <div class="flex flex-col text-right">
                    <span class="text-3xl font-black gradient-text">مرساة</span>
                    <span class="text-[10px] text-slate-400 font-semibold tracking-wider">MARSA MERCHANT</span>
                </div>
            </a>
            <p class="text-xs text-slate-400">انضم للتجار وانشئ متجرك الرقمي في خطوات بسيطة</p>
        </div>

        <!-- Form Card -->
        <div class="glass-card rounded-3xl p-6 sm:p-8 shadow-2xl space-y-6">

            <div class="border-b border-slate-800 pb-3 flex items-center justify-between">
                <h2 class="text-xl font-black text-white flex items-center gap-2">
                    <i class="fa-solid fa-store text-brand-400"></i> طلب الانضمام كتاجر / بائع
                </h2>
                <span class="bg-brand-500/10 border border-brand-500/30 text-brand-400 text-[10px] font-bold px-2.5 py-0.5 rounded-full">
                    بوابة التجار
                </span>
            </div>

            <form action="{{ route('vendor.register') }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-xs">
                @csrf

                <!-- Section 1: Personal Info -->
                <div class="space-y-3">
                    <h3 class="font-bold text-slate-300 border-b border-slate-800 pb-1 flex items-center gap-2">
                        <i class="fa-solid fa-user text-brand-400"></i> المعلومات الشخصية للبائع
                    </h3>

                    <div class="space-y-1.5">
                        <label for="name" class="text-slate-300 font-semibold">الاسم الكامل</label>
                        <input type="text" id="name" name="name" required placeholder="اسم التاجر/المسؤول"
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 transition" />
                        @error('name') <span class="text-rose-400 text-[11px]">{{ $message }}</span> @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label for="email" class="text-slate-300 font-semibold">البريد الإلكتروني</label>
                        <input type="email" id="email" name="email" required placeholder="merchant@domain.com"
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left transition" />
                        @error('email') <span class="text-rose-400 text-[11px]">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="space-y-1.5">
                            <label for="password" class="text-slate-300 font-semibold">كلمة المرور</label>
                            <input type="password" id="password" name="password" required placeholder="••••••••"
                                class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left transition" />
                            @error('password') <span class="text-rose-400 text-[11px]">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label for="password_confirmation" class="text-slate-300 font-semibold">تأكيد كلمة المرور</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="••••••••"
                                class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 text-left transition" />
                        </div>
                    </div>
                </div>

                <!-- Section 2: Store Info -->
                <div class="space-y-3">
                    <h3 class="font-bold text-slate-300 border-b border-slate-800 pb-1 flex items-center gap-2">
                        <i class="fa-solid fa-shop text-brand-400"></i> تفاصيل المتجر والنشاط
                    </h3>

                    <div class="space-y-1.5">
                        <label for="store_name" class="text-slate-300 font-semibold">اسم المتجر / العلامة التجارية</label>
                        <input type="text" id="store_name" name="store_name" required placeholder="مثال: متجر الأناقة الرقمية"
                            class="w-full bg-slate-950 border border-slate-800 text-white rounded-xl p-3 outline-none focus:border-brand-500 transition" />
                        @error('store_name') <span class="text-rose-400 text-[11px]">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Section 3: Document Upload -->
                <div class="space-y-3">
                    <h3 class="font-bold text-slate-300 border-b border-slate-800 pb-1 flex items-center gap-2">
                        <i class="fa-solid fa-file-contract text-brand-400"></i> التوثيق والسجل التجاري
                    </h3>

                    <div class="border-2 border-dashed border-slate-800 hover:border-brand-500/50 rounded-2xl p-4 text-center bg-slate-950/60 transition">
                        <input type="file" id="document_file" name="document_file" required class="hidden" accept=".pdf,.jpg,.png" />
                        <label for="document_file" class="cursor-pointer block space-y-2">
                            <i class="fa-solid fa-cloud-arrow-up text-3xl text-brand-400 block"></i>
                            <span class="font-bold text-white block">انقر لاختيار ملف السجل التجاري أو الهوية</span>
                            <span class="text-[11px] text-slate-500 block">الصيغ المقبولة: PDF, JPG, PNG (حد أقصى 2MB)</span>
                        </label>
                        <div id="file-name-display" class="mt-2 text-xs font-bold text-emerald-400 hidden"></div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 text-white font-black py-4 rounded-xl shadow-lg shadow-brand-600/30 transition text-sm">
                    إرسال طلب الانضمام كبائع <i class="fa-solid fa-arrow-left ms-2"></i>
                </button>
            </form>

            <div class="pt-3 border-t border-slate-800 text-center">
                <p class="text-xs text-slate-400">
                    لديك حساب بائع بالفعل؟
                    <a href="{{ route('login') }}" class="text-brand-400 font-bold hover:underline me-1">
                        تسجيل الدخول
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });

        const docInput = document.getElementById('document_file');
        const fileNameDisplay = document.getElementById('file-name-display');

        if (docInput) {
            docInput.addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    fileNameDisplay.textContent = 'تم اختيار الملف: ' + this.files[0].name;
                    fileNameDisplay.classList.remove('hidden');
                }
            });
        }
    </script>
</body>

</html>