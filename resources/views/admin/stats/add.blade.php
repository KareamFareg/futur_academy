@extends('layouts.adminlayout')
@section('title','اضافة احصائيه جديد')

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
                                <x-jet-validation-errors class="mb-4" class="alert alert-danger" style="padding: 10px"/>

                                <!-- Form -->
                                <form action="/dashboard/stats/insert" class="mt-2" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-2">
                                                <label for="title">إسم الاحصائيه</label>
                                                <input type="text" id="title" class="form-control" name="title" required />
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group mb-2">
                                                <label for="details">العدد</label>
                                                <input type="number" id="details" class="form-control" name="details" required />

                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mb-2">
                                                <label for="sign">(+ , K,...)العلامه</label>
                                                <input type="text" id="sign" class="form-control" name="sign" placeholder="like 100K or +790" />

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