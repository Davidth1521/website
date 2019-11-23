@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>ایجاد منو</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">صفحه اصلی</li>
                    <li class="breadcrumb-item"><a href="/admin/index/primary">منو</a></li>
                    <li class="breadcrumb-item">ایجاد</li>
                    {{--<li class="breadcrumb-item active" aria-current="page">سایر کارت ها</li>--}}
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
            <h5 class="card-title">بخش ایجاد منو</h5>
            <form action="{{route('primary.store')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">عنوان</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان منو را وارد کنید" name="title" value="{{old('title')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">لینک</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="لینک منو را وارد کنید" name="link" value="{{old('link')}}">

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">والد</label>
                        <select class="js-example-basic-single" dir="rtl" name="parent_id">
                            <option value="0">والد منو</option>
                            @foreach($parent_menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->title}}</option>
                            @endforeach
                        </select>
                    </div>
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