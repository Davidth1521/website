@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>تیم ها</h3>
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
            <h5 class="card-title">بخش تیم ها</h5>

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
                        <th scope="col">نام</th>
                        <th scope="col">حیطه</th>
                        <th scope="col">تاریخ</th>
                        <th scope="col">ویرایش</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 0;
                    ?>
                    @foreach($ourTeams as $ourTeam)
                        <tr>
                            <th scope="row"><?= ++$i ?></th>
                            <td><a href="/{{$ourTeam->image}}"><img src="/{{$ourTeam->image}}" alt="{{$ourTeam->name}}" width="150" style="height: 100px"></a></td>
                            <td>{{$ourTeam->name}}</td>
                            <td>
                                {{$ourTeam->role}}
                            </td>
                            <td>{{$ourTeam->dateTime}}</td>
                            <td><a href="{{route('ourTeam.edit',['id'=>$ourTeam->id])}}"><i class="fa fa-edit font-size-23"></i></a></td>
                            <td><a href="#"><i class="fa fa-remove font-size-23"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection