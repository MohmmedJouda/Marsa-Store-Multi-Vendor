<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{--
    <link rel="stylesheet" href="{{asset('assets2/css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('assets2/css/tiny-slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Vg0..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.lineicons.com/3.0/lineicons.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        {{-- @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif --}}

        <header id="main-header" class="apple-header">
            <nav class="nav">
                <ul class="nav-list">
                    @if (Auth()->user()->role === 'customer')
                        <li class="logoheader"><a href="{{ route('customer.main-page') }}"><img
                                    src="{{ asset('img/logo.svg') }}" class="apple-logo" /></a>
                        </li>
                    @elseif (Auth()->user()->role === 'vendor')
                        <li class="logoheader"><a href="{{ route('vendor.categories.index') }}"><img
                                    src="{{ asset('img/logo.svg') }}" class="apple-logo" /></a>
                        </li>
                    @elseif (Auth()->user()->role === 'moderator')
                        <li class="logoheader"><a href="{{ route('moderator.dashboard') }}"><img
                                    src="{{ asset('img/logo.svg') }}" class="apple-logo" /></a>
                        </li>
                    @elseif (Auth()->user()->role === 'super_admin')
                        <li class="logoheader"><a href="{{ route('admin.dashboard') }}"><img
                                    src="{{ asset('img/logo.svg') }}" class="apple-logo" /></a>
                        </li>
                    @endif

                    <div class="centardiv" id="userIcon" role="button" aria-haspopup="true" aria-expanded="false"
                        title="قائمة المستخدم">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </ul>

            </nav>
        </header>



        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script src="{{asset('assets2/js/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets2/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets2/js/main.js')}}"></script>
    <script src="{{asset('assets2/js/jsmain.js')}}"></script>
    <script src="{{asset('assets2/js/js/tiny-slider.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init();</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const userIcon = document.getElementById('userIcon');
            const dropdown = document.getElementById('userDropdown');

            if (!userIcon || !dropdown) {
                console.warn('userIcon or userDropdown element not found. تأكد من وجود العنصرين ومعرفاتهما id="userIcon" و id="userDropdown".');
                return;
            }

            // تأكد أن الـ dropdown طفل مباشر للـ body حتى لا يتأثر بـ overflow/transform من والدين آخرين
            if (dropdown.parentElement !== document.body) {
                document.body.appendChild(dropdown);
            }

            // إعدادات أولية
            dropdown.style.position = 'absolute';
            dropdown.style.display = 'none';
            dropdown.style.zIndex = 9999;

            function positionDropdown() {
                // نظهر مؤقتاً مخفياً لقياس الأبعاد بدون فلاش
                dropdown.style.display = 'block';
                dropdown.style.visibility = 'hidden';
                dropdown.classList.add('open'); // يضيف أي ستايل عرض لو حاطه
                const iconRect = userIcon.getBoundingClientRect();
                const ddRect = dropdown.getBoundingClientRect();
                const gap = 8; // مسافة بين الأيقونة والقائمة

                // محاذاة يمين القائمة مع يمين الأيقونة (مناسب للـ RTL)
                let left = window.scrollX + iconRect.right - ddRect.width;
                let top = window.scrollY + iconRect.bottom + gap;

                const margin = 8;
                if (left < margin) left = margin;
                if (left + ddRect.width > window.innerWidth - margin) left = window.innerWidth - ddRect.width - margin;

                // إذا ما فيه مساحة تحت، اعرض فوق الأيقونة
                if (top + ddRect.height > window.scrollY + window.innerHeight - margin) {
                    top = window.scrollY + iconRect.top - ddRect.height - gap;
                }

                dropdown.style.left = Math.round(left) + 'px';
                dropdown.style.top = Math.round(top) + 'px';

                // أظهر بشكل نهائي
                dropdown.style.visibility = 'visible';
            }

            function openDropdown() {
                positionDropdown();
                dropdown.classList.add('open');
                userIcon.setAttribute('aria-expanded', 'true');
                dropdown.setAttribute('aria-hidden', 'false');

                window.addEventListener('resize', positionDropdown);
                window.addEventListener('scroll', positionDropdown, true);
            }

            function closeDropdown() {
                dropdown.classList.remove('open');
                dropdown.style.display = 'none';
                userIcon.setAttribute('aria-expanded', 'false');
                dropdown.setAttribute('aria-hidden', 'true');

                window.removeEventListener('resize', positionDropdown);
                window.removeEventListener('scroll', positionDropdown, true);
            }

            userIcon.addEventListener('click', function (e) {
                e.stopPropagation();
                if (dropdown.classList.contains('open')) closeDropdown();
                else openDropdown();
            });

            // غلق عند النقر خارج القائمة أو عند الضغط على Esc
            document.addEventListener('click', function (e) {
                if (!dropdown.contains(e.target) && !userIcon.contains(e.target)) {
                    closeDropdown();
                }
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') closeDropdown();
            });

        });

    </script>

    <div id="userDropdown" class="user-dropdown" role="menu" aria-hidden="true">
        <div class="user-header d-flex align-items-center px-3 py-2 mb-2">
            <i class="fa-solid fa-user fa-lg me-2"></i>
            <span class="username">{{ Auth::user()->name ?? 'Guest' }}</span>
        </div>

        <hr class="dropdown-divider" style="margin:0; border-color: rgba(255,255,255,0.1)">
        <a class="user-item" href="{{ route('profile.show') }}">
            <i class="fa-solid fa-user-pen"></i>&nbsp;الملف الشخصي
        </a>
        <a class="user-item" href="{{ route('customer.orders.show') }}">
            <i class="fa-solid fa-box fa-lg me-2"></i>&nbsp; طلباتك
        </a>
        <a class="user-item" href="#">
            <i class="fa-solid fa-gear"></i>&nbsp;الإعدادات
        </a>

        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button type="submit" class="user-item text-danger"
                style="border:none; background:transparent; width:100%; text-align:right;">
                <i class="fa-solid fa-right-from-bracket"></i>&nbsp;خروج
            </button>
        </form>
    </div>
</body>

</html>