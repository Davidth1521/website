@extends('layouts.master.master')
@section('content')
    <div class="page-header">
        <div>
            <h3>ویرایش دسته مقاله</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/blog">مقاله</a></li>
                    <li class="breadcrumb-item">ویرایش دسته</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ویرایش دسته مقاله</h5>
            <form action="{{route('editCat',['id'=>$cat->id])}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">عنوان</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="عنوان دسته" name="title" value="{{$cat->title}}">

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">والد</label>
                        <select class="js-example-basic-single" dir="rtl" name="parent_id">
                            <option value="0">والد</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if($cat->parent_id == $category->id) selected @endif>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">وضعیت نمایش</label>
                        <div class="custom-control custom-checkbox custom-checkbox-success">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="status"
                                   @if($cat->status == 1) checked @endif>
                            <label class="custom-control-label" for="customCheck2">وضعیت نمایش</label>
                        </div>
                    </div>
                </div>
                <div class="row d-block ml-1">
                    <div class="form-group">
                        <a href="/blog/blogCategory" type="submit" class="btn btn-danger float-right mr-3" >بازگشت</a>
                        <button type="submit" class="btn btn-success float-right">ارسال</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection