@extends('layouts.adminlayout')
@section('title','كل الطلاب')
@section('extracss')
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/ui-feather.css">

@endsection
@section('content')

    <!-- BEGIN: Content-->
{{--    <div class="app-content content ">--}}
{{--        <div class="content-overlay"></div>--}}
{{--        <div class="header-navbar-shadow"></div>--}}
{{--        <div class="content-wrapper">--}}

{{--            <div class="content-body">--}}
{{--                <!-- Responsive tables start -->--}}
{{--                <div class="row" id="table-responsive">--}}
{{--                    <div class="col-12">--}}
{{--          <?php--}}
{{--//        foreach($faculties as $faculty){--}}
{{--//            $sectors = DB::table('sections')->select('id','name')->where('faculty_id',$faculty->id)->get();--}}
{{--//            for($i=0;$i<$sectors->count();$i++){--}}
{{--//                echo"<pre>";--}}
{{--//                var_dump($sectors[$i]->name);--}}
{{--//                echo "</pre>";--}}
{{--//            }--}}
{{--//        }--}}
{{--                        foreach($courses as $course){--}}
{{--                            var_dump($course->name);--}}
{{--                        }--}}
{{--          ?>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}




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
                                <h4 class="card-title"> كل الطلاب التابعين ل   {{$section->name}}</h4>
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
                                    @if( !empty($students))

                                        @foreach($students as $student)
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
                                                            <a href="/dashboard/student/profile/{{$student->id}}"> <i class="fa fa-eye"></i></a>
{{--                                                            <a href="/dashboard/student/profile/{{$student->id}}"> <i class="fa fa-eye"></i></a>--}}
                                                            <a href="/dashboard/student/edit/{{$student->id}}"> <i class="fa fa-edit"></i></a>
                                                            <a href="/dashboard/student/delete/{{$student->id}}" onclick="return confirm('Are you sure you want to delete this item?');" > <i data-feather='delete'></i></a>
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
@endsection