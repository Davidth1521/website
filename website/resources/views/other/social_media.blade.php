@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>تیم ما</h3>
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
            <h5 class="card-title">بخش تیم ما</h5>
            <form action="{{route('social_media.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">لینک فیسبوک</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک فیسبوک" name="facebook_link" value="{{old('facebook_link')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون فیسبوک</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   placeholder="آیکون فیسبوک" name="facebook_icon" value="{{old('facebook_icon')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک لینکدین</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک لینکدین" name="linkedin_link" value="{{old('linkedin_link')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون لینکدین</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون لینکدین" name="linkedin_icon" value="{{old('linkedin_icon')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک توییتر</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک توییتر" name="twitter_link" value="{{old('twitter_link')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون توییتر</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون توییتر" name="twitter_icon" value="{{old('twitter_icon')}}">

                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">لینک گوگل پلاس</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک گوگل پلاس" name="googlePlus_link" value="{{old('googlePlus_link')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون گوگل پلاس</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون گوگل پلاس" name="googlePlus_icon" value="{{old('googlePlus_icon')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک اسکایپ</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک اسکایپ" name="skype_link" value="{{old('skype_link')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون اسکایپ</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون اسکایپ" name="skype_icon" value="{{old('skype_icon')}}">

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