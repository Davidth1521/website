@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>تعرفه</h3>
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
            <h5 class="card-title">بخش تعرفه</h5>
            <form action="{{route('tariff.update',['id'=>$tariff->id])}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">عنوان</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان" name="title" value="{{$tariff->title}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">هر</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="ماه,سال,شش ماهه" name="per" value="{{$tariff->per}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">واحد</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="$" name="unit" value="{{$tariff->unit}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">قیمت</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="قیمت" name="price" value="{{$tariff->price}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان لینک</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان لینک" name="linkTitle" value="{{$tariff->linkTitle}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder='لینک' name="link" value="{{$tariff->link}}">

                    </div>
                    {{--<div class="form-group col-sm-6">
                        <label for="">تعرفه</label>
                        <select class="js-example-basic-single" dir="rtl" name="category_id">
                            <option value="0">انتخاب کنید</option>
                            @foreach($tariffs as $tariff)
                                <option value="{{$tariff->id}}">{{$tariff->title}}</option>
                            @endforeach
                        </select>
                    </div>--}}
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">وضعیت نمایش</label>
                        <div class="custom-control custom-checkbox custom-checkbox-success">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="status" @if($tariff->status == 1) checked @endif>
                            <label class="custom-control-label" for="customCheck2">وضعیت نمایش</label>
                        </div>
                    </div>
                </div>
                <div class="row d-block ml-1">
                    <div class="form-group">
                        <a href="/service/tariff" type="submit" class="btn btn-danger float-right mr-3">بازگشت</a>
                        <button type="submit" class="btn btn-success float-right">ارسال</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection