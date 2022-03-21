@extends('layouts.adminlayout')
@section('title',' اراء العملاء')
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
                                <h4 class="card-title">كل الأراء</h4>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0 table-hover-animation">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-nowrap">#</th>

                                            <th scope="col" class="text-nowrap">أسم العميل</th>
                                        <th scope="col" class="text-nowrap">التحكم</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                @if($Reviews != null  &&  !empty($Reviews))
                                    @foreach($Reviews as $review)
                                        <?php
                                            $user = DB::table('users')->where('id',$review->user_id)->first();
                                        ?>
                                        <tr>
                                            <td class="text-nowrap">{{$loop->iteration}}</td>
                                            <td class="text-nowrap">{{$review->comment}}</td>
                                            <td class="text-nowrap">{{$user->name}}</td>
                                            <td class="text-nowrap">
                                                    <a href="/dashboard/review/delete/{{$review->id}}" onclick="return confirm('Are you sure you want to delete this item?');" > <i data-feather='delete'></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-nowrap">لا توجد أراء حتي الأن</td>
                                    </tr>
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