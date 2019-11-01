@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>ویرایش مقاله</h3>
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
            <h5 class="card-title">بخش ویرایش مقاله</h5>
            <form action="{{route('blog.update',['id'=>$blog->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="row">
                    <div class="form-group col-sm-3 mr-3">
                        <label class="custom-file-label" for="customFile" id="image">انتخاب تصویر</label>
                        <input type="file" class="form-control custom-file-input" id="customFile" name="image"
                               onchange="showName(this,'image')">
                    </div>

                    <div class="form-group col-sm-3 mr-3">
                        <label class="custom-file-label" for="customFile" id="thumbnail">تصویر شاخص</label>
                        <input type="file" class="form-control custom-file-input" id="customFile" name="thumbnail"
                               onchange="showName(this,'thumbnail')">
                    </div>

                    <div class="col-sm-2 m-b-15 offset-md-3">
                        <img src="/{{$blog->image}}" alt="{{$blog->title}}" class="img-thumbnail" width="150" style="height: 100px;">
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
                               placeholder="نام" name="name" value="{{$blog->name}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان" name="title" value="{{$blog->title}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">دسته بندی</label>
                        <select class="js-example-basic-single" dir="rtl" name="category_id">
                            <option value="0">دسته بندی</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($blog->cat == $category->id) selected @endif>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">تگ ها</label>
                        <select class="js-example-basic-single" dir="rtl" name="tag_id">
                            <option value="0">تگ ها</option>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}" @if($blog->tag == $tag->id) selected @endif>{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیحات</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
                                  placeholder="توضیحات">{{$blog->description}}</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">متن کوتاه</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="shortText"
                                  placeholder="توضیح کوتاه">{{$blog->shortText}}</textarea>
                    </div>
                </div>
                <div class="row">
                    {{--<div class="form-group col-sm-6">
                        <select class="js-example-basic-single" dir="rtl" name="parent_id">
                            <option value="0">والد منو</option>
                            @foreach($parent_menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->title}}</option>
                            @endforeach
                        </select>
                    </div>--}}
                    <div class="form-group col-sm-6">
                        <label for="">وضعیت نمایش</label>
                        <div class="custom-control custom-checkbox custom-checkbox-success">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="status" @if($blog->status == 1) checked @endif>
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