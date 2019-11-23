@extends('layouts.master.master')
@section('content')
    <div class="page-header">
        <div>
            <h3>لیست سخن مشتریان</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">صفحه اصلی</li>
                        <li class="breadcrumb-item"><a href="/admin/index/customerSay">صحبت مشتری</a></li>
                        <li class="breadcrumb-item">لیست</li>
                    </ol>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش لیست سخن مشتریان</h5>
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
                        <th scope="col">متن</th>
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
                    @foreach($items as $item)
                        <tr>
                            <th scope="row"><?= ++$i ?></th>
                            <td><a href="/{{$item->image}}"><img src="/{{$item->image}}" alt="{{$item->subTitle}}" width="150" style="height: 100px;"></a></td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            <td>@if($item->status == 1) <span class="badge badge-success">فعال</span> @else <span class="badge badge-danger">غیر فعال</span>@endif</td>
                            <td>{{$item->dateTime}}</td>
                            <td><a href="{{route('customerSay.edit',['id'=>$item->id])}}"><i class="fa fa-edit font-size-23"></i></a></td>
                            <td>
                                <form action="{{route('customerSay.destroy',['id'=>$item->id])}}" method="post" id="remove">
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