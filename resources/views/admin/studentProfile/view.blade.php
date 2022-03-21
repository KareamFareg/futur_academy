@extends('layouts.adminlayout')
@section('title','  بيانات الطالب ')
@section('extracss')
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/ui-feather.css">

@endsection
@section('content')

{{--    <!-- BEGIN: Content-->--}}
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
{{--//            $sectors = DB::table('students')->select('id','name')->where('faculty_id',$faculty->id)->get();--}}
{{--//            for($i=0;$i<$sectors->count();$i++){--}}
{{--//                echo"<pre>";--}}
{{--//                var_dump($sectors[$i]->name);--}}
{{--//                echo "</pre>";--}}
{{--//            }--}}
{{--//        }--}}
{{--                        echo"<pre>";--}}
{{--//                        var_dump($student->faculty['name']);--}}

{{--                        var_dump($results[0]->course['name']);--}}
{{--                        echo "</pre>";--}}
{{--//                        $results = DB::select("SELECT * FROM `results` where `user_id`= '.$student->id.'");--}}
{{--//                        foreach($results as $result){--}}
{{--//                            $course = DB::table('courses')->where('id',$result->id)->get();--}}
{{--//                            echo"<pre>";--}}
{{--//                            var_dump($course[0]->name);--}}
{{--//                             echo "</pre>";--}}
{{--//                         }--}}
{{--//                        ?>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

<style>
    th{
        color: #5446ef;
    }
</style>


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
                                <h4 class="card-title"> بيانات الطالب {{$student->fullName}}</h4>
                                <img src="{{asset('assets/images/letters')}}/{{$student->img}}" width="100" height="100">
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0 table-hover-animation">
                                    <tr>
                                        <th scope="col" class="text-nowrap">أسم  القسم</th>
                                        <td class="text-nowrap">{{$student->name}}</td>
                                        <th scope="col" class="text-nowrap">البريد الألكتروني</th>
                                        <td class="text-nowrap">{{$student->email}}</td>

                                    </tr>
                                    <tr>
                                        <th scope="col" class="text-nowrap">رقم التليقون</th>
                                        <td class="text-nowrap">{{$student->phone}}</td>
                                        <th scope="col" class="text-nowrap">العنوان</th>
                                        <td class="text-nowrap">{{$student->city}}, {{$student->area}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="text-nowrap">السنة الدرسية</th>
                                        <td class="text-nowrap">{{$student->year}}</td>
                                        <th scope="col" class="text-nowrap">التخصص</th>
                                        <td class="text-nowrap">{{$student->section['name']}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="text-nowrap">الرقم التسلسلي</th>
                                        <td class="text-nowrap">{{$student->serial_number}}</td>
                                        <th></th>
                                        <td></td>
                                    </tr>


                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> درجات الطالب {{$student->fullName}}</h4>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0 table-hover-animation">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-nowrap">#</th>
                                        <th scope="col" class="text-nowrap">المادة الدراسية</th>
                                        <th scope="col" class="text-nowrap">السنة الدراسية</th>
                                        <th scope="col" class="text-nowrap">الترم</th>
                                        <th scope="col" class="text-nowrap">درجات الطالب</th>
                                        <th scope="col" class="text-nowrap">اقصي درجه</th>
                                        <th scope="col" class="text-nowrap"> درجة النجاح  </th>
                                        <th scope="col" class="text-nowrap">التقدير</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if( !empty($results))
                                        @foreach($results as $result)
                                        <tr>
                                            <td class="text-nowrap">{{$loop->iteration}}</td>
                                            <td class="text-nowrap">{{$result->course['name']}}</td>
                                            <td class="text-nowrap">{{$result->course['year']}}</td>
                                            <td class="text-nowrap">{{$result->course['semester']}}</td>
                                            <td class="text-nowrap">{{$result->degree}}</td>
                                            <td class="text-nowrap">{{$result->course['max_degree']}}</td>
                                            <td class="text-nowrap">{{$result->course['min_degree']}}</td>
                                            @if($result->degree < 50  )
                                                <td class="text-nowrap" style="color: darkred">راسب</td>
                                            @elseif($result->degree >= 50 && $result->degree < 65 )
                                                <td class="text-nowrap">مقبول</td>
                                            @elseif($result->degree >= 65 && $result->degree < 75 )
                                                <td class="text-nowrap">جيد</td>
                                            @elseif($result->degree >= 75 && $result->degree < 85 )
                                                <td class="text-nowrap">جيد جداً</td>
                                            @else($result->degree >= 85 && $result->degree < 100 )
                                                <td class="text-nowrap">إمتيازً</td>
                                            @endif
                                        </tr>
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