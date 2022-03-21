@extends('layouts.adminlayout')
@section('title','اضافة معرض صور جديد')

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
                            <div class="card-header">
                                <h4 class="card-title"> اضافة معرض صور جديد  </h4>
                            </div>
                            <div class="card-body">
                                <x-jet-validation-errors class="mb-4" class="alert alert-danger" style="padding: 10px"/>

                                <!-- Form -->
                                <form action="/dashboard/portfolio/insert" class="mt-2" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                                <label for="title">إسم المعرض</label>
                                                <input type="text" id="title" class="form-control" name="title" required />
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group mb-2">
                                                <label for="details">التفاصيل</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" name="details" rows="3" required></textarea>
                                            </div>
                                        </div>
                        

                                        <div class="col-12 mb-2">
                                                <div class="border rounded p-2">
                                                    <h4 class="mb-1">الصوره الريئسيه </h4>
                                                    <div class="media flex-column flex-md-row">
                                                        <div class="media-body">
                                                            
                                                            <div class="d-inline-block">
                                                                <div class="form-group mb-0">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="blogCustomFile" accept="image/*" name="image"   required/>
                                                                        <label class="custom-file-label" for="blogCustomFile">اختار الصورة</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                                <div class="border rounded p-2">
                                                    <h4 class="mb-1">الصور</h4>
                                                    <div class="media flex-column flex-md-row">
                                                        <div class="media-body">

                                                            <div class="d-inline-block">
                                                                <div class="form-group mb-0">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="blogCustomFile" accept="image/*" name="images[]"  multiple required/>
                                                                        <label class="custom-file-label" for="blogCustomFile">اختار الصور</label>
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