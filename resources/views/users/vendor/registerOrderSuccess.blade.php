<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>حالة الطلب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

    <div class="card p-4 shadow text-end" style="min-width: 350px;">
        @if($status === 'pending')
            <div class="alert alert-warning m-0" role="alert">
                <strong>تم تقديم طلبك بنجاح!</strong>
                <br>حسابك تحت المراجعة من قبل الإدارة.
                <br>
                <a href="{{ route('guest.main-page') }}" class="alert-link">يمكنك تصفح المتجر من هنا</a>
            </div>
        @elseif($status === 'rejected')
            <div class="alert alert-danger m-0" role="alert">
                <strong>تم رفض طلبك!</strong>
                <br>يرجى مراجعة المستندات أو الاتصال بالدعم.
                <br>
                <a href="{{ route('guest.main-page') }}" class="alert-link">يمكنك تصفح المتجر من هنا</a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>