@extends('layout')
@section('pageTitle', 'الطلبات')
@section('subTitle', 'الصفحة الرئيسية')
@section('currentTitle', 'الطلبات')
@section('routeButton', route('vendor.dashboard'))
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl ">

            <div class="card card-flush">
                <!--begin::Card header-->

                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table"
                        style="text-align: right">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                                <th class="min-w-50px">رقم الطلب</th>
                                <th class="min-w-20px">الطلب</th>
                                <th class="text-end min-w-100px">طريقة الدقع</th>
                                <th class="text-end min-w-40px">الكمية</th>
                                <th class="text-end min-w-100px">السعر الاجمالي</th>
                                <th class="text-end min-w-100px">وقت تنفيذ الطلب</th>
                                <th class="text-end min-w-100px">حالة الطلب</th>
                                <th class="text-end min-w-70px">حذف الطلب</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            <!--begin::Table row-->

                            <tr>

                                @foreach ($orders as $order)
                                    <td>
                                        <p>{{ $loop->iteration }}</p>
                                    </td>

                                    @foreach ($order->items as $item)
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!--begin::Thumbnail-->
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                    class="symbol symbol-50px">
                                                    <span class="symbol-label"
                                                        style="background-image:url({{ asset('storage/' . $item->product->images()->where('is_main', true)->first()->image_path) }});">
                                                    </span>
                                                </a>
                                                <div class="ms-5">
                                                    {{ $item->product->name }}
                                                </div>
                                            </div>
                                        </td>
                                        <!--end::Category=-->
                                        <!--begin::SKU=-->
                                        <td class="text-end pe-0">
                                            {{-- {{ $order->payment->payment_method ?? 'غير محدد' }} --}}
                                            @if ($order->payment && $order->payment->payment_method === 'bank_transfer')
                                                التحويل البنكي
                                            @elseif ($order->payment && $order->payment->payment_method === 'credit_card')
                                                بطاقة الائتمان
                                            @elseif ($order->payment && $order->payment->payment_method === 'pay_on_delivery')
                                                الدفع عند التسليم
                                            @else
                                                غير محدد
                                            @endif

                                        </td>

                                        <td class="text-end pe-0" data-order="25">
                                            {{ $item->quantity }}
                                        </td>
                                        <!--end::Qty=-->
                                        <!--begin::Price=-->
                                        <td class="text-end pe-0">
                                            ₪{{ $order->total_amount }}
                                        </td>
                                        <!--end::Price=-->
                                        <!--begin::Rating-->
                                        <td class="text-end pe-0" data-order="rating-5">
                                            <p class="text-muted mb-0">
                                                {{ $order->created_at->locale('ar')->diffForHumans() }}
                                            </p>
                                        </td>
                                        <!--end::Rating-->
                                        <!--begin::Status=-->
                                        <td class="text-end " data-order="Published">
                                            <span
                                                class="badge
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        @if ($order->status == 'pending') bg-warning
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        @elseif($order->status == 'shipping') bg-info
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        @elseif($order->status == 'shipped') bg-primary
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        @elseif($order->status == 'delivered') bg-success
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        @elseif($order->status == 'cancelled') bg-danger
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        @elseif($order->status == 'refunded') bg-secondary @endif">

                                                @if ($order->status == 'pending')
                                                    قيد العمل
                                                @elseif($order->status == 'shipping')
                                                    جاري الشحن
                                                @elseif($order->status == 'shipped')
                                                    تم الشحن
                                                @elseif($order->status == 'delivered')
                                                    تم التوصيل
                                                @elseif($order->status == 'cancelled')
                                                    ملغي
                                                @elseif($order->status == 'refunded')
                                                    مسترد
                                                @endif
                                                {{-- {{ ucfirst($order->status) }} --}}
                                            </span>
                                        </td>
                                        <!--end::Status=-->
                                        <!--begin::Action=-->
                                        <td class="text-end">

                                            <div class="menu-item px-3">
                                                <form action="{{ route('vendor.orders.destroy', $order->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        حذف
                                                    </button>

                                                </form>
                                            </div>

                                            <!--end::Menu-->
                                        </td>
                                        <!--end::Action=-->
                            </tr>
                            @endforeach
                            @endforeach
                            <!--end::Table row-->
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Products-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('assets/js/axios.min.js') }}"></script>
<script src="{{ asset('js/crud.js') }}"></script>

@section('script')
    <script>
        function confirmDestroy(id, reference) {
            const result = Swal.fire({
                title: 'Are you sure?',
                text: "You will not be able to recover this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete!',
                cancelButtonText: 'Close',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    destroy('/vendor/products/' + id, reference);
                }
            });
        }
    </script>
@endsection
