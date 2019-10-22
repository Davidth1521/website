@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>درباره ما</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="#">رابط کاربری</a></li>
                    <li class="breadcrumb-item"><a href="#">کارت ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">سایر کارت ها</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش درباره ما</h5>
            <form action="{{route('aboutUs.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">هدر چپ</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               placeholder="هدر چپ" name="leftHeader">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">هدر راست</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               placeholder="هدر راست" name="rightHeader">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان چرا ما 1</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               placeholder="عنوان چرا ما 1" name="whyUs1">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان چرا ما 2</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               placeholder="عنوان چرا ما 2" name="whyUs2">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان چرا ما 3</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               placeholder="عنوان چرا ما 3" name="whyUs3">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان مهارت 1</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle1" placeholder="عنوان مهارت1">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان مهارت 2</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle2" placeholder="عنوان مهارت2">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان مهارت 3</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle3" placeholder="عنوان مهارت3">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان مهارت 4</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle4" placeholder="عنوان مهارت4">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان مهارت 5</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle5" placeholder="عنوان مهارت5">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">درصد مهارت 1</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle1Percent" placeholder="درصد مهارت1">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">درصد مهارت 2</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle2Percent" placeholder="درصد مهارت2">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">درصد مهارت 3</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle3Percent" placeholder="درصد مهارت3">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">درصد مهارت 4</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle4Percent" placeholder="درصد مهارت4">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">درصد مهارت 5</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle5Percent" placeholder="درصد مهارت5">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">متن اصلی</label>
                        <textarea class="form-control" rows="3" name="headerDescription"
                                  placeholder="متن اصلی"></textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">متن چرا ما 1</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  name="whyUs1Description" placeholder="متن چرا ما 1"></textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">متن چرا ما 2</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  name="whyUs2Description" placeholder="متن چرا ما 2"></textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">متن چرا ما 3</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  name="whyUs3Description" placeholder="متن چرا ما 3"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">وضعیت نمایش</label>
                        <div class="custom-control custom-checkbox custom-checkbox-success">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="status" checked>
                            <label class="custom-control-label" for="customCheck2">وضعیت نمایش</label>
                        </div>
                    </div>
                </div>
                <div class="row d-block ml-1">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success float-right">ارسال</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection