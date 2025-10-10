@extends('layout')
@section('pageTitle', 'التحويلات البنكية')
@section('subTitle', 'الصفحة الرئيسية')
@section('currentTitle', 'التحويلات البنكية')
@if (Auth::user()->role === 'moderator')
@section('routeButton', route('moderator.dashboard'))
@elseif (Auth::user()->role === 'super_admin')
@section('routeButton', route('admin.dashboard'))
@endif
@section('content')

    <div class="container mt-4">
        <h2 class="mb-4">طلبات التحويل البنكي</h2>

        @if($orders->isEmpty())
            <div class="alert alert-info">لا توجد طلبات تحويل بنكي حالياً.</div>
        @else
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>رقم الطلب</th>
                        <th>اسم العميل</th>
                        <th>إجمالي الطلب</th>
                        <th>مرجع البنك</th>
                        <th>الإيصال</th>
                        <th>تاريخ الطلب</th>
                        <th>حالة الدفع</th>
                        <th>إجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        @php
                            $payment = optional($order->payment);
                        @endphp
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name ?? '---' }}</td>
                            <td>{{ number_format($order->total_amount, 2) }} ₪</td>
                            <td>{{ $payment->bank_reference ?? '---' }}</td>
                            <td>
                                @if($payment->receipt_path)
                                    <a href="{{ asset('storage/' . $payment->receipt_path) }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        عرض الإيصال
                                    </a>
                                @else
                                    <span class="text-muted">لا يوجد</span>
                                @endif
                            </td>
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                @if($payment->payment_confirmed_at)
                                    <span class="badge bg-success">تم التأكيد</span><br>
                                    <small>{{ $payment->payment_confirmed_at->format('Y-m-d H:i') }}</small>
                                @elseif($order->status === 'payment_rejected')
                                    <span class="badge bg-danger">مرفوض </span><br>
                                @else
                                    <span class="badge bg-warning text-dark">بانتظار التأكيد</span>
                                @endif
                            </td>
                            <td>
                                @if(!$payment->payment_confirmed_at && $order->status != 'payment_rejected')

                                    @if (Auth::user()->role === 'super_admin')
                                        <form action="{{ route('admin.bankTransfer.decision', $order->id) }}" method="POST"
                                            style=" display:inline-block;">
                                    @elseif (Auth::user()->role === 'moderator')
                                            <form action=" {{ route('moderator.bankTransfer.decision', $order->id) }}" method="POST"
                                                style=" display:inline-block;">
                                        @endif

                                            @csrf
                                            <input type="hidden" name="decision" value="approved">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                ✅ تأكيد الدفع
                                            </button>
                                        </form>
                                        @if (Auth::user()->role === 'super_admin')
                                            <form action="{{ route('admin.bankTransfer.decision', $order->id) }}" method="POST"
                                                style="display:inline-block;">
                                        @elseif (Auth::user()->role === 'moderator')
                                                <form action="{{ route('moderator.bankTransfer.decision', $order->id) }}" method="POST"
                                                    style="display:inline-block;">
                                            @endif
                                                @csrf
                                                <input type="hidden" name="decision" value="rejected">
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    ❌ رفض الدفع
                                                </button>
                                            </form>
                                @else
                                            @if($payment->payment_confirmed_at)
                                                <span class="badge bg-success">تمت الموافقة</span>
                                            @else
                                                <span class="badge bg-danger">تم رفض الدفع</span>
                                            @endif
                                        @endif
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

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