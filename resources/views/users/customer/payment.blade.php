<!DOCTYPE html>
<html class="no-js" lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>الدفع </title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets2/images/favicon.svg') }}" />

    <!-- ========================= CSS here ========================= -->

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- AOS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <!-- Google Font: Tajawal -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="https://cdn.lineicons.com/3.0/lineicons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="{{asset('assets2/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets2/css/tiny-slider.css')}}" rel="stylesheet" />
    <link href="{{asset('assets2/css/main.css')}}" rel="stylesheet" />
    <link href="{{asset('style.css')}}" rel="stylesheet" />

</head>

<body>

    <header id="main-header" class="apple-header">
        <nav class="nav">
            <ul class="nav-list">
                <li class="logoheader"><a href="{{ route('customer.main-page')}}"><img src="{{ asset('img/logo.svg') }}"
                            class="apple-logo" /></a></li>
                <li><a href="#">السوق العام</a>
                    <div class="dropdown-menu">
                        <a href="product_page.html"> السوق العام & المنتجات</a>
                        <a href="product_page.html">آخر المنتجات المعروضة</a>
                        <a href="product_page.html">الأصناف الاعلى طلباَ</a>
                        <a href="product_page.html">مقترح لك</a>
                        <a href="product_page.html">عروض و تنزيلات</a>


                    </div>
                </li>
                <li>
                    <a href="{{ route('customer.stores.index') }}">المتاجر</a>
                </li>
                <li><a href="#">المنتجات</a>
                    <div class="dropdown-menu">
                        <a href="product_page.html">الكترونيات</a>
                        <a href="product_page.html"> موضة</a>
                        <a href="product_page.html">أدوات منزلية</a>
                        <a href="product_page.html">الجمال والعناية</a>
                        <a href="product_page.html">الكتب والقرطاسية</a>
                        <a href="product_page.html">الألعاب</a>
                        <a href="product_page.html">رياضة</a>
                        <a href="product_page.html">سيارات و مركبات</a>
                        <a href="product_page.html">مستلزمات صحية</a>
                        <a href="product_page.html"> إكسسورات & ساعات</a>
                        <a href="product_page.html">أخرى</a>
                    </div>
                </li>

                <!-- <li><a href="#">الدعم الفني</a></li> -->
                <li><a href="about-us.html">من نحن</a></li>

                <li class="search-bar">
                    <input type="text" placeholder="ابحث عن منتج...">
                </li>

                <div class="lefticons">
                    <li><a href="#"><i class="fa-solid fa-filter"></i></a>
                        <div class="dropdown-menu">
                            <a href="#">الصنف</a>
                            <a href="#">التقييم</a>
                            <a href="#">الأرخص</a>
                            <a href="#">الأجدد</a>
                        </div>
                    </li>
                    <li><a href="#"><i class="fa-solid fa-language"></i></a>
                        <div class="dropdown-menu">
                            <a href="#">English</a>
                            <a href="#">العربية</a>
                        </div>
                    </li>

                </div>


            </ul>
        </nav>
    </header>

    <div class="secondary-nav">
        <div class="left">
            <span class="site-name">مرساة | تسوق آمن مع اريحية الشراء المضمون</span>
        </div>



        <!-- أيقونة المستخدم -->
        <div class="centardiv" id="userIcon" role="button" aria-haspopup="true" aria-expanded="false"
            title="قائمة المستخدم">
            <i class="fa-solid fa-user"></i>
        </div>


        <div class="right">


            <i class="fa-solid fa-cart-shopping" id="cart-icon">

            </i>
        </div>

    </div>


    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs" lang="en" dir="rtl">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">صفحة الدفع</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('customer.main-page')}}"><i class="lni lni-home"></i> الرئيسية</a></li>
                        <li>الدفع</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!--====== Checkout Form Steps Part Start ======-->


    <section class="checkout-wrapper section" lang="en" dir="rtl">

        <div class="container">
            @if(session('success'))
                <div class="alert alert-success" role="alert" style="text-align: right">
                  ✅  {{ session('success') }} 
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

            <!-- ================= Shipping Option ================= -->


            <div class="row">


                {{-- <h6>معلومات الدفع</h6> --}}

                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table mt-30">
                            @php
                                $item = $items->first(); // أخذ أول عنصر فقط
                                $discount += ($item['price'] * $item['quantity'] * $productDiscount) / 100;
                            @endphp
                            <h4 class="title" style="text-align: right">{{ $item->variant->product->name }}</h4>
                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p>
                                        @foreach ($item->variant->attributeValues as $value)
                                            {{ $value->attribute->name }}: {{ $value->value }} <br>
                                        @endforeach
                                    </p>
                                    <p class="price">التشكيلة </p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">₪{{ $item->variant->price }}</p>
                                    <input type="hidden" name="price" value="{{ $item->variant->price }}">
                                    <p class="price" style="font-size: 13px">السعر للوحدة</p>
                                </div>

                                <div class="total-price shipping">
                                    <p class="value">{{  $item->quantity }}</p>
                                    <p class="price" style="font-size: 13px">الكمية المطلوبة</p>
                                </div>

                                <div class="total-price shipping">
                                    <p class="value" id="shipping-amount">₪{{  $order->shipping_amount }}</p>
                                    <p class="price" style="font-size: 13px"> تكاليف الشحن</p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">₪{{  $taxAmount }}</p>
                                    <p class="price" style="font-size: 13px">الضرائب</p>
                                </div>

                                @if($productDiscount > 0)
                                    <div class="total-price shipping">
                                        <p class="value">₪{{ $productDiscount }}</p>
                                        <p class="price" style="font-size: 13px">الخصم</p>
                                    </div>
                                @endif

                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value" style="color:rgb(17, 206, 0); font-weight: bold;font-size: 1.3rem">
                                        ₪{{ $total }}
                                    </p>
                                    <p class="price" style="color:rgb(17, 206, 0); font-size: 1.3rem">المجموع</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <section>
                            <div class="container" style="text-align: right">
                                <div class="card shadow-sm mb-4" style="border-radius: 12px; direction: rtl;">
                                    <div class="card-body">

                                    <div class="col-md-12">
                                                <div class="checkout-payment-option">
                                                    <div class="shipping-header">
                                                        <h5 class="payment-title"
                                                            style="color: black; font-weight: bold;">اختر طريقة الدفع
                                                        </h5>
                                                    </div>

                                                    <div class="payment-option-wrapper">

                                                        <div class="single-payment-option">
                                                            <input type="radio" id="pay_on_delivery"
                                                                name="payment_method" value="pay_on_delivery"
                                                            {{ $selectedMethod == 'cash_on_delivery' ? 'checked' : '' }}>
                                                            <label for="pay_on_delivery">
                                                                <p> الدفع عند التوصيل</p>
                                                            </label>
                                                        </div>

                                                        <div class="single-payment-option">
                                                        <input type="radio" id="bank_transfer" name="payment_method" value="bank_transfer"
                                                            {{ $selectedMethod == 'bank_transfer' ? 'checked' : '' }}>

                                                            <label for="bank_transfer">
                                                                <p> التحويل البنكي</p>
                                                            </label>
                                                        </div>

                                                        <div class="single-payment-option">
                                                            <input type="radio" id="stripe" name="payment_method"
                                                                value="credit_card"
                                                            {{ $selectedMethod == 'stripe' ? 'checked' : '' }}>
                                                            <label for="stripe">
                                                                <p>بطاقة ائتمان </p>
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <hr>

                                             <div id="on_delivery_pay_code" style="display:none;" class="on_delivery_pay-box">
                                                <p class="mb-3">يتم الدفع عند استلام الطلب, يرجى التأكد من توفر المبلغ اذا كنت تريد الدفع بالاموال النقدية</p>
                                                <form action="{{ route('customer.checkout.pay_on_delivery', $order->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">تأكيد الطلب</button>
                                                </form>
                                             </div>

                                            <div id="bank_transfer_code" style="display:none;" class="bank-transfer-box">
                                                <h4>تفاصيل التحويل البنكي</h4>

                                                <p><strong>المبلغ المطلوب:</strong> {{ number_format($order->total_amount,2) }} {{ strtoupper($order->currency) }}</p>

                                                <div class="bank-details">
                                                    <p><strong>البنك</strong>: <span id="bank-name">بنك فلسطين</span> <i class="fa-solid fa-copy btn-copy" data-copy="pay-ref"></i></p>
                                                    <p> <strong>اسم الحساب:</strong><span id="acc-name">نادر عبدالعليم فؤاد فارس</span> <i class="fa-solid fa-copy btn-copy" data-copy="pay-ref"></i></p>
                                                    <p><strong>(₪)IBAN:</strong> <span id="iban">PS46PALS044612840270993100000</span> <i class="fa-solid fa-copy btn-copy" data-copy="pay-ref"></i></p>
                                                    <p> <strong>SWIFT:</strong><span id="bic">PALSPS22</span> <i class="fa-solid fa-copy btn-copy" data-copy="pay-ref"></i></p>
                                                    <p> <strong>المرجع:</strong><strong id="pay-ref">{{ $paymentReference }}</strong> <i class="fa-solid fa-copy btn-copy" data-copy="pay-ref"></i></p>

                                                    {{-- QR (اختياري) --}}
                                                    <div id="bank-qr">
                                                        <img src="{{ asset('img/ibanqr.jpg') }}" alt="QR للدفع" width="300">
                                                    <p>امسح QR من تطبيق البنك لإتمام التحويل</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <form action="{{ route('customer.checkout.bank_transfer', $order->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                    <label>رقم العملية/Transaction ID (إن وجد)</label>
                                                    <input type="text" name="transaction_id" class="form-control" />
                                                    </div>

                                                    <div class="form-group mb-3">
                                                    <label>تحميل إيصال التحويل</label>
                                                    <input type="file" name="receipt" accept="image/*,.pdf" class="form-control" />
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">أرسل بيانات التحويل</button>
                                                </form>
                                            </div>

                                                <!-- اسم حامل البطاقة -->
                                        <div id="credit_card_code" style="display:none;">
                                            <form id="payment-form" method="POST" action="{{route('customer.checkout.credit_card', $order->id) }}">
                                              @csrf
                                                <div class="single-form form-default">
                                                    <label>اسم حامل البطاقة</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="name" placeholder="الاسم كامل">
                                                    </div>
                                                </div>

                                                <!-- البريد الإلكتروني -->
                                                <div class="single-form form-default">
                                                    <label>البريد الإلكتروني</label>
                                                    <div class="form-input form">
                                                        <input type="email" name="email"
                                                            placeholder="example@email.com">
                                                    </div>
                                                </div>

                                                <!-- Stripe Card Element -->
                                                <div class="single-form form-default">
                                                    <div id="card-errors" style="color:red; margin-top:10px;"></div>

                                                    <label>تفاصيل البطاقة</label>
                                                    <div id="card-element" class="form-input form"></div>
                                                    {{-- <div id="card-errors" role="alert"
                                                        style="color:red; margin-top:5px;"> --}}
                                                    </div>
                                                </div>

                                                <!-- بيانات الطلب (hidden inputs) -->
                                                <input type="hidden" name="variant_id" value="1">
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="shipping_method" value="standard">
                                                <!-- زر الدفع -->
                                                <div id="cc_code" class="single-form form-default button" style="display:none;">
                                                        <button type="submit" id="submit-button" class=" btn">دفع الآن</button>
                                                </div>
                                            </form>
                                        </div>
                                                



                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!--====== Checkout Form Steps Part Ends ======-->




    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo" style="margin-top: 10px;">
                                <a href="index.html">
                                    <img src="{{ asset('assets2/images/logo/logo.svg') }}" alt="#">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="footer-newsletter">
                                <h4 class="title" style="  float: none !important;
                                    text-align: center !important;
                                    margin-left: -450px;
                                    margin-right: auto;
                                    margin-top: 30px;
                                    margin-bottom: -55px;
                                    ">
                                    اشترك في نشرتنا الإخبارية
                                    <span>واحصل على أحدث المعلومات والتخفيضات والعروض</span>
                                </h4>
                                <div class="newsletter-form-head">
                                    <form action="#" method="get" target="_blank" class="newsletter-form">
                                        <input name="EMAIL" placeholder="Email address here..." type="email">
                                        <div class="button">
                                            <button class="btn">اشتراك<span class="dir-part"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <!-- Start Footer Middle -->
        <div class="footer-middle" dir="ltr">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>تواصل معنا</h3>
                                <p class="phone">Phone: +970 59 5570612</p>
                                <ul>
                                    <li><span>الاحد-الخميس: </span> 9.00 am - 8.00 pm</li>
                                    <li><span>السبت: </span> 10.00 am - 6.00 pm</li>
                                </ul>
                                <p class="mail">
                                    <a href="mailto:support@shopgrids.com">support@shopgrids.com</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer our-app">
                                <h3>تطبيقاتنا</h3>
                                <ul class="app-btn">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-apple"></i>
                                            <span class="small-title">Not available now</span>
                                            <span class="big-title">App Store</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-play-store"></i>
                                            <span class="small-title">Not available now</span>
                                            <span class="big-title">Google Play</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>معلومات</h3>
                                <ul>
                                    <li><a href="about-us.html">من نحن</a></li>
                                    <li><a href="{{ route('customer.contact') }}">تواصل معنا</a></li>
                                    <li><a href="{{ route('customer.faq') }}">أسئلة شائعة</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3> أقسام المتجر الأساسية</h3>
                                <ul>
                                    <li><a href="product_page.html">الكترونيات</a></li>
                                    <li><a href="product_page.html">موضة</a></li>
                                    <li><a href="product_page.html">الجمال و العناية</a></li>
                                    <li><a href="product_page.html">الألعاب</a></li>
                                    <li><a href="product_page.html">رياضة</a></li>
                                    <li><a href="product_page.html">سيارات و مركبات</a></li>
                                    <li><a href="product_page.html">إكسسورات & ساعات</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom" dir="ltr">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="payment-gateway">
                                <span>We Accept:</span>
                                <img src="{{ asset('assets2/images/footer/credit-cards-footer.png') }}" alt="#">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="copyright">
                                <p>Designed and Developed by<a href="https://graygrids.com/" rel="nofollow"
                                        target="_blank">WIC std</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>Follow Us On:</span>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>

                                <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->




    <div id="customModal" class="modal-overlay">
        <div class="modal-box">
            <button class="close-btn" onclick="closeModal()">✖</button>
            <div class="modal-content">
                <h2>تسجيل الدخول</h2>
                <form>
                    <label for="email">البريد الإلكتروني</label>
                    <input type="email" id="email" placeholder="example@email.com" required>

                    <label for="password">كلمة المرور</label>
                    <input type="password" id="password" placeholder="••••••••" required>

                    <button type="submit" class="submit-btn">دخول</button>
                    <p class="link"><a href="#">نسيت كلمة المرور؟</a></p>

                    <div class="or-divider">أو</div>

                    <button class="google-btn">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Logo">
                        التسجيل عبر Google
                    </button>

                </form>
            </div>
        </div>
    </div>



    <!-- سلة جانبية -->
    <div id="cart-panel" class="cart-panel" style="display:none;">
        <button class="close-panel" id="close-cart">&times;</button>
        <h3>سلة المشتريات</h3>
        <div id="cart-items" class="cart-items"></div>

        <div class="cart-footer">
            <div>
                <input type="checkbox" id="select-all"> <label for="select-all">تحديد الكل</label>
            </div>
            <div class="total">المجموع: ₪<span id="cart-total">0.00</span></div>
            <div class="cart-actions">
                <button id="buy-selected">شراء الآن</button>
                <button id="delete-selected">حذف المحدد</button>
            </div>
        </div>
    </div>


    <script src="{{asset('assets2/js/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets2/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets2/js/main.js')}}"></script>
    <script src="{{asset('assets2/js/jsmain.js')}}"></script>
    <script src="{{asset('assets2/js/js/tiny-slider.js')}}"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init();</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>





    <script>
