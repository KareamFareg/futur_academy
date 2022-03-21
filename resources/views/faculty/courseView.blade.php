@extends('layouts.adminlayout')
@section('title','كل المواد')
@section('extracss')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/ui-feather.css">


@endsection
@section('content')

    <!-- BEGIN: Content-->


    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> كل المواد التابعه ل <span style="color: red">{{$section[0]->name}}</span></h4>
                                <a class="card-title" href="/dashboard/course/add/{{$section[0]->id}}">اضافة مادة دراسيه جديدة </a>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0 table-hover-animation">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-nowrap">#</th>
                                        <th scope="col" class="text-nowrap">أسم  المادة الدراسيه</th>
                                        <th scope="col" class="text-nowrap"><span >السنة الدراسية </span>  </th>
                                        <th scope="col" class="text-nowrap"><span >الترم</span> </th>
                                        <th scope="col" class="text-nowrap"><span > اقصي درجه</span> </th>
                                        <th scope="col" class="text-nowrap"><span >  درجه النجاح</span> </th>
                                        <th scope="col" class="text-nowrap"><span > عدد الطلاب</span> </th>
                                        <th scope="col" class="text-nowrap">التحكم</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($courses as $course)
                                            <tr>
                                                <td class="text-nowrap">{{$loop->iteration}}</td>
                                                <td class="text-nowrap">{{$course->name}}</td>
                                                <td class="text-nowrap">{{$course->year}}</td>
                                                @if($course->semester == 1)
                                                    <td class="text-nowrap">الترم الأول </td>
                                                @else
                                                    <td class="text-nowrap">الترم الثاني</td>
                                                @endif
                                                <td class="text-nowrap">{{$course->max_degree}}</td>
                                                <td class="text-nowrap">{{$course->min_degree}}</td>
                                                <td class="text-nowrap">
                                                    @if($course->users->count() != 0)
                                                        {{$course->users->count()}}
{{--                                                        <a href="/dashboard/students/all/{{$faculty->id}}/{{$section->id}}" title="عرض طلاب {{$section->name}}">{{$course->users->count()}}</a>--}}
{{--                                                        <a href="/dashboard/students/all/{{$faculty->id}}/{{$section->id}}" title="عرض طلاب {{$section->name}}">{{$course->users->count()}}</a>--}}
                                                    @else
                                                        لا يوجد طلاب قد سجلوا بعد
                                                    @endif
                                                </td>

                                                <td class="text-nowrap">
                                                        <a href="/dashboard/courses/students/show/{{$course->id}}"> <i class="fa fa-eye"></i> </a>
                                                        <a href="/dashboard/course/edit/{{$course->id}}"> <i class="fa fa-edit"></i></a>
{{--                                                        <a href="/dashboard/section/edit/{{$section->id}}"> <i data-feather='update'></i></a>--}}
                                                        <a href="/dashboard/courses/delete/{{$section[0]->id}}/{{$course->id}}" onclick="return confirm('Are you sure you want to delete this item?');" > <i data-feather='delete'></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
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

@endsection