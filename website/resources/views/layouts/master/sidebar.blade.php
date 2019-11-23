<div class="side-menu">
    <div class="side-menu-body">
        <ul>
            <li class="side-menu-divider">فهرست</li>
            <li @if(Request::is('admin/index*')) class="open" @endif><a href="javascript:void(0)"
                                                                        @if(Request::is('index*')) class="active" @endif><i
                            class="icon ti-home"></i> <span>صفحه اصلی</span> </a>
                <ul>
                    <li @if(Request::is('admin/index/primary*')) class="open" @endif><a
                                href="javascript:void(0)">منو</a>
                        <ul>
                            <li><a href="{{route('primary.create')}}"
                                   @if(Request::is('admin/index/primary/create')) class="active" @endif>ایجاد</a></li>
                            <li><a href="{{route('primary.index')}}"
                                   @if(Request::is('admin/index/primary')) class="active" @endif>لیست</a></li>
                        </ul>
                    </li>
                    <li @if(Request::is('admin/index/slider1*')) class="open" @endif><a href="javascript:void(0)">اسلایدر</a>
                        <ul>
                            <li><a href="{{route('slider1.create')}}"
                                   @if(Request::is('admin/index/slider1/create')) class="active" @endif>ایجاد</a></li>
                            <li><a href="{{route('slider1.index')}}"
                                   @if(Request::is('admin/index/slider1')) class="active" @endif>لیست</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('ourDescription.create')}}"
                           @if(Request::is('admin/index/ourDescription/create')) class="active" @endif>توضیحات ما</a>
                    </li>
                    <li @if(Request::is('admin/index/customerSay*')) class="open" @endif><a href="javascript:void(0)">صحبت
                            مشتری ها</a>
                        <ul>
                            <li><a href="{{route('customerSay.create')}}"
                                   @if(Request::is('admin/index/customerSay/create')) class="active" @endif>ایجاد</a>
                            </li>
                            <li><a href="{{route('customerSay.index')}}"
                                   @if(Request::is('admin/index/customerSay')) class="active" @endif>لیست</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('free_advice.create')}}"
                           @if(Request::is('admin/index/free_advice/create')) class="active" @endif>مشاوره رایگان</a>
                    </li>
                </ul>
            </li>
            <li @if(Request::is('admin/blog*')) class="open" @endif><a href="javascript:void(0)"><i
                            class="icon ti-book"></i> <span>مقاله</span> </a>
                <ul>
                    <li><a href="/admin/blog/create" @if(Request::is('admin/blog/create')) class="active" @endif>افزودن
                            مقاله</a></li>
                    <li><a href="/admin/blog" @if(Request::is('admin/blog')) class="active" @endif>لیست مقاله ها</a>
                    </li>
                    <li><a href="{{route('blog_message.create')}}"
                           @if(Request::is('admin/blog_message/create')) class="active" @endif>لیست پیام ها</a></li>
                    <li><a href="/admin/blogCategory" @if(Request::is('admin/blogCategory')) class="active" @endif>دسته
                            بندی</a></li>
                    <li><a href="/admin/blogTag" @if(Request::is('admin/blogTag')) class="active" @endif>تگ</a></li>
                </ul>
            </li>
            <li><a href="{{route('social_media.create')}}"
                   @if(Request::is('admin/info/social_media/create')) class="active" @endif><i
                            class="icon ti-cloud"></i><span>فضای مجازی</span></a></li>
            <li><a href="{{route('setting.create')}}"
                   @if(Request::is('admin/info/setting/create')) class="active" @endif><i
                            class="icon ti-settings"></i><span>تنظیمات</span></a></li>
            <li @if(Request::is('admin/service*')) class="open" @endif><a href="javascript:void(0)"><i
                            class="icon ti-briefcase"></i> <span>خدمات</span> </a>
                <ul>
                    <li @if(Request::is('admin/service/about-service*')) class="open" @endif><a
                                href="javascript:void(0)">درباره خدمات</a>
                        <ul>
                            <li><a href="{{route('about-service.create')}}"
                                   @if(Request::is('admin/service/about-service/create')) class="active" @endif>افزودن</a>
                            </li>
                            <li><a href="{{route('about-service.index')}}"
                                   @if(Request::is('admin/service/about-service')) class="active" @endif>لیست</a></li>
                        </ul>
                    </li>
                    <li @if(Request::is('admin/service/result*')) class="open" @endif><a href="javascript:void(0)">نتایج
                            خدمات</a>
                        <ul>
                            <li><a href="{{route('result.create')}}"
                                   @if(Request::is('admin/service/result/create')) class="active" @endif>افزودن</a></li>
                            <li><a href="{{route('result.index')}}"
                                   @if(Request::is('admin/service/result')) class="active" @endif>لیست</a></li>
                        </ul>
                    </li>
                    <li @if(Request::is('admin/service/steps*')) class="open" @endif><a href="javascript:void(0)">روند
                            کار</a>
                        <ul>
                            <li><a href="{{route('steps.create')}}"
                                   @if(Request::is('admin/service/steps/create')) class="active" @endif>افزودن</a></li>
                            <li><a href="{{route('steps.index')}}"
                                   @if(Request::is('admin/service/steps')) class="active" @endif>لیست</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('other-info.create')}}"
                           @if(Request::is('admin/service/other-info/create')) class="active" @endif>اطلاعات اضافی</a>
                    </li>
                    <li><a href="{{route('service-category.create')}}"
                           @if(Request::is('admin/service/service-category/create')) class="active" @endif>دسته بندی</a>
                    </li>
                    <li @if(Request::is('admin/service/tariff*')) class="open" @endif><a
                                href="javascript:void(0)">تعرفه</a>
                        <ul>
                            <li><a href="{{route('tariff.create')}}"
                                   @if(Request::is('admin/service/tariff/create')) class="active" @endif>ایجاد</a></li>
                            <li><a href="{{route('tariff.index')}}"
                                   @if(Request::is('admin/service/tariff')) class="active" @endif>لیست تعرفه</a></li>
                            <li><a href="{{route('tariff_detail.create')}}"
                                   @if(Request::is('admin/service/tariff_detail/create')) class="active" @endif>جزئیات
                                    تعرفه</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li @if(Request::is('admin/about_us*')) class="open" @endif><a href="javascript:void(0)"><i
                            class="icon ti-user"></i> <span>درباره ما</span> </a>
                <ul>
                    <li><a href="{{route('aboutUs.create')}}"
                           @if(Request::is('admin/about_us/aboutUs/create')) class="active" @endif >ایجاد</a></li>
                    <li><a href="{{route('aboutUsSkill.create')}}"
                           @if(Request::is('admin/about_us/aboutUsSkill/create')) class="active" @endif>مهارت های ما</a>
                    </li>
                    <li @if(Request::is('admin/about_us/ourTeam*')) class="open" @endif><a href="javascript:void(0)">تیم
                            ما</a>
                        <ul>
                            <li><a href="{{route('ourTeam.create')}}"
                                   @if(Request::is('admin/about_us/ourTeam/create')) class="active" @endif>ایجاد</a>
                            </li>
                            <li><a href="{{route('ourTeam.index')}}"
                                   @if(Request::is('admin/about_us/ourTeam')) class="active" @endif>لیست</a></li>
                        </ul>
                    </li>
                    <li @if(Request::is('admin/about_us/partners*')) class="open" @endif><a href="javascript:void(0)">شرکای
                            ما</a>
                        <ul>
                            <li><a href="{{route('partners.create')}}"
                                   @if(Request::is('admin/about_us/partners/create')) class="active" @endif>ایجاد</a>
                            </li>
                            <li><a href="{{route('partners.index')}}"
                                   @if(Request::is('admin/about_us/partners')) class="active" @endif>لیست</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li @if(Request::is('admin/portfolio*')) class="open" @endif><a href="javascript:void(0)"><i
                            class="icon ti-bag"></i><span>نمونه کار</span></a>
                <ul>
                    <li><a href="/admin/portfolio/create"
                           @if(Request::is('admin/portfolio/create')) class="active" @endif >افزودن</a></li>
                    <li><a href="/admin/portfolio/" @if(Request::is('admin/portfolio')) class="active" @endif >لیست</a>
                    </li>
                    <li><a href="{{route('portfolioCategory.create')}}"
                           @if(Request::is('admin/portfolioCategory/create')) class="active" @endif >دسته بندی</a></li>
                    <li><a href="{{route('portfolioCategory.index')}}"
                           @if(Request::is('admin/portfolioCategory')) class="active" @endif>لیست دسته بندی</a></li>
                </ul>
            </li>
            <li @if(Request::is('admin/contact-us*')) class="open" @endif><a href="#"><i
                            class="icon ti-mobile"></i><span>تماس با ما</span></a>
                <ul>
                    <li><a href="{{route('info.create')}}"
                           @if(Request::is('admin/contact-us/info/create')) class="active" @endif>اطلاعات و جزئیات</a>
                    </li>
                    <li><a href="{{route('message.create')}}"
                           @if(Request::is('admin/contact-us/message/create')) class="active" @endif>پیام ها</a></li>
                </ul>
            </li>


            {{--            @can('admin_section')--}}
            <li @if(Request::is('admin/admin*')) class="open" @endif>
                <a href="#"><i class="icon ti-user"></i> <span>مدیریت کاربران</span></a>
                <ul>
                    {{--@can('adminCreate')--}}
                    <li><a
                                @if(Request::is('admin/admin/create')) class="active"
                                @endif  href="{{route('admin.create')}}">افزودن کاربر</a>
                    </li>
                    {{--@endcan--}}
                    {{--@can('adminList')--}}
                    <li><a @if(Request::is('admin/admin')) class="active" @endif href="{{route('admin.index')}}">لیست کاربران</a></li>
                    {{--@endcan--}}

                </ul>
            </li>
            {{--@endcan--}}

            {{--            @can('roles_section')--}}
            <li @if(Request::is('admin/role*')) class="open" @endif>
                <a href="#"><i class="icon ti-bag"></i> <span>بخش نقش ها</span></a>
                <ul>
                    {{--                                            @can('adminCreate')--}}
                    <li><a @if(Request::is('admin/role/create')) class="active" @endif
                        href="{{route('role.create')}}">افزودن</a></li>
                    <li><a @if(Request::is('admin/role')) class="active" @endif
                        href="{{route('role.index')}}">لیست</a></li>
                    {{--@endcan--}}
                </ul>
            </li>
            {{--@endcan--}}

            {{--@can('access_section')--}}
            <li @if(Request::is('admin/permission*')) class="open" @endif>
                <a href="#"><i class="icon ti-cloud"></i> <span>بخش دسترسی ها</span></a>
                <ul>
                    <li><a  @if(Request::is('admin/permission/create')) class="active" @endif
                                href="{{route('permission.create')}}">افزودن</a>
                    </li>
                    <li><a  @if(Request::is('admin/permission')) class="active" @endif
                                href="{{route('permission.index')}}">لیست</a></li>
                </ul>
            </li>
            {{--@endcan--}}
        </ul>
    </div>
</div>