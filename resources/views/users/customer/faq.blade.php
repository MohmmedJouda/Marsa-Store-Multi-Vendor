<!DOCTYPE html>
<html class="no-js" lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>واجهة الأسئلة الشائعة</title>
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
  <link rel="stylesheet" href="{{asset('assets2/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets2/css/tiny-slider.css')}}">
  <link rel="stylesheet" href="{{asset('assets2/css/main.css')}}">
  <link rel="stylesheet" href="{{asset('style.css')}}">




</head>

<body>

  <header id="main-header" class="apple-header">
    <nav class="nav">
      <ul class="nav-list">
        <li class="logoheader"><a href="{{ route('customer.main-page') }}"><img src="{{ asset('img/logo.svg') }}"
              class="apple-logo" /></a>
        </li>
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
            @php
              use App\Models\Category;

              $categories = Category::with('subcategories')->get();

              if (Auth::check()) {
                $username = Auth::user()->name;
              } else {
                $username = 'Guest'; // أو أي قيمة افتراضية
              }
            @endphp
            @foreach ($categories as $category)
              <a href="{{ route('customer.category_products.index', $category->id)}}">{{ $category->name }}</a>
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





  <!-- Start Breadcrumbs -->
  <div class="breadcrumbs" lang="en" dir="rtl">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">
          <div class="breadcrumbs-content">
            <h1 class="page-title">الأسئلة الشائعة</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <ul class="breadcrumb-nav">
            <li><a href="{{ route('customer.main-page') }}"><i class="lni lni-home"></i> الرئيسية</a></li>
            <li>الأسئلة الشائعة</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumbs -->














  <section class="faq-dark">
    <div class="faq-wrapper">
      <h2 class="faq-title">الأسئلة الشائعة</h2>

      <div class="faq-item">
        <button class="faq-question">كيف يعمل المتجر؟</button>
        <div class="faq-answer">نحن منصة سوق مفتوح تجمع منتجات من عدة بائعين، ويمكنك الشراء مباشرة من خلال الموقع.</div>
      </div>

      <div class="faq-item">
        <button class="faq-question">هل المنتجات أصلية ومضمونة؟</button>
        <div class="faq-answer">نعم، يتم التحقق من هوية البائعين ومصداقية المنتجات قبل عرضها في المنصة.</div>
      </div>

      <div class="faq-item">
        <button class="faq-question">كيف أتواصل مع البائع؟</button>
        <div class="faq-answer">كل بائع لديه صفحة مخصصة تحتوي على وسيلة تواصل مباشرة وواجهة لعرض منتجاته.</div>
      </div>

      <div class="faq-item">
        <button class="faq-question">ما طرق الدفع المتاحة؟</button>
        <div class="faq-answer">نوفر خيارات دفع متعددة مثل PayPal، البطاقة البنكية، والدفع عند الاستلام في بعض المناطق.
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">هل يمكنني إرجاع المنتج؟</button>
        <div class="faq-answer">نعم، يمكنك إرجاع المنتج خلال 7 أيام وفقًا لشروط الاسترجاع المذكورة في صفحة البائع.</div>
      </div>

      <div class="faq-form">
        <h3>هل لديك سؤال آخر؟</h3>
        <form id="faqForm" action="https://formspree.io/f/your_form_id" method="POST">
          <input type="text" name="name" placeholder="اسمك" required>
          <input type="email" name="email" placeholder="بريدك الإلكتروني" required>
          <textarea name="question" placeholder="اكتب سؤالك هنا..." required></textarea>
          <button type="submit">إرسال</button>
        </form>
        <p id="faq-success-msg" class="success-msg hidden">✓ تم إرسال سؤالك بنجاح!</p>
      </div>
    </div>
  </section>













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
                <p>Designed and Developed by<a href="https://graygrids.com/" rel="nofollow" target="_blank">WIC std</a>
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
    <h3> <a href="{{ route('customer.cart.index') }}">سلة المشتريات</a> </h3>
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















  <!-- ========================= scroll-top ========================= -->
  <a href="#" class="scroll-top">
    <i class="lni lni-chevron-up"></i>
  </a>

  <!-- ========================= JS here ========================= -->
  <script src="{{asset('assets2/js/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets2/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets2/js/main.js')}}"></script>
  <script src="{{asset('assets2/js/jsmain.js')}}"></script>
  <script src="{{asset('assets2/js/js/tiny-slider.js')}}"></script>
  <script type="text/javascript">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>AOS.init();</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  //========= glightbox
  GLightbox({
  'href':
  'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
  'type': 'video',
  'source': 'youtube', //vimeo, youtube or local
  'width': 900,
  'autoplayVideos': true,
  });
  </script>




  <script>
    // الأكوردين
    document.querySelectorAll('.faq-question').forEach(btn => {
        btn.addEventListener('click', () => {
          btn.classList.toggle('active');
          const answer = btn.nextElementSibling;
          if (btn.classList.contains('active')) {
            answer.style.maxHeight = answer.scrollHeight + 'px';
          } else {
            answer.style.maxHeight = null;
          }
        });
    });

      // إرسال النموذج
      const form = document.getElementById("faqForm");
      const successMsg = document.getElementById("faq-success-msg");

      form.addEventListener("submit", function (e) {
        e.preventDefault();
      const formData = new FormData(form);
      fetch(form.action, {
        method: "POST",
      body: formData,
      headers: {'Accept': 'application/json' }
      })
        .then(response => {
          if (response.ok) {
        successMsg.classList.remove("hidden");
      form.reset();
          } else {
        alert("حدث خطأ أثناء الإرسال. حاول مرة أخرى.");
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

  </script>


  <script src="assets/js/main.js"></script>
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