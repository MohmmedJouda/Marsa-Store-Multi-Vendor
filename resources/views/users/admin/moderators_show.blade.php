@extends('layout')
@section('pageTitle', 'المدراء')
@section('subTitle', 'الصفحة الرئيسية')
@section('currentTitle', 'المدراء')
@section('routeButton', route('admin.dashboard'))

@section('content')

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success" role="alert" style="text-align: right">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" role="alert" style="text-align: right">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-warning" style="text-align: right">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="menu-item px-3 mb-5">
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                data-bs-target="#kt_modal_add_moderator" style="color:white">
                <span class="me-2">
                    <i class="fas fa-plus"></i>
                </span>
                اضافة مدير جديد
            </button>
        </div>
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

                                    <th class="min-w-50px"> رقم المدير</th>
                                    <th class="min-w-20px">اسم المستخدم</th>
                                    <th class=" min-w-100px"> مدة عمله مع الشركة </th>
                                    <th class=" min-w-100px"> اجراءات </th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                <!--begin::Table row-->

                                <tr>

                                    @foreach ($users as $user)
                                            <td>
                                                <p>{{ $user->id }}</p>
                                            </td>

                                            <td>
                                                <div>
                                                    {{ $user->name }}
                                                </div>
                                            </td>

                                            <td class=" pe-0" data-order="rating-5">
                                                <p class="text-muted mb-0">
                                                    {{ $user->created_at->locale('ar')->diffForHumans() }}
                                                </p>
                                            </td>
                                            <!--end::Rating-->
                                            <!--begin::Status=-->
                                            {{--
                                            <td class="pe-0" data-order="rating-5">
                                                <div class="d-flex gap-2"> <!-- flex container مع مسافة بين الزرين -->

                                                    <!-- زر الحذف -->
                                                    <form action="{{ route('admin.moderator.delete', $user->id) }}" method="POST"
                                                        onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                                    </form>

                                                    <!-- زر إضافة مدير جديد -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_add_moderator" style="color:white">
                                                        اضافة مدير جديد
                                                    </button>

                                                </div>
                                            </td> --}}
                                            <td>

                                                <div class="menu-item px-3">
                                                    <form action="{{ route('admin.moderator.delete', $user->id) }}" method="POST"
                                                        onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="menu-link px-3 btn btn-link p-0">
                                                            <span class="me-2"><i class="fas fa-trash"></i></span>
                                                            حذف المستخدم
                                                        </button>
                                                    </form>

                                                </div>

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




        <div class="modal fade" id="kt_modal_add_moderator" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('admin.moderator.add') }}" id="kt_modal_add_moderator_form"
                        class="form">
                        @csrf
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_add_moderator_header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bolder">اضافة مدير</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div id="kt_modal_add_moderator_close" data-bs-dismiss="modal"
                                class="btn btn-icon btn-sm btn-active-icon-primary">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                            transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                            transform="rotate(45 7.41422 6)" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_add_moderator_scroll" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_add_moderator_header"
                                data-kt-scroll-wrappers="#kt_modal_add_moderator_scroll" data-kt-scroll-offset="300px">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">الاسم</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">البريد الالكتروني</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Email address must be active"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" class="form-control form-control-solid" placeholder=""
                                        name="email" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Billing toggle-->


                                <div class="row g-9 mb-7">

                                    <div class="col-md-6 fv-row">
                                        <label for="password" class="required fs-6 fw-bold mb-2">كلمة المرور</label>
                                        <input id="password" type="password" class="form-control form-control-solid"
                                            placeholder="**********" name="password" required />
                                    </div>

                                    <div class="col-md-6 fv-row">
                                        <label for="password_confirmation" class="required fs-6 fw-bold mb-2">تأكيد كلمة
                                            المرور</label>
                                        <input id="password_confirmation" type="password"
                                            class="form-control form-control-solid" placeholder="**********"
                                            name="password_confirmation" required />
                                    </div>

                                </div>

                                <!--end::Billing toggle-->
                                <!--begin::Billing form-->
                                <div id="kt_modal_add_moderator_billing_info" class="collapse show">

                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-bold mb-2">رقم الهاتف</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder="05/" name="phone" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->

                                        <!--end::Col-->
                                    </div>

                                    <!--end::Input group-->
                                    <!--begin::Input group-->

                                    <!--end::Input group-->
                                </div>
                                <!--end::Billing form-->
                            </div>
                            <!--end::Scroll-->
                        </div>
                        <!-- Modal -->

                        <div class="modal-footer flex-center">
                            <!--begin::Button-->
                            <button type="reset" id="kt_modal_add_moderator_cancel" class="btn btn-light me-3"
                                data-bs-dismiss="modal">تجاهل</button>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" class="btn btn-primary" id="kt_modal_add_moderator_submit">
                                <span class="indicator-label">تقديم</span>
                                <span class="indicator-progress">يرجة الانتظار ......
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!-- Modal -->

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
                    title: 'هل أنت متأكد؟',
                    text: "لن تستطيع استرجاع هذه البيانات",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم, حذف!',
                    cancelButtonText: 'اغلاق',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        destroy('/vendor/products/' + id, reference);
                    }
                });
            }
        </script>
    @endsection