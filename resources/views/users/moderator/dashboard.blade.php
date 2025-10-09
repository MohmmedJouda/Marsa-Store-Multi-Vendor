@extends('layout')
@section('routeButton', route('moderator.dashboard'))

@section('content')
  <!--begin::Content-->
  <h1 style="margin-right: 50px">مدير</h1>
  <!--end::Content-->
@endsection
@section('script')
  <script src="assets/js/custom/apps/ecommerce/customers/listing/listing.js"></script>
  <script src="assets/js/custom/apps/ecommerce/customers/listing/add.js"></script>
  <script src="assets/js/custom/apps/ecommerce/customers/listing/export.js"></script>
@endsection