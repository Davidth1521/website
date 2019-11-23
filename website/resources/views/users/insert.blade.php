@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>افزودن کاربر</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/admin">مدیریت کاربران</a></li>
                    <li class="breadcrumb-item">افزودن</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش افزودن کاربران</h5>
            <form class="form-horizontal" action="{{route('admin.store')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label class="control-label">نام</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="control-label ">پست الکترونیکی</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="control-label">نقش</label>
                        <select name="roleId" class="form-control">
                            <option value="0">انتخاب کنید</option>
                            @foreach($roles as $role)
                                @if($role->name != 'super admin')
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>


                {{--<div class="form-group">
                    <label class="control-label col-lg-2">تکرار رمز عبور</label>
                    <div class="col-lg-10">
                        <input type="text" name="repeatPassword" class="form-control">
                    </div>
                </div>--}}
                {{--                    @if($roleName == 'super admin')--}}
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label class="control-label ">رمز عبور</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="control-label ">تکرار رمز عبور</label>
                        <input type="password" name="confirm" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        {{--<label class="custom-control-label" for="customSwitch">کاربر</label>--}}
                        <input type="checkbox" class="custom-control-input" id="customSwitch" name="type" checked>
                        <label class="custom-control-label" for="customSwitch">ادمین باشد</label>
                    </div>
                </div>

                {{--@else--}}

                {{--@endif--}}


                <div class="text-left">
                    <button type="submit" class="btn btn-primary">ارسال <i class="icon-arrow-left13 position-right"></i>
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection