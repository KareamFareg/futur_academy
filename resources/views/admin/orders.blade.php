@extends('layouts.adminlayout')
@section('title','عرض الطلبات')
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
                                <h4 class="card-title">عرض الطلبات</h4>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0 table-hover-animation">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">#</th>
                                            <th scope="col" class="text-nowrap">العنوان</th>
                                            <th scope="col" class="text-nowrap">نوع العقار</th>
                                            <th scope="col" class="text-nowrap">إسم الشركة المعلنه </th>
                                            <th scope="col" class="text-nowrap">عدد الغرف</th>
                                            <th scope="col" class="text-nowrap">عدد الحمام</th>
                                            <th scope="col" class="text-nowrap"> عدد المرائب</th>
                                            <th scope="col" class="text-nowrap">المكان</th>
                                            <th scope="col" class="text-nowrap"> السعر </th>
                                            <th scope="col" class="text-nowrap"> الصور </th>
                                            <th scope="col" class="text-nowrap"> قبول الاعلان </th>
                                            <th scope="col" class="text-nowrap">  التحكم </th>
                                            <th scope="col" class="text-nowrap">  اضافه في عروضنا </th>
          
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders as $SingleContent)
                                        <tr>
                                            <td class="text-nowrap">{{$loop->iteration}}</td>
                                            <td class="text-nowrap">{{$SingleContent->name}}</td>
                                            <td class="text-nowrap">{{$SingleContent->type_name}}</td>
                                            <td class="text-nowrap">{{$SingleContent->office_name}}</td>
                                            <td class="text-nowrap">{{$SingleContent->rooms}}</td>
                                            <td class="text-nowrap">{{$SingleContent->bathroom}}</td>
                                            <td class="text-nowrap">{{$SingleContent->parking}}</td>
                                            <td class="text-nowrap">{{$SingleContent->location}}</td>
                                            <td class="text-nowrap">{{$SingleContent->price}}</td>
                                            <td class="text-nowrap">
                                            <div class="avatar-group">

                                            <?php 
                                            $images=$SingleContent->img; 
                                            $images=(array)json_decode($images);
                                            ?>

                                                @foreach($images as $singleimage)

                                                @if($loop->iteration < 5)    
                                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="">
                                                        <img src="{{$singleimage}}" alt="Avatar" height="26" width="26" >
                                                    </div>
                                                    @endif
                                                @endforeach
                                             </div>

                                            </td>
                                  @if($SingleContent->accept==0)
             <td  class="text-nowrap"><a href="/dashboard/acceptorders/1/{{$SingleContent->id}}"><i class="fa fa-check"></i></a></td>
                                        @else
                                        <td  class="text-nowrap"><a href="/dashboard/acceptorders/0/{{$SingleContent->id}}"><i class="fa fa-eye-slash"></i></a></td>
                                        @endif
                                        <td>
        <a href="/dashboard/editadv/{{$SingleContent->id}}"><i class="fa fa-edit"></i></a>
        <a href="/dashboard/deleadv/{{$SingleContent->id}}"><i class="fa fa-trash"></i></a>
     

      </td> <td>
      @if($SingleContent->isoffered=='0')
        <a href="/dashboard/makeadvOffered/{{$SingleContent->id}}/1"><i class="fa fa-thumbs-up"></i></a>
        @else
        <a href="/dashboard/makeadvOffered/{{$SingleContent->id}}/0"><i class="fa fa-thumbs-down"></i></a>
        @endif
     

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