@if ($users->count())
    @foreach ($users as $user)
        <tr id="vendor-row-{{ $user->id }}">
            <!--begin::Checkbox-->
            <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="1" />
                </div>
            </td>
            <!--end::Checkbox-->

            <!--begin::Vendor Name-->
            <td>
                <a href="{{ route('moderator.vendors.show', $user->id) }}"
                    class="text-gray-800 text-hover-primary mb-1">{{ $user->name }}</a>
            </td>
            <!--end::Vendor Name-->

            <!--begin::Email-->
            <td>
                <a href="{{ route('moderator.vendors.show', $user->id) }}"
                    class="text-gray-600 text-hover-primary mb-1">{{ $user->email }}</a>
            </td>
            <!--end::Email-->

            <!--begin::Status-->
            <td>
                <div
                    class="badge
                    @if ($user->store && $user->store->status == 'pending') badge-light-warning
                    @elseif($user->store && $user->store->status == 'approved') badge-light-success
                    @elseif($user->store && $user->store->status == 'rejected') badge-light-danger @endif">
                    {{ $user->store->status ?? '-' }}
                </div>
            </td>
            <!--end::Status-->

            <!--begin::Address-->
            <td>{{ $user->store->name ?? '-' }}</td>
            <!--end::Address-->

            <!--begin::Created Date-->
            <td>{{ $user->created_at->diffForHumans() }}</td>
            <!--end::Created Date-->

            <!--begin::Actions-->
            <td class="text-end">
                <button type="button" class="btn btn-sm btn-light btn-active-light-primary"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    Actions
                    <span class="svg-icon svg-icon-5 m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
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
                        <a href="{{ route('moderator.vendors.show', $user->id) }}" class="menu-link px-3">
                            <span class="me-2">
                                <i class="fas fa-eye"></i>
                            </span>
                            View
                        </a>
                    </div>

                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-id="{{ $user->id }}" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_edit_vendor">
                            <span class="me-2">
                                <i class="fas fa-edit"></i>
                            </span>
                            Edit
                        </a>
                    </div>

                    <div class="menu-item px-3">
                        <a onclick="confirmDestroy({{ $user->id }},this)" class="menu-link px-3">
                            <span class="me-2">
                                <i class="fas fa-trash"></i>
                            </span>
                            Delete
                        </a>

                    </div>
                </div>
            </td>

            <!--end::Actions-->
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="7" class="text-center">Not found data..</td>
    </tr>
@endif
