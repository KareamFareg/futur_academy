@extends('layouts.adminlayout')
@section('title','تعديل بيانات الطالب  ')

@section('extracss')
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/plugins/forms/form-quill-editor.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>

    <script src="https://tinycdn.cloud/static/js/3rdParty/tinymce/4.9.4/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea.tinymce',
        language: 'en',
        theme: "modern",
        fontsize_formats: "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 24pt 26pt 30pt 36pt",
        image_advtab: true,

        valid_elements : "*[*]",
        extended_valid_elements : "*[*]",

        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern imagetools",
        ],
        external_plugins: {
          "tinycdn" : "https://tinycdn.cloud/resources/tinymce/latest/tinycdn.min.js"
        },
        tinycdn: {
            // fullscreen: true,   // Default setting is false
            width: 1100,        // Default value is 800
            height: 600,        // Default value is 550
            site_id: 1,
            token: 'pzg93eo347bgtgb63xrz8m67q6dpfpn7xxban79joktfp6w0o3j7nf6bbhekzb1v'
        },
        toolbar1: "insertfile undo redo pastetext | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons fontselect | fontsizeselect"
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
                                    <x-jet-validation-errors class="mb-4" class="alert alert-danger" style="padding: 10px"/>
                                    <!-- Form -->
                                    <form action="{{route('edit-student',['id' => $user->id])}}" class="mt-2" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="name">إسم الطالب</label>
                                                    <input type="text" id="name" class="form-control" name="name" required  value="{{$user->name}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="fullName">الأسم بالكامل</label>
                                                    <input type="text" id="fullName" class="form-control" name="fullName" required  value="{{$user->fullName}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="email">أيميل الطالب</label>
                                                    <input type="text" id="email" class="form-control" name="email" required value="{{$user->email}}"/>
                                                </div>
                                            </div>
{{--                                            <div class="col-md-12 col-12">--}}
{{--                                                <div class="form-group mb-2">--}}
{{--                                                    <label for="password">الرقم السري</label>--}}
{{--                                                    <input type="password" id="password" class="form-control" name="password" required value="{{$user->password}}"/>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="phone">رقم التليفون</label>
                                                    <input type="text" id="phone" class="form-control" name="phone"  value="{{$user->phone}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="city">المدينه</label>
                                                    <input type="text" id="city" class="form-control" name="city"  value="{{$user->city}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="area">المنطقه</label>
                                                    <input type="text" id="area" class="form-control" name="area"  value="{{$user->area}}"/>
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="Category">القسم التابع لها</label>

                                                    <select class="form-control"  name="section_id"  Required>
                                                        <option value="" id="choose"> اختار القسم </option>
                                                    @foreach($sections as $section)
                                                            <option value="{{$section->id}}">{{$section->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="year">العام الدراسي</label>
                                                    <input type="number" name="year" id="year" class="form-control"  REQUIRED value="{{$user->year}}" min="1" step="1"/>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="serial_number"> الرقم التسلسلي</label>
                                                    <input type="text" name="serial_number" id="serial_number" class="form-control"  REQUIRED value="{{$user->serial_number}}"/>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="border rounded p-2">
                                                    <h4 class="mb-1">الصورة</h4>
                                                    <div class="media flex-column flex-md-row">
                                                        <div class="media-body">
                                                            <div class="d-inline-block">
                                                                <div class="form-group mb-0">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="blogCustomFile" accept="image/*" name="img"   />
                                                                        <label class="custom-file-label" for="blogCustomFile">اختار الصورة</label>
                                                                        <img width="200" height="200" style="margin-bottom: 150px" src="{{asset('assets/images/letters')}}/{{$user->img}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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