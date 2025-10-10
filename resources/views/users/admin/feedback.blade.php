@extends('layout')
@section('pageTitle', 'الرسائل')
@section('subTitle', 'الرسائل')
@section('currentTitle', 'الرسالة')
@if (Auth::user()->role === 'moderator')
@section('routeButton', route('moderator.dashboard'))
@elseif (Auth::user()->role === 'super_admin')
@section('routeButton', route('admin.dashboard'))
@endif
@section('content')


    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 class="mb-4">تفاصيل الرسالة</h3>

        <div class="row">
            <!-- 📨 رسالة المستخدم -->
            <div class="col-md-6">
                <div class="card shadow-sm border-primary mb-4">
                    <div class="card-header bg-primary text-white">
                        <strong>رسالة المستخدم</strong>
                    </div>
                    <div class="card-body">
                        <p><strong>الاسم:</strong> {{ $feedback->order?->user?->name ?? ' متوفر' }}</p>
                        <p><strong>البريد:</strong> {{ $feedback->order?->user?->email ?? 'غير متوفر' }}</p>
                        <hr>
                        <p><strong>محتوى الرسالة:</strong></p>
                        <div class="p-3 bg-light rounded border">
                            {{ $feedback->message }}
                        </div>
                        <hr>
                        <p class="text-muted"><small>تاريخ الإرسال: {{ $feedback->created_at->format('Y-m-d H:i') }}</small>
                        </p>
                    </div>
                </div>
            </div>

            <!-- 💬 رد المدير -->
            <div class="col-md-6">
                <div class="card shadow-sm border-success mb-4">
                    <div class="card-header bg-success text-white">
                        <strong>رد المدير</strong>
                    </div>
                    <div class="card-body">
                        @if ($feedback->admin_response)
                            <div class="alert alert-success">
                                <strong>تم الرد:</strong> {{ $feedback->admin_response }}
                            </div>
                        @else
                            @if (Auth::user()->role === 'super_admin')
                                <form method="POST" action="{{ route('admin.feedback.reply', $feedback->id) }}">
                            @elseif (Auth::user()->role === 'moderator')
                                    <form method="POST" action="{{ route('moderator.feedback.reply', $feedback->id) }}">
                                @endif
                                    @csrf
                                    <div class="mb-3">
                                        <label for="reply" class="form-label">اكتب الرد هنا</label>
                                        <textarea name="reply" id="reply" rows="5" class="form-control"
                                            placeholder="اكتب ردك على المستخدم..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-solid fa-paper-plane"></i> إرسال الرد
                                    </button>
                                </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

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