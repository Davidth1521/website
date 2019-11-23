@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>جزئیات تعرفه</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">خدمات</li>
                    <li class="breadcrumb-item"><a href="/admin/service/tariff">تعرفه</a></li>
                    <li class="breadcrumb-item">جزئیات تعرفه</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش جزئیات تعرفه</h5>
            <form action="{{route('tariff_detail.store')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">ویژگی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="ویژگی" name="attribute" value="{{old('attribute')}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">تعرفه</label>
                        <select class="js-example-basic-single" dir="rtl" name="tariff_id">
                            <option value="0">انتخاب کنید</option>
                            @foreach($tariffs as $tariff)
                                <option value="{{$tariff->id}}">{{$tariff->title}}</option>
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
                        <th scope="col">عنوان ویژگی</th>
                        <th scope="col">تاریخ ایجاد</th>
                        <th scope="col">تعرفه</th>
                        <th scope="col">ویرایش</th>
                        <th scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 0;
                    ?>
                    @if(isset($tariffDetails))
                        @foreach($tariffDetails as $tariffDetail)
                            <tr>
                                <th scope="row"><?= ++$i ?></th>
                                <td>{{$tariffDetail->attribute}}</td>
                                <td>{{$tariffDetail->dateTime}}</td>
                                <td>{{$tariffDetail->parentName}}</td>
                                <td><a href="{{route('tariff_detail.edit',['id'=>$tariffDetail->id])}}"><i class="fa fa-edit font-size-23"></i></a></td>
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