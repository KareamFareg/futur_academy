@extends('layouts.adminlayout')
@section('title','كل المحتوي')
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
                                <h4 class="card-title">كل المحتوي</h4>
{{--                                <a class="card-title" href="/dashboard/section/add">اضافة قسم  جديد </a>--}}
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0 table-hover-animation">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-nowrap">#</th>
                                            <th scope="col" class="text-nowrap">اسم المحتوي</th>
                                            <th scope="col" class="text-nowrap">عنوان  المحتوي</th>
                                            <th scope="col" class="text-nowrap">العنوان الفرعي</th>
                                            <th scope="col" class="text-nowrap">التفاصيل</th>
                                        <th scope="col" class="text-nowrap">التحكم</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contents as $content)
                                           @if($content->id ==1)
                                            <?php
                                                $titleDetails = explode('-',$content->titleDetails);
                                                $contentBody = explode('-',$content->contentBody);
                                            ?>
                                            <tr>
                                                <td class="text-nowrap">{{$loop->iteration}}</td>
                                                <td class="text-nowrap">{{$content->name}}</td>
                                                <td class="text-nowrap">{{$content->title}}</td>
                                                <td class="text-nowrap">
                                                    @if($titleDetails != null)
                                                        @foreach($titleDetails as  $title)
                                                            {{$title}}<span style="color: red">/</span>
                                                        @endforeach
                                                    @else
                                                        لا يوجد عنوان فرعي
                                                    @endif
                                                </td>
                                                <td class="text-nowrap">
                                                    @if($contentBody != null)
                                                        @foreach($contentBody as  $Body)
                                                            {{$Body}}<span style="color: red">/</span>
                                                        @endforeach
                                                    @else
                                                        لا توجد تفاصيل لهذا المحتوي
                                                    @endif
                                                </td>

                                                <td class="text-nowrap">
{{--                                                        <a href="/dashboard/content/show/{{$content->id}}"> <i class="fa fa-eye"></i></a>--}}
                                                        <a href="/dashboard/content/edit/{{$content->id}}"> <i class="fa fa-edit"></i></a>
{{--                                                        <a href="/dashboard/section/edit/{{$section->id}}"> <i data-feather='update'></i></a>--}}
                                                        <a href="/dashboard/content/delete/{{$content->id}}" onclick="return confirm('Are you sure you want to delete this item?');" > <i class="fa fa-remove"></i></a>
                                                </td>
                                            </tr>
                                            @else
                                               <tr>
                                                   <td class="text-nowrap">{{$loop->iteration}}</td>
                                                   <td class="text-nowrap">{{$content->name}}</td>
                                                   <td class="text-nowrap">{{$content->title}}</td>
                                                   <td class="text-nowrap">{{$content->titleDetails}}</td>
                                                   <td class="text-nowrap">{{$content->contentBody}}</td>
                                                   <td class="text-nowrap">
                                                       {{--<a href="/dashboard/content/show/{{$content->id}}"> <i class="fa fa-eye"></i></a>--}}
                                                       <a href="/dashboard/content/edit/{{$content->id}}"> <i class="fa fa-edit"></i></a>
                                                       {{-- <a href="/dashboard/section/edit/{{$section->id}}"> <i data-feather='update'></i></a>--}}
                                                       <a href="/dashboard/content/delete/{{$content->id}}" onclick="return confirm('Are you sure you want to delete this item?');" > <i class="fa fa-remove"></i></a>
                                                   </td>
                                               </tr>

                                            @endif
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