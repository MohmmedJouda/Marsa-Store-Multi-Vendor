@extends('layout')

@section('pageTitle', 'الإدارة العامة للمنصة')
@section('currentTitle', 'الرئيسية والإحصائيات')

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">

        <!--begin::Hero Welcome Banner-->
        <div class="card mb-8 border-0 shadow-sm overflow-hidden" style="background: linear-gradient(135deg, #1e1e2d 0%, #151521 100%);">
            <div class="card-body p-6 p-lg-8 position-relative">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between position-relative" style="z-index: 2;">
                    
                    <div class="d-flex align-items-center mb-4 mb-md-0">
                        <div class="symbol symbol-65px symbol-circle me-5 border border-2 border-primary p-1 bg-white shadow-sm">
                            <div class="symbol-label fs-1 fw-bolder bg-light-primary text-primary rounded-circle">
                                <i class="fa-solid fa-user-shield fs-2 text-primary"></i>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center mb-1 flex-wrap gap-2">
                                <h1 class="text-white fw-bolder mb-0 fs-2 me-2">مرحباً بك، {{ Auth::user()->name }}</h1>
                                <span class="badge bg-light-primary text-primary fs-8 px-3 py-1 rounded-pill d-inline-flex align-items-center gap-2">
                                    <span class="bullet bullet-dot bg-primary h-8px w-8px animation-blink"></span>
                                    مدير النظام العام
                                </span>
                            </div>
                            <p class="text-gray-400 mb-0 fs-6">
                                لوحة التحكّم الرئيسية لإدارة كافة مبيعات المنصة، التجار، المشرفين، والتحويلات البنكية.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <a href="{{ route('admin.moderators.show') }}" class="btn btn-primary fw-bolder px-5 py-3 shadow-sm">
                            <i class="fa-solid fa-user-plus me-1"></i> إدارة المدراء
                        </a>
                        <a href="{{ route('guest.main-page') }}" target="_blank" class="btn btn-outline btn-outline-dashed btn-outline-secondary text-white btn-active-light-primary fw-bolder px-4 py-3">
                            <i class="fa-solid fa-globe me-1"></i> المعاينة العامة ↗
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!--end::Hero Welcome Banner-->

        <!--begin::Statistics Cards-->
        <div class="row g-5 g-xl-8 mb-8">

            <!-- Vendors Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-md-100 border-0 shadow-sm hover-elevate-up bg-white">
                    <div class="card-header pt-5 border-0">
                        <div class="card-title d-flex flex-column">
                            <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">التجار والمعارض</span>
                            <span class="text-gray-500 pt-2 fw-semibold fs-6">إدارة حسابات ومتاجر التجار</span>
                        </div>
                        <div class="card-toolbar">
                            <span class="symbol symbol-45px symbol-circle bg-light-primary p-2">
                                <i class="fa-solid fa-users-gear fs-2 text-primary"></i>
                            </span>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-end justify-content-between pt-0 fs-7">
                        <span class="text-muted fw-bold">المنصة الشاملة</span>
                        <a href="{{ route('admin.users.byRole', 'vendor') }}" class="btn btn-sm btn-light-primary fw-bolder">
                            استعراض التجار ↗
                        </a>
                    </div>
                </div>
            </div>

            <!-- Orders Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-md-100 border-0 shadow-sm hover-elevate-up bg-white">
                    <div class="card-header pt-5 border-0">
                        <div class="card-title d-flex flex-column">
                            <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">طلبات الزبائن</span>
                            <span class="text-gray-500 pt-2 fw-semibold fs-6">متابعة كافة طلبات المنصة</span>
                        </div>
                        <div class="card-toolbar">
                            <span class="symbol symbol-45px symbol-circle bg-light-info p-2">
                                <i class="fa-solid fa-file-invoice-dollar fs-2 text-info"></i>
                            </span>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-end justify-content-between pt-0 fs-7">
                        <span class="text-muted fw-bold">سجلات الشراء</span>
                        <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-light-info fw-bolder">
                            عرض الطلبات ↗
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bank Transfers Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-md-100 border-0 shadow-sm hover-elevate-up bg-white">
                    <div class="card-header pt-5 border-0">
                        <div class="card-title d-flex flex-column">
                            <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">التحويلات البنكية</span>
                            <span class="text-gray-500 pt-2 fw-semibold fs-6">مراجعة وثائق الدفع والتحويل</span>
                        </div>
                        <div class="card-toolbar">
                            <span class="symbol symbol-45px symbol-circle bg-light-success p-2">
                                <i class="fa-solid fa-building-columns fs-2 text-success"></i>
                            </span>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-end justify-content-between pt-0 fs-7">
                        <span class="text-muted fw-bold">إثباتات الدفع</span>
                        <a href="{{ route('admin.orders.bankTransfers') }}" class="btn btn-sm btn-light-success fw-bolder">
                            مراجعة التحويلات ↗
                        </a>
                    </div>
                </div>
            </div>

            <!-- Feedbacks Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-md-100 border-0 shadow-sm hover-elevate-up bg-white">
                    <div class="card-header pt-5 border-0">
                        <div class="card-title d-flex flex-column">
                            <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">رسائل الزبائن</span>
                            <span class="text-gray-500 pt-2 fw-semibold fs-6">شكاوى واستفسارات العملاء</span>
                        </div>
                        <div class="card-toolbar">
                            <span class="symbol symbol-45px symbol-circle bg-light-warning p-2">
                                <i class="fa-solid fa-comments fs-2 text-warning"></i>
                            </span>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-end justify-content-between pt-0 fs-7">
                        <span class="text-muted fw-bold">خدمة العملاء</span>
                        <a href="{{ route('admin.feedbacks') }}" class="btn btn-sm btn-light-warning fw-bolder">
                            قراءة الرسائل ↗
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <!--end::Statistics Cards-->

        <!--begin::Quick Actions Procedure Shortcuts Grid-->
        <div class="card border-0 shadow-sm bg-white mb-8">
            <div class="card-header pt-7 border-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark fs-3">إجراءات وإختصارات الإدارة</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-7">الوصول السريع إلى أقسام التحكم بالمنصة</span>
                </h3>
            </div>
            <div class="card-body pt-4">
                <div class="row g-4">

                    <div class="col-md-3 col-sm-6">
                        <a href="{{ route('admin.users.byRole', 'vendor') }}" class="d-flex flex-column align-items-center p-5 rounded-4 bg-light-primary text-decoration-none hover-scale transition">
                            <div class="symbol symbol-50px symbol-circle bg-white p-3 mb-3 shadow-xs text-center">
                                <i class="fa-solid fa-store fs-2 text-primary"></i>
                            </div>
                            <span class="fw-bolder fs-6 text-dark mb-1">إدارة حسابات التجار</span>
                            <span class="fs-8 text-gray-500 text-center">تفعيل الحسابات وتحديث البيانات</span>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <a href="{{ route('admin.users.byRole', 'customer') }}" class="d-flex flex-column align-items-center p-5 rounded-4 bg-light-info text-decoration-none hover-scale transition">
                            <div class="symbol symbol-50px symbol-circle bg-white p-3 mb-3 shadow-xs text-center">
                                <i class="fa-solid fa-users fs-2 text-info"></i>
                            </div>
                            <span class="fw-bolder fs-6 text-dark mb-1">إدارة الزبائن</span>
                            <span class="fs-8 text-gray-500 text-center">متابعة سجلات الزبائن المسجلين</span>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <a href="{{ route('admin.moderators.show') }}" class="d-flex flex-column align-items-center p-5 rounded-4 bg-light-success text-decoration-none hover-scale transition">
                            <div class="symbol symbol-50px symbol-circle bg-white p-3 mb-3 shadow-xs text-center">
                                <i class="fa-solid fa-user-shield fs-2 text-success"></i>
                            </div>
                            <span class="fw-bolder fs-6 text-dark mb-1">مدراء المنصة</span>
                            <span class="fs-8 text-gray-500 text-center">إضافة وتعديل صلاحيات المشرفين</span>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <a href="{{ route('guest.main-page') }}" target="_blank" class="d-flex flex-column align-items-center p-5 rounded-4 bg-light-warning text-decoration-none hover-scale transition">
                            <div class="symbol symbol-50px symbol-circle bg-white p-3 mb-3 shadow-xs text-center">
                                <i class="fa-solid fa-globe fs-2 text-warning"></i>
                            </div>
                            <span class="fw-bolder fs-6 text-dark mb-1">الموقع العام</span>
                            <span class="fs-8 text-gray-500 text-center">معاينة واجهة الزبائن والمتجر الشامل</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!--end::Quick Actions Procedure Shortcuts Grid-->

    </div>
</div>
@endsection