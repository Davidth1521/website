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
            <form action="{{route('search_blog')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-4">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="جستجو مقاله" name="title">

                    </div>
                    <div class="form-group col-sm-2">
                        <button type="submit" class="btn btn-primary float-left">جستجو</button>
                    </div>
                </div>
            </form>
            <style>
                .table td,.table th{
                    vertical-align: middle;
                }
            </style>

            <div class="table-responsive">
                <table class="table table-bordered mt-4 text-center">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">تصویر</th>
                        <th scope="col">مقاله</th>
                        <th scope="col">دسته</th>
                        <th scope="col">نویسنده</th>
                        <th scope="col">تاریخ</th>
                        <th scope="col">ویرایش</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 0;
                    ?>
                    @foreach($blogs as $blog)
                        <tr>
                            <th scope="row"><?= ++$i ?></th>
                            <td><a href="/{{$blog->thumbnail}}"><img src="/{{$blog->thumbnail}}" alt="{{$blog->name}}"></a></td>
                            <td>{{$blog->name}}</td>
                            <td>
                                @foreach($blog->categories as $category)
                                    {{$category}},
                                    @endforeach
                            </td>
                            <td>نویسنده</td>
                            <td>{{$blog->dateTime}}</td>
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