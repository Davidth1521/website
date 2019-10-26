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
            <form action="{{route('addCat')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">عنوان</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان اسلایدر" name="title" value="{{old('title')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">والد</label>
                        <select class="js-example-basic-single" dir="rtl" name="parent_id">
                            <option value="0">والد</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
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


            <div class="table-responsive">
                <table class="table table-bordered mt-4">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام دسته</th>
                        <th scope="col">والد</th>
                        <th scope="col">تاریخ ایجاد</th>
                        <th scope="col">ویرایش</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $i = 0;
                    ?>
                    @foreach($allCategories as $category)
                        <tr>
                            <th scope="row"><?= ++$i ?></th>
                            <td>{{$category->title}}</td>
                            <td>{{$category->parent_name}}</td>
                            <td>{{$category->dateTime}}</td>
                            <td><a href="#"><i class="fa fa-edit font-size-23"></i></a></td>
                            <td><a href="#"><i class="fa fa-remove font-size-23"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection