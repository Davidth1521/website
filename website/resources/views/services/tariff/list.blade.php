@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>لیست تعرفه</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">خدمات</li>
                    <li class="breadcrumb-item"><a href="/admin/service/tariff">تعرفه</a></li>
                    <li class="breadcrumb-item">لیست</li>
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
                                <td>
                                    <form action="{{route('tariff.destroy',['id'=>$tariff->id])}}" method="post" id="remove">
                                        {{csrf_field()  }}
                                        {{method_field('delete')}}
                                        <a onclick="remove(this)" style="cursor: pointer"><i class="fa fa-remove font-size-23" style="color: #ff0000;"></i></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
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