@extends('layout')
@section('pageTitle', 'التجار المحذوفين')
@section('subTitle', 'التجار')
@section('currentTitle', 'سلة الحذوفات')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-vendor-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-15" placeholder="البحث عن تجار" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-vendor-table-toolbar="base">
                                <!--begin::Filter-->
                                <div class="w-150px me-3">
                                    <!--begin::Select2-->
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" data-placeholder="الحالة"
                                        data-kt-ecommerce-order-filter="status">
                                        <option></option>
                                        <option value="all">الكل</option>
                                        <option value="active">قعال</option>
                                        <option value="locked">مقفل</option>
                                    </select>
                                    <!--end::Select2-->
                                </div>
                                <!--end::Filter-->
                                <!--begin::Home-->
                                <a href="{{ route('moderator.dashboard') }}" class="btn btn-light-primary me-3">


                                    <!--end::Svg Icon-->الصفحة الرئيسية</a>
                                <!--end::Home-->

                            </div>

                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_vendors_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_vendors_table .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-125px">اسم التاجر</th>
                                    <th class="min-w-125px">البريد الالكتروني</th>
                                    <th class="min-w-125px">الحالة</th>
                                    <th class="min-w-125px">اسم المتجر</th>
                                    <th class="min-w-125px">وقت الحذف</th>
                                    <th class="text-end min-w-70px">التفاعل</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($users as $user)
                                    <tr>
                                        <!--begin::Checkbox-->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1" />
                                            </div>
                                        </td>
                                        <!--end::Checkbox-->
                                        <!--begin::Name=-->
                                        <td>
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $user->name }}</a>
                                        </td>
                                        <!--end::Name=-->
                                        <!--begin::Email=-->
                                        <td>
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary mb-1">{{ $user->email }}</a>
                                        </td>
                                        <!--end::Email=-->
                                        <!--begin::Status=-->
                                        <td>
                                            <!--begin::Badges-->
                                            <div
                                                class="badge
                                        @if ($user->store->status == 'قيد العمل') badge-light-warning
                                        @elseif($user->store->status == 'مقبول') badge-light-success
                                        @elseif($user->store->status == 'مرفوض') badge-light-danger @endif>
                                            ">
                                                {{ $user->store->status }}</div>
                                            <!--end::Badges-->
                                        </td>
                                        <!--end::Status=-->
                                        <!--begin::IP Address=-->
                                        <td>{{ $user->store->address }}</td>
                                        <!--end::IP Address=-->
                                        <!--begin::Date=-->
                                        <td>{{ $user->deleted_at->diffForHumans() }}</td>
                                        <!--end::Date=-->
                                        <!--begin::Action=-->
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-light btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Actions
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </button>

                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600
                                                menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                data-kt-menu="true">

                                                <div class="menu-item px-3">
                                                    <a href="{{ route('moderator.vendor.restore', $user->id) }}"
                                                        class="menu-link px-3">
                                                        <span class="me-2">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                        Restore
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a onclick="confirmForceDestroy({{ $user->id }},this)"
                                                        class="menu-link px-3">
                                                        <span class="me-2">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        Delete
                                                    </a>
                                                    {{-- <form method="POST" class="delete_vendor_form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="deleteItem({{ $user->id }})" class="menu-link px-3"
                                                            data-kt-vendor-table-filter="delete_row">
                                                            Delete
                                                        </button>
                                                    </form> --}}
                                                </div>
                                            </div>
                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                @endforeach

                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('js/jquery-3.6.0.min') }}"></script>

<script src="{{ asset('assets/js/axios.min.js') }}"></script>
<script src="{{ asset('js/crud.js') }}"></script>
<script>
    function confirmForceDestroy(id, reference) {
        const result = Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "لن تستطيع استرجاع هذه البيانات!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete!',
            cancelButtonText: 'Close',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                axios
                    .delete('/moderator/vendor/trashed/' + id, {
                        headers: {
                            "X-CSRF-TOKEN": document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                            "X-HTTP-Method-Override": "DELETE",
                        },
                    })
                    .then(function(response) {

                        KTMenu.createInstances();
                        showMessage(response.data);
                        const row = reference.closest("tr");
                        row.remove();
                    })
                    .catch(function(error) {
                        if (error) {
                            showMessage(error.response.data);
                        } else {
                            console.log("Error In Data Deleted");
                        }
                    });
            }

            function showMessage(data) {
                Swal.fire({
                    icon: data.icon,
                    title: data.title,
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        });

    }
</script>
