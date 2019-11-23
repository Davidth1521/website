@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>ویرایش شریک</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">درباره ما</li>
                    <li class="breadcrumb-item"><a href="/admin/about_us/partners">شرکا</a></li>
                    <li class="breadcrumb-item">ویرایش</li>
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
            <h5 class="card-title">ویرایش شریک</h5>
            <form action="{{route('partners.update',['id'=>$partner->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="row">
                    <div class="form-group col-sm-5 mr-3">
                        <label class="custom-file-label" for="customFile" id="partnerLogo">انتخاب تصویر</label>
                        <input type="file" class="form-control custom-file-input" id="customFile" name="image"
                               onchange="showName(this,'partnerLogo')">
                    </div>
                    <div class="col-sm-6">
                        <img src="/{{$partner->image}}" alt="{{$partner->title}}" class="img-thumbnail" width="150" style="height: 100px;float: left;">
                    </div>
                    <script>
                        function showName(tagName, labelName) {
                            var tag = $(tagName);
                            var i = tag.prev('#' + labelName).clone();
                            var file = tag[0].files[0].name;
                            tag.prev('#' + labelName).text(file);
                        }
                    </script>
                </div>
                <div class="row">
                    <div class="form-group col-sm-5 mr-3">
                        <label for="customFile">عنوان</label>
                        <input type="text" class="form-control" id="customFile" name="title" placeholder="عنوان" value="{{$partner->title}}">
                    </div>
                    <div class="form-group col-sm-5 mr-3">
                        <label for="customFile">لینک</label>
                        <input type="text" class="form-control" id="customFile" name="link" placeholder="لینک" value="{{$partner->link}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">وضعیت نمایش</label>
                        <div class="custom-control custom-checkbox custom-checkbox-success">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="status" @if($partner->status == 1) checked @endif>
                            <label class="custom-control-label" for="customCheck2">وضعیت نمایش</label>
                        </div>
                    </div>
                </div>
                <div class="row d-block ml-1">
                    <div class="form-group">
                        <a href="/about_us/partners" type="submit" class="btn btn-danger float-right mr-3" >بازگشت</a>
                        <button type="submit" class="btn btn-success float-right">ارسال</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection