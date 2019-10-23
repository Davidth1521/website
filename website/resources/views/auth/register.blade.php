<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>سایت داوود خوشکار</title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="/assets/vendors/bundle.css" type="text/css">
    <!-- end::global styles -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="/assets/css/app.css" type="text/css">
    <!-- end::custom styles -->

    <!-- begin::favicon -->
    <link rel="shortcut icon" href="/assets/media/image/favicon.png">
    <!-- end::favicon -->

    <!-- begin::theme color -->
    <meta name="theme-color" content="#3f51b5" />
    <!-- end::theme color -->

</head>
<body class="bg-white h-100-vh p-t-0">

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
    <span>در حال بارگذاری ...</span>
</div>
<!-- end::page loader -->

<div class="container h-100-vh">
    <div class="row align-items-center h-100-vh">
        <div class="col-lg-6 d-none d-lg-block p-t-b-25">
            <img class="img-fluid" src="/assets/media/svg/register.svg" alt="...">
        </div>
        <div class="col-lg-4 offset-lg-1 p-t-25 p-b-10">
            <h3>ثبت نام</h3>
            <p>ایجاد حساب کاربری جدید</p>
            <form method="POST" action="{{ route('register') }}">
                <div class="form-group mb-4">
                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" autofocus placeholder="نام کاربری" name="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="ایمیل" name="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="رمز عبور">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="تکرار رمز عبور">

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch" checked>
                        <label class="custom-control-label" for="customSwitch">با قوانین و مقررات موافقم.</label>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block btn-uppercase mb-4">ایجاد حساب</button>
                <p class="text-left">
                    <a href="#" class="text-underline">حساب کاربری دارید؟</a>
                </p>
            </form>
        </div>
    </div>
</div>
</body>

<!-- begin::global scripts -->
<script src="/assets/vendors/bundle.js"></script>
<!-- end::global scripts -->

<!-- begin::custom scripts -->
<script src="/assets/js/app.js"></script>
<!-- end::custom scripts -->


</html>