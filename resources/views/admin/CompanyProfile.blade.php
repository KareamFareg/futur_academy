@extends('layouts.adminlayout')
@section('title','بيانات الأكاديميه')

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
                                    <form action="/dashboard/company-profile/update" class="mt-2" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">إسم الأكاديميه</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="company_name" value="{{$settings[0]->company_name}}" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">رقم الهاتف</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="phone" value="{{$settings[0]->phone}}" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">رقم الواتس اب </label>
                                                    <input type="text" id="v" class="form-control" name="whatsapp" value="{{$settings[0]->whatsapp}}" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">facebook</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="fb" value="{{$settings[0]->fb}}"  required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">العنوان</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="address" value="{{$settings[0]->address}}"  required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">linkedin</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="linkedin" value="{{$settings[0]->linkedin}}"  required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">Twitter</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="tw" value="{{$settings[0]->tw}}"  required/>
                                                </div>
                                            </div>   <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">email</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="email" value="{{$settings[0]->email}}"  required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <input type="file" class="custom-file-input" id="blogCustomFile" accept="image/*" name="image" value="{{$settings[0]->image}}"   />
                                                    @if($settings[0]->image != null)
                                                        <img width="200" height="200" style="margin-bottom: 150px" src="{{asset('assets/images/settings')}}/{{$settings[0]->image}}">
                                                    @endif
                                                    <label class="custom-file-label" for="blogCustomFile"> اختار الصوره الرئيسيه للموقع</label>                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <input type="file" class="custom-file-input" id="blogCustomFile" accept="image/*" name="logo" value="{{$settings[0]->logo}}"   />
                                                    @if($settings[0]->logo != null)
                                                        <img width="200" height="200" style="margin-bottom: 150px" src="{{asset('assets/images/settings')}}/{{$settings[0]->logo}}">
                                                    @endif
                                                    <label class="custom-file-label" for="blogCustomFile">اختار لوجو الأكاديميه</label>                                                </div>
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