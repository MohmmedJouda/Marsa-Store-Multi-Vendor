<!DOCTYPE html>
<html  lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>صفحة الدفع </title>
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
                        <h1 class="page-title">الدفع</h1>
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



    {{-- ======================================================= --}}

    <section class="checkout-wrapper section" style="text-align: right; direction: rtl;" lang="en" dir="rtl">

        <div class="container">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">

                        <section>
    <div class="container">
        <div class="card shadow-sm mb-4" style="border-radius: 12px; direction: rtl;">
            <div class="card-body">
                <form method="POST" action="{{ route('customer.address.store') }}">
                    @csrf

                    <!-- ================= Shipping Option ================= -->
                                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="checkout-payment-option">
                                            <div class="shipping-header">
                                                <h5 class="payment-title" style="color: black; font-weight: bold;">اختر خيارالتوصيل</h5>
                                                <h6>
                                                    <a href="#" style="font-size:11px; color: rgb(0, 81, 255);text-decoration: underline;">
                                                        اعرف أكثر عن خطط الشحن
                                                    </a>
                                                </h6>
                                            </div>

                                            <div class="payment-option-wrapper">

                                                <div class="single-payment-option">
                                                    <input type="radio" id="shipping_free" name="shipping_method"
                                                        value="free" data-price="0.00" {{ $selectedShipping == 'free' ? 'checked' : '' }}>
                                                    <label for="shipping_free">

                                                                                                                   <p>الشحن المجاني</p>
                                                        <span class="price">₪0</span>
                                                    </label>
                                                </div>

                                                <div class="single-payment-option">
                                                    <input type="radio" id="shipping_standard" name="shipping_method"
                                                        value="standard" data-price="15" {{ $selectedShipping == 'standard' ? 'checked' : '' }}>
                                                    <label for="shipping_standard">
                                                        <p>الشحن العادي</p>

                                                                                                                   <span class="price">15₪</span>
                                                    </label>
                                                </div>

                                                <div class="single-payment-option">
                                                    <input type="radio" id="shipping_express" name="shipping_method"
                                                        value="express" data-price="30" {{ $selectedShipping == 'express' ? 'checked' : '' }}>
                                                    <label for="shipping_express">
                                                        <p>الشحن السريع</p>
                                                        <span class="price">30₪</span>

                                                                                                               </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                    <hr>
                                    <h5 class=" payment-title" style="color: black; font-weight: bold;">معلوماتك الشخصية </h5>
                                        <div class="steps-form-btn button" style="text-align: right; margin-bottom:-20px">

                                        </div>
                                        <input type="hidden" name="variant_id" value="{{ request('variant_id') }}">
                                        <input type="hidden" name="qty" id="qtyInput" value="{{ request('qty', 1) }}">
                                    </div>
                                </div>


                    <!-- ================= Personal Details ================= -->
                    <div>

                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label>الاسم الأول</label>
                                <input type="text" name="first_name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>الاسم الأخير</label>
                                <input type="text" name="last_name" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label>البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control" style="text-align: left;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>رقم الهاتف</label>
                                <input type="number" name="phone_number" class="form-control" placeholder="/05" style="text-align: left;">
                            </div>
                        </div>
                    </div>
