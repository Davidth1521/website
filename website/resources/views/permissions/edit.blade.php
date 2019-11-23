@extends('layouts.master.master')
@section('content')
    <div class="page-header">
        <div>
            <h3>ویرایش دسترسی</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/permission">نقش</a></li>
                    <li class="breadcrumb-item">ویرایش</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش ویرایش دسترسی</h5>
            <form action="{{route('permission.update',['id'=>$permission['id']])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('patch')}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">نام به فارسی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="نام به فارسی" name="name" value="{{$permission['name']}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">نام به انگلیسی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="نام به انگلیسی" name="unique_name" value="{{$permission['unique_name']}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">معرفی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="معرفی" name="label" value="{{$permission['label']}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">نقش</label>
                        <select name="role" class="form-control">
                            <option value=0>انتخاب کنید</option>
                            @foreach($roles as $role)
                                <option value={{$role['id']}} @if(isset($rId)) @if($rId == $role['id']) selected @endif @endif>{{$role['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{--<label for="">وضعیت نمایش</label>--}}
                        <div class="custom-control custom-checkbox custom-checkbox-primary">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="status" @if($permission['status'] == 1) checked @endif>
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
