<!DOCTYPE html>

<html dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <link href="{{ asset('assets2/images/logo/logo.svg') }}" rel="icon" type="image/png" />
    <title>Marsa Store</title>
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <!-- Animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
    <!-- AOS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <!-- Google Font: Tajawal -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&amp;display=swap" rel="stylesheet" />
    <!-- Main CSS -->
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('assets2/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets2/css/tiny-slider.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets2/css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('style.css') }}" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="style.css"> -->
    </link>
</head>

<body>
    <header class="apple-header" id="main-header">
        <nav class="nav navbar navbar-expand-lg navbar-dark bg-dark"><button aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarNav"
                data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav-list">
                    <li class="logoheader"><a href="{{ route('customer.main-page') }}"><img class="apple-logo"
                                src="{{ asset('img/logo.svg') }}" /></a></li>
                    <li><a href="#">السوق العام</a>
                        <div class="dropdown-menu">
                            <a href="product_page.html"> السوق العام &amp; المنتجات</a>
                            <a href="#new-products">آخر المنتجات المعروضة</a>
                            <a href="#Featured-Categories">الأصناف الاعلى طلباَ</a>
                            <a href="#Suggested-for-you">مقترح لك</a>
                            <a href="#Special-Offer">عروض و تنزيلات</a>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('customer.stores.index') }}">المتاجر</a>

                    </li>
                    <li><a href="#">المنتجات</a>
                        <div class="dropdown-menu">
                            @foreach ($categories as $category)
                                <a
                                    href="{{ route('customer.category_products.index', $category->id) }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <!-- <li><a href="#">الدعم الفني</a></li> -->
                    <li><a href="#howus">من نحن</a></li>
                    <li class="search-bar" style="position: relative;">
                        <input placeholder="ابحث عن منتج..." type="text" id="search-input" autocomplete="off" />
                        <ul id="search-results"
                            style="position: absolute; top: 40px; left: 0; width: 100%; background: white; border: 1px solid #ddd; display: none; list-style: none; padding: 0; margin: 0; z-index:1000;">
                        </ul>
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
            </div>
        </nav>
    </header>
    <div class="secondary-nav">
        <div class="left">
            <span class="site-name">مرساة | تسوق آمن مع اريحية الشراء المضمون</span>
        </div>

        @guest
            <div class="centardiv" onclick="openModal()">
                <i class="fa-solid fa-user"></i>
            </div>
        @endguest

        @auth
            <!-- أيقونة المستخدم -->
            <div class="centardiv" id="userIcon" role="button" aria-haspopup="true" aria-expanded="false"
                title="قائمة المستخدم">
                <i class="fa-solid fa-user"></i>
            </div>
        @endauth

        <div class="right">
            <i class="fa-solid fa-heart" id="fav-icon">
                <span class="badge" id="fav-count"></span>
            </i>

            <i class="fa-solid fa-cart-shopping" id="cart-icon">
                <span class="badge" id="cart-count"></span>
            </i>

        </div>
    </div>
    <div class="hero-banner">
        <div class="fade-in-up">
            <h1 style="color: #b6d4ffbc; font-size: 80px;"><a href="#"><img
                        src="{{ asset('img/logo.svg') }}" /></a></h1>
        </div>
        <p>مرساتك الآمنة لمشترياتك - التسوق الآمن مع أريحية الشراء</p>
        @guest
            <div class="hero-buttons">
                <button class="hero-button"> <a href="{{ route('login') }}" style="color: white">أنشئ حساب</a> </button>
                <button class=" hero-button" onclick="openModal()">تسجيل دخول</button>
            </div>
        @endguest

    </div>
    <!-- اخر المنتجات -->
    <div class="fade-in-up" id="new-products">
        <section>
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>أخر المنتجات المعروضة حالياَ</h2>
                        <p>مرر للحصول على اخر ما أتيح في السوق</p>
                    </div>
                </div>
            </div>
            <div class="slider-wrapper" style="position: relative;">
                <!-- السهم اليسار (←) -->
                <button class="arrow-btn slideLeft right">❮</button>
                <!-- السهم اليمين (→) -->
                <button class="arrow-btn slideRight left">❯</button>
                <div class="slider-container">

                    @foreach ($latest as $product)
                        <div class="product-card" data-id="1">
                            <a href="{{ route('customer.product.show', $product->id) }}">
                                @php
                                    $mainImage = $product->images()->where('is_main', true)->first();
                                @endphp

                                <img alt="منتج"
                                    src="{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/no-image.png') }}"
                                    onclick="window.location.href='/product_details.html'" />

                            </a>

                            <div class="title"> {{ $product->name }}</div>
                            <span class="category">{{ $product->subcategory->name }}</span>
                            <div class="price" data-symbol="₪">₪{{ $product->price }}</div>
                            @php
                                $averageRate = $product->ratings->avg('rate');
                            @endphp

                            <div class="product-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span style="color: {{ $i <= round($averageRate) ? 'gold' : '#ccc' }}">
                                        &#9733;
                                    </span>
                                @endfor
                            </div>

                            <div class="seller">عدد المبيعات: <span>{{ $product->total_sales }}
                                    </span> </div>
                            <div class="seller">المتجر:
                                <span>
                                    <a href="{{ route('customer.stores.show', $product->store->id) }}">{{ $product->store->name }}
                                    </a>
                                </span>
                            </div>
                            
                            <div class="actions">
                                <button class="btn-cart"> <a style="color:white"
                                        href="{{ route('customer.product.show', $product->id) }}">
                                        شراء الان </a></button>
                                {{-- <i class="fa-solid fa-heart btn-fav"></i> --}}
                                <form action="{{ route('customer.cart.add') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="qty" value="1">
                                    <i class="fa-solid fa-cart-shopping" onclick="this.closest('form').submit()"></i>
                                </form>
                            </div>
                            <div class="published-time" data-time="2025-07-30T10:30:00Z"> {{ $product->created_at }}
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
    </div>
    <section>
        <div class="container"> </div>
    </section>
    <!-- Start Featured Categories Area -->
    <div class="fade-in-up" id="Featured-Categories">
        <section class="featured-categories section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>الفئات</h2>
                            <p>
                                يوجد لدينا جميع انواع المنتجات.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <!-- Start Single Category -->
                            <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">

                                <!-- صورة القسم -->
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $category->image) }}"
                                        class="card-img-top img-fluid" alt="{{ $category->name }}"
                                        style="height:220px; object-fit:cover;">
                                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25"></div>
                                    <h3 class="position-absolute bottom-0 start-0 text-white p-3 m-0">
                                        {{ $category->name }}
                                    </h3>
                                </div>

                                <!-- روابط الفئات الفرعية -->
                                <div class="card-body d-flex flex-wrap gap-2 bg-dark">
                                    @foreach ($category->subcategories as $sub)
                                        <a href="{{ route('customer.products.index', ['subcategory' => $sub->id]) }}"
                                            class="btn btn-sm btn-light rounded-pill">
                                            {{ $sub->name }}
                                        </a>
                                    @endforeach
                                </div>

                            </div>
                            <!-- End Single Category -->
                        </div>
                    @endforeach
                </div>

            </div>
    </div>
    </section>
    <!-- End Features Area -->
    </div>
    <!-- مقترح لك -->
    <div class="fade-in-up" id="Suggested-for-you">
        <section>
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>المنتجات الأعلى طلبا </h2>
                        <p>مرر للحصول على أفضل المنتجات المتاحة في السوق</p>
                    </div>
                </div>
            </div>
            <div class="slider-wrapper" style="position: relative;">
                <button class="arrow-btn slideRight left">❯</button>
                <button class="arrow-btn slideLeft right">❮</button>
                <div class="slider-container">
                    @foreach ($mostOrdereds as $mostOrdered)
                        <div class="product-card" data-id="1">
                            <a href="{{ route('customer.product.show', $mostOrdered->id) }}">
                                @php
                                    $mainImage = $mostOrdered->images()->where('is_main', true)->first();
                                @endphp

                                <img alt="منتج"
                                    src="{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/no-image.png') }}"
                                    onclick="window.location.href='/product_details.html'" />

                            </a>

                            <div class="title"> {{ $mostOrdered->name }}</div>
                            <span class="category">{{ $mostOrdered->subcategory->name }}</span>
                            <div class="price" data-symbol="₪">₪{{ $mostOrdered->price }}</div>

                            @php
                                $averageRate = $mostOrdered->ratings->avg('rate'); // ✅ لكل منتج
                            @endphp

                            <div class="product-rating" style="display:flex; justify-content:center; gap:2px;">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span style="color: {{ $i <= round($averageRate) ? 'gold' : '#ccc' }}">
                                        &#9733;
                                    </span>
                                @endfor
                            </div>

                            <div class="seller">عدد المبيعات: <span>{{ $mostOrdered->total_sales }}
                                   </span> </div>
                            <div class="seller">المتجر:
                                <span>
                                    <a href="{{ route('customer.stores.show', $mostOrdered->store->id) }}">{{ $mostOrdered->store->name }}
                                    </a>
                                </span>
                            </div>

                            <div class="actions">
                                <button class="btn-cart"> <a style="color:white"
                                        href="{{ route('customer.product.show', $mostOrdered->id) }}">
                                        شراء الان </a></button>
                                {{-- <i class="fa-solid fa-heart btn-fav"></i> --}}
                                <form action="{{ route('customer.cart.add') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $mostOrdered->id }}">
                                    <input type="hidden" name="qty" value="1">
                                    <i class="fa-solid fa-cart-shopping" onclick="this.closest('form').submit()"></i>
                                </form>
                            </div>
                            <div class="published-time" data-time="2025-07-30T10:30:00Z" style="text-align: center">
                                {{ $mostOrdered->created_at }}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>
    <!-- Start Special Offer -->
    <div class="fade-in-up" id="Special-Offer">
        <section class="special-offer section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2 onclick="window.location.href='/product_page.html'" style="color: #fafafa;">عروض و
                                تنزيلات</h2>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-image">
                                        <img alt="#" src="{{ asset('img/Group 1.png') }}" />
                                        <div class="button">
                                            <a class="btn" href="product-details.html"><i
                                                    class="lni lni-cart"></i>شراء
                                                الآن</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <span class="category">Camera</span>
                                        <h4 class="title">
                                            <a href="product-grids.html">WiFi Security Camera</a>
                                        </h4>
                                        <div class="rating">★★★★★</div>
                                        <div class="price">
                                            <span>₪ٍ399.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-image">
                                        <img alt="#" src="{{ asset('img/Group 1.png') }}" />
                                        <div class="button">
                                            <a class="btn" href="product-details.html"><i
                                                    class="lni lni-cart"></i> شراء
                                                الآن</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <span class="category">Laptop</span>
                                        <h4 class="title">
                                            <a href="product-grids.html">Apple MacBook Air</a>
                                        </h4>
                                        <div class="rating">★★★★★</div>
                                        <div class="price">
                                            <span>₪899.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-image">
                                        <img alt="#" src="{{ asset('img/Group 1.png') }}" />
                                        <div class="button">
                                            <a class="btn" href="product-details.html"><i
                                                    class="lni lni-cart"></i> شراء
                                                الآن</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <span class="category">Speaker</span>
                                        <h4 class="title">
                                            <a href="product-grids.html">Bluetooth Speaker</a>
                                        </h4>
                                        <div class="rating">★★★★★</div>
                                        <div class="price">
                                            <span>₪70.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                        </div>
                        <!-- Start Banner -->
                        <div class="single-banner right"
                            style="background-image:url('{{ asset('img/Group\ 1.png') }}');margin-top: 30px;">
                            <div class="content">
                                <h2>Samsung Notebook 9 </h2>
                                <p>Lorem ipsum dolor sit amet, <br />eiusmod tempor
                                    incididunt ut labore.</p>
                                <div class="price">
                                    <span>₪590.00</span>
                                </div>
                                <div class="button">
                                    <a class="btn" href="product-grids.html">شراء الآن </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Banner -->
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="offer-content">
                            <div class="image">
                                <img alt="#" src="{{ asset('img/Group 1.png') }}" />
                                <span class="sale-tag">50%</span>
                            </div>
                            <div class="text">
                                <h2><a href="product-grids.html">Bluetooth Headphone</a></h2>
                                <div class="rating">★★★★★</div>
                                <div class="price">
                                    <span>₪200.00</span>
                                    <span class="discount-price">₪400.00</span>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry incididunt
                                    ut
                                    eiusmod tempor labores.</p>
                            </div>
                            <div class="box-head">
                                <div class="box">
                                    <h1 id="days">000</h1>
                                    <h2 id="daystxt">Days</h2>
                                </div>
                                <div class="box">
                                    <h1 id="hours">00</h1>
                                    <h2 id="hourstxt">Hours</h2>
                                </div>
                                <div class="box">
                                    <h1 id="minutes">00</h1>
                                    <h2 id="minutestxt">Minutes</h2>
                                </div>
                                <div class="box">
                                    <h1 id="seconds">00</h1>
                                    <h2 id="secondstxt">Secondes</h2>
                                </div>
                            </div>
                            <div class="alert" style="background: rgb(204, 24, 24);">
                                <h1 style="padding: 50px 80px;color: white;">We are sorry, Event ended ! </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Special Offer -->
    </div>
    <!-- how us -->
    <div class="fade-in-up">
        <section class="howus" id="howus">
            <img src="{{ asset('img/Group 2.png') }}" />
            <h1>من نحن؟</h1>
            <h2>WIC std</h2>
            <p>فريق عمل شبابي من طلبة تخصص الويب و أمن المعلومات من كلية فلسطين <br /> مهتمين في خلق نماذج عملية و
                ابداعية
                بالتصميم القوي و الامن المعلوماتي..</p>
            <ul>
                <li><i class="fa-brands fa-instagram"></i></li>
                <li><i class="fa-brands fa-linkedin-in"></i></li>
                <li><i class="fa-brands fa-whatsapp"></i></li>
                <li><i class="fa-brands fa-telegram"></i></li>
            </ul>
        </section>
    </div>
    <section class="brand-slider">
        <div class="slider-track">
            <img alt="Microsoft" src="{{ asset('assets2/images/Popular Brands/microsoft.png') }}" />
            <img alt="Adidas" src="https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg" />
            <img alt="Samsung" src="{{ asset('assets2/images/Popular Brands/samsung.png') }}" />
            <img alt="Nike" src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" />
            <img alt="Puma" src="{{ asset('assets2/images/Popular Brands/puma.png') }}" />
            <img alt="HP" src="{{ asset('assets2/images/Popular Brands/hp.svg') }}" />
            <img alt="Canon" src="{{ asset('assets2/images/Popular Brands/canon-inc.-logo.svg') }}" />
            <img alt="Zara" src="{{ asset('assets2/images/Popular Brands/zara.png') }}" />
            <img alt="Intel" src="{{ asset('assets2/images/Popular Brands/intel-logo.svg') }}" />
            <img alt="Nike" src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" />
            <!-- تكرار نفس العناصر لمحاكاة الدوران -->
            <img alt="Microsoft" src="{{ asset('assets2/images/Popular Brands/microsoft.png') }}" />
            <img alt="Adidas" src="https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg" />
            <img alt="Samsung" src="{{ asset('assets2/images/Popular Brands/samsung.png') }}" />
            <img alt="Nike" src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" />
        </div>
    </section>
    <!-- ========================= scroll-top ========================= -->
    <a class="scroll-top" href="#">
        <i class="lni lni-chevron-up"></i>
    </a>
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
                                    <img alt="#" src="{{ asset('assets2/images/logo/logo.svg') }}" />
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="footer-newsletter">
                                <h4 class="title"
                                    style="  float: none !important;
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
                                    <form action="#" class="newsletter-form" method="get" target="_blank">
                                        <input name="EMAIL" placeholder="Email address here..." type="email" />
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
                                    <li><a href="product_page.html">إكسسورات &amp; ساعات</a></li>
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
                                <img alt="#"
                                    src="{{ asset(path: 'assets2/images/footer/credit-cards-footer.png') }}" />
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
    <div class="modal-overlay" id="customModal">
        <div class="modal-box">
            <button class="close-btn" onclick="closeModal()">✖</button>
            <div class="modal-content">
                <h2>تسجيل الدخول</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label for="email">البريد الإلكتروني</label>
                    <input id="email" name="email" placeholder="example@email.com" required=""
                        type="email" />
                    <label for="password">كلمة المرور</label>
                    <input id="password" name="password" placeholder="••••••••" required="" type="password" />
                    <button class="submit-btn" type="submit">دخول</button>
                    <p class="link"><a href="#">نسيت كلمة المرور؟</a></p>
                    <div class="or-divider">أو</div>
                    <button class="google-btn">
                        <img alt="Google Logo" src="https://www.svgrepo.com/show/475656/google-color.svg" />
                        <a href="{{ url('/auth/google') }}">تسجيل الدخول عبر google</a>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- register -->
    <div class="modal-overlay" id="customModal2">
        <div class="modal-box">
            <button class="close-btn" onclick="closeModal2()">✖</button>
            <div class="modal-content">
                <h2>تسجيل حساب جديد</h2>
                <form>
                    <label for="name"> الاسم</label>
                    <input id="name" name="name" required="" type="text" />
                    <label for="email">البريد الإلكتروني</label>
                    <input id="email" name="email" placeholder="example@email.com" required=""
                        type="email" />
                    <label for="password">كلمة المرور</label>
                    <input id="password" name="password" " required="" placeholder=" ••••••••" type=" password" />
                    <label for="password_confirmation">تأكيد كلمة المرور</label>
                    <input id="password_confirmation" name="password_confirmation" placeholder="••••••••" required=""
                        type="password" />
                    <button class="submit-btn" type="submit">دخول</button>
                    <p class="link"><a href="#">نسيت كلمة المرور؟</a></p>
                    <div class="or-divider">أو</div>
                    <button class="google-btn">
                        <img alt="Google Logo" src="https://www.svgrepo.com/show/475656/google-color.svg" />
                        <a href="{{ url('/auth/google') }}">التسجيل عبر Google </a>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- سلة جانبية -->
    <div class="cart-panel" id="cart-panel" style="display:none;">

        <button type="button" class="close-panel" id="close-cart">×</button>

        <h3> <a href="{{ route('customer.cart.index') }}"> سلة المشتريات </a></h3>

        <div class="cart-items" id="cart-items">
                      @foreach ($carts as $cart)
                    @forelse ($cart->items as $item)
                        @php
                            $img = $item->product->images()->where('is_main', 1)->first();
                        @endphp

                        <div class="cart-item">
                            {{-- <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="select-item">
                        --}}

                            @php
                                $mainImage = $product->images()->where('is_main', true)->first();
                            @endphp

                            <div class="thumb"
                                style="background: url('{{ $mainImage ? asset('storage/' . $mainImage->image_path) : asset('images/no-image.png') }}') center / cover no-repeat;">
                            </div>


                            <div class="cart-info">
                                <h4 class="cart-title">{{ $item->name }}</h4>
                                <div class="price">{{ number_format($item->price, 2) }}</div>
                                <div class="date">{{ $item->created_at?->format('Y-m-d H:i') }}</div>
                            </div>

                            <div class="cart-controls">
                                <!-- زر حذف فردي -->
                                <form action="{{ route('customer.cart.remove', $item->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" title="حذف"
                                        style="padding:5px 8px; background:red; color:white; border:none; cursor:pointer;">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="empty">السلة فارغة.</p>
                    @endforelse
                    @endforeach
            </div>

            <div class="cart-footer">
                {{-- <label class="select-all">
                <input id="select-all" type="checkbox" />
                <span>تحديد الكل</span>
            </label> --}}
                <div class="total">المجموع: ₪<span id="cart-total">{{ $totalPrice }}</span></div>
                <div class="cart-actions">
                    <button type="button" id="buy-selected">شراء الآن</button>
                    {{-- <button type="submit" id="delete-selected" class="danger">حذف المحدد</button> --}}
                </div>
            </div>
        </div>

        
        <script src="{{ asset('assets2/js/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets2/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets2/js/main.js') }}"></script>
        <script src="{{ asset('assets2/js/jsmain.js') }}"></script>
        <script src="{{ asset('assets2/js/js/tiny-slider.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const userIcon = document.getElementById('userIcon');
                const dropdown = document.getElementById('userDropdown');

                if (!userIcon || !dropdown) {
                    console.warn(
                        'userIcon or userDropdown element not found. تأكد من وجود العنصرين ومعرفاتهما id="userIcon" و id="userDropdown".'
                    );
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
                    if (left + ddRect.width > window.innerWidth - margin) left = window.innerWidth - ddRect.width -
                        margin;

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

                userIcon.addEventListener('click', function(e) {
                    e.stopPropagation();
                    if (dropdown.classList.contains('open')) closeDropdown();
                    else openDropdown();
                });

                // غلق عند النقر خارج القائمة أو عند الضغط على Esc
                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target) && !userIcon.contains(e.target)) {
                        closeDropdown();
                    }
                });

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') closeDropdown();
                });

            });

        </script>
        <!-- Dropdown عام (ضعه مرة واحدة في الـ layout قبل </body>) -->
        @auth
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
        @endauth

