@extends('layouts.adminlayout')
@section('title','عرض الموثقين')
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
                <button type="button"  class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">إضافه مستخدم جديد</button>

                <div class="row" id="table-responsive">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">عرض المستخدمين</h4>
                            </div>

                        

                            <div class="table-responsive">

                                <table class="table mb-0 table-hover-animation">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">#</th>
                                            <th scope="col" class="text-nowrap">الإسم</th>
                                            <th scope="col" class="text-nowrap">الإيميل</th>
                                            <th scope="col" class="text-nowrap">   التحكم </th>
          
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $SingleContent)
                                        <tr>
                                            <td class="text-nowrap">{{$loop->iteration}}</td>
                                            <td class="text-nowrap">{{$SingleContent->name}}</td>
                                            <td class="text-nowrap">{{$SingleContent->email}}</td>
                    
                                            <td class="text-nowrap">
                                          
                                           <a href="/dashboard/users/active/1/{{$SingleContent->id}}"> <i class="fa fa-trash"></i></a>
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
        $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">مستخدم جديد </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/dashboard/users/insert" class="mt-2" method="POST" enctype="multipart/form-data">
                                    @csrf
      <div class="modal-body">
      <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="TitleEn"> إسم المستخدم </label>
                                                    <input type="text" id="name" class="form-control" name="name" required />
                                                </div>
                                            </div>      <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="TitleEn"> البريد الإلكتروني  </label>
                                                    <input type="email" id="email" class="form-control" name="email" required />
                                                </div>
                                            </div><div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="TitleEn"> الرقم السري  </label>
                                                    <input type="password" id="password" class="form-control" name="password" required />
                                                </div>
                                            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
        <button type="submit" class="btn btn-primary">إضافه</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection