@extends('layout')
@section('pageTitle', 'Vendors Show')
@section('subTitle', 'Vendors')
@section('currentTitle', 'Show')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">


        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-xl-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                        <!--begin::Card-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body pt-15">
                                <!--begin::Summary-->
                                <div class="d-flex flex-center flex-column mb-5">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-150px symbol-circle mb-7">
                                        <img src="assets/media/avatars/300-1.jpg" alt="image">
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <a href="#"
                                        class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $user->name }}</a>
                                    <!--end::Name-->
                                    <!--begin::Email-->
                                    <a href="#"
                                        class="fs-5 fw-bold text-muted text-hover-primary mb-6">{{ $user->email }}</a>
                                    <!--end::Email-->
                                </div>
                                <!--end::Summary-->
                                <!--begin::Details toggle-->
                                <div class="d-flex flex-stack fs-4 py-3">
                                    <div class="fw-bolder">Details</div>
                                    <!--begin::Badge-->
                                    <div class="badge badge-light-info d-inline">{{ $user->role }}</div>
                                    <!--begin::Badge-->
                                </div>
                                <!--end::Details toggle-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--begin::Details content-->
                                <div class="pb-5 fs-6">
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Account ID</div>
                                    <div class="text-gray-600">ID-{{ $user->id }}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Billing Email</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">info@keenthemes.com</a>
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Delivery Address</div>
                                    <div class="text-gray-600">101 Collin Street,
                                        <br>Melbourne 3000 VIC
                                        <br>Australia
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Language</div>
                                    <div class="text-gray-600">English</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Latest Transaction</div>
                                    <div class="text-gray-600">
                                        <a href="../../demo1/dist/apps/ecommerce/sales/details.html"
                                            class="text-gray-600 text-hover-primary">#14534</a>
                                    </div>
                                    <!--begin::Details item-->
                                </div>
                                <!--end::Details content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Sidebar-->
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-15">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                    href="#kt_ecommerce_customer_overview">Overview</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                    href="#kt_ecommerce_customer_general">General Settings</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                    href="#kt_ecommerce_customer_advanced">Advanced Settings</a>
                            </li>
                            <!--end:::Tab item-->
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin:::Tab content-->
                        <div class="tab-content" id="myTabContent">
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_customer_overview" role="tabpanel">
                                <div class="row row-cols-1 row-cols-md-2 mb-6 mb-xl-9">
                                    <div class="col">
                                        <!--begin::Card-->
                                        <div class="card pt-4 h-md-100 mb-6 mb-md-0">
                                            <!--begin::Card header-->
                                            <div class="card-header border-0">
                                                <!--begin::Card title-->
                                                <div class="card-title">
                                                    <h2 class="fw-bolder">Reward Points</h2>
                                                </div>
                                                <!--end::Card title-->
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <div class="fw-bolder fs-2">
                                                    <div class="d-flex">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                                        <span class="svg-icon svg-icon-info svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <div class="ms-2">4,571
                                                            <span class="text-muted fs-4 fw-bold">Points earned</span>
                                                        </div>
                                                    </div>
                                                    <div class="fs-7 fw-normal text-muted">Earn reward points with every
                                                        purchase.</div>
                                                </div>
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <div class="col">
                                        <!--begin::Reward Tier-->
                                        <a href="#" class="card bg-info hoverable h-md-100">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen020.svg-->
                                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path d="M14 18V16H10V18L9 20H15L14 18Z" fill="currentColor">
                                                        </path>
                                                        <path opacity="0.3"
                                                            d="M20 4H17V3C17 2.4 16.6 2 16 2H8C7.4 2 7 2.4 7 3V4H4C3.4 4 3 4.4 3 5V9C3 11.2 4.8 13 7 13C8.2 14.2 8.8 14.8 10 16H14C15.2 14.8 15.8 14.2 17 13C19.2 13 21 11.2 21 9V5C21 4.4 20.6 4 20 4ZM5 9V6H7V11C5.9 11 5 10.1 5 9ZM19 9C19 10.1 18.1 11 17 11V6H19V9ZM17 21V22H7V21C7 20.4 7.4 20 8 20H16C16.6 20 17 20.4 17 21ZM10 9C9.4 9 9 8.6 9 8V5C9 4.4 9.4 4 10 4C10.6 4 11 4.4 11 5V8C11 8.6 10.6 9 10 9ZM10 13C9.4 13 9 12.6 9 12V11C9 10.4 9.4 10 10 10C10.6 10 11 10.4 11 11V12C11 12.6 10.6 13 10 13Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <div class="text-white fw-bolder fs-2 mt-5">Premium Member</div>
                                                <div class="fw-bold text-white">Tier Milestone Reached</div>
                                            </div>
                                            <!--end::Body-->
                                        </a>
                                        <!--end::Reward Tier-->
                                    </div>
                                </div>
                                <!--begin::Card-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Transaction History</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0 pb-5">
                                        <!--begin::Table-->
                                        <div id="kt_table_customers_payment_wrapper"
                                            class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-row-dashed gy-5 dataTable no-footer"
                                                    id="kt_table_customers_payment">
                                                    <!--begin::Table head-->
                                                    <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                                        <!--begin::Table row-->
                                                        <tr class="text-start text-muted text-uppercase gs-0">
                                                            <th class="min-w-100px sorting" tabindex="0"
                                                                aria-controls="kt_table_customers_payment" rowspan="1"
                                                                colspan="1"
                                                                aria-label="order No.: activate to sort column ascending"
                                                                style="width: 102.781px;">order No.</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="kt_table_customers_payment" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Status: activate to sort column ascending"
                                                                style="width: 85.7188px;">Status</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="kt_table_customers_payment" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Amount: activate to sort column ascending"
                                                                style="width: 81.4844px;">Amount</th>
                                                            <th class="min-w-100px sorting" tabindex="0"
                                                                aria-controls="kt_table_customers_payment" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Rewards: activate to sort column ascending"
                                                                style="width: 103.047px;">Rewards</th>
                                                            <th class="min-w-100px sorting_disabled" rowspan="1"
                                                                colspan="1" aria-label="Date"
                                                                style="width: 156.719px;">Date</th>
                                                        </tr>
                                                        <!--end::Table row-->
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="fs-6 fw-bold text-gray-600">
                                                        <!--begin::Table row-->

                                                        <!--end::Table row-->
                                                        <!--begin::Table row-->

                                                        <!--end::Table row-->
                                                        <!--begin::Table row-->

                                                        <!--end::Table row-->
                                                        <!--begin::Table row-->

                                                        <!--end::Table row-->
                                                        <!--begin::Table row-->

                                                        <!--end::Table row-->
                                                        <!--begin::Table row-->

                                                        <!--end::Table row-->
                                                        <!--begin::Table row-->

                                                        <!--end::Table row-->
                                                        <!--begin::Table row-->

                                                        <!--end::Table row-->
                                                        <!--begin::Table row-->

                                                        <!--end::Table row-->
                                                        <tr class="odd">
                                                            <!--begin::order=-->
                                                            <td>
                                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html"
                                                                    class="text-gray-600 text-hover-primary mb-1">#14670</a>
                                                            </td>
                                                            <!--end::order=-->
                                                            <!--begin::Status=-->
                                                            <td>
                                                                <span class="badge badge-light-success">Successful</span>
                                                            </td>
                                                            <!--end::Status=-->
                                                            <!--begin::Amount=-->
                                                            <td>$1,200.00</td>
                                                            <!--end::Amount=-->
                                                            <!--begin::Amount=-->
                                                            <td data-order="0000-01-12T00:00:00+03:06">120</td>
                                                            <!--end::Amount=-->
                                                            <!--begin::Date=-->
                                                            <td>14 Dec 2020, 8:43 pm</td>
                                                            <!--end::Date=-->
                                                        </tr>
                                                        <tr class="even">
                                                            <!--begin::order=-->
                                                            <td>
                                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html"
                                                                    class="text-gray-600 text-hover-primary mb-1">#14750</a>
                                                            </td>
                                                            <!--end::order=-->
                                                            <!--begin::Status=-->
                                                            <td>
                                                                <span class="badge badge-light-success">Successful</span>
                                                            </td>
                                                            <!--end::Status=-->
                                                            <!--begin::Amount=-->
                                                            <td>$79.00</td>
                                                            <!--end::Amount=-->
                                                            <!--begin::Amount=-->
                                                            <td data-order="2025-07-07T00:00:00+03:00">7</td>
                                                            <!--end::Amount=-->
                                                            <!--begin::Date=-->
                                                            <td>01 Dec 2020, 10:12 am</td>
                                                            <!--end::Date=-->
                                                        </tr>
                                                        <tr class="odd">
                                                            <!--begin::order=-->
                                                            <td>
                                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html"
                                                                    class="text-gray-600 text-hover-primary mb-1">#15932</a>
                                                            </td>
                                                            <!--end::order=-->
                                                            <!--begin::Status=-->
                                                            <td>
                                                                <span class="badge badge-light-success">Successful</span>
                                                            </td>
                                                            <!--end::Status=-->
                                                            <!--begin::Amount=-->
                                                            <td>$5,500.00</td>
                                                            <!--end::Amount=-->
                                                            <!--begin::Amount=-->
                                                            <td data-order="Invalid date">550</td>
                                                            <!--end::Amount=-->
                                                            <!--begin::Date=-->
                                                            <td>12 Nov 2020, 2:01 pm</td>
                                                            <!--end::Date=-->
                                                        </tr>
                                                        <tr class="even">
                                                            <!--begin::order=-->
                                                            <td>
                                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html"
                                                                    class="text-gray-600 text-hover-primary mb-1">#15196</a>
                                                            </td>
                                                            <!--end::order=-->
                                                            <!--begin::Status=-->
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <!--end::Status=-->
                                                            <!--begin::Amount=-->
                                                            <td>$880.00</td>
                                                            <!--end::Amount=-->
                                                            <!--begin::Amount=-->
                                                            <td data-order="Invalid date">88</td>
                                                            <!--end::Amount=-->
                                                            <!--begin::Date=-->
                                                            <td>21 Oct 2020, 5:54 pm</td>
                                                            <!--end::Date=-->
                                                        </tr>
                                                        <tr class="odd">
                                                            <!--begin::order=-->
                                                            <td>
                                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html"
                                                                    class="text-gray-600 text-hover-primary mb-1">#15010</a>
                                                            </td>
                                                            <!--end::order=-->
                                                            <!--begin::Status=-->
                                                            <td>
                                                                <span class="badge badge-light-success">Successful</span>
                                                            </td>
                                                            <!--end::Status=-->
                                                            <!--begin::Amount=-->
                                                            <td>$7,650.00</td>
                                                            <!--end::Amount=-->
                                                            <!--begin::Amount=-->
                                                            <td data-order="Invalid date">765</td>
                                                            <!--end::Amount=-->
                                                            <!--begin::Date=-->
                                                            <td>19 Oct 2020, 7:32 am</td>
                                                            <!--end::Date=-->
                                                        </tr>
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="kt_table_customers_payment_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="kt_table_customers_payment_previous"><a href="#"
                                                                    aria-controls="kt_table_customers_payment"
                                                                    data-dt-idx="0" tabindex="0" class="page-link"><i
                                                                        class="previous"></i></a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="kt_table_customers_payment"
                                                                    data-dt-idx="1" tabindex="0"
                                                                    class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="kt_table_customers_payment"
                                                                    data-dt-idx="2" tabindex="0"
                                                                    class="page-link">2</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="kt_table_customers_payment_next"><a href="#"
                                                                    aria-controls="kt_table_customers_payment"
                                                                    data-dt-idx="3" tabindex="0" class="page-link"><i
                                                                        class="next"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end:::Tab pane-->
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade" id="kt_ecommerce_customer_general" role="tabpanel">
                                <!--begin::Card-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Profile</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0 pb-5">
                                        <!--begin::Form-->
                                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#"
                                            id="kt_ecommerce_customer_profile">
                                            <!--begin::Input group-->
                                            <div class="mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">
                                                    <span>Update Avatar</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                        data-bs-toggle="tooltip" title=""
                                                        data-bs-original-title="Allowed file types: png, jpg, jpeg."
                                                        aria-label="Allowed file types: png, jpg, jpeg."></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Image input wrapper-->
                                                <div class="mt-1">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline"
                                                        data-kt-image-input="true"
                                                        style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-125px h-125px"
                                                            style="background-image: url(assets/media/avatars/300-1.jpg)">
                                                        </div>
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Edit-->
                                                        <label
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="" data-bs-original-title="Change avatar">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="avatar"
                                                                accept=".png, .jpg, .jpeg">
                                                            <input type="hidden" name="avatar_remove">
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Edit-->
                                                        <!--begin::Cancel-->
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                            title="" data-bs-original-title="Cancel avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Cancel-->
                                                        <!--begin::Remove-->
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                            title="" data-bs-original-title="Remove avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Remove-->
                                                    </div>
                                                    <!--end::Image input-->
                                                </div>
                                                <!--end::Image input wrapper-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2 required">Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    placeholder="" name="name" value="Max Smith">
                                                <!--end::Input-->
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Row-->
                                            <div class="row row-cols-1 row-cols-md-2">
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-bold mb-2">
                                                            <span class="required">General Email</span>
                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Email address must be active"
                                                                aria-label="Email address must be active"></i>
                                                        </label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="email" class="form-control form-control-solid"
                                                            placeholder="" name="gen_email" value="max@kt.com">
                                                        <!--end::Input-->
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-bold mb-2">
                                                            <span>Billing Email</span>
                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Email address must be active"
                                                                aria-label="Email address must be active"></i>
                                                        </label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="email" class="form-control form-control-solid"
                                                            placeholder="" name="bill_email" value="info@keenthemes.com">
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <div class="d-flex justify-content-end">
                                                <!--begin::Button-->
                                                <button type="submit" id="kt_ecommerce_customer_profile_submit"
                                                    class="btn btn-light-primary">
                                                    <span class="indicator-label">Save</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                                <!--end::Button-->
                                            </div>
                                            <div></div>
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                                <!--begin::Card-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Documents</h2>
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        @foreach ($user->documents as $document)
                                            <div
                                                class="badge
                                                @if ($user->store->status == 'pending') badge-light-warning
                                                @elseif($user->store->status == 'approved') badge-light-success
                                                @elseif($user->store->status == 'rejected') badge-light-danger @endif>
                                                    ">
                                                {{ $user->store->status }}
                                            </div>
                                        @endforeach
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div id="kt_ecommerce_customer_addresses" class="card-body pt-0 pb-5">
                                        <div class="container">


                                            <div class="card shadow-sm">
                                                <div class="card-body p-0">
                                                    <table class="table table-hover align-middle">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Type document</th>
                                                                <th>Extention Type</th>
                                                                <th>Status</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($user->documents as $document)
                                                                <tr>
                                                                    <td>{{ $document->document_type }}</td>

                                                                    <td>{{ pathinfo($document->document_url, PATHINFO_EXTENSION) }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ asset('storage/' . $document->document_url) }}"
                                                                            class="btn btn-sm btn-light-info"
                                                                            target="_blank">
                                                                            <i class="fas fa-eye"></i> Show
                                                                        </a>

                                                                    </td>

                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="4" class="text-center">No documents
                                                                        available at this time</td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end:::Tab pane-->
                                <!--begin:::Tab pane-->
                                <div class="tab-pane fade" id="kt_ecommerce_customer_advanced" role="tabpanel">
                                    <!--begin::Card-->
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <!--begin::Card header-->
                                        <div class="card-header border-0">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <h2>Security Details</h2>
                                            </div>
                                            <!--end::Card title-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0 pb-5">
                                            <!--begin::Table wrapper-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed gy-5"
                                                    id="kt_table_users_login_session">
                                                    <!--begin::Table body-->
                                                    <tbody class="fs-6 fw-bold text-gray-600">
                                                        <tr>
                                                            <td>Phone</td>
                                                            <td>+6141 234 567</td>
                                                            <td class="text-end">
                                                                <button type="button"
                                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#kt_modal_update_phone">
                                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path opacity="0.3"
                                                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                                fill="currentColor"></path>
                                                                            <path
                                                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Password</td>
                                                            <td>******</td>
                                                            <td class="text-end">
                                                                <button type="button"
                                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#kt_modal_update_password">
                                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path opacity="0.3"
                                                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                                fill="currentColor"></path>
                                                                            <path
                                                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Table wrapper-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                    <!--begin::Card-->
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <!--begin::Card header-->
                                        <div class="card-header border-0">
                                            <!--begin::Card title-->
                                            <div class="card-title flex-column">
                                                <h2 class="mb-1">Two Step Authentication</h2>
                                                <div class="fs-6 fw-bold text-muted">Keep your account extra secure with a
                                                    second authentication step.</div>
                                            </div>
                                            <!--end::Card title-->
                                            <!--begin::Card toolbar-->
                                            <div class="card-toolbar">
                                                <!--begin::Add-->
                                                <button type="button" class="btn btn-light-primary btn-sm"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <!--begin::Svg Icon | path: icons/duotune/technology/teh004.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3"
                                                                d="M21 10.7192H3C2.4 10.7192 2 11.1192 2 11.7192C2 12.3192 2.4 12.7192 3 12.7192H6V14.7192C6 18.0192 8.7 20.7192 12 20.7192C15.3 20.7192 18 18.0192 18 14.7192V12.7192H21C21.6 12.7192 22 12.3192 22 11.7192C22 11.1192 21.6 10.7192 21 10.7192Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M11.6 21.9192C11.4 21.9192 11.2 21.8192 11 21.7192C10.6 21.4192 10.5 20.7191 10.8 20.3191C11.7 19.1191 12.3 17.8191 12.7 16.3191C12.8 15.8191 13.4 15.4192 13.9 15.6192C14.4 15.7192 14.8 16.3191 14.6 16.8191C14.2 18.5191 13.4 20.1192 12.4 21.5192C12.2 21.7192 11.9 21.9192 11.6 21.9192ZM8.7 19.7192C10.2 18.1192 11 15.9192 11 13.7192V8.71917C11 8.11917 11.4 7.71917 12 7.71917C12.6 7.71917 13 8.11917 13 8.71917V13.0192C13 13.6192 13.4 14.0192 14 14.0192C14.6 14.0192 15 13.6192 15 13.0192V8.71917C15 7.01917 13.7 5.71917 12 5.71917C10.3 5.71917 9 7.01917 9 8.71917V13.7192C9 15.4192 8.4 17.1191 7.2 18.3191C6.8 18.7191 6.9 19.3192 7.3 19.7192C7.5 19.9192 7.7 20.0192 8 20.0192C8.3 20.0192 8.5 19.9192 8.7 19.7192ZM6 16.7192C6.5 16.7192 7 16.2192 7 15.7192V8.71917C7 8.11917 7.1 7.51918 7.3 6.91918C7.5 6.41918 7.2 5.8192 6.7 5.6192C6.2 5.4192 5.59999 5.71917 5.39999 6.21917C5.09999 7.01917 5 7.81917 5 8.71917V15.7192V15.8191C5 16.3191 5.5 16.7192 6 16.7192ZM9 4.71917C9.5 4.31917 10.1 4.11918 10.7 3.91918C11.2 3.81918 11.5 3.21917 11.4 2.71917C11.3 2.21917 10.7 1.91916 10.2 2.01916C9.4 2.21916 8.59999 2.6192 7.89999 3.1192C7.49999 3.4192 7.4 4.11916 7.7 4.51916C7.9 4.81916 8.2 4.91918 8.5 4.91918C8.6 4.91918 8.8 4.81917 9 4.71917ZM18.2 18.9192C18.7 17.2192 19 15.5192 19 13.7192V8.71917C19 5.71917 17.1 3.1192 14.3 2.1192C13.8 1.9192 13.2 2.21917 13 2.71917C12.8 3.21917 13.1 3.81916 13.6 4.01916C15.6 4.71916 17 6.61917 17 8.71917V13.7192C17 15.3192 16.8 16.8191 16.3 18.3191C16.1 18.8191 16.4 19.4192 16.9 19.6192C17 19.6192 17.1 19.6192 17.2 19.6192C17.7 19.6192 18 19.3192 18.2 18.9192Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Add Authentication Step</button>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-6 w-200px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                            data-bs-target="#kt_modal_add_auth_app">Use authenticator
                                                            app</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                            data-bs-target="#kt_modal_add_one_time_password">Enable
                                                            one-time
                                                            password</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                                <!--end::Add-->
                                            </div>
                                            <!--end::Card toolbar-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pb-5">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <!--begin::Content-->
                                                <div class="d-flex flex-column">
                                                    <span>SMS</span>
                                                    <span class="text-muted fs-6">+6141 234 567</span>
                                                </div>
                                                <!--end::Content-->
                                                <!--begin::Action-->
                                                <div class="d-flex justify-content-end align-items-center">
                                                    <!--begin::Button-->
                                                    <button type="button"
                                                        class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto me-5"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_add_one_time_password">
                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                    fill="currentColor"></path>
                                                                <path
                                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                    <!--end::Button-->
                                                    <!--begin::Button-->
                                                    <button type="button"
                                                        class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                        id="kt_users_delete_two_step">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                    fill="currentColor"></path>
                                                                <path opacity="0.5"
                                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                    fill="currentColor"></path>
                                                                <path opacity="0.5"
                                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                    <!--end::Button-->
                                                </div>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin:Separator-->
                                            <div class="separator separator-dashed my-5"></div>
                                            <!--end:Separator-->
                                            <!--begin::Disclaimer-->
                                            <div class="text-gray-600">If you lose your mobile device or security key, you
                                                can
                                                <a href="#" class="me-1">generate a backup code</a>to sign in to
                                                your
                                                account.
                                            </div>
                                            <!--end::Disclaimer-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                    <!--begin::Card-->
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <!--begin::Card header-->
                                        <div class="card-header border-0">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <h2 class="fw-bolder mb-0">Payment Methods</h2>
                                            </div>
                                            <!--end::Card title-->
                                            <!--begin::Card toolbar-->
                                            <div class="card-toolbar">
                                                <a href="#" class="btn btn-sm btn-flex btn-light-primary"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="5" fill="currentColor"></rect>
                                                            <rect x="10.8891" y="17.8033" width="12" height="2"
                                                                rx="1" transform="rotate(-90 10.8891 17.8033)"
                                                                fill="currentColor"></rect>
                                                            <rect x="6.01041" y="10.9247" width="12" height="2"
                                                                rx="1" fill="currentColor"></rect>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Add new method</a>
                                            </div>
                                            <!--end::Card toolbar-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                            <!--begin::Option-->
                                            <div class="py-0" data-kt-customer-payment-method="row">
                                                <!--begin::Header-->
                                                <div class="py-3 d-flex flex-stack flex-wrap">
                                                    <!--begin::Toggle-->
                                                    <div class="d-flex align-items-center collapsible rotate"
                                                        data-bs-toggle="collapse"
                                                        href="#kt_customer_view_payment_method_1" role="button"
                                                        aria-expanded="false"
                                                        aria-controls="kt_customer_view_payment_method_1">
                                                        <!--begin::Arrow-->
                                                        <div class="me-3 rotate-90">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Arrow-->
                                                        <!--begin::Logo-->
                                                        <img src="assets/media/svg/card-logos/mastercard.svg"
                                                            class="w-40px me-3" alt="">
                                                        <!--end::Logo-->
                                                        <!--begin::Summary-->
                                                        <div class="me-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="text-gray-800 fw-bolder">Mastercard</div>
                                                                <div class="badge badge-light-primary ms-5">Primary</div>
                                                            </div>
                                                            <div class="text-muted">Expires Dec 2024</div>
                                                        </div>
                                                        <!--end::Summary-->
                                                    </div>
                                                    <!--end::Toggle-->
                                                    <!--begin::Toolbar-->
                                                    <div class="d-flex my-3 ms-9">
                                                        <!--begin::Edit-->
                                                        <a href="#"
                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                            data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                            <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                title="" data-bs-original-title="Edit">
                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path opacity="0.3"
                                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                            fill="currentColor"></path>
                                                                        <path
                                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                            fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </a>
                                                        <!--end::Edit-->
                                                        <!--begin::Delete-->
                                                        <a href="#"
                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                            data-bs-toggle="tooltip" title=""
                                                            data-kt-customer-payment-method="delete"
                                                            data-bs-original-title="Delete">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                        fill="currentColor"></path>
                                                                    <path opacity="0.5"
                                                                        d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                        fill="currentColor"></path>
                                                                    <path opacity="0.5"
                                                                        d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <!--end::Delete-->
                                                        <!--begin::More-->
                                                        <a href="#"
                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                            data-bs-toggle="tooltip" title=""
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end"
                                                            data-bs-original-title="More Options">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                                        fill="currentColor"></path>
                                                                    <path opacity="0.3"
                                                                        d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-payment-mehtod-action="set_as_primary">Set as
                                                                    Primary</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                        <!--end::More-->
                                                    </div>
                                                    <!--end::Toolbar-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div id="kt_customer_view_payment_method_1"
                                                    class="collapse show fs-6 ps-10"
                                                    data-bs-parent="#kt_customer_view_payment_method">
                                                    <!--begin::Details-->
                                                    <div class="d-flex flex-wrap py-5">
                                                        <!--begin::Col-->
                                                        <div class="flex-equal me-5">
                                                            <table class="table table-flush fw-bold gy-1">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Name
                                                                        </td>
                                                                        <td class="text-gray-800">Emma Smith</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Number
                                                                        </td>
                                                                        <td class="text-gray-800">**** 3769</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Expires
                                                                        </td>
                                                                        <td class="text-gray-800">12/2024</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Type
                                                                        </td>
                                                                        <td class="text-gray-800">Mastercard credit card
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Issuer
                                                                        </td>
                                                                        <td class="text-gray-800">VICBANK</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">ID</td>
                                                                        <td class="text-gray-800">id_4325df90sdf8</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="flex-equal">
                                                            <table class="table table-flush fw-bold gy-1">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Billing
                                                                            address</td>
                                                                        <td class="text-gray-800">AU</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Phone
                                                                        </td>
                                                                        <td class="text-gray-800">No phone provided</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Email
                                                                        </td>
                                                                        <td class="text-gray-800">
                                                                            <a href="#"
                                                                                class="text-gray-900 text-hover-primary">smith@kpmg.com</a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Origin
                                                                        </td>
                                                                        <td class="text-gray-800">Australia
                                                                            <div
                                                                                class="symbol symbol-20px symbol-circle ms-2">
                                                                                <img
                                                                                    src="assets/media/flags/australia.svg">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">CVC
                                                                            check
                                                                        </td>
                                                                        <td class="text-gray-800">Passed
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span
                                                                                class="svg-icon svg-icon-2 svg-icon-success">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none">
                                                                                    <rect opacity="0.3" x="2" y="2"
                                                                                        width="20" height="20"
                                                                                        rx="10"
                                                                                        fill="currentColor">
                                                                                    </rect>
                                                                                    <path
                                                                                        d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                        fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Option-->
                                            <div class="separator separator-dashed"></div>
                                            <!--begin::Option-->
                                            <div class="py-0" data-kt-customer-payment-method="row">
                                                <!--begin::Header-->
                                                <div class="py-3 d-flex flex-stack flex-wrap">
                                                    <!--begin::Toggle-->
                                                    <div class="d-flex align-items-center collapsible collapsed rotate"
                                                        data-bs-toggle="collapse"
                                                        href="#kt_customer_view_payment_method_2" role="button"
                                                        aria-expanded="false"
                                                        aria-controls="kt_customer_view_payment_method_2">
                                                        <!--begin::Arrow-->
                                                        <div class="me-3 rotate-90">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Arrow-->
                                                        <!--begin::Logo-->
                                                        <img src="assets/media/svg/card-logos/visa.svg"
                                                            class="w-40px me-3" alt="">
                                                        <!--end::Logo-->
                                                        <!--begin::Summary-->
                                                        <div class="me-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="text-gray-800 fw-bolder">Visa</div>
                                                            </div>
                                                            <div class="text-muted">Expires Feb 2022</div>
                                                        </div>
                                                        <!--end::Summary-->
                                                    </div>
                                                    <!--end::Toggle-->
                                                    <!--begin::Toolbar-->
                                                    <div class="d-flex my-3 ms-9">
                                                        <!--begin::Edit-->
                                                        <a href="#"
                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                            data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                            <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                title="" data-bs-original-title="Edit">
                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path opacity="0.3"
                                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                            fill="currentColor"></path>
                                                                        <path
                                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                            fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </a>
                                                        <!--end::Edit-->
                                                        <!--begin::Delete-->
                                                        <a href="#"
                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                            data-bs-toggle="tooltip" title=""
                                                            data-kt-customer-payment-method="delete"
                                                            data-bs-original-title="Delete">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                        fill="currentColor"></path>
                                                                    <path opacity="0.5"
                                                                        d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                        fill="currentColor"></path>
                                                                    <path opacity="0.5"
                                                                        d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <!--end::Delete-->
                                                        <!--begin::More-->
                                                        <a href="#"
                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                            data-bs-toggle="tooltip" title=""
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end"
                                                            data-bs-original-title="More Options">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                                        fill="currentColor"></path>
                                                                    <path opacity="0.3"
                                                                        d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-payment-mehtod-action="set_as_primary">Set as
                                                                    Primary</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                        <!--end::More-->
                                                    </div>
                                                    <!--end::Toolbar-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div id="kt_customer_view_payment_method_2" class="collapse fs-6 ps-10"
                                                    data-bs-parent="#kt_customer_view_payment_method">
                                                    <!--begin::Details-->
                                                    <div class="d-flex flex-wrap py-5">
                                                        <!--begin::Col-->
                                                        <div class="flex-equal me-5">
                                                            <table class="table table-flush fw-bold gy-1">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Name
                                                                        </td>
                                                                        <td class="text-gray-800">Melody Macy</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Number
                                                                        </td>
                                                                        <td class="text-gray-800">**** 5235</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Expires
                                                                        </td>
                                                                        <td class="text-gray-800">02/2022</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Type
                                                                        </td>
                                                                        <td class="text-gray-800">Visa credit card</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Issuer
                                                                        </td>
                                                                        <td class="text-gray-800">ENBANK</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">ID</td>
                                                                        <td class="text-gray-800">id_w2r84jdy723</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="flex-equal">
                                                            <table class="table table-flush fw-bold gy-1">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Billing
                                                                            address</td>
                                                                        <td class="text-gray-800">UK</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Phone
                                                                        </td>
                                                                        <td class="text-gray-800">No phone provided</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Email
                                                                        </td>
                                                                        <td class="text-gray-800">
                                                                            <a href="#"
                                                                                class="text-gray-900 text-hover-primary">melody@altbox.com</a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Origin
                                                                        </td>
                                                                        <td class="text-gray-800">United Kingdom
                                                                            <div
                                                                                class="symbol symbol-20px symbol-circle ms-2">
                                                                                <img
                                                                                    src="assets/media/flags/united-kingdom.svg">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">CVC
                                                                            check
                                                                        </td>
                                                                        <td class="text-gray-800">Passed
                                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                                                                            <span
                                                                                class="svg-icon svg-icon-2 svg-icon-success">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none">
                                                                                    <path opacity="0.3"
                                                                                        d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z"
                                                                                        fill="currentColor"></path>
                                                                                    <path
                                                                                        d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z"
                                                                                        fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Option-->
                                            <div class="separator separator-dashed"></div>
                                            <!--begin::Option-->
                                            <div class="py-0" data-kt-customer-payment-method="row">
                                                <!--begin::Header-->
                                                <div class="py-3 d-flex flex-stack flex-wrap">
                                                    <!--begin::Toggle-->
                                                    <div class="d-flex align-items-center collapsible collapsed rotate"
                                                        data-bs-toggle="collapse"
                                                        href="#kt_customer_view_payment_method_3" role="button"
                                                        aria-expanded="false"
                                                        aria-controls="kt_customer_view_payment_method_3">
                                                        <!--begin::Arrow-->
                                                        <div class="me-3 rotate-90">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Arrow-->
                                                        <!--begin::Logo-->
                                                        <img src="assets/media/svg/card-logos/american-express.svg"
                                                            class="w-40px me-3" alt="">
                                                        <!--end::Logo-->
                                                        <!--begin::Summary-->
                                                        <div class="me-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="text-gray-800 fw-bolder">American Express</div>
                                                                <div class="badge badge-light-danger ms-5">Expired</div>
                                                            </div>
                                                            <div class="text-muted">Expires Aug 2021</div>
                                                        </div>
                                                        <!--end::Summary-->
                                                    </div>
                                                    <!--end::Toggle-->
                                                    <!--begin::Toolbar-->
                                                    <div class="d-flex my-3 ms-9">
                                                        <!--begin::Edit-->
                                                        <a href="#"
                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                            data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                            <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                title="" data-bs-original-title="Edit">
                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path opacity="0.3"
                                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                            fill="currentColor"></path>
                                                                        <path
                                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                            fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </a>
                                                        <!--end::Edit-->
                                                        <!--begin::Delete-->
                                                        <a href="#"
                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                            data-bs-toggle="tooltip" title=""
                                                            data-kt-customer-payment-method="delete"
                                                            data-bs-original-title="Delete">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                        fill="currentColor"></path>
                                                                    <path opacity="0.5"
                                                                        d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                        fill="currentColor"></path>
                                                                    <path opacity="0.5"
                                                                        d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <!--end::Delete-->
                                                        <!--begin::More-->
                                                        <a href="#"
                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                            data-bs-toggle="tooltip" title=""
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end"
                                                            data-bs-original-title="More Options">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                                        fill="currentColor"></path>
                                                                    <path opacity="0.3"
                                                                        d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-payment-mehtod-action="set_as_primary">Set as
                                                                    Primary</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                        <!--end::More-->
                                                    </div>
                                                    <!--end::Toolbar-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div id="kt_customer_view_payment_method_3" class="collapse fs-6 ps-10"
                                                    data-bs-parent="#kt_customer_view_payment_method">
                                                    <!--begin::Details-->
                                                    <div class="d-flex flex-wrap py-5">
                                                        <!--begin::Col-->
                                                        <div class="flex-equal me-5">
                                                            <table class="table table-flush fw-bold gy-1">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Name
                                                                        </td>
                                                                        <td class="text-gray-800">Max Smith</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Number
                                                                        </td>
                                                                        <td class="text-gray-800">**** 5197</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Expires
                                                                        </td>
                                                                        <td class="text-gray-800">08/2021</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Type
                                                                        </td>
                                                                        <td class="text-gray-800">American express credit
                                                                            card
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Issuer
                                                                        </td>
                                                                        <td class="text-gray-800">USABANK</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">ID</td>
                                                                        <td class="text-gray-800">id_89457jcje63</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="flex-equal">
                                                            <table class="table table-flush fw-bold gy-1">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Billing
                                                                            address</td>
                                                                        <td class="text-gray-800">US</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Phone
                                                                        </td>
                                                                        <td class="text-gray-800">No phone provided</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Email
                                                                        </td>
                                                                        <td class="text-gray-800">
                                                                            <a href="#"
                                                                                class="text-gray-900 text-hover-primary">max@kt.com</a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">Origin
                                                                        </td>
                                                                        <td class="text-gray-800">United States of America
                                                                            <div
                                                                                class="symbol symbol-20px symbol-circle ms-2">
                                                                                <img
                                                                                    src="assets/media/flags/united-states.svg">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">CVC
                                                                            check
                                                                        </td>
                                                                        <td class="text-gray-800">Failed
                                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                                            <span
                                                                                class="svg-icon svg-icon-2 svg-icon-danger">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none">
                                                                                    <rect opacity="0.5" x="6" y="17.3137"
                                                                                        width="16" height="2"
                                                                                        rx="1"
                                                                                        transform="rotate(-45 6 17.3137)"
                                                                                        fill="currentColor"></rect>
                                                                                    <rect x="7.41422" y="6" width="16"
                                                                                        height="2" rx="1"
                                                                                        transform="rotate(45 7.41422 6)"
                                                                                        fill="currentColor"></rect>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end:::Tab pane-->
                            </div>
                            <!--end:::Tab content-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Container-->
            </div>



        </div>

    @endsection
