<!DOCTYPE html>
<html lang="fa-IR">

<head>
    <title>Dzen - قالب HTML چندمنظوره</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="/front/images/favicon.png">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/front/rs-plugin/css/settings.css" type="text/css" media="all">
    <link rel="stylesheet" href="/front/css/whhg.css" type="text/css" media="all">
    <link rel="stylesheet" href="/front/css/scripts.css" type="text/css" media="all">
    <link rel="stylesheet" href="/front/css/style.css" type="text/css" media="all"> </head>

<body>
<header id="dz_main_header" class="clearfix">
    <div class="container">
        <div id="logo">
            <a href="/"><img src="/front/images/logo.png" alt=""></a>
        </div>
        <nav>
            <ul id="main_menu">
                <li @if(Request::is('/')) class="current-menu-item" @endif><a href="/">صفحه اصلی</a></li>
                <li @if(Request::is('services*')) class="current-menu-item" @endif><a href="/services">خدمات</a></li>
                <li @if(Request::is('about_us*')) class="current-menu-item" @endif><a href="/about_us">درباره ما</a></li>
                <li @if(Request::is('portfolio*')) class="current-menu-item" @endif> <a href="/portfolio">نمونه کارها</a>
                    {{--<ul>
                        <li><a href="portfolio_column_4.html">نمونه کار 4 ستونه</a></li>
                        <li><a href="portfolio_column_3.html">نمونه کار 3 ستونه</a></li>
                        <li><a href="portfolio_column_single.html">نمونه پروژه</a></li>
                    </ul>--}}
                </li>
                <li @if(Request::is('blog*')) class="current-menu-item" @endif> <a href="/blog">وبلاگ</a>
                    {{--<ul>
                        <li><a href="right_sidebar_blog.html">نوار کناری راست</a></li>
                        <li><a href="fullwidth_blog.html">عرض کامل</a></li>
                        <li><a href="left_sidebar_blog.html">نوار کناری چپ</a></li>
                        <li><a href="timeline_blog.html">تایم لاین</a></li>
                    </ul>--}}
                </li>
                {{--<li> <a href="shortcodes.html">امکانات</a>
                    <ul>
                        <li><a href="shortcodes.html">کد کوتاه</a></li>
                        <li><a href="typography.html">تایپوگرافی</a></li>
                        <li class="current-menu-item"><a href="404_page.html">صفحه 404</a></li>
                    </ul>
                </li>--}}
                <li @if(Request::is('contact-us*')) class="current-menu-item" @endif><a href="/contact-us">تماس با ما</a></li>
            </ul>
        </nav>
        <div id="ABdev_menu_toggle"> <i class="ABdev_icon-menu"></i> </div>
    </div>
</header>
<div id="dz_header_spacer"> </div>