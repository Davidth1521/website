@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>ویرایش جزئیات تعرفه</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">خدمات</li>
                    <li class="breadcrumb-item"><a href="/admin/service/tariff">تعرفه</a></li>
                    <li class="breadcrumb-item">ویرایش جزئیات تعرفه</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش ویرایش جزئیات تعرفه</h5>
            <form action="{{route('tariff_detail.update',['id'=>$tariffDetail->id])}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">ویژگی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="ویژگی" name="attribute" value="{{$tariffDetail->attribute}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">تعرفه</label>
                        <select class="js-example-basic-single" dir="rtl" name="tariff_id">
                            <option value="0">انتخاب کنید</option>
                            @foreach($tariffs as $tariff)
                                <option value="{{$tariff->id}}" @if($tariffDetail->tariff_id == $tariff->id) selected @endif>{{$tariff->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">وضعیت نمایش</label>
                        <div class="custom-control custom-checkbox custom-checkbox-success">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="status" @if($tariffDetail->status == 1) checked @endif>
                            <label class="custom-control-label" for="customCheck2">وضعیت نمایش</label>
                        </div>
                    </div>
                </div>
                <div class="row d-block ml-1">
                    <div class="form-group">
                        <a href="/service/tariff_detail/create" type="submit" class="btn btn-danger float-right mr-3">بازگشت</a>
                        <button type="submit" class="btn btn-success float-right">ارسال</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection