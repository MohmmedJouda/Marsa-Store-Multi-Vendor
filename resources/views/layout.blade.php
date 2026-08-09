<!DOCTYPE html>
<html lang="ar" dir="rtl">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>مرساة | لوحة التحكم</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('assets2/images/logo/logo.svg') }}" type="image/png" />

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Metronic Global Stylesheets -->
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

    <style>
        :root {
            --kt-font-family-sans-serif: "Cairo", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        body,
        .menu,
        .btn,
        .card,
        .breadcrumb,
        .form-control,
        .table {
            font-family: var(--kt-font-family-sans-serif) !important;
        }

        .text-start {
            text-align: right !important;
        }

        .text-end {
            text-align: left !important;
        }

        /* Modern Custom Admin Aesthetics */
        .aside-dark {
            background-color: #1e1e2d !important;
            box-shadow: -4px 0 20px rgba(0, 0, 0, 0.08);
        }

        .aside-menu .menu-item .menu-link {
            border-radius: 0.65rem;
            margin: 2px 10px;
            transition: all 0.2s ease-in-out;
        }

        .aside-menu .menu-item .menu-link.active,
        .aside-menu .menu-item .menu-link:hover {
            background-color: rgba(54, 153, 255, 0.12) !important;
            color: #3699FF !important;
        }

        .aside-menu .menu-item .menu-link.active .menu-icon,
        .aside-menu .menu-item .menu-link:hover .menu-icon {
            color: #3699FF !important;
        }

        .header-glass {
            background: rgba(255, 255, 255, 0.94) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(225, 230, 240, 0.8);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        }

        .search-field-custom {
            transition: all 0.25s ease-in-out;
            border: 1px solid #eef2f7 !important;
        }

        .search-field-custom:focus {
            background-color: #ffffff !important;
            border-color: #3699FF !important;
            box-shadow: 0 0 0 0.25rem rgba(54, 153, 255, 0.15) !important;
        }

        .dropdown-user-custom {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12) !important;
            border-radius: 1rem !important;
        }

        .hover-scale {
            transition: transform 0.2s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.03);
        }
    </style>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-enabled aside-fixed">

    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row-reverse flex-column-fluid">

            <!--begin::Aside Sidebar-->
            <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true"
                data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '255px'}"
                data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_aside_mobile_toggle">

                <!--begin::Brand Header-->
                <div class="aside-logo flex-column-auto px-6 py-4 d-flex align-items-center justify-content-between" id="kt_aside_logo">
                    @if(Auth::check() && Auth::user()->role == 'vendor')
                    <a href="{{route('vendor.dashboard')}}" class="d-flex align-items-center text-white text-decoration-none">
                        @elseif(Auth::check() && Auth::user()->role == 'moderator')
                        <a href="{{route('moderator.dashboard')}}" class="d-flex align-items-center text-white text-decoration-none">
                            @elseif(Auth::check() && Auth::user()->role == 'super_admin')
                            <a href="{{route('admin.dashboard')}}" class="d-flex align-items-center text-white text-decoration-none">
                                @else
                                <a href="/" class="d-flex align-items-center text-white text-decoration-none">
                                    @endif
                                    <img alt="Logo" src="{{asset('assets2/images/logo/logo.svg')}}" class="h-40px logo me-2" />
                                    <div class="d-flex flex-column">
                                        <span class="fw-bolder fs-5 text-white lh-1">مرساة</span>
                                        <span class="fs-9 text-muted fw-bold mt-1">
                                            @if(Auth::check() && Auth::user()->role == 'vendor') لوحة التاجر
                                            @elseif(Auth::check() && Auth::user()->role == 'moderator') لوحة المشرف
                                            @elseif(Auth::check() && Auth::user()->role == 'super_admin') الإدارة العامة
                                            @else لوحة التحكم @endif
                                        </span>
                                    </div>
                                </a>

                                <!--Aside toggler-->
                                <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle ms-2"
                                    data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
                                    <span class="svg-icon svg-icon-1 rotate-180 text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
                                            <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                </div>
                <!--end::Brand Header-->

                <!--begin::Aside Menu-->
                <div class="aside-menu flex-column-fluid">
                    <div class="hover-scroll-overlay-y my-3 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                        data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">

                        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                            id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

                            <!-- Dashboard Link for All Roles -->
                            <div class="menu-item">
                                @if(Auth::check() && Auth::user()->role == 'moderator')
                                <a class="menu-link {{ request()->routeIs('moderator.dashboard') ? 'active' : '' }}" href="{{route('moderator.dashboard')}}">
                                    @elseif(Auth::check() && Auth::user()->role == 'vendor')
                                    <a class="menu-link {{ request()->routeIs('vendor.dashboard') ? 'active' : '' }}" href="{{route('vendor.dashboard')}}">
                                        @elseif(Auth::check() && Auth::user()->role == 'super_admin')
                                        <a class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                                            @else
                                            <a class="menu-link" href="/">
                                                @endif
                                                <span class="menu-icon"><i class="fa-solid fa-gauge-high fs-5 me-1"></i></span>
                                                <span class="menu-title fw-bold">الرئيسية والإحصائيات</span>
                                            </a>
                            </div>

                            <!-- VENDOR SECTION -->
                            @if(Auth::check() && Auth::user()->role == 'vendor')
                            <div class="menu-item">
                                <div class="menu-content pt-4 pb-2 px-4">
                                    <span class="menu-section text-gray-500 text-uppercase fs-8 ls-1 fw-bolder">إدارة متجري</span>
                                </div>
                            </div>

                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('vendor.products.*') ? 'hover show' : '' }}">
                                <span class="menu-link">
                                    <span class="menu-icon"><i class="fa-solid fa-boxes-stacked fs-5 me-1"></i></span>
                                    <span class="menu-title fw-bold">إدارة المنتجات</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->routeIs('vendor.products.index') ? 'active' : '' }}" href="{{route('vendor.products.index')}}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">جميع المنتجات</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->routeIs('vendor.products.create') ? 'active' : '' }}" href="{{route('vendor.products.create')}}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">إضافة منتج جديد</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->routeIs('vendor.products.trashed') ? 'active' : '' }}" href="{{route('vendor.products.trashed')}}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">أرشيف المنتجات (سلة المهملات)</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('vendor.categories.*') || request()->routeIs('vendor.subcategories.*') ? 'hover show' : '' }}">
                                <span class="menu-link">
                                    <span class="menu-icon"><i class="fa-solid fa-layer-group fs-5 me-1"></i></span>
                                    <span class="menu-title fw-bold">الأقسام والتصنيفات</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->routeIs('vendor.categories.index') ? 'active' : '' }}" href="{{route('vendor.categories.index')}}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">الأقسام الرئيسية</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->routeIs('vendor.subcategories.index') ? 'active' : '' }}" href="{{route('vendor.subcategories.index')}}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">الأقسام الفرعية</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="menu-item">
                                <a href="{{ route('vendor.orders') }}" class="menu-link {{ request()->routeIs('vendor.orders') ? 'active' : '' }}">
                                    <span class="menu-icon"><i class="fa-solid fa-cart-flatbed fs-5 me-1"></i></span>
                                    <span class="menu-title fw-bold">طلبات الزبائن</span>
                                </a>
                            </div>

                            @if(Auth::user()->store)
                            <div class="menu-item">
                                <a href="{{ route('customer.stores.show', Auth::user()->store->id) }}" target="_blank" class="menu-link text-primary fw-bolder">
                                    <span class="menu-icon"><i class="fa-solid fa-store fs-5 me-1 text-primary"></i></span>
                                    <span class="menu-title">معاينة متجري العام <i class="fa-solid fa-arrow-up-right-from-square fs-9 ms-1"></i></span>
                                </a>
                            </div>
                            @endif
                            @endif

                            <!-- MODERATOR & SUPER ADMIN SECTION -->
                            @if(Auth::check() && (Auth::user()->role == 'moderator' || Auth::user()->role == 'super_admin'))
                            <div class="menu-item">
                                <div class="menu-content pt-4 pb-2 px-4">
                                    <span class="menu-section text-gray-500 text-uppercase fs-8 ls-1 fw-bolder">إدارة المنصة والمستخدمين</span>
                                </div>
                            </div>

                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('*.users.*') || request()->routeIs('*.moderators.*') ? 'hover show' : '' }}">
                                <span class="menu-link">
                                    <span class="menu-icon"><i class="fa-solid fa-users-gear fs-5 me-1"></i></span>
                                    <span class="menu-title fw-bold">إدارة حسابات المنصة</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    @if(Auth::user()->role === 'super_admin')
                                    <div class="menu-item">
                                        <a class="menu-link {{ request()->routeIs('admin.moderators.*') ? 'active' : '' }}" href="{{ route('admin.moderators.show') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">مدراء المنصة (Moderators)</span>
                                        </a>
                                    </div>
                                    @endif
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ Auth::user()->role === 'moderator' ? route('moderator.users.byRole', 'vendor') : route('admin.users.byRole', 'vendor') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">قائمة التجار (Vendors)</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ Auth::user()->role === 'moderator' ? route('moderator.users.byRole', 'customer') : route('admin.users.byRole', 'customer') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">قائمة الزبائن (Customers)</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="menu-item">
                                <a href="{{ Auth::user()->role == 'super_admin' ? route('admin.orders') : route('moderator.orders') }}" class="menu-link">
                                    <span class="menu-icon"><i class="fa-solid fa-boxes-packing fs-5 me-1"></i></span>
                                    <span class="menu-title fw-bold">طلبات المبيعات الشاملة</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a href="{{ Auth::user()->role == 'super_admin' ? route('admin.orders.bankTransfers') : route('moderator.orders.bankTransfers') }}" class="menu-link">
                                    <span class="menu-icon"><i class="fa-solid fa-money-bill-transfer fs-5 me-1"></i></span>
                                    <span class="menu-title fw-bold">إدارة التحويلات البنكية</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a href="{{ Auth::user()->role == 'super_admin' ? route('admin.feedbacks') : route('moderator.feedbacks') }}" class="menu-link">
                                    <span class="menu-icon"><i class="fa-solid fa-comments fs-5 me-1"></i></span>
                                    <span class="menu-title fw-bold">رسائل وشكاوى الزبائن</span>
                                </a>
                            </div>
                            @endif

                            <!-- GLOBAL PUBLIC QUICK LINKS -->
                            <div class="menu-item">
                                <div class="menu-content pt-4 pb-2 px-4">
                                    <span class="menu-section text-gray-500 text-uppercase fs-8 ls-1 fw-bolder">اختصارات المنصة</span>
                                </div>
                            </div>

                            <div class="menu-item">
                                <a href="{{ route('guest.main-page') }}" target="_blank" class="menu-link text-info">
                                    <span class="menu-icon"><i class="fa-solid fa-globe fs-5 me-1 text-info"></i></span>
                                    <span class="menu-title fw-bold">الرئيسية العامة للموقع ↗</span>
                                </a>
                            </div>

                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Aside Menu-->
                </div>
                <!--end::Aside-->
            </div>
            <!--end::Aside Sidebar-->

            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <!--begin::Modern Top Header Bar-->
                <div id="kt_header" class="header align-items-stretch py-3 bg-white border-bottom border-gray-200">
                    <div class="container-fluid d-flex align-items-center justify-content-between">

                        <!-- Mobile Toggle & Brand Logo for Mobile -->
                        <div class="d-flex align-items-center d-lg-none ms-n2 me-2">
                            <div class="btn btn-icon btn-active-light-primary w-35px h-35px" id="kt_aside_mobile_toggle">
                                <i class="fa-solid fa-bars fs-3"></i>
                            </div>
                            <a href="{{ route('guest.main-page') }}" class="ms-2">
                                <img alt="Logo" src="{{ asset('assets2/images/logo/logo.svg') }}" class="h-30px" />
                            </a>
                        </div>

                        <!-- Global Search Bar Input Field -->
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-8 min-w-250px max-w-450px">
                            <div class="position-relative w-100">
                                <span class="position-absolute top-50 translate-middle-y ms-4 text-gray-500">
                                    <i class="fa-solid fa-magnifying-glass fs-6"></i>
                                </span>
                                <input type="text" class="form-control form-control-solid search-field-custom ps-12 pe-4 py-2 rounded-pill fs-7 bg-light border-0 transition-all focus-bg-white focus-border-primary" placeholder="ابحث عن منتج، طلب، قسم..." id="global_search_input" />
                            </div>
                        </div>

                        <!-- Header Action Controls & User Dropdown -->
                        <div class="d-flex align-items-center justify-content-end gap-3">

                            <!-- Public Store Shortcut Button -->
                            <a href="{{ route('guest.main-page') }}" target="_blank" class="btn btn-sm btn-light-primary fw-bolder px-4 rounded-pill d-none d-sm-inline-flex align-items-center fs-7 transition-all hover-scale" title="تصفح المتجر العام">
                                <i class="fa-solid fa-arrow-up-right-from-square me-2 fs-8"></i> الموقع العام
                            </a>

                            <!-- User Avatar & Compact Global Stores Dropdown Menu -->
                            @if(Auth::check())
                            <div class="d-flex align-items-center ms-2" id="kt_header_user_menu_toggle">
                                <!-- User Icon / Avatar Trigger (Compact 36px) -->
                                <div class="cursor-pointer position-relative d-inline-flex align-items-center" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <img src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : asset('img/default-avatar.png') }}" alt="{{ Auth::user()->name }}" class="rounded-circle object-fit-cover border border-2 border-primary shadow-sm" style="width: 36px; height: 36px;" />
                                    <span class="bullet bullet-dot bg-success position-absolute top-0 end-0 border border-2 border-white" style="width: 10px; height: 10px;"></span>
                                </div>

                                <!-- Dropdown Menu (Reduced Width to 225px) -->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-3 fs-7 dropdown-user-custom border-0 shadow-lg" data-kt-menu="true" style="width: 225px !important; min-width: 225px;">

                                    <!-- Compact User Profile Header Card -->
                                    <div class="menu-item px-3 mb-2">
                                        <div class="d-flex align-items-center bg-light rounded p-2">
                                            <div class="me-3 ms-1 flex-shrink-0">
                                                <img alt="{{ Auth::user()->name }}" src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : asset('img/default-avatar.png') }}" class="rounded-circle object-fit-cover border border-gray-300" style="width: 40px; height: 40px;" />
                                            </div>
                                            <div class="d-flex flex-column min-w-0">
                                                <div class="fw-bolder fs-7 text-dark text-truncate">
                                                    {{ Auth::user()->name }}
                                                </div>
                                                <span class="fw-semibold text-muted fs-8 text-truncate d-block" style="max-width: 110px;" title="{{ Auth::user()->email }}">
                                                    {{ Auth::user()->email }}
                                                </span>
                                                <span class="badge bg-primary text-white fw-bold fs-9 mt-1 align-self-start py-1 px-2 rounded-1">
                                                    @if(Auth::user()->role === 'vendor') تاجر معتمد
                                                    @elseif(Auth::user()->role === 'moderator') مشرف منصة
                                                    @elseif(Auth::user()->role === 'super_admin') مدير عام
                                                    @else مستخدم @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="separator my-2"></div>

                                    <!-- Store Shortcut Box (For Vendor Users) -->
                                    @if(Auth::user()->role === 'vendor' && Auth::user()->store)
                                    <div class="menu-item px-3 my-2">
                                        <div class="bg-light-primary rounded p-2 border border-primary border-dashed">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex flex-column min-w-0 me-2">
                                                    <span class="fw-bolder text-dark fs-8 text-truncate" title="{{ Auth::user()->store->name }}">
                                                        <i class="fa-solid fa-store me-1 text-primary"></i> {{ Auth::user()->store->name }}
                                                    </span>
                                                    <span class="text-gray-500 fs-9 mt-1">متجرك التجاري</span>
                                                </div>
                                                <a href="{{ route('customer.stores.show', Auth::user()->store->id) }}" target="_blank" class="btn btn-sm btn-icon btn-primary flex-shrink-0" style="width: 24px; height: 24px;" title="معاينة المتجر">
                                                    <i class="fa-solid fa-arrow-up-right-from-square fs-9"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator my-2"></div>
                                    @endif

                                    <!-- Control Panel / Marketplace Links -->
                                    <div class="menu-item px-3">
                                        @if(Auth::user()->role === 'vendor')
                                        <a href="{{ route('vendor.dashboard') }}" class="menu-link px-3 py-2 fs-7 rounded">
                                            <span class="menu-icon"><i class="fa-solid fa-gauge-high text-primary fs-6"></i></span>
                                            <span class="menu-title ms-2">لوحة التحكم</span>
                                        </a>
                                        @elseif(Auth::user()->role === 'moderator')
                                        <a href="{{ route('moderator.dashboard') }}" class="menu-link px-3 py-2 fs-7 rounded">
                                            <span class="menu-icon"><i class="fa-solid fa-shield-halved text-primary fs-6"></i></span>
                                            <span class="menu-title ms-2">لوحة المشرف</span>
                                        </a>
                                        @elseif(Auth::user()->role === 'super_admin')
                                        <a href="{{ route('admin.dashboard') }}" class="menu-link px-3 py-2 fs-7 rounded">
                                            <span class="menu-icon"><i class="fa-solid fa-crown text-warning fs-6"></i></span>
                                            <span class="menu-title ms-2">الإدارة العامة</span>
                                        </a>
                                        @endif
                                    </div>

                                    <div class="menu-item px-3">
                                        <a href="{{ route('profile.show') }}" class="menu-link px-3 py-2 fs-7 rounded">
                                            <span class="menu-icon"><i class="fa-solid fa-user-gear text-info fs-6"></i></span>
                                            <span class="menu-title ms-2">إعدادات الحساب</span>
                                        </a>
                                    </div>

                                    <div class="menu-item px-3">
                                        <a href="{{ route('guest.main-page') }}" target="_blank" class="menu-link px-3 py-2 fs-7 text-dark rounded">
                                            <span class="menu-icon"><i class="fa-solid fa-globe text-success fs-6"></i></span>
                                            <span class="menu-title ms-2">موقع المتجر</span>
                                        </a>
                                    </div>

                                    <div class="separator my-2"></div>

                                    <!-- Logout Action Form -->
                                    <div class="menu-item px-3">
                                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                            @csrf
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-link px-3 py-2 fs-7 text-danger rounded hover-bg-light-danger">
                                                <span class="menu-icon"><i class="fa-solid fa-right-from-bracket text-danger fs-6"></i></span>
                                                <span class="menu-title ms-2">تسجيل الخروج</span>
                                            </a>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            @endif
                            <!--end::User Dropdown-->

                        </div>
                    </div>
                </div>
                <!--end::Modern Top Header Bar-->

                <!--begin::Content Wrapper-->
                <div class="content d-flex flex-column flex-column-fluid p-0 bg-light" id="kt_content">

                    <!--begin::Toolbar & Page Location Breadcrumb Bar-->
                    <!-- Note: bg-transparent and pb-0 removes the bulky white box and prevents overlapping with inner dark banners -->
                    <div class="toolbar py-4 px-6 bg-transparent" id="kt_toolbar">
                        <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center justify-content-between p-0">
                            <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-3">

                                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">
                                    @yield('pageTitle', 'لوحة التحكم')
                                </h1>

                                <!-- Location Breadcrumbs (Modern Chevron Separators) -->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1 m-0">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="{{ route('guest.main-page') }}" class="text-muted text-hover-primary">
                                            <i class="fa-solid fa-house fs-8 me-1"></i> الرئيسية
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <i class="fa-solid fa-chevron-left text-gray-400 fs-9 mx-2"></i>
                                    </li>
                                    <li class="breadcrumb-item text-muted">
                                        @if(Auth::check() && Auth::user()->role === 'super_admin')
                                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">الإدارة العامة</a>
                                        @elseif(Auth::check() && Auth::user()->role === 'moderator')
                                        <a href="{{ route('moderator.dashboard') }}" class="text-muted text-hover-primary">لوحة المشرف</a>
                                        @elseif(Auth::check() && Auth::user()->role === 'vendor')
                                        <a href="{{ route('vendor.dashboard') }}" class="text-muted text-hover-primary">لوحة التاجر</a>
                                        @else
                                        <a href="/" class="text-muted text-hover-primary">لوحة التحكم</a>
                                        @endif
                                    </li>

                                    @hasSection('subTitle')
                                    <li class="breadcrumb-item">
                                        <i class="fa-solid fa-chevron-left text-gray-400 fs-9 mx-2"></i>
                                    </li>
                                    <li class="breadcrumb-item text-muted">
                                        @yield('subTitle')
                                    </li>
                                    @endif

                                    <li class="breadcrumb-item">
                                        <i class="fa-solid fa-chevron-left text-gray-400 fs-9 mx-2"></i>
                                    </li>
                                    <li class="breadcrumb-item text-dark fw-bolder">
                                        @hasSection('currentTitle')
                                        @yield('currentTitle')
                                        @else
                                        @yield('pageTitle', 'الرئيسية')
                                        @endif
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <!--end::Toolbar-->

                    <!--begin::Post Main Content-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container-fluid px-6 pb-8">
                            @yield('content')
                        </div>
                    </div>
                    <!--end::Post Main Content-->

                </div>
                <!--end::Content Wrapper-->

                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column bg-transparent" id="kt_footer">
                    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between px-6">
                        <div class="text-gray-600 order-2 order-md-1 fs-7">
                            <span class="fw-semibold me-1">جميع الحقوق محفوظة © {{ date('Y') }}</span>
                            <a href="{{ route('guest.main-page') }}" target="_blank" class="text-gray-800 text-hover-primary fw-bolder">مرساة ستور</a>
                        </div>
                        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1 fs-7 mb-3 mb-md-0">
                            <li class="menu-item"><a href="{{ route('guest.main-page') }}" target="_blank" class="menu-link px-2">الرئيسية العامة</a></li>
                            <li class="menu-item"><a href="#" class="menu-link px-2">الدعم الفني للشركاء</a></li>
                        </ul>
                    </div>
                </div>
                <!--end::Footer-->

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>

    <!-- Global Search Input Filter Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('global_search_input');
            if (searchInput) {
                searchInput.addEventListener('keyup', function(e) {
                    var query = e.target.value.toLowerCase().trim();
                    if (query.length > 1) {
                        // Quick filter tables or list items if present on the page
                        var tableRows = document.querySelectorAll('table tbody tr');
                        tableRows.forEach(function(row) {
                            var text = row.textContent.toLowerCase();
                            if (text.indexOf(query) !== -1) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                        });
                    } else {
                        var tableRows = document.querySelectorAll('table tbody tr');
                        tableRows.forEach(function(row) {
                            row.style.display = '';
                        });
                    }
                });
            }
        });
    </script>

    @yield('script')
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>