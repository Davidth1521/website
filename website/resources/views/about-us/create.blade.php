@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>درباره ها</h3>
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
            <h5 class="card-title">بخش درباره ها</h5>
            <form action="{{route('aboutUs.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-3 mr-3">
                        <label class="custom-file-label" for="customFile" id="image1">تصویر 1</label>
                        <input type="file" class="form-control custom-file-input" id="customFile1" name="image1"
                               onchange="showName(this,'image1')">
                    </div>
                    <div class="form-group col-sm-3 mr-3">
                        <label class="custom-file-label" for="customFile" id="image2">تصویر 2</label>
                        <input type="file" class="form-control custom-file-input" id="customFile2" name="image2"
                               onchange="showName(this,'image2')">
                    </div>
                    <div class="form-group col-sm-3 mr-3">
                        <label class="custom-file-label" for="customFile" id="image3">تصویر 3</label>
                        <input type="file" class="form-control custom-file-input" id="customFile3" name="image3"
                               onchange="showName(this,'image3')">
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
                        <label for="">عنوان</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان" name="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیحات</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
                                  placeholder="توضیحات">{{old('description')}}</textarea>
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