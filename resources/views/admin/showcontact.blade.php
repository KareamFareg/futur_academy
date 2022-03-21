@extends('layouts.adminlayout')
@section('title','عرض اتصل بنا')
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
                                <h4 class="card-title">عرض تصل بنا</h4>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0 table-hover-animation">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">#</th>
                                      
                                            <th scope="col" class="text-nowrap">البريد الإلكتروني</th>
                                            <th scope="col" class="text-nowrap">الهاتف </th>
                                            <th scope="col" class="text-nowrap">الإسم</th>
                                            <th scope="col" class="text-nowrap">تفاصيل</th>
                                            <!--<th scope="col" class="text-nowrap"> قبول الاعلان </th>-->
          
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($settings as $SingleContent)
                                        <tr>
                                            <td class="text-nowrap">{{$loop->iteration}}</td>
                                            <td class="text-nowrap">{{$SingleContent->email}}</td>
                                            <td class="text-nowrap">{{$SingleContent->phone}}</td>
                                            <td class="text-nowrap">{{$SingleContent->name}}</td>
                                            <td class="text-nowrap">{{$SingleContent->details}}</td>
                                           
                                
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