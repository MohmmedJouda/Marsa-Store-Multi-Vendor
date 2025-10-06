<!DOCTYPE html>
<html dir="rtl">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>تفاصيل المنتج</title>
<link rel="stylesheet" href="{{asset('assets2/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets2/css/main.css')}}">
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

<style>
    .product-details-page {
        padding: 30px 20px 80px;
        max-width: 900px;
        margin: auto;
    }

    .dark-box {
        background-color: #1e1e1e;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
    }

    .seller-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .profile-left {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .profile-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #0077b5;
    }

    .seller-name {
        margin: 0;
        font-size: 1.4rem;
        color: #4da6ff;
    }

    .profile-actions {
        display: flex;
        gap: 10px;
    }

    .modern-btn {
        padding: 10px 16px;
        background: linear-gradient(145deg, #1f1f1f, #292929);
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 6px;

    }

    .modern-btn:hover {
        background: #333;
        transform: translateY(-2px);
    }

    .product-gallery {
        text-align: center;
    }

    .main-img {
        width: 80%;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .thumbs img {
        width: 60px;
        height: 60px;
        margin: 5px;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
        object-fit: cover;
    }

    .thumbs img:hover {
        transform: scale(1.05);
    }

    .product-title {
        font-size: 1.8rem;
        margin-bottom: 10px;
        color: #00c8ff;
    }

    .product-price {
        font-size: 1.2rem;
        color: #ffb347;
    }

    .product-date {
        font-size: 0.95rem;
        color: #aaa;
        margin-bottom: 15px;
    }

    .product-options label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    .product-options input,
    .product-options select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border-radius: 6px;
        border: 1px solid #444;
        background-color: #2a2a2a;
        color: #eee;
    }

    .product-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .seller-comments h3 {
        border-bottom: 1px solid #444;
        padding-bottom: 8px;
    }

    .comments-list {
        list-style: none;
        padding: 0;
    }

    .comments-list li {
        margin: 10px 0;
        padding: 8px;
        background-color: #2a2a2a;
        border-radius: 6px;
    }

    .add-comment textarea {
        width: 100%;
        height: 80px;
        border-radius: 8px;
        border: 1px solid #444;
        background: #222;
        color: #eee;
        padding: 10px;
        margin-top: 10px;
    }

    .rating-input {
        margin: 10px 0;
    }

    .rating-input select {
        width: 100%;
        padding: 8px;
        border-radius: 6px;
        border: 1px solid #444;
        background-color: #2a2a2a;
        color: #fff;
    }

    .extra-info-box {
        margin-top: 15px;
        font-size: 0.95rem;
        color: #ccc;
        background-color: #1b1b1b;
        padding: 10px;
        border-radius: 8px;
    }






    .product-gallery {
        max-width: 90%;
        margin: auto;
        padding: 15px;
        /* background-color: #111; */
        border-radius: 12px;
        object-fit: contain;
    }

    .product-gallery .main-img {
        width: 80%;
        height: 400px;
        /* ارتفاع ثابت يمنع تمدد/انكماش الصفحة */
        object-fit: cover;
        border-radius: 10px;
        transition: opacity 0.3s ease-in-out;
        background-color: #222;
        /* لون تعبئة أثناء تحميل الصور */
        object-fit: contain;
    }

    .product-gallery .thumbs {
        margin-top: 15px;
        display: flex;
        justify-content: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .product-gallery .thumbs img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border 0.2s ease-in-out;
    }

    .product-gallery .thumbs img:hover {
        border: 2px solid #00ffcc;
    }

    .product-options {
        display: flex;
        flex-direction: column;
        gap: 16px;
        background: #1a1a1a;
        padding: 16px;
        border-radius: 12px;
        max-width: 820px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);

    }

    .option-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .product-options label {
        color: #ccc;
        font-size: 14px;
        font-weight: 500;
    }

    .product-options input[type="number"] {
        width: 80px;
        padding: 6px 10px;
        font-size: 14px;
        border: 1px solid #333;
        border-radius: 8px;
        background-color: #121212;
        color: #fff;
        transition: 0.3s;
    }

    .product-options input[type="number"]:focus {
        outline: none;
        border-color: #00ffc3;
        box-shadow: 0 0 5px #00ffc3aa;
    }

    /* أزرار الألوان */
    .color-options {
        display: flex;
        gap: 10px;
        margin-top: 4px;
    }

    .color-dot {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        cursor: pointer;
        border: 2px solid transparent;
        transition: transform 0.2s, border 0.2s;
    }

    .color-dot:hover {
        transform: scale(1.1);
        border-color: #00ffc3;
    }








    .quantity-control {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .quantity-control label {
        color: #ccc;
        font-size: 14px;
        font-weight: 500;
    }

    .quantity-box {
        display: flex;
        align-items: center;
        background-color: #1a1a1a;
        border: 1px solid #333;
        border-radius: 10px;
        overflow: hidden;
        width: fit-content;
    }

    .qty-btn {
        background-color: #2b2b2b;
        color: #00ffc3;
        border: none;
        padding: 6px 12px;
        font-size: 18px;
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
    }

    .qty-btn:hover {
        background-color: #00ffc3;
        color: #000;
    }

    .quantity-box input[type="number"] {
        width: 50px;
        text-align: center;
        padding: 6px;
        font-size: 16px;
        background-color: #121212;
        color: #fff;
        border: none;
    }


    /* إخفاء أسهم التحكم في المتصفحات الحديثة */
    .quantity-box input[type="number"]::-webkit-inner-spin-button,
    .quantity-box input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .quantity-box input[type="number"] {
        -moz-appearance: textfield;
        /* لمتصفح Firefox */
    }



    .color-dot.selected {
        outline: 3px solid #4caf50;
        outline-offset: 2px;
    }
</style>


</head>

<body>

    <header id="main-header" class="apple-header">
        <nav class="nav">
            <ul class="nav-list">
                <li class="logoheader"><a href="{{ route('customer.main-page')}}"><img src="{{asset('img/logo.svg')}}"
                            class="apple-logo" /></a></li>
                <li><a href="#">السوق العام</a>
                    <div class="dropdown-menu">
                        <a href="product_page.html"> السوق العام & المنتجات</a>
                        <a href="#">آخر المنتجات المعروضة</a>
                        <a href="#">الأصناف الاعلى طلباَ</a>
                        <a href="#">مقترح لك</a>
                        <a href="#">عروض و تنزيلات</a>


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

                <!-- <li><a href="#">الدعم الفني</a></li> -->
                <li><a href="#">من نحن</a></li>

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
                        <h1 class="page-title">تفاصيل المنتج</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('customer.main-page')}}"><i class="lni lni-home"></i> الرئيسية</a></li>
                        <li>تفاصيل المنتج </li>
                    </ul>
                </div>


            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->





    <div class="product-details-page dark-theme">
        <div class="seller-profile dark-box">
            <div class="seller-header">
                <div class="profile-left">
                    <img class="seller-image"
                        src="{{ $product->store->logo ? asset('storage/' . $product->store->logo) : asset('img/store-logo.jpg') }}"
                        alt="Store Logo">
                    <div class="profile-info">
                        <h2 class="seller-name"> <a
                                href="{{ route('customer.stores.show', $product->store_id) }}">{{ $product->store->name }}</a>
                        </h2>
                        <p>التاجر: {{ $product->store->user->name }}</p>
                        <p>{{ $product->store->slogan }}</p>
                        @php
                            $averageRate = $product->store->ratings->avg('rate'); // ✅ لكل منتج
                        @endphp

                        <div class="product-rating"
                            style="display:flex; justify-content:center; align-items:center; gap:10px;">
                            <p style="margin:0;">تقييم المتجر:</p>

                            @for ($i = 1; $i <= 5; $i++)
                                <span style="color: {{ $i <= round($averageRate) ? 'gold' : '#ccc' }};">
                                    &#9733;
                                </span>
                            @endfor
                        </div>



                    </div>
                </div>
                <div class="profile-actions modern-actions">
                    <button class="modern-btn chat-btn" title="تواصل مع التاجر">
                        <i class="fas fa-message"></i> تواصل
                    </button>
                    <button class="modern-btn info-btn" title="معلومات إضافية" onclick="showSellerDetails()">
                        <i class="fas fa-user-circle"></i> معلومات
                    </button>
                </div>
            </div>
            <div id="seller-extra-info" class="extra-info-box" style="display:none;">
                <p><i class="fab fa-whatsapp"></i> <strong>واتساب:</strong> <span dir="ltr"
                        style="unicode-bidi: embed;">{{ $product->store->phone }} </span> </p>
                {{-- <p><i class="fab fa-facebook"></i> <strong>فيسبوك:</strong> <a href="https://facebook.com/seller"
                        target="_blank">facebook.com/seller</a></p> --}}
            </div>
        </div>

        <div class="product-box dark-box">
            <div style="display: flex; justify-content: space-between;">
                <h1 class="product-title"> {{ $product->name }}</h1>
                <div class="rating" style="margin-top: -10px">
                    <form action="{{ route('customer.product.rate', $product->id) }}" method="POST" id="rating-form">
                        @csrf
                        <div class="star-rating">
                            @for($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{$i}}" name="rate" value="{{$i}}" style="display:none;">
                                <label for="star{{$i}}" title="{{$i}} نجوم"
                                    style="cursor:pointer; font-size:24px;">&#9733;</label>
                            @endfor
                        </div>
                    </form>

                    <script>
                        // نختار كل اللابلز داخل star-rating
                        document.querySelectorAll('.star-rating label').forEach(label => {
                            label.addEventListener('click', function () {
                                // عند الضغط على النجمة، يتم اختيار الراديو المناسب
                                const input = document.getElementById(this.getAttribute('for'));
                                input.checked = true;
                                // ثم إرسال الفورم
                                document.getElementById('rating-form').submit();
                            });
                        });
                    </script>

                    <p>متوسط التقييم: {{ number_format($product->ratings()->avg('rate') ?? 0, 1) }} / 5
                    </p>

                </div>
            </div>

            <p class="product-price">السعر: <strong>{{ $product->price }}₪</strong></p>
            <p class="product-date">تاريخ الطرح: <strong>{{ $product->created_at }}</strong></p>
            <div class="product-gallery">
                <img src="{{asset('storage/' . $product->images()->where('is_main', true)->first()->image_path)}}"
                    class="main-img" alt="الصورة الرئيسية">
                @php
                    $mainImage = $product->images()->where('is_main', true)->first();
                    $otherImages = $product->images()->where('is_main', false)->get();
                @endphp

                <div class="thumbs">
                    @if($mainImage)
                        <img src="{{ asset('storage/' . $mainImage->image_path) }}" onclick="changeImage(this)">
                    @endif

                    @foreach($otherImages as $img)
                        <img src="{{ asset('storage/' . $img->image_path) }}" onclick="changeImage(this)">
                    @endforeach
                </div>
            </div>

            <div class="product-options">
                <h4 style="color: white;" class="my-4"> التشكيلة الخاصة بالمنتج:</h4>
                <div class="row">
                    @foreach ($product->variants as $variant)
                        <div class="col-md-4 mb-3">
                            <div class="card variant-card" data-id="{{ $variant->id }}" onclick="selectVariant(this)"
                                style="cursor:pointer;">
                                <div class="card-body text-center">
                                    <h6 class="card-title">
                                        @foreach ($variant->attributeValues as $value)
                                            {{ $value->attribute->name }}: {{ $value->value }}<br>
                                        @endforeach
                                    </h6>

                                    <img src="{{ asset('storage/' . $variant->image) }}">
                                    <p class="variant-price mt-4"><strong>السعر:</strong> <span>{{ $variant->price }}</span>
                                        ₪</p>
                                    <p class="variant-quantity"><strong>الكمية:</strong>
                                        <span>{{ $variant->quantity }}</span>
                                    </p>

                                    <div class="mt-2 quantity-selector" style="display:none;">
                                        <div class="d-flex align-items-center mb-2">
                                            <label class="me-2 mb-0">الكمية المرادة:</label>
                                            <input type="number" min="1" max="{{ $variant->quantity }}" value="1"
                                                class="form-control quantity-input" style="width:80px; margin-right: 20px;">
                                        </div>

                                        <button class="btn btn-success buy-now-btn" data-variant-id="{{ $variant->id }}"
                                            data-checkout-url="{{ route('customer.checkout.show') }}">
                                            اختيار وشراء
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>




    <div class="seller-comments dark-box">
        <h3>آراء العملاء</h3>

        <!-- قائمة التعليقات السابقة -->
        <ul class="comments-list" id="comments-list">
            @foreach($product->comments as $comment)
                <li style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">

                    <!-- التعليق على أقصى اليمين -->
                    <span style="text-align: right;">
                        <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}
                    </span>

                    <!-- التقييم على أقصى اليسار -->
                    @if($comment->rating)
                        <div class="stars-container" style="display:flex; gap: 2px;">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="stars" style="color: {{ $i <= $comment->rating->rate ? 'gold' : '#ccc' }}">
                                    &#9733;
                                </span>
                            @endfor
                        </div>
                    @endif

                </li>
            @endforeach
        </ul>


        <div class="comment-box">
            <form action="{{ route('customer.products.comments.store', $product->id) }}" method="POST">
                @csrf
                <textarea id="comment-input" placeholder="أضف تعليقك..." rows="3" name="comment"></textarea>
                {{-- <button style="margin-right: 810px;" onclick="addComment()">إرسال</button> --}}
                <button style="margin-right: 10px;">إرسال</button>
            </form>

        </div>

        <div class="comments-list" id="comments-list">
            <!-- التعليقات ستظهر هنا -->
        </div>








        <div class="seller-products-slider">
            <h3 style="color: azure;">منتجات ذات صلة</h3>

            <div class="slider-wrapper" style="position: relative;">
                <button class="arrow-btn slideRight left">&#10095;</button>
                <button class="arrow-btn slideLeft right">&#10094;</button>

                <div class="slider-container">



                    @foreach ($relevantProducts as $product)

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
                            <div class="seller">البائع: <span><a href="#">{{ $product->store->user->name }}
                                    </a></span> </div>
                            <div class="actions">
                                <button class="btn-cart">شراء الآن</button>
                                {{-- <i class="fa-solid fa-heart btn-fav"></i> --}}
                                <form action="{{ route('customer.cart.add') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="qty" value="1">
                                    <i class="fa-solid fa-cart-shopping" onclick="this.closest('form').submit()"></i>
                                </form>
                            </div>
                            <div class="published-time" data-time="2025-07-30T10:30:00Z">
                                {{ $product->created_at }}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>

    <script>
        const colorDots = document.querySelectorAll('.color-dot');
        const selectedColorInput = document.getElementById('selectedColor');
        const selectedColorLabel = document.querySelector('.selected-color-label');
        const selectedColorName = document.getElementById('selected-color-name');

        colorDots.forEach(dot => {
            dot.addEventListener('click', () => {
                // إزالة التحديد من كل الدوائر
                colorDots.forEach(d => d.classList.remove('selected'));

                // تمييز الدائرة المختارة
                dot.classList.add('selected');

                // جلب اسم اللون
                const color = dot.getAttribute('data-color');
                selectedColorInput.value = color;
                selectedColorName.textContent = color;
                selectedColorLabel.style.display = 'block';
            });
        });
    </script>



    <script>
        function increaseQty() {
            const input = document.getElementById("quantity");
            input.value = parseInt(input.value) + 1;
        }

        function decreaseQty() {
            const input = document.getElementById("quantity");
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>


    <script>
        function addComment() {
            const comment = document.getElementById("comment-input").value;
            const rating = document.querySelector('input[name="rating"]:checked')?.value;
            if (comment && rating) {
                const stars = '★'.repeat(rating);
                const li = document.createElement("li");
                li.innerHTML = `<strong>أنت:</strong> ${comment} <span class="stars">${stars}</span>`;
                document.getElementById("comments-list").appendChild(li);
                document.getElementById("comment-input").value = "";
                document.querySelectorAll('input[name="rating"]').forEach(el => el.checked = false);
            }
        }
    </script>

    <!-- ========================= scroll-top ========================= -->
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
                                <a href="index.html">
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
                                <img src="{{asset('assets2/images/footer/credit-cards-footer.png') }}" alt="#">
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
                    <a href="{{ route('customer.product.show', $product->id) }}">
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
                        </a>
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
        const buyButtons = document.querySelectorAll('.buy-now-btn');

        buyButtons.forEach(button => {
            button.addEventListener('click', function () {
                const variantId = this.dataset.variantId;
                const qtyInput = this.closest('.variant-card')?.querySelector('.quantity-input');
                const qty = parseInt(qtyInput?.value || 1);

                if (!qty || qty < 1) {
                    alert('الرجاء تحديد كمية صحيحة.');
                    return;
                }

                const checkoutUrl = this.dataset.checkoutUrl;
                console.log("Checkout URL:", checkoutUrl);

                window.location.href = `${checkoutUrl}?variant_id=${variantId}&qty=${qty}`;
            });
        });

        function updateFavCount() {
            const favItems = JSON.parse(localStorage.getItem('favorites')) || [];
            document.getElementById('fav-count').textContent = favItems.length || 0;
        }

        function updateAllCounts() {
            updateCartCount();
            updateFavCount();
        }

        document.addEventListener('DOMContentLoaded', updateAllCounts);

        function changeImage(img) {
            document.querySelector('.main-img').src = img.src;
        }

        function showSellerDetails() {
            const box = document.getElementById('seller-extra-info');
            box.style.display = box.style.display === 'none' ? 'block' : 'none';
        }

        const variants = @json($product->variants);

        function selectVariant(card) {
            // إزالة التحديد من باقي البطاقات
            document.querySelectorAll('.variant-card').forEach(c => {
                c.classList.remove('border-primary');
                c.querySelector('.quantity-selector').style.display = 'none';
            });

            // تمييز البطاقة الحالية
            card.classList.add('border-primary');

            // إظهار selector الكمية
            const qtySelector = card.querySelector('.quantity-selector');
            qtySelector.style.display = 'block';

            // جلب الـ Variant المختار
            const variantId = parseInt(card.getAttribute('data-id'));
            const variant = variants.find(v => v.id === variantId);

            const qtyInput = qtySelector.querySelector('.quantity-input');

            // تحديث قيمة الـ input لتكون صحيحة عند أي تغيير
            qtyInput.addEventListener('input', function () {
                let qty = parseInt(this.value);
                if (qty < 1) qty = 1;
                if (qty > variant.quantity) qty = variant.quantity;
                this.value = qty;
            });
        }

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