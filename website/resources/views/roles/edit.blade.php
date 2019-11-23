@extends('layouts.master.master')
@section('content')
    <div class="page-header">
        <div>
            <h3>ویرایش نقش</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/role">نقش</a></li>
                    <li class="breadcrumb-item">ویرایش</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش نقش</h5>
            <form class="form-horizontal" action="{{route('role.update',['id'=>$role['id']])}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}


                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">نام به فارسی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="نام به فارسی" name="label" value="{{$role->label}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">نام به انگلیسی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="نام به انگلیسی" name="name" value="{{$role->name}}">

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
                </div>





                {{--<div class="form-group">
                    <label class="control-label col-lg-2">ادمین ها</label>
                    <div class="col-lg-10">
                        <select name="user" class="form-control">
                            <option value="0">انتخاب کنید</option>
                            @foreach($users as $user)
                                <option value="{{$user['id']}}"
                                        @if($user['id'] == $userId) selected @endif>{{$user['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>--}}
                <div class="form-group">
                    <label class="control-label col-lg-2">دسترسی ها</label>
                    <div class="col-lg-10">
                        {{--<select name="permission" class="form-control">
                            <option value="0">انتخاب کنید</option>
                            @foreach($permissions as $permission)
                                <option value="{{$permission['id']}}" @if($permission['id'] == $pId) selected @endif>{{$permission['name']}}</option>
                                @endforeach
                        </select>--}}
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

                <div class="row">
                    @foreach($menus as $menu)
                        <div class="custom-control custom-checkbox custom-checkbox-primary float-right mr-3 mt-0">
                            {{--<label>
                                <input type="checkbox" class="styled" value="{{$menu['id']}}" name="permission[]"
                                       @if(in_array($menu['id'],$permissionArr)) checked @endif>
                                {{$menu['name']}}

                            </label>--}}



                            <input type="checkbox" class="custom-control-input" value="{{$menu['id']}}" id="customCheck_{{$menu['id']}}" name="permission[]" @if(in_array($menu['id'],$permissionArr)) checked @endif>
                            <label class="custom-control-label" for="customCheck_{{$menu['id']}}"> {{$menu['name']}}</label>
                        </div>
                    @endforeach
                </div>
                <div class="">
                    {{--@foreach($one as $i1)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="styled" value="{{$i1['id']}}" name="permission[]" @if(in_array($i1['id'],$permissionArr)) checked @endif>
                                {{$i1['name']}}
                            </label>
                        </div>
                    @endforeach
                    @foreach($two as $i2)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="styled" value="{{$i2['id']}}" name="permission[]" @if(in_array($i2['id'],$permissionArr)) checked @endif>
                                {{$i2['name']}}
                            </label>
                        </div>
                    @endforeach
                    @foreach($three as $i3)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="styled" value="{{$i3['id']}}" name="permission[]" @if(in_array($i3['id'],$permissionArr)) checked @endif>
                                {{$i3['name']}}
                            </label>
                        </div>
                    @endforeach
                    @foreach($four as $i4)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="styled" value="{{$i4['id']}}" name="permission[]" @if(in_array($i4['id'],$permissionArr)) checked @endif>
                                {{$i4['name']}}
                            </label>
                        </div>
                    @endforeach
                    @foreach($five as $i5)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="styled" value="{{$i5['id']}}" name="permission[]" @if(in_array($i5['id'],$permissionArr)) checked @endif>
                                {{$i5['name']}}
                            </label>
                        </div>
                    @endforeach--}}
                </div>

                <div class="text-left">
                    <button type="submit" class="btn btn-primary">ارسال <i
                                class="icon-arrow-left13 position-right"></i></button>
                </div>

            </form>
        </div>
    </div>
@endsection