@extends('front.master.master')
@section('content')
    <section id="title_breadcrumbs_bar">
        <div class="container">
            <div class="row">
                <div class="span8">
                    <h1>کوه بهشت</h1>
                </div>
                <div class="span4 left_aligned">
                    <div class="breadcrumbs">
                        <a href="index.html">خانه</a>
                        <i class="ABdev_icon-chevron-left"></i>
                        <span class="current">نمونه کار</span>
                        <i class="ABdev_icon-chevron-left"></i>
                        <span class="current">کوه بهشت</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="span8 content_with_right_sidebar">
                    <img src="/front/images/item_0004_9573354587_8636f7b080_h.jpg" class="portfolio_item_image" alt="">
                </div>
                <div id="portfolio_item_meta" class="span4">
                    <h2 class="column_title_left">توضیحات</h2>
                    <p>
                        لورم ایپسوم یا طرح‌نما به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد.
                    </p>
                    <h2 class="column_title_left">جزئیات</h2>
                    <p class="portfolio_single_detail">
                        <span class="portfolio_item_meta_label">تاریخ:</span>
                        <span class="portfolio_item_meta_data">22 آگوست 2015</span>
                    </p>
                    <p class="portfolio_single_detail">
                        <span class="portfolio_item_meta_label">مشتری:</span>
                        <span class="portfolio_item_meta_data">مهدی</span>
                    </p>
                    <p class="portfolio_single_detail">
                        <span class="portfolio_item_meta_label">دسته بندی:</span>
                        <span class="portfolio_item_meta_data">هویت، UI/UX</span>
                    </p>
                    <p class="portfolio_single_detail">
                        <span class="portfolio_item_meta_label">مهارت های مورد استفاده:</span>
                        <span class="portfolio_item_meta_data">مدل سازی 3D، فتوشاپ</span>
                    </p>
                    <p class="portfolio_item_view_link">
                        <a href="#" target="_self">مشاهده وب سایت</a>
                    </p>
                    <p class="post_meta_share portfolio_share_social">
                        <a class="post_share_facebook" href="#"><i class="ABdev_icon-facebook"></i></a>
                        <a class="post_share_twitter" href="#"><i class="ABdev_icon-twitter"></i></a>
                        <a class="post_share_googleplus" href="#"><i class="ABdev_icon-googleplus"></i></a>
                        <a class="post_share_linkedin" href="#"><i class="ABdev_icon-linkedin"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="related_portfolio">
        <div class="container">
            <h3 class="column_title_left">پروژه های مشابه</h3>
            <div class="row">
                <div class="portfolio_item portfolio_item_4 identity illustrations">
                    <div class="overlayed">
                        <img src="/front/images/item_0001_9435123826_e89b552f7a_b.jpg" alt="">
                        <a class="overlay" href="portfolio_single.html">
                            <p class="overlay_title">آسمان</p>
                            <p class="portfolio_item_tags">هویت، تصاویر</p>
                        </a>
                    </div>
                </div>
                <div class="portfolio_item portfolio_item_4 branding identity">
                    <div class="overlayed">
                        <img src="/front/images/item_0000_9814949385_07c193c89c_h.jpg" alt="">
                        <a class="overlay" href="portfolio_single.html">
                            <p class="overlay_title">آبشار</p>
                            <p class="portfolio_item_tags">نام تجاری، هویت</p>
                        </a>
                    </div>
                </div>
                <div class="portfolio_item portfolio_item_4 branding uiux">
                    <div class="overlayed">
                        <img src="/front/images/item_0006_9913190443_cb17108aad_h-e1393843274377.jpg" alt="">
                        <a class="overlay" href="portfolio_single.html">
                            <p class="overlay_title">خانه رویایی من</p>
                            <p class="portfolio_item_tags">نام تجاری، UI / UX</p>
                        </a>
                    </div>
                </div>
                <div class="portfolio_item portfolio_item_4 illustrations uiux">
                    <div class="overlayed">
                        <img src="/front/images/item_0002_8765284634_b5d78eca5e_b.jpg" alt="">
                        <a class="overlay" href="portfolio_single.html">
                            <p class="overlay_title">جزیره خصوصی</p>
                            <p class="portfolio_item_tags">تصاویر، UI / UX</p>
                        </a>
                    </div>
                </div>
            </div>
            <div id="single_portfolio_pagination" class="clearfix">
				<span class="prev">
					<a href="portfolio_single.html" rel="prev"><i class="ABdev_icon-chevron-right"></i> آسمان</a>
				</span>
                <span class="next">
					<a href="portfolio_single.html" rel="next">جزیره خصوصی <i class="ABdev_icon-chevron-left"></i></a>
				</span>
            </div>
        </div>
    </section>
@endsection