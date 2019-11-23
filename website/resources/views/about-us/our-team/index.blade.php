@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>لیست تیم</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">درباره ما</li>
                    <li class="breadcrumb-item"><a href="/admin/about_us/ourTeam">تیم ما</a></li>
                    <li class="breadcrumb-item">لیست</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش لیست تیم</h5>

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
                            <td>
                                <form action="{{route('ourTeam.destroy',['id'=>$ourTeam->id])}}" method="post" id="remove">
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