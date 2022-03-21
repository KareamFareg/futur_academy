@extends('layouts.adminlayout')
@section('title','عرض القطاعات')
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
                                <h4 class="card-title">عرض القطاعات</h4>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0 table-hover-animation">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">#</th>
                                            <th scope="col" class="text-nowrap">القطاع</th>
                                            <th scope="col" class="text-nowrap">الصوره</th>
                                            <th scope="col" class="text-nowrap">التحكم</th>
          
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($services as $SingleContent)
                                        <tr>
                                            <td class="text-nowrap">{{$loop->iteration}}</td>
                                            <td class="text-nowrap">{{$SingleContent->name}}</td>
                                            <td class="text-nowrap"> 
                                             <img src="{{$SingleContent->img}}" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="170" height="110"  />
</td>
                                     
                                            
                                            <td class="text-nowrap">
                                           <a href="/dashboard/sector/edit/{{$SingleContent->id}}"> <i data-feather='edit'></i></a>
                                           <a href="/dashboard/sector/delete/{{$SingleContent->id}}" onclick="return confirm('Are you wantto delete this item?');" > <i data-feather='delete'></i></a>
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