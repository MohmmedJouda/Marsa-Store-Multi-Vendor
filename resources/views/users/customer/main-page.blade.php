<!DOCTYPE html>

<html dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <link href="{{asset('assets2/images/logo/logo.svg')}}" rel="icon" type="image/png" />
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
    <link href="{{asset('assets2/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets2/css/tiny-slider.css')}}" rel="stylesheet" />
    <link href="{{asset('assets2/css/main.css')}}" rel="stylesheet" />
    <link href="{{asset('style.css')}}" rel="stylesheet" />
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
                    <li class="logoheader"><a href="index.html"><img class="apple-logo"
                                src="{{asset('img/logo.svg')}}" /></a></li>
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
                                    href="{{ route('customer.category_products.index', $category->id)}}">{{ $category->name }}</a>
                            @endforeach
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
                    <li><a href="#howus">من نحن</a></li>
                    <li class="search-bar">
                        <input placeholder="ابحث عن منتج..." type="text" />
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
            <div class="centardiv">
                <i class="fa-solid fa-user"></i>
            </div>
            <div id="userMenu" class="user-menu">
                <ul>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="menu-link px-5">Sign Out</a>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        @endauth

        <div class="right">
            <i class="fa-solid fa-heart" id="fav-icon">
                <span class="badge" id="fav-count">0</span>
            </i>

            <i class="fa-solid fa-cart-shopping" id="cart-icon">
                <span class="badge" id="cart-count">{{ $carts->count() }}</span>
            </i>


        </div>
    </div>
    <div class="hero-banner">
        <div class="fade-in-up">
            <h1 style="color: #b6d4ffbc; font-size: 80px;"><a href="#"><img src="{{asset('img/logo.svg')}}" /></a></h1>
        </div>
        <p>مرساتك الآمنة لمشترياتك - التسوق الآمن مع أريحية الشراء</p>
        @guest
            <div class="hero-buttons">
                <button class="hero-button" onclick="window.location.href='/login.html'"> أنشئ حساب </button>
                <button class="hero-button" onclick="openModal()">تسجيل دخول</button>
            </div>
        @endguest

    </div>
    <!-- اخر المنتجات -->
    <div class="fade-in-up" id="new-products">
        <section>
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 onclick="window.location.href='/product_page.html'">أخر المنتجات المعروضة حالياَ</h2>
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
                                <img alt="منتج"
                                    src="{{asset('storage/' . $product->images()->where('is_main', true)->first()->image_path)}}"
                                    onclick="window.location.href='/product_details.html'" />
                            </a>

                            <div class="title"> {{ $product->name }}</div>
                            <span class="category">{{ $product->subcategory->name }}</span>
                            <div class="price" data-symbol="$">${{ $product->price }}</div>
                            <div class="rating">★★★★★</div>
                            <div class="seller">المتجر:
                                <span>
                                    <a href="{{ route('customer.stores.show', $product->store->id) }}">{{ $product->store->name }}
                                    </a>
                                </span>
                            </div>
                            <div class="seller">البائع: <span><a href="#">{{ $product->store->user->name }}
                                    </a></span> </div>
                            <div class="actions">
                                <button class="btn-cart"> <a style="color:white"
                                        href="{{ route('customer.product.show', $product->id) }}">
                                        شراء الان </a></button>
                                <i class="fa-solid fa-heart btn-fav"></i>
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

                    {{-- <div class="product-card" data-id="2">
                        <img alt="منتج" src="{{asset('img/Group 2.png')}}" />
                        <div class="title">سماعات بلوتوث</div>
                        <span class="category">Camera</span>
                        <div class="price" data-symbol="$">$15.00</div>
                        <div class="rating">★★★★★</div>
                        <div class="seller">البائع: <span>Mr mustafa</span> </div>
                        <div class="actions">
                            <button class="btn-cart">شراء الآن</button>
                            <i class="fa-solid fa-heart btn-fav"></i>
                            <i class="fa-solid fa-cart-shopping cart"></i>
                        </div>
                        <div class="published-time" data-time="2025-07-30T10:30:00Z">منذ يوم</div>
                    </div>
                    <div class="product-card" data-id="3">
                        <img alt="منتج" src="{{asset('img/Group 2.png')}}" />
                        <div class="title">سماعات بلوتوث</div>
                        <span class="category">Camera</span>
                        <div class="price" data-symbol="$">$15.00</div>
                        <div class="rating">★★★★★</div>
                        <div class="seller">البائع: <span>Mr mustafa</span> </div>
                        <div class="actions">
                            <button class="btn-cart">شراء الآن</button>
                            <i class="fa-solid fa-heart btn-fav"></i>
                            <i class="fa-solid fa-cart-shopping cart"></i>
                        </div>
                        <div class="published-time" data-time="2025-07-30T10:30:00Z">منذ يوم</div>
                    </div>
                    <div class="product-card" data-id="4">
                        <img alt="منتج" src="{{asset('img/Group 2.png')}}" />
                        <div class="title">سماعات بلوتوث</div>
                        <span class="category">Camera</span>
                        <div class="price" data-symbol="$">$15.00</div>
                        <div class="rating">★★★★★</div>
                        <div class="seller">البائع: <span>Mr mustafa</span> </div>
                        <div class="actions">
                            <button class="btn-cart">شراء الآن</button>
                            <i class="fa-solid fa-heart btn-fav"></i>
                            <i class="fa-solid fa-cart-shopping cart"></i>
                        </div>
                        <div class="published-time" data-time="2025-07-30T10:30:00Z">منذ يوم</div>
                    </div>
                    <div class="product-card" data-id="5">
                        <img alt="منتج" src="{{asset('img/Group 2.png')}}" />
                        <div class="title">سماعات بلوتوث</div>
                        <span class="category">Camera</span>
                        <div class="price" data-symbol="$">$15.00</div>
                        <div class="rating">★★★★★</div>
                        <div class="seller">البائع: <span>Mr mustafa</span> </div>
                        <div class="actions">
                            <button class="btn-cart">شراء الآن</button>
                            <i class="fa-solid fa-heart btn-fav"></i>
                            <i class="fa-solid fa-cart-shopping cart"></i>
                        </div>
                        <div class="published-time" data-time="2025-07-30T10:30:00Z">منذ يومين</div>
                    </div>
                    <div class="product-card" data-id="6">
                        <img alt="منتج" src="{{asset('img/Group 2.png')}}" />
                        <div class="title">سماعات بلوتوث</div>
                        <span class="category">Camera</span>
                        <div class="price" data-symbol="$">$15.00</div>
                        <div class="rating">★★★★★</div>
                        <div class="seller">البائع: <span>Mr mustafa</span> </div>
                        <div class="actions">
                            <button class="btn-cart">شراء الآن</button>
                            <i class="fa-solid fa-heart btn-fav"></i>
                            <i class="fa-solid fa-cart-shopping cart"></i>
                        </div>
                        <div class="published-time" data-time="2025-07-30T10:30:00Z">منذ شهر</div>
                    </div>
                    <div class="product-card" data-id="7">
                        <img alt="منتج" src="{{asset('img/Group 2.png')}}" />
                        <div class="title">سماعات بلوتوث</div>
                        <span class="category">Camera</span>
                        <div class="price" data-symbol="$">$15.00</div>
                        <div class="rating">★★★★★</div>
                        <div class="seller">البائع: <span>Mr mustafa</span> </div>
                        <div class="actions">
                            <button class="btn-cart">شراء الآن</button>
                            <i class="fa-solid fa-heart btn-fav"></i>
                            <i class="fa-solid fa-cart-shopping cart"></i>
                        </div>
                        <div class="published-time" data-time="2025-07-30T10:30:00Z">منذ ساعة</div>
                    </div> --}}
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
                    @foreach($categories as $category)
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Start Single Category -->
                            <div class="single-category">
                                <h3 class="heading">{{ $category->name }}</h3>

                                <ul>
                                    @foreach($category->subcategories as $sub)
                                        <li>
                                            <a href="{{ route('customer.products.index', ['subcategory' => $sub->id]) }}"
                                                style="color:white;">
                                                {{ $sub->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="images">
                                    <img alt="#" src="{{ asset('storage/' . $category->image) }}" />
                                </div>
                            </div>
                            <!-- End Single Category -->

                        </div>
                    @endforeach
                </div>

                {{-- <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">الموضة</h3>
                        <ul>
                            <li><a href="product-grids.html" style="color: white;">Men's Clothing</a></li>
                            <li><a href="product-grids.html" style="color: white;">Women's Clothing</a></li>
                            <li><a href="product-grids.html" style="color: white;">Shoes</a></li>
                            <li><a href="product-grids.html" style="color: white;">Bags & Backpacks</a></li>
                            <li><a href="product-grids.html" style="color: white;">View All</a></li>
                        </ul>
                        <div class="images">
                            <img alt="#" src="{{asset('assets2/images/fashion.jpg')}}" />
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">البيت & المطبخ</h3>
                        <ul>
                            <li><a href="product-grids.html" style="color: white;">Furniture</a></li>
                            <li><a href="product-grids.html" style="color: white;">Kitchen Appliances</a></li>
                            <li><a href="product-grids.html" style="color: white;">Cookware & Utensils</a></li>
                            <li><a href="product-grids.html" style="color: white;">Home Decor</a></li>
                            <li><a href="product-grids.html" style="color: white;">View All</a></li>
                        </ul>
                        <div class="images">
                            <img alt="#" src="{{asset('assets2/images/home&kitchen.jpg')}}" />
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">الجمال & العناية بالنفس</h3>
                        <ul>
                            <li><a href="product-grids.html" style="color: white;">Skincare</a></li>
                            <li><a href="product-grids.html" style="color: white;">Makeup</a></li>
                            <li><a href="product-grids.html" style="color: white;">Hair Care</a></li>
                            <li><a href="product-grids.html" style="color: white;">Fragrances</a></li>
                            <li><a href="product-grids.html" style="color: white;">View All</a></li>
                        </ul>
                        <div class="images">
                            <img alt="#" src="{{asset('assets2/images/Beauty & Personal Care.jpg')}}" />
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">ألعاب</h3>
                        <ul>
                            <li><a href="product-grids.html" style="color: white;">Educational Toys</a></li>
                            <li><a href="product-grids.html" style="color: white;">Action Figures</a></li>
                            <li><a href="product-grids.html" style="color: white;">Puzzles & Board Games</a></li>
                            <li><a href="product-grids.html" style="color: white;">Stuffed Animals</a></li>
                            <li><a href="product-grids.html" style="color: white;">View All</a></li>
                        </ul>
                        <div class="images">
                            <img alt="#" src="{{asset('assets2/images/gmaes.jpg')}}" />
                        </div>
                    </div> --}}
                    <!-- End Single Category -->
                    {{--
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">الصحة</h3>
                        <ul>
                            <li><a href="product-grids.html" style="color: white;">Vitamins & Supplements</a></li>
                            <li><a href="product-grids.html" style="color: white;">Medical Equipment</a></li>
                            <li><a href="product-grids.html" style="color: white;">First Aid Supplies</a></li>
                            <li><a href="product-grids.html" style="color: white;">Personal Care</a></li>
                            <li><a href="product-grids.html" style="color: white;">View All</a></li>
                        </ul>
                        <div class="images">
                            <img alt="#" src="{{asset('assets2/images/Health & Wellness.jpg')}}" />
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div> --}}
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
                        <h2 onclick="window.location.href='/product_page.html'">المنتجات الأعلى طلبا </h2>
                        <p>مرر للحصول على أفضل المنتجات المتاحة في السوق</p>
                    </div>
                </div>
            </div>
            <div class="slider-wrapper" style="position: relative;">
                <button class="arrow-btn slideRight left">❯</button>
                <button class="arrow-btn slideLeft right">❮</button>
                <div class="slider-container">
                    <div class="product-card" data-id="1">
                        <img alt="منتج" src="{{asset('img/Group 2.png')}}" />
                        <div class="title">سماعات بلوتوث</div>
                        <span class="category">Camera</span>
                        <div class="price" data-symbol="$">$15.00</div>
                        <div class="rating">★★★★★</div>
                        <div class="seller">البائع: <span>Mr mustafa</span> </div>
                        <div class="actions">
                            <button class="btn-cart">شراء الآن</button>
                            <i class="fa-solid fa-heart btn-fav"></i>
                            <i class="fa-solid fa-cart-shopping cart"></i>
                        </div>
                        <div class="published-time" data-time="2025-07-30T10:30:00Z">منذ يوم</div>
                    </div>
                    <div class="product-card" data-id="2">
                        <img alt="منتج" src="{{asset('img/Group 2.png')}}" />
                        <div class="title">سماعات بلوتوث</div>
                        <span class="category">Camera</span>
                        <div class="price" data-symbol="$">$15.00</div>
                        <div class="rating">★★★★★</div>
                        <div class="seller">البائع: <span>Mr mustafa</span> </div>
                        <div class="actions">
                            <button class="btn-cart">شراء الآن</button>
                            <i class="fa-solid fa-heart btn-fav"></i>
                            <i class="fa-solid fa-cart-shopping cart"></i>
                        </div>
                        <div class="published-time" data-time="2025-07-30T10:30:00Z">منذ يوم</div>
                    </div>
                    <div class="product-card" data-id="1">
                        <img alt="منتج" src="{{asset('img/Group 2.png')}}" />
                        <div class="title">سماعات بلوتوث</div>
                        <span class="category">Camera</span>
                        <div class="price" data-symbol="$">$15.00</div>
                        <div class="rating">★★★★★</div>
                        <div class="seller">البائع: <span>Mr mustafa</span> </div>
                        <div class="actions">
                            <button class="btn-cart">شراء الآن</button>
                            <i class="fa-solid fa-heart btn-fav"></i>
                            <i class="fa-solid fa-cart-shopping cart"></i>
                        </div>
                        <div class="published-time" data-time="2025-07-30T10:30:00Z">منذ يوم</div>
                    </div>
                    <div class="product-card" data-id="1">
                        <img alt="منتج" src="{{asset('img/Group 2.png')}}" />
                        <div class="title">سماعات بلوتوث</div>
                        <span class="category">Camera</span>
                        <div class="price" data-symbol="$">$15.00</div>
                        <div class="rating">★★★★★</div>
                        <div class="seller">البائع: <span>Mr mustafa</span> </div>
                        <div class="actions">
                            <button class="btn-cart">شراء الآن</button>
                            <i class="fa-solid fa-heart btn-fav"></i>
                            <i class="fa-solid fa-cart-shopping cart"></i>
                        </div>
                        <div class="published-time" data-time="2025-07-30T10:30:00Z">منذ يوم</div>
                    </div>
                    <div class="product-card" data-id="1">
                        <img alt="منتج" src="{{asset('img/Group 2.png')}}" />
                        <div class="title">سماعات بلوتوث</div>
                        <span class="category">Camera</span>
                        <div class="price" data-symbol="$">$15.00</div>
                        <div class="rating">★★★★★</div>
                        <div class="seller">البائع: <span>Mr mustafa</span> </div>
                        <div class="actions">
                            <button class="btn-cart">شراء الآن</button>
                            <i class="fa-solid fa-heart btn-fav"></i>
                            <i class="fa-solid fa-cart-shopping cart"></i>
                        </div>
                        <div class="published-time" data-time="2025-07-30T10:30:00Z">منذ يوم</div>
                    </div>
                    <div class="product-card" data-id="3">
                        <img alt="منتج" src="{{asset('img/Group 2.png')}}" />
                        <div class="title">سماعات بلوتوث</div>
                        <span class="category">Camera</span>
                        <div class="price" data-symbol="$">$15.00</div>
                        <div class="rating">★★★★★</div>
                        <div class="seller">البائع: <span>Mr mustafa</span> </div>
                        <div class="actions">
                            <button class="btn-cart">شراء الآن</button>
                            <i class="fa-solid fa-heart btn-fav"></i>
                            <i class="fa-solid fa-cart-shopping cart"></i>
                        </div>
                        <div class="published-time" data-time="2025-07-30T10:30:00Z">منذ يوم</div>
                    </div>
                    <div class="product-card" data-id="4">
                        <img alt="منتج" src="{{asset('img/Group 2.png')}}" />
                        <div class="title">سماعات بلوتوث</div>
                        <span class="category">Camera</span>
                        <div class="price" data-symbol="$">$15.00</div>
                        <div class="rating">★★★★★</div>
                        <div class="seller">البائع: <span>Mr mustafa</span> </div>
                        <div class="actions">
                            <button class="btn-cart">شراء الآن</button>
                            <i class="fa-solid fa-heart btn-fav"></i>
                            <i class="fa-solid fa-cart-shopping cart"></i>
                        </div>
                        <div class="published-time" data-time="2025-07-30T10:30:00Z">منذ يوم</div>
                    </div>
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
                                        <img alt="#" src="{{asset('img/Group 1.png')}}" />
                                        <div class="button">
                                            <a class="btn" href="product-details.html"><i class="lni lni-cart"></i>شراء
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
                                            <span>$399.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-image">
                                        <img alt="#" src="{{asset('img/Group 1.png')}}" />
                                        <div class="button">
                                            <a class="btn" href="product-details.html"><i class="lni lni-cart"></i> شراء
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
                                            <span>$899.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-image">
                                        <img alt="#" src="{{asset('img/Group 1.png')}}" />
                                        <div class="button">
                                            <a class="btn" href="product-details.html"><i class="lni lni-cart"></i> شراء
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
                                            <span>$70.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                        </div>
                        <!-- Start Banner -->
                        <div class="single-banner right"
                            style="background-image:url('{{asset('img/Group\ 1.png')}}');margin-top: 30px;">
                            <div class="content">
                                <h2>Samsung Notebook 9 </h2>
                                <p>Lorem ipsum dolor sit amet, <br />eiusmod tempor
                                    incididunt ut labore.</p>
                                <div class="price">
                                    <span>$590.00</span>
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
                                <img alt="#" src="{{asset('img/Group 1.png')}}" />
                                <span class="sale-tag">50%</span>
                            </div>
                            <div class="text">
                                <h2><a href="product-grids.html">Bluetooth Headphone</a></h2>
                                <div class="rating">★★★★★</div>
                                <div class="price">
                                    <span>$200.00</span>
                                    <span class="discount-price">$400.00</span>
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
            <img src="{{asset('img/Group 2.png')}}" />
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
            <img alt="Microsoft" src="{{asset('assets2/images/Popular Brands/microsoft.png')}}" />
            <img alt="Adidas" src="https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg" />
            <img alt="Samsung" src="{{asset('assets2/images/Popular Brands/samsung.png')}}" />
            <img alt="Nike" src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" />
            <img alt="Puma" src="{{asset('assets2/images/Popular Brands/puma.png')}}" />
            <img alt="HP" src="{{asset('assets2/images/Popular Brands/hp.svg')}}" />
            <img alt="Canon" src="{{asset('assets2/images/Popular Brands/canon-inc.-logo.svg')}}" />
            <img alt="Zara" src="{{asset('assets2/images/Popular Brands/zara.png')}}" />
            <img alt="Intel" src="{{asset('assets2/images/Popular Brands/intel-logo.svg')}}" />
            <img alt="Nike" src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" />
            <!-- تكرار نفس العناصر لمحاكاة الدوران -->
            <img alt="Microsoft" src="{{asset('assets2/images/Popular Brands/microsoft.png')}}" />
            <img alt="Adidas" src="https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg" />
            <img alt="Samsung" src="{{asset('assets2/images/Popular Brands/samsung.png')}}" />
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
                                    <img alt="#" src="{{asset('assets2/images/logo/logo.svg')}}" />
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
                                <img alt="#" src="{{asset('assets2/images/footer/credit-cards-footer.png')}}" />
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
                <form>
                    <label for="email">البريد الإلكتروني</label>
                    <input id="email" placeholder="example@email.com" required="" type="email" />
                    <label for="password">كلمة المرور</label>
                    <input id="password" placeholder="••••••••" required="" type="password" />
                    <button class="submit-btn" type="submit">دخول</button>
                    <p class="link"><a href="#">نسيت كلمة المرور؟</a></p>
                    <div class="or-divider">أو</div>
                    <button class="google-btn">
                        <img alt="Google Logo" src="https://www.svgrepo.com/show/475656/google-color.svg" />
                        التسجيل عبر Google
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

                        <div class="thumb"
                            style="background: url('{{ asset('storage/' . $img->image_path) }}') center / cover no-repeat;">
                        </div>

                        <div class="cart-info">
                            <h4 class="cart-title">{{ $item->name }}</h4>
                            <div class="price">{{ number_format($item->price, 2) }}</div>
                            <div class="date">{{ $item->created_at?->format('Y-m-d H:i') }}</div>
                        </div>

                        <div class="cart-controls">
                            <!-- زر حذف فردي -->
                            <form action="{{ route('customer.cart.remove', $item->id) }}" method="POST" class="inline">
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
            <div class="total">المجموع: $<span id="cart-total">{{ $totalPrice }}</span></div>
            <div class="cart-actions">
                <button type="button" id="buy-selected">شراء الآن</button>
                {{-- <button type="submit" id="delete-selected" class="danger">حذف المحدد</button> --}}
            </div>
        </div>
    </div>

    <!-- لوحة المفضلة -->
    <div class="fav-panel" id="fav-panel" style="display:none;">
        <button class="close-panel" id="close-fav">×</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init();</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>



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
    </script>
</body>

</html>