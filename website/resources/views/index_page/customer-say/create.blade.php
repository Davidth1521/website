@extends('layouts.master.master')
@section('content')
    <div class="page-header">
        <div>
            <h3>سخن مشتریان</h3>
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
            <h5 class="card-title">بخش سخن مشتریان</h5>
            <form action="{{route('customerSay.store')}}" method="post" enctype="multipart/form-data">
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
                        <label for="">زیر عنوان</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="زیر عنوان" name="subTitle" value="{{old('subTitle')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیح</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="توضیحات">{{old('description')}}</textarea>
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