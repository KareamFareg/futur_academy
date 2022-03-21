@extends('layouts.adminlayout')
@section('title',' تعديل المواد')

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
{{--    <div class="app-content content ">--}}
{{--            <div class="content-overlay"></div>--}}
{{--            <div class="header-navbar-shadow"></div>--}}
{{--            <div class="content-wrapper">--}}

{{--                <div class="content-body">--}}
{{--                    <!-- Blog Edit -->--}}
{{--                    <div class="blog-edit-wrapper">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <?php--}}
{{--                                    var_dump($course->section->name);--}}
{{--                                ?>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--    </div>--}}








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
                                    <div class="card-header">
                                        <h4 class="card-title"> تعديل بيانات الماده   <span style="color: red">{{$course->name}}</span></h4>
                                    </div>
                                    <x-jet-validation-errors class="mb-4" class="alert alert-danger" style="padding: 10px"/>

                                    <!-- Form -->
                                    <form action="{{route('edit-course',['id' => $course->id])}}" class="mt-2" id="storeCourse" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="name">أسم  المادة الدراسيه</label>
                                                    <input type="text" id="name" class="form-control" name="name" required value="{{$course->name}}" />
                                                    <small id="name_error" class="form-text text-danger"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="year">السنة الدراسية</label>
                                                    <input type="number" id="year" class="form-control" name="year" required  value="{{$course->year}}" />
                                                    <small id="year_error" class="form-text text-danger"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="semester">الترم</label>
                                                    <select class="form-control" id="semester" name="semester" Required>
                                                        <option value="1">الترم الأول</option>
                                                        <option value="2">الترم الثاني</option>
                                                    </select>
                                                    <small id="semester_error" class="form-text text-danger"></small>

                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="max_degree">اقصي درجه</label>
                                                    <input type="number" id="max_degree" class="form-control" name="max_degree" required  value="{{$course->max_degree}}"/>
                                                    <small id="max_degree_error" class="form-text text-danger"></small>

                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="min_degree">  درجه النجاح</label>
                                                    <input type="number" id="min_degree" class="form-control" name="min_degree" required value="{{$course->min_degree}}"/>
                                                    <small id="min_degree_error" class="form-text text-danger"></small>

                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="content">  المحتوي العلمي</label>
                                                    <input type="text" id="content" class="form-control" name="content" required value="{{$course->content}}" />
                                                    <small id="content_error" class="form-text text-danger"></small>

                                                </div>
                                            </div>
                                            <input type="number" name="section_id" value="{{$course->section->id}}"  hidden/>

                                            <div class="col-12 mt-50">
                                                <input type="submit" id="saveCourse" class="btn btn-primary mr-1" value="حفظ">
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