@extends('layout')
@section('routeButton', route('moderator.dashboard'))

@section('content')
  <!--begin::Content-->
  <h1 style="margin-right: 50px">مدير</h1>
  <div class="dashboard-container" style="
                                                              display: grid;
                                                              grid-template-columns: repeat(2, 250px); /* كل مربع 250px */
                                                              gap: 15px; /* المسافة بين المربعات */
                                                              justify-content: center; /* لتوسيط المجموعتين في الصفحة */
                                                              padding: 20px;
                                                          ">
    <!-- المربع الأول -->
    <div class="card" style="
                                                                  background: white;
                                                                  border-radius: 15px;
                                                                  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                                                                  display: flex;
                                                                  flex-direction: column;
                                                                  align-items: center;
                                                                  justify-content: center;
                                                                  aspect-ratio: 1 / 1; /* مربعات حقيقية */
                                                                  text-align: center;
                                                                  padding: 20px;
                                                              ">

      <a href="{{ route('moderator.users.byRole', 'vendor') }} "
        class="menu-icon bg-white rounded-xl shadow-lg hover:shadow-xl transition p-6" style="margin-bottom: 10px;">
        <span class="menu-icon">
          <i class="fas fa-users"></i>

        </span>
        <span class="menu-title" style="font-size: 1.2rem; font-weight: bold; color: #008fee">طلبات التجار</span>
      </a>
    </div>

    <!-- المربع الثاني -->
    <div class="card" style="
                                                                  background: white;
                                                                  border-radius: 15px;
                                                                  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                                                                  display: flex;
                                                                  flex-direction: column;
                                                                  align-items: center;
                                                                  justify-content: center;
                                                                  aspect-ratio: 1 / 1;
                                                                  text-align: center;
                                                                  padding: 20px;
                                                              ">

      <a href="{{ route('moderator.orders') }}"
        class="menu-link flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition">
        <span class="menu-icon mb-4 text-4xl text-blue-500">
          <i class="fas fa-file-invoice"></i>

        </span>
        <span class="menu-title text-lg font-bold text-center"
          style="font-size: 1.2rem; font-weight: bold; color: #008fee"> الطلبات</span>
      </a>
    </div>

    <!-- المربع الثالث -->
    <div class="card" style="
                                                                  background: white;
                                                                  border-radius: 15px;
                                                                  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                                                                  display: flex;
                                                                  flex-direction: column;
                                                                  align-items: center;
                                                                  justify-content: center;
                                                                  aspect-ratio: 1 / 1;
                                                                  text-align: center;
                                                                  padding: 20px;
                                                              ">

      <a href="{{ route('moderator.feedbacks') }}"
        class="menu-link flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition">
        <span class="menu-icon mb-4 text-4xl text-blue-500">
          <i class="fas fa-envelope"></i>

        </span>
        <span class="menu-title text-lg font-bold text-center"
          style="font-size: 1.2rem; font-weight: bold; color: #008fee">رسائل الزبائن</span>
      </a>

    </div>

    <!-- المربع الرابع -->
    <div class="card" style="
                                                                  background: white;
                                                                  border-radius: 15px;
                                                                  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                                                                  display: flex;
                                                                  flex-direction: column;
                                                                  align-items: center;
                                                                  justify-content: center;
                                                                  aspect-ratio: 1 / 1;
                                                                  text-align: center;
                                                                  padding: 20px;
                                                              ">
      <a href="{{ route('moderator.orders.bankTransfers') }}"
        class="menu-link flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition">
        <span class="menu-icon mb-4 text-4xl text-blue-500">
          <i class="fas fa-university"></i>
        </span>
        <span class="menu-title text-lg font-bold text-center"
          style="font-size: 1.2rem; font-weight: bold; color: #008fee">التحويلات البنكية</span>
      </a>

    </div>

  </div>

  <!--end::Content-->
@endsection
@section('script')
  <script src="assets/js/custom/apps/ecommerce/customers/listing/listing.js"></script>
  <script src="assets/js/custom/apps/ecommerce/customers/listing/add.js"></script>
  <script src="assets/js/custom/apps/ecommerce/customers/listing/export.js"></script>
@endsection