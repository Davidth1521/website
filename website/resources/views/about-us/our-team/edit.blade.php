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
            <form action="{{route('ourTeam.update',['id'=>$ourTeam->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label class="custom-file-label" for="customFile" id="our_team">انتخاب تصویر</label>
                        <input type="file" class="form-control custom-file-input" id="customFile" name="image" onchange="showName(this,'our_team')">
                    </div>
                    <div class="col-sm-6">
                        <img src="/{{$ourTeam->image}}" alt="{{$ourTeam->title}}" class="img-thumbnail" width="150" style="height: 100px;float: left;">
                    </div>
                </div>
                <script>
                    function showName(tagName,labelName) {
                        var tag = $(tagName);
                        var i = tag.prev('#'+labelName).clone();
                        var file = tag[0].files[0].name;
                        tag.prev('#'+labelName).text(file);
                    }
                </script>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">نام</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="نام عضو" name="name"  value="{{$ourTeam->name}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">حیطه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="حیطه کاری" name="role"  value="{{$ourTeam->role}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک فیسبوک</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک فیسبوک" name="facebook_link" value="{{$ourTeam->facebook_link}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون فیسبوک</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون فیسبوک" name="facebook_icon" value="{{$ourTeam->facebook_icon}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک لینکدین</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک لینکدین" name="linkedin_link" value="{{$ourTeam->linkedin_link}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون لینکدین</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون لینکدین" name="linkedin_icon" value="{{$ourTeam->linkedin_icon}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک توییتر</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک توییتر" name="twitter_link" value="{{$ourTeam->twitter_link}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون توییتر</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون توییتر" name="twitter_icon" value="{{$ourTeam->twitter_icon}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیحات</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder=" توضیحات">{{$ourTeam->description}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">وضعیت نمایش</label>
                        <div class="custom-control custom-checkbox custom-checkbox-success">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="status" @if($ourTeam->status == 1) checked @endif>
                            <label class="custom-control-label" for="customCheck2">وضعیت نمایش</label>
                        </div>
                    </div>
                </div>
                <div class="row d-block ml-1">
                    <div class="form-group">
                        <a href="/about_us/ourTeam" type="submit" class="btn btn-danger float-right mr-3" >بازگشت</a>
                        <button type="submit" class="btn btn-success float-right">ارسال</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection