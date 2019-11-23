@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>توضیحات ما</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">صفحه اصلی</li>
                    <li class="breadcrumb-item"><a href="/admin/index/ourDescription/create">توضیحات ما</a></li>
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
            <h5 class="card-title">بخش توضیحات ما زیر اولین اسلایدر</h5>
            <form action="{{route('ourDescription.update',['id'=>1])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">آیکون 1</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="نام کلاس آیکن 1" name="icon1" value="@if(isset($item)) {{$item->icon1}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان 1</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان اسلایدر 1" name="title1" value="@if(isset($item)) {{$item->title1}} @endif">

                    </div>


                    <div class="form-group col-sm-6">
                        <label for="">آیکون 2</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="نام کلاس آیکن 2" name="icon2" value="@if(isset($item)) {{$item->icon2}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان 2</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان اسلایدر 2" name="title2" value="@if(isset($item)) {{$item->title2}} @endif">

                    </div>


                    <div class="form-group col-sm-6">
                        <label for="">آیکون 3</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="نام کلاس آیکن 3" name="icon3" value="@if(isset($item)) {{$item->icon3}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان 3</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان اسلایدر 3" name="title3" value="@if(isset($item)) {{$item->title3}} @endif">

                    </div>


                    <div class="form-group col-sm-6">
                        <label for="">آیکون 4</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="نام کلاس آیکن 4" name="icon4" value="@if(isset($item)) {{$item->icon4}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">عنوان 4</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان اسلایدر 4" name="title4" value="@if(isset($item)) {{$item->title4}} @endif">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیحات 1</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description1"
                                  placeholder=" توضیحات اسلایدر 1">@if(isset($item)) {{$item->description1}} @endif</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیحات 2</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description2"
                                  placeholder=" توضیحات اسلایدر 2">@if(isset($item)) {{$item->description2}} @endif</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیحات 3</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description3"
                                  placeholder=" توضیحات اسلایدر 3">@if(isset($item)) {{$item->description3}} @endif</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">توضیحات 4</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description4"
                                  placeholder=" توضیحات اسلایدر 4">@if(isset($item)) {{$item->description4}} @endif</textarea>
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