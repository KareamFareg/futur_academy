@extends('layouts.adminlayout')
@section('title','كل الطلاب')
@section('extracss')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/ui-feather.css">

@endsection
@section('content')

{{--    <!-- BEGIN: Content-->--}}

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-12">
{{--                        #########  REGISTER STUDENT TO COURSE--}}

                        <div class="alert alert-success" id="success_msg" style="display: none;padding: 10px;">تم الحفظ بنجاح</div>
                        <div class="alert alert-danger" id="error_msg" style="display: none;padding: 10px;">هناك خطأ في الحفظ يرجي الأعادة مره أخري </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h4 class="card-title"> تسجيل الطلاب في مادة <span style="color: red">{{$course->name}}</span> التابعه ل <span style="color: red">{{$course->section->name}}</span></h4>
                                </div>
                                <x-jet-validation-errors class="mb-4" class="alert alert-danger" style="padding: 10px"/>

                                <!-- Form -->
                                <form action="" class="mt-2" id="RegStdCourseForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <?php
                                              $students = DB::table('users')->select('id','name')->where('section_id',$course->section->id)->get();
                                        ?>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mb-2">
                                                <label for="semester">اسم الطالب</label>
                                                <select class="form-control" id="user_id" name="user_id" Required>
                                                    <option value="">اختر اسم الطالب</option>
                                                    @if($students != null)

                                                      @foreach($students as $student)

                                                        <option value="{{$student->id}}">{{$student->name}}</option>
                                                      @endforeach
                                                    @else
                                                        <option value="">لا يوجد طلاب قد سجلوا في هذا القسم بعد</option>
                                                    @endif
                                                </select>
                                                <small id="semester_error" class="form-text text-danger"></small>

                                            </div>
                                        </div>

                                        <input type="number" name="course_id" value="{{$course->id}}"  hidden required/>

                                        <div class="col-12 mt-50">
                                            <input type="submit" id="RegStdCourseButton" class="btn btn-primary mr-1" value="تسجيل ">
                                        </div>
                                    </div>
                                </form>
                                <!--/ Form -->
                            </div>
                        </div>



{{--                        ######### SHOW REGISTERED STUDENT TO COURSE--}}


                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> كل الطلاب الذين سجلوا في مادة   <span style="color: red">{{$course->name}}</span></h4>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0 table-hover-animation">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-nowrap">#</th>
                                            <th scope="col" class="text-nowrap">أسم  الطالب</th>
                                            <th scope="col" class="text-nowrap">البريد الالكتروني</th>
                                            <th scope="col" class="text-nowrap">رقم التليفون</th>
                                            <th scope="col" class="text-nowrap">المدينه </th>
                                            <th scope="col" class="text-nowrap">المنطقه</th>
                                            <th scope="col" class="text-nowrap">السنه الدراسيه</th>
                                            <th scope="col" class="text-nowrap">كود الطالب</th>
                                        <th scope="col" class="text-nowrap">التحكم</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if( !empty($course->users))

                                        @foreach($course->users as $student)
                                            @if($student->utype !== "ADM" && $student->is_graduated == 0)
                                                <tr>
                                                    <td class="text-nowrap">{{$loop->iteration}}</td>
                                                    <td class="text-nowrap">{{$student->name}}</td>
                                                    <td class="text-nowrap">{{$student->email}}</td>
                                                    <td class="text-nowrap">{{$student->phone}}</td>
                                                    <td class="text-nowrap">{{$student->city}}</td>
                                                    <td class="text-nowrap">{{$student->area}}</td>
                                                    <td class="text-nowrap">{{$student->year}}</td>
                                                    <td class="text-nowrap">{{$student->serial_number}}</td>


                                                    <td class="text-nowrap">
                                                            <a href="/dashboard/student/profile/{{$student->id}}" title="عرض ملف الطالب"> <i class="fa fa-eye"></i></a>
                                                            <a href="/dashboard/student/edit/{{$student->id}}"> <i class="fa fa-edit"></i></a>
                                                            <a href="/dashboard/course/student/delete/{{$course->id}}/{{$student->id}}" title=" حذف تسجيل الطالب" onclick="return confirm('هل تريد حذف تسجيل هذا الطالب من هذه المادة ؟');" > <i data-feather='delete'></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Responsive tables end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection



@section('extrajs')

    <script src="/app-assets/js/scripts/ui/ui-feather.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

    <script>
        $(document).on('click','#RegStdCourseButton',function (e) {
            e.preventDefault();

            $.ajax({
                type:"post",
                enctype: 'multipart/form-data',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                url: "{{route('ajax.student.course.store')}}",
                data: {
                    user_id: $("#user_id").val(),
                    course_id: $("input[name='course_id']").val(),
                    users_course_key:$("#user_id").val()+'-'+$("input[name='course_id']").val(),

                },

                success: function (data) {
                    if(data.status == true)
                        $('#success_msg').show();
                    else
                        $('#error_msg').show();
                }, error: function (reject)
                {

                    let response=$.parseJSON(reject.responseText);
                    $.each(response.error,function ( key, val) {
                        $('#'+key+'_error').text(val[0]);
                    });
                }
            });
        });

    </script>
@endsection