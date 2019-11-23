@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>درباره ها</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">درباره ما</li>
                    <li class="breadcrumb-item"><a href="/admin/about_us/aboutUs/create">افزودن</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش درباره ها</h5>
            <form action="/about_us/images/" class="dropzone mb-3" id="my-awesome-dropzone" method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
            </form>
            <form action="{{route('aboutUs.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
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