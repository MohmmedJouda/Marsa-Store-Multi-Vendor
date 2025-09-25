<!DOCTYPE html>
<html class="no-js" lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Checkout </title>
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
                <li><a href="#">البائعين</a>
                    <div class="dropdown-menu">
                        <a href="merchant.html">الأكثر مبيعًا</a>
                        <a href="merchant.html">الأعلى تقييماَ</a>
                        <a href="merchant.html">جدد</a>

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

        <div class="centardiv" onclick="openModal()">
            <i class="fa-solid fa-user"></i>
        </div>

        <div class="right">
            <i class="fa-solid fa-heart" id="fav-icon">
                <span class="badge" id="fav-count">0</span>
            </i>

            <i class="fa-solid fa-cart-shopping" id="cart-icon">
                <span class="badge" id="cart-count">0</span>
            </i>
        </div>

    </div>


    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs" lang="en" dir="rtl">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('customer.main-page')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!--====== Checkout Form Steps Part Start ======-->

    {{-- <section class="checkout-wrapper section" lang="en" dir="rtl">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">

                        <!-- ✅ Form مخصص للدفع مع Stripe -->
                        <form id="payment-form">
                            @csrf
                            <ul id="accordionExample">
                                <!-- ================= Personal Details ================= -->
                                <li>
                                    <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                                    <section class="checkout-steps-form-content collapse show" id="collapseThree">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>User Name</label>
                                                    <div class="row">
                                                        <div class="col-md-6 form-input form">
                                                            <input type="text" name="first_name"
                                                                placeholder="First Name" required>
                                                        </div>
                                                        <div class="col-md-6 form-input form">
                                                            <input type="text" name="last_name" placeholder="Last Name"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        <input type="email" name="email" placeholder="Email Address"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="phone" placeholder="Phone Number"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Mailing Address</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="address" placeholder="Mailing Address"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>City</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="city" placeholder="City" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Post Code</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="postal_code" placeholder="Post Code">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Country</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="country" placeholder="Country"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Region/State</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="state" placeholder="Region/State">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>

                                <!-- ================= Shipping Option ================= -->
                                <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">Shipping Address</h6>
                                    <section class="checkout-steps-form-content collapse" id="collapseFour">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="checkout-payment-option">
                                                    <h6 class="heading-6 font-weight-400 payment-title">Select Delivery
                                                        Option</h6>
                                                    <div class="payment-option-wrapper">
                                                        <div class="single-payment-option">
                                                            <input type="radio" name="shipping_method" value="standard"
                                                                checked data-price="10.50">
                                                            <label>
                                                                <p>Standard Shipping</p>
                                                                <span class="price">$10.50</span>
                                                            </label>
                                                        </div>
                                                        <div class="single-payment-option">
                                                            <input type="radio" name="shipping_method" value="express"
                                                                data-price="20.00">
                                                            <label>
                                                                <p>Express Shipping</p>
                                                                <span class="price">$20.00</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>

                                <!-- ================= Payment Info ================= -->
                                <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                        aria-expanded="false" aria-controls="collapsefive">Payment Info</h6>
                                    <section class="checkout-steps-form-content collapse" id="collapsefive">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="checkout-payment-form">
                                                    <!-- ✅ Stripe Card Element -->
                                                    <label>Credit or Debit Card</label>
                                                    <div id="card-element" class="form-input form"></div>
                                                    <div id="card-errors" role="alert"
                                                        style="color:red;margin-top:5px;"></div>
                                                    <div class="single-form form-default button mt-3">
                                                        <button type="submit" class="btn" id="submit-button">Pay
                                                            Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                            </ul>

                            <!-- قيم مخفية -->
                            <input type="hidden" name="variant_id" value="{{ request('variant_id') }}">
                            <input type="hidden" name="quantity" value="{{ request('qty', 1) }}">
                        </form>

                    </div>
                </div>

                <!-- ================= Sidebar ================= -->
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table mt-30">
                            <h4 class="title">{{ $variant->product->name }}</h4>
                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p>
                                        @foreach ($variant->attributeValues as $value)
                                        {{ $value->attribute->name }}: {{ $value->value }} <br>
                                        @endforeach
                                    </p>
                                    <p class="price">التشكيلة </p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">${{ $variant->price }}</p>
                                    <p class="price" style="font-size: 13px">السعر للوحدة</p>
                                </div>

                                <div class="total-price shipping">
                                    <p class="value">{{ $qty }}</p>
                                    <p class="price" style="font-size: 13px">الكمية المطلوبة</p>
                                </div>

                                <div class="total-price shipping">
                                    <p class="value" id="shipping-amount">${{ $shippingAmount }}</p>
                                    <p class="price" style="font-size: 13px"> تكاليف الشحن</p>
                                </div>

                                <div class="total-price shipping">
                                    <p class="value">${{ $taxAmount }}</p>
                                    <p class="price" style="font-size: 13px">الضرائب</p>
                                </div>

                                @if($discountAmount > 0)
                                <div class="total-price shipping">
                                    <p class="value">${{ $discountAmount }}</p>
                                    <p class="price" style="font-size: 13px">الخصم</p>
                                </div>
                                @endif
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value" style="color:rgb(17, 206, 0); font-weight: bold;font-size: 1.3rem">
                                        ${{ $totalPriceAfterDiscount + $shippingAmount + $taxAmount }}
                                    </p>
                                    <p class="price" style="color:rgb(17, 206, 0); font-size: 1.3rem">المجموع</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stripe.js -->
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            const stripe = Stripe('{{ config("services.stripe.key") }}');
            const elements = stripe.elements();
            const cardElement = elements.create('card');
            cardElement.mount('#card-element');

            const form = document.getElementById('payment-form');
            const submitButton = document.getElementById('submit-button');

            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                submitButton.disabled = true;

                // إرسال البيانات لإنشاء PaymentIntent
                const response = await fetch("{{ route('customer.checkout.process') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        variant_id: form.querySelector('[name="variant_id"]').value,
                        quantity: form.querySelector('[name="quantity"]').value,
                        shipping_method: form.querySelector('[name="shipping_method"]:checked').value,
                        email: form.querySelector('[name="email"]').value
                    })
                });

                const data = await response.json();
                const clientSecret = data.clientSecret;

                // تنفيذ الدفع
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
                } else if (paymentIntent.status === 'succeeded') {
                    window.location.href = "/checkout/success/" + paymentIntent.metadata.order_id;
                }
            });
        </script>
    </section> --}}



    {{-- ======================================================= --}}

    <section class="checkout-wrapper section" lang="en" dir="rtl">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <form id="payment-form">
                            @csrf
                            <ul id="accordionExample">
                                <!-- ================= Personal Details ================= -->
                                <li>
                                    <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                                    <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>User Name</label>
                                                    <div class="row">
                                                        <div class="col-md-6 form-input form">
                                                            <input type="text" placeholder="First Name">
                                                        </div>
                                                        <div class="col-md-6 form-input form">
                                                            <input type="text" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        <input type="text" placeholder="Email Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label>
                                                    <div class="form-input form">
                                                        <input type="text" placeholder="Phone Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Mailing Address</label>
                                                    <div class="form-input form">
                                                        <input type="text" placeholder="Mailing Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>City</label>
                                                    <div class="form-input form">
                                                        <input type="text" placeholder="City">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Post Code</label>
                                                    <div class="form-input form">
                                                        <input type="text" placeholder="Post Code">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Country</label>
                                                    <div class="form-input form">
                                                        <input type="text" placeholder="Country">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Region/State</label>
                                                    <div class="select-items">
                                                        <select class="form-control">
                                                            <option value="0">select</option>
                                                            <option value="1">select option 01</option>
                                                            <option value="2">select option 02</option>
                                                            <option value="3">select option 03</option>
                                                            <option value="4">select option 04</option>
                                                            <option value="5">select option 05</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-checkbox checkbox-style-3">
                                                    <input type="checkbox" id="checkbox-3">
                                                    <label for="checkbox-3"><span></span></label>
                                                    <p>My delivery and mailing addresses are the same.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button class="btn" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFour" aria-expanded="false"
                                                        aria-controls="collapseFour">next
                                                        step</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                                <!-- ================= Shipping Option ================= -->
                                <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">Shipping Plan</h6>
                                    <section class="checkout-steps-form-content collapse" id="collapseFour"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="row">








                                            <div class="col-md-12">
                                                <div class="checkout-payment-option">
                                                    <div class="shipping-header">
                                                        <h6 class="heading-6 font-weight-400 payment-title">Select
                                                            Delivery Option</h6>
                                                        <h6><a href="#"
                                                                style="font-size:14px; color: rgb(0, 81, 255);">اعرف
                                                                أكثر عن خطط
                                                                الشحن</a></h6>
                                                    </div>

                                                    <div class=" payment-option-wrapper">
                                                        <div class="single-payment-option">
                                                            <input type="radio" id="shipping_standard"
                                                                name="shipping_method" value="standard"
                                                                data-price="10.50" {{ $selectedShipping == 'standard' ? 'checked' : '' }}>
                                                            <label for="shipping_standard">
                                                                <p>Standard Shipping</p>
                                                                <span class="price">$10.00</span>
                                                            </label>
                                                        </div>
                                                        <div class="single-payment-option">
                                                            <input type="radio" id="shipping_express"
                                                                name="shipping_method" value="express"
                                                                data-price="20.00" {{ $selectedShipping == 'express' ? 'checked' : '' }}>
                                                            <label for="shipping_express">
                                                                <p>Express Shipping</p>
                                                                <span class="price">$20.00</span>
                                                            </label>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="steps-form-btn button">

                                                    <button href="javascript:void(0)" class="btn btn-alt">Save &
                                                        Continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>

                                <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                        aria-expanded="false" aria-controls="collapsefive">Payment Info</h6>
                                    <section class="checkout-steps-form-content collapse" id="collapsefive"
                                        aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="checkout-payment-form">
                                                    <div class="single-form form-default">
                                                        <label>Cardholder Name</label>
                                                        <div class="form-input form">
                                                            <input type="text" placeholder="Cardholder Name">
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default">
                                                        <label>Card Number</label>
                                                        <div class="form-input form">
                                                            <input id="credit-input" type="text"
                                                                placeholder="0000 0000 0000 0000">
                                                            <img src="{{ asset('assets2/images/payment/card.png') }}"
                                                                alt="card">
                                                        </div>
                                                    </div>
                                                    <div class="payment-card-info">
                                                        <div class="single-form form-default mm-yy">
                                                            <label>Expiration</label>
                                                            <div class="expiration d-flex">
                                                                <div class="form-input form">
                                                                    <input type="text" placeholder="MM">
                                                                </div>
                                                                <div class="form-input form">
                                                                    <input type="text" placeholder="YYYY">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-form form-default">
                                                            <label>CVC/CVV <span><i
                                                                        class="mdi mdi-alert-circle"></i></span></label>
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="***">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default button">
                                                        <button class="btn">pay now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                            </ul>
                            <!-- قيم مخفية -->
                            <input type="hidden" name="variant_id" value="{{ request('variant_id') }}">
                            <input type="hidden" name="quantity" value="{{ request('qty', 1) }}">
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table mt-30">
                            <h4 class="title">{{ $variant->product->name }}</h4>
                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p>
                                        @foreach ($variant->attributeValues as $value)
                                            {{ $value->attribute->name }}: {{ $value->value }} <br>
                                        @endforeach
                                    </p>
                                    <p class="price">التشكيلة </p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">${{ $variant->price }}</p>
                                    <p class="price" style="font-size: 13px">السعر للوحدة</p>
                                </div>

                                <div class="total-price shipping">
                                    <p class="value">{{ $qty }}</p>
                                    <p class="price" style="font-size: 13px">الكمية المطلوبة</p>
                                </div>

                                <div class="total-price shipping">
                                    <p class="value" id="shipping-amount">${{ $shippingAmount }}</p>
                                    <p class="price" style="font-size: 13px"> تكاليف الشحن</p>
                                </div>

                                <div class="total-price shipping">
                                    <p class="value">${{ $taxAmount }}</p>
                                    <p class="price" style="font-size: 13px">الضرائب</p>
                                </div>

                                @if($discountAmount > 0)
                                    <div class="total-price shipping">
                                        <p class="value">${{ $discountAmount }}</p>
                                        <p class="price" style="font-size: 13px">الخصم</p>
                                    </div>
                                @endif
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value" style="color:rgb(17, 206, 0); font-weight: bold;font-size: 1.3rem">
                                        ${{ $totalPriceAfterDiscount + $shippingAmount + $taxAmount }}
                                    </p>
                                    <p class="price" style="color:rgb(17, 206, 0); font-size: 1.3rem">المجموع</p>
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
                                    <li><a href="contact.html">تواصل معنا</a></li>


                                    <li><a href="faq.html">أسئلة شائعة</a></li>
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
            <div class="total">المجموع: $<span id="cart-total">0.00</span></div>
            <div class="cart-actions">
                <button id="buy-selected">شراء الآن</button>
                <button id="delete-selected">حذف المحدد</button>
            </div>
        </div>
    </div>





    <!-- لوحة المفضلة -->
    <div class="fav-panel" id="fav-panel" style="display:none;">
        <button class="close-panel" id="close-fav">&times;</button>
        <h3>المفضلة</h3>
        <div class="fav-items" id="fav-items">
            <!-- المنتجات المضافة للمفضلة ستُدرج هنا عبر JavaScript -->
        </div>
        <div class="fav-footer">
            <button class="clear-fav">إزالة الكل</button>
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
        function updateCartCount() {
            const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            document.getElementById('cart-count').textContent = cartItems.length || 0;
        }

        function updateFavCount() {
            const favItems = JSON.parse(localStorage.getItem('favorites')) || [];
            document.getElementById('fav-count').textContent = favItems.length || 0;
        }

        function updateAllCounts() {
            updateCartCount();
            updateFavCount();
        }

        // نفذ عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', updateAllCounts);



        // استدعِ هذه الوظيفة عند إضافة/إزالة أي منتج للسلة أو المفضلة
        // مثال:
        // بعد إضافة منتج:
        // localStorage.setItem('cart', JSON.stringify(cartItems));
        // updateCartCount();

        // بعد إزالة من المفضلة:
        // localStorage.setItem('favorites', JSON.stringify(favItems));
        // updateFavCount();


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

</body>

</html>