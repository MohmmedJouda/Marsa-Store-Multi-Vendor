<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>نموذج التسجيل والدخول</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- AOS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google Font: Tajawal -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">


    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets2/css/loginstyle.css') }}">
    <!-- <link rel="stylesheet" href="style.css"> -->


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Cairo+Play:wght@600&family=Cairo:wght@200..1000&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="overlay">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-3 shadow" role="alert"
                style="z-index: 9999; min-width: 250px;">
                <strong>خطأ!</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">تسجيل
                الدخول</label>
            <input id="tab-3" type="radio" name="tab" class="sign-third">
            <label for="tab-3" class="tab">مشترٍ جديد</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up">

            <label for="tab-2" class="tab">
                <a href="{{ route('vendor.register') }}">
                    بائع جديد
                </a>
            </label>

            <div class="login-form">
                <!-- نموذج تسجيل الدخول -->
                <div class="sign-in-htm">

                    <div class="group text-center">
                        <a href="{{ route('guest.main-page') }}">
                            <img src="{{ asset('assets2/images/logo/logo.svg') }}" alt="">

                        </a>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="group">
                            <label for="signin-id" class="label">البريد الالكتروني</label>
                            <input id="signin-id" name="email" type="email" class="input" required>
                        </div>
                        <div class="group">
                            <label for="signin-code" class="label">كلمة المرور</label>
                            <input id="signin-code" name="password" type="password" class="input" required>
                        </div>


                        <div class="hr"></div>
                        <button type="submit" class="submit-btn">دخول</button>
                    </form>
                    <p class="link"><a href="#">نسيت كلمة المرور؟</a></p>
                    <button class="google-btn">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Logo">
                        <a href="{{ url('/auth/google') }}"> التسجيل عبر Google </a>
                    </button>
                </div>

                <!-- نموذج التسجيل -->
                <div class="sign-up-htm">
                    <form id="registerForm">
                        <div class="group" action="{{ route('vendor.register') }}" method="POST"
                            enctype="multipart/form-data" class="p-6">
                            @csrf

                            <div class="group">
                                <label class="label">اسم البائع كامل</label>
                                <input type="text" name="name" class="input" placeholder="أدخل اسمك الكامل" required>
                            </div>
                            <div class="group">
                                <label for="email" class="label">البريد الالكتروني</label>
                                <input id="email" name="email" type="email" class="input" required>
                            </div>
                            <div class="group">
                                <label for="reg-phone" class="label">كلمة المرور</label>
                                <input id="reg-phone" type="password" class="input" required>
                            </div>
                            <div class="group">
                                <label for="reg-phone" class="label">تأكيد كلمة المرور</label>
                                <input id="reg-phone" type="password" class="input" required>
                            </div>

                            <div class="group">
                                <label class="label" style="text-align: center; color: hwb(26 31% 3%);"> اسم الدكان |
                                    فريد
                                    من نوعه و يحمل
                                    هويتك التجارية و بصمتك السوقية الخاصة بك </label>
                                <input type="text" class="input" required>
                            </div>
                            <div class="group">
                                <input type="submit" class="button" value="أنشئ الحساب">
                            </div>
                        </div>


                    </form>
                </div>




                <!-- الواجهة الثالثة (منسوخة من sign-up-htm) -->
                <div class="sign-third-htm">
                    <form id="thirdForm" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="group">
                            <label for="name" class="label"> الاسم</label>
                            <input id="name" name="name" type="text" class="input" autofocus required>
                        </div>
                        <div class="group">
                            <label for="email" class="label">البريد الالكتروني</label>
                            <input id="email" name="email" type="email" class="input" required>
                        </div>
                        <div class="group">
                            <label for="password" class="label">كلمة المرور</label>
                            <input id="password" name="password" type="password" class="input" required>
                        </div>
                        <div class="group">
                            <label for="password_confirmation" class="label">تأكيد كلمة المرور</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="input"
                                required>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="أنشئ الحساب">
                        </div>
                    </form>

                    <button class="google-btn ">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Logo">
                        <a href="{{ url('/auth/google') }}"> التسجيل عبر Google </a>
                    </button>

                </div>




            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function (e) {
            e.preventDefault();
            Swal.fire({
                icon: 'success',
                title: 'تم تقديم الطلب',
                text: 'سيتم التواصل معك عبر SMS في حال قبول أو رفض الطلب',
                confirmButtonText: 'حسنًا'
            });
        });
    </script>
</body>

</html>