@extends('layouts.adminlayout')
@section('title','كل الأقسام')
@section('extracss')
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
                                <h4 class="card-title">كل الأقسام</h4>
                                <a class="card-title" href="/dashboard/section/add">اضافة قسم  جديد </a>
                                <a class="card-title" href="/dashboard/students/add">تسجيل طالب جديد </a>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0 table-hover-animation">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-nowrap">#</th>
                                            <th scope="col" class="text-nowrap">أسم  القسم</th>
                                        <th scope="col" class="text-nowrap"><span >عدد الطلاب</span> </th>
                                        <th scope="col" class="text-nowrap">التحكم</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sections as $section)
                                            <?php
                                            $students = DB::table('users')->where('section_id',$section->id)
                                                ->where('is_graduated' ,0)
                                                ->where('utype' ,'USR')
                                                ->count();
                                            ?>
                                            <tr>
                                                <td class="text-nowrap">{{$loop->iteration}}</td>
                                                <td class="text-nowrap">{{$section->name}}</td>
                                                <td class="text-nowrap">
                                                    @if($students != 0)
                                                        <a href="/dashboard/students/all/{{$section->id}}" title="عرض طلاب {{$section->name}}">{{$students}}</a>
                                                    @else
                                                        لا يوجد طلاب قد سجلوا بعد
                                                    @endif
                                                </td>

                                                <td class="text-nowrap">
                                                        <a href="/dashboard/courses/show/{{$section->id}}"> <i class="fa fa-eye"></i></a>
                                                        <a href="/dashboard/section/edit/{{$section->id}}"> <i class="fa fa-edit"></i></a>
{{--                                                        <a href="/dashboard/section/edit/{{$section->id}}"> <i data-feather='update'></i></a>--}}
                                                        <a href="/dashboard/section/delete/{{$section->id}}" onclick="return confirm('Are you sure you want to delete this item?');" > <i class="fa fa-remove"></i></a>
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