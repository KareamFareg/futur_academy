@extends('layouts.adminlayout')
@section('title','عرض الأخبار')
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
                <div class="row match-height">
                    <!-- Company Table Card -->
                    <div class="col-lg-12 col-12">
                        <div class="card card-company-table">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>إسم الخبر</th>
                                            <th>تفاصيل الخبر</th>
                                            <th>التحكم</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($events != null  &&  !empty($events))

                                            @foreach($events as $event)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar rounded">
                                                            <div class="avatar-content">
                                                                <img src="../../../app-assets/images/icons/toolbox.svg" alt="Toolbar svg" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="font-weight-bolder">{{$event->name}}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar rounded">
                                                            <div class="avatar-content">
                                                                <img src="../../../app-assets/images/icons/toolbox.svg" alt="Toolbar svg" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="font-weight-bolder">{{$event->details}}</div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-nowrap">
                                                    <a href="/dashboard/event/edit/{{$event->id}}"> <i class="fa fa-edit"></i></a>
                                                    {{--                                                        <a href="/dashboard/section/edit/{{$section->id}}"> <i data-feather='update'></i></a>--}}
                                                    <a href="/dashboard/event/delete/{{$event->id}}" onclick="return confirm('Are you sure you want to delete this item?');" > <i data-feather='delete'></i></a>
                                                </td>

                                            </tr>
                                         @endforeach
                                       @else
                                            <tr>
                                                <td>لا توجد أحداث جديدة</td>
                                            </tr>
                                       @endif
                                        </tbody>
                                    </table>
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