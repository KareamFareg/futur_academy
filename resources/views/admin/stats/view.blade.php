@extends('layouts.adminlayout')
@section('title','عرض الأحصائيات')
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
                                            <th>إسم احصائيه</th>
                                            <th>تفاصيل احصائيه</th>
                                            <th>التحكم</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($statics as $stats)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <div>
                                                            <div class="font-weight-bolder">{{$stats->title}}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <div>
                                                            <div class="font-weight-bolder">{{$stats->details}}{{$stats->sign}}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                               
                                                <td class="text-nowrap">
                                                    <a href="/dashboard/stats/edit/{{$stats->id}}"> <i class="fa fa-edit"></i></a>
                                                    <a href="/dashboard/stats/delete/{{$stats->id}}" onclick="return confirm('Are you sure you want to delete this item?');" > <i data-feather='delete'></i></a>
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