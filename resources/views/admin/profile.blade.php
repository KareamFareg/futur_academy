@extends('layouts.adminlayout')
@section('title','الملف الشخصي')

@section('extracss')
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/plugins/forms/form-quill-editor.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#textareaar',
    directionality: "rtl"
  });

 tinymce.init({
    selector: '#textareaen'
  });
  </script>

@endsection
@section('content')
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <!-- Blog Edit -->
                <div class="blog-edit-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
          
                                    <!-- Form -->
                                    <x-jet-validation-errors class="mb-4" class="alert alert-danger" style="padding: 10px"/>

                                    <form action="/dashboard/changepassword" class="mt-2" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row">

                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="name">إسم المستخدم</label>
                                                    <input type="text" id="name" class="form-control" name="name" value="{{$profile->name}}" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="fullName">الأسم بالكامل</label>
                                                    <input type="text" id="fullName" class="form-control" name="fullName" value="{{$profile->fullName}}" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="email">البريد الالكتروني</label>
                                                    <input type="email" id="email" class="form-control" name="email" value="{{$profile->email}}" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="phone">رقم المحمول</label>
                                                    <input type="text" id="phone" class="form-control" name="phone" value="{{$profile->phone}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="city">المدينه</label>
                                                    <input type="text" id="city" class="form-control" name="city" value="{{$profile->city}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="area">المنطقه</label>
                                                    <input type="text" id="area" class="form-control" name="area" value="{{$profile->area}}" />
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="password">الرقم السري</label>
                                                    <input type="password" id="password" class="form-control" name="password"   required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                            <div class="form-group mb-2">
                                                <label for="img">الصوره</label>
                                                <input type="file" id="img" class="custom-file-input" id="blogCustomFile" accept="image/*" name="img"  />
                                                <img width="200" height="200" style="margin-bottom: 150px" src="{{asset('assets/images/letters')}}/{{$profile->img}}">
                                                <label class="custom-file-label" for="blogCustomFile">{{$profile->img}}</label>
                                            </div>
                                        </div>
                                        
                                            <div class="col-12 mt-50">
                                                <input type="submit" class="btn btn-primary mr-1" value="حفظ">
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Blog Edit -->

            </div>
        </div>
    </div>



@endsection



@section('extrajs')


    <!-- BEGIN: Vendor JS-->
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/editors/quill/katex.min.js"></script>
    <script src="/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
    <script src="/app-assets/vendors/js/editors/quill/quill.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->

    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="/app-assets/js/scripts/forms/pickers/form-pickers.js"></script>

    <!-- END: Page JS-->


    
@endsection