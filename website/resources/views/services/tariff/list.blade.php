@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>لیست تعرفه</h3>
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
            <h5 class="card-title">لیست تعرفه</h5>

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
                    @if(isset($tariffs))
                        @foreach($tariffs as $tariff)
                            <tr>
                                <th scope="row"><?= ++$i ?></th>
                                <td>{{$tariff->title}}</td>
                                <td>{{$tariff->price}}</td>
                                <td>{{$tariff->unit}}</td>
                                <td>{{$tariff->dateTime}}</td>
                                <td><a href="{{route('tariff.edit',['id'=>$tariff->id])}}"><i class="fa fa-edit font-size-23"></i></a></td>
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