</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search-input').on('keyup', function() {
            let query = $(this).val();

            if (query.length > 0) {
                $.ajax({
                    url: "{{ route('products.search') }}",
                    type: "GET",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        let results = '';
                        if (data.length > 0) {
                            data.forEach(product => {
                                results += `<li style="padding:10px; border-bottom:1px solid #eee;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <img src="${product.image_url}" alt="منتج"
                             style="width:50px; height:50px; object-fit:cover; border-radius:6px;">
                        <div style="flex:1;">
                            <div style="font-weight:bold; font-size:14px;">${product.name}</div>
                            <div style="color:green;">${product.price} ₪</div>
                        </div>
                        <button onclick="window.location='/products/${product.id}'"
                                style="background:#007bff;color:white;border:none;padding:6px 10px;border-radius:4px;cursor:pointer;">
                            تفاصيل
                        </button>
                    </div>
                </li>`;
                            });
                        } else {
                            results =
                                '<li style="padding: 8px; color: gray;">لا توجد نتائج</li>';
                        }
                        $('#search-results').html(results).show();
                    }
                });
            } else {
                $('#search-results').hide();
            }
        });

        // إخفاء القائمة عند الضغط خارجها
        $(document).click(function(e) {
            if (!$(e.target).closest('#search-input').length) {
                $('#search-results').hide();
            }
        });
    });
</script>
