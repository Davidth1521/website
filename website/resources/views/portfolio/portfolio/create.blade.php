@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>افزودن نمونه کار</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/portfolio">نمونه کار</a></li>
                    <li class="breadcrumb-item">افزودن</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش افزودن نمونه کار</h5>
            <form action="{{route('portfolio.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-5 mr-3">
                        <label for="">انتخاب تصویر</label>
                        <input type="file" class="form-control custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">انتخاب تصویر</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">عنوان</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان" name="title" value="{{old('title')}}">

                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">متن تصویر</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="متن تصویر" name="imageDescription" value="{{old('imageDescription')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">متن دکمه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="متن دکمه" name="btnTitle" value="{{old('btnTitle')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک دکمه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک دکمه" name="btnLink" value="{{old('btnLink')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">دسته بندی</label>
                        <select class="js-example-basic-single" dir="rtl" name="category_id">
                            <option value="0">دسته بندی</option>
                            @foreach($portfolioCategories as $portfolioCategory)
                                <option value="{{$portfolioCategory->id}}">{{$portfolioCategory->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">توضیحات</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  name="detailDescription" placeholder=" توضیحات در صفحه جزئیات "> {{old('detailDescription')}}</textarea>
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