@extends('layouts.master.master')
@section('content')
    <div class="page-header">
        <div>
            <h3>افزودن نقش</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/role">نقش</a></li>
                    <li class="breadcrumb-item">افزودن</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش نقش</h5>
            <form action="{{route('role.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">نام به فارسی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="نام به فارسی" name="label" value="{{old('label')}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">نام به انگلیسی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="نام به انگلیسی" name="name" value="{{old('name')}}">

                    </div>
                    {{--<div class="form-group col-sm-6">
                        <label for="">انتخاب ادمین</label>
                        <select name="user" class="form-control">
                            <option value=0>انتخاب کنید</option>
                            @foreach($users as $user)
                                <option value={{$user['id']}}>{{$user['name']}}</option>
                            @endforeach
                        </select>
                    </div>--}}
                    <div class="form-group col-sm-6">
                        <label for="">توضیحات</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
                                  placeholder=" توضیحات">{{old('description')}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{--<label for="">وضعیت نمایش</label>--}}
                        <div class="custom-control custom-checkbox custom-checkbox-primary">
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
        </div>
    </div>
@endsection