document.addEventListener("DOMContentLoaded", function() {
    console.log("DOM loaded — stripe init");

    const stripe = Stripe("{{ config('services.stripe.key') }}"); // تأكد من وجود المفتاح العام
    console.log("Stripe public key:", "{{ config('services.stripe.key') }}");

    const elements = stripe.elements();
    const cardElement = elements.create("card");
    cardElement.mount("#card-element");

    const form = document.getElementById("payment-form");
    const submitButton = document.getElementById("submit-button");

    if (!form) {
        console.error("payment-form not found in DOM");
        return;
    }

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        console.log("🚀 submit clicked");
        submitButton.disabled = true;
        document.getElementById("card-errors").textContent = "";

        // جمع القيم
        const name = form.querySelector("[name='name']")?.value || '';
        const email = form.querySelector("[name='email']")?.value || '';
        const variantId = form.querySelector("[name='variant_id']")?.value || '';
        const quantity = form.querySelector("[name='quantity']")?.value || '';
        const shippingMethod = form.querySelector("[name='shipping_method']")?.value || '';

        try {
            // ********** ملاحظة مهمة: تأكد أن اسم الراوت صحيح هنا **********
            const fetchUrl = "{{ route('customer.checkout.credit_card', $order->id ?? 0) }}"; // <-- استخدام اسم الراوت الصحيح
            console.log("Posting to:", fetchUrl);

            const response = await fetch(fetchUrl, {
                method: "POST",
                credentials: "same-origin", // ← مهم جداً لإرسال الكوكيز (session و csrf)
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    variant_id: variantId,
                    quantity: quantity,
                    shipping_method: shippingMethod,
                    email: email
                })
            });

            console.log("Fetch response status:", response.status, response.statusText);

            // لو الرد ليس OK حاول أن تطبع النص لتشخيص المشكلة
            if (!response.ok) {
                const text = await response.text();
                console.error("Non-OK response body:", text);
                document.getElementById("card-errors").textContent = "خطأ من السيرفر: " + response.status;
                submitButton.disabled = false;
                return;
            }

            const data = await response.json().catch(async err => {
                const text = await response.text();
                console.error("Invalid JSON response:", text);
                throw err;
            });

            console.log("Server response JSON:", data);

            if (!data.clientSecret) {
                throw new Error("لم يتم إرجاع clientSecret من السيرفر");
            }

            // تنفيذ الدفع عبر Stripe
            const { paymentIntent, error } = await stripe.confirmCardPayment(data.clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: { name: name, email: email }
                }
            });

            if (error) {
                console.error("Stripe error:", error);
                document.getElementById("card-errors").textContent = error.message || "خطأ أثناء الدفع";
                submitButton.disabled = false;
                return;
            }

            if (paymentIntent.status === "succeeded") {
                // تحديث حالة الطلب بعد نجاح الدفع
                await fetch("{{ route('customer.checkout.update_status', $order->id) }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                });

                // توجيه المستخدم لصفحة الطلبات مع رسالة نجاح
                window.location.href = "{{ route('customer.orders.show') }}?success=1";
            }


            // أي حالة أخرى
            console.log("PaymentIntent status:", paymentIntent && paymentIntent.status);
            submitButton.disabled = false;

        } catch (err) {
            console.error("Caught error:", err);
            document.getElementById("card-errors").textContent = err.message || "حدث خطأ غير متوقع";
            submitButton.disabled = false;
        }
    });
});

        document.addEventListener('DOMContentLoaded', function () {
            const userIcon = document.getElementById('userIcon');
            const dropdown = document.getElementById('userDropdown');

            if (!userIcon || !dropdown) {
                console.warn('userIcon or userDropdown element not found. تأكد من وجود العنصرين ومعرفاتهما id="userIcon" و id="userDropdown".');
                return;
            }

            // تأكد أن الـ dropdown طفل مباشر للـ body حتى لا يتأثر بـ overflow/transform من والدين آخرين
            if (dropdown.parentElement !== document.body) {
                document.body.appendChild(dropdown);
            }
        

            // إعدادات أولية
            dropdown.style.position = 'absolute';
            dropdown.style.display = 'none';
            dropdown.style.zIndex = 9999;

            function positionDropdown() {
                // نظهر مؤقتاً مخفياً لقياس الأبعاد بدون فلاش
                dropdown.style.display = 'block';
                dropdown.style.visibility = 'hidden';
                dropdown.classList.add('open'); // يضيف أي ستايل عرض لو حاطه
                const iconRect = userIcon.getBoundingClientRect();
                const ddRect = dropdown.getBoundingClientRect();
                const gap = 8; // مسافة بين الأيقونة والقائمة

                // محاذاة يمين القائمة مع يمين الأيقونة (مناسب للـ RTL)
                let left = window.scrollX + iconRect.right - ddRect.width;
                let top = window.scrollY + iconRect.bottom + gap;

                const margin = 8;
                if (left < margin) left = margin;
                if (left + ddRect.width > window.innerWidth - margin) left = window.innerWidth - ddRect.width - margin;

                // إذا ما فيه مساحة تحت، اعرض فوق الأيقونة
                if (top + ddRect.height > window.scrollY + window.innerHeight - margin) {
                    top = window.scrollY + iconRect.top - ddRect.height - gap;
                }

                dropdown.style.left = Math.round(left) + 'px';
                dropdown.style.top = Math.round(top) + 'px';

                // أظهر بشكل نهائي
                dropdown.style.visibility = 'visible';
            }

            function openDropdown() {
                positionDropdown();
                dropdown.classList.add('open');
                userIcon.setAttribute('aria-expanded', 'true');
                dropdown.setAttribute('aria-hidden', 'false');

                window.addEventListener('resize', positionDropdown);
                window.addEventListener('scroll', positionDropdown, true);
            }

            function closeDropdown() {
                dropdown.classList.remove('open');
                dropdown.style.display = 'none';
                userIcon.setAttribute('aria-expanded', 'false');
                dropdown.setAttribute('aria-hidden', 'true');

                window.removeEventListener('resize', positionDropdown);
                window.removeEventListener('scroll', positionDropdown, true);
            }

            userIcon.addEventListener('click', function (e) {
                e.stopPropagation();
                if (dropdown.classList.contains('open')) closeDropdown();
                else openDropdown();
            });

            // غلق عند النقر خارج القائمة أو عند الضغط على Esc
            document.addEventListener('click', function (e) {
                if (!dropdown.contains(e.target) && !userIcon.contains(e.target)) {
                    closeDropdown();
                }
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') closeDropdown();
            });

        });



        document.addEventListener("DOMContentLoaded", function () {
            const saveContinueBtn = document.querySelector('button.btn.btn-alt') || document.querySelector('a.btn.btn-alt');
            const paymentOptions = document.querySelectorAll('input[name="payment_method"]');

            function updateRadioBorders() {
                paymentOptions.forEach(option => {
                    const container = option.closest('.single-payment-option');
                    if (!container) return;
                    if (option.checked) {
                        container.classList.add('selectedMethod');
                    } else {
                        container.classList.remove('selectedMethod');
                    }
                });
            }

            // عند تغيير أي خيار
            paymentOptions.forEach(option => {
                option.addEventListener("change", function () {
                    updateShippingAmount();
                    updateRadioBorders();
                });
            });


            const defaultOption = document.querySelector('input[name="payment_method"]:checked')
                || document.querySelector('input[name="payment_method"]');
            if (defaultOption) defaultOption.checked = true;


            function updatePaymentCodes() {
            const creditCardDiv = document.getElementById('credit_card_code');
            const bankTransferDiv = document.getElementById('bank_transfer_code');
            const onDeliveryPayferDiv = document.getElementById('on_delivery_pay_code');
            const ccbtn = document.getElementById('cc_code');

            

            const selected = document.querySelector('input[name="payment_method"]:checked').value;

            creditCardDiv.style.display = selected === 'credit_card' ? 'block' : 'none';
            bankTransferDiv.style.display = selected === 'bank_transfer' ? 'block' : 'none';
            onDeliveryPayferDiv.style.display = selected === 'pay_on_delivery' ? 'block' : 'none';
            ccbtn.style.display = selected === 'credit_card' ? 'block' : 'none';
            }


            paymentOptions.forEach(option => {
            option.addEventListener("change", function () {
                        updateRadioBorders();
                        updatePaymentCodes();
                    });
                });
            updatePaymentCodes();

            });


            document.querySelectorAll('.btn-copy').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.getAttribute('data-copy');
                const text = document.getElementById(id).innerText.trim();
                navigator.clipboard.writeText(text).then(() => {
                btn.innerText = 'تم النسخ';
                setTimeout(()=> btn.innerText = 'نسخ', 1500);
                });
            });
            });

        

    </script>

    <div id="userDropdown" class="user-dropdown" role="menu" aria-hidden="true">
        <div class="user-header d-flex align-items-center px-3 py-2 mb-2">
            <i class="fa-solid fa-user fa-lg me-2"></i>
            <span class="username">{{ $username ?? 'Guest' }}</span>
        </div>

        <hr class="dropdown-divider" style="margin:0; border-color: rgba(255,255,255,0.1)">
        <a class="user-item" href="{{ route('profile.show') }}">
            <i class="fa-solid fa-user-pen"></i>&nbsp;الملف الشخصي
        </a>
        <a class="user-item" href="{{ route('customer.orders.show') }}">
            <i class="fa-solid fa-box fa-lg me-2"></i>&nbsp; طلباتك
        </a>
        <a class="user-item" href="#">
            <i class="fa-solid fa-gear"></i>&nbsp;الإعدادات
        </a>

        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button type="submit" class="user-item text-danger"
                style="border:none; background:transparent; width:100%; text-align:right;">
                <i class="fa-solid fa-right-from-bracket"></i>&nbsp;خروج
            </button>
        </form>
    </div>

</body>

</html>