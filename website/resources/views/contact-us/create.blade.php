@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>تماس با ما</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="#">رابط کاربری</a></li>
                    <li class="breadcrumb-item"><a href="#">کارت ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">سایر کارت ها</li>
                </ol>
            </nav>
        </div>
        {{--
          قعلا مورد نیاز نیست.

        <div class="btn-group" role="group">
             <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 اقدامات
             </button>
             <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                 <a class="dropdown-item" href="#">عمل</a>
                 <a class="dropdown-item" href="#">عمل دیگر</a>
                 <a class="dropdown-item" href="#">یک عمل دیگر</a>
             </div>
         </div>
         --}}
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش تماس با ما</h5>
            <form action="{{route('info.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">عنوان</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان" name="title" value="{{old('title')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان جزئیات</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان جزئیات" name="detailTitle" value="{{old('detailTitle')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون ایـــمیل</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون ایـــمیل" name="emailIcon" value="{{old('emailIcon')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان ایمیل</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان ایمیل" name="emailTitle" value="{{old('emailTitle')}}">

                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">آیکون آدرس</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون آدرس" name="addressIcon" value="{{old('addressIcon')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان آدرس</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان آدرس" name="addressTitle" value="{{old('addressTitle')}}">

                    </div>


                    <div class="form-group col-sm-6">
                        <label for="">آیکون وبسایت</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون وبسایت" name="websiteIcon" value="{{old('websiteIcon')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان وبسایت</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان وبسایت" name="websiteTitle" value="{{old('websiteTitle')}}">

                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">آیکون تلفن</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون تلفن" name="phoneIcon" value="{{old('phoneIcon')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان تلفن</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان تلفن" name="phoneTitle" value="{{old('phoneTitle')}}">

                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">آیکون فکس</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون فکس" name="faxIcon" value="{{old('faxIcon')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان فکس</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان فکس" name="faxTitle" value="{{old('faxTitle')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">زیر عنوان</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="subTitle"
                                  placeholder="زیر عنوان">{{old('subTitle')}}</textarea>
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