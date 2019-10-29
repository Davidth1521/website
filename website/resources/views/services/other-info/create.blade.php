@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>مقاله ها</h3>
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
            <h5 class="card-title">بخش مقاله ها</h5>
            <form action="{{route('other-info.store')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">عنوان 1</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان 1" name="title1" value="{{old('title1')}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان 2</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان 2" name="title2" value="{{old('title2')}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان تب 1</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان تب 1" name="tabTitle1" value="{{old('tabTitle1')}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان تب 2</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان تب 2" name="tabTitle2" value="{{old('tabTitle2')}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان تب 3</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان تب 3" name="tabTitle3" value="{{old('tabTitle3')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">توضیحات</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description1"
                                  placeholder="توضیحات">{{old('description1')}}</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیح تب 1</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tabDesc1"
                                  placeholder="توضیح تب 1">{{old('tabDesc1')}}</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیح تب 2</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tabDesc2"
                                  placeholder="توضیح تب 2">{{old('tabDesc2')}}</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیح تب 3</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tabDesc3"
                                  placeholder="توضیح تب 3">{{old('tabDesc3')}}</textarea>
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