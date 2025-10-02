<!DOCTYPE html>
<html class="no-js" lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنتجات</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

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
                <li class="logoheader"><a href="{{ route('customer.main-page')}}"><img
                            src="{{asset('assets2/images/logo/logo.svg')}}" /></a></li>
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
                </li>
                <li><a href="#">المنتجات</a>
                    <div class="dropdown-menu">
                        @foreach ($categories as $category)
                            <a
                                href="{{ route('customer.category_products.index', $category->id)}}">{{ $category->name }}</a>
                        @endforeach
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
                <span class="badge" id="fav-count">0</span>
            </i>

            <i class="fa-solid fa-cart-shopping" id="cart-icon">
                <span class="badge" id="cart-count">0</span>
            </i>
        </div>

    </div>

    @if(request()->has('subcategory'))
        <h2>المنتجات في {{ \App\Models\Subcategory::find(request()->subcategory)->name }}</h2>
    @endif

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs" lang="en" dir="rtl">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">السوق العام و المنتجات</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li>{{ $name }} </li>
                        <li>
                            <a style="margin-right: 5px" href="{{ route('customer.main-page')}}"> الرئيسية </a>
                            <i class="lni lni-home"> </i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Main Content -->
    <main class="container py-5">
        <div class="row">
            <!-- Sidebar: Categories -->
            <sidebar class="sidebar">
                <h3>التصنيفات</h3>
                <select id="category-filter">
                    <option value="all">الكل</option>
                    <option value="">الكترونيات</option>
                    <option value="">موضة</option>
                    <option value="">الجمال والعناية</option>
                    <option value="">الكتب والقرطاسية</option>
                    <option value="">الألعاب</option>
                    <option value="">رياضة</option>
                    <option value="">إكسسورات & ساعات</option>
                    <option value="">مستلزمات صحية</option>
                    <option value="">سيارات & مركبات</option>
                    <option value="">أخرى</option>
                </select>

                <h3>بحث</h3>
                <input type="text" id="search-input" placeholder="ابحث عن منتج...">

                <h3>تصفية <i class="fa-solid fa-filter"></i></h3>
                <select id="sort-filter">
                    <option value="default">الافتراضي</option>
                    <option value="rating">الأعلى تقييماً</option>
                    <option value="price-asc">من الأرخص</option>
                    <option value="price-desc">من الأغلى</option>
                    <option value="sales">الأكثر مبيعاً</option>
                    <option value="sales">الأحدث - للأقدم</option>
                </select>



                <div class="single-widget range">
                    <h3> قيمة السلع </h3>
                    <input type="range" class="form-range" name="range" step="1" min="100" max="10000" value="10"
                        onchange="rangePrimary.value=value">
                    <div class="range-inner">
                        <label style="margin-bottom: -45px; margin-right: -10px; display:flex ; ">$</label>
                        <input type="text" id="rangePrimary" placeholder="100" />
                    </div>
                </div>
            </sidebar>



            <!-- Product Grid -->
            <section class="col-lg-9">
                <div class="row">
                    <!-- Product Card -->


                    @foreach ($products as $product)
                        <div class="product-card" data-id="1">
                            <a href="{{ route('customer.product.show', $product->id) }}">
                                <img alt="منتج"
                                    src="{{asset('storage/' . $product->images()->where('is_main', true)->first()->image_path)}}"
                                    onclick="window.location.href='/product_details.html'" />
                            </a>
                            <div class="title"> {{ $product->name }}</div>
                            <span class="category">{{ $product->subcategory->name }}</span>
                            <div class="price" data-symbol="$">${{ $product->price }}</div>
                            <div class="product-rating"
                                style="display:flex; justify-content:center; gap: 2px; margin: 5px 0;">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="stars" style="color: {{ $i <= round($averageRate) ? 'gold' : '#ccc' }}">
                                        &#9733;
                                    </span>
                                @endfor
                            </div>
                            <div class="seller">المتجر: <span><a
                                        href="{{ route('customer.stores.show', $product->store->id) }}">{{ $product->store->name }}
                                    </a></span> </div>
                            <div class="seller">البائع: <span><a
                                        href="merchant_details.html">{{ $product->store->user->name }} </a></span>
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
            </section>
        </div>
    </main>



    <a href="#" class="scroll-top">
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
                                <a href="">
                                    <img src="{{asset('assets2/images/logo/logo.svg')}}" alt="#">
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
                                <img src="{{asset('assets2/images/footer/credit-cards-footer.png')  }}" alt="#">
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
                        {{-- <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="select-item"> --}}

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init();</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>





    <script>



        // function updateFavCount() {
        //     const favItems = JSON.parse(localStorage.getItem('favorites')) || [];
        //     document.getElementById('fav-count').textContent = favItems.length || 0;
        // }

        // function updateAllCounts() {
        //     updateCartCount();
        //     updateFavCount();
        // }

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

    </script>
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