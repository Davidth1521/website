@extends('layouts.master.master')
@section('content')
    <div class="page-header">
        <div>
            <h3>تماس با ما</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">تماس با ما</li>
                    <li class="breadcrumb-item"><a href="/admin/contact-us/info/create">اطلاعات و جزئیات</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش تماس با ما</h5>
            <form action="{{route('info.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-5 mr-3">
                        <label class="custom-file-label" for="customFile" id="image">انتخاب تصویر</label>
                        <input type="file" class="form-control custom-file-input" id="customFile" name="image"
                               onchange="showName(this,'image')">
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2">
                        <img src="@if(isset($item)) /{{$item->image}} @else/fake_images/index.jpg @endif" alt="@if(isset($item)) {{$item->site}} @endif" class="img-thumbnail" width="150" style="height: 100px;">
                    </div>
                </div>
                <script>
                    function showName(tagName, labelName) {
                        var tag = $(tagName);
                        var i = tag.prev('#' + labelName).clone();
                        var file = tag[0].files[0].name;
                        tag.prev('#' + labelName).text(file);
                    }
                </script>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">سایت</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="سایت" name="site" value="@if(isset($item)) {{$item->site}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان جزئیات</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="پست الکترونیکی" name="email" value="@if(isset($item)) {{$item->email}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">تلفن</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="تلفن" name="tel" value="@if(isset($item)) {{$item->tel}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">موبایل</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="موبایل" name="mobile" value="@if(isset($item)){{$item->mobile}} @endif">

                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">تلگرام</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="تلگرام" name="telegram" value="@if(isset($item)){{$item->telegram}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">اینستاگرام</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="اینستاگرام" name="instagram" value="@if(isset($item)){{$item->instagram}} @endif">

                    </div>


                    <div class="form-group col-sm-6">
                        <label for="">توییتر</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="توییتر" name="twitter" value="@if(isset($item)) {{$item->twitter}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینکدین</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینکدین" name="linkedin" value="@if(isset($item)) {{$item->linkedin}} @endif">

                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">فیسبوک</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="فیسبوک" name="facebook" value="@if(isset($item)) {{$item->facebook}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">زمان شروع</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="زمان شروع" name="start_time" value="@if(isset($item)) {{$item->start_time}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">زمان پایان</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="زمان پایان" name="end_time" value="@if(isset($item)) {{$item->end_time}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آدرس</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"
                                  placeholder="آدرس">@if(isset($item)) {{$item->address}} @endif</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">وضعیت نمایش</label>
                        <div class="custom-control custom-checkbox custom-checkbox-success">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="status" @if(isset($item)) @if($item->status == 1) checked @endif @endif>
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