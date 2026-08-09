@extends('layout')
@php
    $store = $store ?? (Auth::check() ? Auth::user()->store : null);
@endphp
@section('pageTitle', 'لوحة تحكم التاجر')

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">

        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center p-5 mb-6 rounded-3 border-0 shadow-sm">
                <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                    <i class="fa-solid fa-circle-check fs-2 text-success"></i>
                </span>
                <div class="d-flex flex-column">
                    <h5 class="mb-1 text-success fw-bolder">تمت العملية بنجاح</h5>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!--begin::Vendor Hero Banner-->
        <div class="card mb-8 border-0 shadow-sm overflow-hidden" style="background: linear-gradient(135deg, #1e1e2d 0%, #2b2b40 50%, #151521 100%);">
            <div class="card-body p-6 p-lg-8 position-relative">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between position-relative" style="z-index: 2;">
                    
                    <!-- Store Info & Avatar -->
                    <div class="d-flex align-items-center mb-4 mb-md-0">
                        <div class="symbol symbol-70px symbol-circle me-5 border border-2 border-primary p-1 bg-white shadow-sm position-relative">
                            @if($store && $store->logo)
                                <img src="{{ asset('storage/' . $store->logo) }}" alt="{{ $store?->name }}" class="rounded-circle object-fit-cover" />
                            @else
                                <div class="symbol-label fs-2 fw-bolder bg-light-primary text-primary rounded-circle">
                                    {{ mb_substr($store?->name ?? 'M', 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <div class="d-flex align-items-center mb-1 flex-wrap gap-2">
                                <h1 class="text-white fw-bolder mb-0 fs-2 me-2">{{ $store?->name ?? 'متجري' }}</h1>
                                <!-- Pulsing Green Dot Badge for Active Store Status -->
                                <span class="badge bg-light-success text-success fs-8 px-3 py-1 rounded-pill d-inline-flex align-items-center gap-2">
                                    <span class="bullet bullet-dot bg-success h-8px w-8px animation-blink"></span>
                                    متصل الآن
                                </span>
                            </div>
                            <p class="text-gray-400 mb-2 fs-6">
                                <i class="fa-solid fa-quote-left me-1 text-primary fs-8"></i>
                                {{ $store?->slogan ?? 'لم يتم إضافة عبارتك الدعائية بعد.' }}
                                <a href="#updateSloganModal" data-bs-toggle="modal" class="text-primary text-hover-underline ms-2 fs-7">
                                    <i class="fa-solid fa-pen-to-square fs-8"></i> تعديل
                                </a>
                            </p>
                            <div class="d-flex align-items-center text-gray-300 fs-7 gap-4">
                                <span><i class="fa-solid fa-star text-warning me-1"></i> {{ $averageRating }} / 5.0</span>
                                <span><i class="fa-solid fa-box me-1 text-info"></i> {{ $totalProducts }} منتج</span>
                                <span><i class="fa-solid fa-bag-shopping me-1 text-success"></i> {{ $totalOrders }} طلب</span>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Quick Actions -->
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <!-- Primary CTA: Dominant Solid Blue -->
                        <a href="{{ route('vendor.products.create') }}" class="btn btn-primary fw-bolder shadow-sm px-5 py-3">
                            <i class="fa-solid fa-plus me-1 fs-6"></i> إضافة منتج جديد
                        </a>
                        <!-- Secondary Action: Manage Orders -->
                        <a href="{{ route('vendor.orders') }}" class="btn btn-outline btn-outline-dashed btn-outline-secondary text-white btn-active-light-primary fw-bolder px-4 py-3">
                            <i class="fa-solid fa-list-check me-1 fs-7"></i> إدارة الطلبات
                        </a>
                        <!-- Secondary Action: View Public Store -->
                        @if($store)
                            <a href="{{ route('customer.stores.show', $store->id) }}" target="_blank" class="btn btn-outline btn-outline-dashed btn-outline-secondary text-white btn-active-light-success fw-bolder px-4 py-3" title="معاينة المتجر العام">
                                <i class="fa-solid fa-store me-1 fs-7"></i> معاينة المتجر ↗
                            </a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <!--end::Vendor Hero Banner-->

        <!--begin::Key Metric Cards (Unified Brand Accent Colors)-->
        <div class="row g-5 g-xl-8 mb-8">

            <!-- Revenue Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-md-100 border-0 shadow-sm hover-elevate-up bg-white">
                    <div class="card-header pt-5 border-0">
                        <div class="card-title d-flex flex-column">
                            <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">₪{{ number_format($totalRevenue, 2) }}</span>
                            <span class="text-gray-500 pt-1 fw-semibold fs-6">إجمالي الأرباح والمبيعات</span>
                        </div>
                        <div class="card-toolbar">
                            <span class="symbol symbol-45px symbol-circle bg-light-primary p-2">
                                <i class="fa-solid fa-sack-dollar fs-2 text-primary"></i>
                            </span>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-end pt-0 fs-7 text-muted">
                        <span class="text-primary fw-bold me-1"><i class="fa-solid fa-arrow-trend-up"></i> إيرادات مكتملة</span>
                    </div>
                </div>
            </div>

            <!-- Orders Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-md-100 border-0 shadow-sm hover-elevate-up bg-white">
                    <div class="card-header pt-5 border-0">
                        <div class="card-title d-flex flex-column">
                            <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $totalOrders }}</span>
                            <span class="text-gray-500 pt-1 fw-semibold fs-6">إجمالي طلبات الزبائن</span>
                        </div>
                        <div class="card-toolbar">
                            <span class="symbol symbol-45px symbol-circle bg-light-primary p-2">
                                <i class="fa-solid fa-cart-shopping fs-2 text-primary"></i>
                            </span>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between pt-0 fs-7">
                        <span class="badge bg-light-warning text-warning fw-bold px-3 py-1">قيد الانتظار: {{ $pendingOrders }}</span>
                        <span class="badge bg-light-success text-success fw-bold px-3 py-1">مكتمل: {{ $completedOrders }}</span>
                    </div>
                </div>
            </div>

            <!-- Catalog Products Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-md-100 border-0 shadow-sm hover-elevate-up bg-white">
                    <div class="card-header pt-5 border-0">
                        <div class="card-title d-flex flex-column">
                            <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $totalProducts }}</span>
                            <span class="text-gray-500 pt-1 fw-semibold fs-6">منتجات الكتالوج المفعلة</span>
                        </div>
                        <div class="card-toolbar">
                            <span class="symbol symbol-45px symbol-circle bg-light-primary p-2">
                                <i class="fa-solid fa-boxes-stacked fs-2 text-primary"></i>
                            </span>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between pt-0 fs-7">
                        <span class="text-success fw-bold"><i class="fa-solid fa-circle-check"></i> {{ $activeProducts }} منتج نشط</span>
                        <a href="{{ route('vendor.products.index') }}" class="text-primary text-hover-underline fw-bold">المنتجات ↗</a>
                    </div>
                </div>
            </div>

            <!-- Store Rating Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-flush h-md-100 border-0 shadow-sm hover-elevate-up bg-white">
                    <div class="card-header pt-5 border-0">
                        <div class="card-title d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $averageRating }}</span>
                                <span class="fs-4 text-warning">★</span>
                            </div>
                            <span class="text-gray-500 pt-1 fw-semibold fs-6">متوسط تقييم المتجر</span>
                        </div>
                        <div class="card-toolbar">
                            <span class="symbol symbol-45px symbol-circle bg-light-primary p-2">
                                <i class="fa-solid fa-star fs-2 text-primary"></i>
                            </span>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between pt-0 fs-7 text-muted">
                        <span class="text-gray-600 fw-semibold">تقييم الزبائن</span>
                        <span class="badge bg-light-primary text-primary fw-bold">{{ $categoriesCount }} أقسام متاحة</span>
                    </div>
                </div>
            </div>

        </div>
        <!--end::Key Metric Cards-->

        <!--begin::Main Grid Layout-->
        <div class="row g-5 g-xl-8">

            <!-- Right Main Column (Chart + Recent Orders Table) -->
            <div class="col-xl-8">
                
                <!--begin::Sales Overview ApexChart Card-->
                <div class="card card-flush border-0 shadow-sm mb-8 bg-white">
                    <div class="card-header pt-7 border-0">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-dark fs-3">ملخص المبيعات</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-7">حجم مبيعات متجرك خلال آخر 7 أيام</span>
                        </h3>
                        <div class="card-toolbar">
                            <span class="badge bg-light-primary text-primary fw-bold fs-7 px-3 py-2">
                                <i class="fa-solid fa-chart-line me-1"></i> آخر 7 أيام
                            </span>
                        </div>
                    </div>
                    <div class="card-body pt-2 pe-4 pb-4">
                        <div id="vendor_sales_apex_chart" style="height: 240px;"></div>
                    </div>
                </div>
                <!--end::Sales Overview ApexChart Card-->

                <!--begin::Recent Orders Table Panel-->
                <div class="card card-flush border-0 shadow-sm bg-white">
                    <div class="card-header pt-7 align-items-center border-0">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-dark fs-3">أحدث طلبات الزبائن</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-7">آخر الطلبات المقدمة لمنتجات متجرك</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="{{ route('vendor.orders') }}" class="btn btn-sm btn-light-primary fw-bolder">
                                جميع الطلبات ({{ $totalOrders }})
                            </a>
                        </div>
                    </div>
                    <div class="card-body pt-4">
                        @if($recentOrders->count() > 0)
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-4">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="min-w-80px">رقم الطلب</th>
                                            <th class="min-w-150px">العميل / المنتجات</th>
                                            <th class="text-end min-w-90px">الإجمالي</th>
                                            <th class="text-end min-w-100px">طريقة الدفع</th>
                                            <th class="text-end min-w-100px">حالة الطلب</th>
                                            <th class="text-end min-w-90px">التاريخ</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-bold text-gray-600">
                                        @foreach($recentOrders as $order)
                                            <tr>
                                                <td>
                                                    <span class="badge bg-light text-dark fw-bolder fs-7">#{{ $order->order_number ?? $order->id }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span class="text-dark fw-bolder text-hover-primary fs-6">
                                                            {{ $order->user->name ?? 'عميل مجهول' }}
                                                        </span>
                                                        <span class="text-gray-400 fs-7">
                                                            {{ $order->items->count() }} عنصر بالطلب
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-end fw-bolder text-dark">
                                                    ₪{{ number_format($order->total_amount, 2) }}
                                                </td>
                                                <td class="text-end">
                                                    @if($order->payment && $order->payment->payment_method === 'bank_transfer')
                                                        <span class="badge bg-light-info text-info fs-8">تحويل بنكي</span>
                                                    @elseif($order->payment && $order->payment->payment_method === 'credit_card')
                                                        <span class="badge bg-light-primary text-primary fs-8">بطاقة ائتمان</span>
                                                    @elseif($order->payment && $order->payment->payment_method === 'pay_on_delivery')
                                                        <span class="badge bg-light-warning text-warning fs-8">عند التسليم</span>
                                                    @else
                                                        <span class="badge bg-light text-muted fs-8">غير محدد</span>
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    @if(in_array($order->status, ['pending', 'قيد الانتظار']))
                                                        <span class="badge bg-warning text-white fs-8">قيد الانتظار</span>
                                                    @elseif(in_array($order->status, ['processing', 'قيد التجهيز']))
                                                        <span class="badge bg-info text-white fs-8">قيد التجهيز</span>
                                                    @elseif(in_array($order->status, ['delivered', 'completed', 'مكتمل']))
                                                        <span class="badge bg-success text-white fs-8">تم التسليم</span>
                                                    @elseif(in_array($order->status, ['cancelled', 'ملغى']))
                                                        <span class="badge bg-danger text-white fs-8">ملغى</span>
                                                    @else
                                                        <span class="badge bg-secondary text-dark fs-8">{{ $order->status }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-end text-gray-500 fs-7">
                                                    {{ $order->created_at ? $order->created_at->diffForHumans() : '-' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-10">
                                <i class="fa-solid fa-receipt fs-2x text-gray-300 mb-3"></i>
                                <p class="text-gray-500 fw-bold fs-6">لا توجد طلبات شراء مسجلة لمتجرك حتى الآن.</p>
                            </div>
                        @endif
                    </div>
                </div>
                <!--end::Recent Orders Table Panel-->

            </div>

            <!-- Left Column (Top Selling Products Panel) -->
            <div class="col-xl-4">
                <div class="card card-flush border-0 shadow-sm bg-white h-100">
                    <div class="card-header pt-7 align-items-center border-0">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-dark fs-3">الأكثر مبيعاً بالمحل</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-7">أعلى المنتجات طلباً</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="{{ route('vendor.products.index') }}" class="btn btn-sm btn-light-primary fw-bolder">الكل</a>
                        </div>
                    </div>
                    <div class="card-body pt-4">
                        @if($topProducts->count() > 0)
                            <div class="d-flex flex-column gap-4">
                                @foreach($topProducts->take(5) as $product)
                                    <div class="d-flex align-items-center p-3 rounded bg-light-subtle hover-elevate-up transition-all border border-dashed border-gray-200">
                                        <div class="symbol symbol-45px me-3 border rounded overflow-hidden">
                                            @if($product->mainImage)
                                                <img src="{{ asset('storage/' . $product->mainImage->image_path) }}" alt="{{ $product->name }}" class="object-fit-cover" />
                                            @else
                                                <div class="symbol-label bg-light-primary text-primary fw-bolder">
                                                    <i class="fa-solid fa-box-open fs-4"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="{{ route('vendor.products.show', $product->slug ?? $product->id) }}" class="text-dark fw-bolder text-hover-primary fs-6 text-truncate" style="max-width: 150px;">
                                                {{ $product->name }}
                                            </a>
                                            <span class="text-muted fs-7">
                                                {{ $product->subcategory->name ?? 'قسم عام' }}
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column align-items-end ms-2">
                                            <span class="text-dark fw-bolder fs-6">₪{{ number_format($product->price, 2) }}</span>
                                            <span class="badge bg-light-success text-success fs-8 fw-bold mt-1">
                                                {{ $product->order_items_count ?? 0 }} مبيعات
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-10">
                                <i class="fa-solid fa-boxes-stacked fs-2x text-gray-300 mb-3"></i>
                                <p class="text-gray-500 fs-7 mb-4">لم يتم إضافة منتجات كافية بعد.</p>
                                <a href="{{ route('vendor.products.create') }}" class="btn btn-sm btn-primary fw-bolder">إضافة أول منتج</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <!--end::Main Grid Layout-->

    </div>
</div>

<!-- Modal Update Slogan -->
@if($store)
<div class="modal fade" id="updateSloganModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-500px">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <form action="{{ route('vendor.store.updateSlogan', $store->id) }}" method="POST">
                @csrf
                <div class="modal-header border-0 pb-0">
                    <h3 class="modal-title fw-bolder text-dark">تحديث العبارة الدعائية للمتجر</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-6">
                    <label class="form-label fw-bold text-gray-700">العبارة الدعائية (Slogan)</label>
                    <input type="text" name="slogan" class="form-control form-control-solid rounded-3" placeholder="أدخل عبارتك التسويقية..." value="{{ old('slogan', $store->slogan) }}" required />
                    <span class="form-text text-muted mt-2">تظهر هذه العبارة للزبائن على واجهة متجرك العامة وفي أعلى لوحة التحكم.</span>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary fw-bolder px-6">حفظ التغييرات</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var element = document.getElementById('vendor_sales_apex_chart');
    if (!element) return;

    var options = {
        series: [{
            name: 'المبيعات (₪)',
            data: {!! json_encode($salesData ?? [0, 0, 0, 0, 0, 0, 0]) !!}
        }],
        chart: {
            type: 'area',
            height: 240,
            toolbar: { show: false },
            fontFamily: 'Cairo, sans-serif'
        },
        stroke: {
            curve: 'smooth',
            width: 3
        },
        colors: ['#009ef7'],
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.4,
                opacityTo: 0.05,
                stops: [0, 95, 100]
            }
        },
        dataLabels: { enabled: false },
        xaxis: {
            categories: {!! json_encode($salesLabels ?? ['1', '2', '3', '4', '5', '6', '7']) !!},
            axisBorder: { show: false },
            axisTicks: { show: false },
            labels: {
                style: { colors: '#a1a5b7', fontSize: '12px' }
            }
        },
        yaxis: {
            labels: {
                style: { colors: '#a1a5b7', fontSize: '12px' },
                formatter: function (val) {
                    return '₪' + val;
                }
            }
        },
        grid: {
            borderColor: '#f1f1f4',
            strokeDashArray: 4
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return '₪' + val.toFixed(2);
                }
            }
        }
    };

    var chart = new ApexCharts(element, options);
    chart.render();
});
</script>
@endsection