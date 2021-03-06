@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>لیست اسلایدر</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">صفحه اصلی</li>
                    <li class="breadcrumb-item"><a href="/admin/index/slider1">اسلایدر</a></li>
                    <li class="breadcrumb-item">لیست</li>
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
            <h5 class="card-title">بخش لیست اسلایدر</h5>
            {{--<form action="{{route('search_blog')}}" method="post">
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
            </form>--}}
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
                        <th scope="col">عنوان</th>
                        <th scope="col">توضیحات</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">تاریخ</th>
                        <th scope="col">ویرایش</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 0;
                    ?>
                    @foreach($sliders as $slider)
                        <tr>
                            <th scope="row"><?= ++$i ?></th>
                            <td><a href="/{{$slider->image}}"><img src="/{{$slider->image}}" alt="{{$slider->title}}"  width="150" height="100"></a></td>
                            <td>{{$slider->title}}</td>
                            <td>{{$slider->description}}</td>
                            <td>@if($slider->status == 1) <span class="badge badge-success">فعال</span> @else <span class="badge badge-danger">غیر فعال</span>@endif</td>
                            <td>{{$slider->dateTime}}</td>
                            <td><a href="{{route('slider1.edit',['id'=>$slider->id])}}"><i class="fa fa-edit font-size-23"></i></a></td>
                            <td>
                                <form action="{{route('slider1.destroy',['id'=>$slider->id])}}" method="post" id="remove">
                                    {{csrf_field()  }}
                                    {{method_field('delete')}}
                                    <a onclick="remove(this)" style="cursor: pointer"><i class="fa fa-remove font-size-23" style="color: #ff0000;"></i></a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <script>
                    function remove(variable) {
                        var tag = $(variable);
                        var form = tag.parents('#remove');
                        form.submit();
                    }
                </script>
            </div>
        </div>
    </div>
@endsection