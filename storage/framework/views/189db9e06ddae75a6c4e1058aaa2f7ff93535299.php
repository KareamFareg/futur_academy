
<?php $__env->startSection('title','بيانات الأكاديميه'); ?>

<?php $__env->startSection('extracss'); ?>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                                        <?php echo csrf_field(); ?>
                                        <div class="row">

                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">إسم الأكاديميه</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="company_name" value="<?php echo e($settings[0]->company_name); ?>" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">رقم الهاتف</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="phone" value="<?php echo e($settings[0]->phone); ?>" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">رقم الواتس اب </label>
                                                    <input type="text" id="v" class="form-control" name="whatsapp" value="<?php echo e($settings[0]->whatsapp); ?>" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">facebook</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="fb" value="<?php echo e($settings[0]->fb); ?>"  required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">العنوان</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="address" value="<?php echo e($settings[0]->address); ?>"  required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">linkedin</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="linkedin" value="<?php echo e($settings[0]->linkedin); ?>"  required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">Twitter</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="tw" value="<?php echo e($settings[0]->tw); ?>"  required/>
                                                </div>
                                            </div>   <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <label for="TitleAr">email</label>
                                                    <input type="text" id="TitleAr" class="form-control" name="email" value="<?php echo e($settings[0]->email); ?>"  required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <input type="file" class="custom-file-input" id="blogCustomFile" accept="image/*" name="image" value="<?php echo e($settings[0]->image); ?>"   />
                                                    <?php if($settings[0]->image != null): ?>
                                                        <img width="200" height="200" style="margin-bottom: 150px" src="<?php echo e(asset('assets/images/settings')); ?>/<?php echo e($settings[0]->image); ?>">
                                                    <?php endif; ?>
                                                    <label class="custom-file-label" for="blogCustomFile"> اختار الصوره الرئيسيه للموقع</label>                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group mb-2">
                                                    <input type="file" class="custom-file-input" id="blogCustomFile" accept="image/*" name="logo" value="<?php echo e($settings[0]->logo); ?>"   />
                                                    <?php if($settings[0]->logo != null): ?>
                                                        <img width="200" height="200" style="margin-bottom: 150px" src="<?php echo e(asset('assets/images/settings')); ?>/<?php echo e($settings[0]->logo); ?>">
                                                    <?php endif; ?>
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



<?php $__env->stopSection(); ?>



<?php $__env->startSection('extrajs'); ?>


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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\academic\resources\views/admin/CompanyProfile.blade.php ENDPATH**/ ?>