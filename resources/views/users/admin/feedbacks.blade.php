@extends('layout')
@section('pageTitle', 'الرسائل')
@section('subTitle', 'الصفحة الرئيسية')
@section('currentTitle', 'الرسائل')
@if (Auth::user()->role === 'moderator')
@section('routeButton', route('moderator.dashboard'))
@elseif (Auth::user()->role === 'super_admin')
@section('routeButton', route('admin.dashboard'))
@endif
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
                    @if($feedbacks->isEmpty())
                        <div class="alert alert-info">لا توجد رسائل من الزبائن حالياً.</div>
                    @else
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table"
                        style="text-align: right">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                                <th class="min-w-50px">رقم الطلب</th>
                                <th class="min-w-20px">اسم المستخدم</th>
                                <th class=" min-w-100px">وقت تنفيذ الطلب</th>
                                <th class=" min-w-100px">حالة الطلب</th>
                                <th class=" min-w-70px">حذف الرسالة</th>
                                <th class=" min-w-70px"> معاينة الرسالة</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            <!--begin::Table row-->

                            <tr>

                                @foreach ($feedbacks as $feedback)
                                        <td>
                                            <p>{{ $feedback->order_id }}</p>
                                        </td>

                                        <td>
                                            <div>
                                                {{ $feedback->order->user->name }}
                                            </div>
                                        </td>

                                        <td class=" pe-0" data-order="rating-5">
                                            <p class="text-muted mb-0">
                                                {{ $feedback->created_at->locale('ar')->diffForHumans() }}
                                            </p>
                                        </td>
                                        <!--end::Rating-->
                                        <!--begin::Status=-->
                                        <td class=" " data-order="Published">
                                            <span
                                                class="badge
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @if ($feedback->order->status == 'pending') bg-warning
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @elseif($feedback->order->status == 'shipping') bg-info
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @elseif($feedback->order->status == 'shipped') bg-primary
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @elseif($feedback->order->status == 'delivered') bg-success
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @elseif($feedback->order->status == 'cancelled') bg-danger
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @elseif($feedback->order->status == 'refunded') bg-secondary @endif">

                                                @if ($feedback->order->status == 'pending' && (!$feedback->order->payment || is_null($feedback->orderd->payment->payment_method)))
                                                    معلق
                                                @elseif($feedback->order->status == 'pending')
                                                    قيد العمل
                                                @elseif($feedback->order->status == 'shipping')
                                                    جاري الشحن
                                                @elseif($feedback->order->status == 'shipped')
                                                    تم الشحن
                                                @elseif($feedback->order->status == 'delivered')
                                                    تم التوصيل
                                                @elseif($feedback->order->status == 'cancelled')
                                                    ملغي
                                                @elseif($feedback->order->status == 'refunded')
                                                    مسترد
                                                @endif
                                                {{-- {{ ucfirst($order->status) }} --}}
                                            </span>
                                        </td>
                                        <!--end::Status=-->
                                        <!--begin::Action=-->
                                        <td class="">

                                            <div class="menu-item px-3">
                                                @if (Auth::user()->role === 'super_admin')
                                                    <form action="{{ route('admin.feedbacks.destroy', $feedback->id) }}" method="POST"
                                                        onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')">
                                                @elseif(Auth::user()->role === 'moderator')
                                                        <form action="{{ route('moderator.feedbacks.destroy', $feedback->id) }}"
                                                            method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')">
                                                    @endif
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            حذف
                                                        </button>

                                                    </form>
                                            </div>

                                            <!--end::Menu-->
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-prime btn-sm">
                                                @if (Auth::user()->role === 'super_admin')
                                                    <a href="{{ route('admin.feedback.show', $feedback->id) }}">
                                                @elseif (Auth::user()->role === 'moderator')
                                                        <a href="{{ route('moderator.feedback.show', $feedback->id) }}">
                                                    @endif
                                                        معاينة</a>
                                            </button>
                                        </td>
                                        <!--end::Action=-->
                                    </tr>
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