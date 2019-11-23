@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>درباره ما در صفحه اصلی</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">درباره ما</li>
                    <li class="breadcrumb-item"><a href="/admin/about_us/aboutUsSkill/create">مهارت های ما</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش درباره ما در صفحه اصلی</h5>
            <form action="{{route('aboutUsSkill.update',['id'=>1])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">هدر چپ</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               placeholder="هدر چپ" name="leftHeader" value="@if(isset($about)){{$about->leftHeader}}@endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">هدر راست</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               placeholder="هدر راست" name="rightHeader" value="@if(isset($about)) {{$about->rightHeader}}@endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان چرا ما 1</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               placeholder="عنوان چرا ما 1" name="whyUs1" value="@if(isset($about)) {{$about->whyUs1}} @endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان چرا ما 2</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               placeholder="عنوان چرا ما 2" name="whyUs2" value="@if(isset($about)) {{$about->whyUs2}} @endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان چرا ما 3</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               placeholder="عنوان چرا ما 3" name="whyUs3" value="@if(isset($about)) {{$about->whyUs3}} @endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان مهارت 1</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle1" placeholder="عنوان مهارت1" value="@if(isset($about)) {{$about->skillTitle1}} @endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان مهارت 2</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle2" placeholder="عنوان مهارت2" value="@if(isset($about)) {{$about->skillTitle2}} @endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان مهارت 3</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle3" placeholder="عنوان مهارت3" value="@if(isset($about)) {{$about->skillTitle3}} @endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان مهارت 4</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle4" placeholder="عنوان مهارت4" value="@if(isset($about)) {{$about->skillTitle4}} @endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان مهارت 5</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle5" placeholder="عنوان مهارت5" value="@if(isset($about)) {{$about->skillTitle5}} @endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">درصد مهارت 1</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle1Percent" placeholder="درصد مهارت1" value="@if(isset($about)) {{$about->skillTitle1Percent}} @endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">درصد مهارت 2</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle2Percent" placeholder="درصد مهارت2" value="@if(isset($about)) {{$about->skillTitle2Percent}} @endif">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">درصد مهارت 3</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle3Percent" placeholder="درصد مهارت3" value="@if(isset($about)) {{$about->skillTitle3Percent}} @endif">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">درصد مهارت 4</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle4Percent" placeholder="درصد مهارت4" value="@if(isset($about)) {{$about->skillTitle4Percent}} @endif">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">درصد مهارت 5</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp"
                               name="skillTitle5Percent" placeholder="درصد مهارت5" value="@if(isset($about)) {{$about->skillTitle5Percent}} @endif">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">متن اصلی</label>
                        <textarea class="form-control" rows="3" name="headerDescription"
                                  placeholder="متن اصلی">@if(isset($about)) {{$about->headerDescription}} @endif</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">متن چرا ما 1</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  name="whyUs1Description" placeholder="متن چرا ما 1">@if(isset($about)) {{$about->whyUs1Description}} @endif</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">متن چرا ما 2</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  name="whyUs2Description" placeholder="متن چرا ما 2">@if(isset($about)) {{$about->whyUs2Description}}@endif</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">متن چرا ما 3</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  name="whyUs3Description" placeholder="متن چرا ما 3">@if(isset($about))  {{$about->whyUs3Description}} @endif</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">وضعیت نمایش</label>
                        <div class="custom-control custom-checkbox custom-checkbox-success">

                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="status" @if(isset($about)) @if($about->status == 1) checked @endif @endif>
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