@extends('layouts.master.master')
@section('content')
    <div class="page-header">
        <div>
            <h3>اسلایدر</h3>
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
            <h5 class="card-title">بخش اسلایدر</h5>
            <form action="{{route('slider1.update',['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="row">
                    <div class="form-group col-sm-3 mr-3">
                        <label class="custom-file-label" for="customFile" id="image">انتخاب تصویر</label>
                        <input type="file" class="form-control custom-file-input" id="customFile" name="image" onchange="showName(this,'image')">
                    </div>
                        <div class="col-md-6"></div>
                    <div class="col-sm-2 m-b-15">
                        <img src="/{{$slider->image}}" alt="{{$slider->title}}" class="img-thumbnail" width="150" style="height: 100px;">
                    </div>
                    <script>
                        function showName(tagName,labelName) {
                            var tag = $(tagName);
                            var i = tag.prev('#'+labelName).clone();
                            var file = tag[0].files[0].name;
                            tag.prev('#'+labelName).text(file);
                        }
                    </script>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">عنوان</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان اسلایدر" name="title" value="{{$slider->title}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک دکمه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک دکمه" name="btnLink" value="{{$slider->btnLink}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیحات</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder=" توضیحات اسلایدر">{{$slider->description}}</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">متن دکمه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="متن دکمه" name="btnTitle" value="{{$slider->btnLink}}">
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">وضعیت نمایش</label>
                        <div class="custom-control custom-checkbox custom-checkbox-success">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="status" @if($slider->status == 1) checked @endif>
                            <label class="custom-control-label" for="customCheck2">وضعیت نمایش</label>
                        </div>
                    </div>
                </div>
                <div class="row d-block ml-1">
                    <div class="form-group">
                        <a href="/index/slider1" type="submit" class="btn btn-danger float-right mr-3" >بازگشت</a>
                        <button type="submit" class="btn btn-success float-right">ارسال</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection