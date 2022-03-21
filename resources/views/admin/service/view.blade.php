@extends('layouts.adminlayout')
@section('title','عرض الخدمات')
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
                                            <th>إسم الخدمه</th>
                                            <th>تفاصيل الخدمه</th>
                                            <th>نوع الخدمه</th>
                                            <th>التحكم</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($services as $service)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar rounded">
                                                            <div class="avatar-content">
                                                                <img src="../../../app-assets/images/icons/toolbox.svg" alt="Toolbar svg" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="font-weight-bolder">{{$service->name}}</div>
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
                                                            <div class="font-weight-bolder">{{$service->details}}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if($service->type ==1)
                                                            <div class="avatar bg-light-primary mr-1">
                                                                <div class="avatar-content">
                                                                    <i data-feather="user" class="font-medium-3"></i>
                                                                </div>
                                                            </div>
                                                            <span>هذه الخدمه خاصة بالطلاب</span>
                                                        @else($service->type ==0)
                                                            <div class="avatar bg-light-primary mr-1">
                                                                <div class="avatar-content">
                                                                    <i data-feather="award" class="font-medium-3"></i>
                                                                </div>
                                                            </div>
                                                            <span>هذه الخدمه خاصة بهيئه التدريس</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <a href="/dashboard/service/edit/{{$service->id}}"> <i class="fa fa-edit"></i></a>
                                                    {{--                                                        <a href="/dashboard/section/edit/{{$section->id}}"> <i data-feather='update'></i></a>--}}
                                                    <a href="/dashboard/service/delete/{{$service->id}}" onclick="return confirm('Are you sure you want to delete this item?');" > <i data-feather='delete'></i></a>
                                                </td>

                                            </tr>
                                        @endforeach
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