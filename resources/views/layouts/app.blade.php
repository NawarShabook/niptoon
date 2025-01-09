<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Niptoon Company')</title>
    <meta data-n-head="ssr" name="theme-color" content="#f45050">
    <meta data-n-head="ssr" data-hid="og:site_name" property="og:site_name" content="Niptoon Company">
    <meta data-n-head="ssr" data-hid="og:type" property="og:type" content="website">
    <meta data-n-head="ssr" data-hid="twitter:card" name="twitter:card" content="summary_large_image">
    <meta data-n-head="ssr" data-hid="og:image" property="og:image" content="{{asset('imgs/icon-Niptoon.png')}}">
    <meta data-n-head="ssr" data-hid="og:image:secure_url" property="og:image:secure_url"
        content="{{asset('imgs/icon-Niptoon.png')}}">
    <meta data-n-head="ssr" data-hid="og:image:alt" property="og:image:alt" content="Niptoon Company">
    <meta data-n-head="ssr" data-hid="twitter:image" name="twitter:image" content="{{asset('imgs/icon-Niptoon.png')}}">
    <meta data-n-head="ssr" data-hid="charset" charset="utf-8">
    <meta data-n-head="ssr" data-hid="mobile-web-app-capable" name="mobile-web-app-capable" content="yes">
    <meta data-n-head="ssr" data-hid="apple-mobile-web-app-capable" name="apple-mobile-web-app-capable" content="yes">
    <meta data-n-head="ssr" data-hid="apple-mobile-web-app-status-bar-style"
        name="apple-mobile-web-app-status-bar-style" content="default">
    <meta data-n-head="ssr" data-hid="apple-mobile-web-app-title" name="apple-mobile-web-app-title"
        content="Niptoon Company">
    <meta data-n-head="ssr" data-hid="author" name="author" content="Niptoon Company">
    <meta data-n-head="ssr" data-hid="i18n-og" property="og:locale" content="ar">
    <meta data-n-head="ssr" data-hid="description" name="description" content="Niptoon Company">
    <meta data-n-head="ssr" data-hid="og:title" property="og:title" content="Niptoon Company">
    <meta data-n-head="ssr" data-hid="og:description" property="og:description" content="Niptoon Company">
    <meta data-n-head="ssr" data-hid="twitter:title" name="twitter:title" content="Niptoon Company">
    <meta data-n-head="ssr" data-hid="twitter:description" name="twitter:description" content="Niptoon Company">
    <link data-n-head="ssr" rel="icon" type="image/png" href="{{asset('imgs/icon-Niptoon.png')}}">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{asset('imgs/icon-Niptoon.png')}}">
    <!-- End Head Info -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>


<body id="body">
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            page=document.getElementById('page');
            title=page.getAttribute('page');
            document.getElementsByClassName(title)[0].classList.add('active');
            document.getElementsByClassName(title)[1].classList.add('active');
        });

    </script>

    @yield('script')

</body>

</html>
