<div class="side-menu">
    <div class="side-menu-body">
        <ul>
            <li class="side-menu-divider">فهرست</li>
            <li><a href="{{--{{route('index_front')}}--}}"><i class="icon ti-home"></i> <span>صفحه اصلی</span> </a>
                <ul>
                    <li><a href="#">منو</a>
                        <ul>
                            <li><a href="{{route('primary.create')}}">ایجاد</a></li>
                            <li><a href="{{route('primary.index')}}">لیست</a></li>
                        </ul>
                    </li>
                    <li><a href="#">اسلایدر</a>
                        <ul>
                            <li><a href="{{route('slider1.create')}}">ایجاد</a></li>
                            <li><a href="{{route('slider1.index')}}">لیست</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('ourDescription.create')}}">توضیحات ما</a></li>
                    <li><a href="#">صحبت مشتری ها</a>
                        <ul>
                            <li><a href="{{route('customerSay.create')}}">ایجاد</a></li>
                            <li><a href="{{route('customerSay.index')}}">لیست</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('free_advice.create')}}">مشاوره رایگان</a></li>
                </ul>
            </li>
            <li><a href="{{--{{route('index_front')}}--}}"><i class="icon ti-book"></i> <span>مقاله</span> </a>
                <ul>
                    <li><a href="{{route('blog.create')}}">افزودن مقاله</a></li>
                    <li><a href="{{route('blog.index')}}">لیست مقاله ها</a></li>
                    <li><a href="{{route('blog_message.create')}}">لیست پیام ها</a></li>
                    <li><a href="/blog/blogCategory">دسته بندی</a></li>
                    <li><a href="/blog/blogTag">تگ</a></li>
                </ul>
            </li>
            <li><a href="{{route('social_media.create')}}"><i class="icon ti-cloud"></i><span>فضای مجازی</span></a></li>
            <li><a href="{{route('setting.create')}}"><i class="icon ti-settings"></i><span>تنظیمات</span></a></li>
            <li><a href="#"><i class="icon ti-briefcase"></i> <span>خدمات</span> </a>
                <ul>
                    <li><a href="#">درباره خدمات</a>
                        <ul>
                            <li><a href="{{route('about-service.create')}}">افزودن</a></li>
                            <li><a href="{{route('about-service.index')}}">لیست</a></li>
                        </ul>
                    </li>
                    <li><a href="#">نتایج خدمات</a>
                        <ul>
                            <li><a href="{{route('result.create')}}">افزودن</a></li>
                            <li><a href="{{route('result.index')}}">لیست</a></li>
                        </ul>
                    </li>
                    <li><a href="#">روند کار</a>
                        <ul>
                            <li><a href="{{route('steps.create')}}">افزودن</a></li>
                            <li><a href="{{route('steps.index')}}">لیست</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('other-info.create')}}">اطلاعات اضافی</a></li>
                    <li><a href="{{route('service-category.create')}}">دسته بندی</a></li>
                    <li><a href="#">تعرفه</a>
                        <ul>
                            <li><a href="{{route('tariff.create')}}">ایجاد</a></li>
                            <li><a href="{{route('tariff.index')}}">لیست تعرفه</a></li>
                            <li><a href="{{route('tariff_detail.create')}}">جزئیات تعرفه</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#"><i class="icon ti-user"></i> <span>درباره ما</span> </a>
                <ul>
                    <li><a href="{{route('aboutUs.create')}}">ایجاد</a></li>
                    <li><a href="{{route('aboutUsSkill.create')}}">مهارت های ما</a></li>
                    <li><a href="{{route('ourTeam.create')}}">تیم ما</a>
                        <ul>
                            <li><a href="{{route('ourTeam.create')}}">ایجاد</a></li>
                            <li><a href="{{route('ourTeam.index')}}">لیست</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('partners.create')}}">شرکای ما</a>
                        <ul>
                            <li><a href="{{route('partners.create')}}">ایجاد</a></li>
                            <li><a href="{{route('partners.index')}}">لیست</a></li>
                        </ul></li>
                </ul>
            </li>
            <li><a href="#"><i class="icon ti-bag"></i><span>نمونه کار</span></a>
                <ul>
                    <li><a href="{{route('portfolio.create')}}">افزودن</a></li>
                    <li><a href="{{route('portfolio.index')}}">لیست</a></li>
                    <li><a href="{{route('portfolioCategory.create')}}">دسته بندی</a></li>
                    <li><a href="{{route('portfolioCategory.index')}}">لیست دسته بندی</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="icon ti-mobile"></i><span>تماس با ما</span></a>
                <ul>
                    <li><a href="{{route('info.create')}}">اطلاعات و جزئیات</a></li>
                    <li><a href="{{route('message.create')}}">پیام ها</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>