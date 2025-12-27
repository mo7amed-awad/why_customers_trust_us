<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if(lang('ar')) فشل الدفع @else Payment Failed @endif</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            background: linear-gradient(135deg, #f8d7da, #fff);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .card {
            max-width: 500px;
            margin: auto;
            border-radius: 1rem;
            box-shadow: 0px 6px 20px rgba(0,0,0,0.15);
            background: #fff;
            padding: 2rem;
        }
        .icon {
            font-size: 90px;
            color: #dc3545;
            animation: shake 1s ease-in-out;
        }
        @keyframes shake {
            0% { transform: scale(1) rotate(0deg); }
            25% { transform: scale(1.1) rotate(5deg); }
            50% { transform: scale(1) rotate(-5deg); }
            75% { transform: scale(1.1) rotate(5deg); }
            100% { transform: scale(1) rotate(0deg); }
        }
        .btn {
            border-radius: 50px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="card text-center animate__animated animate__fadeInDown">
        <div class="icon mb-3">❌</div>
        <h2 class="text-danger fw-bold">
            @if(lang('ar'))
                فشل الدفع
            @else
                Payment Failed
            @endif
        </h2>
        <p class="text-muted mb-4">
            @if(lang('ar'))
                عذرًا! حدث خطأ أثناء معالجة الدفع.<br>
                الرجاء المحاولة مرة أخرى أو الاتصال بالدعم إذا استمرت المشكلة.
            @else
                Oops! Something went wrong while processing your payment.<br>
                Please try again or contact support if the problem continues.
            @endif
        </p>
        
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('client.home') }}" class="btn btn-outline-success animate__animated animate__fadeInUp">
                @if(lang('ar'))
                    العودة للصفحة الرئيسية
                @else
                    📱 Back to Home Page
                @endif
            </a>
        </div>
    </div>
</body>
</html>
