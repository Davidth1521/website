@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>پیام ها</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">تماس با ما</li>
                    <li class="breadcrumb-item"><a href="/admin/contact-us/message/create">پیام ها</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش پیام ها</h5>
            <form action="{{route('message_search')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-4">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="جستجو پیام ها با آدرس ایمیل یا نام کاربری" name="search">

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
                        <th scope="col">نام</th>
                        <th scope="col">ایمیل</th>
                        <th scope="col">پیام</th>
                        <th scope="col">تاریخ</th>
                        <th scope="col">ویرایش</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 0;
                    ?>
                    @foreach($messages as $message)
                        <tr>
                            <th scope="row"><?= ++$i ?></th>
                            <td>{{$message->fullName}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->message}}</td>
                            <td>{{$message->dateTime}}</td>
                            <td><a href="{{route('message.edit',['id'=>$message->id])}}"><i class="fa fa-edit font-size-23"></i></a></td>
                            <td>
                                <form action="{{route('message.destroy',['id'=>$message->id])}}" method="post" id="remove">
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