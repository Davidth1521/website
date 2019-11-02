@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>فضای مجازی</h3>
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
            <h5 class="card-title">بخش فضای مجازی</h5>
            <form action="{{route('social_media.update',['id'=>1])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">لینک فیسبوک</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک فیسبوک" name="facebook_link" value="@if(isset($item)) {{$item->facebook_link}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون فیسبوک</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   placeholder="آیکون فیسبوک" name="facebook_icon" value="@if(isset($item)) {{$item->facebook_icon}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک لینکدین</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک لینکدین" name="linkedin_link" value="@if(isset($item)) {{$item->linkedin_link}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون لینکدین</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون لینکدین" name="linkedin_icon" value="@if(isset($item)) {{$item->linkedin_icon}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک توییتر</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک توییتر" name="twitter_link" value="@if(isset($item)) {{$item->twitter_link}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون توییتر</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون توییتر" name="twitter_icon" value="@if(isset($item)) {{$item->twitter_icon}} @endif">

                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">لینک گوگل پلاس</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک گوگل پلاس" name="googlePlus_link" value="@if(isset($item)) {{$item->googlePlus_link}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون گوگل پلاس</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون گوگل پلاس" name="googlePlus_icon" value="@if(isset($item)) {{$item->googlePlus_icon}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک اسکایپ</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک اسکایپ" name="skype_link" value="@if(isset($item)) {{$item->skype_link}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون اسکایپ</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون اسکایپ" name="skype_icon" value="@if(isset($item)) {{$item->skype_icon}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک یوتیوب</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک یوتیوب" name="youtube_link" value="@if(isset($item)) {{$item->youtube_link}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون یوتیوب</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون یوتیوب" name="youtube_icon" value="@if(isset($item)) {{$item->youtube_icon}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک فید</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک فید" name="rss_link" value="@if(isset($item)) {{$item->rss_link}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون فید</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون فید" name="rss_icon" value="@if(isset($item)) {{$item->rss_icon}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک ویمو</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک ویمو" name="vimo_link" value="@if(isset($item)) {{$item->vimo_link}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون ویمو</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون ویمو" name="vimo_icon" value="@if(isset($item)) {{$item->vimo_icon}} @endif">

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