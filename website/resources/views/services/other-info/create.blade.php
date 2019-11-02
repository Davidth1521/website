@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>دیگر اطلاعات سرویس</h3>
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
            <h5 class="card-title">بخش دیگر اطلاعات</h5>
            <form action="{{route('other-info.update',['id'=>1])}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">عنوان 1</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان 1" name="title1" value="@if(isset($item)) {{$item->title1}} @endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان 2</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان 2" name="title2" value="@if(isset($item)) {{$item->title2}} @endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان تب 1</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان تب 1" name="tabTitle1" value="@if(isset($item)) {{$item->tabTitle1}} @endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان تب 2</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان تب 2" name="tabTitle2" value="@if(isset($item)) {{$item->tabTitle2}} @endif">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان تب 3</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان تب 3" name="tabTitle3" value="@if(isset($item)) {{$item->tabTitle3}} @endif">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">توضیحات</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description1"
                                  placeholder="توضیحات">@if(isset($item)) {{$item->description1}} @endif</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیح تب 1</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tabDesc1"
                                  placeholder="توضیح تب 1">@if(isset($item)) {{$item->tabDesc1}} @endif</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیح تب 2</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tabDesc2"
                                  placeholder="توضیح تب 2">@if(isset($item)) {{$item->tabDesc2}} @endif</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیح تب 3</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tabDesc3"
                                  placeholder="توضیح تب 3">@if(isset($item)) {{$item->tabDesc3}} @endif</textarea>
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