<hr>
                                    <h5 class=" payment-title mb-3" style="color: black; font-weight: bold;"> عنوان التوصيل  </h5>

                    <!-- ================= Address Details ================= -->
                    <div class="mb-4">
                        <p class="text-danger fw-bold text-decoration-underline mb-3" style="text-align: right;">
                            يرجى ادخال المعلومات الخاصة بالعنوان الذي تريد استلام الطلب منه
                        </p>

                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label>المحافظة / المنطقة</label>
                                <select class="form-control" name="state" required>
                                    <option value="0">اختر</option>
                                    <option value="gaza">قطاع غزة</option>
                                    <option value="westbank">الضفة الغربية</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>المدينة</label>
                                <input type="text" name="city" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label>العنوان بالتفصيل داخل المدينة</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>الرمز البريدي</label>
                                <input type="number" name="postal_code" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">الخطوة التالية</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>


                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table mt-30">
                            <h4 class=" title" >{{ $variant->product->name }}</h4>
                            <div class="sub-total-price">
                                <div class="total-price">
                                <p class="price">التشكيلة </p>

                                    <p>
                                        @foreach ($variant->attributeValues as $value)
                                            {{ $value->attribute->name }}: {{ $value->value }} <br>
                                        @endforeach
                                </p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="price" style="font-size: 13px">السعر للوحدة</p>

                                    <p class=" value">₪{{ $variant->price }}</p>
                                </div>

                                <div class="total-price shipping">
                                    <p class="price" style="font-size: 13px">الكمية المطلوبة</p>

                                    <p class="value">{{ $qty }}</p>
                                </div>

                                <div class="total-price shipping">
                                    <p class="price" style="font-size: 13px"> تكاليف الشحن</p>

                                    <p class="value" id="shipping-amount">₪{{ $shippingAmount }}</p>
                                </div>

                                <div class="total-price shipping">
                                    <p class="price" style="font-size: 13px">الضرائب</p>

                                    <p class=" value">₪{{ $taxAmount }}</p>
                                </div>
                                @if($discountAmount > 0)
                                    <div class="total-price shipping">
                                        <p class="price" style="font-size: 13px">الخصم</p>

                                        <p class=" value">₪{{ $discountAmount }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="price" style="color:rgb(17, 206, 0); font-size: 1.3rem">المجموع</p>

                                    <p class="value" style="color:rgb(17, 206, 0); font-weight: bold;font-size: 1.3rem">
                                        ₪{{ $totalPriceAfterDiscount + $shippingAmount + $taxAmount }}
                                    </p>
                                </div>
                            </div>

                        </div>
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
                                    <img src=" {{ asset('assets2/images/logo/logo.svg') }}" alt="#">
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
    <script src=" {{asset('assets2/js/jsmain.js')}}"></script>
    <script src="{{asset('assets2/js/js/tiny-slider.js')}}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init();</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>


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



        const stripe = Stripe('{{ config("services.stripe.key") }}'); // مفتاح public
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const form = document.getElementById('payment-form');
        const submitButton = document.getElementById('submit-button');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            submitButton.disabled = true;

            // 1️⃣ نطلب client_secret من السيرفر
            const response = await fetch("{{ route('customer.checkout.process') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    variant_id: form.querySelector('[name="variant_id"]').value,
                    quantity: form.querySelector('[name="quantity"]').value,
                    shipping_method: form.querySelector('[name="shipping_method"]').value,
                    email: form.querySelector('[name="email"]').value
                })
            });

            const data = await response.json();
            const clientSecret = data.clientSecret;

            // 2️⃣ تنفيذ الدفع
            const { paymentIntent, error } = await stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: form.querySelector('[name="first_name"]').value + ' ' + form.querySelector('[name="last_name"]').value,
                        email: form.querySelector('[name="email"]').value
                    }
                }
            });

            if (error) {
                document.getElementById('card-errors').textContent = error.message;
                submitButton.disabled = false;
            } else {
                if (paymentIntent.status === 'succeeded') {
                    // الدفع تم بنجاح، إعادة التوجيه إلى صفحة النجاح
                    window.location.href = "/checkout/success/" + paymentIntent.metadata.order_id;
                }
            }
        });






        document.addEventListener("DOMContentLoaded", function () {
            const saveContinueBtn = document.querySelector('button.btn.btn-alt') || document.querySelector('a.btn.btn-alt');
            const shippingOptions = document.querySelectorAll('input[name="shipping_method"]');
            const shippingAmountElement = document.getElementById("shipping-amount");

            function updateShippingAmount() {
                const selectedOption = document.querySelector('input[name="shipping_method"]:checked');
                if (!selectedOption) return;
                const price = selectedOption.getAttribute("data-price");
                shippingAmountElement.textContent = `$${parseFloat(price).toFixed(2)}`;
            }

            function updateRadioBorders() {
                shippingOptions.forEach(option => {
                    const container = option.closest('.single-payment-option');
                    if (!container) return;
                    if (option.checked) {
                        container.classList.add('selected-shipping');
                    } else {
                        container.classList.remove('selected-shipping');
                    }
                });
            }

            // عند تغيير أي خيار
            shippingOptions.forEach(option => {
                option.addEventListener("change", function () {
                    updateShippingAmount();
                    updateRadioBorders();
                });
            });

            // عند الضغط على زر Save & Continue
            if (saveContinueBtn) {
                saveContinueBtn.addEventListener('click', function () {
                    const selectedShipping = document.querySelector('input[name="shipping_method"]:checked');
                    if (!selectedShipping) return;
                    console.log("تم اختيار الشحن:", selectedShipping.value);
                    console.log("السعر:", selectedShipping.getAttribute('data-price'));
                    updateRadioBorders();
                });
            }

            const defaultOption = document.querySelector('input[name="shipping_method"]:checked')
                || document.querySelector('input[name="shipping_method"]');
            if (defaultOption) defaultOption.checked = true;

            // تحديث عند تحميل الصفحة أول مرة2
            updateShippingAmount();
            updateRadioBorders();
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