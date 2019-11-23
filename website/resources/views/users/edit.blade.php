@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>ویرایش کاربر</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/admin">مدیریت کاربران</a></li>
                    <li class="breadcrumb-item">ویرایش</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش ویرایش کاربران</h5>
            <form class="form-horizontal" action="{{route('admin.update',['id'=>$admin->id])}}" method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}


                <div class="row">
                    <div class="form-group col-lg-4">
                        <label class="control-label">نام</label>
                        <input type="text" name="name" class="form-control" value="{{$admin->name}}">
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="control-label ">پست الکترونیکی</label>
                        <input type="text" name="email" class="form-control" value="{{$admin->email}}">
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="control-label">نقش</label>
                        <select name="roleId" class="form-control">
                            <option value="0">انتخاب کنید</option>
                            {{--@if(isset($roles))--}}
                                @foreach($roles as $currentRole)
                                    {{--@if($role->name != 'super admin')--}}
                                        <option value="{{$currentRole->id}}" @if($role->id == $currentRole->id) selected @endif>{{$currentRole->name}}</option>
                                    {{--@endif--}}
                                @endforeach
                            {{--@endif--}}
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="control-label ">رمز عبور</label>
                        <input type="text" name="password" class="form-control ">
                    </div>

                </div>
                {{--                @if($admin['type'] == 'admin' and $roleName == 'super admin')--}}
                {{--<div class="checkbox checkbox-switchery switchery-sm switchery-double">--}}

                    {{--@if($admin->type == 'admin')--}}
                        {{--<label>--}}
                            {{--ادمین--}}
                            {{--<input type="checkbox" class="switchery" name="adminOrUser">--}}
                            {{--کاربر عادی--}}
                        {{--</label>--}}
                    {{--@endif--}}
                    {{--@if($admin->type == "user")--}}
                        {{--<label>--}}
                            {{--ادمین--}}
                            {{--<input type="checkbox" class="switchery" name="adminOrUser">--}}
                            {{--کاربر عادی--}}
                        {{--</label>--}}
                    {{--@endif--}}
                {{--</div>--}}
                {{--<div class="form-group">
                    <label class="control-label col-lg-2">نقش</label>
                    <div class="col-lg-10">
                        <select name="roleId" class="form-control">
                            <option value="0">انتخاب کنید</option>
                            @if(isset($roles))
                                @foreach($roles as $role)
                                    @if($role->name != 'super admin')
                                        <option value="{{$role->id}}"
                                                @if(($role->id) == $roleId) selected @endif>{{$role->name}}</option>
                                    @endif
                                @endforeach
                            @endif
                            --}}{{--<option value="opt2">یک</option>--}}{{--
                            --}}{{--<option value="opt3">دو</option>
                            <option value="opt4">سه</option>
                            <option value="opt5">چهار</option>
                            <option value="opt6">پنج</option>
                            <option value="opt7">شش</option>
                            <option value="opt8">هفت</option>--}}{{--
                        </select>
                    </div>
                </div>--}}
                {{--<div class="form-group">
                    <label class="control-label col-lg-2">دسترسی ها</label>
                    <div class="col-lg-10">
                        <ul>
                            @foreach($permissions as $permission)
                                <li>{{$permission->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>--}}
                {{--@endif--}}
                <div class="form-group col-sm-6">
                    {{--<label for="">وضعیت نمایش</label>--}}
                    <div class="custom-control custom-checkbox custom-checkbox-primary">
                        <input type="checkbox" class="custom-control-input" id="customCheck2" name="type" @if($admin->type == 1) checked @endif>
                        <label class="custom-control-label" for="customCheck2">ادمین باشد</label>
                    </div>
                </div>

                <div class="text-left">
                    <button type="submit" class="btn btn-primary">ارسال <i
                                class="icon-arrow-left13 position-right"></i></button>
                </div>

            </form>
        </div>
    </div>
@endsection