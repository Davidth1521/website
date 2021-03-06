@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>ایجاد تعرفه</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">خدمات</li>
                    <li class="breadcrumb-item"><a href="/admin/service/tariff">تعرفه</a></li>
                    <li class="breadcrumb-item">افزودن</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش ایجاد تعرفه</h5>
            <form action="{{route('tariff.store')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">عنوان</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان" name="title" value="{{old('title')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">هر</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="ماه,سال,شش ماهه" name="per" value="{{old('per')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">واحد</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="$" name="unit" value="{{old('unit')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">قیمت</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="قیمت" name="price" value="{{old('price')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان لینک</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان لینک" name="linkTitle" value="{{old('linkTitle')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder='لینک' name="link" value="{{old('link')}}">

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


            <div class="table-responsive">
                <table class="table table-bordered mt-4">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">عنوان تعرفه</th>
                        <th scope="col">قیمت</th>
                        <th scope="col">واحد</th>
                        <th scope="col">تاریخ ایجاد</th>
                        <th scope="col">ویرایش</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 0;
                    ?>
                    @if(isset($tarrifs))
                        @foreach($tarrifs as $tarrif)
                            <tr>
                                <th scope="row"><?= ++$i ?></th>
                                <td>{{$tarrif->title}}</td>
                                <td>{{$tarrif->price}}</td>
                                <td>{{$tarrif->unit}}</td>
                                <td>{{$tarrif->dateTime}}</td>
                                <td><a href="#"><i class="fa fa-edit font-size-23"></i></a></td>
                                <td><a href="#"><i class="fa fa-remove font-size-23"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection