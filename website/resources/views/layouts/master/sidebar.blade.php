<div class="side-menu">
    <div class="side-menu-body">
        <ul>
            <li class="side-menu-divider">فهرست</li>
            <li><a href="{{--{{route('index_front')}}--}}"><i class="icon ti-home"></i> <span>صفحه اصلی</span> </a>
                <ul>
                    <li><a href="{{route('primary.create')}}">هدر و منو</a></li>
                    <li><a href="{{route('slider1.create')}}">اسلایدر1</a></li>
                    <li><a href="{{route('ourDescription.create')}}">توضیحات ما</a></li>
                    <li><a href="{{route('aboutUs.create')}}">درباره ما</a></li>
                    <li><a href="#">نمونه کار</a>
                        <ul>
                            <li><a href="{{route('portfolio.create')}}">افزودن</a></li>
                            <li><a href="{{route('portfolioCategory.create')}}">دسته بندی</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('customerSay.create')}}">صحبت مشتری ها</a></li>
                    <li><a href="{{route('ourTeam.create')}}">تیم ما</a></li>
                    <li><a href="{{route('free_advice.create')}}">مشاوره رایگان</a></li>
                </ul>
            </li>
            <li><a href="{{--{{route('index_front')}}--}}"><i class="icon ti-home"></i> <span>مقاله</span> </a>
                <ul>
                    <li><a href="{{route('blog.create')}}">افزودن مقاله</a></li>
                    <li><a href="{{route('blog.index')}}">لیست مقاله ها</a></li>
                    <li><a href="/blogCategory">دسته بندی</a></li>
                    <li><a href="/blogTag">تگ</a></li>
                </ul>
            </li>
            <li><a href="{{route('social_media.create')}}">فضای مجازی</a></li>
            <li><a href="{{route('setting.create')}}">تنظیمات</a></li>
            {{--<li><a href="widgets.html"><i class="icon ti-paint-bucket"></i> <span>ویجت‌ها</span> </a></li>
            <li><a data-attr="layout-builder-toggle" href="#">
                    <i class="icon ti-layout"></i> <span>طرح ها</span> <span class="badge bg-danger-gradient">8+</span></a>
            </li>
            <li><a href="#"><i class="icon ti-rocket"></i> <span>اپ ها</span> </a>
                <ul>
                    <li><a href="chat.html">گفتگو </a></li>
                    <li><a href="#">ایمیل </a>
                        <ul>
                            <li><a href="inbox.html">صندوق ورودی </a></li>
                            <li><a href="read-email.html">خواندن ایمیل </a></li>
                            <li><a href="compose-email.html">ایجاد </a></li>
                        </ul>
                    </li>
                    <li><a href="#">تقویم </a>
                        <ul>
                            <li><a href="calendar-basic.html">تقویم پایه </a></li>
                            <li><a href="external-dragging.html">قابل کشیدن </a></li>
                            <li><a href="calendar-list.html">لیست تقویم </a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="open"><a href="#"><i class="icon ti-layers-alt"></i> <span>رابط کاربری</span> </a>
                <ul>
                    <li><a href="alerts.html">هشدارها </a></li>
                    <li><a href="badge.html">نشان </a></li>
                    <li><a href="buttons.html">دکمه ها </a></li>
                    <li><a href="pagination.html">صفحه‌بندی </a></li>
                    <li><a href="dropdown.html">منوی کشویی </a></li>
                    <li><a href="accordion.html">باز و بسته شونده </a></li>
                    <li class="open"><a href="#">کارت ها </a>
                        <ul>
                            <li><a href="basic-cards.html">کارت های پایه </a></li>
                            <li><a href="image-cards.html">کارت های تصویری </a></li>
                            <li><a href="card-scroll.html">کارت های اسکرول دار </a></li>
                            <li><a class="active" href="other-cards.html">سایر </a></li>
                        </ul>
                    </li>
                    <li><a href="colors.html">رنگ ها </a></li>
                    <li><a href="carousel.html">اسلایدر </a></li>
                    <li><a href="tables.html">جدول‌ها </a>
                        <ul>
                            <li><a href="tables.html">جدول‌های پایه </a></li>
                            <li><a href="data-table.html">جدول اطلاعات </a></li>
                            <li><a href="responsive-table.html">جدول واکنشگرا </a></li>
                        </ul>
                    </li>
                    <li><a href="typography.html">تایپوگرافی </a></li>
                    <li><a href="list-group.html">گروه لیست </a></li>
                    <li><a href="media-object.html">رسانه </a></li>
                    <li><a href="avatar.html">آواتار ها </a></li>
                    <li><a href="images.html">تصاویر </a></li>
                    <li><a href="progress.html">پیشرفت </a></li>
                    <li><a href="modal.html">مودال </a></li>
                    <li><a href="spinners.html">چرخنده ها </a></li>
                    <li><a href="navs.html">ناوبری ها </a></li>
                    <li><a href="tab.html">تب ها </a></li>
                    <li><a href="tooltip.html">راهنما (تولتیپ) </a></li>
                    <li><a href="popovers.html">پاپ اور </a></li>
                </ul>
            </li>
            <li><a href="#"><i class="icon ti-paint-roller"></i> <span>رابط کاربری پیشرفته</span> </a>
                <ul>
                    <li><a href="sweet-alert.html">هشدار Sweet </a></li>
                    <li><a href="lightbox.html">لایت باکس </a></li>
                    <li><a href="toast.html">توست </a></li>
                    <li><a href="tour.html">تور </a></li>
                    <li><a href="swiper.html">سوایپر </a></li>
                    <li><a href="tree-view.html">لیست درختی </a></li>
                </ul>
            </li>
            <li><a href="#"><i class="icon ti-clipboard"></i> <span>فرم ها</span> </a>
                <ul>
                    <li><a href="basic-form.html">فرم پایه </a></li>
                    <li><a href="custom-form.html">فرم سفارشی </a></li>
                    <li><a href="advanced-form.html">فرم پیشرفته </a></li>
                    <li><a href="datepicker.html">انتخاب گر تاریخ </a></li>
                    <li><a href="timepicker.html">انتخاب گر زمان </a></li>
                    <li><a href="colorpicker.html">انتخاب گر رنگ </a></li>
                    <li><a href="form-validation.html">اعتبارسنجی فرم </a></li>
                    <li><a href="form-wizard.html">فرم مرحله ای </a></li>
                    <li><a href="file-upload.html">آپلود فایل </a></li>
                    <li><a href="#">ویرایشگر CK </a>
                        <ul>
                            <li><a href="ckeditor-article.html">ویرایشگر مقاله </a></li>
                            <li><a href="ckeditor-inline.html">ویرایشگر درون خطی </a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="icons.html"><i class="icon ti-crown"></i> <span>آیکن‌ها</span> </a></li>
            <li><a href="charts.html"><i class="icon ti-pie-chart"></i> <span>نمودار ها</span> </a></li>
            <li><a href="#"><i class="icon ti-face-smile"></i> <span>احراز هویت</span> </a>
                <ul>
                    <li><a href="login.html">ورود </a></li>
                    <li><a href="register.html">ثبت نام </a></li>
                    <li><a href="recover-password.html">بازیابی رمز عبور </a></li>
                    <li><a href="lock-screen.html">قفل صفحه </a></li>
                </ul>
            </li>
            <li><a href="#"><i class="icon ti-files"></i> <span>صفحات</span> </a>
                <ul>
                    <li><a href="profile.html">پروفایل </a></li>
                    <li><a href="timeline.html">خط زمانی </a></li>
                    <li><a href="invoice.html">صورتحساب </a></li>
                    <li><a href="pricing-table.html">جدول قیمت ها </a></li>
                    <li><a href="search-result.html">نتایج جستجو </a></li>
                    <li><a href="blank-page.html">صفحه خالی 1 </a></li>
                    <li><a href="blank-page-v2.html">صفحه خالی 2 </a></li>
                    <li><a href="#">خطا ها </a>
                        <ul>
                            <li><a href="404.html">404 </a></li>
                            <li><a href="404-alternative.html">404 دیگر </a></li>
                            <li><a href="mean-at-work.html">تعمیرات </a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#"><i class="icon ti-menu"></i> <span>سطح منو</span></a>
                <ul>
                    <li><a href="#">سطح منو </a>
                        <ul>
                            <li><a href="#">سطح منو </a></li>
                        </ul>
                    </li>
                </ul>
            </li>--}}
        </ul>
    </div>
</div>