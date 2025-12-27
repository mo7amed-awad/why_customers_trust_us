@php($title = setting('title_' . lang()))
@php($keywords = setting('keywords_' . lang()))
@php($desc = setting('desc_' . lang()))
@php($logo = setting('logo'))
<meta charset="UTF-8" />
<title>{{setting('title_'.lang())}}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="canonical" href="{{ url()->full() }}">
<link rel="sitemap" href="/sitemap.xml" title="Sitemap" type="application/xml">
<link href="{{ $logo }}" rel="shortcut icon">
<meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1">
<meta name="description" content="{{ $desc }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="{{ $title }}">
<meta name="image" content="{{ asset($logo) }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $desc }}">
<meta property="og:locale" content="en">
<meta property="og:image" content="{{ $logo }}">
<meta property="og:url" content="{{ url()->full() }}">
<meta property="og:site_name" content="{{ $title }}">
<meta property="og:type" content="website">
<meta name="twitter:card" content="{{ $title }}">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $desc }}">
<meta name="twitter:site" content="{{ $title }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Cairo:wght@200..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/bootstrap-icon/bootstrap-icons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/aos/aos.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/glightbox/css/glightbox.min.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
<link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.16/build/css/intlTelInput.css"/>
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
