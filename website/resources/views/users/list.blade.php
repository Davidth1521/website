@extends('layouts.master.master')
@section('content')
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>لیست کاربران</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/admin/">مدیریت کاربران</a></li>
                    <li class="breadcrumb-item">لیست</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">بخش لیست کاربران</h5>


            <div class="table-responsive">
                <table class="table blogsTable">
                    <thead>
                    <tr>

                    </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>

                {{--<div class="my_paginate">
                    <span class="paginateSpan">
                        {{ $admins->links() }}
                    </span>
                </div>--}}

            </div>


            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>انتخاب</th>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>پست الکترونیکی</th>
                    <th>نقش</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $counter = 1;
                ?>
                @foreach($admins as $key=>$admin)
                    <tr>
                        <td class="idCheckbox">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="customCheckBoxInline_{{$key}}" name="checked[]" class="custom-control-input" value="{{$admin->id}}" onclick="any(this);">
                                <label class="custom-control-label" for="customCheckBoxInline_{{$key}}"></label>
                            </div>
                        </td>

                        <td>{{$key+1}}</td>

                        <td></a>{{$admin->name}}</td>


                        <td>{{$admin->email}}</td>

                        <td>{{$admin->role['name']}}</td>



                        <td><a href="{{route('admin.edit',['id'=>$admin->id])}}"><i
                                        class="fa fa-edit font-size-23"
                                        ></i></a></td>
                        <td>
                            <form action="{{route('admin.destroy',['id'=>$admin->id])}}" method="post" id="remove">
                                {{csrf_field()  }}
                                {{method_field('delete')}}
                                <a onclick="remove(this)" style="cursor: pointer"><i class="fa fa-remove font-size-23" style="color: #ff0000;"></i></a>
                            </form>
                        </td>

                    </tr>
                @endforeach
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


    <script>
        var allCheckedSelect = [];
        function any(tag) {
            var tag = $(tag);
            var parentTag = tag.parent();


            if (tag.prop("checked") == true) {
                allCheckedSelect.push(tag.val());
//                alert(tag.val());
                var allCheckedSelectCount = allCheckedSelect.length;
                $('.checkedNumber').html('تعداد مورد انتخاب شده برابر است با : ' + allCheckedSelectCount + ' مورد ');
                $(".checkedNumber").fadeIn();
                if (!parentTag.hasClass('checked')) {
                    parentTag.addClass('checked');
                }
            } else {
                if (parentTag.hasClass('checked')) {
                    parentTag.removeClass('checked');
                }
                allCheckedSelect.pop();
                var allCheckedSelectCount = allCheckedSelect.length;
                $('.checkedNumber').html('تعداد مورد انتخاب شده برابر است با : ' + allCheckedSelectCount + ' مورد ');
                $(".checkedNumber").fadeIn();
            }
        }

        function submit() {
            var tbodyMultiRemove = $('.blogsTable').find('tbody');
            $.ajax({
                datatype: 'json',
                type: "post",
                cache: false,
{{--                url: "{{route('multiRemoveAdmin')}}",--}}
                data: {'_token': '{{csrf_token()}}', allCheckedSelect: allCheckedSelect},
                success: function (data) {
                    var admins = data['admin'];
                    if (data['delete'] == 'success') {
                        swal({
                            title: "مقاله مورد نظر با موفقیت حذف شد",
                            icon: "success",
                            button: "تایید",
                            allowOutsideClick: true,
                        });
//                        console.log(blogs);
                        tbodyMultiRemove.html('');
                        var counterMultiRemove = 1;
                        var spanCheck = '';
                        var inputCheck = '';
                        var i = 0;
                        $.each(admins, function (key, value) {
                                if (allCheckedSelect[i] == value['id']) {
                                    spanCheck = 'checked';
                                    inputCheck = 'checked';
                                }
                                else {
                                    spanCheck = '';
                                    inputCheck = '';
                                }
                                var itemMultiRemove = ' <tr><td class="idCheckbox"><div class="checker bg-white"><span class="' + spanCheck + '"><input class="check styled" type="checkbox" name="id" value="' + value['id'] + '" onclick="any(this);" ' + inputCheck + '></span></div></td>'
                                    + '<td>' + counterMultiRemove + '</td>'
                                    + '<td>' + value['name'] + '</td>'
                                    + '<td>' +value['email']+'</td>'
                                    + '<td>' +value['role']['name']+'</td>'
                                    + '<td>' + value['type'] + '</td>'
                                    + '<td><a href="/admin/admin/' + value["id"] + '/edit"><i class="glyphicon glyphicon-edit" style="color: #000;width:15px;height: 19px"></i></a></td>'
                                    + '<td><a id="' + value['id'] + '" class="singleRemove" onclick="singleRemoveFunc(this);"><i class="glyphicon glyphicon-remove cross" style="color: red"></i></a></td></tr>';
                                tbodyMultiRemove.append(itemMultiRemove);
                                counterMultiRemove = counterMultiRemove + 1;
                                i = i + 1;
                            }
                        );
                        i = 0;
                    }
//                    var paginate = data['paginate'];
//                    $('.my_paginate').find('.paginateSpan').remove();
//                    $('.my_paginate').find('.paginateSpan').append(paginate);
//                    allCheckedSelect = [];
                }
            })
            ;

        }
    </script>

    {{--search with enter--}}
    <script>
        $('#searchTitle').keypress(function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                var tag = $('.search');
                searchBlog(tag);
            }
        });
    </script>

    {{--search with button--}}
    <script>
        function searchBlog(tag) {
//            console.log(allCheckedSelect);
            var tbody1 = $('.blogsTable').find('tbody');
            var tag = $(tag);
            var value = tag.parents('.searchBox').find('#searchTitle').val();
            $.ajax({
                datatype: 'json',
                type: "post",
                cache: false,
                {{--url: "{{route('searchTitleAdmin')}}",--}}
                data: {'_token': '{{csrf_token()}}', value: value},
                success: function (data) {
//                    var abc=data['paginate'];
//                    console.log(abc);
                    var custom = data['admin'];
                    var counter1 = 1;
                    tbody1.html('');
                    var spanCheck = '';
                    var inputCheck = '';


                    $.each(custom, function (key, value) {
                        var checking = "" + value['id'];
                        if (allCheckedSelect.includes(checking)) {
                            spanCheck = 'checked';
                            inputCheck = 'checked';
                            console.log('yes')
                        } else {
                            spanCheck = '';
                            inputCheck = '';
                            console.log('no')
                        }

                        var item1 = ' <tr><td class="idCheckbox"><div class="checker bg-white"><span class="' + spanCheck + '"><input class="check styled" type="checkbox" name="id" value="' + value['id'] + '" onclick="any(this);" ' + inputCheck + '></span></div></td>'
                            + '<td>' + counter1 + '</td>'
                            + '<td>' + value['name'] + '</td>'
                            + '<td>' + value['email'] + '</td>'
                            + '<td>' +value['role']['name']+'</td>'
                            + '<td>' + value['type'] + '</td>'
                            + '<td><a href="/admin/admin/' + value["id"] + '/edit"><i class="glyphicon glyphicon-edit" style="color: #000;width:15px;height: 19px"></i></a></td>'
                            + '<td><a id="' + value['id'] + '" class="singleRemove" onclick="singleRemoveFunc(this);"><i class="glyphicon glyphicon-remove cross" style="color: red"></i></a></td></tr>';
                        tbody1.append(item1);
                        counter1 = counter1 + 1;
                    });

//                    var paginate = data['paginate'];
                    $('.my_paginate').find('.paginateSpan').remove();

                    $('.searchNumber').html('تعداد مورد یافت شده برابر است با : ' + data['size'] + ' مورد ');
                    $(".searchNumber").fadeIn();
//                    $('.my_paginate').find('.paginateSpan').append(paginate);
                }
            })

        }
    </script>


    {{-- remove blogs together --}}


    {{-- delete articles together sweetalert --}}
    <script>
        @if(session()->get('article_delete')=='success')
        swal({
            title: "مقاله مورد نظر با موفقیت حذف شد",
            icon: "success",
            button: "تایید",
            allowOutsideClick: true,
        });
        @endif
    </script>

    {{-- remove single blog --}}
    <script>
        //        $(".singleRemove").each(function () {
        //            $(this).on("click", function () {
        //                singleRemoveFunc();
        function singleRemoveFunc(tag) {
            var tag = $(tag);
            var id = tag.attr('id');
            var checking = "" + id;
            if (allCheckedSelect.includes(checking)) {
                var index = allCheckedSelect.indexOf(checking);
                console.log(index);
                allCheckedSelect.splice(index, 1);
                console.log(allCheckedSelect);
                var allCheckedSelectCount = allCheckedSelect.length;
                $(".checkedNumber").fadeOut();
                $('.checkedNumber').html('تعداد مورد انتخاب شده برابر است با : ' + allCheckedSelectCount + ' مورد ');
                $(".checkedNumber").fadeIn();
            }
            swal({
                buttons: {
                    cancel: true,
                    confirm: true
                },
                title: 'حذف شود',
                text: "اطمینان به انجام این عمل دارید؟",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-success',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف',
            }, function (isConfirm) {
                if (isConfirm) {
                    var tbodySingleRemove = $('.blogsTable').find('tbody');
                    $.ajax({
                        datatype: 'json',
                        type: "post",
                        cache: false,
{{--                        url: "{{route('singleRemoveAdmin')}}",--}}
                        data: {'_token': '{{csrf_token()}}', adminId: id},
                        success: function (data) {
                            var custom = data['admin'];
                            var counterSingleRemove = 1;
                            tbodySingleRemove.html('');
                            var spanCheck = '';
                            var inputCheck = '';
                            $.each(custom, function (key, value) {
                                var checking = "" + value['id'];
                                if (allCheckedSelect.includes(checking)) {
                                    spanCheck = 'checked';
                                    inputCheck = 'checked';
                                    console.log('yes')
                                } else {
                                    spanCheck = '';
                                    inputCheck = '';
                                    console.log('no')
                                }
                                var itemSingleRemove = ' <tr><td class="idCheckbox"><div class="checker bg-white"><span class="' + spanCheck + '"><input class="check styled" type="checkbox" name="id" value="' + value['id'] + '" onclick="any(this);" ' + inputCheck + '></span></div></td>'
                                    + '<td>' + counterSingleRemove + '</td>'
                                    + '<td>' + value['name'] + '</td>'
                                    + '<td>' + value['email'] + '...</td>'
                                    + '<td>' +value['role']['name']+'</td>'
                                    + '<td>' + value['type'] + '</td>'
                                    + '<td><a href="/admin/admin/' + value["id"] + '/edit"><i class="glyphicon glyphicon-edit" style="color: #000;width:15px;height: 19px"></i></a></td>'
                                    + '<td><a id="' + value['id'] + '" class="singleRemove" onclick="singleRemoveFunc(this);"><i class="glyphicon glyphicon-remove cross" style="color: red"></i></a></td></tr>';
                                tbodySingleRemove.append(itemSingleRemove);
                                counterSingleRemove = counterSingleRemove + 1;

                            });

//                            var paginate = data['paginate'];
//                            $('.my_paginate').find('.paginateSpan').remove();
//                            $('.my_paginate').find('.paginateSpan').append(paginate);


                        }
                    })
                }
            })

        }
        //        $('#searchTitle').focusout(function () {
        //            $(".searchNumber").fadeOut();
        //        });
        $('.check').focusout(function () {
            $(".checkedNumber").fadeOut();
        });
    </script>
@endsection