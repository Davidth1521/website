@extends('layouts.master.master')
@section('content')
    <div class="page-header">
        <div>
            <h3>ویرایش نتایج سرویس</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">خدمات</li>
                    <li class="breadcrumb-item"><a href="/admin/service/result">نتایج خدمات</a></li>
                    <li class="breadcrumb-item">ویرایش</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش ویرایش نتایج سرویس</h5>
            <form action="{{route('result.update',['id'=>$item->id])}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">عنوان</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان" name="title" value="{{$item->title}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">آیکون</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="آیکون" name="icon" value="{{$item->icon}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">تعداد</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="تعداد" name="number" value="{{$item->number}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">وضعیت نمایش</label>
                        <div class="custom-control custom-checkbox custom-checkbox-success">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="status" @if($item->status == 1) checked @endif>
                            <label class="custom-control-label" for="customCheck2">وضعیت نمایش</label>
                        </div>
                    </div>
                </div>
                <div class="row d-block ml-1">
                    <div class="form-group">
                        <a href="/service/result" type="submit" class="btn btn-danger float-right mr-3" >بازگشت</a>
                        <button type="submit" class="btn btn-success float-right">ارسال</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection