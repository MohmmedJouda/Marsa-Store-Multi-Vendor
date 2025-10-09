@extends('layout')
@section('routeButton', route('moderator.dashboard'))

@section('pageTitle', 'Vendors Show')
@section('subTitle', 'Vendors')
@section('currentTitle', 'Show')
@section('content')

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
            {{-- @foreach ($user->documents as $document)
            <div class="badge
                                            @if ($user->store->status == 'pending') badge-light-warning
                                            @elseif($user->store->status == 'approved') badge-light-success
                                            @elseif($user->store->status == 'rejected') badge-light-danger @endif>
                                                ">
                {{ $user->store->status }}
            </div>
            @endforeach --}}
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div id="kt_ecommerce_customer_addresses" class="card-body pt-0 pb-5">
            <div class="container">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Type document</th>
                                    <th>Extention Type</th>
                                    <th>Documents</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($user->documents as $document)
                                    <tr>
                                        <td>{{ $document->document_type }}</td>

                                        <td>{{ pathinfo($document->document_url, PATHINFO_EXTENSION)
                                                                                                                                                                                                                                        }}
                                        </td>
                                        <td>
                                            <a href="{{ asset('storage/' . $document->document_url) }}"
                                                class="btn btn-sm btn-light-info" target="_blank">
                                                <i class="fas fa-eye"></i> Show
                                            </a>

                                        </td>
                                        <td>
                                            @php
                                                $btnClass = match ($document->status) {
                                                    'pending' => 'btn-warning',
                                                    'approved' => 'btn-success',
                                                    'rejected' => 'btn-danger',
                                                    default => 'btn-secondary',
                                                };
                                            @endphp

                                            <div class="dropdown">
                                                <button class="btn btn-sm {{ $btnClass }} dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown">
                                                    {{ ucfirst($document->status) }}
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <form
                                                            action="{{ route('moderator.vendor-documents.updateStatus', $document->id) }}"
                                                            method="POST">
                                                            @csrf @method('PATCH')
                                                            <input type="hidden" name="status" value="pending">
                                                            <button type="submit" class="dropdown-item text-warning">
                                                                <i class="fas fa-clock"></i> Pending
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form
                                                            action="{{ route('moderator.vendor-documents.updateStatus', $document->id) }}"
                                                            method="POST">
                                                            @csrf @method('PATCH')
                                                            <input type="hidden" name="status" value="approved">
                                                            <button type="submit" class="dropdown-item text-success">
                                                                <i class="fas fa-check"></i> Approved
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form
                                                            action="{{ route('moderator.vendor-documents.updateStatus', $document->id) }}"
                                                            method="POST">
                                                            @csrf @method('PATCH')
                                                            <input type="hidden" name="status" value="rejected">
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="fas fa-times"></i> Rejected
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>

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

@endsection